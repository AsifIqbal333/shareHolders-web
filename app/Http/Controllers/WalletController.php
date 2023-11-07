<?php

namespace App\Http\Controllers;

use App\Enums\TransactionTypes;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = stripe();
    }

    public function index(): View
    {
        return view('wallet');
    }

    public function deposit(Request $request)
    {
        try {
            $session = $this->stripe->checkout->sessions->create([
                'success_url' => url('/user/wallet/deposit/success?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url' => route('wallet.deposit.cancel'),
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'unit_amount' => $request->amount * 100,
                            'product_data' => [
                                'name' => 'Deposit amount in wallet',
                            ],
                        ],
                        'quantity' => 1,
                    ]
                ],
                'mode' => 'payment',
            ]);

            return redirect()->away($session->url);
        } catch (\Throwable $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function deposit_success(Request $request)
    {
        $session = $this->stripe->checkout->sessions->retrieve($request->session_id);

        // check if session is complete
        if ($session->status === 'complete') {
            $amount_paid = ($session->amount_total / 100);

            // update user wallet cash balance
            $new_balance = $request->user()->wallet->cash_balance + $amount_paid;
            $request->user()->wallet()->update([
                'cash_balance' => $new_balance
            ]);

            // create trasaction
            $request->user()->transactions()->create([
                'type' => TransactionTypes::Deposit->value,
                'session_id' => $session->id,
                'amount' => $amount_paid,
                'gateway' => 'stripe',
                'wallet_cash_balance' => $new_balance
            ]);

            return to_route('wallet.index')->with('success', __('Amount successfully deposit to your wallet'));
        } else {
            return to_route('wallet.index')->with('error', __('Something went wrong!'));
        }
    }

    public function deposit_cancel()
    {
        return to_route('wallet.index');
    }

    public function onboarding()
    {
        $user = request()->user();

        if (is_null($user->wallet?->stripe_account_id)) {
            try {
                $stripe_account = $this->stripe->accounts->create([
                    'type' => 'express',
                    'email' => $user->email
                ]);

                $user->wallet->update([
                    'stripe_account_id' => $stripe_account->id
                ]);

                $onboardLink = $this->stripe->accountLinks->create([
                    'account' => $stripe_account->id,
                    'refresh_url' => route('stripe.redirect'),
                    'return_url' => route(''),
                    'type' => 'account_onboarding',
                ]);

                return redirect()->away($onboardLink->url);
            } catch (\Throwable $ex) {
                return back()->with('error', $ex->getMessage());
            }
        }

        return to_route('wallet.index');
    }

    public function onboarding_success($account_id)
    {
        try {
            $stripe_account = $this->stripe->accounts->retrieve(
                $account_id,
                []
            );

            // check if user has completed onboarding or not
            if ($stripe_account->charges_enabled && $stripe_account->details_submitted) {
                request()->user()->wallet->update([
                    'completed_stripe_onboarding' => true
                ]);

                return to_route('wallet.index')->with('success', __('Successfully connected with stripe'));
            }
        } catch (Exception $e) {
            return to_route('wallet.index')->with('error', __('Error while connecting with stripe'));
        }
    }
}

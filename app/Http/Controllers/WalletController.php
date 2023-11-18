<?php

namespace App\Http\Controllers;

use App\Enums\TransactionGateway;
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
        // dd($this->stripe->checkout->sessions->retrieve('cs_test_a1cS1qyehKooaidHHitWMaqQU3dkitCIDBw7pmgfAkrmaj64MpsZAvp9SK'));
        // dd($this->stripe->balance->retrieve([]));
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
                'customer' => $request->user()->wallet?->stripe_customer_id,
                // 'customer_email' => $request->user()->email,
            ]);

            return redirect()->away($session->url);
        } catch (\Throwable $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function deposit_success(Request $request)
    {
        $session = $this->stripe->checkout->sessions->retrieve($request->session_id);
        $payment_intent = $this->stripe->paymentIntents->retrieve(
            $session->payment_intent,
            []
        );

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
                'stripe_payment_intent' => $session->payment_intent,
                'stripe_charge_id' => $payment_intent->latest_charge,
                'amount' => $amount_paid,
                'gateway' => TransactionGateway::Stripe->value,
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

        if (!$user->wallet?->stripe_account_id || is_null($user->wallet?->stripe_account_id)) {
            try {
                // creating stripe customer
                $stripe_customer = $this->stripe->customers->create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                ]);
                // creating stripe account
                $stripe_account = $this->stripe->accounts->create([
                    'type' => 'express',
                    'email' => $user->email,
                ]);
                // update user wallet
                $user->wallet->update([
                    'stripe_customer_id' => $stripe_customer->id,
                    'stripe_account_id' => $stripe_account->id
                ]);
                // creating stripe onboarding link and redirect
                $onboardLink = $this->stripe->accountLinks->create([
                    'account' => $stripe_account->id,
                    'refresh_url' => route('stripe.onboarding'),
                    'return_url' => route('stripe.onboarding.success', $stripe_account->id),
                    'type' => 'account_onboarding',
                ]);

                return redirect()->away($onboardLink->url);
            } catch (\Throwable $ex) {
                return back()->with('error', $ex->getMessage());
            }
        }

        $loginLink = $this->stripe->accounts->createLoginLink(request()->user()->wallet->stripe_account_id);

        return redirect()->away($loginLink->url);
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

                // user has cancel the onboarding process
            } else {
                $this->clear_stripe_info();
                return to_route('wallet.index')->with('success', __('Onboarding process successfully canceled.'));
            }
        } catch (Exception $e) {
            $this->clear_stripe_info();
            return to_route('wallet.index')->with('error', __('Error while connecting with stripe'));
        }
    }

    public function withdraw(Request $request)
    {
        $wallet = $request->user()->wallet;
        $transfer =  $this->stripe->transfers->create([
            'amount' => $request->amount * 100,
            // "currency" => "usd",
            "currency" => "gbp",
            "destination" => $wallet->stripe_account_id,
            // 'source_transaction' => $stripe_trasaction_token,
            // 'source_transaction' => 'ch_3OAbBpDwWQfmFztB12jpdshy',
            // 'source_transaction' => 'ch_3OAbJeDwWQfmFztB0xiALVsy',
        ]);
        // $this->stripe->payouts->create(
        //     [
        //         'amount' => $request->amount * 100,
        //         'currency' => 'gbp',
        //     ],
        //     ['stripe_account' => $wallet->stripe_account_id]
        // );

        // calculating new balance after withdraw and updating wallet cash balance
        $new_balance = $wallet->cash_balance - $request->amount;
        $request->user()->wallet()->update([
            'cash_balance' => $new_balance
        ]);

        // create trasaction
        $request->user()->transactions()->create([
            'type' => TransactionTypes::Withdraw->value,
            'session_id' => null,
            'amount' => $request->amount,
            'gateway' => TransactionGateway::Bank->value,
            'wallet_cash_balance' => $new_balance
        ]);

        return to_route('wallet.index')->with('success', __('Amount successfully withdraw to your bank'));
    }

    // deleting wallet stripe info on cancel or error onboarding
    private function clear_stripe_info()
    {
        $wallet = request()->user()->wallet;

        // delete stripe customer
        if ($wallet->stripe_customer_id) {
            $this->stripe->customers->delete($wallet->stripe_customer_id);
        }

        // delete stripe account
        if ($wallet->stripe_account_id) {
            $this->stripe->accounts->delete($wallet->stripe_account_id);
        }

        // update user wallet
        $wallet->update([
            'stripe_customer_id' => null,
            'stripe_account_id' => null
        ]);
    }
}

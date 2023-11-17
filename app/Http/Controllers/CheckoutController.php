<?php

namespace App\Http\Controllers;

use App\Enums\TransactionTypes;
use App\Models\Transaction;
use App\Services\InvestmentService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('checkouts.index');
    }

    /**
     * Display success responce.
     */
    public function success(Request $request, InvestmentService $service)
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $session = $stripe->checkout->sessions->retrieve(
            $request->session_id,
            []
        );

        // check if session is complete
        if ($session && $session->status === 'complete') {
            $wallet =  request()->user()->wallet;
            // creating uer transacton
            $transaction = $service->transaction($session->amount_total / 100, TransactionTypes::Invest->value, 'stripe', $session->id, $wallet->cash_balance, $wallet->reward_balance);

            // creating user investment
            $service->invest($transaction->id);

            return to_route('dashboard');
        } else {
            $this->handle_cancel_response($request);

            return view('checkouts.index');
        }
    }

    /**
     * Display cancel responce.
     */
    public function cancel(Request $request)
    {
        $this->handle_cancel_response($request);

        return view('checkouts.index');
    }

    private function handle_cancel_response($request)
    {
        if ($request->reward_trasaction) {
            // delete reward trasaction from database
            Transaction::find($request->reward_trasaction)?->delete();

            // update user wallet reward balance
            $old_reward_balance = $request->session()->get('reward_balance');
            if ($old_reward_balance) {
                $request->user()->wallet()->update([
                    'reward_balance' => $old_reward_balance
                ]);
            }
        }

        if ($request->wallet_trasaction) {
            // delete reward trasaction from database
            Transaction::find($request->wallet_trasaction)?->delete();

            // update user wallet reward balance
            $old_cash_balance = $request->session()->get('cash_balance');
            if ($old_cash_balance) {
                $request->user()->wallet()->update([
                    'cash_balance' => $old_cash_balance
                ]);
            }
        }

        // forget reward and cash balance from session
        $request->session()->forget(['reward_balance', 'cash_balance']);
    }
}

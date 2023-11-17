<?php

namespace App\Services;

use App\Enums\TransactionTypes;
use Illuminate\Http\Request;
use Stripe\Stripe;

/**
 * Class InvestmentService
 * @package App\Services
 */
class InvestmentService
{

    public function transaction($amount, $type, $gateway = 'stripe', $session_id = null, $wallet_cash_balance, $wallet_reward_balance)
    {
        return request()->user()->transactions()->create([
            'type' => $type,
            'session_id' => $session_id,
            'amount' => $amount,
            'gateway' => $gateway,
            'wallet_cash_balance' => $wallet_cash_balance,
            'wallet_reward_balance' => $wallet_reward_balance,
        ]);
    }

    public function invest($transaction_id)
    {
        // creating investment object
        foreach (request()->user()->carts()->with('property')->get() as $cart) {
            request()->user()->investments()->create([
                'property_id' => $cart->property_id,
                'transaction_id' => $transaction_id,
                'amount' => $cart->amount,
                'monthly_rent' => monthly_rent($cart->property, $cart->amount),
                'appreciation' => appreciation($cart->property, $cart->amount),
            ]);
        }

        // delete cart
        request()->user()->carts()?->delete();

        return true;
    }

    public function wallet_investment($total)
    {
        $wallet =  request()->user()->wallet;
        //  deducting cart balance from user wallet
        $remaining_balance = request()->user()->wallet->cash_balance - $total;

        // creating uer transaction
        $transaction = $this->transaction($total, TransactionTypes::Invest->value, 'wallet', null, $remaining_balance, $wallet->reward_balance);

        // creating user investment
        $this->invest($transaction->id);


        request()->user()->wallet()->update([
            'cash_balance' => $remaining_balance,
        ]);

        return true;
    }

    public function reward_investment($total)
    {
        $wallet =  request()->user()->wallet;
        //  deducting cart balance from user wallet
        $remaining_balance = request()->user()->wallet->reward_balance - $total;

        // creating user transaction
        $transaction = $this->transaction($total, TransactionTypes::Invest->value, 'reward', null, $wallet->cash_balance, $remaining_balance);

        // creating user investment
        $this->invest($transaction->id);


        request()->user()->wallet()->update([
            'reward_balance' => $remaining_balance,
        ]);

        return true;
    }

    public function delete_cart()
    {
        request()->user()->carts?->delete();

        return true;
    }

    public function card_investment()
    {
        $line_items = [];

        foreach (request()->user()->carts()->with('property.images')->get() as $cart) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $cart->amount * 100,
                    'product_data' => [
                        'name' => $cart->property->name,
                    ],
                ],
                'quantity' => 1,
            ];
        }

        Stripe::setApiKey(config('services.stripe.secret'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => url('/user/checkout/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url' => url('/user/checkout/cancel'),
        ]);

        return $session;
    }

    public function card_investment_with_static_amount($amount, $reward_trasaction_id = null, $wallet_trasaction_id = null)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $amount,
                    'product_data' => [
                        'name' => 'Property investment',
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/user/checkout/success?session_id={CHECKOUT_SESSION_ID}&reward_trasaction=' . $reward_trasaction_id . '&wallet_trasaction=' . $wallet_trasaction_id),
            'cancel_url' => url('/user/checkout/cancel?reward_trasaction=' . $reward_trasaction_id . '&wallet_trasaction=' . $wallet_trasaction_id),
        ]);

        return $session;
    }
}

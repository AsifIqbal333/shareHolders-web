<?php

namespace App\Livewire;

use App\Enums\TransactionTypes;
use App\Models\Cart as ModelsCart;
use App\Models\Wallet;
use App\Services\InvestmentService;
use Livewire\Component;
use Stripe\Stripe;

class Cart extends Component
{
    public $cart;
    public $types = [];
    public $charge_type;
    public Wallet $wallet;

    public function mount()
    {
        $this->types = [
            'wallet' => 'Pay through wallet ($' . currency_format(request()->user()->wallet->cash_balance) . ')',
            'reward' => 'Pay through reward balance ($' . currency_format(request()->user()->wallet->reward_balance) . ')',
            'card' => 'Pay through card',
            'combine' => 'Pay through wallet and card (Will be charged first from reward balance and then cash balance from wallet if required and then remaining will be charged from your card)'
        ];
        $this->wallet = request()->user()->wallet;
    }

    public function render()
    {
        return view('livewire.cart', [
            'carts' => request()->user()->carts()->with(['property.images', 'property.investments'])->get(),
        ]);
    }

    public function updatedCart()
    {
        dd($this->cart);
    }

    public function changeInvestment($id, $amount)
    {
        ModelsCart::find($id)->increment('amount', $amount);
    }

    public function deleteItem($id)
    {
        ModelsCart::find($id)->delete();
    }

    public function checkout()
    {
        $service = new InvestmentService();

        // charge is from wallet
        if ($this->charge_type === 'wallet') {
            $service->wallet_investment(request()->user()->carts->sum('amount'));

            // return user to dashboard
            return to_route('dashboard');

            // charge is from reward balance
        } elseif ($this->charge_type === 'reward') {
            $service->reward_investment(request()->user()->carts->sum('amount'));

            // return user to dashboard
            return to_route('dashboard');

            // charge is from card
        } elseif ($this->charge_type === 'card') {
            $session = $service->card_investment();

            return redirect()->away($session->url);

            // charge is from combine
        } else {
            $total = request()->user()->carts->sum('amount');
            $wallet =  request()->user()->wallet;

            request()->session()->put('cash_balance', $wallet->cash_balance);
            request()->session()->put('reward_balance', $wallet->reward_balance);

            // user has reward balance
            if ($wallet->reward_balance > 0) {

                // if investment total is greater than reward balance
                if ($total > $wallet->reward_balance) {
                    $reward_trasaction = $service->transaction($wallet->reward_balance, TransactionTypes::Invest->value, 'reward', null, $wallet->cash_balance, 0);

                    // update user wallet reward balance
                    request()->user()->wallet()->update([
                        'reward_balance' => 0
                    ]);
                } else {
                    $remaining_balance = $wallet->reward_balance - $total;
                    // investment total is lower than reward balance
                    $transaction = $service->transaction($total, TransactionTypes::Invest->value, 'reward', null, $wallet->cash_balance, $remaining_balance);
                    // invest to property
                    $service->invest($transaction->id);

                    // update user wallet reward balance
                    request()->user()->wallet()->update([
                        'reward_balance' => $remaining_balance
                    ]);

                    // no need to go further redirect here to dashboard
                    return to_route('dashboard');
                }


                // remaining investment after reward investment
                $total = $total - $wallet->reward_balance;

                // check if investment is greater than 0 and user has some cash balance in wallet
                if ($total > 0 && $wallet->cash_balance > 0) {
                    $this->checkout_through_wallet_card($total, $wallet, $service, $reward_trasaction->id);

                    // user has not cash balance in wallet so remainign investment will be charged from card
                } else {
                    $session = $service->card_investment_with_static_amount(($total - $wallet->cash_balance) * 100, $reward_trasaction->id);
                    return redirect()->away($session->url);
                }

                // user has no reward balance but has cash balance
            } elseif ($wallet->cash_balance > 0) {
                $this->checkout_through_wallet_card($total, $wallet, $service);

                // user has no reward balance and no cash balance
            } else {
                $session = $service->card_investment();

                return redirect()->away($session->url);
            }
        }
    }

    public function checkout_through_wallet_card($total, $wallet, $service, $reward_trasaction_id = null)
    {
        // if investment total is greater than wallet cash balance
        if ($total > $wallet->cash_balance) {
            $wallet_trasaction = $service->transaction($wallet->cash_balance, TransactionTypes::Invest->value, 'wallet', null, 0, 0);

            // update user wallet reward balance
            request()->user()->wallet()->update([
                'cash_balance' => 0
            ]);
        } else {
            // investment total is less than wallet balance

            $remaining_balance = $wallet->cash_balance - $total;
            $transaction = $service->transaction($total, TransactionTypes::Invest->value, 'wallet', null, $remaining_balance, 0);

            // invest to property
            $service->invest($transaction->id);

            // update user wallet reward balance
            request()->user()->wallet()->update([
                'cash_balance' => $remaining_balance
            ]);

            // no need to go further redirect here to dashboard
            return to_route('dashboard');
        }

        // remaning investment through stripe checkout
        $session = $service->card_investment_with_static_amount(($total - $wallet->cash_balance) * 100, $reward_trasaction_id, $wallet_trasaction->id);
        return redirect()->away($session->url);
    }
}

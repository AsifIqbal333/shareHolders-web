<?php

namespace App\Livewire;

use App\Models\Cart as ModelsCart;
use App\Models\Wallet;
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
            'combine' => 'Pay through wallet and card (Will be charged first from reward balance and then cash balane in wallet if required and then remaining will be charged from with your card)'
        ];
        $this->wallet = request()->user()->wallet;
    }

    public function render()
    {
        return view('livewire.cart', [
            'carts' => request()->user()->carts()->with(['property.images'])->get(),
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

        return redirect()->away($session->url);
    }
}

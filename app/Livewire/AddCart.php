<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Property;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddCart extends Component
{
    public Property $property;
    public bool $can_submit = true;
    public $amount;

    public function mount()
    {
        $this->amount = $this->property->minimum_investment_price;
    }

    public function render()
    {
        return view('livewire.add-cart');
    }

    public function addToCart()
    {
        $this->validate([
            'amount' => ['required']
        ]);

        if ((int)$this->amount < $this->property->minimum_investment_price) {
            $this->addError('amount', 'Minimum investment amount is' . $this->property->minimum_investment_price);
            return;
        }

        $cart_query = request()->user()->carts()->where('property_id', $this->property->id);
        // property already exists of this user in cart table to only update amount
        if ($cart_query->exists()) {
            $cart = $cart_query->first();
            $old_amount = $cart?->amount;
            $cart->update(['amount' => $old_amount + $this->amount]);
        } else {
            // property does not exists in table so create new entry in cart table
            request()->user()->carts()->create([
                'property_id' => $this->property->id,
                'amount' => $this->amount
            ]);
        }

        return $this->redirect('/user/checkout');
    }
}

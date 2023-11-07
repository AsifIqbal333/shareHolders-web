<?php

namespace App\Http\Controllers;

use App\Enums\TransactionTypes;
use App\Models\Transaction;
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
    public function success(Request $request)
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $session = $stripe->checkout->sessions->retrieve(
            $request->session_id,
            []
        );

        // check if session is complete
        if ($session->status === 'complete') {
            // creating trasnaction object
            $transaction = $request->user()->transactions()->create([
                'type' => TransactionTypes::Invest->value,
                'session_id' => $session->id,
                'amount' => $session->amount_total / 100,
                'gateway' => 'stripe',
            ]);

            // creating investment object
            foreach ($request->user()->carts()->with('property')->get() as $cart) {
                $request->user()->investments()->create([
                    'property_id' => $cart->property_id,
                    'transaction_id' => $transaction->id,
                    'amount' => $cart->amount,
                    'monthly_rent' => monthly_rent($cart->property, $cart->amount),
                    'appreciation' => appreciation($cart->property, $cart->amount),
                ]);
            }

            // delete all user carts items
            $request->user()->carts?->delete();

            return to_route('dashboard');
        } else {
            return view('checkouts.index');
        }
    }

    /**
     * Display cancel responce.
     */
    public function cancel()
    {
        return view('checkouts.index');
    }
}

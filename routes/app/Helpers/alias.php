<?php

if (!function_exists('stripe')) {
    function stripe()
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

        return $stripe;
    }
}

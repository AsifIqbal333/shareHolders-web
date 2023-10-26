<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsurePhoneIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $redirectToRoute = null): Response
    {
        if (!$request->user() || !$request->user()->hasVerifiedPhone()) {
            return $request->expectsJson()
                ? abort(403, 'Your phone number is not verified.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'phone.notice'));
        }

        return $next($request);
    }
}

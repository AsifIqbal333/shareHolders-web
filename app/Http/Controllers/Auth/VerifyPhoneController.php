<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class VerifyPhoneController extends Controller
{
    public function index(): View
    {
        return view('auth.verify-phone');
    }

    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $request->validate([
            'phone' => ['nullable', 'string']
        ]);

        if ($request->user()->hasVerifiedPhone()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        if ($request->has('phone') && !$request->user()->phone) {
            $request->user()->update(['phone' => $request->phone]);
        }

        $otp = $this->randInt(6);
        Otp::updateOrCreate([
            'user_id' => auth()->id()
        ], [
            'code' => Hash::make($otp)
        ]);

        $request->user()->sendPhoneVerificationNotification($otp);

        return $request->expectsJson() ? response()->json(['status' => 'code-sent']) : back()->with('status', 'code-sent');
    }

    /**
     * Send a new email verification notification.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'string'],
        ]);

        if (password_verify($request->otp, $request->user()->otp->code)) {
            $request->user()->markPhoneAsVerified();
        }

        if ($request->user()->hasVerifiedPhone()) {
            return to_route('dashboard');
        }

        return back();
    }

    private function randInt($digits)
    {
        return rand(pow(10, $digits - 1), pow(10, $digits) - 1);
    }
}

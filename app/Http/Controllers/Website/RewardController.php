<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->ref && User::where('referral_code', $request->ref)->exists()) {
            $request->session()->put('ref', $request->ref);
        }

        return to_route('register');
    }
}

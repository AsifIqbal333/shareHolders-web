<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use App\Services\TierService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TierController extends Controller
{
    public function index(): View
    {
        return view('kyc.tiers.index', [
            'tiers' => (new TierService())->get_tiers(),
        ]);
    }

    public function store(Request $request)
    {
        UserInfo::updateOrCreate([
            'user_id' => auth()->id(),
        ], [
            'tier_id' => $request->tier_id
        ]);


        return to_route('dashboard');
    }
}

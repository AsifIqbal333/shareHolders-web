<?php

namespace App\Http\Controllers;

use App\Enums\TransactionGateway;
use App\Enums\TransactionTypes;
use App\Models\Investment;
use App\Models\Tier;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index()
    {
        return view('rewards.index', [
            'total_rewards' => request()->user()->transactions()->where('type', TransactionTypes::Deposit->value)->where('gateway', TransactionGateway::ReferralReward->value)->sum('amount')
        ]);
    }

    public function tiers()
    {
        return view('rewards.tiers', [
            'tiers' => Tier::get()
        ]);
    }

    public function referrals()
    {
        $referral_users_ids = request()->user()->referral_users->pluck('user_id');
        $referral_users_investments = Investment::whereIn('user_id', $referral_users_ids)->sum('amount');

        return view('rewards.referrals', [
            'referral_users' => count($referral_users_ids),
            'referral_users_investments' => $referral_users_investments,
            'total_rewards' => request()->user()->transactions()->where('type', TransactionTypes::Deposit->value)->where('gateway', TransactionGateway::ReferralReward->value)->sum('amount')
        ]);
    }
}

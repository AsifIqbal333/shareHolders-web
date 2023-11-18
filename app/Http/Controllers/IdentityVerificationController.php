<?php

namespace App\Http\Controllers;

use App\Enums\TransactionTypes;
use App\Http\Requests\PassportRequest;
use App\Models\Kyc;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IdentityVerificationController extends Controller
{
    use FileUpload;

    public function index(): View
    {
        return view('kyc.identity.index');
    }

    public function passport(): View
    {
        return view('kyc.identity.passport');
    }


    public function store(PassportRequest $request)
    {
        $data = $request->validated();
        $data['passport_image'] = $this->fileUpload($request->passport_image, 'kyc');

        $request->user()->kyc()->create($data);

        // check is user is referral by someone and perform operations
        $balance = 0;
        $referral_code = $request->session()->get('ref');
        if ($referral_code) {
            $request->user()->referral()->create([
                'referral_user' => User::where('referral_code', $referral_code)->first()->id,
            ]);

            $balance = referal_reward();
            $request->user()->transactions()->create([
                'type' => TransactionTypes::Deposit->value,
                'amount' => $balance,
                'gateway' => 'referral reward',
                'wallet_cash_balance' => 0,
                'wallet_reward_balance' => $balance,
            ]);
        }

        // create wallet
        $request->user()->wallet()->create([
            'cash_balance' => 0,
            'reward_balance' => $balance,
            'status' => true,
        ]);


        return to_route('dashboard');
    }
}

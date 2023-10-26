<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function index(): View
    {
        $employment_status = [
            'employed' => 'Employed',
            'self_employed' => 'Self Employed',
            'student' => 'Student',
            'homemaker' => 'Homemaker',
            'retired' => 'Retired',
        ];

        $wealth_source = [
            'saving_from_employment_earning' => 'Saving from employment earning',
            'investments' => 'Investments',
            'winnings' => 'Winnings',
            'inheritance' => 'Inheritance',
        ];
        return view('kyc.employment.index', compact('employment_status', 'wealth_source'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employment_status' => ['required', 'string'],
            'wealth_source' => ['required', 'string'],
        ]);

        UserInfo::updateOrCreate([
            'user_id' => auth()->id(),
        ], [
            'employment_status' => $request->employment_status,
            'wealth_source' => $request->wealth_source
        ]);


        return to_route('dashboard');
    }
}

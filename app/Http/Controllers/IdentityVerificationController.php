<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassportRequest;
use App\Models\Kyc;
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
        $data['passport'] = $this->fileUpload($request->passport_image, 'kyc');

        $request->user()->kyc()->create($data);

        return to_route('dashboard');
    }
}

<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function terms(): View
    {
        return view('website.terms');
    }

    public function privacy(): View
    {
        return view('website.privacy');
    }

    public function cookies(): View
    {
        return view('website.cookies');
    }

    public function risks(): View
    {
        return view('website.risks');
    }
}

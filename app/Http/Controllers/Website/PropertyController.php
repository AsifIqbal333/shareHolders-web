<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(): View
    {
        return view('website.properties.index');
    }

    public function show(): View
    {
        return view('website.properties.show');
    }
}

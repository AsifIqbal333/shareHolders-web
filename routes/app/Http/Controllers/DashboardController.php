<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // request()->user()->wallet()->create();
        return view('dashboard');
    }
}

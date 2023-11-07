<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(): View
    {
        return view('website.properties.index', [
            'properties' => Property::with(['images'])->get(),
        ]);
    }

    public function show(): View
    {
        return view('website.properties.show');
    }

    public function ajax(Request $request)
    {
        return view('website.properties.ajax', [
            'properties' => Property::with(['images'])->whereStatus($request->status)->get(),
        ]);
        return response()->json(['html' => view('website.properties.ajax', [
            'properties' => Property::with(['images'])->whereStatus($request->status)->get(),
        ]), 'request' => $request->all()]);
    }
}

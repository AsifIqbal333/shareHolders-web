<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('website.homepage', [
            'testimonials' => Testimonial::whereShow(true)->get(),
            'properties' => Property::with(['images'])->get(),
        ]);
    }
}

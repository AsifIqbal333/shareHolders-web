<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $sell = Category::whereSlug('sell')->first();

        return view('website.sell', [
            'faqs' => Faq::whereShow(true)->when($sell, fn ($q) => $q->where('category_id', $sell->id))->get()
        ]);
    }
}

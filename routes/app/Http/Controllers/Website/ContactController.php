<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Contracts\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('website.contact');
    }

    public function save(MessageRequest $request)
    {
        Message::create($request->validated());

        return back()->with('success', __('Your message has been send. One of our representative member will contact you soon.'));
    }
}

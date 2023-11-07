<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('feedback');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['feedback' => ['required', 'string']]);

        $request->user()->feedback()->create([
            'feedback' => $request->feedback
        ]);

        return back();
    }
}

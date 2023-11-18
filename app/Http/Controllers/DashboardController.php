<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tabs = [
            [
                'icon' => 'fas fa-volleyball-ball',
                'title' => auth()->user()->user_info?->tier?->name,
                'description' => __('View your tier progression and benefits'),
                'link' => route('rewards.tiers')
            ],
            [
                'icon' => 'far fa-user',
                'title' => __('Account Information'),
                'description' => __('View and manage your personal details'),
                'link' => route('profile.edit')
            ],
            [
                'icon' => 'fas fa-cogs',
                'title' => __('Rate Us'),
                'description' => __('Your reveiw matters to us'),
                'link' => route('rating.index')
            ],
            [
                'icon' => 'fas fa-pencil-alt',
                'title' => __('Submit Feedback'),
                'description' => __('Share your thoughts or request a feature'),
                'link' => route('feedback.index')
            ],
            [
                'icon' => 'fas fa-gift',
                'title' => __('Refer a Friend'),
                'description' => __('Invite your friends and receive rewards'),
                'link' => route('rewards.referrals')
            ],
            [
                'icon' => 'fas fa-book',
                'title' => __('Glossary'),
                'description' => __('Understand financial terms and concepts'),
                'link' => '#'
            ],
            [
                'icon' => 'fas fa-play-circle',
                'title' => __('How It Works'),
                'description' => __('A visual guide to how we operate'),
                'link' => '#'
            ],
        ];
        return view('dashboard', compact('tabs'));
    }
}

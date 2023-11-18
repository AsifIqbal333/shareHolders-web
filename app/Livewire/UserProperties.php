<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class UserProperties extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.user-properties', [
            'investments' => request()->user()->investments()->with('property')->paginate()
        ]);
    }
}

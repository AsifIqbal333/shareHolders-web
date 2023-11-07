<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Transactions extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.transactions', [
            'transactions' => request()->user()->transactions()->paginate()
        ]);
    }
}

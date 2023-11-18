<?php

namespace App\Livewire\Kyc;

use Livewire\Component;

class Tier extends Component
{
    public $value = "5000", $tiers, $tier;

    public function mount($tiers)
    {
        $this->tiers = $tiers;
        $this->tier = $this->tiers->first();
    }

    public function render()
    {
        return view('livewire.kyc.tier');
    }

    public function updatedValue()
    {
        $this->tier = $this->tiers->where('starting', '<=', (int)$this->value)->last();
    }
}

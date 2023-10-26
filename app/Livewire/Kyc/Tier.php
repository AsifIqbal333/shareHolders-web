<?php

namespace App\Livewire\Kyc;

use Livewire\Component;

class Tier extends Component
{
    public $value = "5000", $tiers, $tier;

    public function mount($tiers)
    {
        $this->tiers = $tiers;
        $this->tier = $this->tiers[0];
    }

    public function render()
    {
        return view('livewire.kyc.tier');
    }

    public function updatedValue()
    {
        if ((int)$this->value >= 25000) {
            $this->tier = $this->tiers[1];
        } else {
            $this->tier = $this->tiers[0];
        }
    }
}

<?php

namespace App\Livewire;

use App\Models\Location;
use App\Models\Selling as ModelsSelling;
use Livewire\Component;

class Selling extends Component
{
    public $tabs = [], $bedrooms_list = [];
    public $tab = 'neighbourhood';
    public $locations;
    public $location_id, $address, $bedrooms, $first_name, $last_name, $phone, $email;

    public function mount()
    {
        $this->tabs = [
            'neighbourhood' => 'Neighbourhood',
            'address' => 'Address',
            'bedrooms' => 'Bedrooms',
            'basic_info' => 'Basic Info',
        ];
        $this->bedrooms_list = ['studio', '1', '2', '3+'];
        $this->locations = Location::get();
    }

    public function render()
    {
        return view('livewire.selling');
    }

    public function updatedLocationId()
    {
        $this->changeTab('address');
    }

    public function updatedBedrooms()
    {
        $this->changeTab('basic_info');
    }

    public function changeTab($tab)
    {
        $this->tab = $tab;
    }

    public function saveRequest()
    {
        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'location_id' => $this->location_id,
            'bedrooms' => $this->bedrooms,
            'address' => $this->address,
        ];
        ModelsSelling::create($data);

        session()->flash('success', "Your request has been submitted. We will shortly contact with you.");
        return $this->redirect('/sell');
    }
}

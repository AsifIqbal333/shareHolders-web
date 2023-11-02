<?php

namespace App\Livewire;

use App\Enums\PropertyStatus;
use App\Models\Property;
use Livewire\Component;

class Properties extends Component
{
    public $status = '';
    public $statuses = [];

    public function mount()
    {
        $this->status = PropertyStatus::Avaialble->value;
        $this->statuses = property_statuses();
    }

    public function render()
    {
        return view('livewire.properties', [
            'properties' => Property::with(['country:id,code', 'category', 'images'])->whereStatus($this->status)->get()
        ]);
    }

    public function changeStatus($status)
    {
        $this->status = $status;
        $properties = Property::with(['images'])->whereStatus($this->status)->get();
        $items = [];
        foreach ($properties as $property) {
            $item['id'] = $property->id;
            $images = [];
            foreach ($property->images as $index => $image) {
                $record['position'] =  $index;
                $record['el'] = $image->id;
                $images[] = $record;
            }
            $item['items'] = $images;
            $items[] = $item;
        }
        $this->dispatch('status-changed', items: $items);
    }
}

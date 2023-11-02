<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;

class Bookmark extends Component
{
    public Property $property;
    public bool $is_bookmark;

    public function mount()
    {
        if (request()->user()->bookmarks()->where('property_id', $this->property->id)->exists()) {
            $this->is_bookmark = true;
        } else {
            $this->is_bookmark = false;
        }
    }

    public function render()
    {
        return view('livewire.bookmark');
    }

    public function toggleBookmark()
    {
        if ($this->is_bookmark) {
            request()->user()->bookmarks()->where('property_id', $this->property->id)->delete();
        } else {
            request()->user()->bookmarks()->create([
                'property_id' => $this->property->id
            ]);
        }
        $this->is_bookmark = !$this->is_bookmark;
    }
}

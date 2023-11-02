<?php

namespace App\Livewire;

use App\Models\Bookmark;
use Livewire\Component;

class Bookmarks extends Component
{
    public function render()
    {
        return view('livewire.bookmarks', [
            'bookmarks' => request()->user()->bookmarks()->with(['property.images', 'property.category'])->get(),
        ]);
    }

    public function removeBookmark($id)
    {
        Bookmark::find($id)?->delete();
    }
}

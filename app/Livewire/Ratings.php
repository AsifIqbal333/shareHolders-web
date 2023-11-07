<?php

namespace App\Livewire;

use Livewire\Component;

class Ratings extends Component
{
    public int $stars = 0;
    public $rating_numbers;
    public $experience = '', $experience_date, $title;

    public function mount()
    {
        $this->rating_numbers = [1, 2, 3, 4, 5];
    }

    public function render()
    {
        return view('livewire.ratings');
    }

    public function setStars($star)
    {
        $this->stars = $star;
    }

    public function saveRating()
    {
        dd('rating');
        request()->user()->rating()->create([
            'title' => $this->title,
            'stars' => $this->stars,
            'experience' => $this->experience,
            'experience_date' => $this->experience_date,
        ]);

        return redirect('user/ratings');
    }
}

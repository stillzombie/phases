<?php

namespace App\Http\Livewire;

use App\Track;
use Livewire\Component;

class Tracked extends Component
{
    public $tracks;
    public function mount()
    {
        $this->tracks = Track::get()->byDate()->toArray();
    }

    public function render()
    {
        return view('livewire.tracked');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Theater;
class TheaterList extends Component
{
    public function render()
    {
        $theaters = Theater::all();
        return view('livewire.theater-list', compact('theaters'));
    }
}

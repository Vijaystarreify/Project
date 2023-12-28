<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Screen;
use App\Models\Theater;

class TheaterCreate extends Component
{
    public $name;
    public $location;
    public $selectedScreens = [];

    public function render()
    {
        $screens = Screen::all();

        return view('livewire.theater-create', compact('screens'));
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'selectedScreens' => 'required|array|min:1',
            'selectedScreens.*' => 'exists:screens,id',
        ]);

        $theater = Theater::create([
            'name' => $validatedData['name'],
            'location' => $validatedData['location'],
        ]);

        $theater->screens()->attach($this->selectedScreens);

        session()->flash('success', 'Theater created successfully!');

        return redirect()->route('theater.create');
    }
}

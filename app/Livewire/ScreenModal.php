<?php

namespace App\Livewire;

use Livewire\Component;

class ScreenModal extends Component
{
    public $theaterId;
    public $name;
    public $capacity;

    protected $rules = [
        'name' => 'required|string|max:255',
        'capacity' => 'required|integer|min:1',
    ];

    public function mount($theaterId)
    {
        $this->theaterId = $theaterId;
    }

    public function saveScreen()
    {
        $this->validate();

        Screen::create([
            'name' => $this->name,
            'capacity' => $this->capacity,
            'theater_id' => $this->theaterId,
        ]);

        $this->reset();
        $this->emit('screenAdded');
    }

    public function render()
    {
        return view('livewire.screen-modal');
    }
}

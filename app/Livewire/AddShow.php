<?php

namespace App\Livewire;

use Livewire\Component;

class AddShow extends Component
{
    public $movies;
    public $screens;
    public $selectedMovie;
    public $selectedScreen;
    public $showTime;
    public $startDate;

    public function render()
    {
        $this->movies = Movie::all();
        $this->screens = Screen::all();

        return view('livewire.add-show');
    }
    public function saveShow()
    {
        // Implement the logic to save the show data to the database
        // This will be called when the "Add Show" form is submitted
        // You can access the form data using $this->selectedMovie, $this->selectedScreen, etc.
        // For example:
        Show::create([
            'movie_id' => $this->selectedMovie,
            'screen_id' => $this->selectedScreen,
            'show_time' => $this->showTime,
            'start_date' => $this->startDate,
            // Add other fields as needed
        ]);

        // Optionally, you can add a success message or redirect to another page
        session()->flash('message', 'Show added successfully!');
        return redirect()->to('/dashboard'); // Redirect to the dashboard or any other page
    }

}

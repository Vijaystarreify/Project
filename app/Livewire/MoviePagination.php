<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Movie;

class MoviePagination extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function sortBy($columnName)
    {
        if ($this->sortField === $columnName) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function updated($propertyName)
    {
        // Reset the page only when the searchTerm is updated
        if ($propertyName === 'searchTerm') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        return view('livewire.movie-pagination', [
            'movies' => Movie::query()
                ->where('title', 'like', $searchTerm)
                ->orWhere('release_date', 'like', $searchTerm)
                ->orWhere('genre', 'like', $searchTerm)
                ->orWhere('directors', 'like', $searchTerm)
                ->orWhere('cast', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm)
                ->orWhere('duration', 'like', $searchTerm)
                ->orWhere('language', 'like', $searchTerm)
                ->orWhere('country', 'like', $searchTerm)
                ->orWhere('image', 'like', $searchTerm)
                ->orWhere('trailer_url', 'like', $searchTerm)
                ->orWhere('rating', 'like', $searchTerm)
                ->orWhere('ticket_price', 'like', $searchTerm)
                ->orWhere('showtimes', 'like', $searchTerm)
                ->orWhere('theater_name', 'like', $searchTerm)
                ->orWhere('location', 'like', $searchTerm)
                ->orWhere('screen_number', 'like', $searchTerm)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
        ]);
    }
}

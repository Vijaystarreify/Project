<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Theater;

class TheaterPagination extends Component
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
// dd("here");
        return view('livewire.theater-pagination', [
            'theaters' => Theater::query()
                ->where('name', 'like', $searchTerm)
                ->orWhere('location', 'like', $searchTerm)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
                
        ]);
    }
}

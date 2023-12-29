<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Show;


class ShowPagination extends Component
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

        return view('livewire.show-pagination', [
            'shows' => Show::query()
                ->where('movie_id', 'like', $searchTerm)
                ->orWhere('screen_id', 'like', $searchTerm)
                ->orWhere('show_time', 'like', $searchTerm)
                ->orWhere('start_date', 'like', $searchTerm)
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
        ]);
    }
}

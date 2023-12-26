<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Movie;

class MoviePagination extends Component
{
	use WithPagination;
	public $searchTerm;
	public $sortField = 'created_at';
	public $sortDirection = 'desc';

    public function sortBy($columnName){
		if($this->sortField === $columnName) {
			$this->sortDirection = $this->swapSortDirection();
		} else {
			$this->sortDirection = 'asc';
		}
		$this->sortField = $columnName;
	}
	
	public function swapSortDirection() {
		return $this->sortDirection === 'asc' ? 'desc' : 'asc';	 
	}
	
	public function updated(){
		$this->resetPage();
	}
    public function render()
    {
		$searchTerm = '%'.$this->searchTerm.'%';
		return view('livewire.movie-pagination', [
			'movies' => Movie::query()
				->where('name','like', $searchTerm)
				->orWhere('link','like', $searchTerm)
				->orWhere('image','like', $searchTerm)
			->orderBy($this->sortField, $this->sortDirection)
			->paginate(10),
        ]);
    }
}


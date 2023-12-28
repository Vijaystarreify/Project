

  <section class="section main-section">
    <div class="notification blue">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div>
                <span class="icon"><i class="mdi mdi-buffer"></i></span>
                <b> Admin: Movies</b>
            </div>
        </div>
    </div>
    <div class="card has-table">
        <header class="card-header flex justify-between">
            <x-input id="search-field" placeholder="Search" type="search" name="search" wire:model="searchTerm" />
            <a href="{{ route('movie-form', ['id' => 'new']) }}">
                <x-button class="py-3">
                    {{ __('Add Movie') }}
                </x-button>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th wire:click="sortBy('id')">ID<i class="ml-1 fa-solid fa-sort"></i></th>  
                        <th wire:click="sortBy('title')">Title<i class="ml-1 fa-solid fa-sort"></i></th>
                        <!-- <th wire:click="sortBy('trailer_url')">Link<i class="ml-1 fa-solid fa-sort"></i></th>
                        <th wire:click="sortBy('image')">Image<i class="ml-1 fa-solid fa-sort"></i></th> -->
                        <th wire:click="sortBy('description')">Description<i class="ml-1 fa-solid fa-sort"></i></th>
                        <th wire:click="sortBy('release_date')">Release Date<i class="ml-1 fa-solid fa-sort"></i></th>
                        <!-- <th wire:click="sortBy('genre')">Genre<i class="ml-1 fa-solid fa-sort"></i></th>
                        <th wire:click="sortBy('directors')">Directors<i class="ml-1 fa-solid fa-sort"></i></th>
                        <th wire:click="sortBy('cast')">Cast<i class="ml-1 fa-solid fa-sort"></i></th> -->
                        <th class="font-semibold text-sm px-6 py-4">EDIT</th>
                        <th class="font-semibold text-sm px-6 py-4">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>
                            <td data-label="ID">{{ $movie->id }}</td>
                            <td data-label="Title">{{ $movie->title }} </td>
                            <td data-label="Trailer URL"><a href="{{ $movie->trailer_url }}" target="_blank">{{ $movie->trailer_url }}</a></td>                           
                            <!-- <td data-label="Image"><img src="{{ asset('storage/movies-img-' . env('APP_ENV') . '/' . $movie->image) }}" alt="{{ $movie->title }}" class="movie-image"></td> -->
                            <!-- <td data-label="Description">{!! $movie->description !!}</td>
                            <td data-label="Release Date">{{ $movie->release_date }}</td> -->
                            <!-- <td data-label="Genre">{{ $movie->genre }}</td>
                            <td data-label="Directors">{{ $movie->directors }}</td>
                            <td data-label="Cast">{{ $movie->cast }}</td> -->
                            <td data-label="Release Date">{{ $movie->release_date }}</td> 
                            <td class="actions-cell">
                                <div class="buttons center nowrap">
                                    <a href="{{ route('movie-form', ['id' => $movie->id]) }}">
                                        <button class="button small blue --jb-modal" data-target="sample-modal-2"
                                            type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </button>
                                    </a>
                                </div>
                            </td>
                            <td class="actions-cell">
                                <div class="buttons center nowrap">
                                    <a href="{{ route('movie-delete', ['id' => $movie->id]) }}">
                                        <button class="button small red --jb-modal" data-target="sample-modal"
                                            type="button">
                                            <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="table-pagination">
                <div class="flex items-center justify-between">
                    <div class="buttons">
                        {{ $movies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

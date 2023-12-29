<!-- resources/views/livewire/show-pagination.blade.php -->

<div>
    <h2 class="text-2xl font-bold mb-4">List of Shows</h2>

    <!-- Add Show Button -->
    <div class="mb-4">
        <a href="{{ route('show-form', ['id' => 'new']) }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Show
            </button>
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th wire:click="sortBy('id')">ID<i class="ml-1 fa-solid fa-sort"></i></th>
                <th wire:click="sortBy('movie_id')">Movie<i class="ml-1 fa-solid fa-sort"></i></th>
                <th wire:click="sortBy('screen_id')">Screen<i class="ml-1 fa-solid fa-sort"></i></th>
                <th wire:click="sortBy('showtime')">Showtime<i class="ml-1 fa-solid fa-sort"></i></th>
                <th wire:click="sortBy('start_date')">Start Date<i class="ml-1 fa-solid fa-sort"></i></th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shows as $show)

                <tr>
                    <td class="border border-gray-300 p-2">{{ $show->id }}</td>
                    <td class="border border-gray-300 p-2">{{ $show->movie->title }}</td>
                    <td class="border border-gray-300 p-2">{{ $show->screen->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $show->show_time }}</td>
                    <td class="border border-gray-300 p-2">{{ $show->start_date }}</td>
                    <td class="border border-gray-300 p-2 text-center">
                        <a href="{{ route('show-form', ['id' => $show->id]) }}" class="text-blue-500">
                            <button class="button small blue --jb-modal" data-target="sample-modal-2" type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </button>
                        </a> |
                        <a href="{{ route('show-delete', ['id' => $show->id]) }}" class="text-red-500"
                            onclick="return confirm('Are you sure?')">
                            <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="table-pagination">
        <div class="flex items-center justify-between">
            <div class="buttons">
                {{ $shows->links() }}
            </div>
        </div>
    </div>
</div>


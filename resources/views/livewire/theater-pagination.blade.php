<div>
    <h2 class="text-2xl font-bold mb-4">List of Theaters</h2>

    <!-- Add Theater Button -->
    <div class="mb-4">
        <a href="{{ route('theater-form', ['id' => 'new']) }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Theater
            </button>
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr> <th wire:click="sortBy('id')">ID<i class="ml-1 fa-solid fa-sort"></i></th>
                <th wire:click="sortBy('name')">Theater Name<i class="ml-1 fa-solid fa-sort"></i></th>
                <th wire:click="sortBy('location')">Location<i class="ml-1 fa-solid fa-sort"></i></th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($theaters as $theater)
                <tr>  
                    <td class="border border-gray-300 p-2">{{ $theater->id }}</td>
                    <td class="border border-gray-300 p-2">{{ $theater->name }}</td>
                    <td class="border border-gray-300 p-2">{{ $theater->location }}</td>
                    <td class="border border-gray-300 p-2 text-center">                       
                     <a href="{{ route('theater-form', ['id' => $theater->id]) }}" class="text-blue-500"> <button class="button small blue --jb-modal" data-target="sample-modal-2" type="button">
                     <span class="icon"><i class="mdi mdi-eye"></i></span>
                     </button></a>|
                    <a href="{{ route('theater-delete', ['id' => $theater->id]) }}" class="text-red-500" onclick="return confirm('Are you sure?')"> <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button></a>
                    <button class="button small green" wire:click="$set('showAddScreenModal', true)">
                    <span class="icon"><i class="mdi mdi-plus"></i></span> Add Screen
                     </button> 
                     @if($showAddScreenModal)
              <livewire:add-screen-form :theater="$theater" />
                      @endif
                    </td>
                </tr>
               
            @endforeach
        </tbody>
    </table>

    <div class="table-pagination">
        <div class="flex items-center justify-between">
            <div class="buttons">
                {{ $theaters->links() }}
            </div>
        </div>
    </div>
</div>

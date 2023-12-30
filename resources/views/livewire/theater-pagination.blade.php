
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
                    <div x-data="{ showModal: false }">
                    <button @click="showModal = true" class="button small green">
                     <span class="icon"><i class="mdi mdi-plus"></i></span> Add Screen
                     </button>
                     <div x-show="showModal" class="fixed inset-0 bg-black opacity-50" @click="showModal = false"></div>
<!-- The Modal itself -->
           <div x-show="showModal" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded shadow-lg">
          <h3 class="text-2xl font-bold mb-4">Add Screen</h3>
    <!-- Add Screen Form -->
    <form id="addScreenForm">
    <input type="hidden" name="theater_id" value="{{ $theater->id }}">
        <div class="mb-4">
            <label for="screenName" class="block text-sm font-medium text-gray-700">Screen Name</label>
            <input type="text" id="screenName" name="screenName" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
            <label for="seats" class="block text-sm font-medium text-gray-700">Number of Seats</label>
            <input type="number" id="seats" name="seats" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
        </div>
        <button type="button" @click="addScreen" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
        </div>
         </div>
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
    </div>
    <script>
    function addScreen() {
        var formData = new FormData(document.getElementById('addScreenForm'));
        axios.post('{{ route("add-screen") }}', formData)
            .then(function (response) {
                closeModal();
            })
            .catch(function (error) {
                console.error(error);
            });
    }
    function closeModal() {

 document.getElementById('addScreenForm').reset();
        Alpine.data['x-data'].showModal = false;
    }
</script>
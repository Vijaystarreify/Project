<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="container mx-auto whitespace-nowrap bg-white overflow-hidden p-8 rounded-lg">
        <form class="m-2" method="POST" action="{{ route('save-theater-data') }}" enctype="multipart/form-data">
            @csrf
            <x-validation-errors class="mb-4" />
            @if (session('status'))
                <div class="text-lg text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            @php
                $button = ($id == 'new') ? 'Add' : 'Update';
            @endphp

            <input type="hidden" id="id" name="id" value="{{ $theater->id ?? '' }}" />
            <div class="grid mx-8 mt-4">
                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="name" value="{{ __('Theater Name') }}" />
                    <x-input class="w-6/12" id="name" type="text" name="name" value="{{ old('name', $theater->name ?? '') }}" required />
                </div>
                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="location" value="{{ __('Location') }}" />
                    <x-input id="location" class="w-6/12" type="text" name="location" value="{{ old('location', $theater->location ?? '') }}" required />
                </div>
                <div class="mt-4 ml-2">
                <x-button class="ml-20 px-6">
                    {{ $button }}
                </x-button>
            </div>
                @if ($id != 'new') {{-- Check if editing, then show screen details --}}
                @if ($theater->screens)
                        <div class="mt-4">
                            <x-label class="text-xl md:font-bold" value="{{ __('Screens') }}" />
                            <table class="mt-2 w-full border">
                                <thead>
                                    <tr>
                                        <th class="p-2 border">Screen Name</th>
                                        <th class="p-2 border">Capacity</th>
                                        <th class="p-2 border">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($theater->screens as $screen)
                                        <tr>
                                            <td class="p-2 border">{{ $screen->name }}</td>
                                            <td class="p-2 border">{{ $screen->capacity }}</td>
                                            <td class="p-2 border">
                                            <a href="#" class="text-blue-500 hover:underline" onclick="openEditModal('{{ $screen->id }}', '{{ $theater->id }}')">Edit</a>
                                        <a href="#" class="text-red-500 hover:underline" onclick="deleteScreen('{{ $screen->id }}')">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endif
        </form>
    </div>
    <div id="editModal" class="fixed inset-0 z-10 overflow-y-auto hidden">
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-black bg-opacity-50 absolute "></div>
    <div class="bg-white p-8 max-w-md w-full rounded shadow-lg">
      <!-- Modal content with form -->
      <h2 class="text-xl font-bold mb-4">Edit Screen</h2>
      <form>
      @csrf
      <input type="hidden" id="id" name="id" value="" />
      <div class="mb-4">
        <label for="screenName" class="block text-gray-700 text-sm font-bold mb-2">Screen Name:</label>
        <input type="text" id="screenName" name="screenName" value="" class="w-full border border-gray-300 p-2 rounded" readonly>
    </div>
    <div class="mb-4">
        <label for="capacity" class="block text-gray-700 text-sm font-bold mb-2">Capacity:</label>
        <input type="number" id="capacity" name="capacity" value="" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:border-blue-500">
    </div>
    <button type="button" onclick="updateScreen()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
      </form>
    </div>
  </div>
</div>
<script>
  function openEditModal(screenId, theaterId) {
    console.log(screenId,theaterId);
    var modal = document.getElementById('editModal');
    modal.classList.remove('hidden');
  }
        function updateScreen() {
        var screenId = ''; 
        var theaterId = ''; 
        var capacity = document.getElementById('capacity').value;

        fetch('/update-screen-capacity', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                screenId: screenId,
                theaterId: theaterId,
                capacity: capacity,
            }),
        })
        .then(response => response.json())
        .then(data => {
           
       
        })
        .catch(error => {
            console.error('Error updating screen capacity:', error);
            // Handle the error as needed
        });
    }
  



</script>
</x-app-layout>


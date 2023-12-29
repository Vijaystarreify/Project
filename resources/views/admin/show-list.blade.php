<x-app-layout>
    <x-slot name="header">
        <!-- You can add any header content here if needed -->
    </x-slot>

    @if (session('status'))
        <div class="text-lg text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-skin-page shadow rounded-lg mb-5">
        <div class="flex flex-col mb-5">
            @livewire('show-pagination')
        </div>
    </div>
</x-app-layout>
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
                @if ($id != 'new') {{-- Check if editing, then show screen details --}}
                @if ($theater->screens)
                <div class="mt-4 flex justify-around">
            <x-label class="w-3/12 text-xl md:font-bold" for="screen_id" value="{{ __('Select Screen') }}" />
            <select class="w-6/12" id="screen_id" name="screen_id" required>
                @foreach ($theater->screens as $screen)
                    <option value="{{ $screen->id }}" {{ old('screen_id', $theater->screen_id) == $screen->id ? 'selected' : '' }}>
                        {{ $screen->name }}
                    </option>
                @endforeach
            </select>
        </div>
                        <div class="mt-4 flex justify-around">
                            <x-label class="w-3/12 text-xl md:font-bold" for="capacity" value="{{ __('Capacity') }}" />
                            <x-input class="w-6/12" id="capacity" type="number" name="capacity" value="{{ old('capacity', optional($theater->screens->first())->capacity) }}" required />
                        </div>
                    @endif
                @endif
            <div class="mt-4 ml-2">
                <x-button class="ml-20 px-6">
                    {{ $button }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>

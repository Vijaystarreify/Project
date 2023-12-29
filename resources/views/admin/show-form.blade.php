<x-app-layout>
    <x-slot name="header">
        <!-- You can add any header content here if needed -->
    </x-slot>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <div class="container mx-auto">
        <form action="{{ route('save-show-data') }}" method="post">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Show
             </button>
            <input type="hidden" name="id" value="{{ $show->id ?? '' }}">
             
            <div class="mt-4 flex justify-around">
                <x-label class="w-3/12 text-xl md:font-bold" for="movie_id" value="{{ __('Select Movie') }}" />
                <select name="movie_id" class="w-6/12">
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}" {{ (optional($show->movie)->id == $movie->id) ? 'selected' : '' }}>
                            {{ $movie->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4 flex justify-around">
                <x-label class="w-3/12 text-xl md:font-bold" for="screen_id" value="{{ __('Select Screen') }}" />
                <select name="screen_id" class="w-6/12">
                    @foreach ($screens as $screen)
                        <option value="{{ $screen->id }}" {{ (optional($show->screen)->id == $screen->id) ? 'selected' : '' }}>
                            {{ $screen->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4 flex justify-around">
                <x-label class="w-3/12 text-xl md:font-bold" for="showtime" value="{{ __('Showtime') }}" />
                <x-input id="showtime" class="w-6/12" type="text" name="showtime" value="{{ old('showtime', $show->show_time ?? '') }}" required />
            </div>

            <div class="mt-4 flex justify-around">
                <x-label class="w-3/12 text-xl md:font-bold" for="start_date" value="{{ __('Start Date') }}" />
                <x-input id="start_date" class="w-6/12" type="date" name="start_date" value="{{ old('start_date', $show->start_date ?? '') }}" required />
            </div>


        </form>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr('#showtime', {
            enableTime: true,
            noCalendar: true,
            dateFormat: 'H:i',
        });
    });
</script>


  <x-app-layout>
    <x-slot name="header">
        <!-- You can add any header content here if needed -->
    </x-slot>

    <div class="container mx-auto whitespace-nowrap bg-white overflow-hidden p-8 rounded-lg">
        <form class="m-2" method="POST" action="{{ route('save-movie-data') }}" enctype="multipart/form-data">
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

            <input type="hidden" id="id" name="id" value="{{ $movie->id ?? '' }}" />

            <div class="grid mx-8 mt-4">
                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="title" value="{{ __('Title') }}" />
                    <x-input class="w-6/12" id="title" type="text" name="title" value="{{ old('title', $movie->title ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="release_date" value="{{ __('Release Date') }}" />
                    <x-input id="release_date" class="w-6/12" type="date" name="release_date" value="{{ old('release_date', $movie->release_date ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="genre" value="{{ __('Genre(s)') }}" />
                    <x-input id="genre" class="w-6/12" type="text" name="genre" value="{{ old('genre', $movie->genre ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="directors" value="{{ __('Director(s)') }}" />
                    <x-input id="directors" class="w-6/12" type="text" name="directors" value="{{ old('directors', $movie->directors ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="cast" value="{{ __('Cast') }}" />
                    <x-input id="cast" class="w-6/12" type="text" name="cast" value="{{ old('cast', $movie->cast ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="description" value="{{ __('Description') }}" />
                    <div class="w-6/12">
                        <textarea id="description" name="description" class="w-6/12 resize rounded-md">{{ $movie->description ?? '' }}</textarea>
                    </div>
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="duration" value="{{ __('Duration (minutes)') }}" />
                    <x-input id="duration" class="w-6/12" type="number" name="duration" value="{{ old('duration', $movie->duration ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="language" value="{{ __('Language') }}" />
                    <x-input id="language" class="w-6/12" type="text" name="language" value="{{ old('language', $movie->language ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="country" value="{{ __('Country') }}" />
                    <x-input id="country" class="w-6/12" type="text" name="country" value="{{ old('country', $movie->country ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="poster_image" value="{{ __('Poster Image') }}" />
                    <x-input class="w-6/12" id="image" type="file" name="image" />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="trailer_url" value="{{ __('Trailer URL') }}" />
                    <x-input id="trailer_url" class="w-6/12" type="url" name="trailer_url" value="{{ old('trailer_url', $movie->trailer_url ?? '') }}" />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="rating" value="{{ __('Rating') }}" />
                    <x-input id="rating" class="w-6/12" type="text" name="rating" value="{{ old('rating', $movie->rating ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="ticket_price" value="{{ __('Ticket Price') }}" />
                    <x-input id="ticket_price" class="w-6/12" type="number" step="0.01" name="ticket_price" value="{{ old('ticket_price', $movie->ticket_price ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="showtimes" value="{{ __('Showtimes') }}" />
                    <x-input id="showtimes" class="w-6/12" type="text" name="showtimes" value="{{ old('showtimes', $movie->showtimes ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="theater_name" value="{{ __('Theater Name') }}" />
                    <x-input id="theater_name" class="w-6/12" type="text" name="theater_name" value="{{ old('theater_name', $movie->theater_name ?? '')
					}}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="location" value="{{ __('Location') }}" />
                    <x-input id="location" class="w-6/12" type="text" name="location" value="{{ old('location', $movie->location ?? '') }}" required />
                </div>

                <div class="mt-4 flex justify-around">
                    <x-label class="w-3/12 text-xl md:font-bold" for="screen_number" value="{{ __('Screen Number') }}" />
                    <x-input id="screen_number" class="w-6/12" type="number" name="screen_number" value="{{ old('screen_number', $movie->screen_number ?? '') }}" />
                </div>
            </div>

            <div class="mt-4 ml-2">
                <x-button class="ml-20 px-6">
                    {{ $button }}
                </x-button>
            </div>
        </form>

        <!-- Include CKEditor script -->
        <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor.create(document.getElementById("description"), {
                // CKEditor configuration options
                toolbar: {
                    items: [
                        'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', '|',
                        'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                    ],
                    shouldNotGroupWhenFull: true
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
            });
        </script>
    </div>
</x-app-layout>
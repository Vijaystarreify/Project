<x-app-layout>
   	<x-slot name="header">
	</x-slot>
	<div class="container mx-auto whitespace-nowrap bg-white overflow-hidden p-8 rounded-lg">
		<form class="m-2" method="POST" action="{{route('save-movie-data')}}" enctype="multipart/form-data">
			<x-validation-errors class="mb-4" />
			@if (session('status'))
				<div class="text-lg text-green-600">
					{{ session('status') }}
				</div>
			@endif
			@csrf
			 
			
			@if($id == 'new')
			@php
				$button = 'Add';
			@endphp
			<div class="grid mx-8 mt-4">
				<div class="mt-4 flex justify-around">
					<x-label class="w-3/12 text-xl md:font-bold" for="name" value="{{ __('Name') }}" />
					<x-input class="w-6/12" id="name" type="text" name="name" value="{{old('name')}}" required />
				</div>
	
				<div class="mt-4 flex justify-around">
					<x-label class="w-3/12 text-xl md:font-bold" for="link" value="{{ __('Link') }}" />
					<x-input id="link" class="w-6/12" type="text" name="link" value="{{old('link')}}" required />
				</div>
				<div class="mt-4 flex justify-around">
					<x-label class="w-3/12 text-xl md:font-bold" for="image" value="{{ __('Image') }}"/>
					<x-input class="w-6/12" id="image" type="file" name="image"/>
				</div>
				<div class="mt-4 flex justify-around">
					<x-label class="w-3/12 text-xl md:font-bold" for="description" value="{{ __('Description') }}" />
					<div class="w-6/12">
					   <textarea id="description" name="description" class="w-6/12 resize rounded-md"></textarea>
				    </div>  
				</div>  
           </div>
           @else
		   @php
		       $button = 'Update';
		   @endphp
		   <input type="hidden" id="id" name="id" required value="{{$movie->id}}" />
		   <div class="grid mx-8 mt-4">
				<div class="mt-4 flex justify-around">
					<x-label class="w-3/12 text-xl md:font-bold" for="name" value="{{ __('Name') }}" />
					<x-input class="w-6/12" id="name" type="text" name="name" value="{{old('name',$movie->name)}}" required />
				</div>
				<div class="mt-4 flex justify-around">
					<x-label class="w-3/12 text-xl md:font-bold" for="link" value="{{ __('Link') }}" />
					<x-input id="link" class="w-6/12" type="text" name="link" value="{{old('link',$movie->link)}}" required />
				</div>
				<div class="mt-4 flex justify-around">
					<x-label class="w-3/12 text-xl md:font-bold" for="image" value="{{ __('Image') }}"/>
					<x-input class="w-6/12" id="image" type="file" name="image"/>
				</div>
				<div class="mt-4 flex justify-around">
					<x-label class="w-3/12 text-xl md:font-bold" for="description" value="{{ __('Description') }}" />
					<div class="w-6/12">
					    <textarea id="description" name="description" class="resize rounded-md">{{$movie->description}}</textarea>
				    </div>  
				</div>  
           </div>
			@endif	
			
			<div class="mt-4 ml-2">
				<x-button class="ml-20 px-6 ">
					 {{$button}}
				</x-button>
			</div>
		</form>
		<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
      
	 <script>
           ClassicEditor.create(document.getElementById("description"), {
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
 
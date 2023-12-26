<x-app-layout>
   	<x-slot name="header">
	</x-slot>
	<div class="container mx-auto whitespace-nowrap bg-white overflow-hidden p-8 rounded-lg">
		<form class="m-2" method="POST" action="" enctype="multipart/form-data">
			<x-validation-errors class="mb-4" />
			@if (session('status'))
				<div class="text-lg text-green-600">
					{{ session('status') }}
				</div>
			@endif
			@csrf

		</form>
	</div>
</x-app-layout>
 
@extends('news.template')

@section('content')
	<h2>News Post Submission</h2>
	<form action="{{ route('news.store') }}" method="POST">
		{{ csrf_field() }}

		<label for="title" class="pt-2 bold">Title</label>
		<input type="text"
			   class="form-control bg-dark text-white-50 border-info {{ $errors->has('title') ? ' is-invalid' : '' }}"
			   name="title" id="title"/>

		<label for="description" class="pt-3">Description</label>
		<textarea
			class="form-control bg-dark text-white-50 border-info {{ $errors->has('description') ? ' is-invalid' : '' }}"
			name="description" id="description"
			rows="4"></textarea>

		@if($errors->any())
			<span class="invalid-feedback" role="alert">
            	@foreach ($errors->all() as $error)
					<strong>{{ $error }}</strong>
				@endforeach
			</span>
		@endif

		<div class="row justify-content-center">
			<input type="submit" class="btn-sm btn-outline-info bg-dark text-info mt-3 w-25" value="Submit News Post"/>
		</div>
	</form>
@endsection

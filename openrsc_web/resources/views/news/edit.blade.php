@extends('news.template')

@section('content')

	<!-- Presents the reply form -->
	<form method="post" action="{{ route('news.update', $news_post->id) }}">
		@method('PATCH')
		@csrf

		<input type="text"
			   class="form-control bg-dark text-white-50 border-info {{ $errors->has('title') ? ' is-invalid' : '' }}"
			   name="title" id="title" value="{{ $news_post->title }}"/>

		<textarea
			class="form-control bg-dark text-white-50 border-info {{ $errors->has('description') ? ' is-invalid' : '' }}"
			name="description" id="description"
			rows="4">
			{{ $news_post->description }}
		</textarea>

		@if($errors->any())
			<span class="invalid-feedback" role="alert">
            	@foreach ($errors->all() as $error)
					<strong>{{ $error }}</strong>
				@endforeach
			</span>
		@endif

		<input type="hidden" value="{{ $news_post->id }}" name="id"/>
		<div class="row justify-content-center">
			<input type="submit" class="btn-sm btn-outline-info bg-dark text-info mt-3 w-25"
				   value="Update News Post"/>
		</div>
	</form>
	<div class="mt-3 row justify-content-center">
		<a href="{{ route('news.index') }}" class="text-info">Go Back</a>
	</div>
@endsection

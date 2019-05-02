@extends('news.template')

@section('content')

	<!-- Presents the reply form -->
	<form method="post" action="{{ route('news_responses.update', $news_response->id) }}">
		@method('PATCH')
		@csrf

		<textarea
			class="form-control bg-dark text-white-50 border-info {{ $errors->has('reply') ? ' is-invalid' : '' }}"
			name="reply" id="reply"
			rows="4">
			{{ $news_response->reply }}
		</textarea>

		@if($errors->any())
			<span class="invalid-feedback" role="alert">
            	@foreach ($errors->all() as $error)
					<strong>{{ $error }}</strong>
				@endforeach
			</span>
		@endif

		<input type="hidden" value="{{ $news_response->news_post_id }}" name="news_post_id"/>
		<div class="row justify-content-center">
			<input type="submit" class="btn-sm btn-outline-info bg-dark text-info mt-3 w-25"
				   value="Update Comment"/>
		</div>
	</form>
	<div class="mt-3 row justify-content-center">
		<a href="{{ route('news.index') }}" class="text-info">Go Back</a>
	</div>
@endsection

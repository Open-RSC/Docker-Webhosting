@extends('news.template')

@section('content')
	<h4>{{ $news_post->title }}</h4>
	<p class="small text-white-50">
		Posted by<img src="{{ asset('img/0.svg') }}" height="10px" width="10px" class="mb-1 ml-1"/> {{ $news_post->user->name }} {{ $news_post->created_at->diffForHumans() }}.
	</p>
	<p class="text-white-50 d-block mb-4">{{ $news_post->description }}</p>

	<!-- Displays all the responses to this news post -->
	@if($news_post->news_responses->count() > 0)
		<div class="d-block mb-4">
			Recent Comments: ({{ $news_post->news_responses->count() }})
			@foreach($news_post->news_responses as $news_response)
				<div class="small text-white-50 d-block">
					<span class="text-secondary">
						{{ $news_response->user->name }} {{ $news_response->created_at->diffForHumans() }}:
					</span>
					<span>
						"{{ $news_response->reply }}"
					</span>
				</div>
			@endforeach
		</div>
	@endif

	<!-- Presents the reply form -->
	<form action="{{ route('news_responses.store') }}" method="POST">
		{{ csrf_field() }}
		<label for="reply" class="mb-1">Your Thoughts:</label>
		<textarea
			class="form-control bg-dark text-white-50 border-info {{ $errors->has('reply') ? ' is-invalid' : '' }}"
			name="reply" id="reply"
			rows="4">
		</textarea>
		@if ($errors->has('reply'))
			<span class="invalid-feedback" role="alert">
            	<strong>{{ $errors->first('reply') }}</strong>
			</span>
		@endif
		<input type="hidden" value="{{ $news_post->id }}" name="news_post_id"/>
		<div class="row justify-content-center">
			<input type="submit" class="btn-sm btn-outline-info bg-dark text-info mt-3 w-25"
				   value="Share Your Thoughts"/>
		</div>
	</form>

	<div class="mt-3 row justify-content-center">
		<a href="{{ route('news.index') }}" class="text-info">Go Back</a>
	</div>
@endsection

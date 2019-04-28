@extends('news.template')

@section('content')
	<h4>{{ $news_post->title }}</h4>
	<p class="small text-white-50 d-block mb-4">{{ $news_post->description }}</p>

	@if($news_post->news_responses->count() > 0)
		<div class="d-block mb-4">
			Recent Comments:
			@foreach($news_post->news_responses as $news_response)
				<div class="small text-white-50 d-block">
					<span>"{{ $news_response->reply }}"</span>
				</div>
			@endforeach
		</div>
	@endif

	<form action="{{ route('news_responses.store') }}" method="POST">
		{{ csrf_field() }}
		<label for="reply" class="mb-1">Your Thoughts:</label>
		<textarea class="form-control bg-dark text-white-50 border-info" name="reply" id="reply"
				  rows="4"></textarea>
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

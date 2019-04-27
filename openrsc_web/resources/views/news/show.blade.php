@extends('news.template')

@section('content')
	<h4>{{ $news_post->title }}</h4>
	<p class="small text-white-50 d-block">{{ $news_post->description }}</p>

	<form action="{{ route('news_responses.store') }}" method="POST">
		{{ csrf_field() }}
		<label for="reply" class="pt-3">Your thoughts:</label>
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

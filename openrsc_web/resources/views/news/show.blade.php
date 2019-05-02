@extends('news.template')

@section('content')
	<div class="h4 mb-0"><a href="{{ route('news.index') }}">{{ $news_post->title }}</a></div>
	<span class="small text-white-50">
		Posted by<img src="{{ asset('img/0.svg') }}" height="10px" width="10px"
					  class="mb-1 ml-1"
					  alt="rank"/> {{ $news_post->user->name }} {{ $news_post->created_at->diffForHumans() }}.
	</span>
	<span class="small text-white-50 d-block mt-2 mb-4 pl-1">{{ $news_post->description }}
		@if($news_post->user->id = Auth::id())
			<a href="{{ route('news.edit', $news_post->id) }}" class="text-info">Edit Post</a>
			<form action="{{ route('news.destroy', $news_post->id)}}" method="post">
				@csrf
				@method('DELETE')
				<button class="btn-xs text-danger border-dark bg-dark btn-outline-dark" title="Delete Post"
						type="submit">X</button>
			</form>
		@endif
	</span>

	<!-- Displays all the responses to this news post -->
	@if($news_post->news_responses->count() > 0)
		<div class="d-block mb-4">
			Recent Comments: ({{ $news_post->news_responses->count() }})
			@foreach($news_post->news_responses as $news_response)
				<div class="small text-white-50 pl-1">
					<span class="text-secondary">
						<img src="{{ asset('img/0.svg') }}" height="10px" width="10px" class="mb-1 ml-1"/> {{ $news_response->user->name }} wrote {{ $news_response->created_at->diffForHumans() }}:
					</span>
					<span class="pl-1">
						{{ $news_response->reply }}
					</span>
					@if($news_response->user->id = Auth::id())
						<a href="{{ route('news_responses.edit', $news_response->id) }}" class="pl-1 pr-1 text-info">Edit
							Comment</a>
						<form action="{{ route('news_responses.destroy', $news_response->id)}}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn-xs text-danger border-dark bg-dark btn-outline-dark"
									title="Delete Comment" type="submit">X
							</button>
						</form>
					@endif
				</div>
			@endforeach
		</div>
	@endif

	<!-- Presents the reply form -->
	<form method="post" action="{{ route('news_responses.store') }}">
		@method('POST')
		@csrf

		<label for="reply" class="mb-1">Your Thoughts:</label>

		<textarea
			class="form-control bg-dark text-white-50 border-info {{ $errors->has('reply') ? ' is-invalid' : '' }}"
			name="reply" id="reply"
			rows="4">
		</textarea>

		@if($errors->any())
			<span class="invalid-feedback" role="alert">
            	@foreach ($errors->all() as $error)
					<strong>{{ $error }}</strong>
				@endforeach
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

@extends('news.template')

@section('content')
	<h2 class="mb-3">Recent News</h2>

	@foreach($news_posts as $news_post)
		<div class="mb-4">
			<a href="{{ route('news.show', $news_post->id) }}" class="text-info">{{ $news_post->title }}</a>
			<span
				class="small text-secondary">Posted by<img src="{{ asset('img/0.svg') }}" height="10px" width="10px"
														   class="mb-1 ml-1"/> {{ $news_post->user->name }} {{ $news_post->created_at->diffForHumans() }}.
				@if($news_post->news_responses->count() == 1)
					<a href="{{ route('news.show', $news_post->id) }}" class="text-info">({{ $news_post->news_responses->count() }} comment)</a>
				@endif
				@if($news_post->news_responses->count() > 1)
					<a href="{{ route('news.show', $news_post->id) }}" class="text-info">({{ $news_post->news_responses->count() }} comments)</a>
				@endif
			</span>
			<p class="small text-white-50">{{ \Illuminate\Support\Str::limit($news_post->description, 350) }}
				@if(strlen($news_post->description)>350)
					<a href="{{ route('news.show', $news_post->id) }}" class="text-info">Continue reading &raquo;</a>
				@endif
			</p>
		</div>
	@endforeach

	{{ $news_posts->links('pagination::bootstrap-4') }}
@endsection

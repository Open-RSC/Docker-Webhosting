@extends('news.template')

@section('content')
	<h2 class="mb-3">Recent News</h2>

	@foreach($news_posts as $news_post)
		<div class="mb-4">
			<a href="{{ route('news.show', $news_post->id) }}" class="text-info">{{ $news_post->title }}</a>
			<span class="small text-secondary">|</span>
			<span class="small text-primary">Marwolf</span>
			<span class="small text-secondary">|</span>
			<span class="small text-primary">{{ $news_post->created_at }} EDT</span>
			<p class="small text-white-50">{{ \Illuminate\Support\Str::limit($news_post->description, 350) }}
				@if(strlen($news_post->description)>350)
					<a href="{{ route('news.show', $news_post->id) }}" class="text-info">Continue reading &raquo;</a>
				@endif
			</p>
		</div>
	@endforeach

	{{ $news_posts->links('pagination::bootstrap-4') }}
@endsection

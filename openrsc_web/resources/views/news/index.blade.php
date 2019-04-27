<div class="container">
	<h1>Recent News:</h1>
	<hr/>

	@foreach($news_posts as $news_post)
		<div class="well">
			<h3>{{ $news_post->title }}</h3>
			<p>
				{{ $news_post->description }}
			</p>
			<a href="{{ route('news.show', $news_post->id) }}" class="btn btn-primary btn-sm">View Details</a>
		</div>
	@endforeach

	{{ $news_posts->links() }}
</div>

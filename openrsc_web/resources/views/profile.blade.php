@extends('template')

@section('content')
	<div class="container">
		<h1>{{ $user->name }}'s Profile</h1>
		<p>
			See what {{ $user->name }} has been up to.
		</p>

		<div class="row">
			<div class="col-md-6">
				<h3>News Posts</h3>
				<!-- display all the questions that this user submitted -->
				@foreach($user->news_posts as $news_post)
					<div>
						<div>
							<h4>{{ $news_post->title }}</h4>
							<span class="small">
								{{ $news_post->description }}
							</span>
						</div>
						<div class="panel-footer">
							<a href="{{ route('news.show', $news_post->id) }}" class="btn-sm btn-outline-info bg-dark text-info mt-3 w-25">
								View News
							</a>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col-md-6">
				<h3>Comments</h3>
				<!-- display all the answers that this user submitted -->
				@foreach($user->news_responses as $news_response)
					<div>
						<div class="small">
							{{ $news_response->news_post->title }}
						</div>
						<div>
							<p>
								{{ $news_response->reply }}
							</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection

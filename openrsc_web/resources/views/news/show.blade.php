@extends('news.template')

@section('content')
	<h4>{{ $news_post->title }}</h4>
	<p class="small text-white-50">{{ $news_post->description }}</p>

	<div class="row justify-content-center">
		<a href="{{ route('news.index') }}" class="text-info">Go Back</a>
	</div>
@endsection

@extends('templateborder')
@section('content')

	<div class="pt-4">
		<span class="d-block">
			Game Launcher for Windows / Mac / Linux
		</span>
		<span class="d-block">
			<a href="{{ $download_jar }}">
				Click Here
			</a>
		</span>

		<span class="d-block pt-4">
			Android Version
		</span>
		<span class="d-block">
			<a href="{{ $download_apk }}">
				Click Here
			</a>
		</span>

		<span class="d-block pt-4">
			Having trouble? Try the latest version of Java!
		</span>
	<span class="d-block">
		<a href="{{ $download_jre }}">
			Click Here
		</a>
	</span>

	</div>

@endsection

@extends('templateborder')
@section('content')

	<div class="pt-4">
		<span class="d-block">
			Download for Windows / Mac / Linux
		</span>
		<span class="d-block">
			<a href="{{ $download_jar }}">
				Click Here
			</a>
		</span>

		<span class="d-block pt-3">
			Download the Android app
		</span>
		<span class="d-block">
			<a href="{{ $download_apk }}">
				Click Here
			</a>
		</span>

		<span class="d-block pt-5">
			Having trouble? Try the latest version of Java
		</span>
		<span class="d-block">
			<a href="{{ $download_jre }}">
				Click Here
			</a>
		</span>

		<span class="d-block pt-3">
			Please install Gboard if using Samsung Android
		</span>
		<span class="d-block">
			<a href="https://play.google.com/store/apps/details?id=com.google.android.inputmethod.latin&hl=en_US">
				Click Here
			</a>
		</span>
	</div>

@endsection

@extends('templateborder')
@section('content')

	<header class="rsc-box rsc-header">
		<h1>Select Game Type</h1>
		<a class="rsc-link" href="/index.html">Main menu</a>
	</header>
	<section class="rsc-game-select-wrap">

		<div class="rsc-game-select rsc-select-free">
			<a class="rsc-select-button" href="{{ $download_jar }}">
				<small>Click here for</small>
				<strong>PC</strong>
			</a>
		</div>
		<div class="rsc-game-select rsc-select-members">
			<a class="rsc-select-button" href="{{ $download_apk }}">
				<small>Click here for</small>
				<strong>Android</strong>
			</a>
		</div>
	</section>
	<div class="rsc-scroll">
		<label for="rsc-client-type">
			Select client version - only change this if the default doesn't work
		</label>
		<br>
		<select id="rsc-client-type">
			<option value="web">Web Client Using JavaScript (Recommended)</option>
			<option value="download">Desktop Client Using Java</option>
		</select>
	</div>

	<div class="d-block">
		<span class="d-block">
			Having trouble? Try the latest version of Java
		</span>
		<span class="d-block">
			<a href="{{ $download_jre }}">
				Click Here
			</a>
		</span>

		<span class="d-block pt-3">
			Android players: please install Gboard
		</span>
		<span class="d-block">
		<a href="https://play.google.com/store/apps/details?id=com.google.android.inputmethod.latin&hl=en_US">
			Click Here
		</a>
	</span>
	</div>

@endsection

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body>
@include('includes.navbar')

<section id="home">
	<div class="panel position-fixed table-wrapper-scroll-y">
		<div class="text-info table-dark spaced-body full-width">
			<div class="container border-left border-info border-right table-wrapper-scroll-y">
				@yield('content')
			</div>
		</div>

@include('includes.footer')
@include('includes.footerscripts')
</body>
</html>

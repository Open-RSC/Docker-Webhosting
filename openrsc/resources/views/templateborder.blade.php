<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.header')
<body>
<!--include('includes.navbar')-->
@include('includes.bordertop')
<section id="home">
	@yield('content')
</section>
@include('includes.borderbottom')
@include('includes.footer')
@include('includes.footerscripts')
</body>
</html>

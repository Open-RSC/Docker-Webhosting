<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.header')
    <body>
    @include('layouts.navbar')
    @include('layouts.itembody')
    @include('layouts.footer')
    @include('layouts.footerscripts')
    </body>
</html>
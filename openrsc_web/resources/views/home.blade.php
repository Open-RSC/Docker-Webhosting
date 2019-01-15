<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.header')
    <body>
    @include('layouts.navbar')
    @include('layouts.body')
    @include('layouts.footer')
    </body>
</html>

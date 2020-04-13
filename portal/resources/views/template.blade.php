<!doctype html>
<html lang="en">
@include('includes.header')
<body>
<!--include('includes.navbar')-->
<div class="rsc-container">
    <section id="home">
        @yield('content')
    </section>
    @include('includes.footer')
</div>
</body>
</html>

@extends('template')
@section('content')

    <div class="rsc-border-top rsc-border-bar"></div>
    <div class="rsc-wrap">

        <div class="d-lg-none">hide on screens wider than lg</div>
        <div class="d-none d-lg-block">hide on screens smaller than lg</div>

        <!-- Full version -->
        <div class="d-none d-lg-block">
            <img class="rsc-logo rounded" src="/images/apocalypse.png" style="height: 180px; width: 570px;" alt="Open RuneScape Classic logo">
        </div>

        <!-- Mobile version -->
        <div class="d-lg-none">
            <img class="d-block" src="/images/logo.png" style="height: 130px; width: 130px;" alt="Open RuneScape Classic logo">
            <div class="d-block">Open RuneScape Classic</div>
        </div>

        <section class="rsc-button-wheel">
            <a class="rsc-button rsc-play-button" href="/play.html">Play Game</a>
            <a class="rsc-button rsc-stone-button" href="/manual.html">Manual</a>
            <a class="rsc-button rsc-stone-button" href="/support.html">Customer Support</a>
            <a class="rsc-button rsc-stone-button" href="/community.html">Community</a>
            <a class="rsc-button rsc-stone-button" href="/support.html">Message Centre</a>
            <a class="rsc-button rsc-stone-button" href="/news.html">News &amp; Updates</a>
            <a class="rsc-button rsc-stone-button" href="/library.html">Library of Varrock</a>
            <a class="rsc-button rsc-stone-button" href="/hiscores.html">Hiscores</a>
        </section>
    </div>

@endsection

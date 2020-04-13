@extends('template')
@section('content')

    <div class="rsc-border-top rsc-border-bar"></div>
    <div class="rsc-wrap">

        <!-- Full version -->
        <div class="d-none d-sm-block">
            <img class="rsc-logo" src="/images/logo.png" style="width: 395px;"
                 alt="Open RuneScape Classic logo">
        </div>

        <!-- Mobile version -->
        <div class="d-sm-none">
            <img class="rsc-logo" src="/images/logo.png" style="width: 250px;"
                 alt="Open RuneScape Classic logo">
        </div>

        <p class="rsc-player-count">Striving for an authentic RuneScape Classic and more.</p>

        <section class="rsc-button-wheel">
            <a class="rsc-button rsc-play-button" href="/play">Play Game</a>
            <a class="rsc-button rsc-stone-button" href="/wiki">Wiki</a>
            <a class="rsc-button rsc-stone-button" href="https://discord.gg/ABdFCqn">Discord</a>
            <a class="rsc-button rsc-stone-button" href="/forum">Forum</a>
            <a class="rsc-button rsc-stone-button" href="https://orsc.dev">Source Code</a>
            <a class="rsc-button rsc-stone-button" href="https://reddit.com/r/rsc">Reddit</a>
            <a class="rsc-button rsc-stone-button" href="https://rsc.plus">RSC+</a>
            <a class="rsc-button rsc-stone-button" href="https://orsc.dev/open-rsc/Single-Player">Single Player</a>
        </section>
    </div>

@endsection

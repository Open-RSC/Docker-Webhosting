@extends('template')
@section('content')

    <div class="rsc-border-top rsc-border-bar"></div>
    <div class="rsc-wrap">
        <header class="rsc-box rsc-header">
            <h1>Select Game Type</h1>
            <a class="rsc-link" href="/">Main Menu</a>
        </header>
        <section class="rsc-game-select-wrap">
            <div class="rsc-game-select rsc-select-free">
                <a class="rsc-select-button" href="/openrsc" title="1x authentic RSC">
                    <small>Click here for</small>
                    <strong>Open RSC</strong>
                </a>
            </div>
            <div class="rsc-game-select rsc-select-members">
                <a class="rsc-select-button" href="/cabbage" title="5x custom RSC">
                    <small>Click here for</small>
                    <strong>Cabbage</strong>
                </a>
            </div>
        </section>
    </div>
@endsection

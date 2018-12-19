<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Open RSC</title>
    <meta name="description" content="Striving for a replica RSC game and more.">
    <meta name="keywords" content="openrsc,open rsc,rsc,open-rsc,rs classic">

    <!-- CSS and JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <!--Theme-->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/darkly/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-w+yWASP3zYNxxvwoQBD5fUSc1tctKq4KUiZzxgkBSJACiUp+IbweVKvsEhMI+gz7" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="180x180" href="/css/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/css/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/css/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/css/images/favicons/site.webmanifest">
    <link rel="mask-icon" href="/css/images/favicons/safari-pinned-tab.svg" color="#5bbad5">

    <!-- Styles -->
    <style>
        html, body {
            font-family: 'Exo', sans-serif;
            font-weight: 200;
        }

        /* Fixes dropdown menus placed on the right side */
        .ml-auto {
            left: auto !important;
            right: 0px;
            z-index: 1;
        }

        @media (min-width: 992px) {
            .nav-item {
                font-size: 16px;
                margin: 3px;
                padding: 0px;
                z-index: 1;
            }
        }

        header {
            z-index: 1;
        }

        header video {
            z-index: 0;
        }

        header .overlay {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .links > a {
            padding: 0 10px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            color: white;
            z-index: 1;
        }

        .links > a:hover {
            color: gold;
        }

        .featurelist li {
            font-size: 18px;
            z-index: 1;
        }

        ul {
            list-style-type: none;
            z-index: 1;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/highscores') }}">Highscores</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/worldmap') }}">Live Map</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/chat') }}">Chat Logs</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/database') }}">Information</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/links') }}">Links</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/calendar') }}">Event Calendar</a></li>
        </ul>
        @if (Route::has('login'))
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ url('/account') }}"><i
                                class="fas fa-gamepad"></i> Manage
                            Players</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i
                                class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i
                                    class="fas fa-lock"></i></i>
                                Register</a></li>
                    @endif
                @endauth
            </ul
        @endif
    </div>
</nav>

<div class="container-fluid">

    <div class="d-flex justify-content-center" style="position: relative; top: 15px; z-index: 1;">
        <img src="/css/images/logo.png" height="300px" width="300px" alt="Open RSC Logo"/>
    </div>
    <div class="d-flex justify-content-center" style="position: relative; top: 18px; z-index: 1;">
        <h4>Striving for a replica RSC game and more</h4>
    </div>
    <div class="d-flex justify-content-center" style="position: relative; top: 15px; z-index: 1;">
        <div class="links">
            <a href="https://game.openrsc.com/downloads/OpenRSC.jar">Download</a> <font color="gold">|</font>
            <a href="#https://game.openrsc.com/downloads/openrsc.apk">Android</a> <font color="gold">|</font>
            <a href="https://github.com/open-rsc/game" target="_blank">GitHub</a> <font color="gold">|</font>
            <a href="/faq">FAQ</a> <font color="gold">|</font>
            <a href="https://forge.laravel.com">Discord</a>
        </div>
    </div>


    <div class="d-flex justify-content-center" style="position: relative; top: -65px; z-index: 0;">
        <video id="video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" height="600px"
               width="800px">
            <script>
                var videoPlayer = document.getElementById('video');

                function playIt() {
                    videoPlayer.play();
                    var videos = [
                        "1",
                        "2",
                        "3",
                        "4",
                    ], videos = videos[Math.floor(Math.random() * videos.length)];
                    videoPlayer.src = "/css/images/" + videos + ".mp4";
                }

                videoPlayer.addEventListener('ended', playIt, false);
                playIt();
            </script>
        </video>
    </div>


    <div class="panel panel-default"
         style="position: fixed; left: 0px; top: 480px; z-index: 0; list-style-type: none;">
        <div class="panel-body">
            <ul>
                <li>
                    Players Online:
                    <a href="/online">15<?php //echo playersOnline(); ?></a>
                </li>
                <li>
                    Server Status:
                    <a href="#"><?php //echo checkStatus("game.openrsc.com", "43594"); ?>Online</a>
                </li>
                <li>
                    Registrations Today:
                    <a href="/registrationstoday">2<?php //echo newRegistrationsToday(); ?></a>
                </li>
                <li>
                    Logins Today:
                    <a href="/loginstoday">28<?php //echo loginsToday(); ?></a>
                </li>
                <li>
                    Unique Players:
                    <a href="/stats">532<?php //echo uniquePlayers(); ?></a>
                </li>
                <li>
                    Total Players:
                    <a href="/stats">1251<?php //echo totalGameCharacters(); ?></a>
                </li>
                <li>
                    Gold:
                    <a href="/stats">30,903,652<?php //echo banktotalGold(); ?></a>
                </li>
                <li>
                    Total Time:
                    <a href="/stats">222d 10h 43m<?php //echo totalTime(); ?></a>
                </li>
            </ul>
            <ul>
                <li>
                    XP Rate:
                    <a href="#">1x</a>
                </li>
                <li>
                    Batched Skills:
                    <a href="#">Disabled</a>
                </li>
                <li>
                    Player Commands:
                    <a href="#">Disabled</a>
                </li>
                <li>
                    Bank Notes:
                    <a href="#">Enabled</a>
                </li>
                <li>
                    Drop X:
                    <a href="#">Enabled</a>
                </li>
                <li>
                    NPC Blocking:
                    <a href="#">Aggressive</a>
                </li>
                <li>
                    Quick Banking:
                    <a href="#">Enabled</a>
                </li>
                <li>
                    Bots:
                    <a href="#">Not Allowed</a>
                </li>
            </ul>
        </div>
    </div>

</div>

<div class="navbar fixed-bottom navbar-light bg-light">
    Footer Example
</div>

</body>
</html>

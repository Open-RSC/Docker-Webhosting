<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- CSS and JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/darkly/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-w+yWASP3zYNxxvwoQBD5fUSc1tctKq4KUiZzxgkBSJACiUp+IbweVKvsEhMI+gz7" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
            height: 100vh;
            margin: 0;
        }

        header {
            position: absolute;
            background-color: black;
            height: 75vh;
            min-height: 25rem;
            width: 100%;
            overflow: hidden;
        }

        header video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 0;
            -ms-transform: translateX(-50%) translateY(-50%);
            -moz-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }

        header .container {
            position: relative;
            z-index: 2;
        }

        header .overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: 1;
        }

        @media (pointer: coarse) and (hover: none) {
            header {
                background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
            }

            header video {
                display: none;
            }
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .top-left {
            position: absolute;
            left: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            padding: 0 10px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            color: white;
        }

        .links > a:hover {
            color: gold;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .statistics {
            position: absolute;
            left: 200px;
        }

        .features {
            position: absolute;
            right: 200px;
        }

        .featurelist li {
            font-size: 18px;
        }

        ul {
            list-style-type: none;
        }

    </style>
</head>
<body>

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-left links">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/highscores') }}">Highscores</a>
            <a href="{{ url('/worldmap') }}">Live Map</a>
            <a href="{{ url('/chat') }}">Chat Logs</a>
            <a href="{{ url('/database') }}">Information</a>
            <a href="{{ url('/links') }}">Links</a>
            <a href="{{ url('/calendar') }}">Event Calendar</a>
        </div>
        <div class="top-right links">
            @auth
                <a href="{{ url('/account') }}">Manage Players</a>
            @else
                <a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span>
                        Register</a>
                @endif
            @endauth
        </div>
    @endif

    <header>
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="/css/images/2.mp4" type="video/mp4">
        </video>
        <div class="container h-100">
            <div class="d-flex text-center h-100">
                <div class="my-auto w-100 text-white">
                    <h1 class="display-3">Open RSC</h1>
                    <h4>Striving for a replica RSC game and more</h4>
                    <div class="links">
                        <a href="https://game.openrsc.com/downloads/OpenRSC.jar">Download</a> |
                        <a href="#https://game.openrsc.com/downloads/openrsc.apk">Android</a> |
                        <a href="https://github.com/open-rsc/game" target="_blank">GitHub</a> |
                        <a href="/faq">FAQ</a> |
                        <a href="https://forge.laravel.com">Discord</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="title m-b-md">
            <img class="logo" src="css/images/logo.png" height="400px" alt="Open RSC"/>
        </div>
    </div>

    <div class="statistics">
        <ul class="featurelist">
            <li>
                Players Online:
                <a href="/online">15
                    <?php //echo playersOnline(); ?>
                </a>
            </li>
            <li>
                Server Status:
                <a href="#">
                    <?php //echo checkStatus("game.openrsc.com", "43594"); ?>Online
                </a>
            </li>
            <li>
                Registrations Today:
                <a href="/registrationstoday">2
                    <?php //echo newRegistrationsToday(); ?>
                </a>
            </li>
            <li>
                Logins Today:
                <a href="/loginstoday">28
                    <?php //echo loginsToday(); ?>
                </a>
            </li>
            <li>
                Unique Players:
                <a href="/stats">532
                    <?php //echo uniquePlayers(); ?>
                </a>
            </li>
            <li>
                Total Players:
                <a href="/stats">1251
                    <?php //echo totalGameCharacters(); ?>
                </a>
            </li>
            <li>
                Gold:
                <a href="/stats">30,903,652
                    <?php //echo banktotalGold(); ?>
                </a>
            </li>
            <li>
                Total Time:
                <a href="/stats">222d 10h 43m
                    <?php //echo totalTime(); ?>
                </a>
            </li>
        </ul>
    </div>

    <div class="features">
        <ul class="featurelist">
            <li>
                XP Rate:
                <a href="#">
                    1x
                </a>
            </li>
            <li>
                Batched Skills:
                <a href="#">
                    Disabled
                </a>
            </li>
            <li>
                Player Commands:
                <a href="#">
                    Disabled
                </a>
            </li>
            <li>
                Bank Notes:
                <a href="#">
                    Enabled
                </a>
            </li>
            <li>
                Drop X:
                <a href="#">
                    Enabled
                </a>
            </li>
            <li>
                NPC Blocking:
                <a href="#">
                    Aggressive
                </a>
            </li>
            <li>
                Quick Banking:
                <a href="#">
                    Enabled
                </a>
            </li>
            <li>
                Bots:
                <a href="#">
                    Not Allowed
                </a>
            </li>
        </ul>
    </div>

</div>
</body>
</html>

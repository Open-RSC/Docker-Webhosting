<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Open RSC</title>
	<meta name="description" content="Striving for a replica RSC game and more.">
	<meta name="keywords" content="openrsc,open rsc,rsc,open-rsc,rs classic,rsc cabbage,runescape classic">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
	<link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">

	<!-- Custom fonts for this template -->
	<script defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js"
			integrity="sha384-EIHISlAOj4zgYieurP0SdoiBYfGJKkgWedPHH4jCzpCXLmzVsw1ouK59MuUtP4a1"
			crossorigin="anonymous"></script>
	<link
		href="https://fonts.googleapis.com/css?family=Exo:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
	<title>Open RSC</title>
</head>

<!-- Fullscreen video background -->
<div class="fullscreen-bg">
	<video id="video" class="fullscreen-bg__video" playsinline="playsinline" autoplay="autoplay"
		   muted="muted"
		   loop="loop">
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
                videoPlayer.src = "./img/" + videos + ".mp4";
            }

            videoPlayer.addEventListener('ended', playIt, false);
            playIt();
		</script>
	</video>
</div>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Open Source RuneScape Classic - the massive online adventure game</title>
	<meta name="description" content="Striving for a replica RSC game and more.">
	<meta name="keywords"
		  content="RSC,RuneScape,Old RuneScape,RuneScape Classic,Adventure,2D sprite-based graphics,site,community site,MMORPG,MMO,2001,classicapplet,playclassic,fantasy,android,mobile,OldSchool,Old School,openrsc,orsc,rsccabbage,rsc cabbage,open rsc,single player runescape">
	<meta name="author" content="Marwolf">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
	<link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">

	<!-- JavaScript -->
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/js/all.min.js"></script>

	<!-- CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
</head>

<!-- Fullscreen video background -->
<!--<div class="fullscreen-bg">
	<video id="video" class="fullscreen-bg__video" playsinline="playsinline" autoplay="autoplay"
		   muted="muted"
		   loop="loop">
		<script>
            let videoPlayer = document.getElementById('video');

            function playIt() {
                videoPlayer.play();
                var videos = [
                    "1",
                    "2",
                    "3",
                    "4",
                ];
                videos = videos[Math.floor(Math.random() * videos.length)];
                videoPlayer.src = "/img/" + videos + ".mp4";
            }

            videoPlayer.addEventListener('ended', playIt, false);
            playIt();
		</script>
	</video>
</div>-->

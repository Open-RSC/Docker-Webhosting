<?php
define('IN_PHPBB', true);

include "inc/database_config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!--suppress ALL -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Open RSC</title>
	<meta name="description" content="Striving for a replica RSC game and more.">
	<meta name="keywords" content="openrsc,open rsc,rsc,open-rsc,rs classic,orsc evo,openrsc evolution">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		  integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<!-- Javascript -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
			integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
			crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
			integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
			crossorigin="anonymous"></script>
	<script src="js/grayscale.min.js"></script>

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
	<link rel="manifest" href="img/favicons/site.webmanifest">
	<link rel="mask-icon" href="img/favicons/safari-pinned-tab.svg" color="#5bbad5">

	<!-- Custom fonts for this template -->
	<script defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js"
			integrity="sha384-EIHISlAOj4zgYieurP0SdoiBYfGJKkgWedPHH4jCzpCXLmzVsw1ouK59MuUtP4a1"
			crossorigin="anonymous"></script>
	<link
		href="https://fonts.googleapis.com/css?family=Exo:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet" type="text/css">

	<!-- Custom styles for this template -->
	<link href="css/grayscale.min.css" rel="stylesheet">

	<!-- Bootstrap style overrides -->
	<style>
		html {
			overflow: hidden;
		}

		::-webkit-scrollbar {
			display: none;
		}

		.wrapper {
			display: flex;
			flex-direction: column;
			width: 1100px;
			margin: 0 auto;
			padding: 32px 48px 20px;
			color: rgb(60, 60, 60);
			-webkit-text-size-adjust: 100%;
			-webkit-tap-highlight-color: rgb(255, 255, 158);
			line-height: normal;
		}

		.about-section {
			height: 100vh;
		}

		a:hover {
			text-decoration: none;
		}

		h1.name {
			top: 53%;
			font-size: 48px;
			font-style: italic;
			font-weight: 600;
			text-shadow: 0px 0px 5px rgba(255, 255, 255, 0.2);
			-webkit-text-stroke-width: 1.8px;
			-webkit-text-stroke-color: darkgray;
		}

		.nav-item {
			font-size: 16px;
			font-weight: 600;
		}

		.fullscreen-bg__video {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(255, 255, 255, 0.95);
		}

		.fullscreen-bg {
			position: fixed;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			overflow: hidden;
			z-index: -100;
		}

		.picture {
			width: 450px;
			height: auto;
			object-fit: scale-down;
			filter: drop-shadow(0px 0px 3px #17a2b8);
		}

		@media (max-width: 1120px) {
			.picture {
				display: none;
			}

			.side-left {
				display: none;
			}

			.footer {
				display: none;
			}
		}

		.side-right {
			min-width: 280px;
			max-width: 280px;
		}

		.side-left {
			overflow: auto;
			min-width: 280px;
			max-width: 280px;
		}

		@media (min-aspect-ratio: 16/9) {
			.fullscreen-bg__video {
				height: 300%;
				top: -100%;
			}
		}

		@media (max-aspect-ratio: 16/9) {
			.fullscreen-bg__video {
				width: 300%;
				left: -100%;
			}
		}
	</style>

	<title>Open RSC</title>
</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
	<div class="container">
		<!--<a class="navbar-brand js-scroll-trigger" href="#page-top">Open RSC</a>-->
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
				data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
				aria-label="Toggle navigation">
			Menu
			<i class="fas fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#home">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="https://game.openrsc.com/downloads/OpenRSC.jar">PC</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger"
					   href="https://game.openrsc.com/downloads/openrsc.apk">Android</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#highscores">Highscores</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#worldmap">Live Map</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#information">Information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="https://github.com/open-rsc/game">Source Code</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#login">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#register">Register</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="fullscreen-bg">
	<video id="video" class="fullscreen-bg__video" playsinline="playsinline" autoplay="autoplay" muted="muted"
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
				videoPlayer.src = "img/" + videos + ".mp4";
			}

			videoPlayer.addEventListener('ended', playIt, false);
			playIt();
		</script>
	</video>
</div>

<!-- Title Section -->
<section id="home" class="about-section text-white container-fluid">
	<div class="container-fluid">
		<div class="row mb-1">

			<!-- Left column -->
			<div class="side-left col-lg-3 text-left text-info border-right border-info" style="font-size: 10px;">
				<h4>Recent Activity</h4>
				<div>
					<?php activityfeed() ?>
				</div>
			</div>

			<!-- Center column with title text -->
			<div class="col-md mx-auto text-center">
				<!--<img src="img/logo.png" height="300px" width="300px">-->
				<h2 class="display-3 text-white mb-0">Open RSC</h2>
				<!--<h2 class="display-3 font-italic text-white mb-0">Evolution</h2>-->
				<div class="text-white-50">Striving for a replica RSC game and more</div>
				<!--<div>Daring To Imagine An Entirely New Direction</div>-->
				<br>
				<br>
				<a href="https://game.openrsc.com/downloads/openrsc.apk">
					<img class="picture" src="img/android.png" class="img-fluid" height="300px" width="600px;">
				</a>
				<br>
			</div>

			<!-- Right column -->
			<div>
				<div class="side-right col-lg-3 text-left border-left border-info" style="font-size: 13px;">
					<h4 class="text-info">Statistics</h4>
					<div>
						Players Online:
						<b>
							<a href="/online">
							<span class="text-info float-right">
								<?php echo playersOnline(); ?>
							</span>
							</a>
						</b>
					</div>
					<div>
						Server Status:
						<span class="float-right">
							<?php echo checkStatus("game.openrsc.com", "43594"); ?>
						</span>
					</div>
					<div>
						Registrations Today:
						<b>
							<a href="/registrationstoday">
								<span class="text-info float-right">
									<?php echo newRegistrationsToday(); ?>
								</span>
							</a>
						</b>
					</div>
					<div>
						Logins Today:
						<b>
							<a href="/loginstoday">
								<span class="text-info float-right">
									<?php echo loginsToday(); ?>
								</span>
							</a>
						</b>
					</div>
					<div>
						Unique Players:
						<b>
							<a href="/stats">
								<span class="text-info float-right">
									<?php echo uniquePlayers(); ?>
								</span>
							</a>
						</b>
					</div>
					<div>
						Total Players:
						<b>
							<a href="/stats">
								<span class="text-info float-right">
									<?php echo totalGameCharacters(); ?>
								</span>
							</a>
						</b>
					</div>
					<div>
						Gold:
						<b>
							<a href="/stats">
								<span class="text-info float-right">
									<?php echo banktotalGold(); ?>
								</span>
							</a>
						</b>
					</div>
					<div>
						Time Played:
						<b>
							<a href="/stats">
								<span class="text-info float-right">
									<?php echo totalTime(); ?>
								</span>
							</a>
						</b>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<div class="bg-black text-white fixed-bottom social d-flex justify-content-center">
			<a href="#" class="mx-2">
				<i class="fab fa-reddit"></i>
			</a>
			<a href="#" class="mx-2">
				<i class="fab fa-discord"></i>
			</a>
			<a href="#" class="mx-2">
				<i class="fab fa-github"></i>
			</a>
		</div>
</section>

</body>
</html>

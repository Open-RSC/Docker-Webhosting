<?php
define('IN_PHPBB', true);

include "inc/database_config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="import" href="header.html">
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
<section id="home" class="about-section text-white">
	<div class="container">
		<div class="row mr-1">

			<!-- Center column with title text -->
			<div class="col-lg mx-auto text-center">
				<!--<img src="img/logo.png" height="300px" width="300px">-->
				<h2 class="display-3 text-white mb-0">Open RSC</h2>
				<!--<h2 class="display-3 font-italic text-white mb-0">Evolution</h2>-->
				<div>Striving for a replica RSC game and more</div>
				<!--<div>Daring To Imagine An Entirely New Direction</div>-->
				<br>
				<!-- Discord invite box in left column -->
				<!--<script type="text/javascript">
					discordInvite.init({
						inviteCode: '94vVKND',
						title: 'Open RSC',
						miniMode: true,
						hideIntro: true,
					});
					discordInvite.render();
				</script>
				<div class="pb-4" id="discordInviteBox"></div>-->
				<br>
				<a href="game.openrsc.com/downloads/openrsc.apk">
					<img class="picture" src="img/android.png" class="img-fluid" height="300px" width="600px;">
				</a>
			</div>

			<!-- Live Feed right column -->
			<span class="border border-dark border pt-3">
				<div class="side col-lg-3 mr-3 text-left text-truncate text-info" style="font-size: 10px;">
					<h5>Statistics</h5>
					<dl class="side-menu">
						<dt>Players Online:</dt>
						<dd>
							<b>
								<a class="white" href="/online">
									<?php echo playersOnline(); ?>
								</a>
							</b>
						</dd>
						<dt>Server Status:</dt>
						<dd>
							<b>
								<?php echo checkStatus("game.openrsc.com", "43594"); ?>
							</b>
						</dd>
						<dt>Registrations Today:
						<dd>
							<b>
								<a class="white" href="/registrationstoday">
									<?php echo newRegistrationsToday(); ?>
								</a>
							</b>
						</dd>
						<dt>Logins Today:</dt>
						<dd>
							<b>
								<a class="white" href="/loginstoday">
									<?php echo loginsToday(); ?>
								</a>
							</b>
						</dd>
						<dt>Unique Players:</dt>
						<dd>
							<b>
								<a class="white" href="/stats">
									<?php echo uniquePlayers(); ?>
								</a>
							</b>
						</dd>
						<dt>Total Players:</dt>
						<dd>
							<b>
								<a class="white" href="/stats">
									<?php echo totalGameCharacters(); ?>
								</a>
							</b>
						</dd>
						<dt>Gold:</dt>
						<dd>
							<b>
								<a class="white" href="/stats">
									<?php echo banktotalGold(); ?>
								</a>
							</b>
						</dd>
						<dt>Time Played:</dt>
						<dd>
							<b>
								<a class="white" href="/stats">
									<?php echo totalTime(); ?>
								</a>
							</b>
						</dd>
					</dl>

					<h5 class="pt-4">Live Feed</h5>
					<?php activityfeed() ?>
				</div>
				</div>
			</span>
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





<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/grayscale.min.js"></script>

</body>
</html>

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

<!-- Page-specific Bootstrap style overrides -->
<style>
	html {
		overflow: hidden;
	}
</style>

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
		<div class="row mr-1">

			<!-- Left column -->
			<div class="side-left col-lg-3 mr-3 text-left text-info border-right border-info" style="font-size: 10px;">
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
				<div class="side-right col-lg-3 mr-3 text-left border-left border-info" style="font-size: 13px;">
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


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/grayscale.min.js"></script>

</body>
</html>

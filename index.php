<?php
include "inc/header.php";
?>

<section id="home">

	<?php
	if (curPageURL() != "" && !is_array(curPageURL()) && curPageURL() != 'index') {
		if (file_exists("pages/" . curPageURL() . ".php")) {
			include("pages/" . curPageURL() . ".php");
		} else {
			include("pages/error.php");
		}
	} else if (is_array(curPageURL()) && curPageURL() != 'index') {
		$page = curPageURL();
		$subpage = $page[1];
		$page = $page[0];
		if (file_exists("pages/" . $page . ".php")) {
			include("pages/" . $page . ".php");
		} else {
			include("pages/error.php");
		}
	} else {
		?>

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
						videoPlayer.src = "../img/" + videos + ".mp4";
					}

					videoPlayer.addEventListener('ended', playIt, false);
					playIt();
				</script>
			</video>
		</div>

		<!-- Left column -->
		<div
			class="side-left text-info border-info border-right full-height mCustomScrollbar" data-mcs-theme="minimal">
			<h4 class="pl-3 pr-3">Latest Achievements</h4>
			<?php activityfeed() ?>
		</div>

		<!-- Center column with title text -->
		<div class="side-middle text-center full-height mCustomScrollbar" data-mcs-theme="minimal">
			<div class="d-block pt-5">
				<img src="img/logo.png" class="img-fluid">
			</div>

			<div class="d-block pb-3">
				<div class="text-white-50">Open Source Runescape Classic that is free forever</div>
			</div>

			<div class="d-block pt-1 pb-4 btn-group-lg">
				<a href="https://game.openrsc.com/downloads/OpenRSC.jar" class="pc btn btn-dark btn-outline-info">PC</a>
				<a href="https://game.openrsc.com/downloads/openrsc.apk" class="mobile btn btn-dark btn-outline-info">Android</a>
			</div>

			<div class="middle container-fluid border-top border-info">
				<div class="text-left text-primary small pt-3">
					<h4 class="text-info">RSC Cabbage Statistics</h4>
					<div>
						Players Online:
						<a href="cabbageonline">
					<span class="font-weight-bold text-info float-right">
						<?php echo cabbageplayersOnline(); ?>
					</span>
						</a>
					</div>
					<div>
						Server Status:
						<span class="float-right">
							<?php echo checkStatus("game.openrsc.com", "43595"); ?>
						</span>
					</div>
					<div>
						Registrations Today:
						<a href="cabbageregistrationstoday">
						<span class="font-weight-bold text-info float-right">
							<?php echo cabbagenewRegistrationsToday(); ?>
						</span>
						</a>
					</div>
					<div>
						Online Last 48 Hours:
						<a href="cabbagelogins48">
						<span class="font-weight-bold text-info float-right">
							<?php echo cabbagelogins48(); ?>
						</span>
						</a>
					</div>
					<div>
						Unique Players:
						<a href="cabbagestats">
						<span class="font-weight-bold text-info float-right">
							<?php echo cabbageuniquePlayers(); ?>
						</span>
						</a>
					</div>
					<div>
						Total Players:
						<a href="cabbagestats">
						<span class="font-weight-bold text-info float-right">
							<?php echo cabbagetotalGameCharacters(); ?>
						</span>
						</a>
					</div>
					<div>
						Sum Gold:
						<a href="cabbagestats">
						<span class="font-weight-bold text-info float-right">
							<?php echo cabbagebanktotalGold(); ?>
						</span>
						</a>
					</div>
					<div>
						Cumulative Play:
						<a href="cabbagestats">
						<span class="font-weight-bold text-info float-right">
							<?php echo cabbagetotalTime(); ?>
						</span>
						</a>
					</div>
				</div>

				<div class="text-left text-primary small pt-3">
					<h4 class="text-info">Open RSC Statistics</h4>
					<div>
						Players Online:
						<a href="online">
					<span class="font-weight-bold text-info float-right">
						<?php echo playersOnline(); ?>
					</span>
						</a>
					</div>
					<div>
						Server Status:
						<span class="float-right">
							<?php echo checkStatus("game.openrsc.com", "43594"); ?>
						</span>
					</div>
					<div>
						Registrations Today:
						<a href="registrationstoday">
						<span class="font-weight-bold text-info float-right">
							<?php echo newRegistrationsToday(); ?>
						</span>
						</a>
					</div>
					<div>
						Online Last 48 Hours:
						<a href="logins48">
						<span class="font-weight-bold text-info float-right">
							<?php echo logins48(); ?>
						</span>
						</a>
					</div>
					<div>
						Unique Players:
						<a href="stats">
						<span class="font-weight-bold text-info float-right">
							<?php echo uniquePlayers(); ?>
						</span>
						</a>
					</div>
					<div>
						Total Players:
						<a href="stats">
						<span class="font-weight-bold text-info float-right">
							<?php echo totalGameCharacters(); ?>
						</span>
						</a>
					</div>
					<div>
						Sum Gold:
						<a href="stats">
						<span class="font-weight-bold text-info float-right">
							<?php echo banktotalGold(); ?>
						</span>
						</a>
					</div>
					<div>
						Cumulative Play:
						<a href="stats">
						<span class="font-weight-bold text-info float-right">
							<?php echo totalTime(); ?>
						</span>
						</a>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>
</section>

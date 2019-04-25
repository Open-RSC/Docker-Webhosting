<!-- Fullscreen video background -->
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
<section id="home" class="text-white">
	<div class="pl-0 pr-0 pt-0">
		<div class="row" style="margin-left: 0px; margin-right: 0px;">

			<!-- Left column -->
			<div class="side-left table-wrapper-scroll-y text-left text-info border-right border-info">
				<h4 class="pl-3 pr-3">Latest Achievements</h4>

			</div>

			<!-- Center column with title text -->
			<div class="side-middle col mx-auto text-center">
				<h2 class="display-3 mb-0">OPEN RSC</h2>
				<div class="text-white-50">Striving for a replica RSC game and more</div>
				<br>
				<a href="https://game.openrsc.com/downloads/openrsc.apk">
					<img class="picture" src="img/android.png" class="img-fluid" height="300px" width="600px;">
				</a>
				<br>
				<button type="button" class="pc btn btn-dark btn-outline-info">PC Client</button>
				<button type="button" class="mobile btn btn-dark btn-outline-info">Android</button>
				<br>
				<br>
				<div class="middle container-fluid border-top border-info">
					<div class="text-left text-primary small">
						<br>
						<h4 class="text-info">Statistics</h4>
						<div>
							Players Online:
							<b>
								<a href="/online">
							<span class="text-info float-right">
                                {{ $online }}
							</span>
								</a>
							</b>
						</div>
						<div>
							Server Status:
							<span class="float-right">
                                {!! $status !!}
						    </span>
						</div>
						<div>
							Registrations Today:
							<b>
								<a href="/registrationstoday">
								<span class="text-info float-right">
                                    {{ $registrations }}
								</span>
								</a>
							</b>
						</div>
						<div>
							Logins Today:
							<b>
								<a href="/loginstoday">
								<span class="text-info float-right">
                                    {{ $logins }}
								</span>
								</a>
							</b>
						</div>
						<div>
							Unique Players:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
                                    {{ $uniquePlayers }}
								</span>
								</a>
							</b>
						</div>
						<div>
							Total Players:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
                                    {{ $totalPlayers }}
								</span>
								</a>
							</b>
						</div>
						<div>
							Gold:
							<b>
								<a href="/stats">
								<span class="text-info float-right">

								</span>
								</a>
							</b>
						</div>
						<div>
							Time Played:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
                                    {{ $time }}
								</span>
								</a>
							</b>
						</div>
						<br>
					</div>

				</div>
			</div>

			<!-- Right column -->
			<div>
				<div class="side-right table-wrapper-scroll-y border-left border-info">
					<!-- Twitter feed -->
					<h4 class="mt-3 text-info">Recent News</h4>
					<div class="text-primary small" id="tweets"></div>
				</div>
			</div>
		</div>
	</div>
</section>



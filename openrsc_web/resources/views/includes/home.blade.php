<!-- Title Section -->
<section id="home">

	<!-- Left column -->
	<div
		class="side-left text-info border-secondary border-right">
		<h4 class="pl-3 pr-3">Latest Achievements</h4>
	</div>

	<!-- Center column with title text -->
	<div class="container text-center">
		<div class="d-block pt-5">
			<img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="logo">
		</div>

		<div class="d-block pb-3">
			<div class="text-white-50">Striving for a replica RSC game and more</div>
		</div>

		<div class="d-block pt-1 pb-4">
			<div class="btn btn-md btn-secondary dropdown-toggle" data-toggle="dropdown"
				 aria-haspopup="true"
				 aria-expanded="false">
				Downloads
			</div>
			<div class="dropdown-menu bg-dark" style="padding: 0;">
				<a class="dropdown-item text-white-50 bg-dark" href="{{ asset('downloads/OpenRSC%20Launcher.exe') }}">Windows</a>
				<a class="dropdown-item text-white-50 bg-dark" href="{{ asset('downloads/OpenRSC.jar') }}">Mac /
					Linux</a>
				<a class="dropdown-item text-white-50 bg-dark" href="{{ asset('downloads/openrsc.apk') }}">Android
					App</a>
				<a class="dropdown-item text-white-50 bg-dark"
				   href="https://gitlab.openrsc.com/open-rsc/Single-Player/-/releases">Single
					Player</a>
				<a class="dropdown-item text-white-50 bg-dark" href="https://gitlab.openrsc.com/open-rsc/Game"
				   target="_blank">Source Code</a>
			</div>
		</div>

		<div class="middle container-fluid border-top border-info">
			<div class="text-left text-primary">
				<br>
				<h4 class="text-info">Statistics</h4>
				<div>
					Players Online:
					<a href="online">
                    <span class="text-info float-right">
                        {{ $online }}
                    </span>
					</a>
				</div>
				<div>
					Server Status:
					<span class="float-right">
                    {!! $status !!}
                </span>
				</div>
				<div>
					Registrations Today:
					<a href="registrationstoday">
                        <span class="text-info float-right">
                            {{ $registrations }}
                        </span>
					</a>
				</div>
				<div>
					Online Last 48 Hours:
					<a href="logins48">
                        <span class="text-info float-right">
                            {{ $logins }}
                        </span>
					</a>
				</div>
				<div>
					Unique Players:
					<a href="stats">
                        <span class="text-info float-right">
                            {{ $uniquePlayers }}
                        </span>
					</a>
				</div>
				<div>
					Total Players:
					<a href="stats">
                        <span class="text-info float-right">
                            {{ $totalPlayers }}
                        </span>
					</a>
				</div>
				<div>
					Sum Gold:
					<a href="stats">
                        <span class="text-info float-right">
                        </span>
					</a>
				</div>
				<div>
					Cumulative Play:
					<a href="stats">
                        <span class="text-info float-right">
                            {{ $totalTime }}
                        </span>
					</a>
				</div>
				<br>
			</div>
		</div>
	</div>
</section>
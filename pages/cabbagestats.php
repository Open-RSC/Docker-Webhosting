<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}
?>

<article class="text-info table-dark spaced-body full-width">
	<div class="container border-left border-info border-right table-wrapper-scroll-y mCustomScrollbar"
		 data-mcs-theme="minimal">
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Statistics</h2>
		<div class="row justify-content-center">
			<div class="text-primary">
				<h4 class="pt-4 h4 text-warning">Accounts</h4>
				<span class="d-block"><a class="text-info font-weight-bold"
										 href="online"><?php echo cabbageplayersOnline(); ?></a> players currently
					logged in.</span>
				<span class="d-block"><a class="text-info font-weight-bold"
										 href="registrationstoday"><?php echo cabbagenewRegistrationsToday(); ?></a> players have been registered
					today.</span>
				<span class="d-block"><a class="text-info font-weight-bold"
										 href="logins48"><?php echo cabbagelogins48(); ?></a> players logged in
					the last 48 hours.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo cabbageuniquePlayers(); ?></span> people have created <span
						class="text-info font-weight-bold"><?php echo cabbagetotalPlayers(); ?></span>
					players.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo cabbagetotalTime(); ?></span> total time played.</span>
			</div>
		</div>
	</div>
</article>

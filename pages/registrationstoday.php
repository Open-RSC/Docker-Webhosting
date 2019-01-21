<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}
?>

<div class="text-info table-dark">
	<div class="container border-left border-info border-right">
		<h2 class="text-center pt-5 pb-5 text-capitalize display-3" style="font-size: 38px;">Players Registered
			Today
		</h2>
		<div class="row justify-content-center" style="height: 100vh;">
			<div class="col-2 text-primary">
				<b><?php echo listregistrationsToday(); ?></b><br/><br/>
			</div>
		</div>
	</div>
</div>s

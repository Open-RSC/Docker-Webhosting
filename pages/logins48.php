<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}
?>

<div class="text-info table-dark">
	<div class="container border-left border-info border-right table-wrapper-scroll-y">
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Online Last 48 hours
		</h2>
		<div class="row justify-content-center" style="height: 100vh;">
			<div class="col-2 text-primary">
				<?php echo listlogins48(); ?>
			</div>
		</div>
	</div>
	</b><br/><br/>
</div>

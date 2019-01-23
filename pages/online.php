<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}
?>

<article class="text-info table-dark full-width">
	<div class="container border-left border-info border-right table-wrapper-scroll-y">
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Players Online</h2>
		<div class="row justify-content-center full-height">
			<div class="col-2 text-primary">
				<?php echo onlinePlayers(); ?>
			</div>
		</div>
	</div>
</article>

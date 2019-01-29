<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}
$connector = new Dbc();
$logins48 = $connector->gamequery("SELECT id, combat, username, group_id, login_date FROM openrsc_players WHERE login_date >= unix_timestamp( current_date - interval 48 hour) AND banned = '0' ORDER BY login_date DESC LIMIT 1000");
date_default_timezone_set('America/New_York');
?>

<article class="text-info table-dark spaced-body full-width">
	<div class="container border-left border-info border-right table-wrapper-scroll-y mCustomScrollbar"
		 data-mcs-theme="minimal">
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Online Last 48 hours
		</h2>
		<div class="row justify-content-center full-height mCustomScrollbar" data-mcs-theme="minimal">
			<div class="text-primary">
				<?php
				while ($row = $connector->fetchArray($logins48)) {
					if ($row["username"] == NULL) {
						echo "No players have logged in for the last 48 hours.";
					} else { ?>
						<div class="clickable-row" data-href="../player/<?php echo $row["id"] ?>">
							<div class="d-inline-block">
								<table>
									<tbody>
									<tr>
										<td class="text-monospace text-white-50 pt-0 pr-2">
											<time class="timeago" datetime="<?php echo strftime("%Y-%m-%dT%H:%M:%S", $row["login_date"]) ?>"></time>
										</td>
										<td class="pl-1" style="color: #F5FA3C; text-shadow: 1px 1px black;">
											<?php if ($row['group_id'] != 10):
												echo '<img src="../img/' . $row["group_id"] . '.svg" width="15" height="15"> ';
											else: NULL; endif; ?>
											<?php echo ucfirst($row["username"]) . ' (Level ' . $row["combat"] . ')'; ?>
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					<?php }
				} ?>
			</div>
		</div>
	</div>
</article>

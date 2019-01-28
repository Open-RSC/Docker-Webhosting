<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}
$connector = new Dbc();
$registrations_today = $connector->gamequery("SELECT id, combat, username, group_id, creation_date FROM openrsc_players WHERE creation_date >= unix_timestamp( current_date - interval 24 hour) AND banned = '0' ORDER BY creation_date DESC LIMIT 1000");
?>

<article class="text-info table-dark spaced-body full-width">
	<div class="container border-left border-info border-right">
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Players Registered Today
		</h2>
		<div class="row justify-content-center full-height mCustomScrollbar" data-mcs-theme="minimal">
			<div class="text-primary">
				<?php
				while ($row = $connector->fetchArray($registrations_today)) {
					if ($row["username"] == NULL) {
						echo "No players have been registered the last 24 hours.";
					} else { ?>
						<div class="clickable-row" data-href="../player/<?php echo $row["id"] ?>">
							<div class="d-inline-block">
								<table>
									<tbody>
									<tr>
										<td class="text-monospace text-white-50 pt-0 pr-2">
											<?php echo strftime("%b %d, %I:%M %p", $row["creation_date"]); ?>
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

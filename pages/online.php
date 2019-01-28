<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}
$connector = new Dbc();
$online_players = $connector->gamequery("SELECT id, combat, username, group_id, login_date FROM openrsc_players WHERE banned = '0' AND online = '1' ORDER BY login_date DESC LIMIT 1000");
?>

<article class="text-info table-dark spaced-body full-width">
	<div class="container border-left border-info border-right">
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Players Online
		</h2>
		<div class="row justify-content-center full-height mCustomScrollbar" data-mcs-theme="minimal">
			<div class="text-primary">
				<?php
				while ($row = $connector->fetchArray($online_players)) {
					if ($row["username"] == NULL) {
						echo "No players are online.";
					} else { ?>
						<div class="clickable-row" data-href="../player/<?php echo $row["id"] ?>">
							<div class="d-inline-block">
								<table>
									<tbody>
									<tr>
										<td class="text-monospace text-white-50 pt-0 pr-2">
											<?php echo strftime("%b %d, %I:%M %p", $row["login_date"]); ?>
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

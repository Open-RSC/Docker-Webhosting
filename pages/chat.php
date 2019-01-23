<?php
define('IN_SITE', true);

$connector = new Dbc();
$game_accounts = $connector->logquery("SELECT A.id playerID, A.group_id, B.sender, B.message, B.time FROM openrsc_chat_logs AS B LEFT JOIN openrsc_players AS A ON B.sender = A.username ORDER BY B.time DESC LIMIT 500");
date_default_timezone_set('America/New_York');
?>

	<article class="text-info table-dark full-width d-block">
		<div class="container border-left border-info border-right table-wrapper-scroll-y">
			<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Recent Chat</h2>
			<input type="text" class="pl-2 mb-2 pt-1 pb-1 text-capitalize" id="inputBox" onkeyup="search()" placeholder="Search for an player">
			<div class="tableFixHead">
				<table id="itemList" class="container table-striped table-hover table-dark text-primary">
					<tbody>
					<?php while ($row = $connector->fetchArray($game_accounts)) {
						$idLink = preg_replace("/[^A-Za-z0-9]/", "-", $row['playerID']);
						date_default_timezone_set('America/New_York'); ?>
						<tr class="clickable-row" data-href="../player/<?php echo $row['playerID'] ?>">
							<td class="text-capitalize pl-2"
								style="color: #F5FA3C; text-shadow: 1px 1px black;">
								<?php if ($row['group_id'] != 10):
									echo '<img class="mb-1" src="../img/' . $row["group_id"] . '.svg" width="10" height="10"> ';
								endif; ?>
								<?php echo $row['sender'] ?>
							</td>
							<td>
								<img class="pr-2 float-left"
									 src="https://game.openrsc.com/avatars/<?php echo $row["playerID"] ?>.png"
									 width="36"
									 height="48" onerror="this.style.display='none'">
							</td>
							<td class="text-monospace text-white-50 pt-2">
								<?php echo strftime("%b %d, %I:%M %p", $row["time"]) ?>
							</td>
							<td style="color: #F5FA3C; text-shadow: 1px 1px black;">
								<?php echo $row["message"] ?>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</article>
<?php

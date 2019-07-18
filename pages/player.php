<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}

$skill_array = array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft');

function buildSQLArray($array)
{
	$SQLarray = '';
	$size = sizeof($array) - 1;
	$i = 0;
	while ($i <= $size) {
		$SQLarray .= ($array[$i] == 'total_lvl') ? '' : (($array[$i] == 'hitpoints') ? 'exp_hits,' : 'exp_' . $array[$i] . '' . (($i == $size) ? '' : ',') . '');
		$i++;
	}
	return $SQLarray;
}

$connector = new Dbc();

$skills = buildSQLArray($skill_array);

$subpage = preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage);
$subpage = preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]~u', " ", $subpage);

$character_result = $connector->cabbagegamequery("SELECT " . $skills . ", openrsc_players.* FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE (openrsc_players.id = '$subpage' OR openrsc_players.username = '$subpage' AND openrsc_players.banned = '0')");
$character = $connector->fetchArray($character_result);

$totalTime = $connector->cabbagegamequery("SELECT SUM(`value`) FROM openrsc_player_cache AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') AND B.key = 'total_played'");

$player_logins = $connector->cabbagegamequery("SELECT * FROM openrsc_logins AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY B.time DESC LIMIT 30");

$player_chatlogs = $connector->cabbagegamequery("SELECT * FROM openrsc_chat_logs AS B LEFT JOIN openrsc_players AS A ON B.sender = A.username WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY B.time DESC LIMIT 100");

$player_pmlogs = $connector->cabbagegamequery("SELECT * FROM openrsc_private_message_logs AS B LEFT JOIN openrsc_players AS A ON B.sender = A.username OR B.reciever = A.username WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY B.time DESC LIMIT 100");

$player_tradelogs = $connector->cabbagegamequery("SELECT B.player1, B.player2, B.player1_items, B.player2_items, B.time FROM openrsc_trade_logs AS B LEFT JOIN openrsc_players AS A ON 'B.player1' = 'A.username' OR 'B.player2' = 'A.username' WHERE (A.id = '$subpage' OR A.username = '$subpage')");

$player_bank_regular = $connector->cabbagegamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_bank` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY slot");
$player_bank_mobile = $connector->cabbagegamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_bank` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY slot");

$player_invitems_regular = $connector->cabbagegamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_invitems` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY slot ASC");
$player_invitems_mobile = $connector->cabbagegamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_invitems` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY slot ASC");

$player_feed = $connector->cabbagegamequery("SELECT * FROM openrsc_live_feeds AS B LEFT JOIN openrsc_players AS A ON B.username = A.username WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY B.time DESC LIMIT 30");

$player_gang = $connector->cabbagegamequery("SELECT value FROM openrsc_player_cache AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE B.key = 'arrav_gang' AND (A.id = '$subpage' OR A.username = '$subpage')");

function bd_nice_number($n)
{
	if ($n > 1000000000000) return round(($n / 1000000000000), 1) . ' trillion';
	else if ($n > 1000000000) return round(($n / 1000000000), 1) . ' billion';
	else if ($n > 1000000) return round(($n / 1000000), 1) . ' million';
	else if ($n > 1000) return round(($n / 1000), 1) . ' thousand';

	return number_format($n);
}

?>

<?php if ($character) { ?>
<article class="text-info table-dark spaced-body full-width">
	<div class="container border-left border-info border-right table-wrapper-scroll-y mCustomScrollbar"
		 data-mcs-theme="minimal">
		<h2 class="h2 text-center text-capitalize display-3 pb-4"><?php
			if ($character['group_id'] != 10): echo "<img class=\"pr-3 mb-4 pt-3\" src=\"../img/$character[group_id].svg\" height=\"48\" width=\"55\" alt=\"group\">";
			else: NULL; endif;
			echo $character['username']; ?></h2>
		<div class="row sm-stats justify-content-center" style="text-transform: unset;">
			<div class="text-primary">
				<div class="row justify-content-center">
						<!-- Avatar -->
						<div class="pl-3 pr-3 container">
						<div class="flex-row stats">
							<div class="pt-3 display-glow">
								<?php
								$file = 'https://game.openrsc.com/img/avatars/' . $character['id'] . '.png';
								echo "<img src=\"$file\"/ style=\"height: 125px;\" class=\"display-glow\">";
								?>
							</div>

							<!-- Skill levels -->
							<div id="sm-skill" class="pt-4">
								<?php foreach ($skill_array as $skill) {
									if ($skill == 'hitpoints') {
										$skillc = 'hits';
									} else {
										$skillc = $skill;
									}
									?><a class="sm-skill"
										 href="../highscores/<?php echo $skill; ?>"><img
										src="../img/skill_icons/<?php echo $skill; ?>.svg"
										height="20px" alt="<?php echo $skill; ?>" class="display-glow"/>
									<?php echo experienceToLevel($character['exp_' . $skillc] / 4.0); ?></a>
								<?php } ?>
							</div>

							<!-- Additional Stats -->
							<div id="sm-stats">
								<span class="sm-stats">Combat Level: <?php echo $character['combat']; ?></span>
								<span
									class="sm-stats">Skill Total: <?php echo $character['skill_total']; ?></span>
								<span class="sm-stats">Gang: <?php
									if (mysqli_num_rows($player_gang) === 0) {
										echo 'None';
									} else {
										while ($row = $connector->fetchArray($player_gang)) {
											$gang = $row["value"];
											if ($gang == 0) {
												$pick = 'Black Arm';
											} else {
												$pick = 'Phoenix';
											}
											echo $pick;
										}
									} ?>
										</span>
								<span class="sm-stats">Time Played: <?php
									while ($row = $connector->fetchArray($totalTime)) {
										$time = $row["SUM(`value`)"] / 1000;
										$days = floor($time / (24 * 60 * 60));
										$hours = floor(($time - ($days * 24 * 60 * 60)) / (60 * 60));
										$minutes = floor(($time - ($days * 24 * 60 * 60) - ($hours * 60 * 60)) / 60);
										$seconds = ($time - ($days * 24 * 60 * 60) - ($hours * 60 * 60) - ($minutes * 60)) % 60;
										echo $days . 'd ' . $hours . 'h ' . $minutes . 'm ';
									} ?>
										</span>
								<span class="sm-stats">Status:
											<?php if ($character['online'] == 1) {
												echo '<span class="green"><strong>Online</strong></span>';
											} else {
												echo '<span class="red"><strong>Offline</strong></span>';
											} ?>
								</span>
								<span class="sm-stats">Last Online: <time class="timeago"
																		  datetime="<?php echo strftime("%Y-%m-%dT%H:%M:%S", $character["login_date"]) ?>"></time>
								</span>
							</div>
						</div>

						<!-- Accomplishments -->
						<div class="stats pl-5 pr-5">
							<div class="h4 text-info">Recent Accomplishments</div>
							<?php while ($row = $connector->fetchArray($player_feed)) { ?>
									<div class="pl-3 row">
										<div class="text-monospace text-white-50 pt-0">
											<time class="timeago"
												  datetime="<?php echo strftime("%Y-%m-%dT%H:%M:%S", $row["time"]) ?>"></time>
										</div>
										<div class="text-capitalize pl-1"
											style="text-shadow: 1px 1px black;">
											<?php if ($row['group_id'] != 10):
												echo '<img class="mb-1" src="../img/' . $row["group_id"] . '.svg" width="10" height="10"> ';
											endif; ?>
											<?php echo $row['username'] ?>
										</div>
										<div class="pl-1" style="text-shadow: 1px 1px black;">
											<?php echo $row["message"] ?>
										</div>
									</div>
							<?php } ?>
						</div>

						<!-- Begin admin and moderator view only -->
						<?php //if ($user->data['group_id'] == '5' || $user->data['group_id'] == '4') {
						if ($staff == 1) { ?>

							<div class="pt-3">

								<!-- Regular view only -->
								<!-- Invitems -->
								<div class="stats pl-5 pr-5 d-none d-md-block d-lg-block">
									<div class="h4 text-info">Inventory</div>
									<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
										<?php $invitems = $connector->num_rows($player_invitems_regular); ?>
										<tr>
											<?php
											if ($invitems == 0) {
												echo "No inventory items found.";
											} else {
												for ($i = 1; $list = $connector->fetchArray($player_invitems_regular); $i++) {
													?>
													<td style="border: 1px solid black;">
														<div class="clickable-row item<?php echo $list['id'] ?>"
															 data-href="../itemdef/<?php echo $list['id'] ?>"
															 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0px; position: relative; color: white; font-size: 13px; font-weight: 900;">
															<?php echo $list["number"]; ?>
														</div>
													</td>
													<?php
													if (($i % 10 == 0) && ($i < $invitems)) {
														echo '</tr><tr>';
													}
												}
											} ?>
										</tr>
									</table>
								</div>

								<!-- Mobile view only -->
								<!-- Invitems -->
								<div class="stats pl-5 pr-5 d-md-none">
									<div class="h4 text-info">Inventory</div>
									<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
										<?php $invitems = $connector->num_rows($player_invitems_mobile); ?>
										<tr>
											<?php
											if ($invitems == 0) {
												echo "No inventory items found.";
											} else {
												for ($i = 1; $list = $connector->fetchArray($player_invitems_mobile); $i++) {
													?>
													<td style="border: 1px solid black;">
														<div class="clickable-row item<?php echo $list['id'] ?>"
															 data-href="../itemdef/<?php echo $list['id'] ?>"
															 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0px; position: relative; color: white; font-size: 13px; font-weight: 900;">
															<?php echo $list["number"]; ?>
														</div>
													</td>
													<?php
													if (($i % 5 == 0) && ($i < $invitems)) {
														echo '</tr><tr>';
													}
												}
											} ?>
										</tr>
									</table>
								</div>

								<!-- Regular view only -->
								<!-- Bank -->
								<div class="stats pl-5 pr-5 d-none d-md-block d-lg-block">
									<div class="h4 text-info">Bank:</div>
									<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
										<?php $bank = $connector->num_rows($player_bank_regular); ?>
										<tr>
											<?php
											if ($bank > 0) {
												for ($i = 1; $list = $connector->fetchArray($player_bank_regular); $i++) {
													?>
													<td style="border: 1px solid black;">
														<div class="clickable-row item<?php echo $list['id'] ?>"
															 data-href="../itemdef/<?php echo $list['id'] ?>"
															 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0px; position: relative; color: white; font-size: 13px; font-weight: 900;">
															<?php echo $list["number"]; ?>
														</div>
													</td>
													<?php
													if (($i % 10 == 0) && ($i < $bank)) {
														echo '</tr>';
													}
												}
											} else {
												echo "No bank items found.";
											} ?>
									</table>
								</div>

								<!-- Mobile view only -->
								<!-- Bank -->
								<div class="stats pl-5 pr-5 d-md-none">
									<div class="h4 text-info">Bank:</div>
									<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
										<?php $bank = $connector->num_rows($player_bank_mobile); ?>
										<tr>
											<?php
											if ($bank > 0) {
												for ($i = 1; $list = $connector->fetchArray($player_bank_mobile); $i++) {
													?>
													<td style="border: 1px solid black;">
														<div class="clickable-row item<?php echo $list['id'] ?>"
															 data-href="../itemdef/<?php echo $list['id'] ?>"
															 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0px; position: relative; color: white; font-size: 13px; font-weight: 900;">
															<?php echo $list["number"]; ?>
														</div>
													</td>
													<?php
													if (($i % 5 == 0) && ($i < $bank)) {
														echo '</tr>';
													}
												}
											} else {
												echo "No bank items found.";
											} ?>
									</table>
								</div>

								<!-- Logins -->
								<div class="stats pl-5 pr-5">
									<div class="h4 text-info">Logins and IPs:</div>
									<table>
										<tbody>
										<?php $logins = $connector->num_rows($player_logins); ?>
										<?php if ($logins == 0) {
											echo "No chat logs found.";
										} else {
											for ($i = 1; $row = $connector->fetchArray($player_logins); $i++) { ?>
												<tr>
													<td class="text-monospace text-white-50 pt-0">
														<?php echo strftime("%d %b / %H:%M %Z", $row["time"]) ?>
													</td>
													<td class="pl-1" style="text-shadow: 1px 1px black;">
														<?php echo $row["ip"] ?>
													</td>
												</tr>
											<?php }
										} ?>
										</tbody>
									</table>
								</div>

								<!-- Chat -->
								<div class="stats pl-5 pr-5">
									<div class="h4 text-info">Chat Logs:</div>
									<table>
										<tbody>
										<?php $chat = $connector->num_rows($player_chatlogs); ?>
										<?php if ($chat == 0) {
											echo "No chat logs found.";
										} else {
											for ($i = 1; $row = $connector->fetchArray($player_chatlogs); $i++) { ?>
												<tr>
													<td class="text-monospace text-white-50 pt-0">
														<?php echo strftime("%b %d, %I:%M %p", $row["time"]) ?>
													</td>
													<td class="pl-1"
														style="color: #F5FA3C; text-shadow: 1px 1px black;">
														<?php echo $row["message"] ?>
													</td>
												</tr>
											<?php }
										} ?>
										</tbody>
									</table>
								</div>

								<!-- PMs -->
								<div class="stats pl-5 pr-5">
									<div class="h4 text-info">PM Logs:</div>
									<table>
										<tbody>
										<?php $pm = $connector->num_rows($player_pmlogs); ?>
										<?php if ($pm == 0) {
											echo "No pm logs found.";
										} else {
											for ($i = 1; $row = $connector->fetchArray($player_pmlogs); $i++) {
												$idLinkSender = preg_replace("/[^A-Za-z0-9]/", "-", $row['sender']);
												$idLinkReciever = preg_replace("/[^A-Za-z0-9]/", "-", $row['reciever']);
												?>
												<tr>
													<td class="text-monospace text-white-50">
														<?php echo strftime("%b %d, %I:%M %p", $row["time"]) ?>
													</td>
													<td class="pl-1 pr-1" style="text-shadow: 1px 1px black;">
														from
														<?php if (($row['group_id'] != 10) && ($row['username'] != $row['reciever'])):
															echo '<img class="mb-1" src="../img/' . $row["group_id"] . '.svg" width="10" height="10"> ';
														endif; ?>
														<a style="text-shadow: 1px 1px black;"
														   href="/player/<?php echo $idLinkSender ?>" target="_blank">
															<span
																class="font-weight-bold text-capitalize"><?php echo $row['sender'] ?></span>
														</a>
														to
														<?php if (($row['group_id'] != 10) && ($row['username'] != $row['sender'])):
															echo '<img class="mb-1" src="../img/' . $row["group_id"] . '.svg" width="10" height="10"> ';
														endif; ?>
														<a style="text-shadow: 1px 1px black;"
														   href="/player/<?php echo $idLinkReciever ?>" target="_blank">
															<span
																class="font-weight-bold text-capitalize"><?php echo $row['reciever'] ?></span>
														</a>
														<span class="text-info"><?php echo $row["message"] ?></span>
													</td>
												</tr>
											<?php }
										} ?>
										</tbody>
									</table>
								</div>

								<!-- Trades -->
								<div class="stats pl-5 pr-5">
									<div class="h4 text-info">Trade Logs:</div>
									<table style="background: rgba(255,255,255,0.3); border-collapse: collapse;">
										<?php $trade = $connector->num_rows($player_tradelogs); ?>
										<tr>
											<?php
											if ($trade == 0) {
												echo "No trade logs found. This is currently not functioning and under development.";
											} else {
												for ($i = 1; $list = $connector->fetchArray($player_tradelogs); $i++) {
													echo '[<small>' . strftime("%d %b / %H:%M %Z", $list["time"]) . '</small>] from <b>' . $list["player1"] . '</b> to <b>' . $list["player2"] . '</b>';
													?>
													<td style="border: 1px solid black;">
														<?php echo $list["player1_items"]; ?>
													</td>
													<td style="border: 1px solid black;">
														<?php echo $list["player2_items"]; ?>
													</td>
													<?php
													if (($i % 14 == 0) && ($i < $trade)) {
														echo '</tr><tr>';
													}
												}
											} ?>
										</tr>
									</table>
								</div>
							</div>

						<?php } else { ?>
							</div>
						<?php } ?>
						<!-- End staff view only -->

				</div>
				<?php } else { ?>
					<article class="text-info table-dark spaced-body full-width">
						<div class="container border-left border-info border-right table-wrapper-scroll-y">
							<h2 class="h2 text-center text-capitalize display-3 pb-4">
								Player not available</h2>
						</div>
					</article>
				<?php } ?>

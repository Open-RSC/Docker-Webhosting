<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}

$skill_array = array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');

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

$subpage = 'shar';
$skills = buildSQLArray($skill_array);

$character_result = $connector->gamequery("SELECT " . $skills . ", openrsc_players.* FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE (openrsc_players.id = '$subpage' OR openrsc_players.username = '$subpage')");
$character = $connector->fetchArray($character_result);

$totalTime = $connector->gamequery("SELECT SUM(`value`) FROM openrsc_player_cache AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') AND B.key = 'total_played'");

$player_logins = $connector->gamequery("SELECT * FROM openrsc_logins AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY 'B.time' DESC LIMIT 30");

$player_chatlogs = $connector->gamequery("SELECT * FROM openrsc_chat_logs AS B LEFT JOIN openrsc_players AS A ON B.sender = A.username WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY 'B.time' DESC LIMIT 30");

$player_pmlogs = $connector->gamequery("SELECT * FROM openrsc_private_message_logs AS B LEFT JOIN openrsc_players AS A ON B.sender = A.username OR B.reciever = A.username WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY 'B.time' DESC LIMIT 30");

$player_tradelogs = $connector->gamequery("SELECT B.player1, B.player2, B.player1_items, B.player2_items, B.time FROM openrsc_trade_logs AS B LEFT JOIN openrsc_players AS A ON 'B.player1' = 'A.username' OR 'B.player2' = 'A.username' WHERE (A.id = '$subpage' OR A.username = '$subpage') LIMIT 30");

$player_bank_regular = $connector->gamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_bank` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY slot ASC");
$player_bank_mobile = $connector->gamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_bank` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY slot ASC");

$player_invitems = $connector->gamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_invitems` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY slot ASC");

$player_feed = $connector->gamequery("SELECT * FROM openrsc_live_feeds AS B LEFT JOIN openrsc_players AS A ON B.username = A.username WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY 'B.time' DESC LIMIT 8");

function bd_nice_number($n)
{
	if ($n > 1000000000000) return round(($n / 1000000000000), 1) . ' trillion';
	else if ($n > 1000000000) return round(($n / 1000000000), 1) . ' billion';
	else if ($n > 1000000) return round(($n / 1000000), 1) . ' million';
	else if ($n > 1000) return round(($n / 1000), 1) . ' thousand';
	return number_format($n);
}

?>

<div class="text-info table-dark">
	<div class="container border-left border-info border-right full-height">
		<h2 class="h2 text-center text-capitalize display-3 pb-4">
			<?php echo $character['username']; ?>'s Bank
		</h2>
		<div class="sm-stats pl-3 pr-3">
			<div class="pb-0 stats row justify-content-center">
				<?php $file = 'https://game.openrsc.com/avatars/' . $character['id'] . '.png'; ?>
				<img class="pl-5" src="<?php echo $file; ?>" style="height: 125px;">
				<div class="pl-5 col-6">
                        		<span class="sm-stats small text-uppercase text-info">Status:
								<?php if ($character['online'] == 1) {
									echo '<span class="green"><strong>Online</strong></span>';
								} else {
									echo '<span class="red"><strong>Offline</strong></span>';
								} ?></span>
					<span class="text-uppercase text-info">Last Online: </span>
					<span><?php date_default_timezone_set('America/New_York');
						echo strftime("%d %b / %H:%M %Z", $character["login_date"]) ?></span><br><br>
					<span>Shar accepts player item donations for drop parties.</span><br><br>
					<span>To donate in-game items to Shar, contact a staff member. </span>
				</div>
			</div>

			<!-- Regular view only -->
			<div class="stats pl-5 pr-5 d-none d-md-block d-lg-block" align="center">
				<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
					<?php $bank = $connector->num_rows($player_bank_regular); ?>
					<tr>
						<?php
						if ($bank > 0) {
							for ($i = 1; $list = $connector->fetchArray($player_bank_regular); $i++) {
								?>
								<td style="border: 1px solid black;">
									<div class="clickable-row item<?php echo $list['id'] ?>" data-href="../itemdef/<?php echo $list['id'] ?>"
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
			<div class="stats pl-5 pr-5 d-md-none" align="center">
				<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
					<?php $bank = $connector->num_rows($player_bank_mobile); ?>
					<tr>
						<?php
						if ($bank > 0) {
							for ($i = 1; $list = $connector->fetchArray($player_bank_mobile); $i++) {
								?>
								<td style="border: 1px solid black;">
									<div class="clickable-row item<?php echo $list['id'] ?>" data-href="../itemdef/<?php echo $list['id'] ?>"
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

		</div>
	</div>
</div>

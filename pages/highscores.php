<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}

$skill_array = array('skill_total', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving', 'runecraft');

function totalXP($skills)
{
	$skill_total = 0;
	foreach ($skills as $key => $value) {
		if (substr($key, 0, 4) == "exp_") {
			$skill_total += $value;
		}
	}
	return $skill_total;
}

$connector = new Dbc();
$subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);

if ($subpage == $skill_array[0]) {
	$query = array('openrsc_players.' . $subpage . ', openrsc_experience.*', 'openrsc_players.' . $subpage);
} else {
	$query = array('openrsc_experience.exp_' . $subpage, 'exp_' . $subpage);
}
$args = $query[0];
$order = $query[1];
$stat_result = $connector->cabbagegamequery("SELECT openrsc_players.id, openrsc_players.username, openrsc_players.login_date, openrsc_players.highscoreopt, $args FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE openrsc_players.banned = '0' AND openrsc_players.group_id = '10' ORDER BY $order DESC");
?>

<article class="text-info table-dark spaced-body full-width">
	<div class="container border-left border-info border-right table-wrapper-scroll-y mCustomScrollbar"
		 data-mcs-theme="minimal">
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">
			<?php print preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage); ?>
		</h2>
		<p class="text-center">
			Note: Players transferred from another RSC private server are not displayed at this time.
		</p>
		<div class="highscores-menu">
			<div class="dropdown skill-dropdown">
				<a class="dropdown-toggle text-secondary" href="#" role="button" id="highscoresDropdown"
				   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
					Select a skill
				</a>
				<div class="dropdown-menu" aria-labelledby="highscoresDropdown"
					 style="width: 140px; background-color: rgba(19, 36, 47, 0.95);">
					<?php foreach ($skill_array as $skill) { ?>
						<a class="dropdown-item text-secondary" href="/highscores/<?php print $skill; ?>">
							<img src="/img/skill_icons/<?php print $skill; ?>.svg"
								 alt="<?php print $skill; ?>" height="20px"/>
							<?php print ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)); ?>
						</a>
					<?php } ?>
				</div>
			</div> <!-- .dropdown -->
			<input type="text" class="pl-2 mb-2" id="inputBox" onkeyup="search()"
				   placeholder="Search for a player">
		</div>
		<table id="itemList" class="container table-striped table-hover table-dark text-primary">
			<thead>
			<tr>
				<th class="username text-info">Username</th>
				<th class="rank text-info">Rank</th>
				<th class="experience text-info">Level</th>
				<th class="experience text-info">Experience</th>
				<th class="experience text-info">Last Online</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$i = 1;
			while ($row = $connector->fetchArray($stat_result)) {
				$idLink = preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]~u', " ", $idLinks);
				$idLink = preg_replace("/[^A-Za-z0-9]/", "-", $row['id']);
				?>
				<tr id="table">
					<td class="text-capitalize username">
						<div class="clickable-row" data-href="/player/<?php
						if ($row['highscoreopt'] == 1): echo "null";
						else:
							echo $idLink;
						endif;
						?>">
							<?php
							if ($row['highscoreopt'] == 1): echo "<i>(Hidden)</i>";
							else:
								echo $row['username'];
							endif;
							?>
						</div>
					</td>
					<td class="rank">
						<div class="clickable-row" data-href="/player/<?php
						if ($row['highscoreopt'] == 1): echo "null";
						else:
							echo $idLink;
						endif;
						?>">
							<?php echo $i; ?>
						</div>
					</td>
					<td class="experience">
						<div class="clickable-row" data-href="/player/<?php
						if ($row['highscoreopt'] == 1): echo "null";
						else:
							echo $idLink;
						endif;
						?>">
							<?php echo number_format(($subpage == $skill_array[0]) ? $row['skill_total'] : experienceToLevel($row['exp_' . $subpage] / 4.0)); ?>
						</div>
					</td>
					<td class="experience">
						<div class="clickable-row" data-href="/player/<?php
						if ($row['highscoreopt'] == 1): echo "null";
						else:
							echo $idLink;
						endif;
						?>">
							<?php echo number_format(($subpage == $skill_array[0]) ? intval(totalXP($row) / 4.0) : intval($row['exp_' . $subpage] / 4.0)); ?>
						</div>
					</td>
					<td class="experience">
						<div class="clickable-row" data-href="/player/<?php
						if ($row['highscoreopt'] == 1): echo "null";
						else:
							echo $idLink;
						endif;
						?>">
							<time class="timeago"
								  datetime="<?php echo strftime("%Y-%m-%dT%H:%M:%S", $row["login_date"]) ?>"></time>
						</div>
					</td>
				</tr>
				<?php $i++;
			} ?>
			</tbody>
		</table>
	</div>
</article>

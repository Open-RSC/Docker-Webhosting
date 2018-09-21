<?php
if(!defined('IN_PHPBB'))
{
	die("You do not have permission to access this file.");
}

$skill_array = array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');

function buildSQLArray($array) {
    $SQLarray = '';
    $size = sizeof($array)-1;
    $i=0;
    while($i <= $size){
        $SQLarray .= ($array[$i] == 'total_lvl') ? '' : (($array[$i] == 'hits') ? 'exp_hits,' : 'exp_'.$array[$i].''.(($i == $size) ? '' : ',').'');
        $i++;
    }
    return $SQLarray;
}

$connector = new Dbc();

//$subpage = mysqli_real_escape_string($subpage);
$subpage = preg_replace("/[^A-Za-z0-9 ]/"," ",$subpage);
$skills = buildSQLArray($skill_array);

$character_result = $connector->gamequery("SELECT '.$skills.', openrsc_players.* FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE openrsc_players.username = '$subpage'");
$character = $connector->fetchArray($character_result);

$phpbb_user_result = $connector->gamequery("SELECT A.user_id, A.username AS player_name, B.owner, B.username, B.group_id FROM openrsc_forum.phpbb_users as A LEFT JOIN openrsc_game.openrsc_players as B on A.user_id = B.owner WHERE B.username = '$subpage'");
$phpbb_user = $connector->fetchArray($phpbb_user_result);
?>

<div class="main">
	<div class="content">
		<article>
            <?php if($character) { ?>
                <h4><?php if ($character['group_id'] != 4): echo "<img src=\"../css/images/$character[group_id].gif\" width=\"20\" height=\"20\"> ";
                    else: NULL;
                    endif;
                    echo $subpage; ?>'s player information</h4>

                <div id="stats">
					<div id="character">
                    <br /><img src="/avatars/<?php echo $character['id'] ?>.png"/>
					</div>
                    <br />
                    <div id="sm-skill">
                        <?php foreach ($skill_array as $skill) {
                            if($skill == 'hits'){
                                $skillc='hits';
                            } else {
                                $skillc=$skill;
                            }
						?><span class="sm-skill"><a href="<?php echo $script_directory; ?>highscores/<?php echo $skill; ?>"><img src="/elite/css/images/skill_icons/skill_<?php echo $skill; ?>.gif" alt="<?php echo $skill; ?>"/></a><?php echo experienceToLevel($character['exp_'.$skillc]); ?></span>
						<?php } ?>
					</div>

					<div id="sm-stats">
						<span class="sm-stats">Combat Level: <?php echo $character['combat']; ?></span>
						<span class="sm-stats">Skill Total: <?php echo $character['skill_total']; ?></span>
						<span class="sm-stats">Owner: <a href="<?php echo $script_directory; ?>board/memberlist.php?mode=viewprofile&amp;u=<?php echo $character['owner']; ?>"><?php echo $phpbb_user['player_name']; ?></a></span>
                        <span class="sm-stats">Status: <?php if($character['online'] == 1) { echo '<span id="green">Online</span>'; } else { echo '<span id="red">Offline</span>'; } ?></span>
					</div>
				</div>
				<div id="pie-stats">
						<script type="text/javascript">
						$(document).ready(function() {
							var data = [
							<?php foreach ($skill_array as $skill) {
							    $skillc=$skill;
								if(experienceToLevel($character['exp_'.$skillc]) >= 10) {
									echo '{label: "'.ucwords($skill).'",  data: '.$character['exp_'.$skillc].'}, ';
								}
							} ?>
							];

							$.plot($("#donut"), data,
							{
								series: {
									pie: {
										show: true,
										combine: {
											color: '#999',
											threshold: 0.05,
										}
									}
								},
								grid: {
									hoverable: true,
									clickable: true
								},
								legend: {
									show: false
								}
							});
						});
					</script>
					<div id="donut" class="graph">
					</div>
				</div>
                <?php } else {
                    echo "<h4>Player not found</h4>";
                }
                ?>
			</article>
		</div>
	</div>

<?php
if(!defined('IN_PHPBB'))
{
	die("You do not have permission to access this file.");
}

$skill_array = array('skill_total', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');


function totalXP($skills) {
	$skill_total = 0;
	foreach ($skills as $key => $value) {
		if (substr($key, 0, 4) == "exp_") {
			$skill_total += $value;
		}
	}
	return $skill_total;
}

$connector = new Dbc();

if(!$subpage || !in_array($subpage, $skill_array)){
?>
	<div class="main">
		<div class="content">
			<article>
				<h4 align="center">Highscores</h4>
				<div class="skill">
                    <ul>
                        <?php foreach ($skill_array as $skill) { ?>
                            <li><a href="<?php echo $script_directory; ?>highscores/<?php print $skill;?>"><img src="<?php echo $script_directory; ?>css/images/skill_icons/skill_<?php print $skill;?>.gif" alt="<?php print $skill;?>"/><?php print ucwords(preg_replace("/[^A-Za-z0-9 ]/"," ",$skill));?></a></li>
                        <?php } ?>
                    </ul>
				</div>
			</article>
		</div>
	</div>
<?php
	} else {
		//$subpage = mysqli_real_escape_string($subpage);
		$subpage = preg_replace("/[^A-Za-z0-9 ]/","_",$subpage);
		if($subpage == $skill_array[0]){
			$query = array('openrsc_players.'.$subpage.', openrsc_experience.*','openrsc_players.'.$subpage);
		} else {
			$query = array('openrsc_experience.exp_'.$subpage,'exp_'.$subpage);
		}
		$args = $query[0];
		$order = $query[1];
		$stat_result = $connector->gamequery("SELECT openrsc_players.username,$args FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE openrsc_players.banned != '1' AND openrsc_players.group_id != '1' ORDER BY $order DESC LIMIT 30");
?>
	<div class="main">
		<div class="content">
            <article>
                <h4 align="center"><?php print preg_replace("/[^A-Za-z0-9 ]/"," ",$subpage);?></h4>
                <table>
                    <tr>
                        <td>
                            <div class="skill">
                                <ul>
                                    <?php foreach ($skill_array as $skill) { ?>
                                        <li><a href="<?php echo $script_directory; ?>highscores/<?php print $skill;?>"><img src="<?php echo $script_directory; ?>css/images/skill_icons/skill_<?php print $skill;?>.gif" alt="<?php print $skill;?>"/><?php print ucwords(preg_replace("/[^A-Za-z0-9 ]/"," ",$skill));?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </td>
                        <td valign="top">
                            <div class="ranking">
                                <ul>
                                    <li id="header">
                                        <div id="rank">Rank</div>
                                        <div id="username">Username</div>
                                        <div id="level">Level</div>
                                        <div id="experience">Experience</div>
                                    </li>
                                </ul>
                                <ul>
                                <?php
                                    $i = 1;
                                    while($row = $connector->fetchArray($stat_result)) {
                                        $usernameLink = preg_replace("/[^A-Za-z0-9]/","-",$row['username']);
                                ?>
                                    <li id="table">
                                        <div id="rank"><?php echo $i; ?></div>
                                        <div id="username"><a href="<?php echo $script_directory; ?>characters/<?php echo $usernameLink; ?>"><?php echo $row['username']; ?></a></div>
                                        <div id="level"><?php echo ($subpage == $skill_array[0]) ? $row['skill_total'] : experienceToLevel($row['exp_'.$subpage]/4); ?></div>
                                        <div id="experience"><?php echo ($subpage == $skill_array[0]) ? intval(totalXP($row)/4) : intval($row['exp_'.$subpage]/4); ?></div>
                                    </li>
                                <?php
                                    $i++;
                                    }
                                ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </table>
			</article>
		</div>
	</div>
<?php
	}
?>

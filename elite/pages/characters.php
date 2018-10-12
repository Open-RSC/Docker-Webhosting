<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}

$skill_array = array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');

function buildSQLArray($array)
{
    $SQLarray = '';
    $size = sizeof($array) - 1;
    $i = 0;
    while ($i <= $size) {
        $SQLarray .= ($array[$i] == 'total_lvl') ? '' : (($array[$i] == 'hits') ? 'exp_hits,' : 'exp_' . $array[$i] . '' . (($i == $size) ? '' : ',') . '');
        $i++;
    }
    return $SQLarray;
}

$connector = new Dbc();

//$subpage = mysqli_real_escape_string($subpage);
$subpage = preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage);
$skills = buildSQLArray($skill_array);

$character_result = $connector->gamequery("SELECT '.$skills.', openrsc_players.* FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE openrsc_players.username = '$subpage'");
$character = $connector->fetchArray($character_result);

$phpbb_user_result = $connector->gamequery("SELECT A.user_id, A.username AS player_name, B.owner, B.username, B.group_id FROM openrsc_forum.phpbb_users as A LEFT JOIN openrsc_game.openrsc_players as B on A.user_id = B.owner WHERE B.username = '$subpage'");
$phpbb_user = $connector->fetchArray($phpbb_user_result);
?>

<div class="main">
    <div class="content"
    ">
    <div class="navbar" style="height: 5px; width: 100%;">
        <headerbar>
            <headerbar-sides><br /><br /><br /><br /></headerbar-sides>
        </headerbar>
    </div>
    <article>
        <div class="panel" style="height: 600px;">
            <div style="margin-left: 20px; margin-right: 20px; margin-top: 45px; margin-bottom: 45px; color: lightgrey;">
                <?php if ($character) { ?>
                <div>
                    <h3>
                        &nbsp<?php if ($character['group_id'] != 4): echo "<img src=\"../css/images/$character[group_id].svg\" width=\"20\" height=\"20\"> ";
                        else: NULL;
                        endif;
                        echo $subpage; ?>'s player information
                    </h3>
                </div>
                <div id="stats" style="width: 689px;">
                    <div id="character">
                        <?php
                        $file = '/avatars/' . $character['id'] . '.png';
                        echo "<br /><img src=\"$file\"/>";
                        ?>
                    </div>

                    <br/>

                    <div id="sm-skill">
                        <?php foreach ($skill_array as $skill) {
                            if ($skill == 'hits') {
                                $skillc = 'hits';
                            } else {
                                $skillc = $skill;
                            }
                            ?><span class="sm-skill"><a
                                href="<?php echo $script_directory; ?>highscores/<?php echo $skill; ?>"><img
                                    src="/elite/css/images/skill_icons/<?php echo $skill; ?>.svg" width="16px"
                                    height="16px" alt="<?php echo $skill; ?>"/>
                            </a><?php echo experienceToLevel($character['exp_' . $skillc]); ?></span>
                        <?php } ?>
                    </div>

                    <div id="sm-stats">
                        <span class="sm-stats">Combat Level: <?php echo $character['combat']; ?></span>
                        <span class="sm-stats">Skill Total: <?php echo $character['skill_total']; ?></span>
                        <span class="sm-stats">Owner: <a
                                    href="<?php echo $script_directory; ?>board/memberlist.php?mode=viewprofile&amp;u=<?php echo $character['owner']; ?>"><?php echo $phpbb_user['player_name']; ?></a></span>
                        <span class="sm-stats">Status: <?php if ($character['online'] == 1) {
                                echo '<span id="green">Online</span>';
                            } else {
                                echo '<span id="red">Offline</span>';
                            } ?></span>
                    </div>

                </div>
            </div>
            <?php } else {
                echo "<br /><h4 align='center'>Player not found</h4><br />";
            } ?>
        </div>
    </article>
</div>
</div>

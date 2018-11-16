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
        $SQLarray .= ($array[$i] == 'total_lvl') ? '' : (($array[$i] == 'hitpoints') ? 'exp_hits,' : 'exp_' . $array[$i] . '' . (($i == $size) ? '' : ',') . '');
        $i++;
    }
    return $SQLarray;
}

$connector = new Dbc();

//$subpage = mysqli_real_escape_string($subpage);
$subpage = preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage);
$skills = buildSQLArray($skill_array);

$character_result = $connector->gamequery("SELECT " . $skills . ", openrsc_players.* FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE openrsc_players.id = '$subpage'");
$character = $connector->fetchArray($character_result);

$totalTime = $connector->gamequery("SELECT SUM(`value`) FROM openrsc_player_cache LEFT JOIN openrsc_players ON openrsc_player_cache.playerID = openrsc_players.id WHERE openrsc_players.id = '$subpage' AND `openrsc_player_cache`.`key` = 'total_played'");
$player_logins = $connector->gamequery("SELECT * FROM openrsc_logins LEFT JOIN openrsc_players ON openrsc_logins.playerID = openrsc_players.id WHERE openrsc_players.id = '$subpage' ORDER BY 'time' DESC LIMIT 30");
$player_chatlogs = $connector->gamequery("SELECT * FROM openrsc_chat_logs AS B LEFT JOIN openrsc_players AS A ON B.sender = A.username WHERE A.id = '$subpage' ORDER BY 'B.time' DESC LIMIT 30");

//$player_tradelogs_result = $connector->gamequery("SELECT * FROM openrsc_trade_logs AS B LEFT JOIN openrsc_players AS A ON B.player1 = A.username WHERE A.id = '$subpage' ORDER BY 'B.time' DESC LIMIT 30");
//$player_tradelogs = $connector->fetchArray($player_tradelogs_result);

$player_bank_result = $connector->gamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_bank` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE A.id = '$subpage' ORDER BY slot ASC");
$player_invitems_result = $connector->gamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_invitems` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE A.id = '$subpage' ORDER BY slot ASC");

$player_feed = $connector->gamequery("SELECT * FROM openrsc_live_feeds AS B LEFT JOIN openrsc_players AS A ON B.username = A.username WHERE A.id = '$subpage' ORDER BY 'B.time' DESC LIMIT 8");

//$phpbb_user_result = $connector->gamequery("SELECT A.user_id, A.username AS player_name, B.username, B.group_id FROM openrsc_forum.phpbb_users as A LEFT JOIN openrsc_game.openrsc_players as B on A.user_id = B.owner WHERE B.username = '$subpage'");
//$phpbb_user = $connector->fetchArray($phpbb_user_result);

function bd_nice_number($n)
{
    if ($n > 1000000000000) return round(($n / 1000000000000), 1) . ' trillion';
    else if ($n > 1000000000) return round(($n / 1000000000), 1) . ' billion';
    else if ($n > 1000000) return round(($n / 1000000), 1) . ' million';
    else if ($n > 1000) return round(($n / 1000), 1) . ' thousand';

    return number_format($n);
}

?>

<main class="main">
    <article>
        <div class="panel">
            <?php if ($character) { ?>
            <div>
                <h3>
                    &nbsp<?php if ($character['group_id'] != 4): echo "<img src=\"../css/images/$character[group_id].svg\" width=\"20\" height=\"20\"> ";
                    else: NULL; endif;
                    echo $character['username']; ?>'s player information
                </h3>
            </div>
            <div class="stats flex-row">
                <div id="character">
                    <?php
                    $file = 'https://game.openrsc.com/avatars/' . $character['id'] . '.png';
                    echo "<img src=\"$file\"/>";
                    ?>
                </div>

                <div>

                    <div id="sm-skill">
                        <?php foreach ($skill_array as $skill) {
                            if ($skill == 'hitpoints') {
                                $skillc = 'hits';
                            } else {
                                $skillc = $skill;
                            }
                            ?><span class="sm-skill"><a
                                href="/highscores/<?php echo $skill; ?>"><img
                                    src="/css/images/skill_icons/<?php echo $skill; ?>.svg" width="16px"
                                    height="16px" alt="<?php echo $skill; ?>"/>
                            </a><?php echo experienceToLevel($character['exp_' . $skillc] / 4.0); ?></span>
                        <?php } ?>
                    </div>

                    <div id="sm-stats"><span class="sm-stats">Combat Level: <?php echo $character['combat']; ?></span>
                        <span class="sm-stats">Skill Total: <?php echo $character['skill_total']; ?></span>
                        <span class="sm-stats">Time Played: <?php
                            while ($row = $connector->fetchArray($totalTime)) {
                                $time = $row["SUM(`value`)"] / 1000;
                                $days = floor($time / (24 * 60 * 60));
                                $hours = floor(($time - ($days * 24 * 60 * 60)) / (60 * 60));
                                $minutes = floor(($time - ($days * 24 * 60 * 60) - ($hours * 60 * 60)) / 60);
                                $seconds = ($time - ($days * 24 * 60 * 60) - ($hours * 60 * 60) - ($minutes * 60)) % 60;
                                echo $days . 'd ' . $hours . 'h ' . $minutes . 'm ';
                            }
                            ?></span>
                        <!--<span class="sm-stats">Owner: <a
                            href="<?php echo $script_directory; ?>board/memberlist.php?mode=viewprofile&amp;u=<?php echo $character['owner']; ?>"><?php echo $phpbb_user['player_name']; ?></a></span>-->
                        <span class="sm-stats">Status:
                            <?php if ($character['online'] == 1) {
                                echo '<span class="green"><strong>Online</strong></span>';
                            } else {
                                echo '<span class="red"><strong>Offline</strong></span>';
                            } ?></span>
                        <span class="sm-stats">Login: <?php date_default_timezone_set('America/New_York');
                            echo strftime("%d %b / %H:%M %Z", $character["login_date"]) ?></span>
                    </div>
                </div>
            </div>

            <br/>

            <div class="accomplishments">
                <h4>Recent Accomplishments:</h4>
                <div align="left" style="margin-left: 10px;">
                    <?php while ($row = $connector->fetchArray($player_feed)) {
                        echo '[<small>' . strftime("%d %b / %H:%M %Z", $row["time"]) . '</small>] <strong>' . $row["username"] . '</strong> ' . $row["message"];
                        echo '<br/>';
                    } ?>
                </div>
            </div>

            <br/>

            <!-- Begin admin and moderator view only -->
            <?php if ($user->data['group_id'] == '5' || $user->data['group_id'] == '4') { ?>
                <div style="margin-left: 10px;">
                    <h4>Inventory:</h4>
                    <table style="background: rgba(255,255,255,0.3); border-collapse: collapse;">
                        <?php $totalinvitems = $connector->num_rows($player_invitems_result); ?>
                        <tr>
                            <?php
                            if ($totalinvitems == 0) {
                                echo "No inventory items found.";
                            } else {
                                for ($i = 1; $listinvitems = $connector->fetchArray($player_invitems_result); $i++) {
                                    ?>
                                    <td style="border: 1px solid black;">
                                        <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 0.8px; -webkit-text-stroke-color: black; margin-top: -3px; position: absolute; color: white; font-size: 13px; font-weight: 900;">
                                            <?php echo $listinvitems["number"]; ?>
                                        </div>
                                        <img src="/css/images/items/<?php echo $listinvitems["id"]; ?>.png"/>
                                    </td>
                                    <?php
                                    if (($i % 14 == 0) && ($i < $totalinvitems)) {
                                        echo '</tr><tr>';
                                    }
                                }
                            } ?>
                        </tr>
                    </table>

                    <br/>

                    <h4>Bank:</h4>
                    <table style="background: rgba(255,255,255,0.3); border-collapse: collapse;">
                        <?php $totalbank = $connector->num_rows($player_bank_result); ?>
                        <tr>
                            <?php
                            if ($totalbank == 0) {
                                echo "No bank items found.";
                            } else {
                                for ($i = 1; $listbank = $connector->fetchArray($player_bank_result); $i++) {
                                    ?>
                                    <td style="border: 1px solid black;">
                                        <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 0.8px; -webkit-text-stroke-color: black; margin-top: -3px; position: absolute; color: white; font-size: 13px; font-weight: 900;">
                                            <?php echo $listbank["number"]; ?>
                                        </div>
                                        <img src="/css/images/items/<?php echo $listbank["id"]; ?>.png"/>
                                    </td>
                                    <?php
                                    if (($i % 14 == 0) && ($i < $totalbank)) {
                                        echo '</tr><tr>';
                                    }
                                }
                            } ?>
                        </tr>
                    </table>

                    <br/>

                    <h4>Logins and IPs:</h4>
                    <?php while ($row = $connector->fetchArray($player_logins)) {
                        echo '[<small>' . strftime("%d %b / %H:%M %Z", $row["time"]) . '</small>] <small>' . $row["ip"] . '</small>';
                        echo '<br/>';
                    } ?>

                    <br/>

                    <h4>Chat Logs:</h4>
                    <?php while ($row = $connector->fetchArray($player_chatlogs)) {
                        echo '[<small>' . strftime("%d %b / %H:%M %Z", $row["time"]) . '</small>] <small>' . $row["message"] . '</small>';
                        echo '<br/>';
                    } ?>

                    <br/>

                    <!--<h4>Trade Logs:</h4>
                    <?php // while ($row = $connector->fetchArray($player_tradelogs)) {
                       // echo '[<small>' . strftime("%d %b / %H:%M %Z", $row["time"]) . '</small>] <strong>' . $row["player1"] . '</strong> <strong>' . $row["player2"] . '</strong> <strong>' . $row["player1_items"] . '</strong> <strong>' . $row["player2_items"] . '</strong>' . $row["ip"];
                       // echo '<br/>';
                    //} ?>

                    <br/>-->
                </div>
            <?php } else {
            } ?>
            <!-- End admin and moderator view only -->

            <div class="pie-stats">
                <script type="text/javascript">
                    $(document).ready(function () {
                        var data = [
                            <?php foreach ($skill_array as $skill) {
                            if ($skill == 'hitpoints') {
                                $skillc = 'hits';
                            } else {
                                $skillc = $skill;
                            }
                            if (experienceToLevel($character['exp_' . $skillc]) >= 10) {
                                echo '{label: "' . ucwords($skill) . '",  data: ' . $character['exp_' . $skillc] . '}, ';
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
                                    clickable: false
                                },
                                legend: {
                                    show: false
                                }
                            });
                    });
                </script>
                <div id="donut" class="graph"></div>
            </div>
        </div>
        <?php } else {
            echo "<h4 align='center'>Player not found</h4>";
        } ?>
    </article>
</main>

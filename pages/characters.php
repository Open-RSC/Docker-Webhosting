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

$character_result = $connector->gamequery("SELECT " . $skills . ", openrsc_players.* FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE (openrsc_players.id = '$subpage' OR openrsc_players.username = '$subpage')");
$character = $connector->fetchArray($character_result);

$totalTime = $connector->gamequery("SELECT SUM(`value`) FROM openrsc_player_cache AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') AND B.key = 'total_played'");

$player_logins = $connector->gamequery("SELECT * FROM openrsc_logins AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY 'B.time' DESC LIMIT 30");

$player_chatlogs = $connector->gamequery("SELECT * FROM openrsc_chat_logs AS B LEFT JOIN openrsc_players AS A ON B.sender = A.username WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY 'B.time' DESC LIMIT 30");

$player_pmlogs = $connector->gamequery("SELECT * FROM openrsc_private_message_logs AS B LEFT JOIN openrsc_players AS A ON B.sender = A.username OR B.reciever = A.username WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY 'B.time' DESC LIMIT 30");

$player_tradelogs = $connector->gamequery("SELECT B.player1, B.player2, B.player1_items, B.player2_items, B.time FROM openrsc_trade_logs AS B LEFT JOIN openrsc_players AS A ON 'B.player1' = 'A.username' OR 'B.player2' = 'A.username' WHERE (A.id = '$subpage' OR A.username = '$subpage') LIMIT 30");

$player_bank = $connector->gamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_bank` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY slot ASC");

$player_invitems = $connector->gamequery("SELECT A.username, B.id, format(B.amount, 0) number, B.slot FROM `openrsc_invitems` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY slot ASC");

$player_feed = $connector->gamequery("SELECT * FROM openrsc_live_feeds AS B LEFT JOIN openrsc_players AS A ON B.username = A.username WHERE (A.id = '$subpage' OR A.username = '$subpage') ORDER BY 'B.time' DESC LIMIT 8");

//$phpbb_user_result = $connector->gamequery("SELECT B.user_id, B.username AS player_name, A.username, A.group_id FROM openrsc_forum.phpbb_users as B LEFT JOIN openrsc_game.openrsc_players as A on B.user_id = A.owner WHERE (A.id = '$subpage' OR A.username = '$subpage')");
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
                                    href="/board/memberlist.php?mode=viewprofile&amp;u=<?php //echo $character['owner']; ?>"><?php //echo $phpbb_user['player_name']; ?></a></span>-->
                        <span class="sm-stats">Status:
                            <?php if ($character['online'] == 1) {
                                echo '<span class="green"><strong>Online</strong></span>';
                            } else {
                                echo '<span class="red"><strong>Offline</strong></span>';
                            } ?></span>
                        <span class="sm-stats">Last Online: <?php date_default_timezone_set('America/New_York');
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
                        <?php $invitems = $connector->num_rows($player_invitems); ?>
                        <tr>
                            <?php
                            if ($invitems == 0) {
                                echo "No inventory items found.";
                            } else {
                                for ($i = 1; $list = $connector->fetchArray($player_invitems); $i++) {
                                    ?>
                                    <td style="border: 1px solid black;">
                                        <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 0.8px; -webkit-text-stroke-color: black; margin-top: -3px; position: absolute; color: white; font-size: 13px; font-weight: 900;">
                                            <?php echo $list["number"]; ?>
                                        </div>
                                        <img src="/css/images/items/<?php echo $list["id"]; ?>.png"/>
                                    </td>
                                    <?php
                                    if (($i % 14 == 0) && ($i < $invitems)) {
                                        echo '</tr><tr>';
                                    }
                                }
                            } ?>
                        </tr>
                    </table>

                    <br/>

                    <h4>Bank:</h4>
                    <table style="background: rgba(255,255,255,0.3); border-collapse: collapse;">
                        <?php $bank = $connector->num_rows($player_bank); ?>
                        <tr>
                            <?php
                            if ($bank == 0) {
                                echo "No bank items found.";
                            } else {
                                for ($i = 1; $list = $connector->fetchArray($player_bank); $i++) {
                                    ?>
                                    <td style="border: 1px solid black;">
                                        <div style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 0.8px; -webkit-text-stroke-color: black; margin-top: -3px; position: absolute; color: white; font-size: 13px; font-weight: 900;">
                                            <?php echo $list["number"]; ?>
                                        </div>
                                        <img src="/css/images/items/<?php echo $list["id"]; ?>.png"/>
                                    </td>
                                    <?php
                                    if (($i % 14 == 0) && ($i < $bank)) {
                                        echo '</tr><tr>';
                                    }
                                }
                            } ?>
                        </tr>
                    </table>

                    <br/>

                    <h4>Logins and IPs:</h4>
                    <table style="background: rgba(255,255,255,0.3); border-collapse: collapse;">
                        <?php $logins = $connector->num_rows($player_logins); ?>
                        <tr>
                            <?php
                            if ($logins == 0) {
                                echo "No login logs found.";
                            } else {
                                for ($i = 1; $list = $connector->fetchArray($player_logins); $i++) {
                                    echo '[<small>' . strftime("%d %b / %H:%M %Z", $list["time"]) . '</small>] <b>' . $list["ip"] . '</b>';
                                    echo '<br/>';
                                    if (($i % 14 == 0) && ($i < $logins)) {
                                        echo '</tr><tr>';
                                    }
                                }
                            } ?>
                        </tr>
                    </table>

                    <br/>

                    <h4>Chat Logs:</h4>
                    <table style="background: rgba(255,255,255,0.3); border-collapse: collapse;">
                        <?php $chat = $connector->num_rows($player_chatlogs); ?>
                        <tr>
                            <?php
                            if ($chat == 0) {
                                echo "No chat logs found.";
                            } else {
                                for ($i = 1; $list = $connector->fetchArray($player_chatlogs); $i++) {
                                    echo '[<small>' . strftime("%d %b / %H:%M %Z", $list["time"]) . '</small>] <b>' . $list["message"] . '</b>';
                                    echo '<br/>';
                                    if (($i % 14 == 0) && ($i < $chat)) {
                                        echo '</tr><tr>';
                                    }
                                }
                            } ?>
                        </tr>
                    </table>

                    <br/>

                    <h4>PM Logs:</h4>
                    <table style="background: rgba(255,255,255,0.3); border-collapse: collapse;">
                        <?php $pm = $connector->num_rows($player_pmlogs); ?>
                        <tr>
                            <?php
                            if ($pm == 0) {
                                echo "No private message logs found.";
                            } else {
                                for ($i = 1; $list = $connector->fetchArray($player_pmlogs); $i++) {
                                    $idLinkSender = preg_replace("/[^A-Za-z0-9]/", "-", $list['sender']);
                                    $idLinkReciever = preg_replace("/[^A-Za-z0-9]/", "-", $list['reciever']);
                                    echo '[<small>' . strftime("%d %b / %H:%M %Z", $list["time"]) . '</small>] from <b><a href="/characters/' . $idLinkSender . '" target="_blank">' . $list["sender"] . '</a></b> to <b><a href="/characters/' . $idLinkReciever . '" target="_blank">' . $list["reciever"] . '</a></b>: <small>' . $list["message"] . '</small>';
                                    echo '<br/>';
                                    if (($i % 14 == 0) && ($i < $pm)) {
                                        echo '</tr><tr>';
                                    }

                                }
                            } ?>
                        </tr>
                    </table>

                    <br/>

                    <h4>Trade Logs:</h4>
                    <table style="background: rgba(255,255,255,0.3); border-collapse: collapse;">
                        <?php $trade = $connector->num_rows($player_tradelogs); ?>
                        <tr>
                            <?php
                            if ($trade == 0) {
                                echo "No trade logs found.";
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

                    <br/>

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

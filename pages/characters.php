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

$character_result = $connector->gamequery("SELECT " . $skills . ", openrsc_players.* FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE openrsc_players.username = '$subpage'");
$character = $connector->fetchArray($character_result);

$totalTime = $connector->gamequery("SELECT SUM(`value`) FROM openrsc_player_cache LEFT JOIN openrsc_players ON openrsc_player_cache.playerID = openrsc_players.id WHERE openrsc_players.username = '$subpage' AND `openrsc_player_cache`.`key` = 'total_played'");

$phpbb_user_result = $connector->gamequery("SELECT A.user_id, A.username AS player_name, B.username, B.group_id FROM openrsc_forum.phpbb_users as A LEFT JOIN openrsc_game.openrsc_players as B on A.user_id = B.owner WHERE B.username = '$subpage'");
$phpbb_user = $connector->fetchArray($phpbb_user_result);

$player_logins = $connector->gamequery("SELECT MONTH(FROM_UNIXTIME(time)), COUNT(MONTH(FROM_UNIXTIME(time))) FROM openrsc_logins LEFT JOIN openrsc_players ON openrsc_logins.playerID = openrsc_players.id WHERE openrsc_players.username = '$subpage' GROUP BY MONTH(FROM_UNIXTIME(time)) ORDER BY FROM_UNIXTIME(time)");
$player_chatlogs = $connector->gamequery("SELECT MONTH(FROM_UNIXTIME(time)), COUNT(MONTH(FROM_UNIXTIME(time))) FROM openrsc_chat_logs WHERE sender = '$subpage' GROUP BY MONTH(FROM_UNIXTIME(time)) ORDER BY FROM_UNIXTIME(time)");
$player_tradelogs = $connector->gamequery("SELECT MONTH(FROM_UNIXTIME(time)), COUNT(MONTH(FROM_UNIXTIME(time))) FROM openrsc_trade_logs WHERE player1 = '$subpage' GROUP BY MONTH(FROM_UNIXTIME(time)) ORDER BY FROM_UNIXTIME(time)");

$player_feed = $connector->gamequery("SELECT * FROM `openrsc_live_feeds` WHERE username = '$subpage' ORDER BY `time` DESC LIMIT 8");

?>

<main class="main">
    <article>
        <div class="panel">
            <?php if ($character) { ?>
            <div>
                <h3>
                    &nbsp<?php if ($character['group_id'] != 4): echo "<img src=\"../css/images/$character[group_id].svg\" width=\"20\" height=\"20\"> ";
                    else: NULL; endif;
                    echo $subpage; ?>'s player information
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
                            <span class="sm-stats">Last Login: <?php echo strftime("%d %b / %I:%M:%S %p", $character["login_date"]) ?></span>
                            <span class="sm-stats">Status:
                            <?php if ($character['online'] == 1) {
                                echo '<span class="green"><strong>Online</strong></span>';
                            } else {
                                echo '<span class="red"><strong>Offline</strong></span>';
                            } ?></span>
                    </div>
                </div>
            </div>
            <!--<canvas class="line-chart"></canvas>
            <script>
                new Chart(document.getElementById("line-chart"), {
                    type: 'line',
                    data: {
                        labels: ['Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                        datasets: [{
                            data: [<?php while ($row = $connector->fetchArray($player_logins)) {
                echo $row["time"] . ', ' . $row["COUNT(MONTH(FROM_UNIXTIME(time)))"];
            } ?>],
                            label: "Logins",
                            borderColor: "#FF0000",
                            fill: false
                        },
                            {
                                data: [<?php while ($row = $connector->fetchArray($player_chatlogs)) {
                echo $row["time"] . ', ' . $row["COUNT(MONTH(FROM_UNIXTIME(time)))"];
            } ?>],
                                label: "Chat Messages",
                                borderColor: "#0000FF",
                                fill: false
                            },
                            {
                                data: [<?php while ($row = $connector->fetchArray($player_tradelogs)) {
                echo $row["time"] . ', ' . $row["COUNT(MONTH(FROM_UNIXTIME(time)))"];
            } ?>],
                                label: "Trades",
                                borderColor: "#ffffff",
                                fill: false
                            }
                        ]
                    },
                    options: {
                        title: {
                            display: false,
                            text: 'Logins'
                        }
                    }
                });
            </script>-->
            <div class="accomplishments">
                <h4>Recent Accomplishments: </h4>
                <div align="left" style="margin-left: 10px;">
                    <?php while ($row = $connector->fetchArray($player_feed)) {
                        echo '[<strong>' . strftime("%d %b / %I:%M:%S %p", $row["time"]) . '</strong>] <strong>' . $row["username"] . '</strong> ' . $row["message"];
                        echo '<br/>';
                    } ?>
                </div>
            </div>
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

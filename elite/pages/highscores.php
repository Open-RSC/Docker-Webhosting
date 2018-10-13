<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}

$skill_array = array('skill_total', 'attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');


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

if (!$subpage || !in_array($subpage, $skill_array)) {
    ?>
    <div class="main">
        <div class="content">
            <div class="navbar" style="height: 5px; width: 100%;">
                <headerbar>
                    <headerbar-sides><br /><br /><br /><br /></headerbar-sides>
                </headerbar>
            </div>
            <article>
                <h4 align="center">Highscores</h4>
                <div class="skill">
                    <ul>
                        <?php foreach ($skill_array as $skill) { ?>
                            <li><a href="<?php echo $script_directory; ?>highscores/<?php print $skill; ?>"><img
                                            src="<?php echo $script_directory; ?>css/images/skill_icons/skill_<?php print $skill; ?>.gif"
                                            alt="<?php print $skill; ?>"/><?php print ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)); ?>
                                </a></li>
                        <?php } ?>
                    </ul>
                </div>
            </article>
        </div>
    </div>
    <?php
} else {
    //$subpage = mysqli_real_escape_string($subpage);
    $subpage = preg_replace("/[^A-Za-z0-9 ]/", "_", $subpage);
    if ($subpage == $skill_array[0]) {
        $query = array('openrsc_players.' . $subpage . ', openrsc_experience.*', 'openrsc_players.' . $subpage);
    } else {
        $query = array('openrsc_experience.exp_' . $subpage, 'exp_' . $subpage);
    }
    $args = $query[0];
    $order = $query[1];
    $stat_result = $connector->gamequery("SELECT openrsc_players.username,$args FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE openrsc_players.banned != '1' AND openrsc_players.group_id = '4' AND openrsc_players.login_date >= unix_timestamp( current_date - interval 3 month ) ORDER BY $order DESC LIMIT 30");
    ?>
    <div class="main">
        <div class="content">
            <div class="navbar" style="border: #000000; height: 5px; width: 100%; z-index: 3;">
                <headerbar>
                    <headerbar-sides style="z-index: 3;"><br/><br/></br /></br /></headerbar-sides>
                </headerbar>
            </div>
            <article class="highscores">
                <div class="panel"
                     style="width: 150px; margin-right: 0px; margin-top: 0px; margin-left: 9px; z-index: 4;">
                    <div class="skill">
                        <ul>
                            <?php foreach ($skill_array as $skill) { ?>
                                <li><a href="<?php echo $script_directory; ?>highscores/<?php print $skill; ?>"><img
                                                src="<?php echo $script_directory; ?>css/images/skill_icons/<?php print $skill; ?>.svg"
                                                width="16px" height="16px"
                                                alt="<?php print $skill; ?>"/><?php print ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)); ?>
                                    </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="panel" style="margin-top: 0px; margin-left: 0px; z-index: 5;">
                    <div class="ranking">
                        <h4 align="center">
                            <?php print preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage); ?> Rankings
                        </h4>
                        <table>
                            <thead>
                            <tr>
                                <th class="rank">Rank</th>
                                <th class="username">Username</th>
                                <th class="level">Level</th>
                                <th class="experience">Experience</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                            while ($row = $connector->fetchArray($stat_result)) {
                                $usernameLink = preg_replace("/[^A-Za-z0-9]/", "-", $row['username']);
                                ?>
                                <tr id="table">
                                    <td class="rank"><?php echo $i; ?></td>
                                    <td class="username">
                                        <a href="<?php echo $script_directory; ?>characters/<?php echo $usernameLink; ?>"><?php echo $row['username']; ?></a>
                                    </td>
                                    <td class="level">
                                        <?php echo ($subpage == $skill_array[0]) ? $row['skill_total'] : experienceToLevel($row['exp_' . $subpage] / 4); ?>
                                    </td>
                                    <td class="experience">
                                        <?php echo ($subpage == $skill_array[0]) ? intval(totalXP($row) / 4) : intval($row['exp_' . $subpage] / 4); ?>
                                    </td>
                                </tr>
                                <?php $i++;
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <?php
}
?>

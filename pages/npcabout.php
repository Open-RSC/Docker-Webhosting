<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}

$skill_array = array('attack', 'strength', 'hits', 'defense');

function buildSQLArray($array)
{
    $SQLarray = '';
    $size = sizeof($array) - 1;
    $i = 0;
    while ($i <= $size) {
        $SQLarray .= ($array[$i] == 'total_lvl') ? '' : (($array[$i] == 'hits') ?: $array[$i] . '' . (($i == $size) ? '' : ',') . '');
        $i++;
    }
    return $SQLarray;
}

$connector = new Dbc();

//$subpage = mysqli_real_escape_string($subpage);
$subpage = preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage);
$skills = buildSQLArray($skill_array);

$result_result = $connector->gamequery("SELECT * FROM openrsc_npcdef WHERE id = '$subpage'");
$result = $connector->fetchArray($result_result);

$resultdrop_result = $connector->gamequery("SELECT * FROM openrsc_npcdrops LEFT JOIN openrsc_npcdef ON openrsc_npcdrops.npcdef_id = openrsc_npcdef.id WHERE openrsc_npcdef.id = '$subpage'");
$resultdrop = $connector->fetchArray($resultdrop_result);

?>

<main class="main">
    <article>
        <div class="panel">
            <?php if ($result) { ?>
            <div>
                <h3>
                    <?php echo $result['name']; ?> (level <?php echo $result['combatlvl']; ?>)
                </h3>
            </div>
            <div class="stats flex-row">
                <div>
                    <table class="white">
                        <tbody>
                        <tr>
                            <td style="padding-right: 25px;" align="center">
                                <img src="/css/images/npc/<?php echo $result['id'] ?>.png"
                                     style="max-width: 150px; max-height: 150px;"/>
                                <br/>
                                <span class="sm-stats"><?php echo $result['description']; ?></span>
                            </td>
                            <td style="padding-right: 25px;">
                                <?php foreach ($skill_array as $skill) {
                                    ?><span class="sm-skill2"><img
                                            src="/css/images/skill_icons/<?php echo $skill; ?>.svg" width="16px"
                                            height="16px" alt="<?php echo $skill; ?>"/>
                                    <?php echo $result[$skill]; ?></span>
                                <?php } ?>
                            </td>
                            <td style="padding-right: 25px;">
                                <br/><br/><span
                                        class="sm-skill"><?php if ($result['attackable']) { ?>Attackable<?php } else { ?>Not Attackable<?php } ?>
                                    <br/>
                                    <?php if ($result['aggressive']) { ?>Aggressive<?php } else { ?>Passive<?php } ?></span><br/>
                                <span class="sm-skill"><?php echo $result['respawnTime'] ?>
                                    second respawn time</span><br/><br/><br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } else {
            echo "<h4 align='center'>NPC not found</h4>";
        } ?>
    </article>
</main>

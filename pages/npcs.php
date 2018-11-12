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

$npc_result = $connector->gamequery("SELECT * FROM openrsc_npcdef WHERE id = '$subpage'");
$npc = $connector->fetchArray($npc_result);

$npcdrop_result = $connector->gamequery("SELECT * FROM openrsc_npcdrops LEFT JOIN openrsc_npcdef ON openrsc_npcdrops.npcdef_id = openrsc_npcdef.id WHERE openrsc_npcdef.id = '$subpage'");
$npcdrop = $connector->fetchArray($npcdrop_result);

?>

<main class="main">
    <article>
        <div class="panel">
            <?php if ($npc) { ?>
            <div>
                <h3>
                    <?php echo $npc['name']; ?> (level <?php echo $npc['combatlvl']; ?>)
                </h3>
            </div>
            <div class="stats flex-row">
                <div id="NPC">
                    <center><?php
                    $file = '/css/images/npc/major/' . $npc['id'] . '.png';
                    echo "<img src=\"$file\"/>";
                    ?></center>
                    <div>
                        <span class="sm-stats"><?php echo $npc['description']; ?></span>
                    </div>
                </div>

                <div>
                    <div id="sm-skill">
                        <?php foreach ($skill_array as $skill) {
                            ?><span class="sm-skill"><img
                                    src="/css/images/skill_icons/<?php echo $skill; ?>.svg" width="16px"
                                    height="16px" alt="<?php echo $skill; ?>"/>
                            <?php echo $npc[$skill]; ?></span>
                        <?php } ?>
                    </div>
                    <div>
                        <br/><br/>
                        <span class="sm-skill"><?php if ($npc['attackable']) { ?>Attackable<?php } else { ?>Not Attackable<?php } ?> and <?php if ($npc['aggressive']) { ?>Aggressive<?php } else { ?>Non-aggressive<?php } ?></span><br/>
                        <span class="sm-skill"><?php echo $npc['respawnTime'] ?> second respawn time</span><br/>

                    </div>
                </div>
            </div>
            (Drop Table)
            <?php
            echo $npcdrop['openrsc_npcdrops.id'];
            echo $npcdrop['openrsc_npcdrops.weight'];
            ?>

        </div>
        <?php } else {
            echo "<h4 align='center'>NPC not found</h4>";
        } ?>
    </article>
</main>

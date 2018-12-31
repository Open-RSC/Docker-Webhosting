<?php
if (!defined('IN_SITE')) {
    die("You do not have permission to access this file.");
}

include "../inc/config.php";

$connector = new Dbc();

$subpage = preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage);
$subpage = preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]~u', " ", $subpage);

$character_result = $connector->gamequery("SELECT * FROM openrsc_players WHERE (openrsc_players.id = '$subpage' OR openrsc_players.username = '$subpage')");
$character = $connector->fetchArray($character_result);

$bank_result = $connector->gamequery("SELECT A.username, B.* FROM `openrsc_bank` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage')");

$invitem_result = $connector->gamequery("SELECT A.username, B.* FROM `openrsc_invitems` AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE (A.id = '$subpage' OR A.username = '$subpage')");

$exp_result = $connector->gamequery("SELECT * FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE (openrsc_players.id = '$subpage' OR openrsc_players.username = '$subpage')");
$exp = $connector->fetchArray($exp_result);

$cur_result = $connector->gamequery("SELECT * FROM openrsc_curstats LEFT JOIN openrsc_players ON openrsc_curstats.playerID = openrsc_players.id WHERE (openrsc_players.id = '$subpage' OR openrsc_players.username = '$subpage')");
$cur = $connector->fetchArray($cur_result);

?>

<?php if ($character) { ?>
    <!-- Begin logged in user view only -->
    <?php if ($user->data['is_registered']) { ?>

        <!-- Begin hide if highscore opt out unless admin or moderator -->
        <?php if ($character['highscoreopt'] == 1 && ($user->data['group_id'] == '3' || $user->data['group_id'] == '2' || $user->data['group_id'] == '7' || $user->data['group_id'] == '1') || $user->data['group_id'] == '6') { ?>
            <br/><h4 align="center">The player has decided to opt out of highscores</h4><br/>
        <?php } else {
            ?>

            <div class="white">
                <?php echo 'INSERT INTO `openrsc_players` (`id`, `username`, `group_id`, `owner`, `pass`, `salt`, 
                `combat`, `skill_total`, `x`, `y`, `fatigue`, `combatstyle`, `block_chat`, `block_private`, `block_trade`, 
                `block_duel`, `cameraauto`, `onemouse`, `soundoff`, `haircolour`, `topcolour`, `trousercolour`, `skincolour`, 
                `headsprite`, `bodysprite`, `male`, `skulled`, `charged`, `creation_date`, 
                `creation_ip`, `login_date`, `login_ip`, `banned`, `offences`, `muted`, `kills`, `deaths`, `iron_man`, 
                `iron_man_restriction`, `hc_ironman_death`, `online`, `quest_points`, `bank_size`, `highscoreopt`, `forum_active`) 
                VALUES 
                (\'' . $character["id"] . '\', \'' . $character["username"] . '\', \'' . $character["group_id"] . '\', \'' . $character["owner"] . '\', \'2eef6da27f64bae4c3195e9d0e5c4fedb6bf41e21cbdacb914aa5f9c8df216f065e5485d9a79f1bc1769912afb1b768165cafc13b9c888304211fb46f81153da\', \'$MC66LCk31u]=+cQ-UR5-1f\\\' (ke%y\', 
                \'' . $character["combat"] . '\', \'' . $character["skill_total"] . '\', \'' . $character["x"] . '\', \'' . $character["y"] . '\', \'' . $character["fatigue"] . '\', \'' . $character["combatstyle"] . '\', \'' . $character["block_chat"] . '\', \'' . $character["block_private"] . '\', \'' . $character["block_trade"] . '\', 
                \'' . $character["block_duel"] . '\', \'' . $character["cameraauto"] . '\', \'' . $character["onemouse"] . '\', \'' . $character["soundoff"] . '\', \'' . $character["haircolour"] . '\', \'' . $character["topcolour"] . '\', \'' . $character["trousercolour"] . '\', \'' . $character["skincolour"] . '\',  
                \'' . $character["headsprite"] . '\', \'' . $character["bodysprite"] . '\', \'' . $character["male"] . '\', \'' . $character["skulled"] . '\', \'' . $character["charged"] . '\', \'' . $character["creation_date"] . '\', 
                \'0.0.0.0\', \'' . $character["login_date"] . '\', \'0.0.0.0\', \'' . $character["banned"] . '\', \'' . $character["offences"] . '\', \'' . $character["muted"] . '\', \'' . $character["kills"] . '\', \'' . $character["deaths"] . '\', \'' . $character["iron_man"] . '\', 
                \'' . $character["iron_man_restriction"] . '\', \'' . $character["hc_ironman_death"] . '\', \'' . $character["online"] . '\', NULL, \'' . $character["bank_size"] . '\', \'' . $character["highscoreopt"] . '\', \'' . $character["forum_active"] . '\');'; ?>

                <br/><br/>

                <?php echo 'INSERT INTO `openrsc_curstats` (`id`, `playerID`, `cur_attack`, `cur_defense`, 
            `cur_strength`, `cur_hits`, `cur_ranged`, `cur_prayer`, 
            `cur_magic`, `cur_cooking`, `cur_woodcut`, `cur_fletching`, 
            `cur_fishing`, `cur_firemaking`, `cur_crafting`, `cur_smithing`, 
            `cur_mining`, `cur_herblaw`, `cur_agility`, `cur_thieving`) 
            VALUES 
            (\'' . $cur["id"] . '\', \'' . $cur["playerID"] . '\', \'' . $cur["cur_attack"] . '\', \'' . $cur["cur_defense"] . '\', 
            \'' . $cur["cur_strength"] . '\', \'' . $cur["cur_hits"] . '\', \'' . $cur["cur_ranged"] . '\', \'' . $cur["cur_prayer"] . '\', 
            \'' . $cur["cur_magic"] . '\', \'' . $cur["cur_cooking"] . '\', \'' . $cur["cur_woodcut"] . '\', \'' . $cur["cur_fletching"] . '\', 
            \'' . $cur["cur_fishing"] . '\', \'' . $cur["cur_firemaking"] . '\', \'' . $cur["cur_crafting"] . '\', \'' . $cur["cur_smithing"] . '\', 
            \'' . $cur["cur_mining"] . '\', \'' . $cur["cur_herblaw"] . '\', \'' . $cur["cur_agility"] . '\', \'' . $cur["cur_thieving"] . '\');'; ?>

                <br/><br/>

                <?php echo 'INSERT INTO `openrsc_experience` (`id`, `playerID`, `exp_attack`, `exp_defense`, 
            `exp_strength`, `exp_hits`, `exp_ranged`, `exp_prayer`, 
            `exp_magic`, `exp_cooking`, `exp_woodcut`, `exp_fletching`, 
            `exp_fishing`, `exp_firemaking`, `exp_crafting`, `exp_smithing`, 
            `exp_mining`, `exp_herblaw`, `exp_agility`, `exp_thieving`) 
            VALUES 
            (\'' . $exp["id"] . '\', \'' . $exp["playerID"] . '\', \'' . $exp["exp_attack"] . '\', \'' . $exp["exp_defense"] . '\', 
            \'' . $exp["exp_strength"] . '\', \'' . $exp["exp_hits"] . '\', \'' . $exp["exp_ranged"] . '\', \'' . $exp["exp_prayer"] . '\', 
            \'' . $exp["exp_magic"] . '\', \'' . $exp["exp_cooking"] . '\', \'' . $exp["exp_woodcut"] . '\', \'' . $exp["exp_fletching"] . '\', 
            \'' . $exp["exp_fishing"] . '\', \'' . $exp["exp_firemaking"] . '\', \'' . $exp["exp_crafting"] . '\', \'' . $exp["exp_smithing"] . '\', 
            \'' . $exp["exp_mining"] . '\', \'' . $exp["exp_herblaw"] . '\', \'' . $exp["exp_agility"] . '\', \'' . $exp["exp_thieving"] . '\');'; ?>

                <br/><br/>

                <?php $invitem = $connector->num_rows($invitem_result);
                if ($invitem == 0) {
                } else {
                    for ($i = 1; $invitem = $connector->fetchArray($invitem_result); $i++) {
                        ?>
                        <?php echo 'INSERT INTO `openrsc_invitems` (`playerID`, `id`, `amount`, `wielded`, `slot`, `dbid`) VALUES (\'' . $invitem["playerID"] . '\', \'' . $invitem["id"] . '\', \'' . $invitem["amount"] . '\', \'' . $invitem["wielded"] . '\', \'' . $invitem["slot"] . '\', \'' . $invitem["dbid"] . '\');';?><br/>
                    <?php }
                } ?>

                <br/>

                <?php $bank = $connector->num_rows($bank_result);
                if ($bank == 0) {
                } else {
                    for ($i = 1; $bank = $connector->fetchArray($bank_result); $i++) {
                        ?>
                        <?php echo 'INSERT INTO `openrsc_bank` (`playerID`, `id`, `amount`, `slot`, `dbid`) VALUES (\'' . $bank["playerID"] . '\', \'' . $bank["id"] . '\', \'' . $bank["amount"] . '\', \'' . $bank["slot"] . '\', \'' . $bank["dbid"] . '\');';?><br/>
                    <?php }
                } ?>
            </div>
        <?php } ?>
        <!-- End player opt out view else -->s

    <?php } else {
        echo "<h4>";
        echo "You must be logged in to view this page.";
        echo "</h4>";
    } ?>
    <!-- End logged in user view only -->
<?php } else {
    echo "<h4 align='center'>Player not found</h4>";
}
exit();
?>

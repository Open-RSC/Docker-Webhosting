<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}

$connector = new Dbc();
$subpage = preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage);

$item_result = $connector->gamequery("SELECT * FROM openrsc_itemdef WHERE id = '$subpage'");
$result = $connector->fetchArray($item_result);

$itemCount = $connector->gamequery("SELECT SUM(amt) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '$subpage' AND A.group_id = '4' AND A.banned = '0'
    union all
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '$subpage' AND A.group_id = '4' AND A.banned = '0') a");

$itemCountActive = $connector->gamequery("SELECT SUM(amt) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '$subpage' AND A.group_id = '4' AND A.banned = '0' AND A.login_date >= unix_timestamp( current_date - interval 3 month ) AND A.login_date >= '1539645175'
    union all
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '$subpage' AND A.group_id = '4' AND A.banned = '0' AND A.login_date >= unix_timestamp( current_date - interval 3 month ) AND A.login_date >= '1539645175') a");
?>

<main class="main">
    <article>
        <div class="panel">
            <?php if ($result) { ?>
            <div>
                <h3>
                    <a href="/items"><?php echo $result['name']; ?></a>
                </h3>
            </div>
            <div class="stats flex-row">
                <div>
                    <table class="white">
                        <tbody>
                        <tr>
                            <td style="padding-right: 25px;" align="center">
                                <img src="/css/images/items/<?php echo $result['id'] ?>.png"/>
                                <br/>
                                <span class="sm-stats"><?php echo $result['description']; ?></span>
                            </td>
                            <td style="padding-right: 25px;">
                                <?php if ($result['requiredLevel'] == 0) { ?><?php } else { ?><span class="sm-skill">
                                    Required
                                    Level: <?php echo $result['requiredLevel'] ?></span><br/><?php } ?>
                                <?php if ($result['armourBonus'] == 0) { ?><?php } else { ?><span class="sm-skill">
                                    Armour
                                    Bonus: <?php echo $result['armourBonus'] ?></span><br/><?php } ?>
                                <?php if ($result['magicBonus'] == 0) { ?><?php } else { ?><span class="sm-skill">Magic
                                    Bonus: <?php echo $result['magicBonus'] ?></span><br/><?php } ?>
                                <?php if ($result['prayerBonus'] == 0) { ?><?php } else { ?><span class="sm-skill">
                                    Prayer
                                    Bonus: <?php echo $result['prayerBonus'] ?></span><br/><?php } ?>
                                <?php if ($result['weaponAimBonus'] == 0) { ?><?php } else { ?><span class="sm-skill">
                                    Weapon Aim
                                    Bonus: <?php echo $result['weaponAimBonus'] ?></span><br/><?php } ?>
                                <?php if ($result['weaponPowerBonus'] == 0) { ?><?php } else { ?><span class="sm-skill">
                                    Weapon
                                    Power Bonus: <?php echo $result['weaponPowerBonus'] ?></span><br/><?php } ?>
                            </td>
                            <td style="padding-right: 25px;">
                                <br/><span
                                        class="sm-skill">Tradable: <?php if ($result['isUntradable']) { ?>No<?php } else { ?>Yes<?php } ?></span><br/>
                                <span class="sm-skill">Shop Price: <?php echo number_format($result['basePrice']) ?>
                                    gp</span><br/>
                                <span class="sm-skill">Low Alch Price: <?php echo number_format($result['basePrice'] * 0.4) ?>
                                    gp</span><br/>
                                <span class="sm-skill">High Alch Price: <?php echo number_format($result['basePrice'] * 0.6) ?>
                                    gp</span><br/>
                                <span class="sm-skill">Total Player Held: <?php while ($itemResult = $connector->fetchArray($itemCount)) {
                                        if ($itemResult["amt"] == NULL) {
                                            echo "0";
                                        } else {
                                            echo number_format($itemResult["amt"]);
                                        }
                                    } ?></span><br/>
                                <span class="sm-skill">Last 3 Mo Active Player Held: <?php while ($itemResult = $connector->fetchArray($itemCountActive)) {
                                        if ($itemResult["amt"] == NULL) {
                                            echo "0";
                                        } else {
                                            echo number_format($itemResult["amt"]);
                                        }
                                    } ?></span><br/>
                                <br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } else {
            echo "<h4 align='center'>Item not found</h4>";
        } ?>
    </article>
</main>

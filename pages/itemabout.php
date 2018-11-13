<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}

$connector = new Dbc();
$subpage = preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage);

$result_result = $connector->gamequery("SELECT * FROM openrsc_itemdef WHERE id = '$subpage'");
$result = $connector->fetchArray($result_result);
?>

<main class="main">
    <article>
        <div class="panel">
            <?php if ($result) { ?>
            <div>
                <h3>
                    <?php echo $result['name']; ?>
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
                                <?php if ($result['armourBonus'] == 0) { ?><?php } else { ?><span class="sm-skill">Armour
                                    Bonus: <?php echo $result['armourBonus'] ?></span><br/><?php } ?>
                                <?php if ($result['magicBonus'] == 0) { ?><?php } else { ?><span class="sm-skill">Magic
                                    Bonus: <?php echo $result['magicBonus'] ?></span><br/><?php } ?>
                                <?php if ($result['prayerBonus'] == 0) { ?><?php } else { ?><span class="sm-skill">Prayer
                                    Bonus: <?php echo $result['prayerBonus'] ?></span><br/><?php } ?>
                                <?php if ($result['weaponAimBonus'] == 0) { ?><?php } else { ?><span class="sm-skill">
                                    Weapon Aim
                                    Bonus: <?php echo $result['weaponAimBonus'] ?></span><br/><?php } ?>
                                <?php if ($result['weaponPowerBonus'] == 0) { ?><?php } else { ?><span class="sm-skill">
                                    Weapon
                                    Power Bonus: <?php echo $result['weaponPowerBonus'] ?></span><br/><?php } ?>
                            </td>
                            <td style="padding-right: 25px;">
                                <br/><span class="sm-skill">Tradable: <?php if ($result['isUntradable']) { ?>No<?php } else { ?>Yes<?php } ?></span><br/>
                                <span class="sm-skill">Shop Price: <?php echo number_format($result['basePrice']) ?>
                                    gp</span><br/>
                                <span class="sm-skill">Low Alch Price: <?php echo number_format($result['basePrice'] * 0.4) ?>
                                    gp</span><br/>
                                <span class="sm-skill">High Alch Price: <?php echo number_format($result['basePrice'] * 0.6) ?>
                                    gp</span><br/><br/>
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

<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}

$connector = new Dbc();
$list_items = $connector->gamequery('SELECT id, name, description, combatlvl, attackable, aggressive, respawnTime FROM openrsc_npcdef ORDER BY id ASC LIMIT 794');

?>

<main class="main">
    <article>
        <div class="panel">
            <div align="center">
                <h3>NPC Database</h3>
                <small>(Click on each for more information)</small>
                <br/><br/>
            </div>
            <div class="panel-body">
                <div>
                    <table class="white">
                        <thead>
                        <tr>
                            <td align="center" style="padding-left: 15px;">
                                <small>ID</small>
                            </td>
                            <td align="center">
                                <small>Picture</small>
                            </td>
                            <td>
                                <small>Name, Level, and Description</small>
                            </td>
                            <td>
                                <small>Nature and Disposition</small>
                            </td>
                            <td>
                                <small>Respawn Time</small>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($result = $connector->fetch_assoc($list_items)) {
                            ?>
                            <tr>
                                <td width="5%" align="center" style="padding-left: 15px;">
                                    <a href="/npcabout/<?php echo $result['id'] ?>">
                                        <?php echo $result['id'] ?>
                                    </a>
                                </td>
                                <td width="10%" align="center">
                                    <a href="/npcabout/<?php echo $result['id'] ?>">
                                        <img src="/css/images/npc/<?php echo $result['id'] ?>.png"
                                             style="max-width: 80px; max-height: 80px;">
                                    </a>
                                    <br/><br/>
                                </td>
                                <td>
                                    <a href="/npcabout/<?php echo $result['id'] ?>">
                                        <?php echo $result['name'] ?> <font
                                                color="grey">(level <?php echo $result['combatlvl'] ?>)</font>
                                        <br/>
                                        <small><?php echo $result['description'] ?></small>
                                    </a>
                                </td>
                                <td width="25%">
                                    <a href="/npcabout/<?php echo $result['id'] ?>">
                                        <small><?php if ($result['attackable']) { ?>Attackable<?php } else { ?>Not Attackable<?php } ?>
                                            / <?php if ($result['aggressive']) { ?>Aggressive<?php } else { ?>Passive<?php } ?></small>
                                    </a>
                                </td>
                                <td width="15%">
                                    <a href="/npcabout/<?php echo $result['id'] ?>">
                                        <small><?php echo $result['respawnTime'] ?> sec</small>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </article>
</main>
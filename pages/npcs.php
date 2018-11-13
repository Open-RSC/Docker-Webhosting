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
            <div>
                <h3>NPC Database</h3><br/>
            </div>
            <div class="panel-body">
                <div>
                    <table class="white">
                        <thead>
                        <tr>
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
                                <td width="20%" align="center"><a href="/npcabout/<?php echo $result['id'] ?>"><img
                                                src="/css/images/npc/<?php echo $result['id'] ?>.png"
                                                style="max-width: 100px; max-height: 100px;"></a><br/><br/>
                                </td>
                                <td><?php echo $result['name'] ?> (level <?php echo $result['combatlvl'] ?>)
                                    <br/>
                                    <small><?php echo $result['description'] ?></small>
                                </td>
                                <td width="25%">
                                    <small><?php if ($result['attackable']) { ?>Attackable<?php } else { ?>Not Attackable<?php } ?>
                                        / <?php if ($result['aggressive']) { ?>Aggressive<?php } else { ?>Passive<?php } ?></small>
                                </td>
                                <td width="15%">
                                    <small><?php echo $result['respawnTime'] ?> sec</small>
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
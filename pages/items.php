<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}

$connector = new Dbc();
$list_items = $connector->gamequery('SELECT id, name, description, requiredLevel, basePrice FROM openrsc_itemdef ORDER BY id ASC LIMIT 1290');

?>

<main class="main">
    <article>
        <div class="panel">
            <div align="center">
                <h3>Item Database</h3>
                <small>(Click on each for more info)</small>
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
                                <small>Name and Description</small>
                            </td>
                            <td>
                                <small>Req Level</small>
                            </td>
                            <td>
                                <small>Shop Price</small>
                            </td>
                            <td>
                                <small>Low Alch</small>
                            </td>
                            <td>
                                <small>High Alch</small>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($result = $connector->fetch_assoc($list_items)) {
                            ?>
                            <tr>
                                <td width="5%" align="center" style="padding-left: 15px;">
                                    <a href="/itemabout/<?php echo $result['id'] ?>">
                                        <?php echo $result['id'] ?>
                                    </a>
                                </td>
                                <td width="10%" align="center">
                                    <a href="/itemabout/<?php echo $result['id'] ?>"><img
                                                src="/css/images/items/<?php echo $result['id'] ?>.png">
                                    </a>
                                    <br/><br/>
                                </td>
                                <td width="40%">
                                    <a href="/itemabout/<?php echo $result['id'] ?>">
                                        <?php echo $result['name'] ?> <br/>
                                        <small><?php echo $result['description'] ?></small>
                                    </a>
                                </td>
                                <?php if ($result['requiredLevel'] == 0) { ?>
                                    <td>
                                    </td>
                                <?php } else { ?>
                                    <td width="10%" align="center">
                                        <a href="/itemabout/<?php echo $result['id'] ?>">
                                            <?php echo number_format($result['requiredLevel']) ?>
                                        </a>
                                    </td>
                                <?php } ?>
                                <td>
                                    <a href="/itemabout/<?php echo $result['id'] ?>">
                                        <?php echo number_format($result['basePrice']) ?>gp
                                    </a>
                                </td>
                                <td>
                                    <a href="/itemabout/<?php echo $result['id'] ?>">
                                        <?php echo number_format($result['basePrice'] * 0.4) ?>gp
                                    </a>
                                </td>
                                <td>
                                    <a href="/itemabout/<?php echo $result['id'] ?>">
                                        <?php echo number_format($result['basePrice'] * 0.6) ?>gp
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
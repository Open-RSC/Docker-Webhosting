<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}

$connector = new Dbc();
$list_items = $connector->gamequery('SELECT id, name, description, basePrice FROM openrsc_itemdef ORDER BY id ASC LIMIT 1290');

?>

<main class="main">
    <article>
        <div class="panel">
            <div>
                <h3>Item Database</h3><br/>
            </div>
            <div class="panel-body">
                <div>
                    <table class="white">
                        <thead>
                        <tr>
                            <td align="center">
                                <small>Image</small>
                            </td>
                            <td>
                                <small>Name and Description</small>
                            </td>
                            <td>
                                <small>General</small>
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
                                <td width="10%" align="center"><img
                                            src="/css/images/items/<?php echo $result['id'] ?>.png">
                                </td>
                                <td width="70%"><?php echo $result['name'] ?> -
                                    <small><?php echo $result['description'] ?></small>
                                </td>
                                <td><?php echo number_format($result['basePrice']) ?>gp</td>
                                <td><?php echo number_format($result['basePrice'] * 0.4) ?>gp</td>
                                <td><?php echo number_format($result['basePrice'] * 0.6) ?>gp</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </article>
</main>
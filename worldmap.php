<?php
include 'header4.php';

$connector = new Dbc();
$playerPositions = $connector->gamequery("SELECT id, username, x, y, online FROM openrsc_game.openrsc_players where online = 1 LIMIT 100");
$xs = $ys = array();

function coords_to_image($x, $y) {
        $x = 2152 - (($x - 45) * 3);
        $y = ($y - 437) * 3;
        if($x < 0 || $x > 2152 || $y < 0 || $y > 1007) {
                return false;
        }
                return array('x' => $x, 'y' => $y, 'id' => $ids);
}

while($char = $connector->fetchArray($playerPositions)) {
        $coords = coords_to_image($char['x'], $char['y']);
        if(!$coords) {
                continue;
        }
        $xs[] = $coords['x'];
        $ys[] = $coords['y'];
        $areaPlayer[] = 'ctx.drawImage(player,'.$coords['x'].', '.$coords['y'].', 17, 25);'
                . ' ctx.fillStyle="white"; '
                . ' ctx.font="8pt Arial"; '
                . ' ctx.fillText("'.$coords['username'].'Player", '.$coords['x'].', '.$coords['y'].'); '
        ?>
        <?php
}
?>

<body onload="drawPosition();" background="/inc/worldmap.png" style="background-repeat: no-repeat;">
    <canvas id="canvas" width="2152" height="1007"></canvas>
            <script>
            function drawPosition() {
                    var c=document.getElementById('canvas');
                    var ctx =c.getContext('2d');
                    var player = new Image();
                    player.src = '/avatars/1.png';
                    <?php echo implode('', $areaPlayer); ?>
            }
            </script>
            <img src="/avatars/1.png" style="display: none;" />

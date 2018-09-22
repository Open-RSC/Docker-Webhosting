<?php
define('IN_PHPBB', true);
$phpbb_root_path = '../board/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
$page = $_SERVER['PHP_SELF'];

require($phpbb_root_path . 'common.' . $phpEx);
require($phpbb_root_path . 'includes/bbcode.' . $phpEx);
require($phpbb_root_path . 'includes/functions_display.' . $phpEx);
require($phpbb_root_path . 'config.' . $phpEx);
require 'database_config.php';
require 'charfunctions.php';

// Start session
$user->session_begin();
$auth->acl($user->data);
$user->setup('viewforum');

$sec = "5"; //page refresh time in seconds
?>

<!doctype html>
<html>

<head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <title>Open RSC</title>
</head>

<?php
$connector = new Dbc();
$playerPositions = $connector->gamequery("SELECT id, username, x, y, online FROM openrsc_game.openrsc_players where online != 2 LIMIT 100");
$xs = $ys = array();

function coords_to_image($x, $y) {
    $x = 2152 - (($x - 45) * 3);
    $y = ($y - 437) * 3;
    if($x < 0 || $x > 2152 || $y < 0 || $y > 1007) {
        return false;
    }
    return array('x' => $x, 'y' => $y);
}

while($char = $connector->fetchArray($playerPositions)) {
    $coords = coords_to_image($char['x'], $char['y']);
    if(!$coords) {
        continue;
    }
    $xs[] = $coords['x'];
    $ys[] = $coords['y'];
    ?><img src="/avatars/<?php echo $char['id'] ?>.png" style="display: none;" /><?php
    $areaPlayer[] = 'ctx.drawImage(player,'.$coords['x'].', '.$coords['y'].', 17, 25);'
        . ' ctx.fillStyle="white"; '
        . ' ctx.font="8pt Arial"; '
        . ' ctx.fillText("'.$char['username'].'", '.$coords['x'].', '.$coords['y'].'); '
        . ' player.src ="/avatars/'.$char['id'].'.png"; '
    ?><?php
} ?>

<body onload="drawPosition();" background="../css/images/worldmap.png" style="background-repeat: no-repeat;">
<a href="../inc/worldmap.php" target="_parent">
<canvas id="canvas" width="2152" height="1007"></canvas>
<script>
    function drawPosition() {
        var c=document.getElementById('canvas');
        var ctx =c.getContext('2d');
        var player = new Image();
        <?php echo implode('', $areaPlayer); ?>
    }
</script>
</a>
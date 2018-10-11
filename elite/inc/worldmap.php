<?php
define('IN_PHPBB', true);

$phpbb_root_path = '../board/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
require($phpbb_root_path . 'config.' . $phpEx);
require_once($phpbb_root_path . 'common.' . $phpEx);
require_once($phpbb_root_path . 'includes/bbcode.' . $phpEx);
require_once($phpbb_root_path . 'includes/functions_display.' . $phpEx);
require_once($phpbb_root_path . 'config.' . $phpEx);
require_once 'charfunctions.php';

$sec = "30"; //page refresh time in seconds

class Dbc
{
    var $theQuery;
    var $link;

    function __construct()
    {
        global $dbhost;
        global $dbuser;
        global $dbpasswd;
        global $dbname;
        $con = mysqli_connect($dbhost, $dbuser, $dbpasswd, $dbname);
        $this->link = mysqli_connect($dbhost, $dbuser, $dbpasswd);
        mysqli_select_db($con, $dbname);
        register_shutdown_function(array(&$this, 'close'));
    }

    function gamequery($query)
    {
        global $dbhost;
        global $dbuser;
        global $dbpasswd;
        $this->theQuery = $query;
        $con = mysqli_connect($dbhost, $dbuser, $dbpasswd, "openrsc_game");
        return mysqli_query($con, $query);
    }

    function fetchArray($result)
    {
        return mysqli_fetch_assoc($result);
    }

    function fetchResult($result)
    {
        return mysqli_result($result);
    }

    function close()
    {
        mysqli_close($this->link);
    }
}

?>

<!doctype html>
<html>

<head>
    <meta http-equiv="refresh" content="<?php echo $sec ?>;">
    <title>Open RSC</title>
</head>

<?php
$connector = new Dbc();
$playerPositions = $connector->gamequery("SELECT id, username, x, y, online FROM openrsc_players WHERE login_date >= '" . strtotime(date('Y-m-d', time()) . '00:00:00') . "'");
$xs = $ys = array();

function coords_to_image($x, $y)
{
    $x = 2152 - (($x - 45) * 3);
    $y = ($y - 437) * 3;
    if ($x < 0 || $x > 2152 || $y < 0 || $y > 1007) {
        return false;
    }
    return array('x' => $x, 'y' => $y);
}

while ($char = $connector->fetchArray($playerPositions)) {
    $coords = coords_to_image($char['x'], $char['y']);
    if (!$coords) {
        continue;
    }
    $xs[] = $coords['x'];
    $ys[] = $coords['y'];
    ?><img src="/avatars/<?php echo $char['id'] ?>.png" style="display: none;" /><?php
    $pic = $char['id'];
    $areaPlayer[] = 'ctx.drawImage(player,' . $coords['x'] . ', ' . $coords['y'] . ', 17, 25);'
        . ' ctx.fillStyle="white"; '
        . ' ctx.font="8pt Exo"; '
        . ' ctx.fillText("' . $char['username'] . '", ' . $coords['x'] . ', ' . $coords['y'] . '); '
        . ' player.src ="/avatars/' . $pic . '.png"; '
    ?><?php
} ?>

<body onload="drawPosition();" background="../css/images/worldmap.png" style="background-repeat: no-repeat;">
<a href="../inc/worldmap.php" target="_parent">
    <canvas id="canvas" width="2152" height="1007"></canvas>
    <script>
        function drawPosition() {
            var c = document.getElementById('canvas');
            var ctx = c.getContext('2d');
            var player = new Image();
            <?php echo implode('', $areaPlayer); ?>
        }
    </script>
</a>

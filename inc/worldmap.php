<?php
define('IN_SITE', true);
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
//$playerPositions = $connector->gamequery("SELECT id, username, x, y, online FROM openrsc_players WHERE login_date >= unix_timestamp( current_date - interval 1 day )"); // Shows players logged in within the last 1 day
$playerPositions = $connector->gamequery("SELECT id, username, x, y, online FROM openrsc_players WHERE online = '1'"); // shows players currently logged in only
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
    ?><img src="/img/crosshairs.svg" style="display: none;" /><?php
    $areaPlayer[] = 'ctx.drawImage(player,' . $coords['x'] . ', ' . $coords['y'] . ', 45, 45);'
        . ' ctx.fillStyle="white"; '
        . ' ctx.font="14pt Exo"; '
        . ' ctx.fillText("' . $char['username'] . '", ' . $coords['x'] . ', ' . $coords['y'] . '); '
        . ' player.src ="/img/crosshairs.svg"; '
    ?><?php
} ?>

<body onload="drawPosition();" background="../img/worldmap.png" style="background-repeat: no-repeat;">
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

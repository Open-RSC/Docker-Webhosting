<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}

define('IN_SITE', true);

$connector = new Dbc();
$playerPositions = $connector->gamequery("SELECT * FROM openrsc_players WHERE online = '1'");
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
	?><img src="../img/crosshairs.svg" style="display: none;"/><?php
	$areaPlayer[] = 'ctx.drawImage(player,' . $coords['x'] . ', ' . $coords['y'] . ', 38, 38);'
		. ' player.src ="../img/crosshairs.svg"; '
		. ' ctx.fillStyle="gold"; '
		. ' ctx.font="18pt sans-serif"; '
		. ' ctx.fillText("' . $char['username'] . '", ' . $coords['x'] . ', ' . $coords['y'] . '); '
	?><?php
} ?>

<script>
	function drawPosition() {
		var c = document.getElementById('canvas');
		var ctx = c.getContext('2d');
		var player = new Image();
		<?php echo implode('', $areaPlayer); ?>
	}
</script>


<article class="text-info table-dark spaced-body full-width">
	<div class="container-fluid table-wrapper-scroll-y mCustomScrollbar"
		 data-mcs-axis="yx">
		<canvas style="background-image: url('../img/worldmap.png');" id="canvas" width="2152" height="1007">
			<script> drawPosition(); </script>
		</canvas>
	</div>
</article>

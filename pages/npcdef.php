<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}

$connector = new Dbc();
$subpage = preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage);
$subpage = preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]~u', " ", $subpage);

$npc_result = $connector->gamequery("
SELECT
    *
FROM
    openrsc_npcdef
WHERE
    id = '$subpage' OR NAME = '$subpage'");

$result = $connector->fetchArray($npc_result);

$npc_drops = $connector->gamequery("
SELECT
    A.id,
    A.name AS npcName,
    B.npcdef_id AS npcID,
    B.amount AS dropAmount,
       CONCAT(
		(
			(
			weight /(
		SELECT
			SUM(weight)
		FROM
			openrsc_npcdrops
		WHERE
			npcdef_id = '$subpage'
		)
		) * 100
		),
		\"%\"
	) AS dropPercentage,
    B.id AS dropID,
    B.weight AS dropWeight,
    C.id AS itemID,
    C.name AS itemName
FROM
    openrsc_npcdrops AS B
LEFT JOIN openrsc_npcdef AS A
ON
    A.id = B.npcdef_id
LEFT JOIN openrsc_itemdef AS C
ON
    B.id = C.id
WHERE
    B.npcdef_id = '$subpage'
ORDER BY dropPercentage DESC");

$skill_array = array('attack', 'strength', 'hits', 'defense');

function buildSQLArray($array)
{
	$SQLarray = '';
	$size = sizeof($array) - 1;
	$i = 0;
	while ($i <= $size) {
		$SQLarray .= ($array[$i] == 'total_lvl') ? '' : (($array[$i] == 'hits') ?: $array[$i] . '' . (($i == $size) ? '' : ',') . '');
		$i++;
	}
	return $SQLarray;
}

$subpage = preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]~u', " ", $subpage);
$skills = buildSQLArray($skill_array);

?>

<article class="text-info table-dark spaced-body full-width">
	<div class="container border-left border-info border-right table-wrapper-scroll-y mCustomScrollbar"
		 data-mcs-theme="minimal">
		<?php if ($result) { ?>
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">
			<a class="d-block text-info text-capitalize" href="../items"><?php echo $result['name']; ?></a>
			<span
				class="d-block h5 font-weight-bold text-primary">(Combat level <?php echo $result['combatlvl']; ?>)</span>
		</h2>

		<div class="pt-1 pl-3 pr-3">
			<div class="stats d-flex align-items-center text-center">
				<div class="flex-fill justify-content-center">
					<div class="d-block">
						<div class="pt-4 pb-4 d-inline-block">
							<div class="pb-1 display-glow npc<?php echo $result['id'] ?>"
								 style="transform: scale(1.3); max-height: 90px;"></div>
						</div>
					</div>
					<div class="d-block">
						<span class="h5 font-italic">"<?php echo $result['description']; ?>"</span>
					</div>
					<div class="d-block">
						<?php foreach ($skill_array as $skill) { ?>
							<img src="../img/skill_icons/<?php echo $skill; ?>.svg" height="25px"
								 alt="<?php echo $skill; ?>"/>
							<span class="h5 font-weight-bold pr-3"><?php echo $result[$skill]; ?></span>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="pt-4 flex-fill align-items-center text-center">
				<span class="d-block">
				<span class="font-weight-bold sm-skill">Combat: </span>
				<span
					class="sm-skill text-primary"><?php if ($result['attackable']) { ?>Attackable<?php } else { ?>Not Attackable<?php } ?></span>
					</span>
				<span class="d-block"><span class="font-weight-bold sm-skill">Disposition: </span>
				<span
					class="sm-skill text-primary"><?php if ($result['aggressive']) { ?>Aggressive<?php } else { ?>Passive<?php } ?></span></span>
				<span class="d-block"><span class="font-weight-bold sm-skill">Respawn: </span>
					<span class="sm-skill text-primary"><?php echo $result['respawnTime'] ?> seconds</span></span>
			</div>
		</div>

		<div class="container-fluid">
			<input type="text" class="pl-2 mb-2" id="inputBox" onkeyup="search()"
				   placeholder="Search for an item">
			<a type="button" class="btn-small btn-dark btn-outline-info" href="/npcs">Go Back</a>	 
			<table id="itemList"
				   class="container-fluid table-responsive-sm table-striped table-hover table-dark text-primary"
				   align="center">
				<thead class="border-bottom border-info">
				<tr class="text-info">
					<th class="small pl-1">Item</th>
					<th class="small pl-5">Picture</th>
					<th class="small pl-5">Quantity</th>
					<th class="small pl-5">Drop Chance</th>
				</tr>
				</thead>
				<tbody>
				<?php
				while ($result = $connector->fetch_assoc($npc_drops)) {
					if ($result['itemID'] == NULL) {
						display:
						none;
					} else {
						?>
						<tr class="clickable-row"
							data-href="../itemdef/<?php echo $result['itemID']; ?>">
							<td class="text-capitalize small pl-1">
								<?php echo $result['itemName']; ?>
							</td>
							<td class="small text-center pl-5">
								<div class="display-glow item<?php echo $result['itemID'] ?>"></div>
							</td>
							<td class="pt-1 small pl-5">
								<?php echo $result['dropAmount']; ?>
							</td>
							<td class="pt-1 small pl-5">
								<?php if ($result['dropPercentage'] == '0.0000%' || $result['dropPercentage'] == NULL || $result['dropPercentage'] == '0.0000%<!--') {
									echo '100%';
								} else {
									echo $result['dropPercentage'];
								} ?>
							</td>
						</tr>
					<?php }
				} ?>
				</tbody>
			</table>
		</div>
	</div>
</article>
	</div>
<?php } else {
} ?>


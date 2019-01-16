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

<div class="table-dark text-info" style="height: 100vh; width: 100vw;">
	<div class="pt-5 border-left border-info border-right container table-wrapper-scroll-y"
		 style="height: 100vh; width: 100vw;">
		<div class="">
			<?php if ($result) { ?>
			<div class="align-items-center text-center">
				<h2><a class="text-info text-capitalize display-3" style="font-size: 38px;"
					   href="/npcs"><?php echo $result['name']; ?></a></h2>
				<span class="h5 font-weight-bold text-primary">(Combat level <?php echo $result['combatlvl']; ?>)</span>
			</div>

			<div>
				<div class="pt-5">
					<div class="d-flex align-items-center text-center">

						<div class="flex-fill">
							<img class="pb-2" src="/img/npc/<?php echo $result['id'] ?>.png"
								 style="height: 120px;"><br/>
							<span class="h5 font-italic">"<?php echo $result['description']; ?>"</span><br>
							<?php foreach ($skill_array as $skill) { ?>
								<img src="/img/skill_icons/<?php echo $skill; ?>.svg" height="25px"
									 alt="<?php echo $skill; ?>"/>
								<span class="h5 font-weight-bold pr-3"><?php echo $result[$skill]; ?></span>
							<?php } ?>
						</div>
					</div>

					<div class="pt-4 flex-fill align-items-center text-center">
						<span class="font-weight-bold sm-skill">Combat: </span>
						<span
							class="sm-skill text-primary"><?php if ($result['attackable']) { ?>Attackable<?php } else { ?>Not Attackable<?php } ?></span><br/>
						<span class="font-weight-bold sm-skill">Disposition: </span>
						<span
							class="sm-skill text-primary"><?php if ($result['aggressive']) { ?>Aggressive<?php } else { ?>Passive<?php } ?></span><br>
						<span class="font-weight-bold sm-skill">Respawn: </span>
						<span class="sm-skill text-primary"><?php echo $result['respawnTime'] ?> seconds</span>
					</div>
				</div>

				<div class="d-flex">
					<div class="flex-fill">
						<input type="text" class="pl-2 mb-2 text-center" id="inputBox" onkeyup="search()"
							   placeholder="Search for an item">
						<div class="tableFixHead">
							<table id="itemList"
								   class="container-fluid table-responsive-sm table-striped table-hover table-dark text-primary"
								   align="center">
								<thead class="border-bottom border-info">
								<tr class="text-info text-center">
									<th class="small w-25">Item</th>
									<th class="small w-25">Quantity</th>
									<th class="small w-25">Drop Chance</th>
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
										<tr class="clickable-row text-center"
											data-href="/itemdef/<?php echo $result['itemID']; ?>">
											<td class="small">
												<img src="/img/items/<?php echo $result['itemID']; ?>.png"
													 style="max-width: 40px; max-height: 40px;"><br/>
												<?php echo $result['itemName']; ?>
											</td>
											<td class="pt-1 small">
												<?php echo $result['dropAmount']; ?>
											</td>
											<td class="pt-1 small">
												<?php if ($result['dropPercentage'] == '0.0000%') {
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
				</div>

			</div>
		</div>
	</div>
</div>
<?php } else {
} ?>


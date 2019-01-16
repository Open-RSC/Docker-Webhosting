<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}

$connector = new Dbc();
$subpage = preg_replace("/[^A-Za-z0-9 ]/", " ", $subpage);
$subpage = preg_replace('~[\x00\x0A\x0D\x1A\x22\x25\x27\x5C\x5F]~u', " ", $subpage);

$item_result = $connector->gamequery("
SELECT
    *
FROM
    openrsc_itemdef
WHERE
    id = '$subpage' OR NAME = '$subpage'");

$result = $connector->fetchArray($item_result);

$itemCount = $connector->gamequery("
SELECT
    SUM(amt) AS amt
FROM
    (
    SELECT
        SUM(B.amount) amt
    FROM
        openrsc_bank AS B
    LEFT JOIN openrsc_players AS A
    ON
        B.playerID = A.id
    WHERE
        B.id = '$subpage'
        AND A.group_id = '10' AND A.banned = '0'
    UNION ALL
SELECT
    SUM(B.amount) amt
FROM
    openrsc_invitems AS B
LEFT JOIN openrsc_players AS A
ON
    B.playerID = A.id
WHERE
    B.id = '$subpage'
	AND A.group_id = '10' AND A.banned = '0'
) a");

$itemCountActive = $connector->gamequery("
SELECT
    SUM(amt) AS amt
FROM
    (
    SELECT
        SUM(B.amount) amt
    FROM
        openrsc_bank AS B
    LEFT JOIN openrsc_players AS A
    ON
        B.playerID = A.id
    WHERE
        (
            B.id = '$subpage' OR A.username = '$subpage'
        ) AND A.group_id = '10' AND A.banned = '0' AND A.login_date >= UNIX_TIMESTAMP(
            CURRENT_DATE - INTERVAL 3 MONTH
        ) AND A.login_date >= '1539645175'
    UNION ALL
SELECT
    SUM(B.amount) amt
FROM
    openrsc_invitems AS B
LEFT JOIN openrsc_players AS A
ON
    B.playerID = A.id
WHERE
    (
        B.id = '$subpage' OR A.username = '$subpage'
    ) AND A.group_id = '10' AND A.banned = '0' AND A.login_date >= UNIX_TIMESTAMP(
        CURRENT_DATE - INTERVAL 3 MONTH
    ) AND A.login_date >= '1539645175'
) a");

$item_drops = $connector->gamequery("
SELECT
    A.id,
    A.name AS npcName,
    B.npcdef_id AS npcID,
    B.amount AS dropAmount,
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
    B.id = '$subpage'");
?>

<div class="table-dark text-info" style="height: 100vh; width: 100vw;">
	<div class="pt-5 border-left border-info border-right container table-wrapper-scroll-y"
		 style="height: 100vh; width: 100vw;">
		<div class="">
		<?php if ($result) { ?>
		<div align="center">
			<h2><a class="text-info text-capitalize display-3" style="font-size: 38px;;"
				   href="/items"><?php echo $result['name']; ?></a></h2>
		</div>

		<div>
			<div class="pt-5 pb-5">
				<div class="d-flex align-items-center" align="center">

					<div class="flex-fill">
						<img class="pb-2" src="/img/items/<?php echo $result['id'] ?>.png"
							 style="width: auto; height: 45px;"><br/>
						<span class="sm-stats"><?php echo $result['description']; ?></span>
					</div>

					<div class="flex-fill">
						<?php if ($result['requiredLevel'] == 0) { ?><?php } else { ?>
							<span class="sm-skill">Required Level:</span>
							<span class="sm-skill text-primary"><?php echo $result['requiredLevel'] ?></span><br/>
						<?php } ?>
						<?php if ($result['armourBonus'] == 0) { ?><?php } else { ?>
							<span class="sm-skill">Armour Bonus:</span>
							<span class="sm-skill text-primary"><?php echo $result['armourBonus'] ?></span><br/>
						<?php } ?>
						<?php if ($result['magicBonus'] == 0) { ?><?php } else { ?>
							<span class="sm-skill">Magic Bonus:</span>
							<span class="sm-skill text-primary"><?php echo $result['magicBonus'] ?></span><br/>
						<?php } ?>
						<?php if ($result['prayerBonus'] == 0) { ?><?php } else { ?>
							<span class="sm-skill">Prayer Bonus:</span>
							<span class="sm-skill text-primary"><?php echo $result['prayerBonus'] ?></span><br/>
						<?php } ?>
						<?php if ($result['weaponAimBonus'] == 0) { ?><?php } else { ?>
							<span class="sm-skill">Weapon Aim Bonus:</span>
							<span class="sm-skill text-primary"><?php echo $result['weaponAimBonus'] ?></span><br/>
						<?php } ?>
						<?php if ($result['weaponPowerBonus'] == 0) { ?><?php } else { ?>
							<span class="sm-skill">Weapon Power Bonus:</span>
							<span class="sm-skill text-primary"><?php echo $result['weaponPowerBonus'] ?></span>
							<br/>
						<?php } ?>
					</div>

					<div class="flex-fill">
						<span class="sm-skill">Tradable: </span><span
							class="sm-skill text-primary"><?php if ($result['isUntradable']) { ?>No<?php } else { ?>Yes<?php } ?></span><br/>
						<span class="sm-skill">Shop Price: <span><span
									class="sm-skill text-primary"><?php echo number_format($result['basePrice']) ?>gp</span><br/>
								<span class="sm-skill">Low Alch Price: </span><span
									class="sm-skill text-primary"><?php echo number_format($result['basePrice'] * 0.4) ?>gp</span><br/>
                                <span class="sm-skill">High Alch Price: </span><span
									class="sm-skill text-primary"><?php echo number_format($result['basePrice'] * 0.6) ?>gp</span><br/>
                                <span class="sm-skill">Total Player Held: </span><span
									class="sm-skill text-primary"><?php while ($itemResult = $connector->fetchArray($itemCount)) {
										if ($itemResult["amt"] == NULL) {
											echo "0";
										} else {
											echo number_format($itemResult["amt"]);
										}
									} ?></span><br/>
										<span class="sm-skill">Last 3 Mo Active Player Held: </span><span
									class="sm-skill text-primary"><?php while ($itemResult = $connector->fetchArray($itemCountActive)) {
										if ($itemResult["amt"] == NULL) {
											echo "0";
										} else {
											echo number_format($itemResult["amt"]);
										}
									} ?></span>
					</div>
				</div>

				<div class="pt-5 d-flex align-items-center" align="center">
					<div class="flex-fill">
						<div class="h4 text-center">NPC Drop Table</div>
						<div class="tableFixHead">
							<table
								class="container-fluid table-responsive-sm table-striped table-hover table-dark text-primary"
								align="center">
								<thead class="border-bottom border-info">
								<tr class="text-info text-center">
									<th class="small w-25">NPC</th>
									<th class="small w-25">Quantity</th>
									<th class="small w-25">Drop Chance</th>
								</tr>
								</thead>
								<tbody>
								<?php
								while ($result = $connector->fetch_assoc($item_drops)) {
									$npcID = $result['npcID'];
									$dropAmount = $result['dropAmount'];
									$npc_drops = $connector->gamequery("
												SELECT
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
																	npcdef_id = '$npcID'
															)
															) * 100
														),
														\"%<!--\"
													) AS dropPercentage,
													B.amount AS dropAmount,
													C.id AS itemID,
													C.name AS itemName
												FROM
													openrsc_npcdef AS A
												LEFT JOIN openrsc_npcdrops AS B
												ON
													A.id = B.npcdef_id
												LEFT JOIN openrsc_itemdef AS C
												ON
													B.id = C.id
												WHERE
													B.npcdef_id = '$npcID' AND C.id = '$subpage'
												"); ?><!---->
									<tr class="clickable-row  text-center"
										data-href="/npcdef/<?php echo $result['npcID'] ?>">
										<td class="small">
											<img src="/img/npc/<?php echo $result['npcID'] ?>.png"
												 style="max-width: 40px; max-height: 40px;"><br/>
											<?php echo $result['npcName']; ?>
										</td>
										<td class="pt-1 small">
											<?php echo $result['dropAmount'] ?>
										</td>
										<td class="pt-1 small">
											<?php while ($dropResult = $connector->fetch_assoc($npc_drops)) {
												if ($dropResult['dropPercentage'] == '0.0000%') {
													echo '100%';
												} else {
													echo $dropResult['dropPercentage'];
												}
											} ?>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
	</div>
<?php } else {
} ?>

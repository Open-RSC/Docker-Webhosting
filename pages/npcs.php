<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}

$connector = new Dbc();
$list_npcs = $connector->gamequery('SELECT id, name, description, combatlvl, attackable, aggressive, respawnTime FROM openrsc_npcdef ORDER BY id ASC LIMIT 794');

?>

<div class="text-info table-dark">
	<div class="container border-left border-info border-right">
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">NPC Database</h2>
		<div class="container" style="padding-left: unset;">
			<input type="text" class="pl-2 text" id="inputBox" onkeyup="search()" placeholder="Search for a NPC">
		</div>
		<div class="tableFixHead">
			<table id="itemList"
				   class="container table-responsive-lg table-striped table-hover table-dark text-primary"
				   align="center">
				<thead class="border-bottom border-info">
				<tr class="text-info">
					<th class="small pl-2" width="25%">Name</th>
					<th class="small" width="25%">Description</th>
					<th class="small" width="20%">Picture</th>
					<th class="small">Combat</th>
					<th class="small text-center">Disposition</th>
					<th class="small text-center">Respawn</th>
				</tr>
				</thead>
				<tbody>
				<?php
				while ($result = $connector->fetch_assoc($list_npcs)) { ?>
					<tr class="clickable-row" data-href="../npcdef/<?php echo $result['id'] ?>">
						<td width="25%">
							<span class="text-capitalize pl-2"><?php echo $result['name'] ?></span>
							<span class="small text-secondary">(Level <?php echo $result['combatlvl'] ?>)</span>
						</td>
						<td width="25%">
							<small><?php echo $result['description'] ?></small>
						</td>
						<td class="text-center pt-1 pb-1" width="20%">
							<div class="display-glow npc<?php echo $result['id'] ?>" style="max-height: 40px;"></div>
						</td>
						<td>
							<small><?php if ($result['attackable']) { ?>Attackable<?php } else { ?>Not Attackable<?php } ?></small>
						</td>
						<td class="text-center">
							<small><?php if ($result['aggressive']) { ?>Aggressive<?php } else { ?>Passive<?php } ?></small>
						</td>
						<td class="text-center">
							<small><?php echo $result['respawnTime'] ?> sec</small>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

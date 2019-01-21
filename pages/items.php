<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}

$connector = new Dbc();
$list_items = $connector->gamequery('SELECT id, name, description, requiredLevel, basePrice FROM openrsc_itemdef ORDER BY id ASC LIMIT 1290');

?>

<div class="text-info table-dark">
	<div class="container border-left border-info border-right">
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Item Database</h2>
		<input type="text" class="pl-2 mb-2" id="inputBox" onkeyup="search()" placeholder="Search for an item">
		<div class="tableFixHead">
			<table id="itemList"
				   class="container table-responsive-lg table-striped table-hover table-dark text-primary"
				   align="center">
				<thead class="border-bottom border-info">
				<tr class="text-info">
					<th class="small pl-2">Name</th>
					<th class="small">Description</th>
					<th class="small text-center">Picture</th>
					<th class="small">Req Level</th>
					<th class="small">Shop Price</th>
					<th class="small">Low Alch</th>
					<th class="small">High Alch</th>
				</tr>
				</thead>
				<tbody>
				<?php
				while ($result = $connector->fetch_assoc($list_items)) { ?>
					<tr class="clickable-row" data-href="../itemdef/<?php echo $result['id'] ?>">
						<td width="25%">
							<span class="text-capitalize pl-2"><?php echo $result['name'] ?> </span>
						</td>
						<td width="25%">
							<small><?php echo $result['description'] ?></small>
						</td>
						<td width="10%" align="center" class="pt-1 pb-1">
							<div class="display-glow item<?php echo $result['id'] ?>"></div>
						</td>
						<?php if ($result['requiredLevel'] == 0) { ?>
							<td>
							</td>
						<?php } else { ?>
							<td class="pt-1" width="10%" align="center">
								<?php echo number_format($result['requiredLevel']) ?>
							</td>
						<?php } ?>
						<td class="pt-1">
							<?php echo number_format($result['basePrice']) ?>gp
						</td>
						<td class="pt-1">
							<?php echo number_format($result['basePrice'] * 0.4) ?>gp
						</td>
						<td class="pt-1">
							<?php echo number_format($result['basePrice'] * 0.6) ?>gp
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

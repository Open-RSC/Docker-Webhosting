<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}

$connector = new Dbc();
$list_items = $connector->gamequery('SELECT id, name, description, requiredLevel, basePrice FROM openrsc_itemdef ORDER BY id ASC LIMIT 1290');

?>
<script>
	jQuery(document).ready(function ($) {
		$(".clickable-row").click(function () {
			window.location = $(this).data("href");
		});
	});
</script>

<style>
	.tableFixHead {
		overflow-y: auto;
		height: 100vh;
	}

	.tableFixHead th {
		position: sticky;
		top: 0;
		background-color: #212529;
	}
</style>

<div class="text-info table-dark">
	<div align="center">
		<h3 class="pt-4">Item Database</h3>
		<small class="text-primary">(Select a row to show more information)</small>
		<br/><br/>
	</div>
	<div>
		<div class="tableFixHead">
			<table class="table-responsive-lg table-striped table-hover table-dark text-primary" align="center"
				   style="width: 100vw;">
				<thead>
				<tr class="text-info">
					<th class="small text-center">ID</th>
					<th class="small text-center">Picture</th>
					<th class="small">Name and Description</th>
					<th class="small">Req Level</th>
					<th class="small">Shop Price</th>
					<th class="small">Low Alch</th>
					<th class="small">High Alch</th>
				</tr>
				</thead>
				<tbody>
				<?php
				while ($result = $connector->fetch_assoc($list_items)) { ?>
					<tr class="clickable-row" data-href="/itemdef/<?php echo $result['id'] ?>">
						<td class="pt-1" width="5%" align="center">
							<?php echo $result['id'] ?>
						</td>
						<td width="10%" align="center">
							<img src="/img/items/<?php echo $result['id'] ?>.png">
						</td>
						<td width="40%">
							<?php echo $result['name'] ?> <br/>
							<small><?php echo $result['description'] ?></small>
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

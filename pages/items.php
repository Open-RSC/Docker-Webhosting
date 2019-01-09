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

<div class="table table-striped table-hover table-dark text-info">
	<div align="center">
		<h3>Item Database</h3>
		<small class="text-primary">(Click on each for more information)</small>
		<br/><br/>
	</div>
	<div>
		<div>
			<table class="text-primary" align="center" style="width: 100vw;">
				<thead>
				<tr class="text-info">
					<td align="center">
						<small>ID</small>
					</td>
					<td align="center">
						<small>Picture</small>
					</td>
					<td>
						<small>Name and Description</small>
					</td>
					<td>
						<small>Req Level</small>
					</td>
					<td>
						<small>Shop Price</small>
					</td>
					<td>
						<small>Low Alch</small>
					</td>
					<td>
						<small>High Alch</small>
					</td>
				</tr>
				</thead>
				<tbody>
				<?php
				while ($result = $connector->fetch_assoc($list_items)) { ?>
					<tr class="clickable-row" data-href="/itemdef/<?php echo $result['id'] ?>">
						<td class="pt-4" width="5%" align="center">
							<?php echo $result['id'] ?>
						</td>
						<td class="pt-3" width="10%" align="center">
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
							<td class="pt-4" width="10%" align="center">
								<?php echo number_format($result['requiredLevel']) ?>
							</td>
						<?php } ?>
						<td class="pt-4">
							<?php echo number_format($result['basePrice']) ?>gp
						</td>
						<td class="pt-4">
							<?php echo number_format($result['basePrice'] * 0.4) ?>gp
						</td>
						<td class="pt-4">
							<?php echo number_format($result['basePrice'] * 0.6) ?>gp
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="border-left border-info border-right container table-wrapper-scroll-y mCustomScrollbar"
	 data-mcs-theme="minimal">

	@if ($itemdef->name)
	<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3"><a class="text-info text-capitalize" href="/items">{{ $itemdef->name }} }}</a>
	</h2>
	<div class="sm-skill col-4 d-inline-block text-center pt-3">
		<div class="col d-inline-block display-glow item{{ $itemdef['id'] }}"
			 style="transform: scale(1.3);"></div>
		<span class="col d-inline-block">{{ $itemdef['description'] }}</span>
	</div>

	<div class="sm-skill col-4 d-inline-block text-center pt-4">
		@if ($itemdef['requiredLevel'] == 0)
			<div class="d-block">
				<span class="sm-skill">Required Level:</span>
				<span class="sm-skill text-primary">{{ $itemdef['requiredLevel'] }}</span>
			</div>
		@endif
		@if ($itemdef['armourBonus'] == 0) }}
		<div class="d-block">
			<span class="sm-skill">Armour Bonus:</span>
			<span class="sm-skill text-primary">{{ $itemdef['armourBonus'] }}</span>
		</div>
		@endif
		@if ($itemdef['magicBonus'] == 0)
		<div class="d-block">
			<span class="sm-skill">Magic Bonus:</span>
			<span class="sm-skill text-primary">{{ $itemdef['magicBonus'] }}</span>
		</div>
		@endif
		@if ($itemdef['prayerBonus'] == 0)
		<div class="d-block">
			<span class="sm-skill">Prayer Bonus:</span>
			<span class="sm-skill text-primary">{{ $itemdef['prayerBonus'] }}</span>
		</div>
		@endif
		@if ($itemdef['weaponAimBonus'] == 0)
		<div class="d-block">
			<span class="sm-skill">Weapon Aim Bonus:</span>
			<span class="sm-skill text-primary">{{ $itemdef['weaponAimBonus'] }}</span>
		</div>
		@endif
		@if ($itemdef['weaponPowerBonus'] == 0)
		<div class="d-block">
			<span class="sm-skill">Weapon Power Bonus:</span>
			<span class="sm-skill text-primary">{{ $itemdef['weaponPowerBonus'] }}</span>
		</div>
		@endif
	</div>

	<div class="d-block">
		<span class="sm-skill">Tradable: </span><span
			class="sm-skill text-primary">
				@if ($itemdef['isUntradable']) No ?? Yes </span>
		@endif
	</div>
	<span class="sm-skill">Shop Price: <span><span
				class="sm-skill text-primary">{{ number_format($itemdef['basePrice']) }}gp</span></span>
						<div class="d-block">
								<span class="sm-skill">Low Alch Price: </span><span
								class="sm-skill text-primary">{{ number_format($itemdef['basePrice'] * 0.4) }}gp</span>
						</div>
						<div class="d-block">
                                <span class="sm-skill">High Alch Price: </span><span
								class="sm-skill text-primary">{{ number_format($itemdef['basePrice'] * 0.6) }}gp</span>
						</div>
						<div class="d-block">
                                <span class="sm-skill">Total Player Held: </span>
									<span
										class="sm-skill text-primary">
										@while($itemResult = $connector->fetchArray($itemCount))
											@if($itemResult["amt"] == NULL)
												{{ "0" }}
											@else
												{{ number_format($itemResult["amt"]) }}
											@endif
										@endwhile
									</span>
						</div>
						<div class="d-block">
									<span class="sm-skill">Last 3 Mo Active Player Held: </span>
									<span class="sm-skill text-primary">
										@while ($itemResult = $connector->fetchArray($itemCountActive))
											@if ($itemResult["amt"] == NULL)
												{{ "0" }}
											@else
												{{ number_format($itemResult["amt"]) }}
											@endif
										@endwhile
									</span>
						</div>

		<input type="text" class="pl-2 mb-3" id="inputBox" onkeyup="search()"
			   placeholder="Search for a NPC">
		<a type="button" class="btn-small btn-dark btn-outline-info" href="/items">Go Back</a>
		<table id="itemList" class="container table-striped table-hover table-dark text-primary">
			<thead class="border-bottom border-info">
			<tr class="text-info">
				<th class="small w-25 pl-1">NPC</th>
				<th class="small w-25">Picture</th>
				<th class="small w-25 pl-5">Quantity</th>
				<th class="small w-25 pl-5">Drop Chance</th>
			</tr>
			</thead>
			<tbody>
			@while ($itemdef = $connector->fetch_assoc($item_drops))
				{{ $npcID = $itemdef['npcID'] }}
				{{ $dropAmount = $itemdef['dropAmount'] }}
				{{ $npc_drops = $connector->gamequery("
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
												") }}<!---->
			@endwhile
			<tr class="clickable-row"
				data-href="../npcdef/{{ $itemdef['npcID'] }}">
				<td class="text-capitalize small pl-1">
					{{ $itemdef['npcName']}}
				</td>
				<td class="small pr-5">
					<div class="row-item display-glow npc{{ $itemdef['npcID'] }}"></div>
				</td>
				<td class="pt-1 small pl-5">
					{{ $itemdef['dropAmount'] }}
				</td>
				<td class="pt-1 small pl-5">
					@while ($dropResult = $connector->fetch_assoc($npc_drops))
						@if ($dropResult['dropPercentage'] == '0.0000%' || $dropResult['dropPercentage'] == NULL || $dropResult['dropPercentage'] == '0.0000%<!--')
							{{ '100%' }}
						@else
							{{ $dropResult['dropPercentage'] }}
						@endif
					@endwhile
				</td>
			</tr>
			{ } }}
			</tbody>
		</table>
@else
@endif

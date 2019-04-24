<section id="home">
	<div class="panel position-fixed table-wrapper-scroll-y">
		<div class="text-info table-dark spaced-body full-width">
			<div class="container border-left border-info border-right table-wrapper-scroll-y mCustomScrollbar"
				 data-mcs-theme="minimal">

				<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">
					<a class="text-info text-capitalize" href="/items">{{ $itemdef->name }}</a>
				</h2>
				<div class="sm-skill col-4 d-inline-block text-center pt-3">
					<img class="display-glow pb-2" style="transform: scale(1.3);"
						 src="/img/items/{{ $itemdef->id }}.png"/>
					<span class="col d-inline-block">{{ $itemdef->description }}</span>
				</div>

				<div class="sm-skill col-4 d-inline-block text-center pt-4">
					@if ($itemdef->requiredLevel > 0)
						<div class="d-block">
							<span class="sm-skill">Required Level:</span>
							<span class="sm-skill text-primary">{{ $itemdef->requiredLevel }}</span>
						</div>
					@endif
					@if ($itemdef->armourBonus > 0)
						<div class="d-block">
							<span class="sm-skill">Armour Bonus:</span>
							<span class="sm-skill text-primary">{{ $itemdef->armourBonus }}</span>
						</div>
					@endif
					@if ($itemdef->magicBonus > 0)
						<div class="d-block">
							<span class="sm-skill">Magic Bonus:</span>
							<span class="sm-skill text-primary">{{ $itemdef->magicBonus }}</span>
						</div>
					@endif
					@if ($itemdef->prayerBonus > 0)
						<div class="d-block">
							<span class="sm-skill">Prayer Bonus:</span>
							<span class="sm-skill text-primary">{{ $itemdef->prayerBonus }}</span>
						</div>
					@endif
					@if ($itemdef->weaponAimBonus > 0)
						<div class="d-block">
							<span class="sm-skill">Weapon Aim Bonus:</span>
							<span class="sm-skill text-primary">{{ $itemdef->weaponAimBonus }}</span>
						</div>
					@endif
					@if ($itemdef->weaponPowerBonus > 0)
						<div class="d-block">
							<span class="sm-skill">Weapon Power Bonus:</span>
							<span class="sm-skill text-primary">{{ $itemdef->weaponPowerBonus }}</span>
						</div>
					@endif
				</div>

				<div class="sm-skill d-inline-block pt-4 pb-3">
					<div class="d-block">
						<span class="sm-skill">Tradable: </span>
						<span class="sm-skill text-primary">
						@if ($itemdef->isUntradable) No
							@else Yes
							@endif
						</span>
					</div>

					<div class="d-block">
						<span class="sm-skill">Shop Price: </span>
						<span class="sm-skill text-primary">{{ number_format($itemdef->basePrice) }}gp</span>
					</div>

					<div class="d-block">
						<span class="sm-skill">Low Alch Price: </span>
						<span class="sm-skill text-primary">{{ number_format($itemdef->basePrice * 0.4) }}gp</span>
					</div>

					<div class="d-block">
						<span class="sm-skill">High Alch Price: </span>
						<span class="sm-skill text-primary">{{ number_format($itemdef->basePrice * 0.6) }}gp</span>
					</div>

					<div class="d-block">
						<span class="sm-skill">Total Player Held: </span>
						<span class="sm-skill text-primary">@@@</span>
					</div>

					<div class="d-block">
						<span class="sm-skill">Last 3 Mo Active Player Held: </span>
						<span class="sm-skill text-primary">@@@</span>
					</div>
				</div>

				<label for="inputBox"></label>
				<input type="text" class="pl-2 pt-1 mb-3" id="inputBox" onkeyup="search()"
					   placeholder="Search for a NPC"/>

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
					</tbody>
				</table>
			</div>
		</div>

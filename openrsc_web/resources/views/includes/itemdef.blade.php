<section id="home">
	<div class="text-info table-dark">
		<div class="container">

			<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">
					<a class="text-info text-capitalize" href="{{ route('items') }}">{{ $itemdef->name }}</a>
				</h2>
				<div class="col-4 d-inline-block text-center pt-3">
					<img class="display-glow pb-2" style="transform: scale(1.3);"
						 src="{{ asset('img/items') }}/{{ $itemdef->id }}.png" alt="{{ $itemdef->name }}"/>
					<span class="col d-inline-block">{{ $itemdef->description }}</span>
				</div>

				<div class="col-4 d-inline-block text-center pt-4">
					@if ($itemdef->requiredLevel > 0)
						Required Level:
						@if($itemdef->requiredSkillID == 0)
							<img class="mb-1" src="{{ asset('img/skill_icons/attack.svg') }}" alt="attack" height="16px"
								 width="16px"/>
						@elseif($itemdef->requiredSkillID == 1)
							<img class="mb-1" src="{{ asset('img/skill_icons/defense.svg') }}" alt="defense"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 2)
							<img class="mb-1" src="{{ asset('img/skill_icons/strength.svg') }}" alt="strength"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 3)
							<img class="mb-1" src="{{ asset('img/skill_icons/hits.svg') }}" alt="hits" height="16px"
								 width="16px"/>
						@elseif($itemdef->requiredSkillID == 4)
							<img class="mb-1" src="{{ asset('img/skill_icons/ranged.svg') }}" alt="ranged" height="16px"
								 width="16px"/>
						@elseif($itemdef->requiredSkillID == 5)
							<img class="mb-1" src="{{ asset('img/skill_icons/prayer.svg') }}" alt="prayer" height="16px"
								 width="16px"/>
						@elseif($itemdef->requiredSkillID == 6)
							<img class="mb-1" src="{{ asset('img/skill_icons/magic.svg') }}" alt="magic" height="16px"
								 width="16px"/>
						@elseif($itemdef->requiredSkillID == 7)
							<img class="mb-1" src="{{ asset('img/skill_icons/cooking.svg') }}" alt="cooking"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 8)
							<img class="mb-1" src="{{ asset('img/skill_icons/woodcut.svg') }}" alt="woodcut"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 9)
							<img class="mb-1" src="{{ asset('img/skill_icons/fletching.svg') }}" alt="fletching"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 10)
							<img class="mb-1" src="{{ asset('img/skill_icons/fishing.svg') }}" alt="fishing"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 11)
							<img class="mb-1" src="{{ asset('img/skill_icons/firemaking.svg') }}" alt="firemaking"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 12)
							<img class="mb-1" src="{{ asset('img/skill_icons/crafting.svg') }}" alt="crafting"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 13)
							<img class="mb-1" src="{{ asset('img/skill_icons/smithing.svg') }}" alt="smithing"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 14)
							<img class="mb-1" src="{{ asset('img/skill_icons/mining.svg') }}" alt="mining" height="16px"
								 width="16px"/>
						@elseif($itemdef->requiredSkillID == 15)
							<img class="mb-1" src="{{ asset('img/skill_icons/herblaw.svg') }}" alt="herblaw"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 16)
							<img class="mb-1" src="{{ asset('img/skill_icons/agility.svg') }}" alt="agility"
								 height="16px" width="16px"/>
						@elseif($itemdef->requiredSkillID == 17)
							<img class="mb-1" src="{{ asset('img/skill_icons/thieving.svg') }}" alt="thieving"
								 height="16px" width="16px"/>
						@endif
						{{ number_format($itemdef->requiredLevel) }}
					@endif
					@if ($itemdef->armourBonus > 0)
						<div class="d-block">
							<span class="">Armour Bonus:</span>
							<span class=" text-primary">{{ $itemdef->armourBonus }}</span>
						</div>
					@endif
					@if ($itemdef->magicBonus > 0)
						<div class="d-block">
							<span class="">Magic Bonus:</span>
							<span class=" text-primary">{{ $itemdef->magicBonus }}</span>
						</div>
					@endif
					@if ($itemdef->prayerBonus > 0)
						<div class="d-block">
							<span class="">Prayer Bonus:</span>
							<span class=" text-primary">{{ $itemdef->prayerBonus }}</span>
						</div>
					@endif
					@if ($itemdef->weaponAimBonus > 0)
						<div class="d-block">
							<span class="">Weapon Aim Bonus:</span>
							<span class=" text-primary">{{ $itemdef->weaponAimBonus }}</span>
						</div>
					@endif
					@if ($itemdef->weaponPowerBonus > 0)
						<div class="d-block">
							<span class="">Weapon Power Bonus:</span>
							<span class=" text-primary">{{ $itemdef->weaponPowerBonus }}</span>
						</div>
					@endif
				</div>

				<div class=" d-inline-block pt-4 pb-3">
					<div class="d-block">
						<span class="">Tradable: </span>
						<span class=" text-primary">
						@if ($itemdef->isUntradable) No
							@else Yes
							@endif
						</span>
					</div>

					<div class="d-block">
						<span class="">Shop Price: </span>
						<span class=" text-primary">{{ number_format($itemdef->basePrice) }}gp</span>
					</div>

					<div class="d-block">
						<span class="">Low Alch Price: </span>
						<span class=" text-primary">{{ number_format($itemdef->basePrice * 0.4) }}gp</span>
					</div>

					<div class="d-block">
						<span class="">High Alch Price: </span>
						<span class=" text-primary">{{ number_format($itemdef->basePrice * 0.6) }}gp</span>
					</div>

					<div class="d-block">
						<span class="">Total Player Held: </span>
						<span class=" text-primary">{{ number_format($totalPlayerHeld) }}</span>
					</div>

					<div class="d-block">
						<span class="">Last 3 Mo Active Player Held: </span>
						<span class=" text-primary">{{ number_format($last3moPlayerHeld) }}</span>
					</div>
				</div>

				<label for="inputBox"></label>
				<input type="text" class="pl-2 pt-1 mb-3" id="inputBox" onkeyup="search()"
					   placeholder="Search for a NPC"/>

				<a type="button" class="btn-small btn-dark btn-outline-info" href=" {{ route('items') }}">Go Back</a>

				{{ $item_drops->links('pagination::bootstrap-4') }}
				<table id="itemList" class="container table-striped table-hover table-dark text-primary">
					<thead class="border-bottom border-info">
					<tr class="text-info">
						<th class="w-25 pl-1">Name (ID)</th>
						<th class="text-center w-25">Picture</th>
						<th class="text-center w-25 pl-5">Quantity</th>
					</tr>
					</thead>
					<tbody>
					@foreach($item_drops as $item_drop)
						<tr class="clickable-row" data-href="/npcdef/{{ $item_drop->npcID }}">
							<td class="text-capitalize w-25">
								<a href="/npcdef/{{ $item_drop->npcID }}"
								   class="text-capitalize pl-1">{{ $item_drop->npcName }} ({{ $item_drop->npcID }})</a>
							</td>
							<td class="w-10 text-center pt-1 pb-1">
								<div class="display-glow">
									<img src="{{ asset('img/npc') }}/{{ $item_drop->npcID }}.png" alt="{{ $item_drop->npcName }}"/>
								</div>
							</td>
							<td class="text-center w-25 pl-5">
								{{ $item_drop->dropAmount }}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>

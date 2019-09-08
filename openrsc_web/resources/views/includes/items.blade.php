<section id="home">
	<div class="text-info">
		<div class="container table-black">

			<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Item Database</h2>
			<div class="text-center">
				<form method="POST" action="{{ route('search') }}">
					@csrf
					<label for="inputBox"></label>
					<input type="text" class="pl-2 pt-1 mb-3 w-25 text-center" id="inputBox"
						   placeholder="Search for an Item"/>
				</form>
			</div>

			<table id="itemList" class="container table-striped table-hover text-primary">
				<thead class="border-bottom border-info">
				<tr class="text-info">
					<th class="pl-2">Item Name</th>
					<th class="text-center">Picture</th>
					<th class="text-center">Required Level</th>
					<th class="text-center">Shop Value</th>
					<th class="text-center">Alch Value (Low / High)</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($items as $itemdef)
					<tr class="clickable-row" data-href="itemdef/{{ $itemdef->id }}">
						<td class="w-25">
							<a href="itemdef/{{ $itemdef->id }}"
							   class="text-capitalize pl-1">{{ $itemdef->name }} ({{ $itemdef->id }})</a>
							<span class="text-white-50 pl-1 d-block">{{ $itemdef->description }}</span>
						</td>
						<td class="w-10 text-center pt-1 pb-1">
							<div class="display-glow">
								<img src="{{ asset('img/items') }}/{{ $itemdef->id }}.png" alt="{{ $itemdef->name }}"/>
							</div>
						</td>
						@if ($itemdef->requiredLevel == 0)
							<td>
							</td>
						@else
							<td class="w-10 text-center pt-1 pb-1">
								@if($itemdef->requiredSkillID == 0)
									<img class="mb-1" src="{{ asset('img/skill_icons/attack.svg') }}" alt="attack"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 1)
									<img class="mb-1" src="{{ asset('img/skill_icons/defense.svg') }}" alt="defense"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 2)
									<img class="mb-1" src="{{ asset('img/skill_icons/strength.svg') }}"
										 alt="strength" height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 3)
									<img class="mb-1" src="{{ asset('img/skill_icons/hits.svg') }}" alt="hits"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 4)
									<img class="mb-1" src="{{ asset('img/skill_icons/ranged.svg') }}" alt="ranged"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 5)
									<img class="mb-1" src="{{ asset('img/skill_icons/prayer.svg') }}" alt="prayer"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 6)
									<img class="mb-1" src="{{ asset('img/skill_icons/magic.svg') }}" alt="magic"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 7)
									<img class="mb-1" src="{{ asset('img/skill_icons/cooking.svg') }}" alt="cooking"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 8)
									<img class="mb-1" src="{{ asset('img/skill_icons/woodcut.svg') }}" alt="woodcut"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 9)
									<img class="mb-1" src="{{ asset('img/skill_icons/fletching.svg') }}"
										 alt="fletching" height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 10)
									<img class="mb-1" src="{{ asset('img/skill_icons/fishing.svg') }}" alt="fishing"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 11)
									<img class="mb-1" src="{{ asset('img/skill_icons/firemaking.svg') }}"
										 alt="firemaking" height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 12)
									<img class="mb-1" src="{{ asset('img/skill_icons/crafting.svg') }}"
										 alt="crafting" height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 13)
									<img class="mb-1" src="{{ asset('img/skill_icons/smithing.svg') }}"
										 alt="smithing" height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 14)
									<img class="mb-1" src="{{ asset('img/skill_icons/mining.svg') }}" alt="mining"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 15)
									<img class="mb-1" src="{{ asset('img/skill_icons/herblaw.svg') }}" alt="herblaw"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 16)
									<img class="mb-1" src="{{ asset('img/skill_icons/agility.svg') }}" alt="agility"
										 height="16px" width="16px"/>
								@elseif($itemdef->requiredSkillID == 17)
									<img class="mb-1" src="{{ asset('img/skill_icons/thieving.svg') }}"
										 alt="thieving" height="16px" width="16px"/>
								@endif
								{{ number_format($itemdef->requiredLevel) }}
							</td>
						@endif
						<td class="text-center pt-1">
							{{number_format($itemdef->basePrice) }}gp
						</td>
						<td class="text-center pt-1">
							{{ number_format($itemdef->basePrice * 0.4) }}gp
							<span class="text-secondary">/</span>
							{{ number_format($itemdef->basePrice * 0.6) }}gp
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>

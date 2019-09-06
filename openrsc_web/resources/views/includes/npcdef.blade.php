<section id="home">
	<div class="text-info table-dark">
		<div class="container">

			<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">
				<a class="text-info text-capitalize" href="{{ route('npcs') }}">{{ $npcdef->name }}</a>
			</h2>

			<div class="row">
				<div class="col-md d-inline-block text-center">
					<img class="display-glow pb-2" style="transform: scale(1.3);"
						 src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"/>
					<span class="col d-inline-block">{{ $npcdef->description }}</span>
				</div>

				<div class="col-md d-inline-block text-center">
					@if ($npcdef->attack > 0)
						<div class="d-block">
							<span class="">Attack:</span>
							<span class=" text-primary">{{ $npcdef->attack }}</span>
						</div>
					@endif
					@if ($npcdef->strength > 0)
						<div class="d-block">
							<span class="">Strength:</span>
							<span class=" text-primary">{{ $npcdef->strength }}</span>
						</div>
					@endif
					@if ($npcdef->hits > 0)
						<div class="d-block">
							<span class="">Hits:</span>
							<span class=" text-primary">{{ $npcdef->hits }}</span>
						</div>
					@endif
					@if ($npcdef->defense > 0)
						<div class="d-block">
							<span class="">Defense:</span>
							<span class=" text-primary">{{ $npcdef->defense }}</span>
						</div>
					@endif
					@if ($npcdef->ranged > 0)
						<div class="d-block">
							<span class="">Ranged:</span>
							<span class=" text-primary">{{ $npcdef->ranged }}</span>
						</div>
					@endif
					@if ($npcdef->combatlvl > 0)
						<div class="d-block">
							<span class="">Combat:</span>
							<span class=" text-primary">{{ $npcdef->combatlvl }}</span>
						</div>
					@endif
				</div>

				<div class="col-md d-inline-block text-center">
					@if ($npcdef->attackable = 1)
						<div class="d-block">
							<span class="">Attackable</span>
						</div>
					@endif
					@if ($npcdef->attackable = 0)
						<div class="d-block">
							<span class="">Not Attackable</span>
						</div>
					@endif
					@if ($npcdef->aggressive = 1)
						<div class="d-block">
							<span class="">Aggressive</span>
						</div>
					@endif
					@if ($npcdef->aggressive = 0)
						<div class="d-block">
							<span class="">Passive</span>
						</div>
					@endif
					@if ($npcdef->respawnTime > 0)
						<div class="d-block">
							<span class="">Respawn Time:</span>
							<span class=" text-primary">{{ $npcdef->respawnTime }} sec</span>
						</div>
					@endif
				</div>
			</div>

			<div class="d-block pt-4"></div>

			<label for="inputBox"></label>
			<input type="text" class="pl-2 pt-1 mb-3" id="inputBox" onkeyup="search()"
				   placeholder="Search for an item"/>

			<a href="{{ route('npcs') }}">Go Back</a>

			{{ $npc_drops->links('pagination::bootstrap-4') }}
			<table id="itemList" class="container table-striped table-hover table-dark text-primary">
				<thead class="border-bottom border-info">
				<tr class="text-info">
					<th class="w-25 pl-1">Name (ID)</th>
					<th class="text-center w-25">Picture</th>
					<th class="text-center w-25 pl-5">Quantity</th>
				</tr>
				</thead>
				<tbody>
				@foreach($npc_drops as $npc_drop)
					<tr class="clickable-row" data-href="/itemdef/{{ $npc_drop->itemID }}">
						<td class="text-capitalize w-25">
							<a href="/itemdef/{{ $npc_drop->itemID }}"
							   class="text-capitalize pl-1">{{ $npc_drop->itemName }} ({{ $npc_drop->itemID }})</a>
						</td>
						<td class="w-10 text-center pt-1 pb-1">
							<div class="display-glow">
								<img src="{{ asset('img/items') }}/{{ $npc_drop->itemID }}.png"
									 alt="{{ $npc_drop->itemID }}"/>
							</div>
						</td>
						<td class="text-center w-25 pl-5">
							{{ $npc_drop->dropAmount }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

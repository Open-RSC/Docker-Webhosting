@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-3 text-capitalize display-3">
				<a href="{{ route('npcs') }}">{{ $npcdef->name }}</a>
			</h2>

			<div class="row align-items-center pb-3">
				<div class="col-md d-inline-block text-center">
					<img class="display-glow pb-3" style="transform: scale(1.3);"
						 src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"/>
					<span class="col d-inline-block">{{ $npcdef->description }}</span>
				</div>

				<div class="col-md d-inline-block text-center">
					@if ($npcdef->attack > 0)
						<div class="d-block">
							<img class="mb-1" src="{{ asset('img/skill_icons/attack.svg') }}" alt="attack" height="16px"
								 width="16px"/>
							<span class=" text-primary">{{ $npcdef->attack }}</span>
						</div>
					@endif
					@if ($npcdef->defense > 0)
						<div class="d-block">
							<img class="mb-1" src="{{ asset('img/skill_icons/defense.svg') }}" alt="defense"
								 height="16px" width="16px"/>
							<span class=" text-primary">{{ $npcdef->defense }}</span>
						</div>
					@endif
					@if ($npcdef->strength > 0)
						<div class="d-block">
							<img class="mb-1" src="{{ asset('img/skill_icons/strength.svg') }}" alt="strength"
								 height="16px" width="16px"/>
							<span class=" text-primary">{{ $npcdef->strength }}</span>
						</div>
					@endif
					@if ($npcdef->hits > 0)
						<div class="d-block">
							<img class="mb-1" src="{{ asset('img/skill_icons/hits.svg') }}" alt="hits" height="16px"
								 width="16px"/>
							<span class=" text-primary">{{ $npcdef->hits }}</span>
						</div>
					@endif
					@if ($npcdef->ranged > 0)
						<div class="d-block">
							<img class="mb-1" src="{{ asset('img/skill_icons/ranged.svg') }}" alt="ranged" height="16px"
								 width="16px"/>
							<span class=" text-primary">{{ $npcdef->ranged }}</span>
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

			<div class="stats pl-5 pr-5">
				<table id="List" class="table-both-hover table-transparent"
					   style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
					@if ($npc_drops->count() > 0)
						<tr>
							@foreach($npc_drops as $key=>$npc_drop)
								<td class="text-center clickable-row" data-href="/itemdef/{{ $npc_drop->itemID }}"
									style="border: 1px solid black;">
									<div class="pt-1"
										 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
										{{ $npc_drop->dropAmount }}
										<img src="{{ asset('img/items') }}/{{ $npc_drop->itemID }}.png"
											 alt="{{ $npc_drop->itemID }}"/>
									</div>
									<!--<span class="text-capitalize d-block">
									{ $npc_drop->itemName }} ({ $npc_drop->itemID }})
								</span>-->
								</td>
								@if ($key % 11 == 10)
						</tr>
					@endif
					@endforeach
					@else
						No items found.
					@endif
				</table>
			</div>
		</div>
	</div>
@endsection

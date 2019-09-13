@extends('template')

@section('content')
	<div class="text-info">
		<div class="container table-black">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">Highscores</h2>
			<div class="text-center">
				<label for="inputBox"></label>
				<input type="text" class="pl-2 pt-1 mb-4 w-25 text-center" id="inputBox" onkeyup="search()"
					   placeholder="Search for a player">
			</div>

			{{ $highscores->links('pagination::bootstrap-4') }}
			<table id="itemList" class="container table-striped table-hover table-black text-primary">
				<thead class="border-bottom border-info">
				<tr class="text-info">
					<th class="text-center">Username</th>
					<th class="text-center">Rank</th>
					<th class="text-center">Level</th>
					<th class="text-center">Experience</th>
					<th class="text-center">
						<img class="mb-1" src="{{ asset('img/skill_icons/attack.svg') }}" alt="attack"
							 height="16px" width="16px"/>
					</th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/defense.svg') }}"
												 alt="defense"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/strength.svg') }}"
												 alt="strength" height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/hits.svg') }}" alt="hits"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/ranged.svg') }}"
												 alt="ranged"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/prayer.svg') }}"
												 alt="prayer"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/magic.svg') }}" alt="magic"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/cooking.svg') }}"
												 alt="cooking"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/woodcut.svg') }}"
												 alt="woodcut"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/fletching.svg') }}"
												 alt="fletching" height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/fishing.svg') }}"
												 alt="fishing"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/firemaking.svg') }}"
												 alt="firemaking" height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/crafting.svg') }}"
												 alt="crafting" height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/smithing.svg') }}"
												 alt="smithing" height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/mining.svg') }}"
												 alt="mining"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/herblaw.svg') }}"
												 alt="herblaw"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/agility.svg') }}"
												 alt="agility"
												 height="16px" width="16px"/></th>
					<th class="text-center"><img class="mb-1" src="{{ asset('img/skill_icons/thieving.svg') }}"
												 alt="thieving" height="16px" width="16px"/></th>
				</tr>
				</thead>
				<tbody>
				@foreach ($highscores as $skill)
					<tr class="clickable-row" data-href="highscoreskill/{{ $skill->id }}">
						<td class="w-10 text-center pt-1 pb-1">
							<span>{{ $skill->username }}</span>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{ $highscores->links('pagination::bootstrap-4') }}
		</div>
	</div>
@endsection

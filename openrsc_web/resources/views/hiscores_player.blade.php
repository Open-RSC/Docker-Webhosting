@extends('templateborder')
@section('content')

	<header class="rsc-box rsc-header">
		<span class="d-block">RuneScape Hiscores</span>
		<a class="rsc-link" href="/">Main Menu</a> - <a class="rsc-link" href="/hiscores">All Hiscores</a>
	</header>

	<div class="justify-content-center row rsc-row pt-1">
		@foreach ($players as $player)
			<div style="width: 385px">
				<div class="rsc-box rsc-hiscores-ranks">
					<span class="text-center d-block pb-2">
						RuneScape Hiscores for
						<span class="text-warning">
							{{ ucfirst($player->username) }}
						</span>
					</span>
					<table>
						<tr>
							<th class="rsc-col-name">Skill</th>
							<th class="rsc-col-xp">Rank</th>
							<th class="rsc-col-level">Level</th>
							<th class="rsc-col-xp">XP</th>
						</tr>

						@foreach ($skill_array as $skill)
							<tr style="line-height: 1.2rem">
								<td class="rsc-col-name text-center">
									@if ($skill != "overall")
										<img src="{{ asset('images/skill_icons').'/'.$skill }}.svg"
											 alt="{{ $skill }}" height="20px"/>
									@endif
								</td>
								<td class="rsc-col-name text-left">
									<a class="rsc-link"
									   href="/hiscores/{{ $skill }}">
										{{ ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)) }}
									</a>
								</td>
								<td class="rsc-col-xp">
									<span>
										@if ($skill == 'attack')
											@foreach ($attack as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'strength')
											@foreach ($strength as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'defense')
											@foreach ($defense as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'hits')
											@foreach ($hits as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'ranged')
											@foreach ($ranged as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'prayer')
											@foreach ($prayer as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'magic')
											@foreach ($magic as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'cooking')
											@foreach ($cooking as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'woodcut')
											@foreach ($woodcut as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'fletching')
											@foreach ($fletching as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'fishing')
											@foreach ($fishing as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'firemaking')
											@foreach ($firemaking as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'crafting')
											@foreach ($crafting as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'smithing')
											@foreach ($smithing as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'mining')
											@foreach ($mining as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'herblaw')
											@foreach ($herblaw as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'agility')
											@foreach ($agility as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'thieving')
											@foreach ($thieving as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'runecraft')
											@foreach ($runecraft as $rank)
												{{ $rank->rank }}
											@endforeach
										@elseif ($skill == 'harvesting')
											@foreach ($harvesting as $rank)
												{{ $rank->rank }}
											@endforeach
										@endif
									</span>
								</td>
								<td class="rsc-col-level">
									<span>
										@if ($skill == 'attack')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_attack)) }}
										@elseif ($skill == 'strength')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_strength)) }}
										@elseif ($skill == 'defense')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_defense)) }}
										@elseif ($skill == 'hits')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_hits)) }}
										@elseif ($skill == 'ranged')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_ranged)) }}
										@elseif ($skill == 'prayer')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_prayer)) }}
										@elseif ($skill == 'magic')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_magic)) }}
										@elseif ($skill == 'cooking')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_cooking)) }}
										@elseif ($skill == 'woodcut')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_woodcut)) }}
										@elseif ($skill == 'fletching')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_fletching)) }}
										@elseif ($skill == 'fishing')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_fishing)) }}
										@elseif ($skill == 'firemaking')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_firemaking)) }}
										@elseif ($skill == 'crafting')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_crafting)) }}
										@elseif ($skill == 'smithing')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_smithing)) }}
										@elseif ($skill == 'mining')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_mining)) }}
										@elseif ($skill == 'herblaw')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_herblaw)) }}
										@elseif ($skill == 'agility')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_agility)) }}
										@elseif ($skill == 'thieving')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_thieving)) }}
										@elseif ($skill == 'runecraft')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_runecraft)) }}
										@elseif ($skill == 'harvesting')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->exp_harvesting)) }}
										@else
											N/A
										@endif
									</span>
								</td>
								<td class="rsc-col-xp">
									<span>
										{{ number_format($player->{'exp_'.$skill}/4.0) }}
									</span>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		@endforeach
	</div>

	<div class="justify-content-center row rsc-row pt-2">
		<div>
			<div class="rsc-box rsc-hiscores-skills pl-0 pr-0 pt-2"
				 style="line-height: 1.2rem; width: 135px; height: 105px">
				<a class="rsc-link" href="#">
					Login
				</a>
				to view your personal hiscores and see how you compare to your friends.
			</div>
		</div>

		<div class="pl-1">
			<table>
				<tr>
					<td class="rsc-stone-box">
						<form method="get">
							{{ csrf_field() }}
							<label for="rsc-search-rank">Search by rank</label>
							<input id="rsc-search-rank" name="search_rank" type="number" min="1">
							<input type="submit" value="Search">
						</form>
					</td>
					<td class="rsc-stone-box">
						<form method="get">
							{{ csrf_field() }}
							<label for="rsc-search-name">Search by name</label>
							<input id="rsc-search-name" name="search_name" type="text" maxlength="12">
							<input type="submit" value="Search">
						</form>
					</td>
				</tr>
			</table>
		</div>
	</div>

@endsection

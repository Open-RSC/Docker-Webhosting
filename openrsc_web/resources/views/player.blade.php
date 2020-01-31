@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">
				@if ($players->first()->group_id != '10')
					<img class="mb-1 mr-3" src="{{ asset('img') }}/{{ $players->first()->group_id }}.svg" height="24px"
						 width="auto" alt="group {{ $players->first()->group_id }}"/>
				@endif
				<span class="ml-n3">{{ ucfirst($players->first()->username) }}</span>
			</h2>

			@foreach ($players as $player)

				<div class="sm-stats">
					<div class="row justify-content-center">

						<!-- Avatar -->
						<div class="mr-4 pt-3 d-inline-block float-left">
							<img src="{{ asset('img/avatars').'/'.$players->first()->id }}.png"
								 style="height: 125px;" alt="{{ $players->first()->username }}">
						</div>

						<!-- Skill levels -->
						<div id="sm-skill" class="pt-4 col-7">
							@foreach ($skill_array as $skill)
								<a class="text-secondary d-block"
								   href="/highscores/{{ $skill }}">
									<img src="{{ asset('img/skill_icons').'/'.$skill }}.svg"
										 alt="{{ $skill }}" height="20px"/>
									{{ ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)) }}
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
								</a>
							@endforeach
						</div>

						<!-- Status and timestamps -->
						<div class="ml-4 pb-3 float-right">
							<span class="sm-stats pt-3">
								Status:
								@if ($players->first()->online == 1)
									<span style="color: lime">
										<strong>Online</strong>
									</span>
								@else
									<span style="color: red">
										<strong>Offline</strong>
									</span>
								@endif
							</span>
							<span class="sm-stats">Combat Level: {{ $players->first()->combat }}</span>
							<span class="sm-stats">Skill Total: {{ $players->first()->skill_total }}</span>
							<span class="sm-stats">Gang:
                            	@if ($player_gang->count())
									@foreach ($player_gang as $gang)
										@if ($gang->value == 0)
											{{ $pick = 'Black Arm' }}
										@else
											{{ $pick = 'Phoenix' }}
										@endif
									@endforeach
								@else
									None
								@endif
							</span>
							<span class="sm-stats text-info">
								Created: {{ Carbon\Carbon::parse($players->first()->creation_date)->diffForHumans() }}
							</span>
							<span class="sm-stats text-info">
								Last Online:
								@if ($players->first()->login_date)
									{{ Carbon\Carbon::parse($players->first()->login_date)->diffForHumans() }}
								@else
									Never
								@endif
							</span>
							<span class="sm-stats">
								Time Played:
								@if ($totalTime)
									{{ $totalTime }}
								@else
									None
								@endif
							</span>
						</div>
					</div>
				</div>

				<!-- Top NPC kills - large view version -->
				<div class="d-none d-md-block">
					<div class="h4 text-info">
						Top NPC Kills
					</div>
					<table id="List" class="container table-striped table-both-hover text-primary table-transparent">
						<tr>
							@foreach ($npc_kills as $key=>$kills)
								<td class="text-center clickable-row" data-href="/npcdef/{{ $kills->npcID }}"
									style="border: 1px solid #0F0F0F;">
									<div class="display-glow pt-1">
										<img src="{{ asset('img/npc') }}/{{ $kills->npcID }}.png"
											 alt="{{ $kills->name }}"
											 style="max-height: 52px; max-width: 65px;"/>
									</div>
									<span class="text-capitalize d-block">
										{{ $kills->name }}
									</span>
									<span class="d-block">
										{{ number_format($kills->killCount) }}
									</span>
								</td>
								@if ($key % 6 == 5)
						</tr>
						@endif
						@endforeach
					</table>
				</div>

				<!-- Top NPC kills - mobile view version -->
				<div class="pl-5 pr-5 d-md-none d-lg-none">
					<div class="h4 text-info">
						Top NPC Kills
					</div>
					<table id="List" class="container table-striped table-both-hover text-primary table-transparent">
						<tr>
							@foreach ($npc_kills as $key=>$kills)
								<td class="text-center clickable-row" data-href="/npcdef/{{ $kills->npcID }}"
									style="border: 1px solid #0F0F0F;">
									<div class="display-glow pt-1">
										<img src="{{ asset('img/npc') }}/{{ $kills->npcID }}.png"
											 alt="{{ $kills->name }}"
											 style="max-height: 52px; max-width: 65px;"/>
									</div>
									<span class="text-capitalize d-block">
										{{ $kills->name }}
									</span>
									<span class="d-block">
										{{ number_format($kills->killCount) }}
									</span>
								</td>
								@if ($key % 4 == 3)
						</tr>
						@endif
						@endforeach
					</table>
				</div>

				<!-- Accomplishments -->
				<div class="pt-4 pl-5 pr-5">
					<div class="h4 text-info">
						Recent Accomplishments
					</div>
					<div class="pl-3 row">
						<table id="npcList" class="container table-striped table-hover text-primary table-transparent">
							<thead class="border-bottom border-info">
							<tr class="text-info">
								<th class="float-right mr-3 w-25">Time</th>
								<th class="">Achievement</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($player_feed as $achievements)
								<tr class="clickable-row" data-href="player/{{ $achievements->id }}">
									<td class="float-right mr-3">
										{{ Carbon\Carbon::parse($achievements->time)->diffForHumans() }}
									</td>
									<td>
										<a href="player/{{ $achievements->id }}">
											@if ($achievements->group_id < '10')
												<img class="mb-1"
													 src="{{ asset('img') }}/{{ $achievements->group_id }}.svg"
													 height="14px"
													 width="auto" alt="group {{ $achievements->group_id }}"/>
											@endif
											<span class="text-capitalize">
													{{ $achievements->username }}
												</span>
										</a>
										{!! $achievements->message !!}
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					@endforeach
				</div>
		</div>
@endsection

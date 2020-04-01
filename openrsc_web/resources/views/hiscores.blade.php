@extends('templateborder')
@section('content')

	<header class="rsc-box rsc-header">
		<span class="d-block">RuneScape Hiscores</span>
		<a class="rsc-link" href="/">Main Menu</a> - <a class="rsc-link" href="/hiscores">All Hiscores</a>
	</header>

	<div class="justify-content-center row rsc-row pt-1">
		<div>
			<h2>Select hiscore table</h2>
			<div class="rsc-box rsc-hiscores-skills pl-4 pr-3 pt-2 pb-1" style="line-height: 1.2rem">
				<table>
					@foreach ($skill_array as $skill)
						<tr>
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
						</tr>
					@endforeach
				</table>
			</div>
		</div>

		<div class="col-sm-6">
			<h2>
				@if($subpage ?? '')
					{{ ucfirst($subpage ?? '') }}
				@else
					Overall
				@endif
				Hiscores
			</h2>
			<div class="rsc-box rsc-hiscores-ranks">
				<table>
					<tr>
						<th class="rsc-col-rank">Rank</th>
						<th class="rsc-col-name">Name</th>
						<th class="rsc-col-level">Level</th>
						<th class="rsc-col-xp">XP</th>
					</tr>
					@foreach ($highscores as $key=>$player)
						<tr style="line-height: 1.2rem">
							<td class="rsc-col-rank">
									<span>
										{{ ($highscores->currentpage()-1) * $highscores->perpage() + $key + 1 }}
									</span>
							</td>
							<td class="rsc-col-name">
								<a class="rsc-link" href="/hiscores/player/{{ ucfirst($player->username) }}">
										<span>
											{{ ucfirst($player->username) }}
										</span>
								</a>
							</td>
							<td class="rsc-col-level">
									<span>
										@if ($subpage ?? '' ?? '')
											{{ number_format((new App\Http\Controllers\HighscoresController)->experienceToLevel($player->${'exp_'.$subpage ?? ''})) }}
										@else
											{{ number_format($player->skill_total) }}
										@endif
									</span>
							</td>
							<td class="rsc-col-xp">
									<span>
										@if ($subpage ?? '' ?? '')
											{{ number_format($player->${'exp_'.$subpage ?? ''}/4.0) }}
										@else
											{{ number_format((new App\Http\Controllers\HighscoresController)->totalXP($player)/4.0) }}
										@endif
									</span>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
			<div class="pt-2">
				{{ $highscores->links('pagination::bootstrap-4') }}
			</div>
		</div>
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

		<div class="col-sm-6" style="width: 322px">
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

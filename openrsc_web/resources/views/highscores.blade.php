@extends('templateborder')
@section('content')

	<header class="rsc-box rsc-header">
		<span class="d-block">RuneScape Hiscores</span>
		<a class="rsc-link" href="/index.html">Main menu - All Hiscores</a>
	</header>

	<div class="justify-content-center row rsc-row">
		<div style="width: 145px">
			<h2>Select hiscore table</h2>
			<div class="rsc-box rsc-hiscores-skills p-0" style="line-height: 1.2rem">
				<table>
					@foreach ($skill_array as $skill)
						<tr>
							<th class="col-sm1 text-right">
								@if ($skill != "overall")
									<img src="{{ asset('images/skill_icons').'/'.$skill }}.svg"
										 alt="{{ $skill }}" height="20px"/>
								@endif
							</th>
							<th class="col text-left">
								<a class="rsc-link"
								   href="/hiscores/{{ $skill }}">
									<span class="">
									{{ ucwords(preg_replace("/[^A-Za-z0-9 ]/", " ", $skill)) }}
									</span>
								</a>
							</th>
						</tr>
					@endforeach
				</table>
			</div>
		</div>

		<div class="col-sm-6">
			<h2>Overall Hiscores</h2>
			<div class="rsc-box rsc-hiscores-ranks p-0">
				<table>
					<tr>
						<th class="rsc-col-rank">Rank</th>
						<th class="rsc-col-name">Name</th>
						<th class="rsc-col-level">Level</th>
						<th class="rsc-col-xp">XP</th>
					</tr>
					@if (Config::get('app.authentic') == true)
						@foreach ($highscores_authentic as $key=>$player)
							<tr style="line-height: 1.2rem">
								<td class="rsc-col-rank">
									<span>
										{{ ($highscores_authentic->currentpage()-1) * $highscores_authentic->perpage() + $key + 1 }}
									</span>
								</td>
								<td class="rsc-col-name">
									<a class="rsc-link" href="/player/{{ ucfirst($player->username) }}">
										<span>
											{{ ucfirst($player->username) }}
										</span>
									</a>
								</td>
								<td class="rsc-col-level">
									<span>
										{{ number_format($player->skill_total) }}
									</span>
								</td>
								<td class="rsc-col-xp">
									<span>
										{{ number_format((new App\Http\Controllers\HighscoresController)->totalXP($player)/4.0) }}
									</span>
								</td>
							</tr>
						@endforeach
					@else
						@foreach ($highscores_custom as $key=>$player)
							<tr>
								<td class="rsc-col-rank">
									<span>
										{{ ($highscores_custom->currentpage()-1) * $highscores_custom->perpage() + $key + 1 }}
									</span>
								</td>
								<td class="rsc-col-name">
									<span>
										{{ ucfirst($player->username) }}
									</span>
								</td>
								<td class="rsc-col-level">
									<span>
										{{ number_format($player->skill_total) }}
									</span>
								</td>
								<td class="rsc-col-xp">
									<span>
										{{ number_format((new App\Http\Controllers\HighscoresController)->totalXP($player)/4.0) }}
									</span>
								</td>
							</tr>
						@endforeach
					@endif
				</table>
				<!--@/if (Config::get('app.authentic') == true)
					{/{ $highscores_authentic->links('pagination::bootstrap-4') }}
				@/else
					{/{ $highscores_custom->links('pagination::bootstrap-4') }}
				@/endif-->
			</div>
		</div>
	</div>

	<div class="justify-content-center row pl-4 pr-4">
		<div class="row float-left">
			<div class="flex-column">
				<div class="rsc-box">
				<span class="d-block">
					Login to view your
				</span>
					<span class="d-block">
					personal hiscores and
				</span>
					<span class="d-block">
					see how you compare
				</span>
					<span class="d-block">
					to your friends.
				</span>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="row float-right">
				<div class="flex-column">
					<div class="rsc-stone-box">
						<form method="get">
							<input type="hidden" name="category" value="overall">
							<label for="rsc-search-rank">Search by rank</label>
							<input id="rsc-search-rank" name="rank" type="number" min="1">
							<input type="submit" value="Search">
						</form>
					</div>
				</div>
				<div class="flex-columm">
					<div class="rsc-stone-box">
						<form method="get">
							<input type="hidden" name="category" value="overall">
							<label for="rsc-search-name">Search by name</label>
							<input id="rsc-search-name" name="name" type="text" maxlength="12">
							<input type="submit" value="Search">
						</form>
					</div>
				</div>
			</div>
		</div>

@endsection

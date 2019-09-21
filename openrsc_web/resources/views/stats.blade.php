@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">
				Statistics
			</h2>

			<h4 class="pt-4 h4 text-warning">Accounts</h4>
			<span class="d-block">
				<a class="text-info font-weight-bold" href="{{ route('online') }}">{{ $online }}</a> players currently logged in.
			</span>
			<span class="d-block">
				<a class="text-info font-weight-bold" href="{{ route('createdtoday') }}">{{ $createdToday }}</a> players have been registered today.
			</span>
			<span class="d-block">
				<a class="text-info font-weight-bold" href="{{ route('logins48') }}">{{ $logins48 }}</a> players logged in the last 48 hours.
			</span>
			<span class="d-block">
				<span class="text-info font-weight-bold">{{ $uniquePlayers }}</span> people have created
				<span class="text-info font-weight-bold">{{ $totalPlayers }}</span> players.
			</span>
			<span class="d-block">
				<span class="text-info font-weight-bold">{{ $totalTime }}</span> total time played.
			</span>

			<h4 class="pt-4 h4 text-warning">Combat</h4>
			<span class="d-block">The highest combat level is <span class="text-info font-weight-bold">{{ $topCombat }}.</span></span>
			<span class="text-info font-weight-bold d-block">{{ $combat30 }}</span> players over combat level 30.
			<span class="text-info font-weight-bold d-block">{{ $combat50 }}</span> players over combat level 50.
			<span class="text-info font-weight-bold d-block">{{ $combat80 }}</span> players over combat level 80.
			<span class="text-info font-weight-bold d-block">{{ $combat90 }}</span> players over combat level 90.
			<span class="text-info font-weight-bold d-block">{{ $combat100 }}</span> players over combat level 100.
			<span class="text-info font-weight-bold d-block">{{ $combat123 }}</span> players are combat level 123.

			<h4 class="pt-4 h4 text-warning">Quests</h4>
			<span class="text-info font-weight-bold">{{ $startedQuest }}</span> players have begun a quest.

			<h4 class="pt-4 h4 text-warning">Wealth</h4>
			<span class="text-info font-weight-bold d-block">{{ $banktotalGold }}</span> gp total in-game.
			<span class="text-info font-weight-bold d-block">{{ $gold30 }}</span> players have over 30K gp.
			<span class="text-info font-weight-bold d-block">{{ $gold50 }}</span> players have over 50K gp.
			<span class="text-info font-weight-bold d-block">{{ $gold80 }}</span> players have over 80K gp.
			<span class="text-info font-weight-bold d-block">{{ $gold120 }}</span> players have over 120K gp.
			<span class="text-info font-weight-bold d-block">{{ $gold400 }}</span> players have over 400K gp.
			<span class="text-info font-weight-bold d-block">{{ $gold1m }}</span> players have over 1M gp.
			<span class="text-info font-weight-bold d-block">{{ $gold12m }}</span> players have over 1.2M gp.
			<span class="text-info font-weight-bold d-block">{{ $gold15m }}</span> players have over 1.5M gp.
			<span class="text-info font-weight-bold d-block">{{ $gold2m }}</span> players have over 2M gp.
			<span class="text-info font-weight-bold d-block">{{ $gold4m }}</span> players have over 4M gp.
			<span class="text-info font-weight-bold d-block">{{ $gold10m }}</span> players have over 10M gp.

			<h4 class="pt-4 h4 text-warning">Expensive Items</h4>
			<div class="clickable-row" data-href="{{ route('itemdef/1278') }}">
				<div class="display-glow item1278 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $dsq }}</span></div>
			<div class="clickable-row" data-href="itemdef/795">
				<div class="display-glow item795 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $dmed }}</span></div>
			<div class="clickable-row" data-href="itemdef/522">
				<div class="display-glow item522 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $dammy }}</span></div>
			<div class="clickable-row" data-href="itemdef/597">
				<div class="display-glow item597 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $chargeddammy }}</span></div>
			<div class="clickable-row" data-href="itemdef/594">
				<div class="display-glow item594 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $dbattle }}</span></div>
			<div class="clickable-row" data-href="itemdef/593">
				<div class="display-glow item592 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $dlong }}</span></div>

			<h4 class="pt-4 h4 text-warning">Important Items</h4>
			<div class="clickable-row" data-href="itemdef/18">
				<div class="display-glow item18 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $cabbage }}</span>
			</div>
			<div class="clickable-row" data-href="itemdef/193">
				<div class="display-glow item193 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $beer }}</span>
			</div>

			<h4 class="pt-4 h4 text-warning">Holiday Items</h4>
			<div class="clickable-row" data-href="itemdef/422">
				<div class="display-glow item422 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $pumpkins }}</span> (13,001 on 11/1/2018)
			</div>
			<div class="clickable-row" data-href="itemdef/575">
				<div class="display-glow item575 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $crackers }}</span> (19,437 on
				12/26/2018)
			</div>
			<div class="clickable-row" data-href="itemdef/577">
				<div class="display-glow item577 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $yellowphat }}</span> (798 on 12/26/2018)
			</div>
			<div class="clickable-row" data-href="itemdef/581">
				<div class="display-glow item581 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $whitephat }}</span> (558 on 12/26/2018)
			</div>
			<div class="clickable-row" data-href="itemdef/580">
				<div class="display-glow item580 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $purplephat }}</span> (246 on 12/26/2018)
			</div>
			<div class="clickable-row" data-href="itemdef/576">
				<div class="display-glow item576 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $redphat }}</span> (820 on 12/26/2018)
			</div>
			<div class="clickable-row" data-href="itemdef/578">
				<div class="display-glow item578 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $bluephat }}</span> (393 on 12/26/2018)
			</div>
			<div class="clickable-row" data-href="itemdef/579">
				<div class="display-glow item579 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $greenphat }}</span> (504 on 12/26/2018)
			</div>
			<div class="clickable-row" data-href="itemdef/677">
				<div class="display-glow item677 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $eastereggs }}</span> (9,103 on 4/22/2019)
			</div>
			<div class="clickable-row" data-href="itemdef/828">
				<div class="display-glow item828 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $greenmask }}</span> (0 on 11/1/2019)
			</div>
			<div class="clickable-row" data-href="itemdef/831">
				<div class="display-glow item831 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $redmask }}</span> (0 on 11/1/2019)
			</div>
			<div class="clickable-row" data-href="itemdef/832">
				<div class="display-glow item832 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $bluemask }}</span> (0 on 11/1/2019)
			</div>
			<div class="clickable-row" data-href="itemdef/971">
				<div class="display-glow item971 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $santahat }}</span> (0 on 12/26/2019)
			</div>
			<div class="clickable-row" data-href="itemdef/1156">
				<div class="display-glow item1156 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $bunnyears }}</span> (0 on 4/22/2020)
			</div>
			<div class="clickable-row" data-href="itemdef/1289">
				<div class="display-glow item1289 d-inline-block"></div>
				<span class="text-info font-weight-bold">{{ $scythe }}</span> (0 on 11/1/2020)
			</div>

			<!-- Extra large version -->
			<div class="row align-items-center d-none d-xl-block">
				<div class="col">
					<table>
						@if ($stats->count() > 0)
							<tr>
								@foreach ($stats as $key=>$player)
									<td class="pl-1 pr-1 clickable-row" data-href="{{ route('itemdef', $player->id) }}"
										style="border: 1px solid black; background: rgba(255,255,255,0.2);">
										<div
											style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="mt-n2" src="{{ asset('img/items').'/'.$player->id }}.png"
											 alt="{{ $player->id }}"/>
									</td>
									@if ($key % 18 == 17)
							</tr>
						@endif
						@endforeach
						@else
							No items found.
						@endif
					</table>
				</div>
			</div>

			<!-- Large version -->
			<div class="row align-items-center d-none d-md-none d-lg-block d-xl-none">
				<div class="col">
					<table>
						@if ($stats->count() > 0)
							<tr>
								@foreach ($stats as $key=>$player)
									<td class="pl-1 pr-1 clickable-row" data-href="{{ route('itemdef', $player->id) }}"
										style="border: 1px solid black; background: rgba(255,255,255,0.2);">
										<div
											style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="mt-n2" src="{{ asset('img/items').'/'.$player->id }}.png"
											 alt="{{ $player->id }}"/>
									</td>
									@if ($key % 14 == 13)
							</tr>
						@endif
						@endforeach
						@else
							No items found.
						@endif
					</table>
				</div>
			</div>

			<!-- Medium view version -->
			<div class="row align-items-center pl-5 pr-5 d-none d-md-block d-lg-none d-xl-none">
				<div class="col">
					<table>
						@if ($stats->count() > 0)
							<tr>
								@foreach ($stats as $key=>$player)
									<td class="pl-1 pr-1 clickable-row" data-href="{{ route('itemdef', $player->id) }}"
										style="border: 1px solid black; background: rgba(255,255,255,0.2);">
										<div
											style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="mt-n2" src="{{ asset('img/items').'/'.$player->id }}.png"
											 alt="{{ $player->id }}"/>
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

			<!-- Mobile view version -->
			<div class="row align-items-center pl-4 pr-4 d-sm d-md-none d-lg-none">
				<div class="col">
					<table>
						@if ($stats->count() > 0)
							<tr>
								@foreach ($stats as $key=>$player)
									<td class="pl-1 pr-1 clickable-row" data-href="{{ route('itemdef', $player->id) }}"
										style="border: 1px solid black; background: rgba(255,255,255,0.2);">
										<div
											style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="mt-n2" src="{{ asset('img/items').'/'.$player->id }}.png"
											 alt="{{ $player->id }}"/>
									</td>
									@if ($key % 8 == 7)
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
	</div>
	</div>
@endsection

@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Shar's Bank</h2>

			<div class="sm-stats pl-3 pr-3">
				<div class="pb-0 stats row justify-content-center text-primary">
					<img class="pl-5" src="{{ asset('img/avatars').'/'.$banks->first()->playerID }}.png"
						 style="height: 125px;" alt="{{ $banks->first()->username }}">
					<div class="pl-5 col-6">
					<span class="sm-stats text-info pt-3">Status:
						@if ($banks->first()->online == 1)
							<span style="color: lime">
								<strong>Online</strong>
							</span>
						@else
							<span style="color: red">
								<strong>Offline</strong>
							</span>
						@endif
					</span>
						<span class="sm-stats text-info">Last Online:
								{{ Carbon\Carbon::parse($banks->first()->login_date)->diffForHumans() }}
					</span>
						<span class="sm-stats pt-2">Shar accepts player item donations for drop parties.</span>
						<span class="sm-stats pt-2">To donate in-game items to Shar, contact a staff member.</span>
					</div>
				</div>

				<!-- Extra large version -->
				<div class="stats pl-5 pr-5 d-none d-xl-block" align="center">
					<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
						@if ($banks->count() > 0)
							<tr>
								@foreach ($banks as $key=>$player)
									<td style="border: 1px solid black;">
										<div class="clickable-row"
											 data-href="{{ route('itemdef', $player->id) }}"
											 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="clickable-row" data-href="{{ route('itemdef', $player->id) }}"
											 src="{{ asset('img/items').'/'.$player->id }}.png"
											 alt="{{ $player->id }}"/>
									</td>
									@if ($key % 19 == 18)
							</tr>
						@endif
						@endforeach
						@else
							No items found.
						@endif
					</table>
				</div>

				<!-- Medium view version -->
				<div class="stats pl-5 pr-5 d-none d-md-block d-xl-none" align="center">
					<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
						@if ($banks->count() > 0)
							<tr>
								@foreach ($banks as $key=>$player)
									<td style="border: 1px solid black;">
										<div class="clickable-row"
											 data-href="{{ route('itemdef', $player->id) }}"
											 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="clickable-row" data-href="{{ route('itemdef', $player->id) }}"
											 src="{{ asset('img/items').'/'.$player->id }}.png"
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

				<!-- Mobile view version -->
				<div class="stats pl-5 pr-5 d-sm d-md-none d-lg-none" align="center">
					<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
						@if ($banks->count() > 0)
							<tr>
								@foreach ($banks as $key=>$player)
									<td style="border: 1px solid black;">
										<div class="clickable-row"
											 data-href="{{ route('itemdef', $player->id) }}"
											 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0; position: relative; color: white; font-size: 13px; font-weight: 900;">
											{{ $player->number }}
										</div>
										<img class="clickable-row" data-href="{{ route('itemdef', $player->id) }}"
											 src="{{ asset('img/items').'/'.$player->id }}.png"
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
@endsection

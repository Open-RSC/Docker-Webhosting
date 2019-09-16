@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Shar's Bank</h2>

			<div class="sm-stats pl-3 pr-3">
				<div class="pb-0 stats row justify-content-center text-primary">
					<img class="pl-5" src="{{ asset('img/avatars').'/'.$banks->first()->playerID }}.png" style="height: 125px;" alt="{{ $banks->first()->username }}">
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


				<table id="itemList"
					   class="container-fluid table-striped table-hover text-primary table-transparent">
					<tbody>
					@foreach ($banks as $key=>$player)
						<tr class="row clickable-row" data-href="player/{{ $player->id }}">
							<td style="border: 1px solid black;">
								<div class="clickable-row item $player['id'] }}"
									 data-href="../itemdef/ $player['id'] }}"
									 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0px; position: relative; color: white; font-size: 13px; font-weight: 900;">
									$player["number"] }}
								</div>
							</td>
							<td class="col text-left pt-1 pb-1">
									<span>
										{{ ucfirst($player->username) }}
									</span>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				$banks->links('pagination::bootstrap-4') }}
			</div>


			<!-- Regular view only -->
			<div class="stats pl-5 pr-5 d-none d-md-block d-lg-block" align="center">
				<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
					$banks = $connector->num_rows($player_bank_regular)
					foreach ($banks as $key=>$player)
					<tr>
						if ($banks > 0) {
						for ($i = 1; $list = $connector->fetchArray($banks); $i++) {
						?>
						<td style="border: 1px solid black;">
							<div class="clickable-row item $player['id'] }}"
								 data-href="../itemdef/ $player['id'] }}"
								 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0px; position: relative; color: white; font-size: 13px; font-weight: 900;">
								$player["number"] }}
							</div>
						</td>
						if (($i % 10 == 0) && ($i < $player))
					</tr>
					else
					No bank items found.
					endif
					endforeach
				</table>
			</div>

			<!-- Mobile view only -->
			<div class="stats pl-5 pr-5 d-md-none text-center">
				<table style="background: rgba(255,255,255,0.2); border-collapse: collapse;">
					$bank = $connector->num_rows($player_bank_mobile)
					<tr>
						if ($bank > 0)
						for ($i = 1; $list = $connector->fetchArray($player_bank_mobile); $i++)
						<td style="border: 1px solid black;">
							<div class="clickable-row item?php echo $list['id'] ?>"
								 data-href="../itemdef/ $list['id'] "
								 style="-webkit-text-fill-color: limegreen; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; margin-top: 0px; position: relative; color: white; font-size: 13px; font-weight: 900;">
								$list["number"] }}
							</div>
						</td>
						if (($i % 5 == 0) && ($i < $bank))
					</tr>
					endif
					endfor
					else
					No bank items found.
					endif
				</table>
			</div>

		</div>

	</div>
	</div>
@endsection

@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">Players Registered Today</h2>

			<table id="npcList" class="container table-striped table-hover text-primary table-transparent">
				<thead class="border-bottom border-info">
				<tr class="text-info">
					<th class="float-left">Player</th>
					<th class="float-center">Picture</th>
					<th class="float-right">Online Since</th>
					<th class="text-right">Cumulative Play</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($players as $player)
					<tr class="clickable-row" data-href="player/{{ $player->id }}">
						<td>
							<a href="player/{{ $player->id }}"
							   class="float-left text-capitalize pl-1 h5">
								@if ($player->group_id < '10')
									<img class="mb-1" src="{{ asset('img') }}/{{ $player->group_id }}.svg" height="14px"
										 width="auto" alt="group {{ $player->group_id }}"/>
								@endif
								{{ $player->username }}
							</a>
							<span
								class="text-white pl-1">(Combat {{ $player->combat }})</span>
						</td>
						<td>
							<img class="display-glow float-center pt-2"
								 src="{{ asset('img/avatars') }}/{{ $player->id }}.png" height="100px" width="auto"
								 alt="{{ $player->username }}"/>
						</td>
						<td>
							<span
								class="float-right pt-1 pb-1 h5">{{ Carbon\Carbon::parse($player->login_date)->diffForHumans() }}</span>
						</td>
						<td>
							<span
								class="float-right pt-1 pb-1 h5">{{ (new App\Http\Controllers\HomeController)->secondsToTime($player->value/1000) }}</span>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

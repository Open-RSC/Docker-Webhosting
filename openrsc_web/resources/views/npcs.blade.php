@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">NPC Database</h2>
			<div class="text-center">
				<label for="inputBox"></label>
				<input type="text" class="pl-2 pt-1 mb-4 w-25 text-center" id="inputBox" onkeyup="search()"
					   placeholder="Search">
			</div>

			<!-- Large view version -->
			<div class="d-none d-md-block">
				{{ $npcs->links('pagination::bootstrap-4') }}
				<table id="npcList" class="container table-striped table-hover text-primary table-transparent">
					<tbody>
					<tr>
						@foreach ($npcs as $key=>$npcdef)
							<td class="pl-3 text-center clickable-row" data-href="npcdef/{{ $npcdef->id }}">
								<div class="display-glow pt-1">
									<img src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"
										 style="max-height: 52px; max-width: 65px;"/>
								</div>
								<span class="text-capitalize">
									{{ $npcdef->name }} ({{ $npcdef->id }})
								</span>
								<span class="text-white-50 d-block">
								{{ $npcdef->description }}
							</span>
							</td>
							@if ($key % 6 == 5)
					</tr>
					@endif
					@endforeach
					</tbody>
				</table>
				{{ $npcs->links('pagination::bootstrap-4') }}
			</div>

			<!-- Mobile view version -->
			<div class="d-md-none d-lg-none">
			{{ $npcs->links('pagination::bootstrap-4') }}
			<table id="npcList" class="container table-striped table-hover text-primary table-transparent">
				<tbody>
				<tr>
					@foreach ($npcs as $key=>$npcdef)
						<td class="pl-3 text-center clickable-row" data-href="npcdef/{{ $npcdef->id }}">
							<div class="display-glow pt-1">
								<img src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"
									 style="max-height: 52px; max-width: 65px;"/>
							</div>
							<span class="text-capitalize">
									{{ $npcdef->name }} ({{ $npcdef->id }})
								</span>
							<span class="text-white-50 d-block">
								{{ $npcdef->description }}
							</span>
						</td>
						@if ($key % 4 == 3)
				</tr>
				@endif
				@endforeach
				</tbody>
			</table>
			{{ $npcs->links('pagination::bootstrap-4') }}
			</div>
		</div>
	</div>
@endsection

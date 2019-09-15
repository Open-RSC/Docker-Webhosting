@extends('template')

@section('content')
	<div class="text-info">
		<div class="container">
			<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">NPC Database</h2>
			<div class="text-center">
				<label for="inputBox"></label>
				<input type="text" class="pl-2 pt-1 mb-4 w-25 text-center" id="inputBox" onkeyup="search()"
					   placeholder="Search this page">
			</div>

			{{ $npcs->links('pagination::bootstrap-4') }}
			<table id="npcList" class="container table-striped table-hover text-primary table-transparent">
				<thead class="border-bottom border-info">
				<tr class="text-info">
					<th class="pl-2">NPC Name</th>
					<th class="text-center">Picture</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($npcs as $npcdef)
					<tr class="clickable-row" data-href="npcdef/{{ $npcdef->id }}">
						<td>
							<a href="npcdef/{{ $npcdef->id }}"
							   class="text-capitalize pl-1">{{ $npcdef->name }} ({{ $npcdef->id }})</a>
							<span class="text-white-50 pl-1 d-block">{{ $npcdef->description }}</span>
						</td>
						<td class="text-center pt-1 pb-1">
							<div class="display-glow">
								<img src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"/>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{ $npcs->links('pagination::bootstrap-4') }}
		</div>
	</div>
@endsection

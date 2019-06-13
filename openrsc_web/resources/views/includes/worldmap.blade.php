<section id="home">
	<div class="text-info table-dark">
		<div class="container">

			<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">NPC Database</h2>
			<label for="inputBox"></label>
			<input type="text" class="pl-2 pt-1 mb-3" id="inputBox" onkeyup="search()"
				   placeholder="Search for a NPC">

			<table id="npcList" class="container table-striped table-hover table-dark text-primary">
				<thead class="border-bottom border-info">
				<tr class="text-info">
					<th class="pl-2">NPC Name</th>
					<th class="text-center">Picture</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($npcs as $npcdef)
					<tr class="clickable-row" data-href="npcdef/{{ $npcdef->id }}">
						<td class="w-25">
							<a href="npcdef/{{ $npcdef->id }}"
							   class="text-capitalize pl-1">{{ $npcdef->name }} ({{ $npcdef->id }})</a>
							<span class="text-white-50 pl-1 d-block">{{ $npcdef->description }}</span>
						</td>
						<td class="w-10 text-center pt-1 pb-1">
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
</section>

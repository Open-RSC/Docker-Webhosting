<section id="home">
	<div class="panel position-fixed table-wrapper-scroll-y">
		<div class="text-info table-dark spaced-body full-width">
			<div class="container border-left border-info border-right table-wrapper-scroll-y">

				<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Item Database</h2>
				<label for="inputBox"></label>
				<input type="text" class="pl-2 pt-1 mb-3" id="inputBox" onkeyup="search()"
					   placeholder="Search for an item">
				{{ $items->links("includes.pagination") }}
				<table id="itemList" class="container table-striped table-hover table-dark text-primary">
					<thead class="border-bottom border-info">
					<tr class="text-info">
						<th class="small pl-2">Name</th>
						<th class="text-center small">Picture</th>
						<th class="text-center small">Req Level</th>
						<th class="text-center small">Shop Price</th>
						<th class="text-center small">Low Alch</th>
						<th class="text-center small">High Alch</th>
						<th class="text-center small">Item ID</th>
					</tr>
					</thead>
					<tbody>
					@foreach ($items as $row)
						<tr class="clickable-row" data-href="itemdef/{{ $row->id }}">
							<td class="w-25">
								<a href="itemdef/{{ $row->id }}" class="lead text-capitalize pl-1">{{ $row->name }} </a>
								<span class="blockquote-footer pl-1">{{ $row->description }}</span>
							</td>
							<td class="w-10 text-center pt-1 pb-1">
								<div class="display-glow"><img src="img/items/{{ $row->id }}.png" alt="item"/></div>
							</td>
							@if ($row->requiredLevel == 0)
								<td>
								</td>
							@else
								<td class="w-10 text-center pt-1 pb-1">
									{{ number_format($row->requiredLevel) }}
								</td>
							@endif
							<td class="text-center pt-1">
								{{number_format($row->basePrice) }}gp
							</td>
							<td class="text-center pt-1">
								{{ number_format($row->basePrice * 0.4) }}gp
							</td>
							<td class="text-center pt-1">
								{{ number_format($row->basePrice * 0.6) }}gp
							</td>
							<td class="text-center pt-1">
								{{ $row->id }}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				{{ $items->links("includes.pagination") }}
			</div>
		</div>

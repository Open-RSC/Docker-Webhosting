@extends('template')

@section('content')
	@foreach ($playerPositions as $char)
		<!--{ $xs = $ys = array() }}-->
		<img src="{{ asset('img/crosshairs.svg') }}" style="display: none;" alt="crosshairs"/>
		{{ $areaPlayer[] = 'ctx.drawImage(player,' . $char->x . ', ' . $char->y . ', 38, 38);'
			. ' player.src ="/img/crosshairs.svg"; '
			. ' ctx.fillStyle="gold"; '
			. ' ctx.font="18pt sans-serif"; '
			. ' ctx.fillText(' . ucfirst($char->username) . ', ' . $char->x . ', ' . $char->y . '); ' }}
	@endforeach

	{{ $coords = (new App\Http\Controllers\HomeController)->coords_to_image($char->x, $char->y) }}
	{{ $xs[] = $char->x }}
	{{ $ys[] = $char->y }}

	<div class="text-center" style="overflow: auto;">
		<script>
            function drawPosition() {
                const c = document.getElementById('canvas');
                if (c.getContext) {
                    const ctx = c.getContext('2d');
                    const player = new Image();
					{{ implode('', $areaPlayer) }}
                }
            }
		</script>

		<canvas style="background-image: url({{ asset('img/worldmap.png') }}" id="canvas" width="2152" height="1007">
			<script>
                drawPosition();
			</script>
		</canvas>
	</div>
@endsection

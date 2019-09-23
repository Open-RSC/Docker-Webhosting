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
                let canvas = document.getElementById('canvas');
                let context = canvas.getContext('2d');

                context.font= '16px Arial';
                context.textBaseline = 'middle';
                context.fillStyle = '#000000';

                canvas.addEventListener('mouseout', function(e) {
                    context.clearRect(0, 0, canvas.width, canvas.height);
                });

                canvas.addEventListener('mousemove', function(e) {
                    context.clearRect(0, 0, canvas.width, canvas.height);
                    context.beginPath();
                    context.arc(e.layerX, e.layerY, 3, 0, 2 * Math.PI, false);
                    context.closePath();
                    context.fill();
                    let realX = Math.round((-e.offsetX/3 + 767));
                    let realY = Math.round(e.layerY/3 + 433);
                    let text = '(' + realX + ', ' + realY + ')';
                    context.fillText(text, e.layerX + 5, e.layerY);
                });
            }
		</script>

		<canvas style="background-image: url({{ asset('img/worldmap.png') }}" id="canvas" width="2152" height="1007">
			<script>drawPosition();</script>
		</canvas>
	</div>
@endsection

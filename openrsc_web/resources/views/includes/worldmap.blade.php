<section id="home">

	@php
		$xs = $ys = array();

        function coords_to_image($x, $y)
        {
            $x = 2152 - (($x - 45) * 3);
            $y = ($y - 437) * 3;
            if ($x < 0 || $x > 2152 || $y < 0 || $y > 1007) {
                return false;
            }
            return array('x' => $x, 'y' => $y);
        }
	@endphp

	@foreach ($coords as $coord)
		{{ coords_to_image($coord->x, $coord->y) }}
		<img src="{{ asset('img/crosshairs.svg') }}" style="display: none;" alt='{{ $coord->username }}'/>
		@php
			$areaPlayer[] = 'ctx.drawImage(player,' . $coord->x . ', ' . $coord->y . ', 38, 38);'
                . ' player.src ="../img/crosshairs.svg"; '
                . ' ctx.fillStyle="gold"; '
                . ' ctx.font="18pt sans-serif"; '
                . ' ctx.fillText("' . ucfirst($coord->username) . '", ' . $coord->x . ', ' . $coord->y . '); '
		@endphp
	@endforeach

	<script>
		function drawPosition() {
			var c = document.getElementById('canvas');
			var ctx = c.getContext('2d');
			var player = new Image();
			{{ implode('', $areaPlayer) }}
		}
	</script>

	<div class="text-info table-dark">
		<div class="container-fluid">

			<canvas style="background-image: url('{{ asset('img/worldmap.png') }}');" id="canvas" width="2152"
					height="1007">
				<script> drawPosition(); </script>
			</canvas>
		</div>
	</div>
</section>

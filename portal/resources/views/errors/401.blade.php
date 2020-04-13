@extends('template')
@section('content')

	<header class="rsc-box rsc-header">
		<span class="d-block">Open RuneScape Classic</span>
		<a class="rsc-link" href="/">Main Menu</a>
	</header>

	<div class="pt-1">
		<div class="rsc-box rsc-hiscores-ranks text-center">
			<!-- Full version -->
			<div class="d-none d-md-block d-lg-block d-xl-block">
				<img class="d-block pb-1" src="{{ asset('images/apocalypse.png') }}" style="width: 720px" alt="404"/>
			</div>

			<!-- Mobile version -->
			<div class="d-sm d-md-none d-lg-none">
				<img class="d-block" src="{{ asset('images/apocalypse.png') }}" style="width: 288px" alt="404"/>
			</div>

			<span class="h3">401 - Unauthorized</span>
		</div>
	</div>

@endsection

@extends('template')

@section('content')
	<h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3">
		Minigame List
	</h2>
	<div class="text-primary">
		<div class="pl-3 pr-3 container">

			<div class="table-transparent pl-5 pr-5 mb-5">
				<div id="row1" class="d-flex flex-wrap justify-content-between pt-3">
					<div class="clickable-row" data-toggle="tooltip" data-href="/quest/black_knights_fortress"
						 title="Reward: 3 quest points and 2500 coins">
									<span class="d-block">
										<img class="d-block"
											 src="{{ asset('img/quests/Black_Knight_Quest_Complete.png') }}"
											 style="max-height:150px; max-width: 225px;" alt="quest image">
										<span class="text-info">
											Black Knights' Fortress
										</span>
									</span>
						<span class="d-block pb-3">
										Difficulty:
										<span class="small text-info font-weight-bold">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</span>
										<span class="small">
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										</span>
									</span>
					</div>

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-cooks-assistant"
						 title="Reward: 1 quest point, cooking experience, and access to the cook's range in Lumbridge castle">
									<span class="d-block">
										<img class="d-block"
											 src="{{ asset('img/quests/Cooks_Assistant_Completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Cook's Assistant
										</span>
									</span>
						<span class="d-block pb-3">
										Difficulty:
										<span class="small text-info font-weight-bold">
											<i class="fas fa-star"></i>
										</span>
										<span class="small">
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										</span>
									</span>
					</div>

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-doric-quest"
						 title="Reward: 1 quest point, mining experience, 180 coins, and the ability to use Doric's anvils">
									<span class="d-block">
										<img class="d-block" alt="quest image"
											 src="{{ asset('img/quests/Dorics_Quest_Completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Doric's Quest
										</span>
									</span>
						<span class="d-block pb-3">
										Difficulty:
										<span class="small text-info font-weight-bold">
											<i class="fas fa-star"></i>
										</span>
										<span class="small">
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										</span>
									</span>
					</div>
				</div>

				<div id="row2" class="d-flex flex-wrap justify-content-between pt-3">
					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-dragon-slayer"
						 title="Reward: 2 quest points, defense experience, strength experience, and the ability to wear the rune plate mail body">
									<span class="d-block">
										<img class="d-block" alt="quest image"
											 src="{{ asset('img/quests/Dragon_Slayer_completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Dragon slayer
										</span>
									</span>
						<span class="d-block pb-3">
										Difficulty:
										<span class="small text-info font-weight-bold">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</span>
										<span class="small">
											<i class="far fa-star"></i>
										</span>
									</span>
					</div>

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-ernest-the-chicken"
						 title="Reward: 4 quest points and 300 coins">
									<span class="d-block">
										<img class="d-block"
											 src="{{ asset('img/quests/Ernest_Chicken_completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Ernest the Chicken
										</span>
									</span>
						<span class="d-block pb-3">
										Difficulty:
										<span class="small text-info font-weight-bold">
											<i class="fas fa-star"></i>
										</span>
										<span class="small">
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										</span>
									</span>
					</div>

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-demon-slayer"
						 title="Reward: 3 quest points and to obtain Silverlight">
									<span class="d-block">
										<img class="d-block" alt="quest image"
											 src="{{ asset('img/quests/Demon_Slayer_completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Demon Slayer
										</span>
									</span>
						<span class="d-block pb-3">
										Difficulty:
										<span class="small text-info font-weight-bold">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</span>
										<span class="small">
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										</span>
									</span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

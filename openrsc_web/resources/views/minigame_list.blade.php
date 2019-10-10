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

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-goblin-diplomacy"
						 title="Reward: 5 quests, 1 gold bar, and crafting experience">
									<span class="d-block">
										<img class="d-block" alt="quest image"
											 src="{{ asset('img/quests/Goblin_completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Goblin Diplomacy
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

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-imp-catcher"
						 title="Reward: 1 quest point, magic experience, and an amulet of accuracy">
									<span class="d-block">
										<img class="d-block" alt="quest image"
											 src="{{ asset('img/quests/Imp_Catcher_Completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Imp Catcher
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

				<div id="row3" class="d-flex flex-wrap justify-content-between pt-3">
					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-the-knights-sword"
						 title="Reward: 1 quest point, smithing experience, and optionally the Faladian Sword">
									<span class="d-block">
										<img class="d-block"
											 src="{{ asset('img/quests/Knight\'s_Sword_completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											The Knight's Sword
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

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-pirates-treasure"
						 title="Reward: 2 quest points, 450 coins, a gold ring, and an emerald">
									<span class="d-block">
										<img class="d-block"
											 src="{{ asset('img/quests/Pirates_Treasure_completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Pirate's Treasure
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

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-prince-ali-rescue"
						 title="Reward: 3 quest points, 700 coins, and free passage through the Al-Kharid toll gate">
									<span class="d-block">
										<img class="d-block"
											 src="{{ asset('img/quests/Prince_Ali_Rescue_completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Prince Ali Rescue
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

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-the-restless-ghost"
						 title="Reward: 1 quest point, prayer experience, and an Amulet of Ghostspeak">
									<span class="d-block">
										<img class="d-block"
											 src="{{ asset('img/quests/The_Restless_Ghost_Completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											The Restless Ghost
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

				<div id="row4" class="d-flex flex-wrap justify-content-between pt-3">
					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-romeo-and-juliet"
						 title="Reward: 5 quest points">
									<span class="d-block">
										<img class="d-block" alt="quest image"
											 src="{{ asset('img/quests/Romeo_Juliet_Completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Romeo & Juliet
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

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-sheep-shearer"
						 title="Reward: 1 quest point, 60 coins, and crafting experience">
									<span class="d-block">
										<img class="d-block" alt="quest image"
											 src="{{ asset('img/quests/Sheep_Shearer_Completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Sheep Shearer
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

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-shield-of-arrav"
						 title="Reward: 1 quest point and 600 coins">
									<span class="d-block">
										<img class="d-block"
											 src="{{ asset('img/quests/Shield_of_Arrav_completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Shield of Arrav
										</span>
									</span>
						<span class="d-block pb-3">
										Difficulty:
										<span class="small text-info font-weight-bold">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</span>
										<span class="small">
											<i class="far fa-star"></i>
											<i class="far fa-star"></i>
										</span>
									</span>
					</div>

					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-vampire-slayer"
						 title="Reward: 3 quest points and attack experience">
									<span class="d-block">
										<img class="d-block"
											 src="{{ asset('img/quests/Vampire_Slayer_Completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Vampire Slayer
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

				<div id="row5" class="d-flex flex-wrap justify-content-between pt-3">
					<div class="clickable-row" data-toggle="tooltip" data-href="/quest-witchs-potion"
						 title="Reward: 1 quest point and magic experience">
									<span class="d-block">
										<img class="d-block"
											 src="{{ asset('img/quests/Witch\'s_potion_completed.png') }}"
											 style="max-height:150px; max-width: 225px;">
										<span class="text-info">
											Witch's potion
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

			</div>
		</div>
	</div>
@endsection

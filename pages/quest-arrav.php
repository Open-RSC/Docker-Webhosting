<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}
?>

<article class="text-info table-dark full-width">
	<div class="container border-left border-info border-right table-wrapper-scroll-y">
		<h2 class="h2 text-center text-capitalize display-3">Shield of Arrav</h2>
		<div class="row sm-stats justify-content-center" style="text-transform: unset;">
			<div class="text-primary">
				<div class="row justify-content-center">
					<div class="pl-3 pr-3 container">
						<div class="pb-1" align="center">
							<img class="display-glow border border-dark rounded"
								 src="../img/quests/Shield_of_Arrav_completed.png">
						</div>

						<div class="flex-row stats">
							<div class="sm-stats col-sm">
								<span class="d-block"><span class="text-info">Release date:</span> 4 January 2001</span>
								<span class="d-block"><span class="text-info">Start:</span> Reldo in the Varrock Library</span>
								<span class="d-block"><span class="text-info">Difficulty:</span> <span
										class="small text-info font-weight-bold">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</span><span
										class="small">
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									</span></span>
								<span class="d-block"><span class="text-info">Length:</span> Medium</span>
							</div>
							<div class="sm-stats">
								<span class="d-block"><span class="text-info">Items needed:</span> 20gp or food and a weapon</span>
								<span class="d-block"><span class="text-info">Requirements:</span> Ability to kill a level 10 or 25 enemy,
									another player to help</span>
								<span class="d-block"><span class="text-info">Monsters to kill:</span> Jonny the Beard (level 10, if you join
									the Phoenix Gang)</span>
								<span
									class="d-sm-block">or Weaponmaster (level 25, if you join the Black Arm Gang)</span>
							</div>
						</div>

						<div class="stats pl-5 pr-5" id="accordion">
							<div class="h4 text-info">Gang Affiliation Player List</div>
							<div class="text-primary btn btn-link" data-toggle="collapse"
								 data-target="#collapseplayerlist"
								 aria-expanded="false" aria-controls="collapseOne">
								Show contents
							</div>
							<div id="collapseplayerlist" class="collapse hide" aria-labelledby="headingOne"
								 data-parent="#accordion">
								<?php echo arrav(); ?>
							</div>
						</div>

						<div class="stats pl-5 pr-5" id="accordion">
							<div class="h4 text-info">Walkthrough</div>
							<div class="text-primary btn btn-link" data-toggle="collapse"
								 data-target="#collapsewalkthrough"
								 aria-expanded="false" aria-controls="collapseOne">
								Show contents
							</div>
							<div id="collapsewalkthrough" class="collapse hide" aria-labelledby="headingOne"
								 data-parent="#accordion">
								<span class="d-block">
								To start the quest, talk to Reldo, in the Varrock Library. Tell him that you're looking
								for
								a quest and he will refer you to a book about the "Shield of Arrav." Search the bookcase
								in
								the north-west corner of the room to obtain a book. Read it, and then speak again to
								Reldo.
									He'll tell you to speak to Baraek the fur trader to learn more about the Phoenix Gang.</span>

								<span class="pt-3 d-block">You now have the option of joining two gangs: the Phoenix Gang or the Black Arm Gang.</span>
							</div>
						</div>

						<div class="stats pl-5 pr-5" id="accordion">
							<div class="h4 text-info">Joining the Phoenix Gang</div>
							<div class="text-primary btn btn-link" data-toggle="collapse" data-target="#collapsephoenix"
								 aria-expanded="false" aria-controls="collapseOne">
								Show contents
							</div>
							<div id="collapsephoenix" class="collapse hide" aria-labelledby="headingOne"
								 data-parent="#accordion">
								<span class="d-block">Go and talk to Baraek in the Varrock Square. Ask him about the Phoenix Gang, and he says
								that for more information, you must pay 20 coins. After you pay him, you find out that
								the
								base is east of the south gate of Varrock and that they are operating under the name of
									"VTAM Corporation."</span>

								<span class="pt-3 d-block">Phoenix Gang Hideout</span>
								<span class="d-block">Look for a small room that has a lone ladder leading underground. Go down the ladder and
								you'll be in a hallway with a Man. Talk to the man and tell him that you know who they
								are
								and then say you you would like to join the gang. You will have to prove yourself to
								join
								the gang, so he tells to kill Jonny the Beard at the Blue Moon Inn beside Varrock's
								southern
									entrance.</span>

								<span class="pt-3 d-block">Go to the Blue Moon Inn and then fight and kill Jonny the Beard. He will drop a scroll,
								an
								intelligence report, upon his death; take it and go back to the man in the hideout. The
								man
								will be so pleased that he will give you a key to the Phoenix Gang's weapons cache and
								permit you to enter their hideout. Enter the hideout and then enter the room in the
								south-east corner. Open the chest and then search it to obtain the left half of the
								Broken
									Shield. See the finale section on how to finish the quest.</span>
							</div>
						</div>

						<div class="stats pl-5 pr-5" id="accordion">
							<div class="h4 text-info">Joining the Black Arm Gang</div>
							<div class="text-primary btn btn-link" data-toggle="collapse"
								 data-target="#collapseblackarm"
								 aria-expanded="false" aria-controls="collapseOne">
								Show contents
							</div>
							<div id="collapseblackarm" class="collapse hide" aria-labelledby="headingOne"
								 data-parent="#accordion">
								<span class="d-block">After reading the book, talk to the Tramp near Varrock's southern gate. Ask him what is
								down
								that alleyway and he will tell you that it contains the base of the Black Arm Gang. Ask
								if
								you can join, and he will tell you to talk to a woman named Katrine. Walk down the alley
								and
									enter the building.</span>

								<span class="pt-3 d-block">Talk to Katrine about the Black Arm Gang, and ask to join. She will want you to steal
								two
								Phoenix Crossbows from the rival Phoenix Gang that she plans on using to murder
								somebody.
								The crossbows are located in the Phoenix Gang's weapon stash around the east end of
									Varrock.</span>

								<span class="pt-3 d-block">You will now need somebody who joined the Phoenix Gang to help you out. Go east from the
								Black Arm Gang hideout until you see a small room with a ladder leading to a second
								floor.
								When you try to open the door, it will be locked. You will have to trade with a player
								who
								joined the Phoenix Gang and get their key. Once you have the key, use it on the door and
								go
									up the ladder.</span>

								<span class="pt-3 d-block">The two crossbows are in this room, but if you steal them, the Weaponsmaster (level 25)
								will
								attack you unless another player is talking to him. You must kill him if no one is
								distracting him, and if you are a low level you will need food and/or armour.
								Alternatively
								you or another player may cast telekinetic grab on the crossbows to obtain them. Once he
								is
								dead, take two Phoenix Crossbows and return to Katrine, who will take the two crossbows
								and
									make you a member of the Black Arm Gang.</span>

								<span class="pt-3 d-block">Now go upstairs and search the cupboard to find the right half of the Broken Shield.
								Note
								that if you do not receive the right half of the shield when you search the cupboard
								then
								you did not talk to Reldo to start the quest. See the finale section on how to finish
								the
									quest.</span>
							</div>
						</div>

						<div class="stats pl-5 pr-5" id="accordion">
							<div class="h4 text-info">Finale</div>
							<div class="text-primary btn btn-link" data-toggle="collapse" data-target="#collapsefinale"
								 aria-expanded="false" aria-controls="collapseOne">
								Show contents
							</div>
							<div id="collapsefinale" class="collapse hide" aria-labelledby="headingOne"
								 data-parent="#accordion">
								You must now find another player with the other half of the Broken Shield. You or the
								other
								player will have to trade and one of you will have both halves. The two of you must then
								go
								to the Varrock Museum, talk to the Curator, and he'll take the shield and give you/your
								partner two certificates. Give one of the certificates to your partner. Now head to the
								King
								in the Varrock Palace, talk to him, and you will earn your reward, completing the quest.
								Note: receiving a certificate without having gone through the steps in this quest will
								NOT
								work (for example: if someone had a left over certificate, it won't let you
								speed-complete
								this quest).
							</div>
						</div>

						<div class="stats pl-5 pr-5" id="accordion">
							<div class="h4 text-info">Rewards</div>
							<div class="text-primary btn btn-link" data-toggle="collapse" data-target="#collapserewards"
								 aria-expanded="false" aria-controls="collapseOne">
								Show contents
							</div>
							<div id="collapserewards" class="collapse hide" aria-labelledby="headingOne"
								 data-parent="#accordion">
								<ul>
									<li style="list-style: unset;">1 Quest Point</li>
									<li style="list-style: unset;">600 coins</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

<?php
if (!defined('IN_SITE')) {
	die("You do not have permission to access this file.");
}
?>

<article class="text-info table-dark spaced-body full-width">
	<div class="container border-left border-info border-right table-wrapper-scroll-y mCustomScrollbar"
		 data-mcs-theme="minimal">
		<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Statistics</h2>
		<div class="row justify-content-center">
			<div class="text-primary">
				<h4 class="pt-4 h4 text-warning">Accounts</h4>
				<span class="d-block"><a class="text-info font-weight-bold"
										 href="online"><?php echo cabbageplayersOnline(); ?></a> players currently
					logged in.</span>
				<span class="d-block"><a class="text-info font-weight-bold"
										 href="registrationstoday"><?php echo cabbagenewRegistrationsToday(); ?></a> players have been registered
					today.</span>
				<span class="d-block"><a class="text-info font-weight-bold"
										 href="logins48"><?php echo cabbagelogins48(); ?></a> players logged in
					the last 48 hours.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo cabbageuniquePlayers(); ?></span> people have created <span
						class="text-info font-weight-bold"><?php echo cabbagetotalPlayers(); ?></span>
					players.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo cabbagetotalTime(); ?></span> total time played.</span>

				<h4 class="pt-4 h4 text-warning">Combat</h4>
				<span class="d-block">The highest combat level is <span
						class="text-info font-weight-bold"><?php echo cabbagetopcombat(); ?>.</span></span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo combat30(); ?></span> players over combat level
					30.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo combat50(); ?></span> players over combat level
				50.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo combat80(); ?></span> players over combat level
				80.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo combat90(); ?></span> players over combat level
				90.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo combat100(); ?></span> players over combat level
				100.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo combat123(); ?></span> players are combat level
				123.</span>

				<h4 class="pt-4 h4 text-warning">Quests</h4>
				<span class="text-info font-weight-bold"><?php echo startedQuest(); ?></span> players have begun a
				quest.

				<h4 class="pt-4 h4 text-warning">Wealth</h4>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo cabbagebanktotalGold(); ?></span> gp total in-game.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold30(); ?></span> players have over 30K gp.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold50(); ?></span> players have over 50K gp.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold80(); ?></span> players have over 80K gp.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold120(); ?></span> players have over 120K gp.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold400(); ?></span> players have over 400K gp.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold1m(); ?></span> players have over 1M gp.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold12m(); ?></span> players have over 1.2M gp.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold15m(); ?></span> players have over 1.5M gp.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold2m(); ?></span> players have over 2M gp.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold4m(); ?></span> players have over 4M gp.</span>
				<span class="d-block"><span class="text-info font-weight-bold"><?php echo gold10m(); ?></span> players have over 10M gp.</span>

				<h4 class="pt-4 h4 text-warning">Expensive Items</h4>
				<div class="clickable-row" data-href="itemdef/1278">
					<div class="display-glow item1278 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo dsq(); ?></span></div>
				<div class="clickable-row" data-href="itemdef/795">
					<div class="display-glow item795 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo dmed(); ?></span></div>
				<div class="clickable-row" data-href="itemdef/522">
					<div class="display-glow item522 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo dammy(); ?></span></div>
				<div class="clickable-row" data-href="itemdef/597">
					<div class="display-glow item597 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo chargeddammy(); ?></span></div>
				<div class="clickable-row" data-href="itemdef/594">
					<div class="display-glow item594 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo dbattle(); ?></span></div>
				<div class="clickable-row" data-href="itemdef/593">
					<div class="display-glow item592 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo dlong(); ?></span></div>

				<h4 class="pt-4 h4 text-warning">Important Items</h4>
				<div class="clickable-row" data-href="itemdef/18">
					<div class="display-glow item18 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo cabbage(); ?></span>
				</div>
				<div class="clickable-row" data-href="itemdef/193">
					<div class="display-glow item193 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo beer(); ?></span>
				</div>

				<h4 class="pt-4 h4 text-warning">Holiday Items</h4>
				<div class="clickable-row" data-href="itemdef/422">
					<div class="display-glow item422 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo pumpkins(); ?></span> (13,001 on 11/1/2018)
				</div>
				<div class="clickable-row" data-href="itemdef/575">
					<div class="display-glow item575 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo crackers(); ?></span> (19,437 on
					12/26/2018)
				</div>
				<div class="clickable-row" data-href="itemdef/577">
					<div class="display-glow item577 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo yellowphat(); ?></span> (798 on 12/26/2018)
				</div>
				<div class="clickable-row" data-href="itemdef/581">
					<div class="display-glow item581 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo whitephat(); ?></span> (558 on 12/26/2018)
				</div>
				<div class="clickable-row" data-href="itemdef/580">
					<div class="display-glow item580 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo purplephat(); ?></span> (246 on 12/26/2018)
				</div>
				<div class="clickable-row" data-href="itemdef/576">
					<div class="display-glow item576 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo redphat(); ?></span> (820 on 12/26/2018)
				</div>
				<div class="clickable-row" data-href="itemdef/578">
					<div class="display-glow item578 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo bluephat(); ?></span> (393 on 12/26/2018)
				</div>
				<div class="clickable-row" data-href="itemdef/579">
					<div class="display-glow item579 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo greenphat(); ?></span> (504 on 12/26/2018)
				</div>
				<div class="clickable-row" data-href="itemdef/677">
					<div class="display-glow item677 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo eastereggs(); ?></span> (9,103 on 4/22/2019)
				</div>
				<div class="clickable-row" data-href="itemdef/828">
					<div class="display-glow item828 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo greenmask(); ?></span> (0 on 11/1/2019)
				</div>
				<div class="clickable-row" data-href="itemdef/831">
					<div class="display-glow item831 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo redmask(); ?></span> (0 on 11/1/2019)
				</div>
				<div class="clickable-row" data-href="itemdef/832">
					<div class="display-glow item832 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo bluemask(); ?></span> (0 on 11/1/2019)
				</div>
				<div class="clickable-row" data-href="itemdef/971">
					<div class="display-glow item971 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo santahat(); ?></span> (0 on 12/26/2019)
				</div>
				<div class="clickable-row" data-href="itemdef/1156">
					<div class="display-glow item1156 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo bunnyears(); ?></span> (0 on 4/22/2020)
				</div>
				<div class="clickable-row" data-href="itemdef/1289">
					<div class="display-glow item1289 d-inline-block"></div>
					<span class="text-info font-weight-bold"> <?php echo scythe(); ?></span> (0 on 11/1/2020)
				</div>
			</div>
		</div>
	</div>
</article>

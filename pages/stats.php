<?php
if (!defined('IN_SITE')) {
    die("You do not have permission to access this file.");
}
?>

<div class="text-info table-dark">
	<div class="container border-left border-info border-right">
		<div class="h2 text-center pt-5 pb-5 text-capitalize display-3" style="font-size: 38px;">Statistics</div>
		<div class="row justify-content-center">
			<div class="col-4 text-primary">
					<div class="h4 text-warning">Accounts</div>
                    <a class="text-info font-weight-bold" href="online"><?php echo playersOnline(); ?></a> players currently logged in.<br>
                    <a class="text-info font-weight-bold" href="registrationstoday"><?php echo newRegistrationsToday(); ?></a> players have been registered today.<br>
                    <a class="text-info font-weight-bold" href="logins48"><?php echo logins48(); ?></a> players logged in the last 48 hours.<br>
                    <span class="text-info font-weight-bold"><?php echo uniquePlayers(); ?></span> people have created <span class="text-info font-weight-bold"><?php echo totalPlayers(); ?></span>
					players.<br>
					<span class="text-info font-weight-bold"><?php echo totalTime(); ?></span> total time played.<br><br>

                    <div class="h4 text-warning">Combat</div>
                    The highest combat level is <span class="text-info font-weight-bold"><?php echo topcombat(); ?>.</span><br>
                    <span class="text-info font-weight-bold"><?php echo combat30(); ?></span> players over combat level 30.<br>
                    <span class="text-info font-weight-bold"><?php echo combat50(); ?></span> players over combat level 50.</span><br>
                    <span class="text-info font-weight-bold"><?php echo combat80(); ?></span> players over combat level 80.</span><br>
                    <span class="text-info font-weight-bold"><?php echo combat90(); ?></span> players over combat level 90.</span><br>
                    <span class="text-info font-weight-bold"><?php echo combat100(); ?></span> players over combat level 100.</span><br>
                    <span class="text-info font-weight-bold"><?php echo combat123(); ?></span> players are combat level 123.</span><br><br>

					<div class="h4 text-warning">Quests</div>
                    <span class="text-info font-weight-bold"><?php echo startedQuest(); ?></span> players have begun a quest.<br><br>

					<div class="h4 text-warning">Wealth</div>
                    <span class="text-info font-weight-bold"><?php echo banktotalGold(); ?></span> gp total in-game.<br>
                    <span class="text-info font-weight-bold"><?php echo gold30(); ?></span> players have over 30K gp.<br>
                    <span class="text-info font-weight-bold"><?php echo gold50(); ?></span> players have over 50K gp.<br>
                    <span class="text-info font-weight-bold"><?php echo gold80(); ?></span> players have over 80K gp.<br>
                    <span class="text-info font-weight-bold"><?php echo gold120(); ?></span> players have over 120K gp.<br>
                    <span class="text-info font-weight-bold"><?php echo gold400(); ?></span> players have over 400K gp.<br>
                    <span class="text-info font-weight-bold"><?php echo gold1m(); ?></span> players have over 1M gp.<br>
                    <span class="text-info font-weight-bold"><?php echo gold12m(); ?></span> players have over 1.2M gp.<br>
                    <span class="text-info font-weight-bold"><?php echo gold15m(); ?></span> players have over 1.5M gp.<br><br>

					<div class="h4 text-warning">Expensive Items</div>
					<div class="display-glow item1278 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo dsq(); ?></span><br>
					<div class="display-glow item795 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo dmed(); ?></span><br>
					<div class="display-glow item522 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo dammy(); ?></span><br>
					<div class="display-glow item597 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo chargeddammy(); ?></span><br>
					<div class="display-glow item594 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo dbattle(); ?></span><br>
					<div class="display-glow item592 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo dlong(); ?></span><br><br>

					<div class="h4 text-warning">Important Items</div>
					<div class="display-glow item18 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo cabbage(); ?></span><br>
					<div class="display-glow item193 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo beer(); ?></span><br><br>

					<div class="h4 text-warning">Holiday Items</div>
					<div class="display-glow item422 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo pumpkins(); ?></span> (13,001 on 11/1/2018)<br>
                    <div class="display-glow item575 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo crackers(); ?></span> (19,437 on 12/26/2018)<br>
					<div class="display-glow item577 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo yellowphat(); ?></span> (798 on 12/26/2018)<br>
					<div class="display-glow item581 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo whitephat(); ?></span> (558 on 12/26/2018)<br>
					<div class="display-glow item580 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo purplephat(); ?></span> (246 on 12/26/2018)<br>
					<div class="display-glow item576 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo redphat(); ?></span> (820 on 12/26/2018)<br>
					<div class="display-glow item578 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo bluephat(); ?></span> (393 on 12/26/2018)<br>
					<div class="display-glow item579 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo greenphat(); ?></span> (504 on 12/26/2018)<br>
					<div class="display-glow item677 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo eastereggs(); ?></span> (0 on 4/22/2019)<br>
					<div class="display-glow item828 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo greenmask(); ?></span> (0 on 11/1/2019)<br>
					<div class="display-glow item831 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo redmask(); ?></span> (0 on 11/1/2019)<br>
					<div class="display-glow item832 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo bluemask(); ?></span> (0 on 11/1/2019)<br>
					<div class="display-glow item971 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo santahat(); ?></span> (0 on 12/26/2019)<br>
					<div class="display-glow item1156 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo bunnyears(); ?></span> (0 on 4/22/2020)<br>
					<div class="display-glow item1289 d-inline-block"></div><span class="text-info font-weight-bold"> <?php echo scythe(); ?></span> (0 on 11/1/2020)<br>
					<br><br><br>
			</div>
		</div>
	</div>
</div>

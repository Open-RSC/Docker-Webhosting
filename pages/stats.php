<?php
if (!defined('IN_SITE')) {
    die("You do not have permission to access this file.");
}
?>

<div class="text-info table-dark">
	<div class="container border-left border-info border-right">
		<div align="center">
			<h2 class="pt-5 pb-5 text-capitalize display-3" style="font-size: 38px;">Statistics</h2>
		</div>
		<div class="row justify-content-center">
			<div class="col-4 text-primary">
					<h4 class="text-warning">Accounts</h4>
                    <a class="text-info font-weight-bold" href="/online"><?php echo playersOnline(); ?></a> players currently logged in.<br/>
                    <a class="text-info font-weight-bold" href="/registrationstoday"><?php echo newRegistrationsToday(); ?></a> players have been registered today.<br/>
                    <a class="text-info font-weight-bold" href="/loginstoday"><?php echo loginsToday(); ?></a> players logged in today.<br/>
                    <span class="text-info font-weight-bold"><?php echo uniquePlayers(); ?></span> people have created <span class="text-info font-weight-bold"><?php echo totalPlayers(); ?></span>
					players.<br/>
					<span class="text-info font-weight-bold"><?php echo totalTime(); ?></span> total time played.<br/><br/>

                    <h4 class="text-warning">Combat</h4>
                    The highest combat level is <span class="text-info font-weight-bold"><?php echo topcombat(); ?>.</span><br/>
                    <span class="text-info font-weight-bold"><?php echo combat30(); ?></span> players over combat level 30.<br/>
                    <span class="text-info font-weight-bold"><?php echo combat50(); ?></span> players over combat level 50.</span><br/>
                    <span class="text-info font-weight-bold"><?php echo combat80(); ?></span> players over combat level 80.</span><br/>
                    <span class="text-info font-weight-bold"><?php echo combat90(); ?></span> players over combat level 90.</span><br/>
                    <span class="text-info font-weight-bold"><?php echo combat100(); ?></span> players over combat level 100.</span><br/>
                    <span class="text-info font-weight-bold"><?php echo combat123(); ?></span> players are combat level 123.</span><br/><br/>

					<h4 class="text-warning">Quests</h4>
                    <span class="text-info font-weight-bold"><?php echo startedQuest(); ?></span> players have begun a quest.<br/><br/>

					<h4 class="text-warning">Wealth</h4>
                    <span class="text-info font-weight-bold"><?php echo banktotalGold(); ?></span> gp total in-game.<br/>
                    <span class="text-info font-weight-bold"><?php echo gold30(); ?></span> players have over 30K gp.<br/>
                    <span class="text-info font-weight-bold"><?php echo gold50(); ?></span> players have over 50K gp.<br/>
                    <span class="text-info font-weight-bold"><?php echo gold80(); ?></span> players have over 80K gp.<br/>
                    <span class="text-info font-weight-bold"><?php echo gold120(); ?></span> players have over 120K gp.<br/>
                    <span class="text-info font-weight-bold"><?php echo gold400(); ?></span> players have over 400K gp.<br/>
                    <span class="text-info font-weight-bold"><?php echo gold1m(); ?></span> players have over 1M gp.<br/>
                    <span class="text-info font-weight-bold"><?php echo gold12m(); ?></span> players have over 1.2M gp.<br/>
                    <span class="text-info font-weight-bold"><?php echo gold15m(); ?></span> players have over 1.5M gp.<br/><br/>

					<h4 class="text-warning">Expensive Items</h4>
                    <img src="/img/items/1278.png"/> <span class="text-info font-weight-bold"><?php echo dsq(); ?></span><br/>
                    <img src="/img/items/795.png"/> <span class="text-info font-weight-bold"><?php echo dmed(); ?></span><br/>
                    <img src="/img/items/522.png"/> <span class="text-info font-weight-bold"><?php echo dammy(); ?></span><br/>
                    <img src="/img/items/597.png"/> <span class="text-info font-weight-bold"><?php echo chargeddammy(); ?></span><br/>
                    <img src="/img/items/594.png"/> <span class="text-info font-weight-bold"><?php echo dbattle(); ?></span><br/>
                    <img src="/img/items/593.png"/> <span class="text-info font-weight-bold"><?php echo dlong(); ?></span><br/><br/>

					<h4 class="text-warning">Holiday Items</h4>
                    <img src="/img/items/422.png"/> <span class="text-info font-weight-bold"><?php echo pumpkins(); ?></span> (13,001 on 11/1/2018)<br/>
                    <img src="/img/items/575.png"/> <span class="text-info font-weight-bold"><?php echo crackers(); ?></span> (0 on 12/26/2018)<br/>
                    <img src="/img/items/577.png"/> <span class="text-info font-weight-bold"><?php echo yellowphat(); ?></span> (0 on 12/26/2018)<br/>
                    <img src="/img/items/581.png"/> <span class="text-info font-weight-bold"><?php echo whitephat(); ?></span> (0 on 12/26/2018)<br/>
                    <img src="/img/items/580.png"/> <span class="text-info font-weight-bold"><?php echo purplephat(); ?></span> (0 on 12/26/2018)<br/>
                    <img src="/img/items/576.png"/> <span class="text-info font-weight-bold"><?php echo redphat(); ?></span> (0 on 12/26/2018)<br/>
                    <img src="/img/items/578.png"/> <span class="text-info font-weight-bold"><?php echo bluephat(); ?></span> (0 on 12/26/2018)<br/>
                    <img src="/img/items/579.png"/> <span class="text-info font-weight-bold"><?php echo greenphat(); ?></span> (0 on 12/26/2018)<br/>
                    <img src="/img/items/677.png"/> <span class="text-info font-weight-bold"><?php echo eastereggs(); ?></span> (0 on 4/22/2019)<br/>
                    <img src="/img/items/828.png"/> <span class="text-info font-weight-bold"><?php echo greenmask(); ?></span> (0 on 11/1/2019)<br/>
                    <img src="/img/items/831.png"/> <span class="text-info font-weight-bold"><?php echo redmask(); ?></span> (0 on 11/1/2019)<br/>
                    <img src="/img/items/832.png"/> <span class="text-info font-weight-bold"><?php echo bluemask(); ?></span> (0 on 11/1/2019)<br/>
                    <img src="/img/items/971.png"/> <span class="text-info font-weight-bold"><?php echo santahat(); ?></span> (0 on 12/26/2019)<br/>
                    <img src="/img/items/1156.png"/> <span class="text-info font-weight-bold"><?php echo bunnyears(); ?></span> (0 on 4/22/2020)<br/>
                    <img src="/img/items/1289.png"/> <span class="text-info font-weight-bold"><?php echo scythe(); ?></span> (0 on 11/1/2020)<br/>
					<br/><br/><br/>
			</div>
		</div>
	</div>
</div>

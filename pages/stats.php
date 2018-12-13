<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}
?>
<div class="main">
    <div class="content">
        <article>
            <div class="panel">
                <div style="margin-left: 80px; margin-right: 80px; margin-top: 45px; margin-bottom: 45px; color: lightgrey; font-size: 18px;"
                     align="left">
                    <h4 style="color: #C6A444;">Accounts</h4>
                    <b><a class="white" href="/online"><?php echo playersOnline(); ?></a></b> players currently logged in.<br/>
                    <b><a class="white" href="/registrationstoday"><?php echo newRegistrationsToday(); ?></a></b> players have been registered today.<br/>
                    <b><a class="white" href="/loginstoday"><?php echo loginsToday(); ?></a></b> players logged in today.<br/>
                    <b><?php echo uniquePlayers(); ?></b> people have created <b><?php echo totalPlayers(); ?></b>
                    players.<br/>
                    <b><?php echo totalTime(); ?></b> total time played.<br/><br/>

                    <h4 style="color: #C6A444;">Combat</h4>
                    The highest combat level is <b><?php echo topcombat(); ?>.</b><br/>
                    <b><?php echo combat30(); ?></b> players over combat level 30.<br/>
                    <b><?php echo combat50(); ?></b> players over combat level 50.</b><br/>
                    <b><?php echo combat80(); ?></b> players over combat level 80.</b><br/>
                    <b><?php echo combat90(); ?></b> players over combat level 90.</b><br/>
                    <b><?php echo combat100(); ?></b> players over combat level 100.</b><br/>
                    <b><?php echo combat123(); ?></b> players are combat level 123.</b><br/><br/>

                    <h4 style="color: #C6A444;">Quests</h4>
                    <b><?php echo startedQuest(); ?></b> players have started at least one quest.<br/><br/>

                    <h4 style="color: #C6A444;">Wealth</h4>
                    <b><?php echo banktotalGold(); ?></b> gp total in-game.<br/>
                    <b><?php echo gold30(); ?></b> players have over 30K gp.<br/>
                    <b><?php echo gold50(); ?></b> players have over 50K gp.<br/>
                    <b><?php echo gold80(); ?></b> players have over 80K gp.<br/>
                    <b><?php echo gold120(); ?></b> players have over 120K gp.<br/>
                    <b><?php echo gold400(); ?></b> players have over 400K gp.<br/>
                    <b><?php echo gold1m(); ?></b> players have over 1M gp.<br/>
                    <b><?php echo gold12m(); ?></b> players have over 1.2M gp.<br/>
                    <b><?php echo gold15m(); ?></b> players have over 1.5M gp.<br/><br/>

                    <h4 style="color: #C6A444;">Expensive Items</h4>
					<a href="/itemdef/1278" target="_blank"><img src="/css/images/items/1278.png"/> <b><?php echo dsq(); ?></b></a><br/>
					<a href="/itemdef/795" target="_blank"><img src="/css/images/items/795.png"/> <b><?php echo dmed(); ?></b></a><br/>
					<a href="/itemdef/522" target="_blank"><img src="/css/images/items/522.png"/> <b><?php echo dammy(); ?></b></a><br/>
					<a href="/itemdef/597" target="_blank"><img src="/css/images/items/597.png"/> <b><?php echo chargeddammy(); ?></b></a><br/>
					<a href="/itemdef/594" target="_blank"><img src="/css/images/items/594.png"/> <b><?php echo dbattle(); ?></b></a><br/>
					<a href="/itemdef/593" target="_blank"><img src="/css/images/items/593.png"/> <b><?php echo dlong(); ?></b></a><br/><br/>

					<h4 style="color: #C6A444;">Important Items</h4>
					<a href="/itemdef/18" target="_blank"><img src="/css/images/items/18.png"/> <b><?php echo cabbage(); ?></b></a><br/>
					<a href="/itemdef/193" target="_blank"><img src="/css/images/items/193.png"/> <b><?php echo beer(); ?></b></a><br/><br/>

                    <h4 style="color: #C6A444;">Holiday Items</h4>
					<a href="/itemdef/422" target="_blank"><img src="/css/images/items/422.png"/> <b><?php echo pumpkins(); ?></b> (13,001 on 11/1/2018)</a><br/>
					<a href="/itemdef/575" target="_blank"><img src="/css/images/items/575.png"/> <b><?php echo crackers(); ?></b> (0 on 12/26/2018)</a><br/>
					<a href="/itemdef/577" target="_blank"><img src="/css/images/items/577.png"/> <b><?php echo yellowphat(); ?></b> (0 on 12/26/2018)</a><br/>
					<a href="/itemdef/581" target="_blank"><img src="/css/images/items/581.png"/> <b><?php echo whitephat(); ?></b> (0 on 12/26/2018)</a><br/>
					<a href="/itemdef/580" target="_blank"><img src="/css/images/items/580.png"/> <b><?php echo purplephat(); ?></b> (0 on 12/26/2018)</a><br/>
					<a href="/itemdef/576" target="_blank"><img src="/css/images/items/576.png"/> <b><?php echo redphat(); ?></b> (0 on 12/26/2018)</a><br/>
					<a href="/itemdef/578" target="_blank"><img src="/css/images/items/578.png"/> <b><?php echo bluephat(); ?></b> (0 on 12/26/2018)</a><br/>
					<a href="/itemdef/579" target="_blank"><img src="/css/images/items/579.png"/> <b><?php echo greenphat(); ?></b> (0 on 12/26/2018)</a><br/>
					<a href="/itemdef/677" target="_blank"><img src="/css/images/items/677.png"/> <b><?php echo eastereggs(); ?></b> (0 on 4/22/2019)</a><br/>
					<a href="/itemdef/828" target="_blank"><img src="/css/images/items/828.png"/> <b><?php echo greenmask(); ?></b> (0 on 11/1/2019)</a><br/>
					<a href="/itemdef/831" target="_blank"><img src="/css/images/items/831.png"/> <b><?php echo redmask(); ?></b> (0 on 11/1/2019)</a><br/>
					<a href="/itemdef/832" target="_blank"><img src="/css/images/items/832.png"/> <b><?php echo bluemask(); ?></b> (0 on 11/1/2019)</a><br/>
					<a href="/itemdef/971" target="_blank"><img src="/css/images/items/971.png"/> <b><?php echo santahat(); ?></b> (0 on 12/26/2019)</a><br/>
					<a href="/itemdef/1156" target="_blank"><img src="/css/images/items/1156.png"/> <b><?php echo bunnyears(); ?></b> (0 on 4/22/2020)</a><br/>
					<a href="/itemdef/1289" target="_blank"><img src="/css/images/items/1289.png"/> <b><?php echo scythe(); ?></b> (0 on 11/1/2020)</a><br/>
                </div>
            </div>
        </article>
    </div>
</div>

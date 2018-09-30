<?php
if(!defined('IN_PHPBB'))
{
    die("You do not have permission to access this file.");
}
?>
<div class="main">
    <div class="content">
        <div class="navbar" style="height: 5px; width: 100%;">
            <headerbar>
                <headerbar-sides><br /><br /></br /></br /></headerbar-sides>
            </headerbar>
        </div>
        <article>
            <div class="panel">
                <div style="margin-left: 80px; margin-right: 80px; margin-top: 45px; margin-bottom: 45px; color: lightgrey; font-size: 18px;" align="center"> <
                    <b><?php echo uniquePlayers(); ?></b> people have created <b><?php echo totalPlayers(); ?></b> players.<br />
                    The highest combat level is <b><?php echo topcombat(); ?>.</b><br />
                    <b><?php echo combat30(); ?></b> players are over combat level 30.<br />
                    <b><?php echo combat50(); ?></b> players are over combat level 50.</b><br />
                    <b><?php echo combat80(); ?></b> players are over combat level 80.</b><br />
                    <b><?php echo combat90(); ?></b> players are over combat level 90.</b><br />
                    <b><?php echo combat100(); ?></b> players are over combat level 100.</b><br />
                    <b><?php echo combat123(); ?></b> players have reached combat level 123.</b><br />
                    <b><?php echo startedQuest(); ?></b> players have attempted at least one quest.<br />
                    There is a total of <b><?php echo banktotalGold(); ?></b> gp in-game presently.<br />
                    <b><?php echo gold30(); ?></b> players have over 30K gp.<br />
                    <b><?php echo gold50(); ?></b> players have over 50K gp.<br />
                    <b><?php echo gold80(); ?></b> players have over 80K gp.<br />
                    <b><?php echo gold120(); ?></b> players have over 120K gp.<br />
                    <b><?php echo gold400(); ?></b> players have over 400K gp.<br />
                    <b><?php echo gold1m(); ?></b> players have over 1M gp.<br />
                    <b><?php echo gold12m(); ?></b> players have over 1.2M gp.<br />
                    <b><?php echo gold15m(); ?></b> players have over 1.5M gp.<br /><br />
                </div>
            </div>
        </article>
    </div>
</div>
<?php
if (!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}
?>
<div class="main">
    <div class="content">
        <div class="navbar" style="height: 5px; width: 100%;">
            <headerbar>
                <headerbar-sides><br/><br/><br/><br/></headerbar-sides>
            </headerbar>
        </div>
        <article>
            <div class="panel">
                <div style="margin-left: 80px; margin-right: 80px; margin-top: 45px; margin-bottom: 45px; color: lightgrey; font-size: 18px;"
                     align="center">
                    <h4 align="center">Players Logged In Today</h4>
                    <b><?php echo listloginsToday(); ?></b><br/><br/>
                </div>
            </div>
        </article>
    </div>
</div>
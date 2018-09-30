<?php

if(!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}

require_once($phpbb_root_path . 'common.' . $phpEx);
require_once($phpbb_root_path . 'includes/bbcode.' . $phpEx);
require_once($phpbb_root_path . 'includes/functions_display.' . $phpEx);
require_once($phpbb_root_path . 'config.' . $phpEx);

$phpbb_root_path = '../board/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
require($phpbb_root_path . 'config.' . $phpEx);

class OpenRSCDatabase {

    var $settings;

    function getSettings() {

// System variables
        //$settings['siteDir'] = $site;

        //return $settings;

    }

}

class Dbc extends OpenRSCDatabase {
    var $theQuery;
    var $link;
    function Dbc(){
        global $dbhost;
        global $dbuser;
        global $dbpasswd;
        global $dbname;
        global $dbport;
        global $table_prefix;
        global $dbms;
        $settings = OpenRSCDatabase::getSettings();
        $con=mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
        $this->link = mysqli_connect($dbhost, $dbuser, $dbpasswd);
        mysqli_select_db($con, $dbname);
        register_shutdown_function(array(&$this, 'close'));
    }

    function query($query) {
        global $dbhost;
        global $dbuser;
        global $dbpasswd;
        global $dbname;
        $this->theQuery = $query;
        $con=mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
        return mysqli_query($con, $query);
    }

    function gamequery($query) {
        global $dbhost;
        global $dbuser;
        global $dbpasswd;
        $this->theQuery = $query;
        $con=mysqli_connect($dbhost,$dbuser,$dbpasswd,"openrsc_game");
        return mysqli_query($con, $query);
    }

    function forumquery($query) {
        global $dbhost;
        global $dbuser;
        global $dbpasswd;
        $this->theQuery = $query;
        $con=mysqli_connect($dbhost,$dbuser,$dbpasswd,"openrsc_forum");
        return mysqli_query($con, $query);
    }

    function logquery($query) {
        global $dbhost;
        global $dbuser;
        global $dbpasswd;
        $this->theQuery = $query;
        $con=mysqli_connect($dbhost,$dbuser,$dbpasswd,"openrsc_game");
        return mysqli_query($con, $query);
    }

    function fetchArray($result) {
        return mysqli_fetch_assoc($result);
    }

    function fetchResult($result) {
        return mysqli_result($result);
    }

    function close() {
        mysqli_close($this->link);
    }
}

function checkStatus($ip, $port) {
    if(!$sock = @fsockopen($ip, "$port", $num, $error, 5)) {
        echo('<span style="color: red">Offline</span>');
    } else {
        echo('<span style="color: lime">Online</span>');
    }
}

function playersOnline() {
    $connector = new Dbc();
    $getPlayersOnline = $connector->gamequery("SELECT sum(online) AS `countOnline` FROM openrsc_game.openrsc_players WHERE online = '1'");
    while ($row = $connector->fetchArray($getPlayersOnline)) {
        if($row["countOnline"] == NULL) {
            echo "0";
        } else {
            echo $row["countOnline"];
        }
    }
}

function totalGameCharacters() {
    $connector = new Dbc();
    $game_accounts = $connector->gamequery("SELECT COUNT(*) AS `countPlayers` FROM openrsc_players");
    while ($row = $connector->fetchArray($game_accounts)) {
        if($row["countPlayers"] == NULL) {
            echo "0";
        } else {
            echo $row["countPlayers"];
        }
    }
}

function newRegistrationsToday() {
    $connector = new Dbc();
    $registrations_today = $connector->gamequery("SELECT COUNT(*) AS countUsers FROM users WHERE registered >= '".strtotime(date('Y-m-d', time()). '00:00:00')."'");
    while ($row = $connector->fetchArray($registrations_today)) {
        if($row["countUsers"] == NULL) {
            echo "0";
        } else {
            echo $row["countUsers"];
        }
    }
}

function gameChat() {
    $connector = new Dbc();
    $game_accounts = $connector->logquery("SELECT sender, message, time FROM openrsc_chat_logs ORDER BY time DESC LIMIT 1500");
    date_default_timezone_set('America/New_York');
    ?>
    <div style="font: 14px 'Exo', sans-serif; color: lightgrey;" >
            <?php while($row = $connector->fetchArray($game_accounts)) { ?>
                [<i><?php echo strftime("%m/%d/%Y - %I:%M %p", $row["time"]) ?></i>] <b><?php echo ucwords($row["sender"]) ?>:</b> <?php echo $row["message"] ?><br />
            <?php } ?>
    </div>
    <?php
}

function totalPlayers() {
    $connector = new Dbc();
    $totalPlayers = $connector->gamequery("SELECT COUNT(id) FROM openrsc_players");
    while ($row = $connector->fetchArray($totalPlayers)) {
        echo $row["COUNT(id)"];
    }
}

function uniquePlayers() {
    $connector = new Dbc();
    $uniquePlayers = $connector->gamequery("SELECT COUNT(DISTINCT creation_ip) AS Count FROM openrsc_players");
    while ($row = $connector->fetchArray($uniquePlayers)) {
        echo $row["Count"];
    }
}

function topcombat() {
    $connector = new Dbc();
    $topcombat = $connector->gamequery("SELECT combat FROM openrsc_players ORDER BY openrsc_players.combat DESC LIMIT 1");
    while ($row = $connector->fetchArray($topcombat)) {
        echo $row["combat"];
    }
}

function combat30() {
    $connector = new Dbc();
    $combat30 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 30");
    while ($row = $connector->fetchArray($combat30)) {
        echo $row["COUNT(combat)"];
    }
}

function combat50() {
    $connector = new Dbc();
    $combat50 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 50");
    while ($row = $connector->fetchArray($combat50)) {
        echo $row["COUNT(combat)"];
    }
}

function combat80() {
    $connector = new Dbc();
    $combat80 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 80");
    while ($row = $connector->fetchArray($combat80)) {
        echo $row["COUNT(combat)"];
    }
}

function combat90() {
    $connector = new Dbc();
    $combat90 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 90");
    while ($row = $connector->fetchArray($combat90)) {
        echo $row["COUNT(combat)"];
    }
}

function combat100() {
    $connector = new Dbc();
    $combat100 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 100");
    while ($row = $connector->fetchArray($combat100)) {
        echo $row["COUNT(combat)"];
    }
}

function combat123() {
    $connector = new Dbc();
    $combat123 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 123");
    while ($row = $connector->fetchArray($combat123)) {
        echo $row["COUNT(combat)"];
    }
}

function startedQuest() {
    $connector = new Dbc();
    $startedQuest = $connector->gamequery("SELECT COUNT(DISTINCT playerID) FROM `openrsc_quests`");
    while ($row = $connector->fetchArray($startedQuest)) {
        echo $row["COUNT(DISTINCT playerID)"];
    }
}

function banktotalGold() {
    $connector = new Dbc();
    $banktotalGold = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, format(SUM(B.amount), 0) AS count FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 ORDER BY B.amount DESC ");
    while ($row = $connector->fetchArray($banktotalGold)) {
        echo $row["count"];
    }
}

function maxGold() {
    $connector = new Dbc();
    $maxGold = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, format(B.amount, 0) as count FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND A.group_id = 4 ORDER BY B.amount DESC LIMIT 5");
    while ($row = $connector->fetchArray($maxGold)) {
        echo $row["username"];
        echo ': ';
        echo $row["count"];
        echo ' gp<br />';
    }
}

function gold30() {
    $connector = new Dbc();
    $gold30 = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 30000");
    while ($row = $connector->fetchArray($gold30)) {
        echo $row["COUNT(B.amount)"];
    }
}

function gold50() {
    $connector = new Dbc();
    $gold50 = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 50000");
    while ($row = $connector->fetchArray($gold50)) {
        echo $row["COUNT(B.amount)"];
    }
}

function gold80() {
    $connector = new Dbc();
    $gold80 = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 80000");
    while ($row = $connector->fetchArray($gold80)) {
        echo $row["COUNT(B.amount)"];
    }
}

function gold120() {
    $connector = new Dbc();
    $gold120 = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 120000");
    while ($row = $connector->fetchArray($gold120)) {
        echo $row["COUNT(B.amount)"];
    }
}

function gold400() {
    $connector = new Dbc();
    $gold400 = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 400000");
    while ($row = $connector->fetchArray($gold400)) {
        echo $row["COUNT(B.amount)"];
    }
}

function gold1m() {
    $connector = new Dbc();
    $gold1m = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 1000000");
    while ($row = $connector->fetchArray($gold1m)) {
        echo $row["COUNT(B.amount)"];
    }
}

function gold12m() {
    $connector = new Dbc();
    $gold12m = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 1200000");
    while ($row = $connector->fetchArray($gold12m)) {
        echo $row["COUNT(B.amount)"];
    }
}

function gold15m() {
    $connector = new Dbc();
    $gold15m = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 1500000");
    while ($row = $connector->fetchArray($gold15m)) {
        echo $row["COUNT(B.amount)"];
    }
}
?>

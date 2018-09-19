<?php

if(!defined('IN_PHPBB')) {
    die("You do not have permission to access this file.");
}

require_once($phpbb_root_path . 'common.' . $phpEx);
require_once($phpbb_root_path . 'includes/bbcode.' . $phpEx);
require_once($phpbb_root_path . 'includes/functions_display.' . $phpEx);
require_once($phpbb_root_path . 'config.' . $phpEx);

$phpbb_root_path = './board/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
require($phpbb_root_path . 'config.' . $phpEx);

class OpenRSCDatabase {

    var $settings;

    function getSettings() {

// System variables
        $settings['siteDir'] = $site;

        return $settings;

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
        echo('offline');
    } else {
        echo('online');
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
?>
<?php

if (!defined('IN_SITE')) {
	die();
}

include "config.php";

class Dbc
{
	var $theQuery;
	var $link;

	function __construct()
	{
		global $dbhost;
		global $dbuser;
		global $dbpasswd;
		global $dbname;
		$con = mysqli_connect($dbhost, $dbuser, $dbpasswd, $dbname);
		$this->link = mysqli_connect($dbhost, $dbuser, $dbpasswd);
		mysqli_select_db($con, $dbname);
		register_shutdown_function(array(&$this, 'close'));
	}

	function query($query)
	{
		global $dbhost;
		global $dbuser;
		global $dbpasswd;
		global $dbname;
		$this->theQuery = $query;
		$con = mysqli_connect($dbhost, $dbuser, $dbpasswd, $dbname);
		return mysqli_query($con, $query);
	}

	function gamequery($query)
	{
		global $dbhost;
		global $dbuser;
		global $dbpasswd;
		$this->theQuery = $query;
		$con = mysqli_connect($dbhost, $dbuser, $dbpasswd, "openrsc_game");
		return mysqli_query($con, $query);
	}

	function forumquery($query)
	{
		global $dbhost;
		global $dbuser;
		global $dbpasswd;
		$this->theQuery = $query;
		$con = mysqli_connect($dbhost, $dbuser, $dbpasswd, "openrsc_forum");
		return mysqli_query($con, $query);
	}

	function logquery($query)
	{
		global $dbhost;
		global $dbuser;
		global $dbpasswd;
		$this->theQuery = $query;
		$con = mysqli_connect($dbhost, $dbuser, $dbpasswd, "openrsc_game");
		return mysqli_query($con, $query);
	}

	function fetchArray($result)
	{
		return mysqli_fetch_assoc($result);
	}

	function fetch_assoc($result)
	{
		return mysqli_fetch_assoc($result);
	}

	function fetchResult($result)
	{
		return mysqli_result($result);
	}

	function num_rows($result)
	{
		return mysqli_num_rows($result);
	}

	function close()
	{
		mysqli_close($this->link);
	}
}

function checkStatus($ip, $port)
{
	if (!$sock = @fsockopen($ip, "$port", $num, $error, 5)) {
		echo('<span style="red">Offline</span>');
	} else {
		echo('<span style="color: lime">Online</span>');
	}
}

function playersOnline()
{
	$connector = new Dbc();
	$getPlayersOnline = $connector->gamequery("SELECT sum(online) AS `countOnline` FROM openrsc_game.openrsc_players WHERE online = '1'");
	while ($row = $connector->fetchArray($getPlayersOnline)) {
		if ($row["countOnline"] == NULL || $row["countOnline"] == 0) {
			echo "0";
		} else {
			echo $row["countOnline"];
		}
	}
}

function totalGameCharacters()
{
	$connector = new Dbc();
	$game_accounts = $connector->gamequery("SELECT COUNT(*) AS `countPlayers` FROM openrsc_players");
	while ($row = $connector->fetchArray($game_accounts)) {
		if ($row["countPlayers"] == NULL) {
			echo "0";
		} else {
			echo number_format($row["countPlayers"]);
		}
	}
}

function onlinePlayers()
{
	$connector = new Dbc();
	$game_accounts = $connector->gamequery("SELECT id, username, group_id FROM openrsc_players WHERE online = '1' LIMIT 100");
	while ($row = $connector->fetchArray($game_accounts)) {
		if ($row["username"] == NULL) {
			echo "No players currently online.";
		} else {
			echo '<div class="clickable-row" data-href="../player/' . $row["id"] . '">';
			echo '<div class="d-inline-block">';
			if ($row['group_id'] != 10):
				echo '<img src="../img/' . $row["group_id"] . '.svg" width="15" height="15"> ';
			else: NULL; endif;
			echo ucfirst($row["username"]);
			echo '</div>';
			echo '</div>';
		}
	}
}

function newRegistrationsToday()
{
	$connector = new Dbc();
	$registrations_today = $connector->gamequery("SELECT COUNT(*) AS countUsers FROM openrsc_players WHERE creation_date >= unix_timestamp( current_date - interval 1 day )");
	while ($row = $connector->fetchArray($registrations_today)) {
		if ($row["countUsers"] == NULL) {
			echo "0";
		} else {
			echo $row["countUsers"];
		}
	}
}

function listregistrationsToday()
{
	$connector = new Dbc();
	$registrations_today = $connector->gamequery("SELECT id, username, group_id FROM openrsc_players WHERE creation_date >= unix_timestamp( current_date - interval 1 day )");
	while ($row = $connector->fetchArray($registrations_today)) {
		if ($row["username"] == NULL) {
			echo "No players have been created today.";
		} else {
			echo '<div class="clickable-row" data-href="../player/' . $row["id"] . '">';
			echo '<div class="d-inline-block">';
			if ($row['group_id'] != 10):
				echo '<img src="../img/' . $row["group_id"] . '.svg" width="15" height="15"> ';
			else: NULL; endif;
			echo ucfirst($row["username"]);
			echo '</div>';
			echo '</div>';
		}
	}
}

function logins48()
{
	$connector = new Dbc();
	$logins48 = $connector->gamequery("SELECT COUNT(*) AS countUsers FROM openrsc_players WHERE login_date >= unix_timestamp( current_date - interval 48 hour )");
	while ($row = $connector->fetchArray($logins48)) {
		if ($row["countUsers"] == NULL) {
			echo "0";
		} else {
			echo $row["countUsers"];
		}
	}
}

function listlogins48()
{
	$connector = new Dbc();
	$logins48 = $connector->gamequery("SELECT id, username, group_id FROM openrsc_players WHERE login_date >= unix_timestamp( current_date - interval 48 hour )");
	while ($row = $connector->fetchArray($logins48)) {
		if ($row["username"] == NULL) {
			echo "No players have logged in for the last 48 hours.";
		} else {
			echo '<div class="clickable-row" data-href="../player/' . $row["id"] . '">';
			echo '<div class="d-inline-block">';
			if ($row['group_id'] != 10):
				echo '<img src="../img/' . $row["group_id"] . '.svg" width="15" height="15"> ';
			else: NULL; endif;
			echo ucfirst($row["username"]);
			echo '</div>';
			echo '</div>';
		}
	}
}

function arrav()
{
	$connector = new Dbc();
	$arrav = $connector->gamequery("SELECT id, username, A.group_id AS group_id, value FROM openrsc_player_cache AS B LEFT JOIN openrsc_players AS A ON B.playerID = A.id WHERE B.key = 'arrav_gang' AND A.banned = '0' AND A.group_id > 1");
	while ($row = $connector->fetchArray($arrav)) {
		if (mysqli_num_rows($arrav) === 0) {
			echo 'No players are in a gang.';
		} else {
			$gang = $row["value"];
			$player = ucfirst($row["username"]);
			if ($gang == 0) {
				$pick = 'Black Arm';
			} else {
				$pick = 'Phoenix';
			}
			echo '<div class="clickable-row" data-href="../player/' . $row["id"] . '">';
			echo '<div class="d-inline-block">';
			if ($row['group_id'] != 10):
				echo '<img src="../img/' . $row["group_id"] . '.svg" width="10" height="9" style="margin-bottom: 3px"> ';
			else: NULL; endif;
			echo '<span class="text-info">' . $player . ':</span> ' . $pick;
			echo '</div>';
			echo '</div>';
		}
	}
}

function totalPlayers()
{
	$connector = new Dbc();
	$totalPlayers = $connector->gamequery("SELECT COUNT(id) FROM openrsc_players");
	while ($row = $connector->fetchArray($totalPlayers)) {
		echo $row["COUNT(id)"];
	}
}

function uniquePlayers()
{
	$connector = new Dbc();
	$uniquePlayers = $connector->gamequery("SELECT COUNT(DISTINCT creation_ip) AS Count FROM openrsc_players");
	while ($row = $connector->fetchArray($uniquePlayers)) {
		echo number_format($row["Count"]);
	}
}

function topcombat()
{
	$connector = new Dbc();
	$topcombat = $connector->gamequery("SELECT combat FROM openrsc_players WHERE group_id > '1' AND banned = '0' ORDER BY openrsc_players.combat DESC LIMIT 1");
	while ($row = $connector->fetchArray($topcombat)) {
		echo $row["combat"];
	}
}

function combat30()
{
	$connector = new Dbc();
	$combat30 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 30 AND group_id > '1' AND banned = '0'");
	while ($row = $connector->fetchArray($combat30)) {
		echo $row["COUNT(combat)"];
	}
}

function combat50()
{
	$connector = new Dbc();
	$combat50 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 50 AND group_id > '1' AND banned = '0'");
	while ($row = $connector->fetchArray($combat50)) {
		echo $row["COUNT(combat)"];
	}
}

function combat80()
{
	$connector = new Dbc();
	$combat80 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 80 AND group_id > '1' AND banned = '0'");
	while ($row = $connector->fetchArray($combat80)) {
		echo $row["COUNT(combat)"];
	}
}

function combat90()
{
	$connector = new Dbc();
	$combat90 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 90 AND group_id > '1' AND banned = '0'");
	while ($row = $connector->fetchArray($combat90)) {
		echo $row["COUNT(combat)"];
	}
}

function combat100()
{
	$connector = new Dbc();
	$combat100 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 100 AND group_id > '1' AND banned = '0'");
	while ($row = $connector->fetchArray($combat100)) {
		echo $row["COUNT(combat)"];
	}
}

function combat123()
{
	$connector = new Dbc();
	$combat123 = $connector->gamequery("SELECT COUNT(combat) FROM openrsc_players WHERE combat >= 123 AND group_id > '1' AND banned = '0'");
	while ($row = $connector->fetchArray($combat123)) {
		echo $row["COUNT(combat)"];
	}
}

function startedQuest()
{
	$connector = new Dbc();
	$startedQuest = $connector->gamequery("SELECT COUNT(DISTINCT playerID) FROM `openrsc_quests`");
	while ($row = $connector->fetchArray($startedQuest)) {
		echo $row["COUNT(DISTINCT playerID)"];
	}
}

function banktotalGold()
{
	$connector = new Dbc();
	$banktotalGold = $connector->gamequery("SELECT A.id, A.username, A.group_id, A.banned, B.playerID, B.id, format(SUM(B.amount), 0) AS count FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($banktotalGold)) {
		echo $row["count"] . ' gp';
	}
}

function gold30()
{
	$connector = new Dbc();
	$gold30 = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 30000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold30)) {
		echo $row["COUNT(B.amount)"];
	}
}

function gold50()
{
	$connector = new Dbc();
	$gold50 = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 50000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold50)) {
		echo $row["COUNT(B.amount)"];
	}
}

function gold80()
{
	$connector = new Dbc();
	$gold80 = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 80000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold80)) {
		echo $row["COUNT(B.amount)"];
	}
}

function gold120()
{
	$connector = new Dbc();
	$gold120 = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 120000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold120)) {
		echo $row["COUNT(B.amount)"];
	}
}

function gold400()
{
	$connector = new Dbc();
	$gold400 = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 400000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold400)) {
		echo $row["COUNT(B.amount)"];
	}
}

function gold1m()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 1000000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold1m)) {
		echo $row["COUNT(B.amount)"];
	}
}

function gold12m()
{
	$connector = new Dbc();
	$gold12m = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 1200000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold12m)) {
		echo $row["COUNT(B.amount)"];
	}
}

function gold15m()
{
	$connector = new Dbc();
	$gold15m = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 1500000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold15m)) {
		echo $row["COUNT(B.amount)"];
	}
}

function gold2m()
{
	$connector = new Dbc();
	$gold15m = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 2000000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold15m)) {
		echo $row["COUNT(B.amount)"];
	}
}

function gold4m()
{
	$connector = new Dbc();
	$gold15m = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 4000000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold15m)) {
		echo $row["COUNT(B.amount)"];
	}
}

function gold10m()
{
	$connector = new Dbc();
	$gold15m = $connector->gamequery("SELECT A.id, A.username, A.group_id, B.playerID, B.id, COUNT(B.amount) FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = 10 AND B.amount >= 10000000 AND A.group_id > '1' AND A.banned = '0'");
	while ($row = $connector->fetchArray($gold15m)) {
		echo $row["COUNT(B.amount)"];
	}
}

function pumpkins()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '422' AND A.group_id > '1' AND A.banned = '0'
    union all
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '422' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function crackers()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '575' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '575s' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function yellowphat()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '577' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '577' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function whitephat()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '581' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '581' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function purplephat()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '580' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '580' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function redphat()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '576' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '576' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function bluephat()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '578' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '578' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function greenphat()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '579' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '579' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function eastereggs()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '677' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '677' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function greenmask()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '828' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '828' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function redmask()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '831' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '831' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function bluemask()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '832' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '832' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function santahat()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '971' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '971' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function bunnyears()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '1156' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '1156' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function scythe()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '1289' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '1289' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function dsq()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '1278' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '1278' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function dmed()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '795' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '795' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function dammy()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '522' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '522' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function chargeddammy()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '597' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '597' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function dbattle()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '594' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '594' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function dlong()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '593' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '593' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function cabbage()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '193' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '193' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function beer()
{
	$connector = new Dbc();
	$gold1m = $connector->gamequery("SELECT format(SUM(amt), 0) as amt from (
    SELECT SUM(B.amount) amt FROM openrsc_bank as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '18' AND A.group_id > '1' AND A.banned = '0'
    union all 
    SELECT SUM(B.amount) amt FROM openrsc_invitems as B LEFT JOIN openrsc_players as A ON B.playerID = A.id WHERE B.id = '18' AND A.group_id > '1' AND A.banned = '0') a");
	while ($row = $connector->fetchArray($gold1m)) {
		if ($row["amt"] == NULL) {
			echo "0";
		} else {
			echo $row["amt"];
		}
	}
}

function totalTime()
{
	$connector = new Dbc();
	$totalTime = $connector->gamequery("SELECT SUM(`value`) FROM `openrsc_player_cache` WHERE `openrsc_player_cache`.`key` = 'total_played'");
	while ($row = $connector->fetchArray($totalTime)) {
		$time = $row["SUM(`value`)"] / 1000;
		$days = floor($time / (24 * 60 * 60));
		$hours = floor(($time - ($days * 24 * 60 * 60)) / (60 * 60));
		$minutes = floor(($time - ($days * 24 * 60 * 60) - ($hours * 60 * 60)) / 60);
		$seconds = ($time - ($days * 24 * 60 * 60) - ($hours * 60 * 60) - ($minutes * 60)) % 60;
		echo $days . 'd ' . $hours . 'h ';
	}
}

function activityfeed()
{
	$connector = new Dbc();
	$game_accounts = $connector->gamequery("SELECT B.id, A.group_id, B.username, B.message, B.time, A.id AS pid, A.username FROM openrsc_live_feeds as B LEFT JOIN openrsc_players as A on B.username = A.username ORDER BY B.time DESC LIMIT 100");
	date_default_timezone_set('America/New_York');
	while ($row = $connector->fetchArray($game_accounts)) {
		if ($row["username"] == NULL) {
			echo "No players activity.";
		} else {
			echo '<div class="text-primary ml-3 mr-3 pt-3" style="font-size: 13px;">
					<div class="row clickable-row" data-href="../player/' . $row["pid"] . '">
						<div class="col-sm text-info font-weight-bold">
							' . strftime("%b %d, %I:%M %p", $row["time"]) . '
						</div>
						<div class="col-9 pr-1 pl-1">';
							if ($row['group_id'] != 10):
								echo '<img class="mb-1" src="../img/' . $row["group_id"] . '.svg" width="9" height="9"> ';
							endif;
							echo '
							<img class="pr-2 float-left" src="https://game.openrsc.com/avatars/' . $row["pid"] . '.png" width="36" height="48" onerror="this.style.display=\'none\'">
							<span class="font-weight-bold">' . ucfirst($row["username"]) . '</span> ' . $row["message"] . '
						</div>
					</div>
					<div class="border-top border-info mt-3"></div>
				</div>';
		}
	}
}

function gameChat()
{
	$connector = new Dbc();
	$game_accounts = $connector->logquery("SELECT A.id playerID, A.group_id, B.sender, B.message, B.time FROM openrsc_chat_logs AS B LEFT JOIN openrsc_players AS A ON B.sender = A.username ORDER BY B.time DESC LIMIT 500");
	date_default_timezone_set('America/New_York');
	?>
	<article class="text-info table-dark full-width">
		<div class="container border-left border-info border-right table-wrapper-scroll-y">
			<h2 class="h2 text-center pt-5 pb-5 text-capitalize display-3">Recent Chat</h2>
			<input type="text" class="pl-2 mb-2" id="inputBox" onkeyup="search()" placeholder="Search for an player">
			<div class="tableFixHead">
				<table id="itemList"
					   class="small container table-responsive-lg table-striped table-hover table-dark text-primary"
					   align="center">
					<tbody>
					<?php while ($row = $connector->fetchArray($game_accounts)) {
						$idLink = preg_replace("/[^A-Za-z0-9]/", "-", $row['playerID']);
						date_default_timezone_set('America/New_York'); ?>
						<tr class="small clickable-row" data-href="../player/<?php echo $row['playerID'] ?>">
							<td class="text-capitalize pl-2"
								style="color: #F5FA3C; text-shadow: 1px 1px black;">
								<?php if ($row['group_id'] != 10):
									echo '<img class="mb-1" src="../img/' . $row["group_id"] . '.svg" width="10" height="10"> ';
								endif; ?>
								<?php echo $row['sender'] ?>
							</td>
							<td>
								<img class="pr-2 float-left"
									 src="https://game.openrsc.com/avatars/<?php echo $row["playerID"] ?>.png"
									 width="36"
									 height="48" onerror="this.style.display='none'">
							</td>
							<td class="text-monospace text-white-50 pt-2">
								<?php echo strftime("%b %d, %I:%M %p", $row["time"]) ?>
							</td>
							<td style="color: #F5FA3C; text-shadow: 1px 1px black;">
								<?php echo $row["message"] ?>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</article>
	<?php
}

?>

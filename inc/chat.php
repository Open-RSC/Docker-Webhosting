<?php
define('IN_PHPBB', true);

$phpbb_root_path = '../board/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
require($phpbb_root_path . 'config.' . $phpEx);
require_once($phpbb_root_path . 'common.' . $phpEx);
require_once($phpbb_root_path . 'includes/bbcode.' . $phpEx);
require_once($phpbb_root_path . 'includes/functions_display.' . $phpEx);
require_once($phpbb_root_path . 'config.' . $phpEx);

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

    function close()
    {
        mysqli_close($this->link);
    }

}

function gameChat()
{
    $connector = new Dbc();
    $game_accounts = $connector->logquery("SELECT A.id playerID, B.sender, B.message, B.time FROM openrsc_chat_logs AS B LEFT JOIN openrsc_players AS A ON B.sender = A.username WHERE B.time >= unix_timestamp( current_date - interval 5 day ) ORDER BY B.time DESC LIMIT 10000");
    date_default_timezone_set('America/New_York');
    ?>
    <div style="font: 14px 'Exo', sans-serif; color: lightgrey;">
        <style type="text/css">
            A:link { COLOR: white; TEXT-DECORATION: none; font-weight: normal }
            A:visited { COLOR: white; TEXT-DECORATION: none; font-weight: normal }
            A:active { COLOR: white; TEXT-DECORATION: none }
            A:hover { COLOR: #C6A444; TEXT-DECORATION: none; font-weight: none }
        </style>
        <?php while ($row = $connector->fetchArray($game_accounts)) {
            $idLink = preg_replace("/[^A-Za-z0-9]/", "-", $row['playerID']);
            ?>
            [<b><?php date_default_timezone_set('America/New_York'); echo strftime("%d %b / %I:%M:%S %p %Z", $row["time"]) ?></b>]
            [<b><a href="/characters/<?php echo $idLink ?>" target="_blank"><?php echo ucwords($row["sender"]) ?></a></b>] <?php echo $row["message"] ?><br/>
        <?php } ?>
    </div>
    <?php
}

?>

<!doctype html>
<html>
<head>
    <title>Open RSC</title>
</head>

<h4>
    <b>
        <?php echo gameChat(); ?>
    </b>
</h4>
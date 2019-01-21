<?php
define('IN_SITE', true);
require_once 'charfunctions.php';
require_once 'peoplesignClient.php';
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

if (!$_POST) {
    die("You do not have permission to access this file.");
}

$skill_array = array('attack', 'strength', 'defense', 'hits', 'ranged', 'prayer', 'magic', 'cooking', 'woodcut', 'fletching', 'fishing', 'firemaking', 'crafting', 'smithing', 'mining', 'herblaw', 'agility', 'thieving');

function buildSQLArray($array)
{
    $SQLarray = '';
    $size = sizeof($array) - 1;
    $i = 0;
    while ($i <= $size) {
        $SQLarray .= ($array[$i] == 'total_lvl') ? '' : (($array[$i] == 'hitpoints') ? 'exp_hits,' : 'exp_' . $array[$i] . '' . (($i == $size) ? '' : ',') . '');
        $i++;
    }
    return $SQLarray;
}

//$connector = new Dbc();

if ($_POST['nm']) {
    $username = $_POST['nm'];
    $password = $_POST['pw'];

    //$username = mysqli_real_escape_string($username);
    $username = preg_replace("/[^A-Za-z0-9 ]/", " ", $username);

    //$user_result = $connector->gamequery("SELECT username FROM openrsc_players WHERE username='$username'");
    $num_users_row = mysqli_num_rows($user_result);

    if ($num_users_row != 0) {
        echo 0;
    } else {
        if (strlen($username) >= 12 || strlen($username) <= 4) {
        }
        if (strlen($password) <= 5) {
        }
        if (strlen($username) >= 12 || strlen($username) <= 4 || strlen($password) <= 5) {
        } else {
            $time = time();
            $gamepass = sha1($password);
            $gamename = explode('.', $username);
            $connector->gamequery("INSERT INTO `openrsc_curstats`(`playerID`) VALUES ('" . $user->data['user_id'] . "')");
            $connector->gamequery("INSERT INTO `openrsc_experience`(`playerID`) VALUES ('" . $user->data['user_id'] . "')");
            $connector->gamequery("INSERT INTO `openrsc_players`(`username`, `owner`, `pass`, `creation_date`, `creation_ip`) VALUES ('" . $username . "', '" . $user->data['user_id'] . "', '" . $gamepass . "', '" . $time . "', '" . $_SERVER['REMOTE_ADDR'] . "')");
            echo 1;
        }
    }

} else if ($_POST["ver"]) {
    $user_i = $_POST["id"];
    $user_ui = $_POST["username"];
    $ver = $_POST["ver"];

    if (strtolower($ver) != 'yes') {
        echo 0;
    } else {
        //$user_check = $connector->gamequery("SELECT * FROM openrsc_players WHERE id='$user_i'");
        $check = $connector->fetchArray($user_check);
        if ($user_i == $user->data['user_id']) {
            if ($check['group_id'] == 1) {
                echo 2;
            } else {
                $connector->gamequery("DELETE FROM openrsc_players WHERE username = '" . $user_ui . "'");
                $connector->gamequery("DELETE FROM openrsc_curstats WHERE playerID = '" . $user_i . "'");
                $connector->gamequery("DELETE FROM openrsc_experience WHERE playerID = '" . $user_i . "'");
                $connector->gamequery("DELETE FROM openrsc_invitems WHERE playerID = '" . $user_i . "'");
                $connector->gamequery("DELETE FROM openrsc_quests WHERE playerID = '" . $user_i . "'");
                $connector->gamequery("DELETE FROM openrsc_friends WHERE playerID = '" . $user_i . "'");
                $connector->gamequery("DELETE FROM openrsc_ignores WHERE playerID = '" . $user_i . "'");
                $connector->gamequery("DELETE FROM openrsc_bank WHERE playerID = '" . $user_i . "'");
                echo 3;
            }
        } else {
            echo 1;
        }
    }

} else if ($_POST["username"]) {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $combat = $_POST["combat"];
    $owner = $_POST["owner"];
    $online = $_POST["online"];

    $id = preg_replace("/[^A-Za-z0-9]/", "-", $id);

    $skills = buildSQLArray($skill_array);
    //$user_check = $connector->gamequery("SELECT " . $skills . ", openrsc_players.owner FROM openrsc_players LEFT JOIN openrsc_experience ON openrsc_players.id = openrsc_experience.playerID WHERE openrsc_players.id= '$id'");
    $check = $connector->fetchArray($user_check);

    //$character_result = $connector->gamequery("SELECT " . $skills . ", openrsc_players.* FROM openrsc_experience LEFT JOIN openrsc_players ON openrsc_experience.playerID = openrsc_players.id WHERE openrsc_players.id = '$id'");
    $character = $connector->fetchArray($character_result);

    if ($check['owner'] == $user->data['user_id'] && $user->data['group_id'] == '5') { //breaks so that nobody can access this on production
        ?>
        <!--<div id="character">
            <?php
        //$file = 'https://game.openrsc.com/avatars/' . $id . '.png';
        //echo "<br /><img src=\"$file\"/>";
        ?>
        </div>-->

        <div id="hero-page-details">
            <br/>
            <span class="sm-stats"><?php echo $username; ?></span>
            <span class="sm-stats">Combat Level: <?php echo $combat; ?></span>
            <!--<span class="sm-stats"><a href="/characters/<?php //echo $id; ?>">View Skill Levels</a></span>-->
            <?php if ($online == 1) {
                echo '<span id="green">Online</span>';
            } else {
                echo '<span id="red">Offline</span>';
            } ?>
        </div>
        <div id="button-links">
            <a id="inline" href="#<?php echo ($online == 1) ? 'error' : 'pass'; ?>" class="button">Change Password</a>
            <div style="display:none">
                <div id="pass">
                    <h4>Change Password</h4>
                    <p>Change <?php echo $username; ?>'s password</p>

                </div>
            </div>
            <a id="inline" href="#<?php echo ($online == 1) ? 'error' : 'delete'; ?>" class="button">Delete Account</a>
            <div style="display:none">
                <div id="delete">
                    <h4>Delete character</h4>
                    <p>Are you sure you want to delete <?php echo $username; ?>?</p>
                    <div id="verification-fails" style="display:none;">Verification Failed...</div>
                    <form method="post" action="" id="character-delete-form">
                        <label for="username">Verification: (Type 'yes' without quotations into the box
                            below)</label><input type="text" name="verification" class="name" id="verification"/>
                        <input type="hidden" id="user-i" value="<?php echo $id; ?>"/>
                        <input type="hidden" id="user-ui" value="<?php echo $username; ?>"/>
                        <input type="submit" value="Delete" name="create" class="submit"/>
                    </form>
                </div>
            </div>
        </div>

        <div style="display:none">
            <div id="error">
                <h4>Error</h4>
                <p>You must be logged out before you can delete/modify this account</p>
            </div>
        </div>
        <?php
    } else {
        echo "<p>Sorry this is not your account to modify</p>";
    }

}
?>

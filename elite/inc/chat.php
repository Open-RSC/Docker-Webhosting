<?php
define('IN_PHPBB', true);
$phpbb_root_path = '../board/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
$page = $_SERVER['PHP_SELF'];

require_once ($phpbb_root_path . 'common.' . $phpEx);
require_once ($phpbb_root_path . 'includes/bbcode.' . $phpEx);
require_once ($phpbb_root_path . 'includes/functions_display.' . $phpEx);
require_once ($phpbb_root_path . 'config.' . $phpEx);
require_once ('database_config.php');
require_once ('charfunctions.php');

// Start session
$user->session_begin();
$auth->acl($user->data);
$user->setup('viewforum');

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
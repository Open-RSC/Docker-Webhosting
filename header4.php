<?php
define('IN_PHPBB', true);
$phpbb_root_path = './board/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
$page = $_SERVER['PHP_SELF'];

require($phpbb_root_path . 'common.' . $phpEx);
require($phpbb_root_path . 'includes/bbcode.' . $phpEx);
require($phpbb_root_path . 'includes/functions_display.' . $phpEx);
require($phpbb_root_path . 'config.' . $phpEx);
require 'inc/db.php';
require 'inc/dataconversions.php';

// Start session
$user->session_begin();
$auth->acl($user->data);
$user->setup('viewforum'); 

$sec = "10"; //page refresh time in seconds
?>

<!doctype html>
<html>

	<head>
		<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
		<title>Open RSC</title>
	</head>
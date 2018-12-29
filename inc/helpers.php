<?php
function curPageURL()
{
    $pageUrl = $_SERVER["REQUEST_URI"];
    $page = explode("/", $pageUrl);
	$pos = strpos($page[1], 'index.php');
	if ($pos !== false) {
		$return = 'index.php';
	} else if ($page[2]) {
		$return = array($page[1], $page[2]);
	} else {
		$return = $page[1];
	}
	return $return;
}

define('IN_PHPBB', true);
error_reporting(1);

require_once('database_config.php');
require_once('charfunctions.php');
?>

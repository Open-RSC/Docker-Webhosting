<?php
if(!defined('IN_PHPBB'))
{
	die("You do not have permission to access this file.");
}

class DarscapeDatabase {

var $settings;

function getSettings() {

// System variables
$settings['siteDir'] = $site;

// Database variables
$settings['dbhost'] = 'mysql';
$settings['dbusername'] = 'root';
$settings['dbpassword'] = 'root';
$settings['dbname'] = 'openrsc_game';

return $settings;

}
 
}
?>
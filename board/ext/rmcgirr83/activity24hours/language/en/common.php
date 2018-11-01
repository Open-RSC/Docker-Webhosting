<?php

/**
*
*
* @package - Activity 24 hours
* @copyright (c) 2015 RMcGirr83
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
// Some characters you may want to copy&paste:
// ’ » “ ” …

$lang = array_merge($lang, array(
	'BOTS_24HOUR_TOTAL'	=> array(
		1 => '%d bot',
		2 => '%d bots',
	),
	'USERS_24HOUR_TOTAL'	=>  '%d registered,',
	'HIDDEN_24HOUR_TOTAL'	=> ' %d hidden, ',
	'GUEST_ONLINE_24'		=> array(
		1 => ' and %d guest',
		2 => ' and %d guests',
	),
	'LAST_24_HOURS'	=> ' active over the last 24 hours',
	'24HOUR_TOPICS'			=> 'New topics %d',
	'24HOUR_POSTS'			=> 'New posts %d',
	'24HOUR_USERS'			=> 'New users %d',
	'NO_ONLINE_BOTS'		=> 'No Bots active',

	'TWENTYFOURHOUR_STATS'	=> 'Activity over the last 24 hours',
	'TOTAL_24HOUR_USERS'	=> array(
		1 => 'In total there was %d user :: ',
		2 => 'In total there were %d users :: ',
	),
));

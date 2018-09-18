<?php
/**
*
* User Recent Activity extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ACP_USER_RECENT_ACTIVITY_TITLE'	=> 'User Recent Activity',
	'ACP_SETTINGS'						=> 'Settings',

	'ACP_USER_RECENT_ACTIVITY_SETTING_SAVED'	=> 'User Recent Activity Extension settings has been successfully changed.',

	'ALLOW_USER_RECENT_ACTIVITY'			=> 'Allow user recent activity',
	'ALLOW_USER_RECENT_ACTIVITY_EXPLAIN'	=> 'Recent activity will display in user profiles.',
	'ONLY_MODS'								=> 'Display user recent activity only to administrators and moderators',
	'ONLY_MODS_EXPLAIN'						=> 'If set to Yes, user recent activity in user profiles will be visible only to administrators and moderators.',
	'NUMBER_USER_RECENT_ACTIVITY'			=> 'Max number of user recent activity posts',
	'NUMBER_USER_RECENT_ACTIVITY_EXPLAIN'	=> 'Maximum number of user recent activity posts to display in the users profile.',
	'SHOW_USER_RECENT_POST'					=> 'Show the post text',
	'SHOW_USER_RECENT_POST_EXPLAIN'			=> 'Show the recent activity post text?',
	'NUMBER_CHAR_POST'						=> 'Number of post text characters',
	'NUMBER_CHAR_POST_EXPLAIN'				=> 'Input the number of characters to display if you are allowing to display post text.',
));

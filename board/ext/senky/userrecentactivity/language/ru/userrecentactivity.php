<?php
/**
*
* User Recent Activity extension for the phpBB Forum Software package.
* Russian translation by HD321kbps
*
* @copyright (c) 2015 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
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

$lang = array_merge($lang, array(
	'USER_RECENT_ACTIVITY'	=> '%s’s последняя активность',
	'DATE'					=> 'Дата',
));

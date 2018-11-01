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
	'ACP_USER_RECENT_ACTIVITY_TITLE'	=> 'Последние действия пользователя',
	'ACP_SETTINGS'						=> 'Настройки',

	'ACP_USER_RECENT_ACTIVITY_SETTING_SAVED'	=> 'Пользовательские настройки расширения были успешно изменены.',

	'ALLOW_USER_RECENT_ACTIVITY'			=> 'Включить последние действия пользователя',
	'ALLOW_USER_RECENT_ACTIVITY_EXPLAIN'	=> 'Последние действия будут отображаться в профилях пользователей.',
	'ONLY_MODS'								=> 'Display user recent activity only to administrators and moderators',
	'ONLY_MODS_EXPLAIN'						=> 'If set to Yes, user recent activity in user profiles will be visible only to administrators and moderators.',
	'NUMBER_USER_RECENT_ACTIVITY'			=> 'Максимальное число отображаемых сообщений блока последние действия',
	'NUMBER_USER_RECENT_ACTIVITY_EXPLAIN'	=> 'Максимальное число отображаемых сообщений блока последние действия в профиле пользователя.',
	'SHOW_USER_RECENT_POST'					=> 'Показывать текст сообщения',
	'SHOW_USER_RECENT_POST_EXPLAIN'			=> 'Показывать текст сообщений блока последние действия в профиле пользователя?',
	'NUMBER_CHAR_POST'						=> 'Количество символов в сообщении',
	'NUMBER_CHAR_POST_EXPLAIN'				=> 'Введите количество символов для отображения, если вы разрешили отображать текст сообщения.',
));

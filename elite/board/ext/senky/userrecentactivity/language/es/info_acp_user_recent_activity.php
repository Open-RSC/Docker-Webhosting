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
	'ACP_USER_RECENT_ACTIVITY_TITLE'	=> 'Actividad Reciente de Usuario',
	'ACP_SETTINGS'						=> 'Ajustes',

	'ACP_USER_RECENT_ACTIVITY_SETTING_SAVED'	=> 'Los ajustes de la extensión Actividad Reciente de Usuario han sido correctamente cambiados.',

	'ALLOW_USER_RECENT_ACTIVITY'			=> 'Permitir actividad reciente de usuario',
	'ALLOW_USER_RECENT_ACTIVITY_EXPLAIN'	=> 'La actividad reciente se mostrará en los perfiles de usuario.',
	'ONLY_MODS'								=> 'Display user recent activity only to administrators and moderators',
	'ONLY_MODS_EXPLAIN'						=> 'If set to Yes, user recent activity in user profiles will be visible only to administrators and moderators.',
	'NUMBER_USER_RECENT_ACTIVITY'			=> 'Número máximo de mensajes de actividad reciente de usuarios',
	'NUMBER_USER_RECENT_ACTIVITY_EXPLAIN'	=> 'El número máximo de mensajes en la actividad reciente del usuario que se mostrará en el perfil del usuario.',
	'SHOW_USER_RECENT_POST'					=> 'Mostrar el texto del mensaje',
	'SHOW_USER_RECENT_POST_EXPLAIN'			=> '¿Mostrar la actividad reciente del texto de mensajes?',
	'NUMBER_CHAR_POST'						=> 'Número de caracteres de texto de mensajes',
	'NUMBER_CHAR_POST_EXPLAIN'				=> 'Introduzca el número de caracteres a mostrar si se permite mostrar el texto del mensaje.',
));

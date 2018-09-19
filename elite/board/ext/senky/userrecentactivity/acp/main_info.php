<?php
/**
*
* User Recent Activity extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace senky\userrecentactivity\acp;

class main_info
{
	function module()
	{
		return array(
			'filename'	=> '\senky\userrecentactivity\acp\main_module',
			'title'		=> 'ACP_USER_RECENT_ACTIVITY_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'settings'	=> array('title' => 'ACP_SETTINGS', 'auth' => 'ext_senky/userrecentactivity && acl_a_board', 'cat' => array('ACP_USER_RECENT_ACTIVITY_TITLE')),
			),
		);
	}
}

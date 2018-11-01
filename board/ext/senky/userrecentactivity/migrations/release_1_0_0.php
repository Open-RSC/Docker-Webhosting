<?php
/**
*
* User Recent Activity extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace senky\userrecentactivity\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\gold');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('allow_user_recent_activity', 1)),
			array('config.add', array('number_user_recent_activity', 10)),
			array('config.add', array('show_user_recent_post', 1)),
			array('config.add', array('number_char_post', 100)),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_USER_RECENT_ACTIVITY_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_USER_RECENT_ACTIVITY_TITLE',
				array(
					'module_basename'	=> '\senky\userrecentactivity\acp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}

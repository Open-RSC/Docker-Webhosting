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

class release_2_1_0 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\senky\userrecentactivity\migrations\release_1_0_0');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('senky_ura_only_mods', 0)),
		);
	}
}

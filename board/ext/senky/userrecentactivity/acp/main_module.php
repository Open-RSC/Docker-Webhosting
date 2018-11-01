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

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $user, $template, $request, $config;

		$user->add_lang('acp/common');
		$this->tpl_name = 'user_recent_activity';
		$this->page_title = $user->lang('ACP_USER_RECENT_ACTIVITY_TITLE');
		add_form_key('senky/userrecentactivity');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('senky/userrecentactivity'))
			{
				trigger_error('FORM_INVALID');
			}

			$config->set('allow_user_recent_activity', $request->variable('allow_user_recent_activity', false));
			$config->set('senky_ura_only_mods', $request->variable('senky_ura_only_mods', true));
			$config->set('number_user_recent_activity', $request->variable('number_user_recent_activity', 0));
			$config->set('show_user_recent_post', $request->variable('show_user_recent_post', false));
			$config->set('number_char_post', $request->variable('number_char_post', 0));

			trigger_error($user->lang('ACP_USER_RECENT_ACTIVITY_SETTING_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'U_ACTION'						=> $this->u_action,
			'ALLOW_USER_RECENT_ACTIVITY'	=> $config['allow_user_recent_activity'],
			'ONLY_MODS'						=> $config['senky_ura_only_mods'],
			'NUMBER_USER_RECENT_ACTIVITY'	=> $config['number_user_recent_activity'],
			'SHOW_USER_RECENT_ACTIVITY'		=> $config['show_user_recent_post'],
			'NUMBER_CHAR_POST'				=> $config['number_char_post'],
		));
	}
}

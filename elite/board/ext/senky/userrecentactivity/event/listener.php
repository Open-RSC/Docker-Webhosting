<?php
/**
*
* User Recent Activity extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 Jakub Senko <jakubsenko@gmail.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace senky\userrecentactivity\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\content_visibility */
	protected $content_visibility;

	/** @var string */
	protected $root_path;

	/** @var string */
	protected $php_ext;

	/**
	* Constructor
	*
	* @param \phpbb\db\driver\driver_interface	$db					Database object
	* @param \phpbb\config\config				$config				Config object
	* @param \phpbb\auth\auth					$auth				Auth object
	* @param \phpbb\template\template			$template			Template object
	* @param \phpbb\user						$user				User object
	* @param \phpbb\content_visibility			$content_visibility	Content visibility object
	* @param string								$root_path			phpBB root path
	* @param string								$php_ext			phpBB php extension
	* @access public
	*/
	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\config\config $config, \phpbb\auth\auth $auth, \phpbb\template\template $template, \phpbb\user $user, \phpbb\content_visibility $content_visibility, $root_path, $php_ext)
	{
		$this->db = $db;
		$this->config = $config;
		$this->auth = $auth;
		$this->template = $template;
		$this->user = $user;
		$this->content_visibility = $content_visibility;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	public static function getSubscribedEvents()
	{
		return array(
			'core.memberlist_view_profile'	=> 'memberlist_view_profile',
		);
	}

	public function memberlist_view_profile($event)
	{
		if (!$this->config['allow_user_recent_activity'])
		{
			return;
		}

		if ($this->config['senky_ura_only_mods'] && !($this->auth->acl_get('a_') || $this->auth->acl_get('m_')))
		{
			return;
		}

		$this->user->add_lang_ext('senky/userrecentactivity', 'userrecentactivity');

		// Select member posts ordered by time, newest first.
		$exclude_forums = array_keys($this->auth->acl_getf('!f_read', true));

		$sql = $this->db->sql_build_query('SELECT', array(
			'SELECT'	=> 'p.post_subject, p.post_id, p.post_time, p.post_text, p.bbcode_uid, p.bbcode_bitfield, p.enable_smilies, p.enable_bbcode, p.enable_magic_url, t.topic_views, t.forum_id, t.topic_posts_approved, t.topic_posts_unapproved, t.topic_posts_softdeleted',
			'FROM'		=> array(
				POSTS_TABLE		=> 'p',
			),
			'LEFT_JOIN'	=> array(
				array(
					'FROM'	=> array(TOPICS_TABLE => 't'),
					'ON'	=> 'p.poster_id =' . (int) $event['member']['user_id'],
				)
			),
			'WHERE'		=> 'p.topic_id = t.topic_id
				AND ' . $this->db->sql_in_set('p.forum_id', $exclude_forums, true, true) . '
				AND p.post_visibility = ' . ITEM_APPROVED . '
				AND t.topic_visibility = ' . ITEM_APPROVED,
			'ORDER_BY'	=> 'p.post_id DESC'
		));
		$result = $this->db->sql_query_limit($sql, $this->config['number_user_recent_activity']);
		while ($row = $this->db->sql_fetchrow($result))
		{
			$post_id = $row['post_id'];

			// Prepare post text, but only if needed
			$text = '';
			if ($this->config['show_user_recent_post'])
			{
				$bbcode_options = (($row['enable_bbcode']) ? OPTION_FLAG_BBCODE : 0) + (($row['enable_smilies']) ? OPTION_FLAG_SMILIES : 0) +  (($row['enable_magic_url']) ? OPTION_FLAG_LINKS : 0);
				$text = generate_text_for_display($row['post_text'], $row['bbcode_uid'], $row['bbcode_bitfield'], $bbcode_options);
				// strip_bbcode removes line breaks completely without any compensation.
				// This means, that last word of previous line and first word of new line
				// will be merged, worsening readability. Replace it with space instead.
				$text = str_replace('<br />', ' ', $text);
				strip_bbcode($text, $row['bbcode_uid']); // btw, why this function modifies parameter???

				if (strlen($text) > intval($this->config['number_char_post']))
				{
					$text = truncate_string($text, intval($this->config['number_char_post'])) . '…';
				}
			}

			$this->template->assign_block_vars('post', array(
				'SUBJECT'	=> $row['post_subject'],
				'TIME'		=> $this->user->format_date($row['post_time']),
				'POST_TEXT'	=> empty($text) ? false : $text,
				'REPLIES'	=> $this->content_visibility->get_count('topic_posts', $row, $row['forum_id']) - 1,
				'VIEWS'		=> $row['topic_views'],
				'U_POSTS'	=> append_sid("{$this->root_path}viewtopic.{$this->php_ext}", "p=$post_id#p$post_id"),
			));
		}
		$this->db->sql_freeresult($result);

		$this->template->assign_vars(array(
			'USER_RECENT_ACTIVITY'	=> $this->user->lang('USER_RECENT_ACTIVITY', $event['member']['username']),
			'LAST_POST_IMG'			=> $this->user->img('icon_topic_latest', 'VIEW_LATEST_POST'),
		));
	}
}

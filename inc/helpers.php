<?php
function curPageURL()
{
	$pageUrl = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	$page = explode("/", $pageUrl);
	$pos = strpos($page[2], 'index.php');
	if ($pos !== false) {
		$return = 'index.php';
	} else if ($page[3]) {
		$return = array($page[2], $page[3]);
	} else {
		$return = $page[2];
	}
	return $return;
}

define('IN_PHPBB', true);
error_reporting(1);

$phpbb_root_path = './board/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

require_once($phpbb_root_path . 'common.' . $phpEx);
require_once($phpbb_root_path . 'includes/functions_display.' . $phpEx);
require_once('./inc/database_config.php');
require_once('./inc/charfunctions.php');

$user->session_begin();
$auth->acl($user->data);
$user->setup('viewforum');

function create_where_clauses($gen_id, $type)
{
	global $db, $auth;
	$size_gen_id = sizeof($gen_id);
	switch ($type) {
		case 'forum':
			$type = 'forum_id';
			break;
		case 'topic':
			$type = 'topic_id';
			break;
		default:
			trigger_error('No type defined');
	}

	// Set $out_where to nothing, this will be used of the gen_id
	// size is empty, in other words "grab from anywhere" with
	// no restrictions
	$out_where = '';

	if ($size_gen_id > 0) {
		// Get a list of all forums the user has permissions to read
		$auth_f_read = array_keys($auth->acl_getf('f_read', true));

		if ($type == 'topic_id') {
			$sql = 'SELECT topic_id FROM ' . TOPICS_TABLE . ' WHERE '
				. $db->sql_in_set('topic_id', $gen_id) . ' AND '
				. $db->sql_in_set('forum_id', $auth_f_read);
			$result = $db->sql_query($sql);

			while ($row = $db->sql_fetchrow($result)) {
				// Create an array with all acceptable topic ids
				$topic_id_list[] = $row['topic_id'];
			}

			unset($gen_id);
			$gen_id = $topic_id_list;
			$size_gen_id = $gen_id;
		}
		$j = 0;

		for ($i = 0; $i < $size_gen_id; $i++) {
			$id_check = (int)$gen_id[$i];
			// If the type is topic, all checks have
			// been made and the query can start to be built
			if( $type == 'topic_id' ) {
				$out_where .= ($j == 0) ? 'WHERE ' . $type . ' = ' . $id_check
					. ' ' : 'OR ' . $type . ' = ' . $id_check . ' ';
			}
			// If the type is forum, do the check to make
			// sure the user has read permissions
			else if( $type == 'forum_id' && $auth->acl_get('f_read', $id_check) ) {
				$out_where .= ($j == 0) ? 'WHERE ' . $type . ' = ' . $id_check
					. ' ' : 'OR ' . $type . ' = ' . $id_check . ' ';
			}

			$j++;
		}
	}

	if ($out_where == '' && $size_gen_id > 0) {
		trigger_error('A list of topics/forums has not been created');
	}

	return $out_where;
}

/*     News Code     */
$search_limit = 5;
$forum_id = array(7); // Forum ID for the news (/board/viewforum.php?f=18)
$forum_id_where = create_where_clauses($forum_id, 'forum');
$topic_id = array(0);
$topic_id_where = create_where_clauses($topic_id, 'topic');
$posts_ary = array(
	'SELECT' => 'p.*, t.*',
	'FROM' => array(POSTS_TABLE => 'p',),
	'LEFT_JOIN' => array(array('FROM' => array(TOPICS_TABLE => 't'),
		'ON' => 't.topic_first_post_id = p.post_id')),
	'WHERE' => str_replace(array('WHERE ', 'forum_id'), array('', 't.forum_id'), $forum_id_where)
		. 'AND t.topic_status <> ' . ITEM_MOVED . '',
  'ORDER_BY' => 'p.post_id DESC',
);
$posts = $db->sql_build_query('SELECT', $posts_ary);
$posts_result = $db->sql_query_limit($posts, $search_limit);
?>

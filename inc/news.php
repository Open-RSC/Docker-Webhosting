<?php
	while ($posts_row = $db->sql_fetchrow($posts_result)) {
		$topic_title = $posts_row['topic_title'];
		$post_author = get_username_string('full', $posts_row['poster_id'], 
		    $posts_row['topic_first_poster_name'], $posts_row['topic_first_poster_colour']);
		$post_date = $user->format_date($posts_row['post_time']);
        $post_link = append_sid("{$phpbb_root_path}viewtopic.$phpEx", "p="
            . $posts_row['post_id'] . "#p" . $posts_row['post_id']);

		$post_text = nl2br($posts_row['post_text']);

		$bbcode = new bbcode(base64_encode($bbcode_bitfield));
		$bbcode->bbcode_second_pass($post_text, $posts_row['bbcode_uid'], $posts_row['bbcode_bitfield']);

		$post_text = smiley_text($post_text);

		echo '<h4><a href="' . $post_link . '">' . $topic_title . '</a></h4>';
		echo '<div class="meta">posted by ' . $post_author . ' // ' . $post_date . '</div>';
		echo '<p>' . smiley_text($post_text) . '</p>';
	}
?>

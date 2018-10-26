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

$script_directory = '/elite/';
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
            $sql = 'SELECT topic_id FROM ' . TOPICS_TABLE . ' WHERE ' . $db->sql_in_set('topic_id', $gen_id) . ' AND ' . $db->sql_in_set('forum_id', $auth_f_read);
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
            { // If the type is topic, all checks have been made and the query can start to be built if( $type == 'topic_id' ) { $out_where .= ($j == 0) ? 'WHERE ' . $type . ' = ' . $id_check . ' ' : 'OR ' . $type . ' = ' . $id_check . ' '; } // If the type is forum, do the check to make sure the user has read permissions else if( $type == 'forum_id' && $auth->acl_get('f_read', $id_check) )
                $out_where .= ($j == 0) ? 'WHERE ' . $type . ' = ' . $id_check . ' ' : 'OR ' . $type . ' = ' . $id_check . ' ';
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
    'SELECT' => 'p.*, t.*', 'FROM' => array(POSTS_TABLE => 'p',), 'LEFT_JOIN' => array(array(
        'FROM' => array(TOPICS_TABLE => 't'), 'ON' => 't.topic_first_post_id = p.post_id')),
    'WHERE' => str_replace(array('WHERE ', 'forum_id'), array('', 't.forum_id'), $forum_id_where) . '
    AND t.topic_status <> ' . ITEM_MOVED . '
    ',
    'ORDER_BY' => 'p.post_id DESC',
);
$posts = $db->sql_build_query('SELECT', $posts_ary);
$posts_result = $db->sql_query_limit($posts, $search_limit);
?>

<!doctype html>
<html>
<head>
    <title>Open RSC</title>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">

    <link rel="stylesheet" href="/elite/css/style.css" media="all"/>
    <link rel="stylesheet" href="/elite/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo">

    <link rel="import" href="inc/discord.html">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.js"
            type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/excanvas.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" type="text/javascript"></script>
    <script src="/elite/js/cufon.js" type="text/javascript"></script>

    <script type="text/javascript">
        function loadContent(user, id, lvl, on) {
            var url = "/elite/inc/account.php";
            $.post(url, {
                username: user,
                owner: id,
                combat: lvl,
                online: on
            }, function (data) {
                $("#character-details").html(data).show();
                $("a#inline").fancybox({
                    'hideOnContentClick': false,
                    'hideOnOverlayClick': false,
                    'overlayColor': '#000000',
                    'padding': 0,
                });

                $("#character-delete-form").bind("submit", function () {
                    $("#verification-fails").hide();
                    if ($("#verification").val() != 'yes') {
                        $("#verification-fails").show();
                        $.fancybox.resize();
                        return false;
                    }
                    $.fancybox.showActivity();
                    var i = $("#user-i").val();
                    var ui = $("#user-ui").val();
                    var y = $("#verification").val();
                    setTimeout(function () {
                        $.post("/elite/inc/account.php", {id: i, hash: ui, ver: y}, function (data) {
                            $.fancybox.hideActivity();
                            $("#character-delete-form").hide();
                            window.location.reload()
                        });
                    }, 5000);
                    return false;
                });
            });
        }

        $(document).ready(function () {
            $("#toggle:first").addClass('active');
            $('#toggle').click(function () {
                $('#toggle').removeClass('active');
                $(this).toggleClass('active');
            });

            $("a#single_image").fancybox();
            $("a#inline").fancybox({
                'hideOnContentClick': false,
                'overlayColor': '#000000',
                'padding': 0,
                'onClosed': function () {
                    $("#name-fails").hide();
                    $("#pass-fails").hide();
                    $("#user-fails").hide();
                    $("#user-passes").hide();
                    $("#character-creation-form").show();
                }
            });

            $("#character-creation-form").bind("submit", function () {
                $("#name-fails").hide();
                $("#pass-fails").hide();
                if ($("#name").val().length >= 11 || $("#name").val().length <= 3) {
                    $("#name-fails").show();
                    $.fancybox.resize();
                    return false;
                }
                if ($("#password").val().length <= 4) {
                    $("#pass-fails").show();
                    $.fancybox.resize();
                    return false;
                }

                $.fancybox.showActivity();
                var n = $("#name").val();
                var p = $("#password").val();

                setTimeout(function () {
                    $.post("/elite/inc/account.php", {nm: n, pw: p}, function (data) {
                        if (data == 0) {
                            $("#user-fails").show();
                        } else if (data == 1) {
                            $("#user-passes").show();
                            $("#character-creation-form").hide();
                            window.location.reload()
                        }
                        $.fancybox.hideActivity();
                    });
                }, 3000);
                return false;
            });
        });
    </script>

</head>
<body lang="en">

<header>
    <div class="large">
        Open RSC
    </div>
    <div class="small" style="color: white;">
        Striving for a replica RSC game and more
    </div>
</header>

<div class="navigation">
    <div class="navbar">
        <ul>
            <li><a href="<?php echo $script_directory; ?>">Home</a></li>
            <li><a href="<?php echo $script_directory; ?>board/index.php">Forum</a></li>
            <li><a href="<?php echo $script_directory; ?>chat">Game Chat</a></li>
            <li><a href="<?php echo $script_directory; ?>highscores/skill_total">Highscores</a></li>
            <li><a href="<?php echo $script_directory; ?>worldmap">Player Map</a></li>
            <li><a href="<?php echo $script_directory; ?>database">Database</a></li>
        </ul>
    </div>

    <div class="account-panel">
        <div class="avatar-box">
            <?php if ($user->data['is_registered']) { ?>
                <a href="<?php echo $script_directory; ?>board/ucp.php?i=profile&mode=avatar"><img
                            src="/elite/board/download/file.php?avatar=<?php print $user->data['user_avatar']; ?>"/></a>
            <?php } ?>
        </div>
        <?php if ($user->data['is_registered']) { ?>
            <div class="account-text">

                <span class="welcome-message block">Welcome back, <?php print $user->data['username']; ?></span>
                <span class="welcome-text"><a
                            href="#<?php echo $script_directory; ?>accounts">Account Management</a></span>
                <span class="welcome-text"> | (<a
                            href="<?php echo $script_directory; ?>board/ucp.php?i=pm&folder=inbox"><?php print $user->data['user_unread_privmsg']; ?></a>) | </span>
                <span class="welcome-text">
							<a href='<?php echo $script_directory; ?>board/ucp.php?mode=logout&amp;sid=<?php print $user->data['session_id']; ?>'>Logout</a>
						</span>
            </div>
        <?php } else { ?>
            <div class="sidenavbar">
                <ul>
                    <li><a id="inline" href="#data">Login</a></li>
                    <li><a href="/board/ucp.php?mode=register">Register</a></li>
                </ul>
            </div>
        <?php } ?>
        <div style="display:none">
            <div id="data">
                <div class="navbar" style="height: 5px; width: 455px;">
                    <headerbar>
                        <headerbar-sides><br/><br/><br/><br/></headerbar-sides>
                    </headerbar>
                </div>
                <div class="panel-login">
                    <div class="popupbox">
                        <h4 style="margin-left: 40px;">Open RSC Login</h4>
                        <form method="post" action="<?php echo $script_directory; ?>board/ucp.php?mode=login">
                            <input type="text" name="username" class="name" id="loginname" placeholder="Username"/>
                            <input type="password" name="password" class="password" id="loginpass"
                                   placeholder="Password"/>
                            <input type="hidden" checked="yes" name="autologin" class="autologin" id="autologin"/>
                            <input type="submit" value="Log In" name="login" class="submit"/>
                            <input type="hidden" name="redirect" value="<?php echo $script_directory; ?>index.php"/>
                        </form>
                        <a class="submit"
                           href="<?php echo $script_directory; ?>board/ucp.php?mode=register">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
if (curPageURL() != "" && !is_array(curPageURL()) && curPageURL() != 'index.php') {
    if (file_exists("pages/" . curPageURL() . ".php")) {
        include("pages/" . curPageURL() . ".php");
    } else {
        include("pages/error.php");
    }
} else if (is_array(curPageURL()) && curPageURL() != 'index.php') {
    $page = curPageURL();
    $subpage = $page[1];
    $page = $page[0];
    if (file_exists("pages/" . $page . ".php")) {
        include("pages/" . $page . ".php");
    } else {
        include("pages/error.php");
    }
} else {
    ?>

    <div class="main">
        <div class="content">
            <div class="navbar" style="height: 5px; width: 100%;">
                <headerbar>
                    <headerbar-sides><br/><br/><br/><br/></headerbar-sides>
                </headerbar>
            </div>
            <article>
                <div class="panel">
                    <br/>
                    <p align="center"><img class="logo" style="width:320px; height:300px;" src="css/images/logo.png"/>
                    </p>
                    <div style="margin-left: 75px; margin-right: 75px; word-spacing: 10px">
                        <h4>
                            <b>
                                <a href="board/ucp.php?mode=register">Register</a> |
                                <a href="https://game.openrsc.com/downloads/OpenRSC.jar">Download</a> |
                                <a href="/downloads/openrsc.apk">Android</a> |
                                <a href="https://discordapp.com/invite/94vVKND">Discord</a>
                            </b>
                        </h4>
                    </div>
                    <br/>
                    <div class="hr"></div>
                    <br/>
                    <div style="margin-left: 75px; margin-right: 75px;">
                        <?php
                        while ($posts_row = $db->sql_fetchrow($posts_result)) {
                            $topic_title = $posts_row['topic_title'];
                            $post_author = get_username_string('full', $posts_row['poster_id'], $posts_row['topic_first_poster_name'], $posts_row['topic_first_poster_colour']);
                            $post_date = $user->format_date($posts_row['post_time']);
                            $post_link = append_sid("{$phpbb_root_path}viewtopic.$phpEx", "p=" . $posts_row['post_id'] . "#p" . $posts_row['post_id']);

                            $post_text = nl2br($posts_row['post_text']);

                            $bbcode = new bbcode(base64_encode($bbcode_bitfield));
                            $bbcode->bbcode_second_pass($post_text, $posts_row['bbcode_uid'], $posts_row['bbcode_bitfield']);

                            $post_text = smiley_text($post_text);

                            echo '<h4><a href="' . $post_link . '">' . $topic_title . '</a></h4>';
                            echo '<div class="meta">posted by ' . $post_author . ' // ' . $post_date . '</div>';
                            echo '<p>' . smiley_text($post_text) . '</p>';

                        }
                        ?>
                        <br/>
                    </div>
                </div>
            </article>
        </div>
    </div>
<?php } ?>

<div class="sidenavbar" style="margin-top: 20px;">
    <div class="navbar" style="height: 5px; width: 290px;">
        <headerbar>
            <headerbar-sides><br/><br/><br/><br/></headerbar-sides>
        </headerbar>
    </div>
</div>
<aside>
    <div class="box">
        <div class="panel" style="height: 259px;">
            <br/>
            <div style="padding-left: 20px; padding-top: 3px;">
                <h5>Statistics</h5>
                <p>
                    Players Online: <strong><a href="/elite/online"><?php echo playersOnline(); ?></a></strong><br/>
                    Server Status: <strong><?php echo checkStatus("game.openrsc.com", "43594"); ?></strong><br/>
                    Registrations Today: <strong><a href="/elite/registrationstoday"><?php echo newRegistrationsToday(); ?></a></strong><br/>
                    Logins Today: <strong><a href="/elite/loginstoday"><?php echo loginsToday(); ?></a></strong><br/>
                    Unique Players: <strong><?php echo uniquePlayers(); ?></strong><br/>
                    Total Players: <strong><?php echo totalGameCharacters(); ?></strong><br/>
                    Gold: <strong><?php echo banktotalGold(); ?></strong><br/>
                    Time Played: <strong><?php echo totalTime(); ?></strong><br/>
                </p>
            </div>
            <div style="padding-left: 10px;">
                <iframe src="/elite/inc/discord.html"></iframe>
            </div>
        </div>
    </div>
</aside>

</body>
</html>

<?php
function curPageURL() {
	$pageUrl = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$page = explode("/",$pageUrl);
	$pos = strpos($page[2],'index.php');
	if($pos !== false){
		$return = 'index.php';
	} else if($page[3]){
		$return = array($page[2],$page[3]);
	} else {
		$return = $page[2];
	}
	return $return;
}

$script_directory = '/elite/';
define('IN_PHPBB', true);
$phpbb_root_path = './board/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup('viewforum');

require_once './inc/database_config.php';
require_once './inc/charfunctions.php';

error_reporting(1);
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
        <link rel="stylesheet" href="/elite/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo">

				<link rel="import" href="inc/discord.html">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/excanvas.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.pie.js" type="text/javascript"></script>
        <script src="/elite/js/cufon.js" type="text/javascript"></script>

        <script type="text/javascript">
			function loadContent(user, userhash, id, hc, hsprite, sc, tc, gender, pc, lvl, on) {
				var url = "/elite/js/account.php";
					$.post(url, {username: user, userenc: userhash, owner: id, hair: hc, head: hsprite, skin: sc, top: tc, gen: gender, pants: pc, combat: lvl, online: on} ,function(data) {
						$("#character-details").html(data).show();
						$("a#inline").fancybox({
						'hideOnContentClick': false,
						'hideOnOverlayClick': false,
						'overlayColor': '#000000',
						'padding': 0,
						});

						$("#character-delete-form").bind("submit", function() {
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
						setTimeout(function(){
							$.post("/elite/js/account.php", {id: i, hash: ui, ver: y} ,function(data) {
								$.fancybox.hideActivity();
								$("#character-delete-form").hide();
								window.location.reload()
							});
						},5000);
						return false;
						});
					});
			}

			$(document).ready(function() {
				$("#toggle:first").addClass('active');
				$('#toggle').click(function(){
					$('#toggle').removeClass('active');
					$(this).toggleClass('active');
				});

				$("a#single_image").fancybox();
				$("a#inline").fancybox({
					'hideOnContentClick': false,
					'overlayColor': '#000000',
					'padding': 0,
					'onClosed': function() {
						$("#name-fails").hide();
						$("#pass-fails").hide();
						$("#user-fails").hide();
						$("#user-passes").hide();
						$("#character-creation-form").show();
					}
				});

				$("#character-creation-form").bind("submit", function() {
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

					setTimeout(function(){
						$.post("/elite/js/account.php", {nm: n, pw: p} ,function(data) {
							if(data == 0){
								$("#user-fails").show();
							} else if(data == 1){
								$("#user-passes").show();
								$("#character-creation-form").hide();
								window.location.reload()
							}
							$.fancybox.hideActivity();
						});
					},3000);
					return false;
				});
			});
		</script>
        <script type="text/javascript">
            jQuery(function($) {
                $("#rss-feeds").rss(
                    "https://openrsc.com/blog/rss/",
                    {
                        limit: 4,
                        layoutTemplate: "<div class='feed-container'>{entries}</div>",
                        entryTemplate: '<h4><a href="{url}">{title}</a></h4><div class="meta">Posted by {author} // {date}</div>{shortBody}<br /><br />',
                        // <img src="{teaserImageUrl}" width="99" height="56">
                        dateFormat: 'MMMM Do, YYYY'
                    },
                    function callback() {}
                )
            })
        </script>
	</head>
	<body lang="en">

		<header>
			<div class="large">Open RSC</div>
		</header>

		<div class="body-wrapper">
			<div class="navigation">

                <div class="navbar">
					<ul>
						<li><a href="<?php echo $script_directory; ?>">Home</a></li>
						<li><a href="<?php echo $script_directory; ?>board/index.php">Forum</a></li>
						<li><a href="<?php echo $script_directory; ?>chat">Game Chat</a></li>
						<li><a href="<?php echo $script_directory; ?>highscores/skill_total">Highscores</a></li>
						<li><a href="<?php echo $script_directory; ?>worldmap">Live Map</a></li>
                        <li><a href="<?php echo $script_directory; ?>database">Database</a></li>
					</ul>
				</div>

				<div class="account-panel">
					<div class="avatar-box">
					<?php if($user->data['is_registered']){ ?>
							<a href="<?php echo $script_directory; ?>board/ucp.php?i=profile&mode=avatar"><img src="/elite/board/download/file.php?avatar=<?php print $user->data['user_avatar']; ?>" /></a>
					<?php } ?>
					</div>
					<div class="account-text">
					<?php if($user->data['is_registered']){ ?>
						<span class="welcome-message block">Welcome back, <?php print $user->data['username']; ?></span>
						<span class="welcome-text"><a href="<?php echo $script_directory; ?>accounts">Account Management</a></span>
						<span class="welcome-text"> | (<a href="<?php echo $script_directory; ?>board/ucp.php?i=pm&folder=inbox"><?php print $user->data['user_unread_privmsg']; ?></a>) | </span>
						<span class="welcome-text">
							<a href='<?php echo $script_directory; ?>board/ucp.php?mode=logout&amp;sid=<?php print $user->data['session_id'];?>'>Logout</a>
						</span>
					<?php } else { ?>
                        <span class="welcome-message"><a id="inline" href="#data">Login</a></span>
                        <span class="welcome-message"><a href="/board/ucp.php?mode=register">Register</a></span>
					<?php } ?>
						<div style="display:none">
							<div id="data">
								<h4 style="margin-left: 40px;">Open RSC Login</h4>
								<form method="post" action="<?php echo $script_directory; ?>board/ucp.php?mode=login">
								<input type="text" name="username" class="name" id="loginname" placeholder="Username"/>
								<input type="password" name="password" class="password" id="loginpass" placeholder="Password"/>
                                <input type="hidden" checked="yes" name="autologin" class="autologin"  id="autologin"/>
                                <input type="submit" value="Log In" name="login" class="submit"/>
								<input type="hidden" name="redirect" value="<?php echo $script_directory; ?>index.php" />
								</form>
								<a class="submit" href="<?php echo $script_directory; ?>board/ucp.php?mode=register">Register</a>
							</div>
						</div>
					</div>
				</div>

			</div>

		<?php

			if(curPageURL() != "" && !is_array(curPageURL()) && curPageURL() != 'index.php'){
				if(file_exists("pages/".curPageURL().".php")) {
					include("pages/".curPageURL().".php");
				} else {
					include("pages/error.php");
				}
			} else if(is_array(curPageURL()) && curPageURL() != 'index.php' ){
				$page = curPageURL();
				$subpage = $page[1];
				$page = $page[0];
				if(file_exists("pages/".$page.".php")) {
					include("pages/".$page.".php");
				} else {
					include("pages/error.php");
				}
			} else {
		?>
		<div class="main">
			<div class="content">

                <article>
                    <div class="panel">
                    <br />
                    <p align="center"><img class="logo" style="width:320px; height:300px;" src="css/images/logo.png"/></p>
                    <h4>
                        <b>
                            <p align="center">
                                <a href="board/ucp.php?mode=register"/>Register</a> |
                                <a href="downloads/Open_RSC_Launcher.jar"/>Download</a> |
                                <a href="downloads/openrsc.apk"/>Android</a> |
                                <a href="https://discordapp.com/invite/94vVKND"/>Discord</a>
                            </p>
                        </b>
                    </h4>

										<br />
                    <div class="hr">.</div>
                    <br />

										<div style="margin-left: 75px; margin-right: 75px;">

										<?php
										    function getContent() {
		                        $file = "./feed-cache.txt";
		                        $current_time = time();
		                        $expire_time = 60 * 60; // 60 minute static cache of RSS feed
		                        $file_time = filemtime($file);
		                        if(file_exists($file) && ($current_time - $expire_time < $file_time)) {
		                            return file_get_contents($file);
		                        }
		                        else {
		                            $content = getFreshContent();
		                            file_put_contents($file, $content);
		                            return $content;
		                        }
		                    }
		                    function getFreshContent() {
		                        $html = "";
		                        $newsSource = array(
		                            array(
		                                "url" => "https://openrsc.com/blog/rss/" // RSS feed URL
		                            ),
		                        );
		                        function getFeed($url){
		                            $rss = simplexml_load_file($url);
		                            $count = 0;
																date_default_timezone_set('America/New_York');
		                            foreach($rss->channel->item as$item) {
		                                $count++;
		                                if($count > 4){
		                                    break;
		                                }
		                                $html .= '<h4><a href="'.htmlspecialchars($item->link).'">'.htmlspecialchars($item->title).'</a></h4><div class="meta">Posted '.strftime("%A %B %d, %Y @ %I:%M %p", strtotime($item->pubDate)).'</div>'.strip_tags($item->description).'<br /><br />';
		                            }
		                            return $html;
		                        }
		                        foreach($newsSource as $source) {
		                            $html .= getFeed($source["url"]);
		                        }
		                        return $html;
		                    }
		                    print getContent();
		                ?>
										<br />
									</div>
							</div>
						</article>
			</div>
		</div>

		<?php } ?>
		<aside>
			<div class="box">
					<div class="panel" style="height: 259px;">
						<br />
						<div style="padding-left: 20px; padding-top: 3px;">
							<h5>Statistics</h5>
	          	<p><strong>
	              	Players Online: <?php echo playersOnline(); ?><br />
	              	Server Status: <?php echo checkStatus("dev1.openrsc.com", "43594"); ?><br />
	              	Total Players: <?php echo totalGameCharacters(); ?><br />
	              	Registrations today: <?php echo newRegistrationsToday(); ?><br />
						</div>
						<div style="padding-left: 10px;">
							<iframe src="/elite/inc/discord.html"></iframe>
						</div>
           	</strong></p>
					</div>
			</div>
		</aside>

		<?php include 'inc/footer.php'; ?>

	</body>
</html>

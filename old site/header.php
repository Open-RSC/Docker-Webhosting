<?php
define('IN_PHPBB', true);
$phpbb_root_path = './board/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
require($phpbb_root_path . 'common.' . $phpEx);
require($phpbb_root_path . 'includes/bbcode.' . $phpEx);
require($phpbb_root_path . 'includes/functions_display.' . $phpEx);
require($phpbb_root_path . 'config.' . $phpEx);
require 'inc/db.php';
require 'inc/dataconversions.php';

// Start session
$user->session_begin();
$auth->acl($user->data);
$user->setup('viewforum');
?>

<!doctype html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Open RSC</title>
                <link rel="stylesheet" media="all" href="/css/style.css"/>
	</head>
        <body>

		<header>
                        <div class="large">
                            <a href="/"><img src="/css/images/logo.png" /></a>
                        </div>
		</header>
		<div class="body-wrapper">
			<div class="navigation">
				<div class="navbar">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="/board/index.php">Forum</a></li>
						<li><a href="/playnow.php">Play Now</a></li>
						<li><a href="/chat.php">In-game Chat</a></li>
						<li><a target="_blank" href="/worldmap.php">World Map</a></li>
                                                <li><a href="/faq.php">FAQ</a></li>
					</ul>
				</div>
				<div class="account-panel">
					<div class="avatar-box">
					<?php if($user->data['is_registered']){ ?>
							<a href="/board/ucp.php?i=profile&mode=avatar"><img src="/board/download/file.php?avatar=<?php print $user->data['user_avatar']; ?>" /></a>
					<?php } ?>
					</div>
					<div class="account-text">
					<?php if($user->data['is_registered']){ ?>
						<span class="welcome-message block">Welcome back, <?php print $user->data['username']; ?></span>
						<span class="welcome-text"><a href="/board/ucp.php?i=179">Account Management</a></span>
						<span class="welcome-text"> | (<a href="/board/ucp.php?i=pm&folder=inbox"><?php print $user->data['user_unread_privmsg']; ?></a>) | </span>
						<span class="welcome-text">
							<a href='/board/ucp.php?mode=logout&amp;sid=<?php print $user->data['session_id'];?>'>Log out</a>
						</span>
					<?php
                                        } else {
                                        ?>
                                                <aside>
                                                        <div class="content2">
                                                                <div id="data2" style>
                                                                        <h4>Login Module</h4>
                                                                        <p>Use the form below to login!</p>
                                                                        <form method="post" action="/board/ucp.php?mode=login">
                                                                        <label for="loginname">Username: </label><input type="text" name="username" class="name" style="width: 170px;" id="username"/>
                                                                        <label for="loginpass">Password: </label><input type="password" name="password" class="password" style="width: 170px;" id="password"/>
                                                                        <input type="hidden" checked="yes" name="autologin" class="autologin"  id="autologin"/>
                                                                        <input type="submit" value="Log In" name="login" class="submit"/>
                                                                        <input type="hidden" name="redirect" value="/index.php" />
                                                                        </form>
                                                                        <a class="submit" href="/board/ucp.php?mode=register">Register</a>
                                                                </div>
                                                        </div>
                                                </aside>
                                        <?php
                                        }
                                        ?>
                                                <aside>
                                                        <div class="content">
                                                                <div id="data">
                                                                        <h4>Statistics</h4>
                                                                        <p><strong>Players Online: <?php echo playersOnline(); ?><br />
                                                                        Server Status: <?php echo checkStatus("localhost", "43594"); ?><br />
                                                                        Total Players: <?php echo totalGameCharacters(); ?><br />
                                                                        Registrations today: <?php echo newRegistrationsToday(); ?><br /></strong></p>
                                                                </div>
                                                                <iframe src="https://discordapp.com/widget?id=459699205674369025&theme=dark" width="220" height="500" allowtransparency="false" frameborder="0"></iframe>
                                                        </div>
                                                </aside>
                                        </div>
                                </div>
                        </div>
                </div>

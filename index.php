<?php include 'inc/helpers.php'; ?>

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

    <link rel="stylesheet" href="/css/style.css" media="all"/>
    <link rel="stylesheet" href="/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Exo">

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
    <script src="/js/cufon.js" type="text/javascript"></script>

    <script src="/js/helpers.js" type="text/javascript"></script>

</head>
<body lang="en">
<div class="wrapper">

    <header>
        <h1 class="large">
            Open RSC
        </h1>
        <h2 class="small white">
            Striving for a replica RSC game and more
        </h2>
    </header>

    <nav class="navigation">
        <ul class="navbar">
            <li><a href="/">Home</a></li>
            <li><a href="/board/index">Forum</a></li>
            <li><a href="/chat">Game Chat</a></li>
            <li><a href="/highscores/skill_total">Highscores</a></li>
            <li><a href="/worldmap">Live Map</a></li>
            <li><a href="/database">Info</a></li>
            <li><a href="/calendar">Calendar</a></li>
            <li><a href="/links">Links</a></li>
        </ul>

        <div class="account-panel">
            <?php if ($user->data['is_registered']) { ?>
                <div class="account-text">
                    <span class="welcome-message block">
                        Welcome back, <?php print $user->data['username']; ?>
                    </span>
                    <ul>
                        <li class="welcome-text"><a href="#/accounts">Account Management</a></li>
                        <li class="welcome-text">
                            <a href="/board/ucp?i=pm&folder=inbox">
                                (<?php print $user->data['user_unread_privmsg']; ?>)
                            </a>
                        </li>
                        <li class="welcome-text">
                            <a href="/board/ucp?mode=logout&amp;sid=<?php print $user->data['session_id']; ?>">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="avatar-box">
                    <a href="/board/ucp?i=profile&mode=avatar">
                        <img src="/board/download/file.php?avatar=<?php print $user->data['user_avatar']; ?>"/>
                    </a>
                </div>
            <?php } else { ?>
                <div class="sidenavbar">
                    <ul>
                        <li><a class="trigger">Login</a></li>
                        <li><a href="/board/ucp?mode=register">Register</a></li>
                    </ul>
                </div>
            <?php } ?>


        </div>
    </nav>

    <div class="container">
        <?php
        if (curPageURL() != "" && !is_array(curPageURL()) && curPageURL() != 'index') {
            if (file_exists("pages/" . curPageURL() . ".php")) {
                include("pages/" . curPageURL() . ".php");
            } else {
                include("pages/error.php");
            }
        } else if (is_array(curPageURL()) && curPageURL() != 'index') {
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

            <main class="main">
                <article>
                    <div class="panel">
                        <br/>
                        <img class="logo" src="css/images/logo.png" alt="Open RSC Logo"/>

                        <!-- Game Links Section-->
                        <div style="margin-left: 40px; margin-right: 40px; margin-top: 25px; margin-bottom: 15px; color: lightgrey; font-size: 18px;"
                             align="center">

                            <!--<h3>Open RSC</h3>-->
                            <a href="https://game.openrsc.com/downloads/OpenRSC.jar"><b>Download</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://game.openrsc.com/downloads/openrsc.apk"><b>Android</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://github.com/open-rsc/game" target="_blank"><b>GitHub</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://openrsc.com/OpenRSC"><b>Game Info</b></a>
                            <!--<br/><br/>-->

                            <!--<h3>Open Stork PK</h3>
                            <h6><font color="red">(Currently in alpha testing)</font></h6>
                            <a href="https://stork.openrsc.com/downloads/OpenStorkPK.jar"><b>Download</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://stork.openrsc.com/downloads/openstorkpk.apk"><b>Android</b></a>
                            <font
                                    color="#C6A444">|</font>
                            <a href="https://github.com/open-rsc/game" target="_blank"><b>GitHub</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://openrsc.com/OpenStorkPK"><b>Game Info</b></a>
                            <br/><br/>

                            <h3>Slothscape</h3>
                            <h6><font color="red">(Currently in alpha testing)</font></h6>
                            <a href="https://sloth.openrsc.com/downloads/Slothscape.jar"><b>Download</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://sloth.openrsc.com/downloads/slothscape.apk"><b>Android</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://github.com/open-rsc/game" target="_blank"><b>GitHub</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://openrsc.com/Slothscape"><b>Game Info</b></a>
                            <br/><br/>

                            <h3>Wolf Kingdom</h3>
                            <h6><font color="red">(Currently in alpha testing)</font></h6>
                            <a href="https://wolf.openrsc.com/downloads/WolfKingdom.jar"><b>Download</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://wolf.openrsc.com/downloads/wolfkingdom.apk"><b>Android</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://github.com/open-rsc/game" target="_blank"><b>GitHub</b></a> <font
                                    color="#C6A444">|</font>
                            <a href="https://openrsc.com/WolfKingdom"><b>Game Info</b></a>
                            <br/><br/>-->
                        </div>

                        <hr>

                        <div class="news">
                            <?php include 'inc/news.php' ?>
                        </div>
                    </div>
                </article>
            </main>

        <?php } ?>

        <aside>
            <div class="box">
                <div class="side-panel">
                    <div>
                        <h5>Statistics</h5>
                        <dl class="side-menu">
                            <dt>Players Online:</dt>
                            <dd>
                                <b>
                                    <a class="white" href="/online">
                                        <?php echo playersOnline(); ?>
                                    </a>
                                </b>
                            </dd>
                            <dt>Server Status:</dt>
                            <dd>
                                <b>
                                    <?php echo checkStatus("game.openrsc.com", "43594"); ?>
                                </b>
                            </dd>
                            <dt>Registrations Today:
                            <dd>
                                <b>
                                    <a class="white" href="/registrationstoday">
                                        <?php echo newRegistrationsToday(); ?>
                                    </a>
                                </b>
                            </dd>
                            <dt>Logins Today:</dt>
                            <dd>
                                <b>
                                    <a class="white" href="/loginstoday">
                                        <?php echo loginsToday(); ?>
                                    </a>
                                </b>
                            </dd>
                            <dt>Unique Players:</dt>
                            <dd>
                                <b>
                                    <a class="white" href="/stats">
                                        <?php echo uniquePlayers(); ?>
                                    </a>
                                </b>
                            </dd>
                            <dt>Total Players:</dt>
                            <dd>
                                <b>
                                    <a class="white" href="/stats">
                                        <?php echo totalGameCharacters(); ?>
                                    </a>
                                </b>
                            </dd>
                            <dt>Gold:</dt>
                            <dd>
                                <b>
                                    <a class="white" href="/stats">
                                        <?php echo banktotalGold(); ?>
                                    </a>
                                </b>
                            </dd>
                            <dt>Time Played:</dt>
                            <dd>
                                <b>
                                    <a class="white" href="/stats">
                                        <?php echo totalTime(); ?>
                                    </a>
                                </b>
                            </dd>
                        </dl>
                    </div>
                    <div>
                        <iframe src="/inc/discord.html"></iframe>
                    </div>
                </div>
            </div>
        </aside>

    </div> <!-- wrapper -->

    <footer>
        <p>Open RSC is in no way affiliated with JaGex or Runescape Classic.</p>
    </footer>

</div>

<!-- Hidden until "Login" is clicked. -->
<div class="modal-box" id="panel-login">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h4>Open RSC Login</h4>
        <form method="post" action="/board/ucp?mode=login">
            <input type="text" name="username" class="name" id="loginname" placeholder="Username"/>
            <input type="password" name="password" class="password" id="loginpass" placeholder="Password"/>
            <input type="hidden" checked="yes" name="autologin" class="autologin" id="autologin"/>
            <fieldset>
                <input type="submit" value="Log In" name="login" class="submit"/>
                <a class="submit" href="/board/ucp?mode=register">Register</a>
            </fieldset>
            <input type="hidden" name="redirect" value="/board/index"/>
        </form>
    </div>
</div>

</body>
</html>

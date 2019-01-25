<?php
function curPageURL()
{
	$pageUrl = $_SERVER["REQUEST_URI"];
	$page = explode("/", $pageUrl);
	$pos = strpos($page[1], 'index.php');
	if ($pos !== false) {
		$return = 'index.php';
	} else if ($page[2]) {
		$return = array($page[1], $page[2]);
	} else {
		$return = $page[1];
	}
	return $return;
}

define('IN_SITE', true);
error_reporting(1);

require_once('database_config.php');
require_once('charfunctions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Open RSC</title>
	<meta name="description" content="Striving for a replica RSC game and more.">
	<meta name="keywords" content="openrsc,open rsc,rsc,open-rsc,rs classic,orsc evo,openrsc evolution">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		  integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<!-- Javascript -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
			integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
			crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
			integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
			crossorigin="anonymous"></script>
	<script src="../js/grayscale.min.js"></script>
	<script type="text/javascript" src="../js/twitterFetcher.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".clickable-row").click(function () {
				window.location = $(this).data("href");
			});
		});

		function search() {
			// Declare variables
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("inputBox");
			filter = input.value.toUpperCase();
			table = document.getElementById("itemList");
			tr = table.getElementsByTagName("tr");

			// Loop through all table rows, and hide those who don't match the search query
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[0];
				if (td) {
					txtValue = td.textContent || td.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}
	</script>

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="../img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../img/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../img/favicons/favicon-16x16.png">
	<link rel="manifest" href="../img/favicons/site.webmanifest">
	<link rel="mask-icon" href="../img/favicons/safari-pinned-tab.svg" color="#5bbad5">

	<!-- Custom fonts for this template -->
	<script defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js"
			integrity="sha384-EIHISlAOj4zgYieurP0SdoiBYfGJKkgWedPHH4jCzpCXLmzVsw1ouK59MuUtP4a1"
			crossorigin="anonymous"></script>
	<link
		href="https://fonts.googleapis.com/css?family=Exo:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="../css/grayscale.min.css">
	<link rel="stylesheet" href="../css/itemsprites.css">
	<link rel="stylesheet" href="../css/npcsprites.css">

	<!-- Bootstrap style overrides -->
	<link rel="stylesheet" href="../css/style.css">

	<title>Open RSC</title>
</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar bg-black navbar-expand-xl pl-0 pr-0" id="mainNav">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
			data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
			aria-label="Toggle navigation">
		Menu
		<i class="fas fa-bars"></i>
	</button>
	<div class="collapse navbar-collapse pl-2" id="navbarResponsive">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="/">Home</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
				   data-toggle="dropdown"
				   aria-haspopup="true" aria-expanded="false">
					Download
				</a>
				<div class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
					<a class="dropdown-item text-secondary" href="https://game.openrsc.com/downloads/OpenRSC.jar">PC
						Client</a>
					<a class="dropdown-item text-secondary" href="https://game.openrsc.com/downloads/openrsc.apk">Android
						Client</a>
					<div class="dropdown-divider border-info"></div>
					<a class="dropdown-item text-secondary" href="https://github.com/open-rsc/game">Source Code on
						GitHub</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/highscores/skill_total">Highscores</a>
			</li>
			<!--<li class="nav-item">
				<a class="nav-link" href="/chat">Recent Chat</a>
			</li>-->
			<li class="nav-item">
				<a class="nav-link" href="/worldmap">Live Map</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
				   data-toggle="dropdown"
				   aria-haspopup="true" aria-expanded="false">
					Information
				</a>
				<div class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
					<a class="dropdown-item text-secondary" href="/faq">FAQ</a>
					<a class="dropdown-item text-secondary" href="/rules">Rules</a>
					<a class="dropdown-item text-secondary" href="/shar">Shar's Bank</a>
					<div class="dropdown-divider border-info"></div>
					<a class="dropdown-item text-secondary" href="/items">Item Database</a>
					<a class="dropdown-item text-secondary" href="/npcs">NPC Database</a>
					<div class="dropdown-divider border-info"></div>
					<a class="dropdown-item text-secondary" href="/stats">Statistics</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
				   data-toggle="dropdown"
				   aria-haspopup="true" aria-expanded="false">
					Quests
				</a>
				<div class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">
					<a class="dropdown-item text-secondary" href="/quest-arrav">Shield of Arrav</a>
					<!--<div class="dropdown-divider border-info"></div>
                    <a class="dropdown-item text-secondary" href="/items">Member Quest 1</a>-->
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/calendar">Event Calendar</a>
			</li>
		</ul>
	</div>
</nav>

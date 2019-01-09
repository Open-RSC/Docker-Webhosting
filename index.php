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

require_once('inc/database_config.php');
require_once('inc/charfunctions.php');
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
	<script src="js/grayscale.min.js"></script>
	<script type="text/javascript" src="js/twitterFetcher.js"></script>

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
	<link rel="manifest" href="img/favicons/site.webmanifest">
	<link rel="mask-icon" href="img/favicons/safari-pinned-tab.svg" color="#5bbad5">

	<!-- Custom fonts for this template -->
	<script defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js"
			integrity="sha384-EIHISlAOj4zgYieurP0SdoiBYfGJKkgWedPHH4jCzpCXLmzVsw1ouK59MuUtP4a1"
			crossorigin="anonymous"></script>
	<link
		href="https://fonts.googleapis.com/css?family=Exo:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/grayscale.css" rel="stylesheet">

	<!-- Bootstrap style overrides -->
	<style>
		html {
			overflow: hidden;
		}

		::-webkit-scrollbar {
			display: none;
		}

		.about-section {
			height: 100vh;
		}

		a:hover {
			text-decoration: none;
		}

		.display-3 {
			padding-top: 3rem;
			color: #008db5;
			font-family: 'Press Start 2P', cursive;
			font-size: 55px;
			filter: drop-shadow(0px 1px 50px #058ab5);
			text-shadow: 0 1px 0 #ccc,
			0 1px 0 #c9c9c9,
			0 2px 0 #bbb,
			0 3px 0 #b9b9b9,
			0 2px 0 #aaa,
			0 3px 1px rgba(0, 0, 0, .1),
			0 0 5px rgba(0, 0, 0, .1),
			0 1px 1px rgba(0, 0, 0, .3),
			0 2px 3px rgba(0, 0, 0, .2),
			0 3px 5px rgba(0, 0, 0, .25),
			0 5px 7px rgba(0, 0, 0, .2),
			0 7px 10px rgba(0, 0, 0, .15);
			padding-bottom: 20px;
		}

		li {
			list-style-type: none;
		}

		.nav-item {
			font-size: 16px;
			font-weight: 600;
		}

		.fullscreen-bg__video {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(255, 255, 255, 0.95);
		}

		.fullscreen-bg {
			position: fixed;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			overflow: hidden;
			z-index: -100;
		}

		.picture {
			width: 450px;
			height: auto;
			object-fit: scale-down;
			filter: drop-shadow(0px 0px 3px #17a2b8) brightness(70%);;
			margin-bottom: 20px;
		}

		@media (max-width: 968px) {
			.display-3 {
				font-size: 42px;
			}

			.title {
				display: none;
			}

			.picture {
				display: none;
			}

			.side-left {
				display: none;
			}

			.fullscreen-bg {
				width: 100vh;
			}

			.side-right {
				display: none;
			}

			.pc {
				display: none;
			}

			.btn {
				width: 350px;
			}

			.middle {
				width: 350px;
				padding-left: 0px;
				padding-right: 0px;
			}
		}

		.side-right {
			padding: 1rem;
			width: 400px;
			height: 100vh;
			background: #111;
			background: rgba(20, 20, 20, 0.9);
		}

		.side-left {
			padding: 1rem;
			width: 400px;
			background: #111;
			height: 100vh;
			background: rgba(20, 20, 20, 0.9);
		}

		.side-middle {
			padding: 1rem;
			background: #111;
			height: 100vh;
			background: rgba(20, 20, 20, 0.9);
		}

		@media (min-width: 969px) {
			.middle {
				width: 450px;
			}
		}

		@media (min-width: 969px) {
			.btn {
				width: 225px;
			}
		}

		@media (min-aspect-ratio: 16/9) {
			.fullscreen-bg__video {
				height: 300%;
				top: -100%;
			}
		}

		@media (max-aspect-ratio: 16/9) {
			.fullscreen-bg__video {
				width: 300%;
				left: -100%;
			}
		}

		.tweet {
			text-align: left;
		}

		.timePosted {
			width: 15%;
			float: left;
		}

		.box {
			margin-bottom: 20px;
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-border-radius: 10px / 100px;
			border-radius: 10px / 100px;
		}

		.main {
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-border-radius: 10px / 100px;
			border-radius: 10px / 100px;
		}

		aside {
			float: right;
			width: 270px;
			height: 285px;
			padding: 21px 22px 30px;
		rgba(20, 20, 20, 0.75);
			border-top-right-radius: 8px;
			border-top-left-radius: 8px;
		}

		.wrapper {
			display: flex;
			flex-direction: column;
			width: 1100px;
			margin: 0 auto;
			padding: 32px 48px 20px;
			color: rgb(60, 60, 60);
			-webkit-text-size-adjust: 100%;
			-webkit-tap-highlight-color: rgb(255, 255, 158);
			line-height: normal;
		}

		.navigation {
			background: url("/img/theme/grey-bar-wide.gif") repeat-x;
			background-size: auto 100%;
			margin: 20px 0;
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-border-radius: 10px / 100px;
			border-radius: 10px / 100px;
		}

		.account-panel {
			width: 333px;
			height: 64px;
			display: flex;
			flex-direction: row;
			justify-content: space-around;
		}

		.account-text {
			padding: 16px 5px;
		}

		.account-text > ul {
			display: flex;
			flex-direction: row;
			justify-content: space-around;

		}

		.account-text > ul li {
			list-style: none;
		}

		.avatar-box {
			width: 51px;
			height: 64px;
			padding-left: 5px;
			padding-top: 6px;
		}

		.avatar-box img {
			width: 50px;
			height: 50px;
		}

		#panel-login, #create, #pass, #delete, #error {
			width: 455px;
			height: 280px;
		rgba(20, 20, 20, 1);
		}

		.error-panel {
			width: 100%;
			display: flex;
			flex-direction: row;
			text-align: center;
			font-weight: 700;
			font-size: 24px;
			font-family: "Exo", sans-serif;
			height: 300px;
		}

		.error-panel p {
			width: 100%;
			height: 60px;
			line-height: 260px;
		}

		label {
			font: 14px 'Exo', sans-serif;
			display: block;
			color: #ffffff;
			text-shadow: 0 0 2px #201B18;
		}

		.name, .password, textarea {
			margin: 5px;
			font: 14px 'Exo', sans-serif;
			width: 250px;
			background: rgba(42, 34, 32, 1);
			padding: 5px;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px;
			color: #C6A444;
			border: 1px solid #444;
			text-shadow: 0 0 2px #201B18;
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			background: #0D1A2D linear-gradient(to bottom, rgba(8, 17, 38, 1) 0, rgba(13, 26, 45, 0) 32px);
		}

		.autologin {
			width: 250px;
			margin: 10px 0;
		}

		.submit {
			float: left;
			display: inline;
			margin: 5px 5px;
			width: 121px;
			font: 14px 'Exo', sans-serif;
			color: #C6A444;
			text-align: center;
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			background-image: -webkit-gradient(
				linear,
				left bottom,
				left top,
				color-stop(0.31, rgba(32, 27, 24, 1)),
				color-stop(0.99, rgba(42, 34, 32, 1))
			);
			background-image: -moz-linear-gradient(
				center bottom,
				rgba(32, 27, 24, 1) 31%,
				rgba(42, 34, 32, 1) 99%
			);
			padding: 5px;
			border: none #4A4A4A;
			background-color: #1a1a1a;
			background-image: linear-gradient(to top, #111, #333);
		}

		.submit:active {
			color: white;
			border: 1px solid #444;
			background-image: -webkit-gradient(
				linear,
				left bottom,
				left top,
				color-stop(0.31, rgba(42, 34, 32, 1)),
				color-stop(0.99, rgba(32, 27, 24, 1))
			);
			background-image: -moz-linear-gradient(
				center bottom,
				rgba(42, 34, 32, 1) 31%,
				rgba(32, 27, 24, 1) 99%
			);
		}

		.featured-box {
			min-height: 400px;
			background: #201B18;
		}

		.panel {
			background: #111;
			height: 100vh;
			width: 100vw;
			background: rgba(20, 20, 20, 0.75);

		}

		.side-panel {
			height: 259px;
			display: flex;
			flex-direction: column;
		}

		.side-panel > div:first-child {
			padding: 10px 7px;
		}

		.side-panel > div:last-child {
			padding-left: 10px;
			height: 70px;
		}

		/* modal! */
		.modal-box {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			margin: auto;
			opacity: 0;
			visibility: hidden;
			transform: scale(1.1);
			transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
		}

		.modal-content {
			width: 100%;
			height: 100%;
			margin-top: 30px;
			border-radius: 0.5rem;
		}

		.modal-content > * {
			display: flex;
			flex-direction: column;
			width: 100%;
			margin: 0 auto;
			align-items: center;
		}

		.close-button {
			float: right;
			width: 1.5rem;
			line-height: 1.5rem;
			text-align: center;
			cursor: pointer;
			border-radius: 0.25rem;
		}

		.close-button:hover {
			background-color: darkgray;
		}

		.show-modal {
			opacity: 1;
			visibility: visible;
			transform: scale(1.0);
			transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
		}

		.trigger {
			cursor: pointer;
		}

		.content {
			background: #201B18;
			background-image: -webkit-gradient(
				linear,
				left bottom,
				left top,
				color-stop(0.31, rgba(32, 27, 24, 1)),
				color-stop(0.99, rgba(42, 34, 32, 1))
			);
			background-image: -moz-linear-gradient(
				center bottom,
				rgba(32, 27, 24, 1) 31%,
				rgba(42, 34, 32, 1) 99%
			);
			padding: 1px;
		}

		.highscores {
			display: flex;
			justify-content: space-around;
			padding-top: 15px;
		}

		.highscores > .panel:first-child {
			flex: 0 15%;
			margin-bottom: 10px;
		}

		.highscores > .panel:last-child {
			flex: 0 85%;
			margin-bottom: 10px;
		}

		.skill-icon {
			width: 16px;
			height: 16px;
		}

		.skill {
			display: flex;
			flex-direction: column;
			width: 150px;
			background: #2A2220;
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
		}

		.skill li {
			flex: 1 0 auto;
			width: 130px;
			color: white;
			list-style: none;
			padding: 5px 10px 5px;
			text-shadow: 0 0 2px #201B18;
			font: 14px 'Exo', sans-serif;
			text-transform: uppercase;
			-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
			-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
		}

		.skill li:nth-child(odd) {
			background: #261e1c;
		}

		.skill li:nth-child(even) {
			background: #221c1a;
		}

		.skill li a {
			color: #C6A444;
		}

		.skill ul li a:hover {
			color: white;
			text-decoration: none;
			-webkit-transition: all 0.2s ease-in-out;
			-moz-transition: all 0.2s ease-in-out;
			-o-transition: all 0.2s ease-in-out;
			transition: all 0.2s ease-in-out;
		}

		.skill ul li img {
			vertical-align: middle;
			margin-right: 5px;
		}

		.ranking {
			flex: 0 auto;
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
		}

		.ranking h4 {
			box-shadow: 0 2px 2px black;
			margin-bottom: 1px;
			font-weight: 700;
			text-transform: capitalize;
			background-color: rgba(42, 34, 32, 1);
		}

		.ranking table {
			border-collapse: collapse;
		}

		.ranking tr {
			color: white;
			text-shadow: 0 0 2px #201B18;
			font: 16px 'Exo', sans-serif;
			text-align: right;
		}

		.ranking tr:first-child {
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
		}

		.ranking th {
			padding: 5px;
			font: 1em 'Exo', sans-serif;
			font-weight: 700;
		}

		.ranking td {
			padding: 4px;
		}

		.ranking tbody tr:first-child {
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			font-size: 1.1em;
			font-weight: bold;
		}

		.ranking tr:nth-child(even) {
			background: rgba(32, 27, 24, 0.1);
		}

		.ranking tr:nth-child(odd) {
			background: rgba(42, 34, 32, 1);
		}

		.ranking tr a {
			color: #C6A444;
		}

		.ranking tr a:hover {
			color: white;
			text-decoration: none;
			-webkit-transition: all 0.2s ease-in-out;
			-moz-transition: all 0.2s ease-in-out;
			-o-transition: all 0.2s ease-in-out;
			transition: all 0.2s ease-in-out;
		}

		#sm-list {
			width: 130px;
			float: left;
			display: inline;
		}

		#sm-list ul {
			list-style: none;
			float: left;
		}

		#sm-list ul li {
			float: left;
			width: 160px;
			padding: 10px 20px;
			color: white;
			text-shadow: 0 0 2px #201B18;
			font: 12px 'Exo', sans-serif;
		}

		#sm-list ul li:hover {
			background: rgba(42, 34, 32, 1);
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
		}

		.active {
			background: rgba(42, 34, 32, 1);
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
		}

		#character-details {
			float: right;
			width: 320px;
			padding: 10px 20px;
			background: rgba(42, 34, 32, 1);
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
		}

		.rank {
			width: 70px;
			text-align: center;
		}

		.username {
			width: 220px;
			text-align: left;
		}

		td.username {
			padding-left: 7px;
		}

		.level {
			width: 80px;
		}

		.experience {
			width: 220px;
			text-align: right;
			padding-right: 5px;
		}

		#character {
			display: inline;
		}

		.flex-row {
			display: flex;
			flex-direction: row;
			justify-content: space-around;
		}

		.stats {
			float: left;
			width: 100%;
			margin: 10px 0;
			padding: 5px 0;
			background: rgba(42, 34, 32, 1);
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
		}

		#sm-skill {
			float: right;
			width: 330px;
			-moz-column-width: 45px;
			-webkit-column-width: 45px;
			-moz-column-count: 5;
			-moz-column-gap: 20px;
			-webkit-column-count: 5;
			-webkit-column-gap: 20px;
			column-width: 45px;
			column-count: 5;
			column-gap: 20px;
			padding: 5px 0;
		}

		#sm-stats {
			width: 200px;
			display: inline;
			float: left;
			padding: 5px 5px;
		}

		#hero-page-details {
			width: 150px;
			float: left;
			display: inline;
		}

		#button-links {
			width: 150px;
			float: right;
			display: inline;
		}

		#name-fails, #pass-fails, #verification-fails, #user-fails {
			border: 1px solid #cd0a0a;
			background: #a32d00;
			color: white;
			padding: 5px;
			margin: -10px 0 10px 0;
		}

		.accomplishments {
			margin: 0 auto;
			text-align: center;
		}

		.graph {
			width: 315px;
			height: 300px;
			margin: 0 auto;
		}

		.graph2 {
			width: 390px;
			height: 300px;
		}

		.sm-skill {
			font: 12px 'Exo', sans-serif;
			text-shadow: 0 0 2px #201B18;
			text-transform: uppercase;
		}

		.sm-skill2 {
			font: 12px 'Exo', sans-serif;
			text-shadow: 0 0 2px #201B18;
			text-transform: uppercase;
		}

		.sm-skill a {
			text-decoration: none;
		}

		.sm-skill a:hover {
			text-decoration: none;
			-webkit-transition: all 0.2s ease-in-out;
			-moz-transition: all 0.2s ease-in-out;
			-o-transition: all 0.2s ease-in-out;
			transition: all 0.2s ease-in-out;
		}

		.sm-skill img {
			vertical-align: middle;
			padding-right: 5px;
		}

		.sm-skill2 img {
			vertical-align: middle;
			padding-left: 10px;
		}

		.sm-stats {
			display: block;
			font: 12px 'Exo', sans-serif;
			text-shadow: 0 0 2px #201B18;
			text-transform: uppercase;
			padding: 2px 0;
		}

		.sm-stats a {
			text-decoration: none;
		}

		.sm-stats a:hover {
			text-decoration: none;
			-webkit-transition: all 0.2s ease-in-out;
			-moz-transition: all 0.2s ease-in-out;
			-o-transition: all 0.2s ease-in-out;
			transition: all 0.2s ease-in-out;

		}

		.line-chart {
			width: 100%;
		}

		.pie-stats {
			width: 100%;
		}

		#red {
			font: 12px 'Exo', sans-serif;
			color: red;
			text-shadow: 0 0 2px #201B18;
			text-transform: uppercase;
			padding: 2px 0;
		}

		#green {
			font: 12px 'Exo', sans-serif;
			color: green;
			text-shadow: 0 0 2px #201B18;
			text-transform: uppercase;
			padding: 2px 0;
		}

		#slider {
			position: relative;
			width: 580px; /* Change this to your images width */
			height: 246px; /* Change this to your images height */
			background: url(images/loading.gif) no-repeat 50% 50%;

		}

		#slider img {
			position: absolute;
			top: 0;
			left: 0;
			display: none;
			width: 600px;
		}

		#slider a {
			border: 0;
			display: block;
		}

		.sidebar {
			width: 276px;
			margin: 0 0 20px 0;
		}

		.side-menu {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.side-menu > dt {
			flex: 0 50%;
		}

		.side-menu > dd {
			flex: 0 50%;
			text-align: right;
		}

		.side-menu > dt:nth-child(5) {
			flex: 0 65%;
		}

		.side-menu > dd:nth-child(6) {
			flex: 0 35%;
		}

		.side-menu a:hover {
			color: gold;
		}

		.white {
			color: white;
		}

		.red {
			color: red;
		}

		.lime {
			color: lime;
		}

		.widget {
			background-image: -webkit-gradient(
				linear,
				left bottom,
				left top,
				color-stop(0.31, rgba(32, 27, 24, 1)),
				color-stop(0.99, rgba(42, 34, 32, 1))
			);
			background-image: -moz-linear-gradient(
				center bottom,
				rgba(32, 27, 24, 1) 31%,
				rgba(42, 34, 32, 1) 99%
			);
			padding: 20px;
		}

		.button {
			color: #C6A444;
			padding: 5px;
			display: block;
			margin: 10px 0;
			text-align: center;
			-webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
			background-image: -webkit-gradient(
				linear,
				left bottom,
				left top,
				color-stop(0.31, rgba(32, 27, 24, 1)),
				color-stop(0.99, rgba(42, 34, 32, 1))
			);
			background-image: -moz-linear-gradient(
				center bottom,
				rgba(32, 27, 24, 1) 31%,
				rgba(42, 34, 32, 1) 99%
			);
		}

		.button a {
			color: #C6A444;
			text-decoration: none;
		}

		.button:active {
			color: white;
			background-image: -webkit-gradient(
				linear,
				left bottom,
				left top,
				color-stop(0.31, rgba(42, 34, 32, 1)),
				color-stop(0.99, rgba(32, 27, 24, 1))
			);
			background-image: -moz-linear-gradient(
				center bottom,
				rgba(42, 34, 32, 1) 31%,
				rgba(32, 27, 24, 1) 99%
			);
		}

		.container {
			margin-bottom: 15px;
		}

		footer {
			text-align: center;
			background: url("/img/theme/grey-bar-wide.gif") repeat-x;
			background-size: auto 100%;
			position: relative;
		}

		footer > p {
			height: 20px;
			margin: 18px 0 15px;
		}
	</style>

	<title>Open RSC</title>
</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-dark bg-black navbar-expand-lg pl-0 pr-0" id="mainNav">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
			data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
			aria-label="Toggle navigation">
		Menu
		<i class="fas fa-bars"></i>
	</button>
	<div class="collapse navbar-collapse pl-2" id="navbarResponsive">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="/">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="https://game.openrsc.com/downloads/OpenRSC.jar">PC</a>
			</li>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger"
				   href="https://game.openrsc.com/downloads/openrsc.apk">Android</a>
			</li>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="#highscores">Highscores</a>
			</li>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="#worldmap">Live Map</a>
			</li>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="#information">Information</a>
			</li>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="https://github.com/open-rsc/game">Source Code</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="#login">Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="#register">Register</a>
			</li>
		</ul>
	</div>
</nav>

<div class="fullscreen-bg">
	<video id="video" class="fullscreen-bg__video" playsinline="playsinline" autoplay="autoplay" muted="muted"
		   loop="loop">
		<script>
			var videoPlayer = document.getElementById('video');

			function playIt() {
				videoPlayer.play();
				var videos = [
					"1",
					"2",
					"3",
					"4",
				], videos = videos[Math.floor(Math.random() * videos.length)];
				videoPlayer.src = "img/" + videos + ".mp4";
			}

			videoPlayer.addEventListener('ended', playIt, false);
			playIt();
		</script>
	</video>
</div>

<!-- Title Section -->
<section id="home" class="text-white">
	<div class="pl-0 pr-0 pt-0">
		<div class="row" style="margin-left: 0px; margin-right: 0px;">

			<?php
			if (curPageURL() != "" && !is_array(curPageURL()) && curPageURL() != 'index') {
				if (file_exists("pages/" . curPageURL() . ".php")) {
					?>
					<div class="position-fixed">
						<?php
						include("pages/" . curPageURL() . ".php");
						?>
					</div>
					<?php
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

			<!-- Left column -->
			<div class="side-left text-left text-info border-right border-info pl-1 pr-1"
				 style="font-size: 10px;">
				<h4>Latest Achievements</h4>
				<div>
					<?php activityfeed() ?>
				</div>
			</div>

			<!-- Center column with title text -->
			<div class="side-middle col mx-auto text-center">
				<h2 class="display-3 mb-0">OPEN RSC</h2>
				<div class="text-white-50">Striving for a replica RSC game and more</div>
				<br>
				<a href="https://game.openrsc.com/downloads/openrsc.apk">
					<img class="picture" src="img/android.png" class="img-fluid" height="300px" width="600px;">
				</a>
				<br>
				<button type="button" class="pc btn btn-dark btn-outline-info">PC Client</button>
				<button type="button" class="mobile btn btn-dark btn-outline-info">Android</button>
				<br>
				<br>
				<div class="middle container-fluid border-top border-info">
					<div class="text-left text-primary" style="font-size: 13px;">
						<br>
						<h4 class="text-info">Statistics</h4>
						<div>
							Players Online:
							<b>
								<a href="/online">
							<span class="text-info float-right">
								<?php echo playersOnline(); ?>
							</span>
								</a>
							</b>
						</div>
						<div>
							Server Status:
							<span class="float-right">
							<?php echo checkStatus("game.openrsc.com", "43594"); ?>
						</span>
						</div>
						<div>
							Registrations Today:
							<b>
								<a href="/registrationstoday">
								<span class="text-info float-right">
									<?php echo newRegistrationsToday(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Logins Today:
							<b>
								<a href="/loginstoday">
								<span class="text-info float-right">
									<?php echo loginsToday(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Unique Players:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
									<?php echo uniquePlayers(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Total Players:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
									<?php echo totalGameCharacters(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Gold:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
									<?php echo banktotalGold(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Time Played:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
									<?php echo totalTime(); ?>
								</span>
								</a>
							</b>
						</div>
						<br>
					</div>

				</div>
			</div>

			<!-- Right column -->
			<div>
				<div class="side-right border-left border-info pr-1"
					 style="font-size: 13px;">
					<!-- Twitter feed -->
					<h4 class="mt-3 text-info" style="text-indent: 40px">Recent News</h4>
					<div class="text-primary" id="tweets"></div>
				</div>
			</div>
		</div>

		<?php } ?>

		<!-- Footer -->
		<!--<div class="bg-black text-white fixed-bottom social d-flex justify-content-center">
            <a href="#" class="mx-2">
                <i class="fab fa-reddit"></i>
            </a>
            <a href="#" class="mx-2">
                <i class="fab fa-discord"></i>
            </a>
            <a href="#" class="mx-2">
                <i class="fab fa-github"></i>
            </a>
        </div>-->
</section>

</body>
</html>

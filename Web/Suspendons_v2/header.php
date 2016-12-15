<?php
	$full_filename = substr(strrchr($_SERVER['REQUEST_URI'],"/"),1);
	$parse = explode('.',$full_filename);
	$filename = $parse[0];
?>

<!DOCTYPE HTML>
<!--
	Reflex by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<html>

<head>
	<title>Suspen'Dons | <?php echo $title ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="shortcut icon" type="image/x-icon" href="images/SD favicon.png">
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>

<body>

	<!-- Header -->
	<header id="header">
		<nav>
			<ul>
				<li><a href="#menu">Menu</a></li>
			</ul>
		</nav>
	</header>

	<!-- Menu -->
	<nav id="menu">
		<h2>Menu</h2>
		<ul class="links">
			<li><a <?php if ($filename == "index") {echo "class=\"active\"";};?> href="index.php">Accueil</a></li>
			<li><a <?php if ($filename == "concept") {echo "class=\"active\"";};?> href="concept.php">Concept</a></li>
			<li><a <?php if ($filename == "team") {echo "class=\"active\"";};?> href="team.php">L'équipe</a></li>
			<li><a <?php if ($filename == "services") {echo "class=\"active\"";};?> href="services.php">Liste des services</a></li>
			<li><a <?php if ($filename == "carte") {echo "class=\"active\"";};?> href="carte.php">Carte des services</a></li>
			<!--<li><a href="temoins.php">Témoignages</a></li>-->
		</ul>
		<ul class="actions vertical">
			<li><a <?php if ($filename == "don") {echo "class=\"active\"";};?> href="don.php" class="button fit special">Je fais un don</a></li>
		</ul>
	</nav>

	<!-- Wrapper -->
	<div id="wrapper">

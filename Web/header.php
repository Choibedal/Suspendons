<?php
	$full_filename = substr(strrchr($_SERVER['REQUEST_URI'],"/"),1);
	$parse = explode('.',$full_filename);
	$filename = $parse[0];
?>

<!DOCTYPE HTML>
<!--
	Scalar by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<html>

<head>
	<title>Suspen'Dons |
		<?php echo $title ?>
	</title>
	<meta charset="utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>

<body class="landing">

	<!-- Header -->
	<header id="header">
		<div class="container">
			<!--<h1><a href="index.html" class="icon fa-home">Suspen' Dons</a></h1>-->
			<h1><a href="index"><img src="images/icon.png" class="logo_icon"/>Suspen' Dons</a></h1>
			<nav id="nav">
				<ul>
					<li <?php if ($filename=="index" || $filename=="") { echo 'class="current"';} ?> ><a href="index">Accueil</a></li>
					<li <?php if ($filename=="concept" ) { echo 'class="current"';} ?> >				<a href="concept">Concept</a></li>
					<li <?php if ($filename=="team" ) { echo 'class="current"';} ?> >					<a href="team">L'Equipe</a></li>
<!--					<li --><?php //if ($filename=="don" ) { echo 'class="current"';} ?><!-- >					<a href="don">Don</a></li>-->
<!--					<li --><?php //if ($filename=="carte" ) { echo 'class="current"';} ?><!-- >					<a href="carte">Carte</a></li>-->
<!--					<li --><?php //if ($filename=="faq" ) { echo 'class="current"';} ?><!-- >				    <a href="faq">FAQ</a></li>-->
				</ul>
			</nav>
		</div>
	</header>

	<!-- Page Wrapper -->
	<div id="page-wrapper">

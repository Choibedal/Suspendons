<!DOCTYPE HTML>
<!--
	Reflex by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<?php
switch($_GET['don'])
{
	case "tint":
	$valeur = 2;
	$nom = "douche";
	break;
	case "meal":
	$valeur = 5;
	break;
	case "scissors":
	$valeur = 10;
	break;
	case "gift":
	$valeur = 17;
	break;
	case "briefcase":
	$valeur = 25;
	break;
	case "none":
	$valeur = 0;
	break;
}
?>
<html>
	<head>
		<title>Suspen'Don</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
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
					<li><a href="index.php">Index</a></li>
					<li><a href="index.php">Concept</a></li>
					<li><a href="index.php">L'équipe</a></li>
					<li><a href="index.php">Les commerces participants</a></li>
					<li><a href="index.php">Témoignages</a></li>
				</ul>
				<ul class="actions vertical">
					<li><a href="don.php" class="button fit special">Je fais un don</a></li>
					<li><a href="mapCISCO.html" class="button fit">Services proches</a></li>
				</ul>
			</nav>

		<!-- Wrapper -->
			<div id="wrapper">
<!--
				<!-- Intro -->
					<!--<section id="intro" class="wrapper featured style1">
						<div class="inner">
							<span class="image"><img src="images/index.jpg" alt="" /></span>
							<div class="content">
								<header>
									<h1>Je donne un repas !</h1>
									<p>Donner est un geste important, et peu sauver des vies;</p>
								</header>
								
							</div>
						</div>
					</section> -->

				<!-- One -->
					<section class="wrapper style2 special">
						<div id="tone" class="inner">
							<header>
								<h2>Je choisis la valeur de mon don</h2>
								
							</header>
							<section>
								
									<form method="post" action="index2.php">
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="demo-name" id="demo-name" value="<?php echo $valeur; ?> euros" /></div>
												<div class="6u$ 12u$(xsmall)">
												
													<input type="submit" value="Envoyer mon don" class="special" />
											</div>
											</div>
											
										
									</form>
								</section>
								<footer>
								<ul class="actions">
									<li><a href="mapCISCO.html" class="button">Carte des services</a></li>
								</ul>
							</footer>
						</div>
					</section>

				<!-- Two -->
					

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
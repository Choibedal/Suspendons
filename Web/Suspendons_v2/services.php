<?php include "header.php";?>

<!-- Don -->
<section id="services" class="two">
	<div class="container">

		<header>
			<h2>Voici la liste des services</h2>
		</header>

		<table class="default">
			<thead>
				<tr>
					<th style="text-align:center">Type</th>
					<th style="text-align:center">Description</th>
					<th style="text-align:center">Prix</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a href="don.php?don=tint" style="text-decoration:underline">Une douche</a></td>
					<td>Un accès à l'hygiène de base dans un hotel / une piscine</td>
					<td>2€</td>
				</tr>
				<tr>
					<td><a href="don.php?don=meal" style="text-decoration:underline">Plat</a></td>
					<td>Un repas chez un de nos restaurateurs partenaires</td>
					<td>5€</td>
				</tr>
				<tr>
					<td><a href="don.php?don=scissors" style="text-decoration:underline">Coupe de cheveux / barbe</a></td>
					<td>Reprendre goût à la vie, c'est d'abord reprendre confiance en soir</td>
					<td>10€</td>
				</tr>
				<tr>
					<td><a href="don.php?don=gift" style="text-decoration:underline">Pack bien-être</a></td>
					<td>Offrez une journée de confort à un sans-domicile (douche + repas + coiffeur)</td>
					<td>17€</td>
				</tr>
				<tr>
					<td><a href="don.php?don=briefcase" style="text-decoration:underline">Pack Embauche</a></td>
					<td>Aidez un sans-domicile à réussir son entretien : douche, repas, coiffeur et pressing.</td>
					<td>25€</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2">Ces prix sont indicatifs : <a href="don.php?don=none" style="text-decoration:underline">choisissez le montant de votre don.</a></td>
					<td></td>
				</tr>
			</tfoot>
		</table>

		<p>Vous pouvez offrir un sandwich, une séance chez le coiffeur, un hébergement d'une nuit, etc ...</p>
		</header>
		<ul class="icons major style2">
			<li><a href="don.php?don=tint"><span class="icon fa-tint"></span></a></li>
			<li>
				<a href="don.php?don=meal"><span class="icon fa-cutlery"><span class="label">Ipsum</span></span></a></li>
			<li>
				<a href="don.php?don=scissors"><span class="icon fa-scissors"><span class="label">Dolor</span></span></a></li>
			<li>
				<a href="don.php?don=gift"><span class="icon fa-gift"><span class="label">Feugiat</span></span></a></li>
			<li>
				<a href="don.php?don=briefcase"><span class="icon fa-briefcase"><span class="label">Tempus</span></a></span>
			</li>
		</ul>
		<p>Si vous, ou une personne que vous apercevez dans la rue, a besoin, d'aide, n'hésitez pas à cliquer sur le lien suivant et lui indiquer les services disponibles aux alentours.</p>
	</div>
	</div>

	<?php include "footer.php";?>

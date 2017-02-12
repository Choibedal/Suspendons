<?php
  $title="Contact";
  include 'header.php';
?>

<!-- Main-->
<div id="main" class="wrapper style3">
	<div class="container 75%">
		<header class="major">
			<h2>Contact</h2>
			<p>Si vous souhaitez des précisions ou tout simplement nous contacter, n'hésitez pas.</p>
		</header>

		<!-- Content -->
		<section id="content">
			<form method="post" action="#">
				<div class="row uniform 50%">
					<div class="6u 12u$(xsmall)">
						<input type="text" name="name" id="name" value="" placeholder="Nom" />
					</div>
					<div class="6u$ 12u$(xsmall)">
						<input type="email" name="email" id="email" value="" placeholder="E-mail" />
					</div>
				</div>
				<div class="row uniform 50%">
					<div class="12u$">
						<input type="text" name="subject" id="subject" value="" placeholder="Sujet" />
					</div>
				</div>
				<div class="row uniform 50%">
					<div class="12u$">
						<textarea name="message" id="message" placeholder="Entrez votre message" rows="6"></textarea>
					</div>
				</div>
				<div class="row uniform">
					<div class="12u$">
						<ul class="actions align-center">
							<li><input type="submit" value="Envoyez votre Message" class="special" /></li>
							<li><input type="reset" value="Reset Form" /></li>
						</ul>
					</div>
				</div>
			</form>
		</section>

	</div>
</div>

<?php include "footer.php";?>

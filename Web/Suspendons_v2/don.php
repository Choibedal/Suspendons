<?php
  $title="Don";
  include 'header.php';

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
  	case "":
  	$valeur = 0;
  	break;
  }

?>

    <section class="wrapper style1 special">
        <div id="tone" class="inner">
            <header>
                <h2>Je choisis la valeur de mon don</h2>
            </header>

            <form method="post" action="index2.php">
                <div class="row uniform">
                    <div class="6u 12u$(xsmall)">
                        <label><input type="number" name="don" id="don" value="<?php echo $valeur; ?>" /> €</label></div>
                    <div class="6u$ 12u$(xsmall)">
                        <input type="submit" value="Envoyer mon don" class="special" />
                    </div>
                </div>
            </form>

            <p>
                Sachez qu'il vous est tout à fait possible de choisir vous même le montant de votre don, la valeur indiqué n'est qu'une indication.
            </p>

            <footer>
                <ul class="actions">
                    <li><a href="services.php" class="button">Carte des services</a></li>
                </ul>
            </footer>
        </div>
    </section>

    <?php include'footer.php';?>

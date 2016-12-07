<?php include "header.php"; ?>

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

    <section class="two">
        <div id="value" class="container">
            <header>
                <h2>Je choisis la valeur de mon don :</h2>
            </header>
            <section>

                <form method="post" action="index2.php">
                    <div class="row uniform">
                        <div class="6u 12u$(mobile)">
                            <input type="text" name="demo-name" id="demo-name" value="<?php echo $valeur; ?> euros" /></div>
                        <div class="6u 12u$(mobile)">

                            <input type="submit" value="Envoyer mon don" class="special" />
                        </div>
                    </div>
                </form>
            </section>

            <footer>
                <ul class="hidden">
                    <li><a href="map.php" class="button">Carte des services</a></li>
                </ul>
            </footer>
        </div>
    </section>

    <?php include "footer.php"; ?>

<?php
$title = "Don";
include "header.php";

$url = parse_url($_SERVER['REQUEST_URI']);

if (isset($url['query'])){

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
  }
}
else {
  $valeur =0;
}
?>

<section class="wrapper style4 special">
    <div id="tone" class="container">
        <header>
            <h2>Je choisis la valeur de mon don</h2>
            <p class="important">
              Important : Il n'est pas encore possible de réaliser de dons pour l'association.
            </p>
        </header>
        <!--<form method="post" action="https://www.paypal.com/cgi-bin/webscr"> -->
        <form method="post" action="">
            <input type="hidden" name="cmd" value="_donations">
            <input type="hidden" name="business" value="clement.vachet@viacesi.fr">
            <input type="hidden" name="lc" value="FR">
            <input type="hidden" name="item_name" value="Suspen' Dons">
            <input type="hidden" name="no_note" value="0">
            <input type="hidden" name="currency_code" value="EUR">
            <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
            <div class="row uniform">
                <div class="6u 12u$(xsmall)">
                    <label><input type="number" name="amount" id="don" value="<?php echo $valeur;?>" /> €</label></div>
                <div class="6u$ 12u$(xsmall)">
                    <input type="submit" value="Envoyer mon don" class="special disabled" />
                </div>
            </div>
        </form>

        <p>
            Sachez qu'il vous est tout à fait possible de choisir vous même le montant de votre don, la valeur indiqué n'est qu'une indication.
        </p>

        <footer>
            <ul class="actions">
                <li><a href="concept#services" class="button">Carte des services</a></li>
            </ul>
        </footer>
    </div>
</section>

<section class="wrapper style2 special">
    <div id="paypal" class="container">
        <header>
            <h2>Régler via Paypal</h2>
        </header>
        <!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">-->
        <form action="" method="post" target="_top">
            <input type="hidden" name="cmd" value="_donations">
            <input type="hidden" name="business" value="suspendons@suspendons.fr">
            <input type="hidden" name="lc" value="FR">
            <input type="hidden" name="item_name" value="Suspen' Dons">
            <input type="hidden" name="no_note" value="0">
            <input type="hidden" name="currency_code" value="EUR">
            <input type="hidden" name="amount" value="<?php echo $valeur;?>">
            <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
            <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
    </div>
</section>

<section class="wrapper style3 special">
    <div id="video" class="container">
        <header>
            <h2>Financer gratuitement en regardant une vidéo publicitaire</h2>
        </header>
        <iframe width="100%" height="650px" src="https://www.youtube.com/embed/Y9GCM9DZUJo" frameborder="0" allowfullscreen></iframe>
    </div>
</section>

<?php include "footer.php";?>

<?php
  $title="Liste des services";
  include 'header.php';
?>

<!-- One -->
<section id="intro" class="wrapper style1 texte">
    <div class="inner">
        <header>
            <h1>Liste des services et packs disponibles :</h1>
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
                    <td><a href="don?don=tint">Une douche</a></td>
                    <td>Un accès à l'hygiène de base dans un hotel / une piscine</td>
                    <td>2€</td>
                </tr>
                <tr>
                    <td><a href="don?don=meal">Plat</a></td>
                    <td>Un repas chez un de nos restaurateurs partenaires</td>
                    <td>5€</td>
                </tr>
                <tr>
                    <td><a href="don?don=scissors">Coupe de cheveux / barbe</a></td>
                    <td>Reprendre goût à la vie, c'est d'abord reprendre confiance en soir</td>
                    <td>10€</td>
                </tr>
                <tr>
                    <td><a href="don?don=gift">Pack bien-être</a></td>
                    <td>Offrez une journée de confort à un sans-domicile (douche + repas + coiffeur)</td>
                    <td>17€</td>
                </tr>
                <tr>
                    <td><a href="don?don=briefcase">Pack Embauche</a></td>
                    <td>Aidez un sans-domicile à réussir son entretien : douche, repas, coiffeur et pressing.</td>
                    <td>25€</td>
                </tr>
            </tbody>
        </table>

        <p>Ces prix sont indicatifs, il vous est possible de : <a href="don">choisir le montant de votre don.</p>

            <p>
                Vous pouvez offrir un sandwich, une séance chez le coiffeur, un hébergement d'une nuit, etc ...
            </p>

            <ul class="icons major style2">
              <li>
        				<a class="icon fa-tint packs" href="don?don=tint" title="Une douche"></a>
            </li>
            <li>
                <a class="icon fa-cutlery packs" href="don?don=meal" title="Un Repas"></a>
            </li>
            <li>
                <a class="icon fa-scissors packs" href="don?don=scissors" title="Coupe de cheveux / barbe"></a>
            </li>
            <li>
                <a class="icon fa-gift packs" href="don?don=gift" title="Pack bien-être"></a>
            </li>
            <li>
                <a class="icon fa-briefcase packs" href="don?don=briefcase" title="Pack Embauche"></a>
            </li>
            </ul>

            <ul class="actions" style="text-align:center;">
                <li><a href="don" class="button big">Je fais un don</a></li>
            </ul>
            <!--
            <p>
                Si vous, ou une personne que vous apercevez dans la rue, a besoin, d'aide, n'hésitez pas à cliquer sur le lien suivant et lui indiquer les services disponibles aux alentours.
            </p>
            -->
    </div>
</section>

<?php include 'footer.php';?>

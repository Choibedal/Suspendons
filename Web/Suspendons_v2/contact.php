<?php include "header.php"; ?>

<!-- Contact -->
<section id="contact" class="four">
    <div class="container">

        <header>
            <h2>Contact</h2>
        </header>

        <p>Si vous souhaitez nous contacter afin d'obtenir des informations sur notre projet, ou mieux encore, pour devenir partenaire Suspen' Dons merci de compléter le formulaire ci-dessous.</p>

        <form method="post" action="#">
            <div class="row">
                <div class="2u 12u$(mobile)"><input required type="text" name="name" placeholder="Nom" /></div>
                <div class="2u 12u$(mobile)"><input required type="text" name="firstname" placeholder="Prénom" /></div>
                <div class="4u 12u$(mobile)"><input required type="text" name="email" placeholder="Email" /></div>
                <div class="4u$ 12u$(mobile)">
                    <label>Si vous souhaitez être partenaire :
                    <input type="checkbox" name="partenaire" />
                    </label>
                </div>
                <div class="12u$">
                    <textarea required name="message" placeholder="Message"></textarea>
                </div>
                <div class="12u$">
                    <input type="submit" value="Envoyer votre Message" />
                </div>
            </div>
        </form>
    </div>
</section>

<?php include "footer.php"; ?>

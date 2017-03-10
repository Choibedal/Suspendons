<?php
$title = "Envoi de Mail";

if (isset($_POST['name']))
$name       = $_POST['name'];

if (isset($_POST['email']))
$email      = $_POST['email'];

if (isset($_POST['subject']))
$subject    = $_POST['subject'];

if (isset($_POST['message']))
$message    = $_POST['message'];

if (isset($_POST['g-recaptcha-response']))
$captcha    = $_POST['g-recaptcha-response'];

$from = 'Contact depuis le formulaire Suspendons.fr :  '.$subject."\n\nContent-Type: text/plain; charset=\"utf-8\"\r\n" . 'X-Mailer:PHP/'.phpversion();
$to   = 'clement.vachet@viacesi.fr;maxime.rifflart@viacesi.fr;axel.gauvrit@viacesi.fr';

$secretKey = '6LeuVBUUAAAAAD-Z7ZpbfUrST7aLJwK9ezONmBKp';
$ip = $_SERVER['REMOTE_ADDR'];

$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
$responseKeys = json_decode($response,true);

$body = "De : $name\n E-mail: $email\n Message:\n $message";


if ($_POST['submit']) {
    include'header.php'; ?>

<!-- Main-->
<div id="main" class="wrapper style3">
    <div class="container">
        <header class="major">
            <h2>Contact</h2>
            <p>Merci de nous avoir contacté.</p>
        </header>

        <!-- Content -->
        <section id="content" class="special">

            <?php

            if(!$captcha){
                echo '<p>Merci de valider le reCAPTCHA, veuillez cliquer ici pour un <a href="contact.php">retour au formulaire</a></p>';
                exit;
            }

            if(intval($responseKeys["success"]) !== 1) {
                echo '<p>Merci de valider le reCAPTCHA, veuillez cliquer ici pour un <a href="contact.php">retour au formulaire</a></p>';
            }else if (mail ($to, $subject, $body, $from)) {
                    echo '<p>Votre message nous a bien été envoyé, merci !</p>';
                }
                else {
                    echo '<p>Quelque chose n\'a pas fonctionné, merci de réessayer.</p>';
                }
            }


            ?>

        </section>
    </div>
</div>
        <?php
        include 'footer.php';
}
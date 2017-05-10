<?php
phpversion();
echo "null";
print_r($_POST);
date_default_timezone_set('UTC');
$destinataire = "suspendons@gmail.com";
echo "zero";

if(isset($_POST['email']))
{
    $from = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $date = date('l j F Y h:i:s A');
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'FROM:' . htmlspecialchars($_POST['email']);
    $message = "Vous avez un message de ".$from." à ".$date
        ."<br/><br/>"
        ."Voici son contenu :<br/>"
        .htmlspecialchars($_POST['message']);
    mail($destinataire,"Message reçu depuis Suspendons.fr - " . $subject,$message,$headers);
    if(isset($_POST['copy']))
    {
        if($_POST['copy']==true)
        {
            $destinataire = $from;
            $message = "Voici la copie de votre message : <br/><br/>".htmlspecialchars($_POST['message']);
            mail($destinataire,"Copie de message envoyé à Suspen'Dons",$message,$headers);
        }
    }
    header('Location:carte.php');
}
else
{
    header('Location:carte.php');
}
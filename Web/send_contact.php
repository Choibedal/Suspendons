<?php
/**
 * Created by PhpStorm.
 * User: KooPa
 * Date: 11/03/2017
 * Time: 21:11
 */

phpversion();
echo "null";
print_r($_POST);
date_default_timezone_set('UTC');
$destinataire = "clement_msn67@hotmail.fr";
echo "zero";

if(isset($_POST['email']))
{
    echo "first step";
    $from = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $date = date('l j F Y h:i:s A');
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'FROM:' . htmlspecialchars($_POST['email']);
    $message = "Vous avez un message de ".$from." à ".$date."<br/><br/>".htmlspecialchars($_POST['message']);
    echo "second";
    mail($destinataire,"Message reçu depuis Suspendons.fr - " . $subject,$message,$headers);
    echo "message sent";
    if(isset($_POST['copy']))
    {
        if($_POST['copy']==true)
        {
            $destinataire = $from;
            $message = "Voici la copie de votre message : <br/><br/>".htmlspecialchars($_POST['message']);
            mail($destinataire,"Copie de message envoyé à Suspendon",$message,$headers);
        }
    }
    header('Location:index.php');
}
else
{
    echo "fail";
    header('Location:index.php');
}

?>
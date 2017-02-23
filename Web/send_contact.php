<?php

$name       = $_POST['name'];
$email      = $_POST['email'];
$subject    = $_POST['subject'];
$message    = $_POST['message'];

$header = "From: $email \r\n";

$to                 = 'clement_msn67@hotmail.fr';
$subject_header     = 'Contact via le site Suspendons.fr :';

$send_contact = mail($to,$subject_header.$subject,$message,$header);

// Check, if message sent to your email
// display message "We've recived your information"
if($send_contact){
    echo "Nous avons reçu votre message, merci bien.";
}
else {
    echo "Erreur, merci de ressayer.";
}
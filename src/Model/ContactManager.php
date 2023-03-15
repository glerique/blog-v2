<?php

namespace App\Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class ContactManager
{

    public function sendEmail($lastname, $firstname, $email, $subject, $content)
    {

        try {

            $mail = new PHPMailer();
            $mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP 
            $mail->Host = ''; // Spécifier le serveur SMTP
            $mail->SMTPAuth = true; // Activer authentication SMTP
            $mail->Port = 2525;
            $mail->Username = ''; // Votre adresse email d'envoi
            $mail->Password = ''; // Le mot de passe de cette adresse email
            //$mail->SMTPSecure = 'ssl'; // Accepter SSL
            
            $mail->setFrom($email, $lastname . ' ' . $firstname); // Personnaliser l'envoyeur


            //Recipients

            $mail->addAddress('admin@gmail.com', 'Message du Blog');     // Add a recipient
            $mail->addReplyTo($email, 'Information');


            // Content

            $mail->Subject = $subject;
            $mail->Body = $content;


            $mail->send();
            return true;
        }
        // si le try ne marche pas 
        catch (Exception $e) {
            return false;
        }
    }

}


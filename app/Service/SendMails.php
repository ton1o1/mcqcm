<?php

namespace Service;

use \Phpmailer;

class Sendmails
{
   
    public function sendMails($fromMail ,$toMail , $fromName, $contentMail, $mailSubject, $errormessage, $messageInfo)
    {
        $mail = new \PHPMailer;
        //Ajouter les données à la conf. 
        $accountManagerMail = 'contact.mcqcm@gmail.com';        //SMTP username - > TODO ->a inclure dans un fichier conf
        $accountManagerPwd  = '123456mcqcm';                    // SMTP password - > TODO ->a inclure dans un fichier
        
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                 // Enable SMTP authentication
        $mail->Username = $accountManagerMail;                  // SMTP username - > TODO ->a inclure dans un fichier
        $mail->Password = $accountManagerPwd;                   // SMTP password - > TODO ->a inclure dans un fichier
        $mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;// 587;                               // TCP port to connect to
        $mail->SMTPDebug = 0;
        $mail->setFrom($fromMail, $fromName); //Set who the message is to be sent from
        $mail->addReplyTo($fromMail, $fromName); //Set an alternative reply-to address
        $mail->addAddress($toMail);//Set who the message is to be sent to
        $mail->Subject = $mailSubject;//Set the subject line
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($contentMail);
        if (!$mail->send()) {
            $messageInfo = $errormessage;
            //TODO addd error to logs
        } 
        else {
            $messageInfo = $messageInfo;
        }

        return $messageInfo;     
    }
}
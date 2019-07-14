<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "bootstrap.php";

class mailManager
{


    public function newBooking(){

    }

    public function send($to, $from, $subject, $tpl, $vars = array(), $files = array()){

        //twig
        $loader = new Twig_Loader_Filesystem('mail/templates');

        $twig = new Twig_Environment($loader/*, [
            'cache' => 'mail/cache',
        ]*/);

        $template = $twig->load($tpl);

        $mail = new PHPMailer(true); 

        $mail->isSMTP();
        $mail->Host = 'mail.gandi.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'arthur@getup.agency';
        $mail->Password = 'Grosac4Ever!';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        //Encoding
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom($from);
        $mail->addAddress($to);
        $mail->addBCC("adrien@getup.agency");
            
        foreach ($files as $f){
            $mail->addStringAttachment(file_get_contents($f), basename($f));
        }
        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $template->render($vars);
        $mail->send();
    }


}
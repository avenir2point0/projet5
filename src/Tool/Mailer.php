<?php

namespace App\Tool;

use \Swift_Mailer;
use \Swift_Message;
use Swift_SmtpTransport;
use Exception;

class Mailer
{
    public function sendMail($post, $token)
    {
        try {
            $config = include __DIR__ . '/../../config/mailerData.php';
            $transport = (new \Swift_SmtpTransport($config['smtp'], 465, 'ssl'))
                ->setUsername($config['mail'])
                ->setPassword($config['password']);
         
            $mailer = new \Swift_Mailer($transport);

            $message = new \Swift_Message();

            $message->setSubject('Email de récuperation de mot de passe');
         
            $message->setFrom([$post['email'] => $post['pseudo']]);
         
            $message->addTo($config['mail'], 'votre nom de site');

            $message->setBody(
                'Bonjour : '.$post['pseudo'].'<br>
                            Voici le lien que vous devez suivre pour remplacer le mot de passe
                            <a href="http://blogprojet5.local/newpassword?token='.$token.'">Cliquez ici</a>', 'text/html'
            );
         
            $mailer->send($message);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    public function sendMailContact($post)
    {
        try {
            $config = include __DIR__ . '/../../config/mailerData.php';
            $transport = (new \Swift_SmtpTransport($config['smtp'], 465, 'ssl'))
                ->setUsername($config['mail'])
                ->setPassword($config['password']);
         
            $mailer = new \Swift_Mailer($transport);

            $message = new \Swift_Message();

            $message->setSubject('Sujet : ' . $post['subject']);
         
            $message->setFrom([$post['email'] => $post['username']]);
         
            $message->addTo($config['mail'], 'votre nom de site');

            $message->setBody('Voici le message envoyé par le formulaire de contact : <br>'.$post['text'] .'', 'text/html');

            $mailer->send($message);
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }
}

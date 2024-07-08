<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Core\Session;

class ContactController extends AbstractController
{
    public function showContactForm(): void
    {
        $this->render('front/contact-form');
    }

    public function processContactForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $session = new Session();
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $message = trim($_POST['message']);

            if (empty($name)) {
                $session->setFlashMessage('Veuillez remplir le champs nom :', 'warning');
                header('Location: /car-location/contact');
                exit();
            }
            if (empty($email)) {
                $session->setFlashMessage('Veuillez remplir le champs email :', 'warning');
                header('Location: /car-location/contact');
                exit();
            }
            if (empty($message)) {
                $session->setFlashMessage('Veuillez remplir le champs message :', 'warning');
                header('Location: /car-location/contact');
                exit();
            }

            $to = 'admin@gmail.com';
            $subject = 'Contact depuis le site';
            $headers = 'From: ' . $email . "\r\n" .
                'Reply-To: ' . $email . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            $session->setFlashMessage('Votre message a bien été envoyé !', 'success');
            header('Location: /car-location/contact');
            exit();
        }
    }
}

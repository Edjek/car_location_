<?php

namespace App\Controller\Front;

use App\Controller\AbstractController;
use App\Core\Session;
use App\Model\User;

class UserController extends AbstractController
{
    public function showRegistrationForm(): void
    {
        $this->render('front/registration-form');
    }

    public function processRegistration(): void
    {
        $session = new Session();

        // Verifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $pseudo = trim($_POST['pseudo']); // Nettoyer les espaces en début et en fin de la chaine de caractère
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $pswd = trim($_POST['pswd']); // Crypter le mot de passe

            if (empty($pseudo)) {
                $session->setFlashMessage('Le champs pseudo est vide !', 'warning');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            if (empty($email)) {
                $session->setFlashMessage('Le champs email est vide !', 'warning');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            if (empty($pswd)) {
                $session->setFlashMessage('Le champs mot de passe est vide !', 'warning');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            $user = new User();
            if ($user->getUserByEmail($email)) {
                $session->setFlashMessage('Cet email est déjà utilisé !', 'danger');
                header('Location:/car-location/inscription'); // Redirection vers le formulaire
                exit();
            }

            $pswd = password_hash($pswd, PASSWORD_DEFAULT);
            $user->createUser($pseudo, $email, $pswd);
            $session->setFlashMessage('Vous êtes bien inscrit !', 'success');
            header('Location: /car-location/');
            exit();
        }
    }

    public function showLoginForm(): void
    {
        $this->render('front/login-form');
    }

    public function processLogin(): void
    {
        $session = new Session();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $pswd = trim($_POST['pswd']);

            if (empty($email)) {
                $session->setFlashMessage('Votre champs email est vide !', 'warning');
                header('Location: /car-location/connexion');
                exit();
            }

            if (empty($pswd)) {
                $session->setFlashMessage('Votre champs mot de passe est vide !', 'warning');
                header('Location: /car-location/connexion');
                exit();
            }

            $user = new User();
            $user = $user->getUserByEmail($email);
            if ($user === false) {
                $session->setFlashMessage('Votre email n\'existe pas !', 'warning');
                header('Location: /car-location/connexion');
                exit();
            }

            if (password_verify($pswd, $user['mdp'])) {
                $session->createSession($user);
                $session->setFlashMessage('Vous êtes connecté !', 'success');
                header('Location: /car-location/');
                exit();
            } else {
                $session->setFlashMessage('Votre mot de passe est erroné !', 'warning');
                header('Location: /car-location/connexion');
                exit();
            }
        } else {
            $session->setFlashMessage('Votre mot de passe est erroné !', 'warning');
            header('Location: /car-location/connexion');
            exit();
        }
    }

    public function deconnexion()
    {
        unset($_SESSION);
        session_destroy();

        $session = new Session();
        $session->setFlashMessage('Vous êtes déconnecté !', 'warning');
        header('Location: /car-location/');
        exit();
    }
}

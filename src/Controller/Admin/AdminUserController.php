<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Core\Session;
use App\Model\User;

class AdminUserController extends AbstractController
{
    /**
     * @return void
     */
    public function showAllUsers(): void
    {
        $user = new User();
        $users = $user->getAllUsers();

        $this->render('admin/users-list', [
            'users' => $users
        ], 'admin_layout');
    }

    /**
     * @param array $params
     *
     * @return void
     */
    public function showUserCreateForm(): void
    {
        $this->render('admin/user-create-form', [], 'admin_layout');
    }

    /**
     * @return void
     */
    public function processUserCreate(): void
    {
        $session = new Session();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $statut = trim($_POST['statut']);
            $id = $_POST['id'];

            // Valider les données du formulaire
            if (empty($name)) {
                $session->setFlashMessage('Veuillez remplir le champs model :', 'warning');
                header('Location: /car-location/tableau-de-bord-admin/ajouter-utilisateur');
                exit();
            }
            if (empty($email)) {
                $session->setFlashMessage('Veuillez remplir le champs email :', 'warning');
                header('Location: /car-location/tableau-de-bord-admin/ajouter-utilisateur');
                exit();
            }
            if (empty($password)) {
                $session->setFlashMessage('Veuillez remplir le champs mot de passe :', 'warning');
                header('Location: /car-location/tableau-de-bord-admin/ajouter-utilisateur');
                exit();
            }
            $password = password_hash($password, PASSWORD_DEFAULT);

            $user = new User();
            if ($user->getUserByEmail($email)) {
                $session->setFlashMessage('Cet email est déjà utilisé !', 'danger');
                header('Location:/car-location/tableau-de-bord-admin/ajouter-utilisateur'); // Redirection vers le formulaire
                exit();
            }
            $user->createUser($name, $email, $password, $statut);

            $session->setFlashMessage('Un utilisateur viens d\' être modifié !', 'success');
            header('Location: /car-location/tableau-de-bord-admin/utilisateurs');
            exit();
        }
    }

    /**
     * @param array $params
     *
     * @return void
     */
    public function showUserUpdateForm(array $params): void
    {
        $user = new User();
        $userDetails = $user->getUserById($params['id']);

        $this->render('admin/user-update-form', [
            'user' => $userDetails
        ], 'admin_layout');
    }

    /**
     * @return void
     */
    public function processUserUpdate(): void
    {
        $session = new Session();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $statut = trim($_POST['statut']);
            $id = $_POST['id'];

            // Valider les données du formulaire
            if (empty($name)) {
                $session->setFlashMessage('Veuillez remplir le champs model :', 'warning');
                header('Location: /car-location/tableau-de-bord-admin/modifier-utilisateur/' . $id);
                exit();
            }

            if (empty($email)) {
                $session->setFlashMessage('Veuillez remplir le champs email :', 'warning');
                header('Location: /car-location/tableau-de-bord-admin/modifier-utilisateur/' . $id);
                exit();
            }

            if (!empty($password)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $user = new User();
                $currentUser = $user->getUserById($id);
                $password = $currentUser['mdp'];
            }

            $user = new User();

            $user->updateUser($id, $name, $email, $password, $statut);

            $session->setFlashMessage('Un utilisateur viens d\'être modifié !', 'success');
            header('Location: /car-location/tableau-de-bord-admin/utilisateurs');
            exit();
        }
    }

    public function processUserDelete($params): void
    {
        $session = new Session();
        $user = new User();
        $user->deleteUser($params['id']);

        $session->setFlashMessage('Un utilisateur viens d\' être supprimé !', 'success');
        header('Location: /car-location/tableau-de-bord-admin/utilisateurs');
        exit();
    }
}

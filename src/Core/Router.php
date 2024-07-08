<?php

namespace App\Core;

use App\Controller\Front\HomeController;
use App\Controller\Front\ContactController;
use App\Controller\Front\CarController;
use App\Controller\Front\ReservationController;
use App\Controller\Front\UserController;
use App\Controller\Admin\AdminController;
use App\Controller\Admin\AdminUserController;
use App\Controller\Admin\AdminCarController;
use App\Controller\Admin\AdminContactController;
use App\Controller\Admin\AdminReservationController;

class Router
{
    private array $routes; // Tableau associatif pour stocker les routes et les fonction associés
    private $currentController; // Stock le contrôleur actuel pour l'action demandé

    public function __construct()
    {
        // Ajoute des routes dans le constructeur, donc à l'initialisation de l'objet
        $this->add_route('/', function () {
            $this->currentController = new HomeController(); // Créé une instance du contrôleur d'accueil
            $this->currentController->showHomePage(); // Appelle la méthode index du contrôleur d'accueil
        });
        $this->add_route('/contactez-nous', function () {
            $this->currentController = new ContactController();
            $this->currentController->showContactForm();
        });
        $this->add_route('/contactez-nous/form-creer-contact', function () {
            $this->currentController = new ContactController();
            $this->currentController->processContactForm();
        });
        $this->add_route('/vehicule', function ($params) {
            $this->currentController = new CarController();
            $this->currentController->showCarDetails($params);
        });
        $this->add_route('/inscription', function () {
            $this->currentController = new UserController();
            $this->currentController->showRegistrationForm();
        });
        $this->add_route('/enregistrer-utilisateur', function () {
            $this->currentController = new UserController();
            $this->currentController->processRegistration();
        });
        $this->add_route('/connexion', function () {
            $this->currentController = new UserController();
            $this->currentController->showLoginForm();
        });
        $this->add_route('/connecter', function () {
            $this->currentController = new UserController();
            $this->currentController->processLogin();
        });
        $this->add_route('/deconnexion', function () {
            $this->currentController = new UserController();
            $this->currentController->deconnexion();
        });
        $this->add_route('/reservation/{id}', function ($params) {
            $this->currentController = new ReservationController();
            $this->currentController->showReservationDetails($params);
        });
        $this->add_route('/tableau-de-bord-admin', function () {
            $this->currentController = new AdminController();
            $this->currentController->showAdminDashboard();
        });
        $this->add_route('/tableau-de-bord-admin/utilisateurs', function () {
            $this->currentController = new AdminUserController();
            $this->currentController->showAllUsers();
        });
        $this->add_route('/tableau-de-bord-admin/vehicules', function () {
            $this->currentController = new AdminCarController();
            $this->currentController->showAllCars();
        });
        $this->add_route('/tableau-de-bord-admin/reservations', function () {
            $this->currentController = new AdminReservationController();
            $this->currentController->showAllReservations();
        });
        $this->add_route('/tableau-de-bord-admin/contacts', function () {
            $this->currentController = new AdminContactController();
            $this->currentController->showAllContacts();
        });
        $this->add_route('/tableau-de-bord-admin/ajouter-utilisateur', function ($params) {
            $this->currentController = new AdminUserController();
            $this->currentController->showUserCreateForm($params);
        });
        $this->add_route('/tableau-de-bord-admin/ajouter-vehicule', function () {
            $this->currentController = new AdminCarController();
            $this->currentController->showCarCreateForm();
        });
        $this->add_route('/tableau-de-bord-admin/modifier-utilisateur/{id}', function ($params) {
            $this->currentController = new AdminUserController();
            $this->currentController->showUserUpdateForm($params);
        });
        $this->add_route('/tableau-de-bord-admin/modifier-vehicule/{id}', function ($params) {
            $this->currentController = new AdminCarController();
            $this->currentController->showCarUpdateForm($params);
        });
        $this->add_route('/tableau-de-bord-admin/modifier-reservation/{id}', function ($params) {
            $this->currentController = new AdminReservationController();
            $this->currentController->showReservationForm($params);
        });
        $this->add_route('/tableau-de-bord-admin/form-creer-utilisateur', function () {
            $this->currentController = new AdminUserController();
            $this->currentController->processUserCreate();
        });
        $this->add_route('/tableau-de-bord-admin/form-creer-vehicule', function () {
            $this->currentController = new AdminCarController();
            $this->currentController->processCarCreate();
        });
        $this->add_route('/tableau-de-bord-admin/form-user', function () {
            $this->currentController = new AdminUserController();
            $this->currentController->processUserUpdate();
        });
        $this->add_route('/tableau-de-bord-admin/form-car', function () {
            $this->currentController = new AdminCarController();
            $this->currentController->processCarUpdate();
        });
        $this->add_route('/tableau-de-bord-admin/supprimer-utilisateur/{id}', function ($params) {
            $this->currentController = new AdminUserController();
            $this->currentController->processUserDelete($params);
        });
        $this->add_route('/tableau-de-bord-admin/supprimer-vehicule/{id}', function ($params) {
            $this->currentController = new AdminCarController();
            $this->currentController->processCarDelete($params);
        });
    }

    private function add_route(string $route, callable $closure): void
    {
        // Convertit la route en une expression régulière pour une correspondance flexible en url et paramètre
        $pattern = str_replace('/', '\/', $route); // Échappe les barres obliques pour la regex
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^\/]+)',  $pattern); // Remplace les parties entre accolade par des groupes de capture (conserve les paramètres)
        $pattern = '/^' . $pattern . '$/'; // Ajoute les délimiteurs de début et de fin de la regex
        $this->routes[$pattern] = $closure; // Stock la regex de la route et la fonction associée dans le tableau des routes
    }

    public function execute(): void
    {
        $requestUri = $_SERVER['REQUEST_URI']; // Récupère l'URL de la requête
        $finalPath = str_replace('/car-location', '', $requestUri); // Supprime le dossier racine pour obtenir le chemin final

        foreach ($this->routes as $key => $closure) {
            if (preg_match($key, $finalPath, $matches)) {
                array_shift($matches);
                $closure($matches); // Appelle la fonction associée à la route avec les éventuels paramètres capturés
                return;
            }
        }
        require_once '../templates/error-404.php';
    }
}

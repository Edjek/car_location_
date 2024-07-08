<?php

/* ------------------ */
//  ROADMAP
/* ------------------ */


/* ------------------ */
//  .htaccess
/* ------------------ */

// Le fichier .htaccess est un fichier de configuration utilisé par Apache.
// Le fichier .htaccess est situé à la racine du projet, il permet de définir des règles de réécriture d'URL.
// Il redirige les requêtes vers le fichier public/index.php, qui se charge de les traiter.

/* ------------------ */
//  index.php
/* ------------------ */

// Le fichier index.php est situé dans le dossier public, il est le point d'entrée de l'application.
// Il démarre la session.

// Il utilise les namespaces pour charger les classes automatiquement.

// Il charge le fichier autoload.php qui permet de charger les classes automatiquement.
// Autoload::register();

// Il charge la classe Database qui permet de se connecter à la base de données
// Database::connect();

// Il charge la classe Router qui permet de gérer les routes.
// $router = new Router();
// $router->execute();

/* ------------------ */
//  Router.php
/* ------------------ */

// Le fichier Router.php est situé dans le dossier src/Core, il permet de gérer les routes.
// Il possède une méthode __construct() qui permet de charger les routes.
// Il associe une route à un contrôleur et une méthode.

// Il possède une méthode execute() qui permet de gérer les routes.

/* ------------------ */
// Controller
/* ------------------ */

// Les fichiers Controller sont situés dans le dossier src/Controller/, il sont les cerveaux moteur de l'application.

// Ils communiquent avec les modèles et les vues.

/* ------------------ */
// Model
/* ------------------ */

// Les fichiers Model sont situés dans le dossier src/Model/, ce sont les classes qui permettent de communiquer avec la base de données.
// Ils ne contiennent que des requêtes SQL.
// Ils utilisent la classe Database pour se connecter à la base de données via AbstractModel dont ils héritent.

/* ------------------ */
// View
/* ------------------ */

// Les fichiers View sont situés dans le dossier templates/, ce sont les fichiers qui permettent d'afficher les données (pages HTML).

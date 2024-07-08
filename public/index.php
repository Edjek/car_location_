<?php

use App\Core\Autoloader;
use App\Core\Database;
use App\Core\Router;
use App\Core\Session;

require_once '../config/config.php';
require_once '../src/Core/Autoloader.php';

Autoloader::register();
Database::initConnection();

$session = new Session;
$router = new Router();
$router->execute();

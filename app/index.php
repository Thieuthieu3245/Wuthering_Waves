<?php

use League\Plates\Engine;
use Controllers\MainController;
use Controllers\Router\Router;

require_once __DIR__ . '/Helpers/Psr4AutoloaderClass.php';
require_once "Controllers/Router/Router.php";

$loader = new Helpers\Psr4AutoloaderClass;
$loader->register();

$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates', '/Vendor/Plates/src');
$loader->addNamespace('\Controllers', '/Controllers');
$loader->addNamespace('\Services', '/Services');
$loader->addNamespace('\Models', '/Models');
$loader->addNamespace('\Config', '/Config');

$template = new Engine(__DIR__ . '/Views');

$router = new Router($template);
$router->routing($_GET, $_POST);


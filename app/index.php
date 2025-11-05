<?php

require_once __DIR__ . '/Helpers/Psr4AutoloaderClass.php';

$loader = new Helpers\Psr4AutoloaderClass;
$loader->register();

$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates', '/Vendor/Plates/src');
$loader->addNamespace('\Controllers', '/Controllers');

$template = new \League\Plates\Engine(__DIR__ . '/Views');

$controller = new \Controllers\MainController($template);
$controller->index();
<?php

require_once __DIR__ . '/Helpers/Psr4AutoloaderClass.php';

$loader = new Helpers\Psr4AutoloaderClass;
$loader->register();

$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates', '/Vendor/Plates/src');

$template = new \League\Plates\Engine(__DIR__ . '/Views');

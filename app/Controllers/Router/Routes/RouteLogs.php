<?php

namespace Controllers\Router\Routes;

use Controllers\MainController;
use Controllers\Router\Route;
use League\Plates\Engine;
use Models\Message;
use Services\LogService;

class RouteLogs extends Route {

    private MainController $controller;

    public function __construct(MainController $controller) {
        $this->controller = $controller;
    }

    public function get($params) {
        $this->controller->displayLogs();
    }

    public function post($params) {
        $fileName = $this->getParam($params, 'fileName');
        $this->controller->displayLogs($fileName);
    }
}
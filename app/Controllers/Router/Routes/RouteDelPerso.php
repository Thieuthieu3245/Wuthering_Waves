<?php

namespace Controllers\Router\Routes;

use Controllers\MainController;
use Controllers\Router\Route;
use Controllers\PersoController;
use League\Plates\Engine;

class RouteDelPerso extends Route
{
    private $ctrl;

    public function __construct(PersoController $ctrl) {
        $this->ctrl = $ctrl;
    }

    public function get($params) {
        $id = $this->getParam($params, 'id');
        $this->ctrl->deletePerso($id);
    }

    public function post($params) {
        $id = $this->getParam($params, 'id');
        $this->ctrl->deletePerso($id);
    }
}
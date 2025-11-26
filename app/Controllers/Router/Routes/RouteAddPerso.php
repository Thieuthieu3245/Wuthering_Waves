<?php

namespace Controllers\Router\Routes;

use Controllers\Router\Route;
use Controllers\PersoController;

class RouteAddPerso extends Route {

    private $ctrl;

    public function __construct(PersoController $ctrl) {
        $this->ctrl = $ctrl;
    }

    public function get($params) {
        $this->ctrl->displayAddPerso();
    }

    public function post($params) {
            $name = $this->getParam($params, 'name');
            $rarity = $this->getParam($params, 'rarity');
            $img = $this->getParam($params, 'img');
            $elementId = $this->getParam($params, 'element');
            $originId = $this->getParam($params, 'origin');
            $unitClassId = $this->getParam($params, 'class');
            $weaponId = $this->getParam($params, 'weapon');
    
            $this->ctrl->addPerso($name, $elementId, $unitClassId, $weaponId, $rarity, $img, $originId);
    }
}
<?php

namespace Controllers\Router\Routes;

use Controllers\Router\Route;
use Controllers\PersoController;
use Models\Message;

class RouteAddPerso extends Route {

    private $ctrl;

    public function __construct(PersoController $ctrl) {
        $this->ctrl = $ctrl;
    }

    public function get($params) {
        $this->ctrl->displayAddPerso();
    }

    public function post($params) {
        try {
            $name = $this->getParam($params, 'name');
            $rarity = $this->getParam($params, 'rarity');
            $img = $this->getParam($params, 'img');
            $elementId = $this->getParam($params, 'element');
            $originId = $this->getParam($params, 'origin');
            $unitClassId = $this->getParam($params, 'class');
            $weaponId = $this->getParam($params, 'weapon');
    
            $this->ctrl->addPerso($name, $elementId, $unitClassId, $weaponId, $rarity, $img, $originId);
        }

        catch (\Exception $e) {
            $message = new Message($e->getMessage(), Message::MESSAGE_COLOR_ERROR, 'error');
            $this->ctrl->displayAddPerso(null, $message);
        }

    }
}
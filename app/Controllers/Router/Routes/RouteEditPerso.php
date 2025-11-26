<?php

namespace Controllers\Router\Routes;

use Controllers\MainController;
use Controllers\PersoController;
use League\Plates\Engine;
use Controllers\Router\Route;
use Models\Message;

class RouteEditPerso extends Route
{
    private $ctrl;

    public function __construct(PersoController $ctrl) {
        $this->ctrl = $ctrl;
    }

    public function get($params) {
        $id = $this->getParam($params, 'id');
        
        $this->ctrl->displayAddPerso($id);
    }

    public function post($params) {
        try {
            $id = $this->getParam($params, 'id');
            $name = $this->getParam($params, 'name');
            $rarity = $this->getParam($params, 'rarity');
            $img = $this->getParam($params, 'img');
            $elementId = $this->getParam($params, 'element');
            $originId = $this->getParam($params, 'origin');
            $unitClassId = $this->getParam($params, 'class');
            $weaponId = $this->getParam($params, 'weapon');

            $this->ctrl->editPerso($id, $name, $elementId, $unitClassId, $weaponId, $rarity, $img, $originId);
        } catch (\Exception $e) {
            $message = new Message($e->getMessage(), Message::MESSAGE_COLOR_ERROR, 'error');
            $this->ctrl->displayAddPerso($id, $message);
        }
    }
}
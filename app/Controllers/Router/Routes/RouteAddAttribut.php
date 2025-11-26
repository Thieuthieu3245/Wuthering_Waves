<?php

namespace Controllers\Router\Routes;

use Controllers\AttributController;
use Controllers\Router\Route;
use League\Plates\Engine;
use Models\Message;

class RouteAddAttribut extends Route {
    private $ctrl;

    public function __construct(AttributController $ctrl) {
        $this->ctrl = $ctrl;
    }

    public function get($params) {
        return $this->ctrl->displayAddAttribut();
    }

    public function post($params) {
        try {
            $name = $this->getParam($params, 'name');
            $type = $this->getParam($params, 'type');
            if($params['color'] === null) $color = '000000';
            else $color = $this->getParam($params, 'color') ?? '000000';
            $urlImg = $this->getParam($params, 'urlImg');

            $this->ctrl->addAttribut($type, $name, $color, $urlImg);
        } catch (\Exception $e) {
            $message = new Message($e->getMessage(), Message::MESSAGE_COLOR_ERROR, 'error');
            $this->ctrl->displayAddAttribut($message);
        }
    }
}
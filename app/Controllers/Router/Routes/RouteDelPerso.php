<?php

namespace Controllers\Router\Routes;

use Controllers\MainController;
use Controllers\Router\Route;
use Controllers\PersoController;
use League\Plates\Engine;
use Models\Message;

class RouteDelPerso extends Route
{
    private $ctrl;

    public function __construct(PersoController $ctrl) {
        $this->ctrl = $ctrl;
    }

    public function get($params) {
        try {
            $id = $this->getParam($params, 'id');
            $this->ctrl->deletePerso($id);
        } catch (\Exception $e) {
            $message = new Message($e->getMessage(), Message::MESSAGE_COLOR_ERROR, 'error');
            $this->ctrl->index($message);
        }
    }

    public function post($params) {
        try {
            $id = $this->getParam($params, 'id');
            $this->ctrl->deletePerso($id);
        } catch (\Exception $e) {
            $message = new Message($e->getMessage(), Message::MESSAGE_COLOR_ERROR, 'error');
            $this->ctrl->index($message);
        }
    }
}
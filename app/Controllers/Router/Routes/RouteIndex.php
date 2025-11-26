<?php

namespace Controllers\Router\Routes;

use Controllers\Router\Route;

class RouteIndex extends Route {
    private $ctrl;

    /**
     * Constructor
     *
     * @param object $ctrl The controller object for this route
     */
    public function __construct($ctrl) {
        $this->ctrl = $ctrl;
    }

    public function post($params) {
        return $this->ctrl->index($params);
    }

    public function get($params) {
        return $this->ctrl->index($params);
    }
}
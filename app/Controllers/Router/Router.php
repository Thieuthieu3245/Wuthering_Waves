<?php

namespace Controllers\Router;

use Controllers\Router\Routes\RouteIndex;
use Controllers\Router\Routes\RouteAddPerso;
use Controllers\Router\Routes\RouteDelPerso;
use Controllers\Router\Routes\RouteEditPerso;
use Controllers\MainController;
use Controllers\PersoController;
use League\Plates\Engine;

class Router {
    private array $routeList = [];
    private array $ctrlList = [];
    private string $action_key;
    private Engine $template;

    public function __construct($engine, $action_key = "action") {
        $this->action_key = $action_key;
        $this->template = $engine;
        $this->createControllerList();
        $this->createRouteList();
    }

    private function createControllerList() {
        $this->ctrlList["main"] = new MainController($this->template);
        $this->ctrlList["perso"] = new PersoController($this->template);
    }

    private function createRouteList() {
        $this->routeList["index"] = new RouteIndex($this->ctrlList["main"]);
        $this->routeList["add-perso"] = new RouteAddPerso($this->ctrlList["perso"]);
    }

    public function routing($get, $post) {
        $action = $get[$this->action_key] ?? "index";

        if (!isset($this->routeList[$action])) {
            $action = "index";
        }

        $route = $this->routeList[$action];

        if (!empty($post)) {
            $route->action($post, "POST");
        } else {
            $route->action($get, "GET");
        }
    }
}

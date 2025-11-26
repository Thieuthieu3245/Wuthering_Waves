<?php

namespace Controllers\Router;

abstract class Route
{
    protected function getParam($array, $name, $canBeEmpty = true) {
        if (!isset($array[$name])) throw new \Exception("Missing param $name");
        if (!$canBeEmpty && empty($array[$name])) throw new \Exception("Empty param $name");
        return $array[$name];
    }

    public function action($params, $method = "GET") {
        if ($method === "POST") return $this->post($params);
        return $this->get($params);
    }

    abstract public function get($params);
    abstract public function post($params);
}
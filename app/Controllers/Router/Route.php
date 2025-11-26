<?php

namespace Controllers\Router;

abstract class Route
{
    /**
     * Get a parameter from the given array.
     * If the parameter does not exist, throw an exception.
     * If the parameter exists but is empty and $canBeEmpty is false, throw an exception.
     * @param array $array The array to get the parameter from.
     * @param string $name The name of the parameter to get.
     * @param bool $canBeEmpty Whether the parameter can be empty or not.
     * @return mixed The value of the parameter.
     * @throws \Exception If the parameter does not exist or is empty when it shouldn't be.
     */
    protected function getParam($array, $name, $canBeEmpty = true) {
        if (!isset($array[$name])) throw new \Exception("Missing param $name");
        if (!$canBeEmpty && empty($array[$name])) throw new \Exception("Empty param $name");
        return $array[$name];
    }

    /**
     * Call the correct method (GET or POST) based on the given method.
     * This method is used to route the request to the correct controller action.
     * @param array $params The parameters of the request.
     * @param string $method The method of the request (GET or POST).
     * @return mixed The result of the called method.
     */
    public function action($params, $method = "GET") {
        if ($method === "POST") return $this->post($params);
        return $this->get($params);
    }

    abstract public function get($params);
    abstract public function post($params);
}
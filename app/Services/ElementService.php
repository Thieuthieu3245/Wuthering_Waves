<?php

namespace Services;

use Models\Element;
use Models\Color;
use Models\ElementDAO;

class ElementService{

    private $elementDAO;

    public function __construct() {
        $this->elementDAO = new ElementDAO();
    }

    public function getAllElements() {
        $data = $this->elementDAO->getAll();
        return array_map([$this, 'hydrate'], $data);
    }

    public function getElementById($id) {
        $data = $this->elementDAO->getById($id);
        return $this->hydrate($data);
    }

    public function deleteElement($id) {
        return $this->elementDAO->delete($id);
    }

    public function createElement(Element $Element) {
        return $this->elementDAO->create($Element);
    }

    public function editElement(Element $Element) {
        return $this->elementDAO->edit($Element);
    }

    private function hydrate(array $data) : Element {
        $Element = new Element($data['idElement'], $data['Name'], Color::GRAY, $data['url_image']);
        return $Element;
    }
}
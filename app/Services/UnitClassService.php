<?php

namespace Services;

use Models\UnitClass;
use Models\UnitClassDAO;

class UnitClassService{

    private $unitClassDAO;

    public function __construct() {
        $this->unitClassDAO = new UnitClassDAO();
    }

    public function getAllUnitClasss() {
        $data = $this->unitClassDAO->getAll();
        return array_map([$this, 'hydrate'], $data);
    }

    public function getUnitClassById($id) {
        $data = $this->unitClassDAO->getById($id);
        return $this->hydrate($data);
    }

    public function deleteUnitClass($id) {
        return $this->unitClassDAO->delete($id);
    }

    public function createUnitClass(UnitClass $UnitClass) {
        return $this->unitClassDAO->create($UnitClass);
    }

    public function editUnitClass(UnitClass $UnitClass) {
        return $this->unitClassDAO->edit($UnitClass);
    }

    private function hydrate(array $data) : UnitClass {
        $UnitClass = new UnitClass($data['idUnitClass'], $data['Name'], $data['url_image']);
        return $UnitClass;
    }
}
<?php

namespace Services;

use Models\Origin;
use Models\OriginDAO;

class OriginService{

    private $originDAO;

    public function __construct() {
        $this->originDAO = new OriginDAO();
    }

    public function getAllOrigins() {
        $data = $this->originDAO->getAll();
        return array_map([$this, 'hydrate'], $data);
    }

    public function getOriginById($id) {
        $data = $this->originDAO->getById($id);
        return $this->hydrate($data);
    }

    public function deleteOrigin($id) {
        return $this->originDAO->delete($id);
    }

    public function createOrigin(Origin $Origin) {
        return $this->originDAO->create($Origin);
    }

    public function editOrigin(Origin $Origin) {
        return $this->originDAO->edit($Origin);
    }

    private function hydrate(array $data) : Origin {
        $Origin = new Origin($data['idOrigin'], $data['Name'], $data['url_image']);
        return $Origin;
    }
}
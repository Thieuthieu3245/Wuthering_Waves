<?php

namespace Services;

use Models\Weapon;
use Models\WeaponDAO;

class WeaponService{

    private $weaponDAO;

    public function __construct() {
        $this->weaponDAO = new WeaponDAO();
    }

    public function getAllWeapons() {
        $data = $this->weaponDAO->getAll();
        return array_map([$this, 'hydrate'], $data);
    }

    public function getWeaponById($id) {
        $data = $this->weaponDAO->getById($id);
        return $this->hydrate($data);
    }

    public function deleteWeapon($id) {
        return $this->weaponDAO->delete($id);
    }

    public function createWeapon(Weapon $weapon) {
        return $this->weaponDAO->create($weapon);
    }

    public function editWeapon(Weapon $weapon) {
        return $this->weaponDAO->edit($weapon);
    }

    private function hydrate(array $data) : Weapon {
        $weapon = new Weapon($data['idWeapon'], $data['Name'], $data['url_image']);
        return $weapon;
    }
}
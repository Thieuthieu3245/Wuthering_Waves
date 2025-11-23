<?php

namespace Models;

use Models\BasePDODAO;

class WeaponDAO extends BasePDODAO{

    public function getAll(){
        $sql = "SELECT * FROM Weapon";
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll();
    }

    public function getById(string $id){
        $sql = "SELECT * FROM Weapon WHERE idWeapon = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt->fetch();
    }

    public function delete(string $id){
        $sql = "DELETE FROM Weapon WHERE idWeapon = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt !== false;
    }

    public function create(Weapon $weapon){
        $sql = "INSERT INTO Weapon (idWeapon, Name, url_image) VALUES (?, ?, ?)";
        $stmt = $this->execRequest($sql, [
            $weapon->getId(),
            $weapon->getName(),
            $weapon->getUrlImg()
        ]);
        return $stmt !== false;
    }

    public function edit(Weapon $weapon){
        $sql = "UPDATE Weapon SET Name = ?, url_image = ? WHERE idWeapon = ?";
        $stmt = $this->execRequest($sql, [
            $weapon->getName(),
            $weapon->getUrlImg(),
            $weapon->getId()
        ]);
        return $stmt !== false;
    }
}
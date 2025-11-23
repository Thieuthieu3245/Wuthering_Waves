<?php

namespace Models;

use Models\BasePDODAO;

class UnitClassDAO extends BasePDODAO{

    public function getAll(){
        $sql = "SELECT * FROM UnitClass";
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll();
    }

    public function getById(string $id){
        $sql = "SELECT * FROM UnitClass WHERE idUnitClass = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt->fetch();
    }

    public function delete(string $id){
        $sql = "DELETE FROM UnitClass WHERE idUnitClass = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt !== false;
    }

    public function create(UnitClass $unitClass){
        $sql = "INSERT INTO UnitClass (idUnitClass, Name, url_image) VALUES (?, ?, ?)";
        $stmt = $this->execRequest($sql, [
            $unitClass->getId(),
            $unitClass->getName(),
            $unitClass->getUrlImg()
        ]);
        return $stmt !== false;
    }

    public function edit(UnitClass $unitClass){
        $sql = "UPDATE UnitClass SET Name = ?, url_image = ? WHERE idUnitClass = ?";
        $stmt = $this->execRequest($sql, [
            $unitClass->getName(),
            $unitClass->getUrlImg(),
            $unitClass->getId()
        ]);
        return $stmt !== false;
    }
}
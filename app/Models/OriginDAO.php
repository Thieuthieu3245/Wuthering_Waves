<?php

namespace Models;

use Models\BasePDODAO;

class OriginDAO extends BasePDODAO{

    public function getAll(){
        $sql = "SELECT * FROM Origin";
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll();
    }

    public function getById(string $id){
        $sql = "SELECT * FROM Origin WHERE idOrigin = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt->fetch();
    }

    public function delete(string $id){
        $sql = "DELETE FROM Origin WHERE idOrigin = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt !== false;
    }

    public function create(Origin $origin){
        $sql = "INSERT INTO Origin (idOrigin, Name, url_image) VALUES (?, ?, ?)";
        $stmt = $this->execRequest($sql, [
            $origin->getId(),
            $origin->getName(),
            $origin->getUrlImg()
        ]);
        return $stmt !== false;
    }

    public function edit(Origin $origin){
        $sql = "UPDATE Origin SET Name = ?, url_image = ? WHERE idOrigin = ?";
        $stmt = $this->execRequest($sql, [
            $origin->getName(),
            $origin->getUrlImg(),
            $origin->getId()
        ]);
        return $stmt !== false;
    }
}
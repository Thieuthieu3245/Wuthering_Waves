<?php

namespace Models;

use Models\BasePDODAO;

class ElementDAO extends BasePDODAO{

    public function getAll(){
        $sql = "SELECT * FROM element_";
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll();
    }

    public function getById(string $id){
        $sql = "SELECT * FROM element_ WHERE idElement = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt->fetch();
    }

    public function delete(string $id){
        $sql = "DELETE FROM element_ WHERE idElement = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt !== false;
    }

    public function create(Element $element){
        $sql = "INSERT INTO element_ (idElement, Name, color, url_image) VALUES (?, ?, ?)";
        $stmt = $this->execRequest($sql, [
            $element->getId(),
            $element->getColor(),
            $element->getName(),
            $element->getUrlImg()
        ]);
        return $stmt !== false;
    }

    public function edit(Element $element){
        $sql = "UPDATE element_ SET Name = ?, url_image = ?, color = ? WHERE idElement = ?";
        $stmt = $this->execRequest($sql, [
            $element->getName(),
            $element->getColor(),
            $element->getUrlImg(),
            $element->getId()
        ]);
        return $stmt !== false;
    }
}
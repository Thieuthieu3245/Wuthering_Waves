<?php

namespace Models;

use Models\BasePDODAO;

class PersonneDAO extends BasePDODAO {
    
    /**
     * Return all personnages
     * @return array All personnages
     */
    public function getAll(){
        $sql = "SELECT * FROM personnage";
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll();
    }

    /**
     * Return a personnage by its id
     * @param string $id The id of the personnage
     * @return array The personnage
     */
    public function getById(string $id){
        $sql = "SELECT * FROM personnage WHERE idPersonnage = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt->fetch();
    }
}
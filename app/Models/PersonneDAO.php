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

    /**
     * Edit a personnage in the database
     * @param Personnage $personnage The personnage to edit
     * @return bool True if the personnage has been edited, false otherwise
     */
    public function edit(Personnage $personnage){
        $sql = "UPDATE personnage SET Name = ?, idElement = ?, idUnitCLass = ?, idWeapon = ?, rarity = ?, idOrigin = ?, url_image = ? WHERE idPersonnage = ?";
        $stmt = $this->execRequest($sql, [
            $personnage->getName(),
            $personnage->getElement()->getId(),
            $personnage->getUnitclass()->getId(),
            $personnage->getWeapon()->getId(),
            $personnage->getRarity(),
            $personnage->getOrigin()->getId() ?? null,
            $personnage->getUrlImg(),
            $personnage->getId(),
        ]);
        return $stmt !== false;
    }

    /**
     * Create a personnage in the database
     * @param Personnage $personnage The personnage to create
     * @return bool True, the personnage has been created, false otherwise
     */
    public function create(Personnage $personnage){
        $sql = "INSERT INTO personnage (idPersonnage, Name, idElement, idUnitCLass, idWeapon, rarity, idOrigin, url_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->execRequest($sql, [
            $personnage->getId(),
            $personnage->getName(),
            $personnage->getElement()->getId(),
            $personnage->getUnitclass()->getId(),
            $personnage->getWeapon()->getId(),
            $personnage->getRarity(),
            $personnage->getOrigin()->getId() ?? null,
            $personnage->getUrlImg()
        ]);
        return $stmt !== false;
    }

    /**
     * Delete a personnage in the database
     * @param string $id The id of the personnage to delete
     * @return bool True, the personnage has been deleted, false otherwise
     */
    public function delete(string $id){
        $sql = "DELETE FROM personnage WHERE idPersonnage = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt !== false;
    }
}
<?php

namespace Models;

use Models\BasePDODAO;

class WeaponDAO extends BasePDODAO{

    /**
     * Returns all weapons in the database.
     * @return array All weapons in the database.
     */
    public function getAll() : array{
        $sql = "SELECT * FROM Weapon";
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll();
    }

    /**
     * Return a weapon by its id.
     * @param string $id The id of the weapon to retrieve.
     * @return array The weapon with the given id.
     */
    public function getById(string $id) : array{
        $sql = "SELECT * FROM Weapon WHERE idWeapon = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt->fetch();
    }

    /**
     * Deletes a weapon from the database.
     * @param string $id The id of the weapon to delete.
     * @return bool True if the weapon has been deleted, false otherwise.
     */
    public function delete(string $id) : bool{
        $sql = "DELETE FROM Weapon WHERE idWeapon = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt !== false;
    }

    /**
     * Creates a weapon in the database.
     * @param Weapon $weapon The weapon to create
     * @return bool True if the weapon has been created, false otherwise
     */
    public function create(Weapon $weapon) : bool{
        $sql = "INSERT INTO Weapon (idWeapon, Name, url_image) VALUES (?, ?, ?)";
        $stmt = $this->execRequest($sql, [
            $weapon->getId(),
            $weapon->getName(),
            $weapon->getUrlImg()
        ]);
        return $stmt !== false;
    }

    /**
     * Edits a weapon in the database.
     * @param Weapon $weapon The weapon to edit
     * @return bool True if the weapon has been edited, false otherwise
     */
    public function edit(Weapon $weapon) : bool{
        $sql = "UPDATE Weapon SET Name = ?, url_image = ? WHERE idWeapon = ?";
        $stmt = $this->execRequest($sql, [
            $weapon->getName(),
            $weapon->getUrlImg(),
            $weapon->getId()
        ]);
        return $stmt !== false;
    }
}
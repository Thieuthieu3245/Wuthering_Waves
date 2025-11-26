<?php

namespace Models;

use Models\BasePDODAO;

class UnitClassDAO extends BasePDODAO{

    /**
     * Returns all unit classes from the database.
     * @return array All unit classes from the database.
     */
    public function getAll() : array{
        $sql = "SELECT * FROM UnitClass";
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll();
    }

    /**
     * Returns a unit class by its id.
     * @param string $id The id of the unit class to retrieve.
     * @return array The unit class with the given id.
     */
    public function getById(string $id) : array{
        $sql = "SELECT * FROM UnitClass WHERE idUnitClass = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt->fetch();
    }

    /**
     * Deletes a unit class from the database.
     * @param string $id The id of the unit class to delete
     * @return bool True if the unit class has been deleted, false otherwise
     */
    public function delete(string $id) : bool{
        $sql = "DELETE FROM UnitClass WHERE idUnitClass = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt !== false;
    }

    /**
     * Creates a unit class in the database.
     * @param UnitClass $unitClass The unit class to create
     * @return bool True if the unit class has been created, false otherwise
     */
    public function create(UnitClass $unitClass) : bool{
        $sql = "INSERT INTO UnitClass (idUnitClass, Name, url_image) VALUES (?, ?, ?)";
        $stmt = $this->execRequest($sql, [
            $unitClass->getId(),
            $unitClass->getName(),
            $unitClass->getUrlImg()
        ]);
        return $stmt !== false;
    }

    /**
     * Edit a unit class
     * @param UnitClass $unitClass The unit class to edit
     * @return bool True if the unit class has been edited, false otherwise
     */
    public function edit(UnitClass $unitClass) : bool{
        $sql = "UPDATE UnitClass SET Name = ?, url_image = ? WHERE idUnitClass = ?";
        $stmt = $this->execRequest($sql, [
            $unitClass->getName(),
            $unitClass->getUrlImg(),
            $unitClass->getId()
        ]);
        return $stmt !== false;
    }
}
<?php

namespace Services;

use Models\UnitClass;
use Models\UnitClassDAO;

class UnitClassService{

    private $unitClassDAO;

    public function __construct() {
        $this->unitClassDAO = new UnitClassDAO();
    }

    /**
     * Returns all unit classes from the database.
     * @return array All unit classes from the database.
     */
    public function getAllUnitClasses() : array {
        $data = $this->unitClassDAO->getAll();
        return array_map([$this, 'hydrate'], $data);
    }

    /**
     * Retrieves a unit class by its id from the database.
     * @param string $id The id of the unit class to retrieve.
     * @return UnitClass The unit class with the given id.
     * @throws \Exception If the unit class cannot be found in the database.
     */
    public function getUnitClassById($id) : UnitClass {
        try{
            $data = $this->unitClassDAO->getById($id);
            $unitClass = $this->hydrate($data);
        } catch (\Exception $e) {
            throw new \Exception("L'unit class n'a pas pu étre chargé", 1);
        }
        return $unitClass;
    }

    /**
     * Deletes a unit class from the database.
     * @param string $id The id of the unit class to delete
     * @return bool True if the unit class has been deleted, false otherwise
     * @throws \Exception If an error occurs during the deletion
     */
    public function deleteUnitClass($id) : bool {
        try{
            $result = $this->unitClassDAO->delete($id);
        } catch (\Exception $e) {
            throw new \Exception("L'unit class n'a pas pu étre supprimé", 1);
        }
        return $result;
    }

    /**
     * Creates a unit class in the database.
     * @param UnitClass $UnitClass The unit class to create
     * @return bool True if the unit class has been created, false otherwise
     * @throws \Exception If an error occurs during the creation
     */
    public function createUnitClass(UnitClass $UnitClass) : bool {
        try{
            $UnitClass->setId(uniqid());
            $result = $this->unitClassDAO->create($UnitClass);
        } catch (\Exception $e) {
            throw new \Exception("L'unit class n'a pas pu étre créé", 1);
        }
        return $result;
    }

    /**
     * Modifies a unit class in the database.
     * @param UnitClass $UnitClass The unit class to modify
     * @return bool True if the unit class has been modified, false otherwise
     * @throws \Exception If an error occurs during the modification
     */
    public function editUnitClass(UnitClass $UnitClass) : bool {
        try{
            $result = $this->unitClassDAO->edit($UnitClass);
        } catch (\Exception $e) {
            throw new \Exception("L'unit class n'a pas pu étre modifié", 1);
        }
        return $result;
    }

    private function hydrate(array $data) : UnitClass {
        $UnitClass = new UnitClass($data['idUnitClass'], $data['Name'], $data['url_image']);
        return $UnitClass;
    }
}
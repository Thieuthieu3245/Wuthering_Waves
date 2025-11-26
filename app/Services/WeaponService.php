<?php

namespace Services;

use Models\Weapon;
use Models\WeaponDAO;

class WeaponService{

    private $weaponDAO;

    public function __construct() {
        $this->weaponDAO = new WeaponDAO();
    }

    /**
     * Retrieves all weapons from the database.
     * @return array An array of all weapons from the database.
     */
    public function getAllWeapons() : array {
        $data = $this->weaponDAO->getAll();
        return array_map([$this, 'hydrate'], $data);
    }

    /**
     * Retrieves a weapon by its id.
     * @param string $id The id of the weapon to retrieve.
     * @return Weapon The weapon with the given id.
     * @throws \Exception If the weapon could not be retrieved, an exception is thrown.
     */
    public function getWeaponById($id) : Weapon {
        try{
            $data = $this->weaponDAO->getById($id);
            $weapon = $this->hydrate($data);
        } catch (\Exception $e) {
            throw new \Exception("L'arme n'a pas pu étre chargé", 1);
        }
        return $weapon;
    }

    /**
     * Deletes a weapon from the database.
     * @param string $id The id of the weapon to delete.
     * @return bool True if the weapon has been deleted, false otherwise.
     * @throws \Exception If an error occurs during the deletion.
     */
    public function deleteWeapon($id) : bool {
        try{
            $result = $this->weaponDAO->delete($id);
        } catch (\Exception $e) {
            throw new \Exception("L'arme n'a pas pu étre supprimé", 1);
        }
        return $result;
    }

    /**
     * Creates a weapon in the database.
     * @param Weapon $weapon The weapon to create
     * @return bool True if the weapon has been created, false otherwise
     * @throws \Exception If an error occurs during the creation
     */
    public function createWeapon(Weapon $weapon) : bool {
        try{
            $weapon->setId(uniqid());
            $result = $this->weaponDAO->create($weapon);
        } catch (\Exception $e) {
            throw new \Exception("L'arme n'a pas pu étre supprimé", 1);
        }
        return $result;
    }

    /**
     * Modifies a weapon in the database.
     * @param Weapon $weapon The weapon to modify
     * @return bool True if the weapon has been modified, false otherwise
     * @throws \Exception If an error occurs during the modification
     */
    public function editWeapon(Weapon $weapon) : bool {
        try{
            $result = $this->weaponDAO->edit($weapon);
        } catch (\Exception $e) {
            throw new \Exception("L'arme n'a pas pu étre supprimé", 1);
        }
        return $result;
    }

    private function hydrate(array $data) : Weapon {
        $weapon = new Weapon($data['idWeapon'], $data['Name'], $data['url_image']);
        return $weapon;
    }
}
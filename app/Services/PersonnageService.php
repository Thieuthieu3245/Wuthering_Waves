<?php

namespace Services;

use Models\Origin;
use Models\Personnage;
use Models\PersonneDAO;
use Models\Element;
use Models\UnitClass;
use Models\Weapon;

class PersonnageService
{
    private PersonneDAO $personneDAO;
    private ElementService $elementService;
    private UnitClassService $unitClassService;
    private OriginService $originService;
    private WeaponService $weaponService;

    public function __construct() {
        $this->personneDAO = new PersonneDAO();
        $this->elementService = new ElementService();
        $this->unitClassService = new UnitClassService();
        $this->originService = new OriginService();
        $this->weaponService = new WeaponService();
    }

    /**
     * Return all personnages
     * @return array All personnages
     */
    public function getAll() : array {
        try{
            $data = $this->personneDAO->getAll();
            $listPersonnages = [];
            foreach($data as $personnage) {
                if(!$personnage) continue;

                $weapon = $this->weaponService->getWeaponById($personnage['idWeapon']);
                $element = $this->elementService->getElementById($personnage['idElement']);
                $unitClass = $this->unitClassService->getUnitClassById($personnage['idUnitClass']);
                $origin = $personnage['idOrigin'] ? $this->originService->getOriginById($personnage['idOrigin']) : null;

                $listPersonnages[] = $this->hydrate($personnage, $element, $origin, $unitClass, $weapon);
            }
        }
        catch(\Exception $e) {
            throw new \Exception("La liste des personnages n'a pas pu étre chargé", 1);
        }
        return $listPersonnages;
    }

    /**
     * Return a personnage by its id
     * @param string $id The id of the personnage
     * @return Personnage The personnage
     * @throws \Exception If an error occurs during the retrieval
     */
    public function getById(string $id) : ?Personnage{
        try{
            $data = $this->personneDAO->getById($id);
            if(!$data) return null;
    
            $weapon = $this->weaponService->getWeaponById($data['idWeapon']);
            $element = $this->elementService->getElementById($data['idElement']);
            $unitClass = $this->unitClassService->getUnitClassById($data['idUnitClass']);
            $origin = $data['idOrigin'] ? $this->originService->getOriginById($data['idOrigin']) : null;

            $personnage = $this->hydrate($data, $element, $origin, $unitClass, $weapon);
        } catch(\Exception $e) {
            throw new \Exception("Le personnage n'a pas pu étre chargé", 1);
        }
        
        return $personnage;
    }

    
    /**
     * Function to create a personnage
     * @param string $personname The personnage to create
     * @return bool True if the personnage has been created, false otherwise
     */
    public function create(Personnage $personnage) : bool {
        try{
            $personnage->setId(uniqid());
            $result = $this->personneDAO->create($personnage);
        }
        catch(\Exception $e) {
            throw new \Exception("Le personnage n'a pas pu étre créé", 1);
        }
        return $result;
    }

    /**
     * Deletes a personnage from the database
     * @param string $id The id of the personnage
     * @return bool True if the personnage has been deleted, false otherwise
     * @throws \Exception If an error occurs during the deletion
     */
    public function delete(string $id) : bool {
        try{
            $result = $this->personneDAO->delete($id);
        }
        catch(\Exception $e) {
            throw new \Exception("Le personnage n'a pas pu étre supprimé", 1);
        }
        return $result;
    }

    /**
     * Modifies a personnage in the database
     * @param string $personname The personnage to modify
     * @return bool True if the personnage has been modified, false otherwise
     * @throws \Exception If an error occurs during the modification
     */
    public function edit(Personnage $personnage) : bool {
        try{
            $result = $this->personneDAO->edit($personnage);
        }
        catch(\Exception $e) {
            throw new \Exception("Le personnage n'a pas pu étre modifié", 1);
        }
        return $result;
    }

    private function hydrate(array $data, Element $element, ?Origin $origin, UnitClass $unitClass, Weapon $weapon) : Personnage {
        return new Personnage(
            $data['idPersonnage'],
            $data['Name'],
            $element,
            $unitClass,
            $weapon,
            $data['rarity'],
            $data['url_image'] ?? '',
            $origin,
        );
    }
}
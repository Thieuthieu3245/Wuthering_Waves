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

    public function getAll() : array {
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
        return $listPersonnages;
    }

    public function getById(string $id) : ?Personnage{
        $data = $this->personneDAO->getById($id);
        if(!$data) return null;

        $weapon = $this->weaponService->getWeaponById($data['idWeapon']);
        $element = $this->elementService->getElementById($data['idElement']);
        $unitClass = $this->unitClassService->getUnitClassById($data['idUnitClass']);
        $origin = $data['idOrigin'] ? $this->originService->getOriginById($data['idOrigin']) : null;
        
        return $this->hydrate($data, $element, $origin, $unitClass, $weapon);
    }

    public function create(Personnage $personnage) : bool {
        $personnage->setId(uniqid());
        return $this->personneDAO->create($personnage);
    }

    public function delete(string $id) : bool {
        if(!$id) return false;
        return $this->personneDAO->delete($id);
    }

    public function edit(Personnage $personnage) : bool {
        if(!$personnage->getId()) throw new \Exception("Personnage must have an id");
        return $this->personneDAO->edit($personnage);
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
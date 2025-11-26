<?php

namespace Controllers;

use League\Plates\Engine;
use Models\Element;
use Models\UnitClass;
use Models\Origin;
use Models\Weapon;
use Models\Personnage;
use Services\ElementService;
use Services\PersonnageService;
use Services\WeaponService;
use Services\UnitClassService;
use Services\OriginService;

class PersoController
{
    private $templates;
    private MainController $controller;
    private $persoService;
    private $elementService;
    private $weaponService;
    private $originService;
    private $unitclassService;

    public function __construct(Engine $engine) {
        $this->templates = $engine;
        $this->controller = new MainController($engine);
        $this->persoService = new PersonnageService();
        $this->elementService = new ElementService();
        $this->weaponService = new WeaponService();
        $this->originService = new OriginService();
        $this->unitclassService = new UnitClassService();
    }

    public function displayAddPerso(?string $id = null) {
        $elements = $this->elementService->getAllElements();
        $weapons  = $this->weaponService->getAllWeapons();
        $origins  = $this->originService->getAllOrigins();
        $unitclasses = $this->unitclassService->getAllUnitClasses();

        $perso = new Personnage(null, "", $elements[0], $unitclasses[0], $weapons[0], 5, "", null);

        if($id) $perso = $this->persoService->getById($id);
    
        echo $this->templates->render('add-perso', [
            'listElements' => $elements,
            'listWeapons'  => $weapons,
            'listOrigins'  => $origins,
            'listClasses'  => $unitclasses,
            'perso' => $perso
        ]);
    }

    public function addPerso(string $name, string $element, string $unitclass, string $weapon, int $rarity, string $urlImg, ?string $origin = null) {
        $element = $this->elementService->getElementById($element);
        $unitclass = $this->unitclassService->getUnitClassById($unitclass);
        $weapon = $this->weaponService->getWeaponById($weapon);
        $origin = $origin ? $this->originService->getOriginById($origin) : null;

        $perso = new Personnage(null, $name, $element, $unitclass, $weapon, $rarity, $urlImg, $origin);

        $this->persoService->create($perso);
        $this->controller->index();
    }

    public function editPerso(string $id, string $name, string $element, string $unitclass, string $weapon, int $rarity, string $urlImg, ?string $origin = null) {
        $element = $this->elementService->getElementById($element);
        $unitclass = $this->unitclassService->getUnitClassById($unitclass);
        $weapon = $this->weaponService->getWeaponById($weapon);
        $origin = $origin ? $this->originService->getOriginById($origin) : null;

        $perso = new Personnage($id, $name, $element, $unitclass, $weapon, $rarity, $urlImg, $origin);
        try {
            $this->persoService->edit($perso);
            $this->controller->index();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
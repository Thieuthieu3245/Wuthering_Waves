<?php

namespace Services;

use Models\Personnage;
use Models\PersonneDAO;

class PersonnageService
{
    private $personneDAO;

    public function __construct() {
        $this->personneDAO = new PersonneDAO();
    }

    public function getAll() : array {
        $personnes = $this->personneDAO->getAll();
        $listPersonnages = array_map(function ($personne) {
            return new Personnage(
                $personne['idPersonnage'],
                $personne['Name'],
                $personne['Element_'],
                $personne['unitclass'],
                $personne['weapon'],
                $personne['rarity'],
                $personne['origin'] ?? null,
                $personne['url_image'] ?? ''
            );
        }, $personnes);
        return $listPersonnages;
    }

    public function getById(string $id) : ?Personnage{
        $data = $this->personneDAO->getById($id);
        if(!$data) return null;
        return new Personnage(
            $data['idPersonnage'],
            $data['Name'],
            $data['Element_'],
            $data['unitclass'],
            $data['weapon'],
            $data['rarity'],
            $data['origin'] ?? null,
            $data['url_image'] ?? ''
        );
    }
}
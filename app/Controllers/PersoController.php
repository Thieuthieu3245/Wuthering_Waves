<?php

namespace Controllers;

use League\Plates\Engine;
use Models\Element;
use Models\Message;
use Models\UnitClass;
use Models\Origin;
use Models\Weapon;
use Models\Personnage;
use Services\ElementService;
use Services\LogService;
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

    /**
     * Redirect to the main page of the website
     * @param Message $message The message to display (optional)
     */
    public function index(?Message $message = null) {
        $this->controller->index($message);
    }

    /**
     * Get the informations to display in the add personnage page
     * @param string $id The id of the personnage to display (optional)
     * @param Message $message The message to display (optional)
     */
    public function displayAddPerso(?string $id = null, ?Message $message = null) {
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
            'perso' => $perso,
            'message' => $message
        ]);
    }

    /**
     * Ajouter un personnage
     * @param string $name Le nom du personnage
     * @param string $element L'id de l'élement du personnage
     * @param string $unitclass L'id de la classe d'unit du personnage
     * @param string $weapon L'id de l'arme du personnage
     * @param int $rarity La rarete du personnage
     * @param string $urlImg L'url de l'image du personnage
     * @param string|null $origin L'id de l'origine du personnage (facultatif)
     * @throws \Throwable Si une erreur se produit lors de l'ajout
     */
    public function addPerso(string $name, string $element, string $unitclass, string $weapon, int $rarity, string $urlImg, ?string $origin = null) {
        try{
            LogService::addLog(LogService::INFO, "Essai d'ajout d'un personnage");
            $element = $this->elementService->getElementById($element);
            $unitclass = $this->unitclassService->getUnitClassById($unitclass);
            $weapon = $this->weaponService->getWeaponById($weapon);
            $origin = $origin ? $this->originService->getOriginById($origin) : null;
    
            $perso = new Personnage(null, $name, $element, $unitclass, $weapon, $rarity, $urlImg, $origin);
    
            $result = $this->persoService->create($perso);
            if($result){
                LogService::addLog(LogService::SUCCESS, "Personnage ajouté");
                $message = new Message("Le personnage a bien été ajouté", Message::MESSAGE_COLOR_SUCCESS, "Succès");
                $this->controller->index($message);
            }
            else {
                LogService::addLog(LogService::ERROR, "Personnage non ajouté");
                $message = new Message("Le personnage n'a pas pu être ajouté", Message::MESSAGE_COLOR_ERROR, "Echec");
                $this->displayAddPerso(null, $message);
            }
        }
        catch (\Exception $e){
            LogService::addLog(LogService::ERROR, "Une erreur est survenue : " . $e->getMessage());
            $message = new Message("Le personnage n'a pas pu être ajouté", Message::MESSAGE_COLOR_ERROR, "Echec");
            $this->displayAddPerso(null, $message);
        }

    }

    /**
     * Modify a personnage
     * @param string $id The id of the personnage
     * @param string $name The name of the personnage
     * @param string $element The id of the element of the personnage
     * @param string $unitclass The id of the unit class of the personnage
     * @param string $weapon The id of the weapon of the personnage
     * @param int $rarity The rarity of the personnage
     * @param string $urlImg The url of the image of the personnage
     * @param string $origin The id of the origin of the personnage
     * @throws \Throwable If an error occurs during the modification
     */
    public function editPerso(string $id, string $name, string $element, string $unitclass, string $weapon, int $rarity, string $urlImg, ?string $origin = null) {
        try {
            LogService::addLog(LogService::INFO, "Essai de modification d'un personnage");
            $element = $this->elementService->getElementById($element);
            $unitclass = $this->unitclassService->getUnitClassById($unitclass);
            $weapon = $this->weaponService->getWeaponById($weapon);
            $origin = $origin ? $this->originService->getOriginById($origin) : null;
    
            $perso = new Personnage($id, $name, $element, $unitclass, $weapon, $rarity, $urlImg, $origin);

            $result = $this->persoService->edit($perso);
            if($result){
                LogService::addLog(LogService::SUCCESS, "Personnage modifié");
                $message = new Message("Le personnage a bien été modifié", Message::MESSAGE_COLOR_SUCCESS, "Succès");
                $this->controller->index($message);
            }
            else {
                LogService::addLog(LogService::ERROR, "Personnage non modifié");
                $message = new Message("Le personnage n'a pas pu être modifié", Message::MESSAGE_COLOR_ERROR, "Echec");
                $this->displayAddPerso($id, $message);
            }
        } catch (\Throwable $th) {
            LogService::addLog(LogService::ERROR, "Une erreur est survenue : " . $th->getMessage());
            $message = new Message($th->getMessage(), Message::MESSAGE_COLOR_ERROR, "Echec");
            $this->displayAddPerso($id, $message);
        }
    }

    /**
     * Call the service to delete a personnage
     * @param string $id The id of the personnage to delete
     * @throws \Throwable If an error occurs during the deletion
     */
    public function deletePerso(string $id) {
        try {
            LogService::addLog(LogService::INFO, "Essai de suppression d'un personnage");
            $result = $this->persoService->delete($id);
            if($result){
                LogService::addLog(LogService::SUCCESS, "Personnage supprimé");
                $message = new Message("Le personnage a bien été supprimé", Message::MESSAGE_COLOR_SUCCESS, "Succès");
            }
            else {
                LogService::addLog(LogService::ERROR, "Personnage non supprimé");
                $message = new Message("Le personnage n'a pas pu être supprimé", Message::MESSAGE_COLOR_ERROR, "Echec");
            }
        }
        catch (\Throwable $th) {
            LogService::addLog(LogService::ERROR, "Une erreur est survenue : " . $th->getMessage());
            $message = new Message($th->getMessage(), Message::MESSAGE_COLOR_ERROR, "Echec");
        }
        $this->controller->index($message);
    }
}
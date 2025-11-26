<?php

namespace Controllers;

use League\Plates\Engine;
use Models\Color;
use Models\Element;
use Models\Message;
use Models\UnitClass;
use Models\Origin;
use Models\Weapon;
use Services\ElementService;
use Services\LogService;
use Services\WeaponService;
use Services\UnitClassService;
use Services\OriginService;

class AttributController
{
    private MainController $mainCtrl;
    private ElementService $elementService;
    private WeaponService $weaponService;
    private UnitClassService $unitClassService;
    private OriginService $originService;
    private Engine $template;

    public function __construct(Engine $engine) {
        $this->template = $engine;
        $this->mainCtrl = new MainController($engine);
        $this->elementService = new ElementService();
        $this->weaponService = new WeaponService();
        $this->unitClassService = new UnitClassService();
        $this->originService = new OriginService();
    }

    /**
     * Display the add attribute page.
     * @param Message|null $message The message to display (optional)
     */
    public function displayAddAttribut(?Message $message = null) {
        //$listColors = Color::cases();
        echo $this->template->render('add-attribut', [
            'gameName' => $this->mainCtrl->GAME_NAME,
            'message' => $message
        //    'listColors' => $listColors,
        ]);
    }

    /**
     * Choose the type of the attribut and add it
     * @param string $type The type of the attribut (element, weapon, unitClass, origin)
     * @param string $name The name of the attribut
     * @param string|null $color The color of the attribut (optional)
     * @param string $urlImg The url of the image of the attribut
     * @return void
     * @throws \Exception If an error occurs during the operation
     */
    public function addAttribut(string $type, string $name, ?string $color, string $urlImg) {
        switch ($type) {
            case 'element':
                $message = $this->addElement($name, $color, $urlImg);
                break;
            case 'weapon':
                $message = $this->addWeapon($name, $urlImg);
                break;
            case 'unitClass':
                $message = $this->addUnitClass($name, $urlImg);
                break;
            case 'origin':
                $message = $this->addOrigin($name, $urlImg);
                break;
        }
        $this->mainCtrl->index($message);
    }

    /**
     * Add an element
     * @param string $name The name of the element.
     * @param string|null $color The color of the element (optional).
     * @param string $urlImg The url of the image of the element.
     * @return Message The result of the operation.
     * @throws \Exception If an error occurs during the operation.
     */
    private function addElement(string $name, ?string $color, string $urlImg) {
        try{
            LogService::addLog(LogService::INFO, "Essai d'ajout d'un élément");
            $color = new Color($color);
            $element = new Element(null, $name, $color, $urlImg);
            $result = $this->elementService->createElement($element);
            if($result){
                LogService::addLog(LogService::SUCCESS, "Ajout d'un élément réussi");
                $message = new Message("L'élément a bien été ajouté", Message::MESSAGE_COLOR_SUCCESS, "Succès");
            }
            else {
                LogService::addLog(LogService::ERROR, "Ajout d'un élément échoué");
                $message = new Message("L'élément n'a pas pu être ajouté", Message::MESSAGE_COLOR_ERROR, "Echec");
            }
        }
        catch (\Exception $e){
            LogService::addLog(LogService::ERROR, "Une erreur est survenue : " . $e->getMessage());
            $message = new Message("L'élément n'a pas pu être ajouté", Message::MESSAGE_COLOR_ERROR, "Echec");
        }
        return $message;
    }

    /**
     * Add a weapon
     * @param string $name The name of the weapon.
     * @param string $urlImg The url of the image of the weapon.
     * @return Message The result of the operation.
     * @throws \Exception If an error occurs during the operation.
     */
    private function addWeapon(string $name, string $urlImg) {
        try {
            LogService::addLog(LogService::INFO, "Essai d'ajout d'une arme");
            $weapon = new Weapon(null, $name, $urlImg);
            $result = $this->weaponService->createWeapon($weapon);
            if($result){
                LogService::addLog(LogService::SUCCESS, "Ajout d'une arme réussi");
                $message = new Message("L'arme a bien été ajoutée", Message::MESSAGE_COLOR_SUCCESS, "Succès");
            }
            else {
                LogService::addLog(LogService::ERROR, "Ajout d'une arme échoué");
                $message = new Message("L'arme n'a pas pu être ajoutée", Message::MESSAGE_COLOR_ERROR, "Echec");
            }
        }
        catch (\Exception $e) {
            LogService::addLog(LogService::ERROR, "Une erreur est survenue : " . $e->getMessage());
            $message = new Message("L'arme n'a pas pu être ajoutée", Message::MESSAGE_COLOR_ERROR, "Echec");
        }
        return $message;
    }

    /**
     * Add a unit class
     * @param string $name The name of the unit class.
     * @param string $urlImg The url of the image of the unit class.
     * @return Message The result of the operation.
     * @throws \Exception If an error occurs during the operation.
     */
    private function addUnitClass(string $name, string $urlImg) : Message {
        try{
            LogService::addLog(LogService::INFO, "Essai d'ajout d'une classe d'unit");
            $unitClass = new UnitClass(null, $name, $urlImg);
            $result = $this->unitClassService->createUnitClass($unitClass);
            if($result){
                LogService::addLog(LogService::SUCCESS, "Ajout d'une classe d'unit réussi");
                $message = new Message("La classe d'unit a bien été ajoutée", Message::MESSAGE_COLOR_SUCCESS, "Succès");
            }
            else {
                LogService::addLog(LogService::ERROR, "Ajout d'une classe d'unit échoué");
                $message = new Message("La classe d'unit n'a pas pu être ajoutée", Message::MESSAGE_COLOR_ERROR, "Echec");
            }
        }
        catch (\Exception $e){
            LogService::addLog(LogService::ERROR, "Une erreur est survenue : " . $e->getMessage());
            $message = new Message("La classe d'unit n'a pas pu être ajoutée", Message::MESSAGE_COLOR_ERROR, "Echec");
        }
        return $message;
    }

    /**
     * Add an origin
     * @param string $name The name of the origin.
     * @param string $urlImg The url of the image of the origin.
     * @return Message The result of the operation.
     * @throws \Exception If an error occurs during the operation.
     */
    private function addOrigin(string $name, string $urlImg) : Message {
        try{
            LogService::addLog(LogService::INFO, "Essai d'ajout d'une origine");
            $origin = new Origin(null, $name, $urlImg);
            $result = $this->originService->createOrigin($origin);
            if($result){
                LogService::addLog(LogService::SUCCESS, "Ajout d'une origine réussi");
                $message = new Message("L'origine a bien été ajoutée", Message::MESSAGE_COLOR_SUCCESS, "Succès");
            }
            else {
                LogService::addLog(LogService::ERROR, "Ajout d'une origine échoué");
                $message = new Message("L'origine n'a pas pu être ajoutée", Message::MESSAGE_COLOR_ERROR, "Echec");
            }
        }
        catch (\Exception $e){
            LogService::addLog(LogService::ERROR, "Une erreur est survenue : " . $e->getMessage());
            $message = new Message("L'origine n'a pas pu être ajoutée", Message::MESSAGE_COLOR_ERROR, "Echec");
        }
        return $message;
    }
}
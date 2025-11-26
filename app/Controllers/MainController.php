<?php


namespace Controllers;

use League\Plates\Engine;
use Models\Message;
use Services\PersonnageService;

class MainController 
{
    public string $GAME_NAME = 'Wuthering Waves';
    private Engine $templates;
    private PersonnageService $service;
    
    public function __construct(Engine $engine) {
        $this->templates = $engine;
        $this->service = new PersonnageService();
    }

    /**
     * Affiche la page d'accueil avec la liste des personnages
     * @param Message|null $message Le message a afficher en haut de page
     * @return void
     */
    public function index(?Message $message = null):void {
        $listPersonnages = $this->service->getAll();
        echo $this->templates->render('home',[
            'gameName' => $this->GAME_NAME,
            'message' => $message,
            'listPersonnage' => $listPersonnages
        ]);
    }


}
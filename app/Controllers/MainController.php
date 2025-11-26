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

    public function index():void {
        $listPersonnages = $this->service->getAll();
        echo $this->templates->render('home',[
            'gameName' => $this->GAME_NAME,
            'message' => $message,
            'listPersonnage' => $listPersonnages
        ]);
    }


}
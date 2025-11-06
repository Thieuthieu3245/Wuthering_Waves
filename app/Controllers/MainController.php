<?php


namespace Controllers;

use League\Plates\Engine;
use Services\PersonnageService;

class MainController 
{
    private Engine $templates;
    private PersonnageService $service;
    
    public function __construct(Engine $engine) {
        $this->templates = $engine;
        $this->service = new PersonnageService();
    }

    public function index():void {
        echo $this->templates->render('home',[
            'gameName'=>'Wuthering Waves',
            'listPersonnage'=>$this->service->getAll(),
            'first'=>$this->service->getById("1"),
            'other'=>$this->service->getById('sifnspfijnspi')
        ]);
    }
}
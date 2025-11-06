<?php


namespace Controllers;

use League\Plates\Engine;

class MainController 
{
    private Engine $templates;
    
    public function __construct(Engine $engine) {
        $this->templates = $engine;
    }

    public function index():void {
        echo $this->templates->render('home',['gameName'=>'Wuthering Waves']);
    }
}
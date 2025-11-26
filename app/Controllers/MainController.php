<?php


namespace Controllers;

use League\Plates\Engine;
use Models\Message;
use Services\LogService;
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

    /**
     * Affiche la page des logs avec le contenu du fichier log demandé ou le fichier log du jour si aucun fichier n'est spécifié
     * @param string|null $fileName Le nom du fichier log à afficher, ou null pour afficher le fichier log du jour
     * @return void
     */
    public function displayLogs(?string $fileName = null)
    {
        LogService::addLog(LogService::INFO, "Accès aux logs");
        $logs = LogService::listLogs();
        $content = null;

        if (in_array($fileName, $logs)) {
            $content = LogService::readLog($fileName);
        }
        else{
            $content = LogService::readLog(LogService::getDailyLogFilename());
        }

        echo $this->templates->render('logs', [
            'logs' => $logs,
            'selectedFile' => $fileName,
            'content' => $content
        ]);
    }


}
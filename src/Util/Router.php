<?php

namespace App\Util;

use App\Util\Http;
use App\Util\Session;

use App\Controller\Post;
use App\Controller\User;


Class Router{

    public static function invoke(){        
        
        if(!empty($_GET['controller'])){
            $controllerName = ucfirst($_GET['controller'].'Controller');
        }
        else {$controllerName = "PostController";}

        if(!empty($_GET['action'])){
            $action = $_GET['action'];        
        }
        else {$action="accueil";}                          

        //Represente le chemin du dossier des controllers
        $path = "src/Controller/$controllerName.php";
       /*
        if (!file_exists($path)) {
        // Si le controller n'existe pas, on affiche une erreur :
        Session::addFlash('error', "Le controller que vous avez demandé n'existe pas !");
        //Http::redirect('index.php?controller=Post&action=accueil');
        }
        */
        // Represente le Namespace et non le chemin
       
        
        $controllerName = "App\Controller\\".$controllerName;
       
        //$controller = new $controllerName;
        $controller = new $controllerName;
        /*
        if (!method_exists($controller, $action)) {
            // Si le controller ne connait pas de method pour cette action, on affiche une erreur
            Session::addFlash('error', "L'action que vous avez demandé n'existe pas !");
            Http::redirect("index.php?controller=Post&action=accueil");
        }      
        */
        $controller->$action();
        
    }
}

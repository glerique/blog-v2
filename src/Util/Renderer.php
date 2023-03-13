<?php

namespace App\Util;

class Renderer
{

    
      //Affiche la vue demandée dans $path en injectant les variables contenues dans $var
     
     
    public static function render(string $path, array $var = []): void
    {
        
        extract($var);

        ob_start();
        require('../blog-v2/templates/' . $path . '.view.php');
        $pageContent = ob_get_clean();

        require('../blog-v2/templates/includes/layout.php');
    }
}

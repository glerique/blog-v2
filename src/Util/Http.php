<?php

namespace App\Util;

class Http {

    public static function redirect(string $url)
    {
        header("Location:$url");        
        exit();
       
    }
}
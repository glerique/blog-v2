<?php

namespace App\Controller;

use App\Util\Http;
use App\Util\Session;


abstract class Controller
{

    protected $modelName;
    protected $modelManager;

    public function __construct()
    {
        $realModelName = "App\\Model\\".$this->modelName . 'Manager';
        $this->modelManager = new $realModelName();
    }


    protected function redirectWithError(string $url, string $message)
    {
        Session::addFlash('error', $message);
        Http::redirect($url);
    }

    protected function redirectWithSuccess(string $url, string $message)
    {
        Session::addFlash('success', $message);
        Http::redirect($url);
    }
}
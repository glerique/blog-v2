<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

use App\Util\Router;
require_once('vendor/autoload.php');

$router = new Router;
$router->invoke();

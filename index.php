<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

use App\Util\Router;
require_once('vendor/autoload.php');
Require_once('config/config.php');

$router = new Router;
$router->invoke();

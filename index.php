<?php
require_once 'vendor/autoload.php';


use Core\Router;

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/Core/Router.php');
$router = new Router;
$router->run();










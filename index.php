<?php
require_once 'vendor/autoload.php';
//$config = require 'DbConfig.php';
//
//var_dump($config);
//var_dump(sum(5,6));

use Core\Router;

$router = new Router;
$router->run();
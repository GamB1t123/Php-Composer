<?php
require_once 'vendor/autoload.php';

use Core\Router;

define('ROOT', dirname(__FILE__));
$router = new Router;
$router->run();
//header(string $header, bool $replace = true, int $response_code = 0)













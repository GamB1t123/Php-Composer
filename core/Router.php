<?php

namespace Core;

use App\Controller\Errors\Error404;

class Router
{
    private $routes;

    public function __construct() {
        $routesPath = ROOT.'/app/config/index.php';
        $this->routes = include_once $routesPath;

    }
    private function getURI() {

        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    private function error()
    {
        $obj = new Error404();
        $obj->index();
    }
    public function run()
    {
        $uri = $this->getURI();
        $namespace = array_search($uri, $this->routes);
        if ($namespace != false) {
            $classnamespace = explode('@', $namespace);
            if (class_exists($classnamespace[0])) {
                $class = new $classnamespace[0];
                $method = $classnamespace[1];
                if (method_exists($class, $method)) {
                    $class->$method();
                } else {
                    $this->error();
                }
            } else {
                $this->error();
            }
        }
    }


}





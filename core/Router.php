<?php

namespace Core;


use App\Controller\Errors\Error404;

class Router
{
    protected $controller;
    protected $method;

    public function __construct()
    {
        $this->init();
        $this->init1();

    }

    public function run()
    {
        $classNameSpace = 'App\Controller\Admin\\' . $this->controller;


        if (class_exists($classNameSpace)) {
            $clsObj = new $classNameSpace;
            $method = $this->method;
            if (method_exists($clsObj, $method)) {
                return $clsObj->$method();
            }

        }
        $obj = new Error404();
        $obj->index();
    }

    public function init()
    {
        $path = [];
        if (!empty($_SERVER['REDIRECT_URL'])) {
            $path = explode('/', $_SERVER['REDIRECT_URL']);
        }


       $this->controller = (!empty($path[1])) ? $path[1] : 'Index';
        $this->method = (!empty($path[2])) ? $path[2] : 'chome';

    }


    public function run1()
    {
        $classNameSpace = 'App\Controller\Home\\' . $this->controller;

        if (class_exists($classNameSpace)) {
            $clsObj = new $classNameSpace;
            $method = $this->method;
            if (method_exists($clsObj, $method)) {
                return $clsObj->$method();
            }
        }


    }

    public function init1()
    {
        $path = [];
        if (!empty($_SERVER['REDIRECT_URL'])) {
            $path = explode('/', $_SERVER['REDIRECT_URL']);
        }

        $this->controller = (!empty($path[1])) ? $path[1] : 'CHome';
        $this->method = (!empty($path[2])) ? $path[2] : 'chome';
    }
    
    //За контроллер Error 404 не впевнений, нічого іншого не придумав
//    public function error()
//    {   $classNameSpace = 'App\Controller\Home\\' . $this->controller;
//        $classNameSpace1 = 'App\Controller\Admin\\' . $this->controller;
//        if (class_exists($classNameSpace, $classNameSpace1)) {
//
//        } else {
//            $obj = new Error404();
//            $obj->index();
//        }
//
//
//
//    }




}





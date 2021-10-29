<?php


namespace App\Controller;


use Core\View;

class Controller
{
    protected function  generate(string $path, array  $data = [])
    {
        View::generate($path, $data);
    }
}
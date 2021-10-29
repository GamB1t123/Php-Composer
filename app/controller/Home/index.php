<?php


namespace App\Controller\Home;


use App\Controller\Controller;

class index extends Controller
{
    public function home()
    {
        $this->generate('home/home/index');
    }
}
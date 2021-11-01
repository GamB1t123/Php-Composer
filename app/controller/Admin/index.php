<?php


namespace App\Controller\admin;


use App\Controller\Controller;

class index extends Controller
{
    public function admin()
    {
        $this->generate('admin/admin/index');
    }
}
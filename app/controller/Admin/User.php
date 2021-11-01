<?php

namespace App\Controller\admin;

use App\models\User as UserModel;
use App\Controller\Controller;

class User extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $data =  $userModel->getUser();
        $this->generate('admin/user/index', $data);
    }
}
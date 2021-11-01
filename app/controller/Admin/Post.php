<?php


namespace App\Controller\admin;

use App\models\Post as PostModel;
use App\Controller\Controller;

class Post extends Controller
{
    public function index()
    {
        $postModel = new PostModel();
        $data = $postModel->someArr;
        $this->generate('admin/post/index', $data);
    }
}
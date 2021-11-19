<?php


namespace App\Controller\admin;

use App\models\Post as PostModel;
use App\Controller\Controller;
use App\Helpers\GlobalFilters;

class Post extends Controller
{
    public function index()
    {

        $postModel = new PostModel();
        $this->generate('admin/post/index', $postModel->getPosts(GlobalFilters::postFilter()));
    }
}
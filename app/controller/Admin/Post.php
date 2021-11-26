<?php


namespace App\Controller\admin;

use App\models\Post as PostModel;
use App\Controller\Controller;
use App\Helpers\GlobalFilters;

class Post extends Controller
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {

        $this->generate('admin/post/index', $this->postModel->getPosts(GlobalFilters::postFilter()));
    }

    public function create()
    {
        $this->generate('admin/post/create', $this->postModel->createPosts(GlobalFilters::postFilter()));
    }

    public function update()
    {
        if (!empty(GlobalFilters::postFilter())) {
            $this->postModel->updatePosts(GlobalFilters::postFilter());
        }
        $this->generate('admin/post/update',$this->postModel->getPost($_GET['id']));
    }

    public function delete()
    {
        $this->generate('admin/post/index',$this->postModel->deletePosts(GlobalFilters::postFilter()));
    }
}
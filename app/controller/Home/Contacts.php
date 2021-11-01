<?php


namespace App\Controller\Home;

use App\models\Contacts as ContractsModel;
use App\Controller\Controller;

class Contacts extends Controller
{
    public function index()
    {
        $contractsModel = new ContractsModel();
        $data = $contractsModel->contacts;
        $this->generate('admin/contacts/index', $data);
    }
}
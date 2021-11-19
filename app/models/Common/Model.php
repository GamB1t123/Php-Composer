<?php


namespace App\models\Common;

use Lib\DB\Common\SQL;

class Model
{
    protected $sql;

    public function __construct()
    {
        $this->sql = new SQL();
    }

    protected function select()
    {
        return $this->sql->select();
    }
}
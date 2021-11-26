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

    protected function insert()
    {
        return $this->sql->insert();
    }

    protected function update()
    {
        return $this->sql->update();
    }

    protected function delete()
    {
        return $this->sql->delete();
    }
}
<?php


namespace Lib\DB\Common;


use Lib\DB\Delete;
use Lib\DB\Insert;
use Lib\DB\Select;
use Lib\DB\Update;

class SQL
{
    public function select()
    {
        return new Select();
    }

    public function insert()
    {
        return new Insert();
    }

    public function update()
    {
        return new Update();
    }

    public function delete()
    {
        return new Delete();
    }
}
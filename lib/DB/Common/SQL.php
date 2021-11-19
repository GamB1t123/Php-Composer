<?php


namespace Lib\DB\Common;


use Lib\DB\Select;

class SQL
{
    public function select()
    {
        return new Select();
    }
}
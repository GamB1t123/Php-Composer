<?php


namespace Lib\DB;


use Lib\DB\Common\Bridge;

class Delete extends Bridge
{
    public $delete;
    protected $whereCondition;


    public function getDelete()
    {
        return $this->buildoutputString($this->delete);
    }


    public function setDelete($delete): void
    {
        $this->delete = $delete;
    }
    public  function setWhereCondition($whereCondition) : void
    {
        $this->whereCondition = $whereCondition;
    }

    public  function getSqlString()
    {
        $sqlDelete = 'DELETE FROM ' . $this->getTableNames();
        if (!empty($this->whereCondition)) {
        $obj = new Where($this->whereCondition);
        $sqlDelete .= ' WHERE ' . $obj->getWhereString();
    }
        return $sqlDelete;
    }


    public function execute()
    {
        $result = $this->fromDB();
        $result = $result->fetchAll( \PDO::FETCH_ASSOC);
        return $result;
    }



}
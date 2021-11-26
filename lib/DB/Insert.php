<?php


namespace Lib\DB;


use Lib\DB\Common\Bridge;

class Insert extends Bridge
{
    public $insert;
    private $dataToUpdate;


    public function getDataToUpdate()
    {
        return $this->buildoutputString($this->dataToUpdate);
    }

    public function setDataToUpdate($dataToUpdate): void
    {
        $this->dataToUpdate = $dataToUpdate;
    }

    public function getInsert()
    {
        return $this->insert;
    }


    public function getSqlString()
    {
        $sqlCreate = 'INSERT INTO ' . $this->getTableNames();
        $sqlCreate.= ' VALUES '. $this->getDataToUpdate();
        return $sqlCreate;
    }

    public function execute()
    {
        $result = $this->fromDB();
        $result = $result->fetchAll( \PDO::FETCH_ASSOC);
        return $result;
    }

}
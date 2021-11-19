<?php


namespace Lib\DB\Common;


abstract class Bridge
{
    protected $conn;

    public function __construct()
    {
        $obj = new Connector();
        $this->conn = $obj->getConnect();
    }

    public function fromDB()
    {
        $stmt = $this->conn->prepare($this->getSqlString());
        $stmt->execute();
        return $stmt;
    }

    public abstract function getSqlString();

}
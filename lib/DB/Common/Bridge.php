<?php


namespace Lib\DB\Common;


abstract class Bridge
{
    protected $conn;
    private $tabelNames;

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

    public function getTableNames()
    {
        return $this->buildoutputString($this->tabelNames);
    }

    public function setTableNames($tableNames) : void
    {
        $this->tabelNames = $tableNames;
    }

    protected function  buildoutputString($stringToBuild, $order = false) : string
    {
        $outputString = '';
        if (is_string($stringToBuild)) {
            $outputString = $stringToBuild;
        } else if (is_array($stringToBuild)) {
            foreach ($stringToBuild as $key=>$value)
            {
                if (!empty($outputString)) {
                    $outputString.= ',';
                }
                if (is_int($key)) {
                    $outputString .=$value;
                } else {
                    if (!$order) {
                        $outputString.=$value . ' AS ' . $key;
                    } else {
                        $outputString.= $key . ' ' . $value;
                    }
                }
            }
        }
        return $outputString;

    }

    public  function getSqlString()
    {

    }

}
<?php


namespace Lib\DB;


use Lib\DB\Common\Bridge;

class Select extends Bridge
{
    private $tabelNames;
    private $fieldNames;
    private $ordered;
    private $orderedType;
    private int $limited = 0;
    private int $offset = 0;
    private $whereCondition;

    public  function setWhereCondition($whereCondition) : void
    {
        $this->whereCondition = $whereCondition;
    }

    private function  buildoutputString($stringToBuild, $order = false) : string
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


    private function getOrderedType()
    {
            return $this->orderedType;
    }

    private function getTableNames()
    {
        return $this->buildoutputString($this->tabelNames);
    }

    private function getFieldNames()
    {
        return $this->buildoutputString($this->fieldNames);
    }

    private function getOrdered()
    {
        return $this->buildoutputString($this->ordered, true);
    }

    private function  getLimited()
    {
        return $this->limited;
    }

    private function getOffset()
    {
        return $this->offset;
    }

    public function setTableNames($tableNames) : void
    {
        $this->tabelNames = $tableNames;
    }

    public function setFieldNames($fieldNames) : void
    {
        $this->fieldNames = $fieldNames;
    }

    public function setOrdered(string $ordered) : void
    {
        $this->ordered = $ordered;
    }

    public function setOrderedType($orderedType) : void
    {
        $this->orderedType = $orderedType;
    }

    public function setLimited(int $limited) : void
    {
        $this->limited = $limited;
    }

    public function setOffset(int $offset) : void
    {
        $this->offset = $offset;
    }

    public function getSqlString() : string
    {
        $sql = 'SELECT *' . $this->getFieldNames() . ' FROM ' . $this->getTableNames();
        $whereStr = '';
        if (!empty($this->whereCondition)) {
            $obj = new Where();
            $whereStr = $obj->getWhereString();
        }
        if (!empty($this->ordered)) {
            $sql.= ' ORDERED BY ' . $this->setOrdered();
        }
        if  ($this->limited>0) {
            $sql.= ' LIMIT ' . $this->getLimited();
            if ($this->offset>0) {
                $sql .= ', ' . $this->getOffset();
            }
        }
        var_dump($sql);
        return $sql;

    }
    public function execute()
    {
        $result = $this->fromDB();
        $result = $result->fetchAll( \PDO::FETCH_ASSOC);
        return $result;
        //foreach ($result as $key=>$value) {


        //}
    }
}
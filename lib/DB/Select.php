<?php


namespace Lib\DB;


use Lib\DB\Common\Bridge;

class Select extends Bridge
{
    private $fieldNames;
    private $ordered;
    private $orderedType;
    private int $limited = 0;
    private int $offset = 0;
    protected $whereCondition;


    public  function setWhereCondition($whereCondition) : void
    {
        $this->whereCondition = $whereCondition;
    }

    private function getOrderedType()
    {
            return $this->orderedType;
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
        if (!empty($this->whereCondition)) {
            $obj = new Where($this->whereCondition);
            $sql .= ' WHERE ' . $obj->getWhereString();
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

        return $sql;
    }
    public function execute()
    {
        $result = $this->fromDB();
        $result = $result->fetchAll( \PDO::FETCH_ASSOC);
        return $result;
    }
}
<?php


namespace Lib\DB;


use Lib\DB\Common\Bridge;

 class Update extends Bridge
{
    private string $table;
    private $dataToUpdate;
    private $whereCondition;

    public function setTable($tableName)
    {
        $this->table = $tableName;
    }




     public function getDataToUpdate()
     {
         return $this->stringToBuild($this->dataToUpdate);
     }


     public function setDataToUpdate($dataToUpdate): void
     {
         $this->dataToUpdate = $dataToUpdate;
     }


     public function getWhereCondition()
     {
         return $this->whereCondition;
     }

     public  function setWhereCondition($conditions) : void
     {
         $this->whereCondition = $conditions;
     }

     protected function  stringToBuild($data) : string
     {
         $resultStr = '';
         if (is_string($data)) {
             $resultStr = $data;
         } else if (is_array($data)) {
             foreach ($data as $key=>$value) {
                 if (!empty($resultStr)) {
                     $resultStr.= ', ';
                 }
                 if (is_array($value)) {
                     foreach ($value as $iKey =>$iVal){
                         $resultStr .= $iKey. ' = \'' . $iVal . '\'';
                     }
                 } elseif (is_int($key)) {
                         $resultStr.=$value;
                     } elseif (is_string($key)) {
                         $resultStr.= $key . ' = \'' . $value . '\'';
                     }
                 }
             }
         return $resultStr;

     }

     public function getSqlString()
     {
         $sqlUpdate = 'UPDATE ' . $this->getTableNames();
         if (!empty($this->dataToUpdate)) {
             $sqlUpdate.= ' SET '. $this->getDataToUpdate();
         }
         if (!empty($this->whereCondition)) {
             $obj = new Where($this->whereCondition);
             $sqlUpdate .= ' WHERE ' . $obj->getWhereString();
         }
         return $sqlUpdate;
     }

     public function execute()
     {
         $result = $this->fromDB();
         $result = $result->fetchAll( \PDO::FETCH_ASSOC);
         return $result;
     }
}
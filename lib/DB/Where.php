<?php


namespace Lib\DB;


class Where
{
    protected $conditions;
    protected $whereString;

    public function __construct($conditions)
    {
        $this->conditions = $conditions;
        $this->buildWhereString();
    }

    public  function getWhereString()
    {
        return $this->whereString;
    }
    private function buildWhereString()
    {
        if (is_string($this->conditions)) {
            $this->whereString = $this->conditions;
        } elseif (is_array($this->conditions)) {
            foreach ($this->conditions as $value) {
                if (is_string($value)) {
                    if (!empty($this->whereString)) {
                        $this->whereString .= ' AND ';
                    }
                    $this->whereString .= $value;
                } else {
                    $temp = '';
                    for ($i = 0; $i < 4; $i++) {
                        if ($i != 3) {
                            $temp .= $value[$i];
                        } else {
                            if (!empty($this->whereString)) {
                                if (isset($value[$i])) {
                                    $temp = ' ' . $value[$i] . ' ' . $temp;
                                } else {
                                    $temp = ' AND ' . $temp;
                                }
                            }
                        }
                    }
                }
            }
        }

        return $this->whereString;
    }
}
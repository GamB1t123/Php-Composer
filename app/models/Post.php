<?php


namespace App\models;


use App\models\Common\Model;

class Post extends Model
{
    public  $someArr = [
        'flowers' =>
            ['name' => 'rose', 'prise' => 10, 'delivery' => 'NP'],
            ['name' => 'lily', 'prise' => 20, 'delivery' => 'UP'],
            ['name' => 'tulip', 'prise' => 55, 'delivery' => 'GL'],
        'fruits' => [
            ['name' => 'banana', 'prise' => 25, 'delivery' => 'NP'],
            ['name' => 'apple', 'prise' => 35, 'delivery' => 'UP'],
            ['name' => 'mango', 'prise' => 95, 'delivery' => 'GL'],
            ['name' => 'kiwi', 'prise' => 65, 'delivery' => 'GL'],
        ],
];
    public function getArr()
    {
        return $this->someArr;
    }

    public function getPosts(array $filters = []) : array
    {
        $select = $this->select();
        $select->setTableNames('posts');
        if (!empty($filters)) {
            $select->setWhereCondition([[ 'id' => 5, 'title' => 'test'],
                ['like', ['title' => 'test']]
            ]);
        }
        $select->execute();
        return [];
    }
//[ 'id' => 5, 'title' => 'test'],
//['like', ['title' => 'test']]
}
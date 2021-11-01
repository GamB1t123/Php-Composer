<?php


namespace App\models;


class Post
{
    public $someArr = [
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
}
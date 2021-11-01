<?php


namespace App\models;


class User
{
    public $someUser = [
        'people' => [
            ['name' => 'Jon', 'age' => 10, 'city' => 'NY'],
            ['name' => 'Bob', 'age' => 20, 'city' => 'Kyiv'],
            ['name' => 'Lily', 'age' => 55, 'city' => 'Dnipro'],
        ],
    ];
    public function getUser()
    {
        return $this->someUser;
    }
}

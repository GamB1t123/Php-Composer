<?php


namespace App\models;


class Contacts
{
    public $contacts = [
        'people' => [
        ['name' => 'Jon', 'number' => '0974561245',],
        ['name' => 'Bob', 'number' => '06820492786', ],
        ['name' => 'Lily', 'number' => '0635554312', ],
        ]
    ];

    public function getContacts()
    {
        return $this->contacts;

    }

}
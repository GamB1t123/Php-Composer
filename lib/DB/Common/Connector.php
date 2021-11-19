<?php


namespace Lib\DB\Common;


class Connector
{
    protected $connect;

    public function __construct()
    {
        $config = include 'app/Config/database.php';
        $dns = $config['driver'] . ':dbname=' . $config['db_name']
            . ';port=' . $config['port']
            . ';host=' . $config['host'];
        $this->connect = new \PDO($dns, $config['user'], $config['pass']);

    }

    public function getConnect()
    {
        return $this->connect;
    }
}
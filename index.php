<?php
require_once 'vendor/autoload.php';

use Core\Router;
use Lib\DB\Connector;

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/Core/Router.php');
$connector = new Connector();
$conn = $connector->getConnect();
$stmt = $conn->prepare("INSERT INTO posts(subject, detail, author_id) values('test', 'some text',1)");
$stmt->execute();
$stmt1 = $conn->prepare("DELETE FROM `posts` WHERE `posts`.`id` = 8");
$stmt1->execute();
$router = new Router;
$router->run();
// RewriteRule ^(.*)$ index.php?route=$1 [L,QSA] шоб база не копировала
//['user' => 'u']
//'users, authors, posts'
//['users', 'authors', 'posts']
//= *
//= '*';
//ORDER BY
//ASC
//DESC
//ORDER BY id DESC
//ORDER BY id
//ORDER BY id DESC, name ASC
// LIMIT
// SELECT * FROM tableName limit 1;
// LIMIT 100, 5(offset)
// ['users', 'authors' => 'a', posts]
//$sql = 'SELECT ';
//ORDER BY id DESC, name ASC
// id DESC, name ASC
//[
//'id' =>  'DESC',
// 'name' => 'ASC'
//]
//else {
//    if (!$orderString) {
//        $outputString .= $value . ' AS ' . $key;
//    } else {
//        $outputString .= $key . ' ' . $value;
//    }
//$select = new Select();
//$select->setTableName('users');
//$select->limit(50);
//$sqlString = $select->getSqlString();
// Ответ = SELECT * FROM 'users' LIMIT 50;














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










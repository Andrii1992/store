<?php 

require_once "settings.php";

$db = MysqliDb::getInstance();
var_dump($db->getOne('products'));

$pass = "123s";
// $pass_hash = password_hash($pass,PASSWORD_ARGON2ID);
$pass_hash = hash('sha3-256', $pass);
var_dump(strlen($pass_hash));
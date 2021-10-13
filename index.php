<?php 

require_once "settings.php";

$db = MysqliDb::getInstance();

var_dump($db->get('products'));
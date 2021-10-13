<?php 
require_once BASE_DIR . "/lib/Curl.php";
require_once BASE_DIR . "/lib/MysqliDb.php";

$db = new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

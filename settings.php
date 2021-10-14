<?php

define('BASE_DIR', 'D:\\xampp\\htdocs\\php_store\\');

// MysqliDb

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_store');

// Users 
define('USER_USERNAME_MAX', 255);

// Session
define('TOKEN_HASH_ALG', 'sha3-256');

require_once BASE_DIR . "/init.php";

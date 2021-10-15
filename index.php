<?php
require_once "settings.php";

require_once BASE_DIR . '/template/header.php';


$db = MysqliDb::getInstance();
var_dump($db->getOne('products'));
?>

<?php

require_once BASE_DIR . '/template/footer.php';

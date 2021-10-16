<?php
require_once "settings.php";

require_once BASE_DIR . '/template/header.php';

$db = MysqliDb::getInstance();
$products = $db->get('products');

foreach ($products as $product) {
    echo '<h2 class="my-5 text-center">' . $product["title"] . '</h2>';
}

?> 
Stor

<?php

require_once BASE_DIR . '/template/footer.php';

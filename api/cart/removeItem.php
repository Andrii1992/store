<?php
require_once '../../settings.php';

if (!Me::IsLoggedIn()) {
    http_response_code(403);
    exit('Error: User already logged out');
}

$product_id = POST('product_id', true);
Cart::RemoveFromCart((int) $product_id);

http_response_code(302);
header('location: ' . PREFIX_URL . 'cart.php');
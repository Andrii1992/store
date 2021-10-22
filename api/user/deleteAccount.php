<?php
require_once '../../settings.php';
// delite account
/*
if (!Me::IsLoggedIn()) {
    http_response_code(403);
    exit('Error: User already logged out');
}

$email  = POST('email', true);

if (!Me::GetUser()->ChangeEmail($email, $err_message)) {
    http_response_code(400);
    exit('Error: ' . $err_message);
}
*/
http_response_code(302);
header('location: ' . PREFIX_URL . 'user/settings.php');

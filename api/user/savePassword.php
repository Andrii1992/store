<?php
require_once '../../settings.php';

if(!Me::IsLoggedIn()){
    http_response_code(403);
    ExitEroor('Error: User already logged out');
} 

$current_password  = POST('current_password', true, false);
$password  = POST('password', true, false);
$confirm_password  = POST('confirm_password', true, false);

if ($password !== $confirm_password) {
    http_response_code(400);
    ExitEroor('Error: Password and confirm password do not match');
}

if(!Me::GetUser()->ChangePassword($current_password,$password, $err_message )){
    http_response_code(400);
    ExitEroor('Error: ' . $err_message);
}

http_response_code(302);
header('location: ' . PREFIX_URL . 'user/settings.php');
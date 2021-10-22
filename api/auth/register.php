<?php
require_once '../../settings.php';

$username  = POST('username', true);
$email  = POST('email', true);
$password  = POST('password', true, false);
$confirm_password  = POST('confirm_password', true, false);
$accept_check = POST('accept_check', true);

if ($password !== $confirm_password) {
    http_response_code(400);
    exit('Error: Password and confirm password do not match');
}

if ($accept_check !== "true") {
    http_response_code(400);
    exit('Error: Check is not accept');
}

if(!Auth::Register($username,$email,$password,$accept_check,$err_message)){
    http_response_code(400);
    exit('Error: ' . $err_message);
}

http_response_code(302);
header('location: ' . PREFIX_URL . 'auth/login.php');
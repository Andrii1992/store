<?php
require_once '../../settings.php';

if(!Captcha::Verify(CAPTCHA_URL_SITEVERIFY,CAPTCHA_SECRET_KEY)){
    http_response_code(403);
    ExitEroor('Error: Invalid captcha response', true);
}

$username  = POST('username', true);
$email  = POST('email', true);
$password  = POST('password', true, false);
$confirm_password  = POST('confirm_password', true, false);
$accept_check = POST('accept_check', true);

if ($password !== $confirm_password) {
    http_response_code(400);
    ExitEroor('Error: Password and confirm password do not match', true);
}

if ($accept_check !== "true") {
    http_response_code(400);
    ExitEroor('Error: Check is not accept', true);
}

if(!Auth::Register($username,$email,$password,$accept_check,$err_message)){
    http_response_code(400);
    ExitEroor('Error: ' . $err_message, true);
}

http_response_code(302);
header('location: ' . PREFIX_URL . 'auth/login.php');
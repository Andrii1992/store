<?php
require_once '../../settings.php';

if(!Captcha::Verify(CAPTCHA_URL_SITEVERIFY,CAPTCHA_SECRET_KEY)){
    http_response_code(403);
    ExitEroor('Error: Invalid captcha response', true);
}

$usernameOrEmail  = POST('usernameOrEmail', true);
$password  = POST('password', true, false);

if(!Auth::Login($usernameOrEmail,$password, $err_message) ){
    http_response_code(400);
    ExitEroor('Error: ' . $err_message, true);
}

http_response_code(302);
header('location: ' . PREFIX_URL . 'index.php');
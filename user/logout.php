<?php
require_once '../settings.php';

if(!Me::IsLoggedIn()){
   http_response_code(403);
   exit('Error: User already logged out');
}

Session::DestroySessionsByUser(Me::GetUser()->GetData()['id']);

var_dump(Me::GetUser()->GetData()['id']);
http_response_code(302);
header('Location: /auth/login.php');
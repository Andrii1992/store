<?php

// Dir 
define('BASE_DIR', 'D:\\xampp\\htdocs\\php_store\\');
define('PREFIX_URL', 'store/');

// MysqliDb
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_store');

// Auth
define('SESSION_COOKIE_NAME', 'session');
define('SESSION_EXPIRE_DAYS', 30);
define('PASS_HASH_ALGO', PASSWORD_ARGON2ID);

// Users 
define('USER_USERNAME_MAX', 255);

// Session
define('TOKEN_HASH_ALG', 'sha3-256');

// Captcha
define('CAPTCHA_URL_SITEVERIFY', 'https://www.google.com/recaptcha/api/siteverify');
define('CAPTCHA_SITE_KEY', '');
define('CAPTCHA_SECRET_KEY', '');

// PAYPAL
define('PAYPAL_CLIENT_ID', '');
define('PAYPAL_SECRETE', '');
define('PAYPAL_MODE', 'sandbox');
define('PAYPAL_WEBHOOK_ID', '');

define('PAYPAL_REDIRECT_SUCCESS', 'http://php.store/paypal/process.php');
define('PAYPAL_REDIRECT_CANCEL', 'http://php.store/paypal/cancel.php');
define('PAYPAL_REDIRECT_WEBHOOK', 'http://php.store/paypal/webhook.php');

require_once BASE_DIR . 'init.php';
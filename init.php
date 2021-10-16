<?php
require_once BASE_DIR . "/lib/Curl.php";
require_once BASE_DIR . "/lib/MysqliDb.php";

require_once BASE_DIR . "/inc/auth.php";
require_once BASE_DIR . "/inc/session.php";
require_once BASE_DIR . "/inc/user.php";
require_once BASE_DIR . "/inc/me.php";
require_once BASE_DIR . "/inc/product.php";
require_once BASE_DIR . "/inc/store.php";

$db = new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(Auth::LoginCookie($user_id)){
    Me::SetUser(new User($user_id));
}

function POST(string $key, bool $require = false, bool $secure = true)
{
    if (!isset($_POST[$key])) {
        if ($require) {
            http_response_code(400);
            exit("Error: POST parameter `$key` is required");
        } else {
            return null;
        }
    }

    $return_val = $_POST[$key];

    if ($secure) {
        $return_val = htmlentities($return_val);
    }

    return htmlentities($return_val);
}

function GET(string $key, bool $require = false, bool $secure = true)
{
    if (!isset($_GET[$key])) {
        if ($require) {
            http_response_code(400);
            exit("Error: GET parameter `$key` is required");
        } else {
            return null;
        }
    }

    $return_val = $_GET[$key];

    if ($secure) {
        $return_val = htmlentities($return_val);
    }

    return htmlentities($return_val);
}

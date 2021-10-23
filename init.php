<?php
require_once BASE_DIR . 'lib/Curl.php';
require_once BASE_DIR . 'lib/MysqliDb.php';
require_once BASE_DIR . 'inc/auth.php';
require_once BASE_DIR . 'inc/session.php';
require_once BASE_DIR . 'inc/user.php';
require_once BASE_DIR . 'inc/me.php';
require_once BASE_DIR . 'inc/product.php';
require_once BASE_DIR . 'inc/store.php';
require_once BASE_DIR . 'inc/cart.php';
require_once BASE_DIR . 'inc/order.php';
require_once BASE_DIR . 'inc/captcha.php';


$db = new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(Auth::LoginCookie($user_id)){
    Me::SetUser(new User($user_id));
}

function POST(string $key, bool $require = false, bool $secure = true)
{
    if (!isset($_POST[$key])) {
        if ($require) {
            http_response_code(400);
            ExitEroor("Error: POST parameter `$key` is required");
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
            ExitEroor("Error: GET parameter `$key` is required");
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

function ExitEroor(string $error, bool $load_header = false)
{
    if($load_header){
        require_once BASE_DIR . 'template/header.php';
    }
    
    echo "<h2 class='my-5 text-danger error-info'>$error</h2>";
    require_once PREFIX_URL . 'template/footer.php';
    exit();
}
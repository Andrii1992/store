<?php

use Curl\Curl;

class Captcha
{
    public static function Verify(string $url_siteverify, string $secret) : bool
    {
        $response = POST('g-recaptcha-response', true, false);

        $curl = new Curl();
        $curl->post($url_siteverify, [
            'secret' => $secret,
            'response' => $response,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ]);

        return !$curl->error && $curl->response->success;
    }
}

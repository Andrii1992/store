<?php
require_once "../settings.php";
require_once BASE_DIR . 'lib/PayPal/autoload.php';

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use \PayPal\Api\VerifyWebhookSignature;
use \PayPal\Api\WebhookEvent;
// TODO:  Payment sale reversed - pay reversed

// Payment sale completed - pay ok

function get_header(string $name) : string {
  $name = str_replace("-","_", $name);
  return  strval($_SERVER["HTTP_$name"]);
}

$apiContext = new ApiContext(
    new OAuthTokenCredential(
        PAYPAL_CLIENT_ID,
        PAYPAL_SECRETE
    )
);

$apiContext->setConfig([
    'mode' => PAYPAL_MODE
]);

$requestBody = file_get_contents('php://input'); // info type event 

$signatureVerification = new VerifyWebhookSignature();
$signatureVerification->setAuthAlgo(get_header('PAYPAL-AUTH-ALGO'));
$signatureVerification->setTransmissionId(get_header('PAYPAL-TRANSMISSION-ID'));
$signatureVerification->setCertUrl(get_header('PAYPAL-CERT-URL'));
$signatureVerification->setWebhookId(PAYPAL_WEBHOOK_ID);
$signatureVerification->setTransmissionSig(get_header('PAYPAL-TRANSMISSION-SIG'));
$signatureVerification->setTransmissionTime(get_header('PAYPAL-TRANSMISSION-TIME'));

$signatureVerification->setRequestBody($requestBody);
$request = clone $signatureVerification;

$output = $signatureVerification->post($apiContext);
$status = $output->getVerificationStatus();
if($status !== "SUCCESS"){
    trigger_error('Failed to verify wbhook event');
    exit;
}

$request = json_decode($requestBody, true); // true means table return
var_dump($request);
http_response_code(200);
trigger_error($requestBody);

// TODO: 

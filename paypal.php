<?php
require_once "settings.php";
require_once BASE_DIR . '/lib/PayPal/autoload.php';

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

$apiContext = new ApiContext(
    new OAuthTokenCredential(
        PAYPAL_CLIENT_ID,
        PAYPAL_SECRETE,
    )
);

$apiContext->setConfig([
    'mode' => PAYPAL_MODE
]);

// Create new payer and method
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// Set redirect URLs
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(PAYPAL_REDIRECT_SUCCESS)
    ->setCancelUrl(PAYPAL_REDIRECT_CANCEL);

// Set payment amount
$amount = new Amount();
$amount->setCurrency("PLN")
    ->setTotal(10.50);

// Set item list
$itemList = new ItemList();
$item = new Item();
$item->setQuantity(1);
$item->setPrice(10.50);
$item->setCurrency('PLN');
$item->setName('IPhone');
$item->setDescription('Testowy IPhone');
$itemList->addItem($item);

// Set transaction object
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setDescription('Transakcja testowa PayPal')
    ->setItemList($itemList);

// Create the full payment object
$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));

// Create payment with valid API context
try {
    $payment->create($apiContext);

    // Get PayPal redirect URL and redirect the customer
    $approvalUrl = $payment->getApprovalLink();

    // Redirect the customer to $approvalUrl
    header('Location: ' . $approvalUrl);

} catch (PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getCode();
    echo $ex->getData();
    die($ex);
} catch (Exception $ex) {
    die($ex);
}

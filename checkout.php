<?php
require './paypal_start.php';

use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;

$data = $_POST;
if(!(isset($data['amount']) && isset($data['customer']) && isset($data['item_name']))){
     dd('No data');
}


$product = $data['item_name'];
$price = (float)$data['amount'];
$shipping = 0.00;

$total = $price + $shipping;

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$item = new Item();
$item->setName($product)
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setCategory('DIGITAL')
    ->setPrice($price);


$itemList = new ItemList();
$itemList->setItems([$item]);

$details = new Details();
$details->setshipping($shipping)
    ->setSubtotal($price);

$amount = new Amount();
$amount->setCurrency('USD')
    ->setTotal($total)
    ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription('Pay For The Product Payment')
    ->setInvoiceNumber(uniqid());

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL.'/pay.php?success=true')
    ->setCancelUrl(SITE_URL.'/pay.php?success=false');

$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions([$transaction])
    ->setExperienceProfileId($experienceProfileId);

try{
    $payment->create($paypal);
}catch(\Exception $e){
    dd($e->getData(), $e->getCode());
}

$approvalUrl = $payment->getApprovalLink();

// Redirect
header("LOCATION: {$approvalUrl}");
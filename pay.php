<?php

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require './paypal_start.php';
require './function.php';

session_start();

$success = $_GET['success'];
$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];
$token = $_GET['token'];

if($success  === 'false' || !isset($success, $paymentId, $payerId)){
    header('LOCATION: my_balance.php?payment=failed');
}

$payment = Payment::get($paymentId, $paypal);

$execute = new PaymentExecution();
$execute->setPayerId($payerId);

try{
    $result = $payment->execute($execute, $paypal);
    $amount = $result->transactions[0]->related_resources[0]->sale->amount->total;

    $field=array("transaction_id"=>$paymentId,"transaction_by"=>"Paypal","cus_id"=>$_SESSION["ar_id"],"amount"=>$amount,"type"=> 1,"for_what"=>"Balance");
    $status=doInsert($field,'paypal_transaction_table');

    $prev_acnt_blnce=get_cus_acnt_balance($_SESSION["ar_id"]);
	$now_blnce=$prev_acnt_blnce+$amount;
    doUpdate("cus_acnt_blnce",array("balance"=>$now_blnce),array("cus_id"=>$_SESSION["ar_id"]));

}catch(\Exception $e){
    header('LOCATION: my_balance.php?payment=failed');
}



header('LOCATION: my_balance.php?payment=success');
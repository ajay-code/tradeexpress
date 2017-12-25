<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);
$_POST["cus_id"]=$_SESSION["ar_id"];

if (isset($_GET["for_what"]) && $_GET["for_what"]=="car") {
    $prev_bid=higest_bid_car($_POST["acm_id"]);
    $buy_now_price=getValue('add_car_motorcycle', 'buy_now', $_POST['acm_id'], 'acm_id');
    $_POST["bid_price"] = $buy_now_price;
    // add to won list
    $ar_id = $_SESSION['ar_id'];
    $q = "insert into ambit_won_lost (`db`,`item_id`, `price`, `cus_id` , `status`) values ('add_car_motorcycle', '{$_POST["acm_id"]}', '{$_POST["bid_price"]}', '{$ar_id}', '1')";
    mysqli_query($conn, $q);
    // set item as sold
    $q="update add_car_motorcycle set `sold_status`=1 where acm_id='{$_POST['acm_id']}'";
    mysqli_query($conn, $q);
    // Cut Commision
    $comm=getComm($_POST['bid_price']);
    $uploaderId = getValue('add_car_motorcycle', 'uploader', $_POST['acm_id'], 'acm_id');
    $transaction_id=generateRandomString(5).time();
    $field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$uploaderId,"amount"=>$comm,"type"=>"Debited","for_what"=>"add_car_motorcycle ||".$_POST['acm_id']);
    $status=doInsert($field, 'paypal_transaction_table');
    // if transaction successful decrease balance
    if ($status) {
        $prev_acnt_blnce=get_cus_acnt_balance($uploaderId);
        $now_blnce=$prev_acnt_blnce-$comm;
        doUpdate("cus_acnt_blnce", array("balance"=>$now_blnce), array("cus_id"=>$uploaderId));
    }
    // add to lost list of others
    $cusWhoLostBid = getCustomersWhoMadeBidOnCarExceptGiven($_POST['acm_id'], $ar_id);
    foreach ($cusWhoLostBid as $cus) {
        $price = getValue('ambit_car_bid', 'bid_price', $cus['acb_id'], 'acb_id');
        $q = "insert into ambit_won_lost (`db`,`item_id`, `price`, `cus_id` , `status`) values ('add_car_motorcycle', '{$_POST["acm_id"]}', '{$price}', '{$cus['cus_id']}', '0')";
        mysqli_query($conn, $q);
    }
    // send emails
    sendBuyerAndSellerMailForBidWonOfCar($_POST['acm_id'], $ar_id, $_POST["bid_price"]);
    sendCustomersMailForLostBidOfCar($_POST['acm_id'], $cusWhoLostBid);

    if ($status) {
        echo 1;
    } else {
        echo 0;
    }
    
}

if (isset($_GET["for_what"]) && $_GET["for_what"]=="general_item") {
    $prev_bid=higest_bid_general_item($_POST["agi_id"]);
    $buy_now_price=getValue('add_general_items', 'buy_now', $_POST['agi_id'], 'agi_id');
    $_POST["bid_price"] = $buy_now_price;
    // add to won list
    $ar_id = $_SESSION['ar_id'];
    $q = "insert into ambit_won_lost (`db`,`item_id`, `price`, `cus_id` , `status`) values ('add_general_items', '{$_POST["agi_id"]}', '{$_POST["bid_price"]}', '{$ar_id}', '1')";
    mysqli_query($conn, $q);
    // set item as sold
    $q="update add_general_items set `sold_status`=1 where agi_id='{$_POST['agi_id']}'";
    mysqli_query($conn, $q);
    // Cut Commision
    $comm=getComm($_POST['bid_price']);
    $uploaderId = getValue('add_general_items', 'uploader', $_POST['agi_id'], 'agi_id');
    $transaction_id=generateRandomString(5).time();
    $field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$uploaderId,"amount"=>$comm,"type"=>"Debited","for_what"=>"add_general_items ||".$_POST['agi_id']);
    $status=doInsert($field, 'paypal_transaction_table');
    // if transaction successful decrease balance
    if ($status) {
        $prev_acnt_blnce=get_cus_acnt_balance($uploaderId);
        $now_blnce=$prev_acnt_blnce-$comm;
        doUpdate("cus_acnt_blnce", array("balance"=>$now_blnce), array("cus_id"=>$uploaderId));
    }
    // add to lost list of others
    $cusWhoLostBid = getCustomersWhoMadeBidOnGeneralItemExceptGiven($_POST['agi_id'], $ar_id);
    foreach ($cusWhoLostBid as $cus) {
        $price = getValue('ambit_general_item_bid', 'bid_price', $cus['agib_id'], 'agib_id');
        $q = "insert into ambit_won_lost (`db`,`item_id`, `price`, `cus_id` , `status`) values ('add_general_items', '{$_POST["agi_id"]}', '{$price}', '{$cus['cus_id']}', '0')";
        mysqli_query($conn, $q);
    }
    // send emails
    sendBuyerAndSellerMailForBidWonOfGeneralItem($_POST['agi_id'], $ar_id, $_POST["bid_price"]);
    sendCustomersMailForLostBidOfGeneralItem($_POST['agi_id'], $cusWhoLostBid);

    if ($status) {
        echo 1;
    } else {
        echo 0;
    }

}

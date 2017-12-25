<?php
require './config.php';
require './function.php';

use Carbon\Carbon;

setStatusOfExpiredItems();
setStatusOfExpiredCar();
// setStatusOfExpiredProperty();
// setStatusOfExpiredJob();

function setStatusOfExpiredItems()
{
    global $conn;
    $table = 'add_general_items';
    $query = "select * from {$table} where status = 1 sold_status = 0";
    $data = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($data)) {
        $expired = expired($row);
        if ($expired) {
            if (getNumberOfBids($row['agi_id']) > 0) {
                if ($row['start_price'] == $row['reserve_price']) {
                    $query = "update {$table} set sold_status = 1 where agi_id = {$row['agi_id']}";
                    mysqli_query($conn, $query);
                    sellItemToHighestBidder($row['agi_id'], $row);
                } else {
                    $highestBid=higest_bid_general_item($row["agi_id"]);
                    if ($highestBid >= $row['reserve_price']) {
                        $query = "update {$table} set sold_status = 1 where agi_id = {$row['agi_id']}";
                        mysqli_query($conn, $query);
                        sellItemToHighestBidder($row['agi_id'], $row);
                    }
                }
            }
        }
    }
}
function setStatusOfExpiredCar()
{
    global $conn;
    $table = 'add_car_motorcycle';
    $query = "select * from {$table} where where status = 1 sold_status = 0";
    $data = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($data)) {
        $expired = expired($row);
        if ($expired) {
            if (getNumberOfBids($row['agi_id']) > 0) {
                if ($row['start_price'] == $row['reserve_price']) {
                    $query = "update {$table} set sold_status = 1 where acm_id = {$row['acm_id']}";
                    mysqli_query($conn, $query);
                    sellCarToHighestBidder($row['acm_id'], $row);
                } else {
                    $highestBid=higest_bid_car($row["acm_id"]);
                    if ($highestBid >= $row['reserve_price']) {
                        $query = "update {$table} set sold_status = 1 where agi_id = {$row['agi_id']}";
                        mysqli_query($conn, $query);
                        sellCarToHighestBidder($row['acm_id'], $row);
                    }
                }
            }
        }
    }
    echo 'done';
}
function setStatusOfExpiredProperty()
{
    global $conn;
    $table = 'add_property';
    $query = "select * from {$table} where status = 0";
    $data = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($data)) {
        $date = new Carbon($row['listing_duration']);
        $diff = Carbon::now()->diffInDays($date, false);
        if ($diff < 0) {
            $q = "update {$table} set status = 1 where ap_id = {$row['ap_id']}";
            mysqli_query($conn, $q);
        }
    }
}

function setStatusOfExpiredJob()
{
    global $conn;
    $table = 'add_job';
    $query = "select * from {$table} where status = 0";
    $data = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($data)) {
        $date = new Carbon($row['listing_duration']);
        $diff = Carbon::now()->diffInDays($date, false);
        if ($diff < 0) {
            $q = "update {$table} set status = 1 where aj_id = {$row['aj_id']}";
            mysqli_query($conn, $q);
        }
    }
}
// //////////////////////
function sellItemToHighestBidder($agi_id, $data)
{
    global $conn;
    // Find Highest Bidder
    $highestBid = only_higest_bid_general_item($agi_id);
    $ar_id = $highestBidderId = getValue('ambit_registration', 'ar_id', $highestBid['cus_id'], 'ar_id');
    $highestBidPrice = $highestBid['bid_price'];
    
    // Get Lost Biddes
    $cusWhoLostBid = getCustomersWhoMadeBidOnGeneralItemExceptGiven($agi_id, $highestBidderId);
    
    // Put Product In there Won or Lost Data
    $q = "insert into ambit_won_lost (`db`,`item_id`, `price`, `cus_id` , `status`) values ('add_general_items', '{$agi_id}', '{$highestBid["bid_price"]}', '{$ar_id}', '1')";
    mysqli_query($conn, $q);
    foreach ($cusWhoLostBid as $cus) {
        $price = getValue('ambit_general_item_bid', 'bid_price', $cus['agib_id'], 'agib_id');
        $q = "insert into ambit_won_lost (`db`,`item_id`, `price`, `cus_id` , `status`) values ('add_general_items', '{$agi_id}', '{$price}', '{$cus['ar_id']}', '0')";
        mysqli_query($conn, $q);
    }
    // Cut Commision
    $comm=getComm($highestBidPrice);
    $uploaderId = getValue('add_general_items', 'uploader', $agi_id, 'agi_id');
    $transaction_id=generateRandomString(5).time();
    $field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$uploaderId,"amount"=>$comm,"type"=>"Debited","for_what"=>"add_general_items ||".$agi_id);
    $status=doInsert($field, 'paypal_transaction_table');
    // if transaction successful decrease balance
    if ($status) {
        $prev_acnt_blnce=get_cus_acnt_balance($uploaderId);
        $now_blnce=$prev_acnt_blnce-$comm;
        doUpdate("cus_acnt_blnce", array("balance"=>$now_blnce), array("cus_id"=>$uploaderId));
    }
    // Send Emals To Seller and Buyers
    
    sendBuyerAndSellerMailForBidWonOfGeneralItem($agi_id, $ar_id, highestBidPrice);
    sendCustomersMailForLostBidOfGeneralItem($agi_id, $cusWhoLostBid);
}


function sellCarToHighestBidder($acm_id, $data)
{
    global $conn;
    // Find Highest Bidder
    $highestBid = only_higest_bid_car($acm_id);
    $ar_id = $highestBidderId = getValue('ambit_registration', 'ar_id', $highestBid['cus_id'], 'ar_id');
    $highestBidPrice = $highestBid['bid_price'];
    
    // Get Lost Biddes
    $cusWhoLostBid = getCustomersWhoMadeBidOnCarExceptGiven($acm_id, $highestBidderId);
    var_dump($cusWhoLostBid, $data);
    // Put Product In there Won or Lost Data
    $q = "insert into ambit_won_lost (`db`,`item_id`, `price`, `cus_id` , `status`) values ('add_general_items', '{$acm_id}', '{$highestBid["bid_price"]}', '{$ar_id}', '1')";
    mysqli_query($conn, $q);
    foreach ($cusWhoLostBid as $cus) {
        $price = getValue('ambit_car_bid', 'bid_price', $cus['agib_id'], 'agib_id');
        $q = "insert into ambit_won_lost (`db`,`item_id`, `price`, `cus_id` , `status`) values ('add_car_motorcycle', '{$acm_id}', '{$price}', '{$cus['ar_id']}', '0')";
        mysqli_query($conn, $q);
    }

    // Cut Commision
    $comm=getComm($highestBidPrice);
    $uploaderId = getValue('add_car_motorcycle', 'uploader', $acm_id, 'acm_id');
    $transaction_id=generateRandomString(5).time();
    $field=array("transaction_id"=>$transaction_id,"transaction_by"=>"Admin","cus_id"=>$uploaderId,"amount"=>$comm,"type"=>"Debited","for_what"=>"add_car_motorcycle ||".$acm_id);
    $status=doInsert($field, 'paypal_transaction_table');
    // if transaction successful decrease balance
    if ($status) {
        $prev_acnt_blnce=get_cus_acnt_balance($uploaderId);
        $now_blnce=$prev_acnt_blnce-$comm;
        doUpdate("cus_acnt_blnce", array("balance"=>$now_blnce), array("cus_id"=>$uploaderId));
    }

    // Send Emals To Seller and Buyers
    
    sendBuyerAndSellerMailForBidWonOfCar($acm_id, $ar_id, $highestBidPrice);
    sendCustomersMailForLostBidOfCar($acm_id, $cusWhoLostBid);
}
 

function only_higest_bid_general_item($agi_id)
{
    global $conn;
    $highestBid = trim(seeMoreDetails("MAX(bid_price)", "ambit_general_item_bid", array("agi_id"=>$agi_id)));
    $query = "select * from ambit_general_item_bid where agi_id={$agi_id} and bid_price={$highestBid}";
    $results = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($results);
    return $data;
}

function only_higest_bid_car($acm_id)
{
    global $conn;
    $highestBid = trim(seeMoreDetails("MAX(bid_price)", "ambit_car_bid", array("acm_id"=>$acm_id)));
    $query = "select * from ambit_car_bid where acm_id={$acm_id} and bid_price={$highestBid}";
    $results = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($results);
    return $data;
}

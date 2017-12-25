<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);
$_POST["cus_id"]=$_SESSION["ar_id"];

if (isset($_GET["for_what"]) && $_GET["for_what"]=="car") {
    $prev_bid=higest_bid_car($_POST["acm_id"]);
    // $resv_price = reserve_price_general_item($_POST["agi_id"]);
    if ($_POST["bid_price"] > $prev_bid) {
        if(alreadyMadeBidOnCar($_POST["acm_id"], $_SESSION['ar_id'])){
            $status = updateBidOnCar($_POST["acm_id"], $_SESSION['ar_id'], $_POST["bid_price"]);
        }else{
            $status=doInsert($_POST, "ambit_car_bid");
        }
        if ($status) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo '404';
    }
}

if (isset($_GET["for_what"]) && $_GET["for_what"]=="general_item") {
    $prev_bid=higest_bid_general_item($_POST["agi_id"]);
    $start_price = trim(seeMoreDetails('start_price', 'add_general_items', array("agi_id"=>$_POST["agi_id"])));
    if ($_POST["bid_price"] > $prev_bid) {
        if(alreadyMadeBidOnItem($_POST["agi_id"], $_SESSION['ar_id'])){
            $status = updateBidOnItem($_POST["agi_id"], $_SESSION['ar_id'], $_POST["bid_price"]);
        }else{
            $status=doInsert($_POST, "ambit_general_item_bid");
        }
        if ($status) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo '404';
    }
}

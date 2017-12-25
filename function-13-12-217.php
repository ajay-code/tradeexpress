<?php
//error_reporting(0);
require_once("config.php");
if (file_exists("./vendor/autoload.php")) {
    require_once "./vendor/autoload.php";
} elseif (file_exists("../vendor/autoload.php")) {
    require_once "../vendor/autoload.php";
}



//require_once("../language/english.php");

function doInsert($field=array(), $table)
{
    global $conn;
    $dbdata=array();
    $set=" SET ";
    if (!empty($field)) {
        foreach ($field as $k=>$v) {
            array_push($dbdata, "`".$k."`='".mysqli_real_escape_string($conn, $v)."'");
        }
    }
    $set.=implode(",", $dbdata);
    $query="INSERT INTO ".$table.$set;
    // dd($query);
    return mysqli_query($conn, $query);
}

function newly_insert_id()
{
    global $conn;
    return mysqli_insert_id($conn);
}
function getItemDetails($id)
{
    global $conn;
    $query="SELECT * FROM add_general_items where agi_id='$id'";
    $data=mysqli_query($conn, $query);
    $row=mysqli_fetch_assoc($data);
    return $row;
}
function addFeedbacks()
{
    global $conn;
    $feed_by=$_POST['feed_by'];
    $feed_to=$_POST['feed_to'];
    $ratings=$_POST['feed_ratings'];
    $awl_id = (int)$_POST['awl_id'];
    $type = $_POST['type'];
    $message=addslashes($_POST['feed_comments']);

    $query="INSERT INTO `feedbacks`(`feedback_by`, `feedback_to`, `ratings`, `awl_id`, `type`, `message`) VALUES ('$feed_by','$feed_to','$ratings', '$awl_id', '$type','$message')";
    
    if (mysqli_query($conn, $query)) {
        $query = "update ambit_won_lost set `seller_feedback` = '1' where db='{$_GET['db']}' and item_id={$_GET['item_id']}";
        if (mysqli_query($conn, $query)) {
            return true;
        }
        return true;
    } else {
        return false;
    }
}
function getFeedbacks($ar_id)
{
    global $conn;
    $dbdata=array();
    $query="select * from feedbacks where feedback_to='$ar_id'";
    $rows=mysqli_query($conn, $query);
    if ($rows) {
        while ($data=mysqli_fetch_assoc($rows)) {
            array_push($dbdata, $data);
        }
    }
    return $dbdata;
}
function getPositiveFeedbackCount($ar_id)
{
    global $conn;
    $dbdata=array();
    $query="select count(*) as count from feedbacks where feedback_to='$ar_id' and ratings = '1'";
    $data=mysqli_query($conn, $query);
    $count =  mysqli_fetch_assoc($data);
    return $count['count'];
}
function getNeutralFeedbackCount($ar_id)
{
    global $conn;
    $dbdata=array();
    $query="select count(*) as count from feedbacks where feedback_to='$ar_id' and ratings = '0'";
    $data=mysqli_query($conn, $query);
    $count =  mysqli_fetch_assoc($data);
    return $count['count'];
}
function getNegativeFeedbackCount($ar_id)
{
    global $conn;
    $dbdata=array();
    $query="select count(*) as count from feedbacks where feedback_to='$ar_id' and ratings = '-1'";
    $data=mysqli_query($conn, $query);
    $count =  mysqli_fetch_assoc($data);
    return $count['count'];
}
function getAvg($ar_id)
{
    global $conn;
    $query="SELECT AVG(RATINGS) FROM FEEDBACKS where feedback_to='$ar_id'";
    $rows=mysqli_query($conn, $query);
    $data=mysqli_fetch_assoc($rows);
    return $data;
}

function addOffer()
{
    global $conn;
    $agi_id=addslashes($_POST['agi_id']);
    $sent_from_id=addslashes($_POST['sent_from_id']);
    $price=addslashes($_POST['price']);
    $days=addslashes($_POST['days']);
    $watchers=$_POST['watchers'];
    $datetime = new DateTime();
    $dt_val=$datetime->format('Y-m-d H:i:s');
    $check=0;
    for ($i=0;$i<sizeof($watchers);$i++) {
        $query="INSERT INTO `offers`(`agi_id`, `sent_to_id`, `sent_from_id`, `amount`, `days`, `created_at`) VALUES ('$agi_id','".$watchers[$i]."','$sent_from_id','$price','$days','$dt_val')";
        if (mysqli_query($conn, $query)) {
            $check++;
            sendOfferMail($agi_id, $price, $watchers[$i], $days);
        }
    }
    if ($check==sizeof($watchers)) {
        return true;
    } else {
        return false;
    }
}

function sendOfferMail($agi_id, $price, $watcher, $days)
{
    $listing_title=getValue("add_general_items", "listing_title", $agi_id, "agi_id");
    $send_to=getValue("ambit_registration", "name", $watcher, "ar_id");
    $email=getValue("ambit_registration", "email", $watcher, "ar_id");
    include("send_offer_mail.php");
}



function offers($id)
{
    global $conn;
    $dbdata=array();
    $query="SELECT * FROM offers o, add_general_items a where o.agi_id=a.agi_id and sent_to_id='$id' and o.status=0";
    $res=mysqli_query($conn, $query);
    $rows=mysqli_num_rows($res);
    if ($rows >= 1) {
        while ($data=mysqli_fetch_assoc($res)) {
            array_push($dbdata, $data);
        }
    }
    return $dbdata;
}
function changeOfferStatus($offer_id, $agi_id)
{
    global $conn;
    $query="update offers set `accept_status`=1 where id='$offer_id'";
    if (mysqli_query($conn, $query)) {
        $query="update offers set `status`=1 where agi_id='$agi_id'";
        if (mysqli_query($conn, $query)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function changeSoldStatus($agi_id)
{
    global $conn;
    $query="update add_general_items set `sold_status`=1 where agi_id='$agi_id'";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

function getComm($price)
{
    return (3/100)*$price;
}

function amountDeduct($comm, $seller_id)
{
    global $conn;
    $total=get_cus_acnt_balance($seller_id);
    $update=$total-$comm;
    $query="UPDATE `cus_acnt_blnce` SET `balance`='$update' WHERE cus_id='$seller_id'";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

function acceptOffer($agi_id, $ar_id, $offer_id)
{
    global $conn;
    $comm=getComm($_POST['price']);
    $seller_id=getValue("add_general_items", "uploader", $agi_id, "agi_id");
    $query="insert into offers_accepted (`offer_id`,`accepted_by`) values ('$offer_id','$ar_id')";
    $q = "select * from add_general_items where `agi_id`={$agi_id}";
    $data = mysqli_query($conn, $q);
    $agi_item_details = getDetails($data);
    $amount = getValue('offers', 'amount', $agi_id, 'agi_id');
    if (mysqli_query($conn, $query)) {
        if (changeOfferStatus($offer_id, $agi_id) && changeSoldStatus($agi_id) && amountDeduct($comm, $seller_id)) {
            $q = "insert into ambit_won_lost (`db`,`item_id`, `price`, `cus_id` , `status`) values ('add_general_items', '{$agi_id}', '{$amount}', '{$ar_id}', '1')";
            if (mysqli_query($conn, $q)) {
                sendBuyerMail($agi_id, $ar_id, $offer_id, $comm);
                sendOfferSoldMail($agi_id, $ar_id, $offer_id);
                return true;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function sendBuyerMail($agi_id, $ar_id, $offer_id, $comm)
{
    $listing_title=getValue("add_general_items", "listing_title", $agi_id, "agi_id");
    $price=getValue("offers", "amount", $offer_id, "id");
    
    $buyer_name=getValue("ambit_registration", "name", $ar_id, "ar_id");
    $buyer_email=getValue("ambit_registration", "email", $ar_id, "ar_id");
    
    $seller_id=getValue("offers", "sent_from_id", $offer_id, "id");
    $seller_name=getValue("ambit_registration", "name", $seller_id, "ar_id");
    $seller_email=getValue("ambit_registration", "email", $seller_id, "ar_id");

    include("buyer_offer_mail.php");
    include("seller_offer_mail.php");
}

function sendBuyerAndSellerMailForReservePriceOfGeneralItem($agi_id, $ar_id, $price)
{
    $comm = getComm($price);
    $listing_title=getValue("add_general_items", "listing_title", $agi_id, "agi_id");
    $seller_id=getValue("add_general_items", "uploader", $agi_id, "agi_id");
    
    $buyer_name=getValue("ambit_registration", "name", $ar_id, "ar_id");
    $buyer_email=getValue("ambit_registration", "email", $ar_id, "ar_id");

    if (!($seller_id == 'admin')) {
        $seller_name=getValue("ambit_registration", "name", $seller_id, "ar_id");
        $seller_email=getValue("ambit_registration", "email", $seller_id, "ar_id");
    } else {
        $seller_name='Admin';
        $seller_email='admin@admin.com';
    }

    include("buyer_reserve_price_mail.php");
    include("seller_reserve_price_mail.php");
}

function sendBuyerAndSellerMailForBidWonOfGeneralItem($agi_id, $ar_id, $price)
{
    $comm = getComm($price);
    $listing_title=getValue("add_general_items", "listing_title", $agi_id, "agi_id");
    $seller_id=getValue("add_general_items", "uploader", $agi_id, "agi_id");
    
    $buyer_name=getValue("ambit_registration", "name", $ar_id, "ar_id");
    $buyer_email=getValue("ambit_registration", "email", $ar_id, "ar_id");

    if (!($seller_id == 'admin')) {
        $seller_name=getValue("ambit_registration", "name", $seller_id, "ar_id");
        $seller_email=getValue("ambit_registration", "email", $seller_id, "ar_id");
    } else {
        $seller_name='Admin';
        $seller_email='admin@admin.com';
    }

    include("bid_won_mail.php");
    
    include("product_sold_mail.php");
}

function sendBuyerAndSellerMailForReservePriceOfCar($acm_id, $ar_id, $price)
{
    $comm = getComm($price);
    $listing_title=getValue("add_car_motorcycle", "listing_title", $acm_id, "acm_id");
    $seller_id=getValue("add_car_motorcycle", "uploader", $acm_id, "acm_id");
    
    $buyer_name=getValue("ambit_registration", "name", $ar_id, "ar_id");
    $buyer_email=getValue("ambit_registration", "email", $ar_id, "ar_id");

    if (!($seller_id == 'admin')) {
        $seller_name=getValue("ambit_registration", "name", $seller_id, "ar_id");
        $seller_email=getValue("ambit_registration", "email", $seller_id, "ar_id");
    } else {
        $seller_name='Admin';
        $seller_email='admin@admin.com';
    }

    include("buyer_reserve_price_mail.php");
    
    include("seller_reserve_price_mail.php");
}

function sendBuyerAndSellerMailForBidWonOfCar($acm_id, $ar_id, $price)
{
    $comm = getComm($price);
    $listing_title=getValue("add_car_motorcycle", "listing_title", $acm_id, "acm_id");
    $seller_id=getValue("add_car_motorcycle", "uploader", $acm_id, "acm_id");
    
    $buyer_name=getValue("ambit_registration", "name", $ar_id, "ar_id");
    $buyer_email=getValue("ambit_registration", "email", $ar_id, "ar_id");

    if (!($seller_id == 'admin')) {
        $seller_name=getValue("ambit_registration", "name", $seller_id, "ar_id");
        $seller_email=getValue("ambit_registration", "email", $seller_id, "ar_id");
    } else {
        $seller_name='Admin';
        $seller_email='admin@admin.com';
    }

    include("bid_won_mail.php");
    
    include("product_sold_mail.php");
}

function sendCustomersMailForLostBidOfGeneralItem($agi_id, $customers)
{
    $listing_title=getValue("add_general_items", "listing_title", $agi_id, "agi_id");
    $seller_id=getValue("add_general_items", "uploader", $agi_id, "agi_id");
    if (!($seller_id == 'admin')) {
        $seller_name=getValue("ambit_registration", "name", $seller_id, "ar_id");
        $seller_email=getValue("ambit_registration", "email", $seller_id, "ar_id");
    } else {
        $seller_name='Admin';
        $seller_email='admin@admin.com';
    }

    if ($customers) {
        foreach ($customers as $cus) {
            $buyer_name=getValue("ambit_registration", "name", $cus['cus_id'], "ar_id");
            $buyer_email=getValue("ambit_registration", "email", $cus['cus_id'], "ar_id");
            $price = getValue('ambit_general_item_bid', 'bid_price', $cus['agib_id'], 'agib_id');
            include("bid_lost_mail.php");
        }
    }
}

function sendCustomersMailForLostBidOfCar($acm_id, $customers)
{
    $listing_title=getValue("add_car_motorcycle", "listing_title", $acm_id, "acm_id");
    $seller_id=getValue("add_car_motorcycle", "uploader", $acm_id, "acm_id");
    if (!($seller_id == 'admin')) {
        $seller_name=getValue("ambit_registration", "name", $seller_id, "ar_id");
        $seller_email=getValue("ambit_registration", "email", $seller_id, "ar_id");
    } else {
        $seller_name='Admin';
        $seller_email='admin@admin.com';
    }
    if ($customers) {
        foreach ($customers as $cus) {
            $buyer_name=getValue("ambit_registration", "name", $cus['cus_id'], "ar_id");
            $buyer_email=getValue("ambit_registration", "email", $cus['cus_id'], "ar_id");
            $price = getValue('ambit_general_item_bid', 'bid_price', $cus['acb_id'], 'agib_id');
            include("bid_lost_mail.php");
        }
    }
}

function sendOutBiddedMailOnItem($bidder)
{
    $buyer_name=getValue("ambit_registration", "name", $bidder['cus_id'], "ar_id");
    $buyer_email=getValue("ambit_registration", "email", $bidder['cus_id'], "ar_id");
    include("out_bidded_mail.php");
}

function declineOffer($ar_id, $agi_id, $id)
{
    global $conn;
    $query="update offers set `accept_status`=0, `status`=1 where id='$id'";
    if (mysqli_query($conn, $query)) {
        sendDeclineMail($ar_id, $agi_id, $id);
        return true;
    } else {
        return false;
    }
}
function sendDeclineMail($ar_id, $agi_id, $id)
{
    $listing_title=getValue("add_general_items", "listing_title", $agi_id, "agi_id");
    $price=getValue("offers", "amount", $id, "id");
    //$buyer=getValue("offers","sent_to_id",$id,"id");
    $buyer_name=getValue("ambit_registration", "name", $ar_id, "ar_id");
    
    $seller_id=getValue("add_general_items", "uploader", $agi_id, "agi_id");
    $seller=getValue("ambit_registration", "name", $seller_id, "ar_id");
    $email=getValue("ambit_registration", "email", $seller_id, "ar_id");
    include("decline_offer_mail.php");
}

function sendOfferSoldMail($agi_id, $ar_id, $offer_id)
{
    global $conn;
    $listing_title=getValue("add_general_items", "listing_title", $agi_id, "agi_id");
    $price=getValue("offers", "amount", $offer_id, "id");
    $listing = $agi_id;
    $query = "select sent_to_id from offers where agi_id = {$agi_id} and sent_to_id != {$ar_id}";
    $data = mysqli_query($conn, $query);
    $otherWatchers = getDetails($data);

    foreach ($otherWatchers as $otherWatcher) {
        $query = "select email, name from ambit_registration where ar_id = {$otherWatcher['sent_to_id']}";
        $data = mysqli_query($conn, $query);
        $otherWatcherDetails = mysqli_fetch_assoc($data);
        $send_to = $otherWatcherDetails['name'];
        $email = $otherWatcherDetails['email'];
        include 'offer_sold_mail.php';
    }
}

function getNumberOfOffers($agi_id)
{
    global $conn;
    $query="select * from offers where agi_id='$agi_id' and status=0";
    $data= mysqli_query($conn, $query);
    $rows = mysqli_num_rows($data);
    return $rows;
}
function getWatchers($id)
{
    global $conn;
    $dbdata=array();
    $query="SELECT * FROM add_to_watch_general_item where item_id='$id'";
    $res=mysqli_query($conn, $query);
    $rows=mysqli_num_rows($res);
    if ($rows >= 1) {
        while ($data=mysqli_fetch_assoc($res)) {
            array_push($dbdata, $data);
        }
    }
    return $dbdata;
}

function sendMail($type, $item_id, $question)
{
    if ($type=='question') {
        $listing_title=getValue("add_general_items", "listing_title", $item_id, "agi_id");
        $send_to=getValue("add_general_items", "uploader", $item_id, "agi_id");
        $send_email=getValueDetails("ambit_registration", "*", $send_to, "ar_id");
        extract($send_email);
        include("mailer.php");
    } else {
        $listing_id=getValue("questions", "item_id", $item_id, "id");
        $listing_title=getValue("add_general_items", "listing_title", $listing_id, "agi_id");
        $send_to=getValue("questions", "cus_id", $item_id, "id");
        $send_email=getValueDetails("ambit_registration", "*", $send_to, "ar_id");
        extract($send_email);
        include("mailer.php");
    }
}

function getValueDetails($table, $field, $id, $key)
{
    global $conn;
    $query="select $field from $table where $key=".$id;
    $data= mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($data);
    return $row;
}

function getValue($table, $field, $id, $key)
{
    global $conn;
    $query="select $field from $table where $key=".$id;
    $data= mysqli_query($conn, $query);
    if (!$data) {
        return false;
    }
    $row = mysqli_fetch_assoc($data);
    return $row[$field];
}
function getNumberOfBids($id)
{
    global $conn;
    $query="select * from ambit_general_item_bid where agi_id=".$id;
    $data= mysqli_query($conn, $query);
    $rows = mysqli_num_rows($data);
    return $rows;
}
function getNumberOfBidsCar($id)
{
    global $conn;
    $query="select * from ambit_car_bid where acm_id=".$id;
    $data= mysqli_query($conn, $query);
    $rows = mysqli_num_rows($data);
    return $rows;
}
function getCustomersWhoMadeBidOnGeneralItemExceptGiven($id, $cus_id)
{
    global $conn;
    $query="select * from ambit_general_item_bid where agi_id={$id} and cus_id != {$cus_id}";
    $data= mysqli_query($conn, $query);
    $rows = array();
    if ($data) {
        while ($row = mysqli_fetch_assoc($data)) {
            array_push($rows, $row);
        }
    }
    return $rows;
}

function getCustomersWhoMadeBidOnCarExceptGiven($id, $cus_id)
{
    global $conn;
    $query="select * from ambit_car_bid where acm_id={$id} and cus_id != {$cus_id}";
    $data= mysqli_query($conn, $query);
    $rows = array();
    while ($row = mysqli_fetch_assoc($data)) {
        array_push($rows, $row);
    }
    return $rows;
}

function getCurrentBid($agi_id)
{
    global $conn;
    $query="SELECT bid_price FROM ambit_general_item_bid where date=(SELECT MAX(date) as 'max_date' FROM ambit_general_item_bid where agi_id='$agi_id')";
    $data= mysqli_query($conn, $query);
    $row=mysqli_fetch_assoc($data);
    return $row['bid_price'];
}
function getNumberQuestions($id)
{
    global $conn;
    $query="select * from questions where item_id=".$id;
    $data= mysqli_query($conn, $query);
    $rows = mysqli_num_rows($data);
    return $rows;
}

function doSelect($select, $table, $condition=array(), $orderBy="")
{
    global $conn;
    $condition1=array();
    $where=" WHERE 1 ";
    if (!empty($condition)) {
        foreach ($condition as $k=>$v) {
            array_push($condition1, $k."='".mysqli_real_escape_string($conn, $v)."'");
        }
        $where.=" AND ".implode(" AND ", $condition1);
    }
    $query="SELECT ".$select." FROM ".$table.$where.$orderBy;
    return mysqli_query($conn, $query);
}

function login($email, $password, $status)
{
    global $conn;

    $query="select * from ambit_registration where email='$email' and password='$password' and status='$status'";
    return mysqli_query($conn, $query);
}

function doSelect1($select, $table, $condition=array(), $orderBy="")
{
    global $conn;
    $condition1=array();
    $where=" WHERE 1 ";
    if (!empty($condition)) {
        foreach ($condition as $k=>$v) {
            array_push($condition1, $k."=".mysqli_real_escape_string($conn, $v)."");
        }
        $where.=" AND ".implode(" AND ", $condition1);
    }
    $query="SELECT ".$select." FROM ".$table.$where.$orderBy;
    // echo $query;
    return mysqli_query($conn, $query);
}
function doSelect2($select, $table, $condition=array(), $orderBy="")
{
    global $conn;
    $condition1=array();
    $where=" WHERE 1 ";
    if (!empty($condition)) {
        foreach ($condition as $k=>$v) {
            array_push($condition1, $k."=".mysqli_real_escape_string($conn, $v)."");
        }
        $where.=" AND ".implode(" AND ", $condition1);
    }
    $query="SELECT ".$select." FROM ".$table.$where.$orderBy;
    //echo $query;
    //return mysql_query($query);
    return $query;
}
function selectWhereIn($select, $table, $condition=array(), $orderBy="")
{
    global $conn;
    $condition1=array();
    $where=" WHERE 1 ";
    if (!empty($condition)) {
        foreach ($condition as $k=>$v) {
            array_push($condition1, $k." IN(".mysqli_real_escape_string($conn, $v).")");
        }
        $where.=" AND ".implode(" AND ", $condition1);
    }
    $query="SELECT ".$select." FROM ".$table.$where.$orderBy;
    //echo $query;
    return mysqli_query($conn, $query);
}
function doSelect3($query)
{
    global $conn;
    //echo $query;
    return mysqli_query($conn, $query);
}

function loginCheck($query)
{
    $dbdata=array();
    $rows=mysqli_num_rows($query);
    if ($rows==1) {
        while ($data=mysqli_fetch_assoc($query)) {
            array_push($dbdata, $data);
        }
    }
    return $dbdata;
}

function session_chk_login($field=array())
{
    if (empty($field)) {
        return false;
    }
    $query=getDetails(doSelect("*", "customer", $field));
    if (count($query)==1) {
        return true;
    } else {
        return false;
    }
}

function isLoggedIn()
{
    return isset($_SESSION['ar_id']);
}

function getDetails($query)
{
    $dbdata=array();
    $rows=mysqli_num_rows($query);
    if ($rows >= 1) {
        while ($data=mysqli_fetch_assoc($query)) {
            array_push($dbdata, $data);
        }
    }
    return $dbdata;
}
function getQuestions($item_id)
{
    global $conn;
    $dbdata=array();
    $query="select * from questions where item_id='$item_id'";
    $rows=mysqli_query($conn, $query);
    if ($rows) {
        while ($data=mysqli_fetch_assoc($rows)) {
            array_push($dbdata, $data);
        }
    }
    return $dbdata;
}
function doUpdate($table, $field=array(), $condition=array())
{
    global $conn;
    $dbdata=array();
    $set=" SET ";
    $condition1=array();
    $where=" WHERE 1 ";
    if (!empty($field)) {
        foreach ($field as $k=>$v) {
            array_push($dbdata, "`".$k."`='".mysqli_real_escape_string($conn, $v)."'");
        }
        $set.=implode(",", $dbdata);
    }
    if (!empty($condition)) {
        foreach ($condition as $k=>$v) {
            array_push($condition1, "`".$k."`='".mysqli_real_escape_string($conn, $v)."'");
        }
        $where.=" AND ".implode(" AND ", $condition1);
    }
    $query="UPDATE ".$table.$set.$where;

    return mysqli_query($conn, $query);
}

function doUpdate1($table, $field=array(), $condition=array())
{
    global $conn;
    $dbdata=array();
    $set=" SET ";
    $condition1=array();
    $where=" WHERE 1 ";
    if (!empty($field)) {
        foreach ($field as $k=>$v) {
            array_push($dbdata, "`".$k."`='".mysqli_real_escape_string($conn, $v)."'");
        }
        $set.=implode(",", $dbdata);
    }
    if (!empty($condition)) {
        foreach ($condition as $k=>$v) {
            array_push($condition1, $k."='".mysqli_real_escape_string($conn, $v)."'");
        }
        $where.=" AND ".implode(" AND ", $condition1);
    }
    $query="UPDATE ".$table.$set.$where;
    return mysqli_query($conn, $query);
}

function doDelete($table, $condition=array())
{
    global $conn;
    $condition1=array();
    $where=" WHERE 1 ";
    if (!empty($condition)) {
        foreach ($condition as $k=>$v) {
            array_push($condition1, $k."='".mysqli_real_escape_string($conn, $v)."'");
        }
        $where.=" AND ".implode(" AND ", $condition1);
    }
    $query="DELETE FROM ".$table.$where;
    return mysqli_query($conn, $query);
}

function rating($rate)
{

            //$rate=getDetails(doSelect1("count(*) as count,SUM(rate) as sum","rating",array("rating_ho_id"=>$ho_id)));
    //$rate=getDetails(mysql_query("SELECT count(*) as count,SUM(rate) as sum FROM rating WHERE rating_ho_idin('$ho_id')"));
    if ($rate[0]["count"] !=0) {
        $member=$rate[0]["count"];
        $rate=$rate[0]["sum"];
        $cal=($rate/$member);
        $half=0;
        $full=0;
        $no_star=0;
        if (is_int($cal)) {
            if (round($cal) < 5) {
                $no_star=5-round($cal);
            }
            return '0||'.$cal.'||'.$no_star;
        }
        $rem=explode(".", $cal)[1];
        if ($rem[0]==5) {
            $half_full=1+floor($cal);
            if ($half_full < 5) {
                $no_star=5-$half_full;
            }
            return '1||'.floor($cal).'||'.$no_star;
        } else {
            if (round($cal) < 5) {
                $no_star=5-round($cal);
            }
            return '0||'.round($cal).'||'.$no_star;
        }
    } else {
        return '0||0||5';
    }
}

function get_site_settings($id="")
{
    $result=getDetails(doSelect1("st_value", "site_settings", array("st_id"=>$id)));
    return $result[0]["st_value"];
}


function seeMoreDetails($select, $from, $where)
{
    $result=getDetails(doSelect1($select, $from, $where));
    if (!empty($result)) {
        return $result[0][$select];
    }
}




function count_days($new_date)
{
    $now = time();
    $date = strtotime($new_date);
    $datediff = $now - $date;
    $day=floor($datediff / (60 * 60 * 24));
    if ($day==0) {
        return 'Today';
    } else {
        return $day." day's ago";
    }
}

function getCustomerName($id)
{
    $name=getDetails(doSelect1("fname,lname", "ambit_customer", array("ac_id"=>$id)));
    $name=$name[0]["fname"].' '.$name[0]["lname"];
    return $name;
}


function currency()
{
    return '$';
}
function get_date_str($date)
{
    echo date("jS F, Y", strtotime($date));
}

function get_date_str_feedback($date)
{
    echo date("m/d/Y", strtotime($date));
}
function getRatingStar($id)
{
    $rate=getDetails(doSelect1("count(*) as count,SUM(rating) as sum", "ambit_product_review", array("apr_apa_id"=>$id)));
    $a=explode("||", rating($rate));
    $half_star=$a[0];
    $full_star=$a[1];
    $no_star=$a[2];
    for ($i=1;$i<=$full_star;$i++) {
        echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
    }
    for ($i=1;$i<=$half_star;$i++) {
        echo '<span class="fa fa-stack"><i class="fa fa-star-half-o"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
    }
    for ($i=1;$i<=$no_star;$i++) {
        echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>';
    }
}
function fileDelete($field, $from, $condition, $path)
{
    $prev_image=getDetails(doSelect($field, $from, $condition));
    if (!empty($prev_image)) {
        foreach ($prev_image as $k=>$v) {
            $file=$v[$field];
            if (file_exists($path.$file)) {
                unlink($path.$file);
            }
        }
    }
    return true;
}


function getGeneralItemTitle($agi_id)
{
    return trim(seeMoreDetails("listing_title", "add_general_items", array("agi_id"=>$agi_id)));
}
function getGeneralItemCategory($gic_id)
{
    return trim(seeMoreDetails("category", "general_item_category", array("gic_id"=>$gic_id)));
}
function getGeneralItemLabel($gcef_id)
{
    return trim(seeMoreDetails("label_name", "general_cat_extra_field", array("gcef_id"=>$gcef_id)));
}

function getPropertyTitle($ap_id)
{
    return trim(seeMoreDetails("listing_title", "add_property", array("ap_id"=>$ap_id)));
}
function getPropertyCategory($pc_id)
{
    return trim(seeMoreDetails("category", "property_category", array("pc_id"=>$pc_id)));
}
function getPropertyLabel($pcef_id)
{
    return trim(seeMoreDetails("label_name", "property_cat_extra_field", array("pcef_id"=>$pcef_id)));
}
function getJobTitle($aj_id)
{
    return trim(seeMoreDetails("listing_title", "add_job", array("aj_id"=>$aj_id)));
}
function getJobCategory($jc_id)
{
    return trim(seeMoreDetails("category", "job_category", array("jc_id"=>$jc_id)));
}
function getJobLabel($jcef_id)
{
    return trim(seeMoreDetails("label_name", "job_cat_extra_field", array("jcef_id"=>$jcef_id)));
}
function getCarTitle($acm_id)
{
    return trim(seeMoreDetails("listing_title", "add_car_motorcycle", array("acm_id"=>$acm_id)));
}
function getCarCategory($cc_id)
{
    return trim(seeMoreDetails("category", "car_category", array("cc_id"=>$cc_id)));
}
function getCarLabel($ccef_id)
{
    return trim(seeMoreDetails("label_name", "car_cat_extra_field", array("ccef_id"=>$ccef_id)));
}



function getCountryName($id)
{
    return trim(seeMoreDetails("cn_name", "ambit_country", array("cn_id"=>$id)));
}
function getCityName($id)
{
    return trim(seeMoreDetails("ct_name", "ambit_city", array("ct_id"=>$id)));
}
function getRegionName($id)
{
    return trim(seeMoreDetails("region", "ambit_region", array("ar_id"=>$id)));
}
function getCityIdByRegion($id)
{
    return trim(seeMoreDetails("ct_id", "ambit_region", array("ar_id"=>$id)));
}
function getCountryIdByCity($id)
{
    return trim(seeMoreDetails("ct_cn_id", "ambit_city", array("ct_id"=>$id)));
}

function addDaysWithDate($date, $days)
{
    $date = strtotime("+".$days." days", strtotime($date));
    return  date("Y-m-d", $date);
}
function trimmer($field)
{
    $field1=array();
    foreach ($field as $k=>$v) {
        $field1[trim($k)]=trim($v);
    }
    return $field1;
}
function trimmer_db_array($field)
{
    $field1=array();
    foreach ($field as $k1=>$v1) {
        foreach ($v1 as $k=>$v) {
            $field1[trim($k)]=trim($v);
        }
        $field[trim($k1)]=$field1;
    }
    return $field;
}

function is_price_currency($price)
{
    if ($price == '0' || $price == "") {
        $ret_price="";
    } else {
        $ret_price=$price;
        if (is_numeric($ret_price)) {
            $ret_price=currency().$ret_price;
        }
    }
    return $ret_price;
}


function show_price_classifiedDb($for_what)
{
    $ret_price=0;
    $price_list=getDetails(doSelect("apfc_id,for_what,price,min_price,max_price", "add_price_for_classified", array("for_what"=>$for_what,"status"=>1)));
    $price_list=trimmer_db_array($price_list);
    if (!empty($price_list)) {
        foreach ($price_list as $k=>$v) {
            extract($v);
        }
        if ($price !="") {
            $ret_price=is_price_currency($price);
        } elseif ($min_price >= '0' && $max_price > '0') {
            $ret_price=is_price_currency($min_price).' - '.is_price_currency($max_price);
        } else {
            $ret_price="";
        }
    }
    return $ret_price;
}

function show_price_listingDb($for_what)
{
    $price_list=getDetails(doSelect("apfl_id,for_what,price,term,min_price,max_price,price_term,rent_term,rent_min,rent_max", "add_price_for_listing", array("for_what"=>$for_what,"status"=>1)));
    $price_list=trimmer_db_array($price_list);
    $ret_price="";
    if (!empty($price_list)) {
        foreach ($price_list as $k=>$v) {
            extract($v);
        }
        if ($price !="") {
            $ret_price=is_price_currency($price).' '.$term;
        } elseif ($min_price >= '0' && $max_price > '0') {
            $ret_price=is_price_currency($min_price).' - '.is_price_currency($max_price).' '.$price_term;
        } else {
            $ret_price=is_price_currency($rent_min).' - '.is_price_currency($rent_max).' '.$rent_term;
        }
    }
    return $ret_price;
}

function show_price_classifiedDb_numeric($for_what)
{
    $price_list=getDetails(doSelect("apfc_id,for_what,price,min_price,max_price", "add_price_for_classified", array("for_what"=>$for_what,"status"=>1)));
    $price_list=trimmer_db_array($price_list);
    if (!empty($price_list)) {
        foreach ($price_list as $k=>$v) {
            extract($v);
        }
        if ($price !="") {
            $ret_price=$price;
        } elseif ($min_price >= '0' && $max_price > '0') {
            $ret_price=$min_price.' - '.$max_price;
        } else {
            $ret_price="";
        }
    }
    return $ret_price;
}

function show_price_listingDb_numeric($for_what)
{
    $price_list=getDetails(doSelect("apfl_id,for_what,price,term,min_price,max_price,price_term,rent_term,rent_min,rent_max", "add_price_for_listing", array("for_what"=>$for_what,"status"=>1)));
    $price_list=trimmer_db_array($price_list);
    $ret_price="";
    if (!empty($price_list)) {
        foreach ($price_list as $k=>$v) {
            extract($v);
        }
        if ($price !="") {
            $ret_price=$price;
        } elseif ($min_price >= '0' && $max_price > '0') {
            $ret_price=$min_price.' - '.$max_price;
        } else {
            $ret_price=$rent_min.' - '.$rent_max;
        }
    }
    return $ret_price;
}

function string_display($string, $start_pos, $end_pos)
{
    $length=strlen($string);
    $string=substr($string, $start_pos, $end_pos);
    if ($length > $end_pos) {
        return $string.'';
    } else {
        return $string;
    }
}
function string_display1($string, $start_pos, $end_pos)
{
    $length=strlen($string);
    $string=substr($string, $start_pos, $end_pos);
    if ($length > $end_pos) {
        return $string.'....';
    } else {
        return $string;
    }
}
function total_general_item_by_cat($cat_id)
{
    $query=doSelect2("count(*) as count", "add_general_items", array("status"=>1));
    $query.=' AND (cat_id='.$cat_id.' OR cat1_id='.$cat_id.')';
    $result=getDetails(doSelect3($query));
    return $result[0]['count'];
}
function total_general_item_by_sub_cat($sub_cat_id)
{
    $query=doSelect2("count(*) as count", "add_general_items", array("status"=>1));
    $query.=' AND (sub_cat_id='.$sub_cat_id.' OR sub_cat1_id='.$sub_cat_id.')';
    $result=getDetails(doSelect3($query));
    return $result[0]['count'];
}
function total_general_item_by_sub_sub_cat($sub_sub_cat_id)
{
    $query=doSelect2("count(*) as count", "add_general_items", array("status"=>1));
    $query.=' AND (sub_sub_cat_id='.$sub_sub_cat_id.' OR sub_sub_cat1_id='.$sub_sub_cat_id.')';
    $result=getDetails(doSelect3($query));
    return $result[0]['count'];
}
function total_general_item_by_sub_sub_sub_cat($sub_sub_sub_cat_id)
{
    $query=doSelect2("count(*) as count", "add_general_items", array("status"=>1));
    $query.=' AND (sub_sub_sub_cat_id='.$sub_sub_sub_cat_id.' OR sub_sub_sub_cat1_id='.$sub_sub_sub_cat_id.')';
    $result=getDetails(doSelect3($query));
    return $result[0]['count'];
}
function total_property_by_cat($cat_id)
{
    return trim(seeMoreDetails("count(*)", "add_property", array("status"=>1,"cat_id"=>$cat_id)));
}
function total_property_by_sub_cat($sub_cat_id)
{
    return trim(seeMoreDetails("count(*)", "add_property", array("status"=>1,"sub_cat_id"=>$sub_cat_id)));
}
function total_property_by_sub_sub_cat($sub_sub_cat_id)
{
    return trim(seeMoreDetails("count(*)", "add_property", array("status"=>1,"sub_sub_cat_id"=>$sub_sub_cat_id)));
}
function total_job_by_cat($cat_id)
{
    return trim(seeMoreDetails("count(*)", "add_job", array("status"=>1,"cat_id"=>$cat_id)));
}
function total_job_by_sub_cat($sub_cat_id)
{
    return trim(seeMoreDetails("count(*)", "add_job", array("status"=>1,"sub_cat_id"=>$sub_cat_id)));
}
function total_job_by_sub_sub_cat($sub_sub_cat_id)
{
    return trim(seeMoreDetails("count(*)", "add_job", array("status"=>1,"sub_sub_cat_id"=>$sub_sub_cat_id)));
}
function total_car_by_cat($cat_id)
{
    $query=doSelect2("count(*) as count", "add_car_motorcycle", array("status"=>1));
    $query.=' AND (cat_id='.$cat_id.' OR cat1_id='.$cat_id.')';
    $result=getDetails(doSelect3($query));
    return $result[0]['count'];
}
function total_car_by_sub_cat($sub_cat_id)
{
    $query=doSelect2("count(*) as count", "add_car_motorcycle", array("status"=>1));
    $query.=' AND (sub_cat_id='.$sub_cat_id.' OR sub_cat1_id='.$sub_cat_id.')';
    $result=getDetails(doSelect3($query));
    return $result[0]['count'];
}
function total_car_by_sub_sub_cat($sub_sub_cat_id)
{
    $query=doSelect2("count(*) as count", "add_car_motorcycle", array("status"=>1));
    $query.=' AND (sub_sub_cat_id='.$sub_sub_cat_id.' OR sub_sub_cat1_id='.$sub_sub_cat_id.')';
    $result=getDetails(doSelect3($query));
    return $result[0]['count'];
}

function getAdminName()
{
    return seeMoreDetails("full_name", "admin", array());
}
function getAdminEmail()
{
    return seeMoreDetails("email", "admin", array());
}
function getAdminImage()
{
    return seeMoreDetails("image", "admin", array());
}
function getCusName($ar_id)
{
    return trim(seeMoreDetails("name", "ambit_registration", array("ar_id"=>$ar_id)));
}

function total_submission_by_cus($ar_id)
{
    $counter=0;
    $a=trim(seeMoreDetails("count(*)", "add_car_motorcycle", array("uploader"=>$ar_id)));
    $b=trim(seeMoreDetails("count(*)", "add_job", array("uploader"=>$ar_id)));
    $c=trim(seeMoreDetails("count(*)", "add_property", array("uploader"=>$ar_id)));
    $d=trim(seeMoreDetails("count(*)", "add_general_items", array("uploader"=>$ar_id)));
    $counter=$a+$b+$c+$d;
    return $counter;
}

function getCusEmail($ar_id)
{
    return trim(seeMoreDetails("email", "ambit_registration", array("ar_id"=>$ar_id)));
}

function check_watch_list($db_name, $field)
{
    $check=getDetails(doSelect("*", $db_name, $field));
    if (!empty($check)) {
        return true;
    } else {
        return false;
    }
}

function getItemReviewNumber($db, $item)
{
    return trim(seeMoreDetails("count(*)", $db, array("status"=>1,"item_id"=>$item)));
}

function get_facebook_cus($cus_id)
{
    $link=getDetails(doSelect("link", "ambit_cus_social_media", array("cus_id"=>$cus_id,"acnt_type"=>"Facebook")));
    if (!empty($link)) {
        return trim($link[0]["link"]);
    } else {
        return '';
    }
}
function get_twitter_cus($cus_id)
{
    $link=getDetails(doSelect("link", "ambit_cus_social_media", array("cus_id"=>$cus_id,"acnt_type"=>"Twitter")));
    if (!empty($link)) {
        return trim($link[0]["link"]);
    } else {
        return '';
    }
}
function get_google_plus_cus($cus_id)
{
    $link=getDetails(doSelect("link", "ambit_cus_social_media", array("cus_id"=>$cus_id,"acnt_type"=>"Google +")));
    if (!empty($link)) {
        return trim($link[0]["link"]);
    } else {
        return '';
    }
}
function get_linked_in_cus($cus_id)
{
    $link=getDetails(doSelect("link", "ambit_cus_social_media", array("cus_id"=>$cus_id,"acnt_type"=>"LinkedIn")));
    if (!empty($link)) {
        return trim($link[0]["link"]);
    } else {
        return '';
    }
}

function get_cus_acnt_balance($ar_id)
{
    return seeMoreDetails("balance", "cus_acnt_blnce", array("cus_id"=>$ar_id));
}
function generateRandomString($length = 10)
{
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)))), 1, $length);
}

function chk_genrl_itm_fld_exist($field, $agi_id)
{
    return trim(seeMoreDetails($field, "add_general_items", array("agi_id"=>$agi_id)));
}

function chk_car_fld_exist($field, $acm_id)
{
    return trim(seeMoreDetails($field, "add_car_motorcycle", array("acm_id"=>$acm_id)));
}

function chk_car_listing_fld_exist($field, $acm_id)
{
    return trim(seeMoreDetails($field, "add_car_motorcycle_listing_features", array("acm_id"=>$acm_id)));
}
function chk_property_listing_fld_exist($field, $ap_id)
{
    return trim(seeMoreDetails($field, "add_property_listing_features", array("ap_id"=>$ap_id)));
}
function check_job_applied($aj_id, $cus_id)
{
    $apply=trim(seeMoreDetails("aja_id", "ambit_job_apply", array("aj_id"=>$aj_id,"cus_id"=>$cus_id)));
    if ($apply!="") {
        return true;
    } else {
        return false;
    }
}
function higest_bid_car($acm_id)
{
    $bid=trim(seeMoreDetails("MAX(bid_price)", "ambit_car_bid", array("acm_id"=>$acm_id)));
    if ($bid=="") {
        return trim(seeMoreDetails('start_price', 'add_car_motorcycle', array("acm_id"=>$acm_id)));
    } else {
        return $bid;
    }
}
function reserve_price_car($acm_id)
{
    return trim(seeMoreDetails('reserve_price', 'add_car_motorcycle', array("acm_id"=>$acm_id)));
}
function higest_bid_general_item($agi_id)
{
    $bid=trim(seeMoreDetails("MAX(bid_price)", "ambit_general_item_bid", array("agi_id"=>$agi_id)));
    if ($bid=="") {
        return trim(seeMoreDetails('start_price', 'add_general_items', array("agi_id"=>$agi_id)));
    } else {
        return $bid;
    }
}

function reserve_price_general_item($agi_id)
{
    return trim(seeMoreDetails('reserve_price', 'add_general_items', array("agi_id"=>$agi_id)));
}


function check_car_featured($field, $acm_id)
{
    return trim(seeMoreDetails($field, "add_car_motorcycle_listing_features", array("acm_id"=>$acm_id)));
}

function get_add_car_field($field, $acm_id)
{
    return trim(seeMoreDetails($field, "add_car_motorcycle", array("acm_id"=>$acm_id)));
}
function get_site_setting($id="")
{
    $result=getDetails(doSelect1("link", "admin_website_link", array("id"=>$id)));
    return $result[0]["link"];
}

function count_acnt_days($ar_id)
{
    $now = time();
    $new_date=trim(seeMoreDetails("acnt_created", "ambit_registration", array("ar_id"=>$ar_id)));
    $date = strtotime($new_date);
    $datediff = $now - $date;
    $day=floor($datediff / (60 * 60 * 24));
    if ($day > 90) {
        return 1;
    } else {
        return 0;
    }
}

/*
    Custom Functions
 */
function showOfferExpired($agi_id)
{
    global $conn;
    $query = "select * from offers where `agi_id`={$agi_id}";
    $expired = false;
    $rejectedByEveryOne = true;
    $data = mysqli_query($conn, $query);
    if ($data) {
        while ($row = mysqli_fetch_assoc($data)) {
            if ($row['accept_status'] === null) {
                $rejectedByEveryOne = false;
            }
            $expireAt = new \Carbon\Carbon($row['created_at']);
            $diff = $expireAt->diffInDays(\Carbon\Carbon::now());
            if ($diff >= $row['days']) {
                $expired = true;
            }
        }
    }
    if ($expired || $rejectedByEveryOne) {
        return true;
    }
    
    return false;
}

function canAddFeedback()
{
    global $conn;

    if (isset($_GET['awl_id'])) {
        if ($_SESSION['ar_id'] == $_GET['cus_id']) {
            return false;
        }
        $awl_id = $_GET['awl_id'];
        // Check if feedback already placed
        $feedback = getValue('feedbacks', 'awl_id', $awl_id, 'awl_id');
        if ($feedback) {
            return false;
        }
        $status = getValue('ambit_won_lost', 'status', $awl_id, 'awl_id');
        if (!$status) {
            return false;
        }
        $customer_id = getValue('ambit_won_lost', 'cus_id', $awl_id, 'awl_id');
        if (($_SESSION['ar_id'] == $customer_id)) {
            return true;
        }
    } elseif (isset($_GET['db']) && isset($_GET['item_id'])) {
        if ($_SESSION['ar_id'] == $_GET['cus_id']) {
            return false;
        }
        $query = "select seller_feedback from ambit_won_lost where db='{$_GET['db']}' and item_id={$_GET['item_id']} and status=1";
        $data = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($data);
        if ($row['seller_feedback']) {
            return false;
        }
        return true;
    }
    return false;
}

function isBuyerOrSeller()
{
    if (isset($_GET['awl_id'])) {
        return 'buyer';
    } elseif (isset($_GET['db'])) {
        return 'seller';
    }
}

function offerWonCusId($item_id, $db)
{
    global $conn;
    $query = "select cus_id from ambit_won_lost where db='{$db}' and item_id={$item_id}";
    $data = mysqli_query($conn, $query);
    if ($data) {
        $row = mysqli_fetch_assoc($data);
        return $row['cus_id'];
    }
    return '';
}
function alreadyMadeBidOnItem($agi_id, $ar_id)
{
    global $conn;
    $query = "Select count(*) as count from ambit_general_item_bid where agi_id={$agi_id} and cus_id={$ar_id}";
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_assoc($result)['count'];
    return $count;
}
function alreadyMadeAutoBidOnItem($agi_id, $ar_id)
{
    if ($auto_bid = lastAutoBidOnItem($agi_id, $ar_id)) {
        if ($auto_bid > 0) {
            return true;
        }
    }
    return false;
}
function alreadyMadeBidOnCar($acm_id, $ar_id)
{
    global $conn;
    $query = "Select count(*) as count from ambit_car_bid where acm_id={$acm_id} and cus_id={$ar_id}";
    $result = mysqli_query($conn, $query);
    $count = mysqli_fetch_assoc($result)['count'];
    return $count;
}
function alreadyMadeAutoBidOnCar($agi_id, $ar_id)
{
    if ($auto_bid = lastAutoBidOnCar($agi_id, $ar_id)) {
        if ($auto_bid > 0) {
            return true;
        }
    }
    return false;
}

function updateBidOnItem($agi_id, $ar_id, $bid_price)
{
    global $conn;
    $query = "Update ambit_general_item_bid Set bid_price={$bid_price} where agi_id={$agi_id} and cus_id={$ar_id}";
    $updated = mysqli_query($conn, $query);
    return $updated;
}
function updateAutoBidOnItem($agi_id, $ar_id, $auto_bid)
{
    global $conn;
    $query = "Update ambit_general_item_bid Set auto_bid={$auto_bid} where agi_id={$agi_id} and cus_id={$ar_id}";
    $updated = mysqli_query($conn, $query);
    return $updated;
}

function updateEmailMeOnItem($agi_id, $ar_id, $email_me)
{
    global $conn;
    $query = "Update ambit_general_item_bid Set email_me={$email_me} where agi_id={$agi_id} and cus_id={$ar_id}";
    $updated = mysqli_query($conn, $query);
    return $updated;
}

function updateBidOnCar($acm_id, $ar_id, $bid_price)
{
    global $conn;
    $query = "Update ambit_car_bid set bid_price={$bid_price} where acm_id={$acm_id} and cus_id={$ar_id}";
    $updated = mysqli_query($conn, $query);
    return $updated;
}

function updateAutoBidOnCar($acm_id, $ar_id, $auto_bid)
{
    global $conn;
    $query = "Update ambit_car_bid set auto_bid={$auto_bid} where acm_id={$acm_id} and cus_id={$ar_id}";
    $updated = mysqli_query($conn, $query);
    return $updated;
}

function lastBidOnItem($agi_id, $ar_id)
{
    global $conn;
    $query = "select bid_price from ambit_general_item_bid where agi_id={$agi_id} and cus_id={$ar_id}";
    $result = mysqli_query($conn, $query);
    $bid_price = mysqli_fetch_assoc($result)['bid_price'];
    return $bid_price;
}

function lastAutoBidOnItem($agi_id, $ar_id)
{
    global $conn;
    $query = "select auto_bid from ambit_general_item_bid where agi_id={$agi_id} and cus_id={$ar_id}";
    $result = mysqli_query($conn, $query);
    $auto_bid = mysqli_fetch_assoc($result)['auto_bid'];
    return $auto_bid;
}

function lastBidOnCar($acm_id, $ar_id)
{
    global $conn;
    $query = "select bid_price from ambit_car_bid where acm_id={$acm_id} and cus_id={$ar_id}";
    $result = mysqli_query($conn, $query);
    $bid_price = mysqli_fetch_assoc($result)['bid_price'];
    return $bid_price;
}

function lastAutoBidOnCar($agi_id, $ar_id)
{
    global $conn;
    $query = "select auto_bid from ambit_car_bid where acm_id={$acm_id} and cus_id={$ar_id}";
    $result = mysqli_query($conn, $query);
    $auto_bid = mysqli_fetch_assoc($result)['auto_bid'];
    return $auto_bid;
}

function expired($v)
{
    $listing_time = "12:01:00";
    $date_list_length=$v['listing_length'].' '.$listing_time;
    $datetime1 = new DateTime();
    $datetime2 = new DateTime($date_list_length);
    $expired = $datetime2 < $datetime1;
    return $expired;
}


//
function show_price_propertyPriceDB($for_what)
{
    $ret_price=0;
    $price_list=getDetails(doSelect("apfl_id,for_what,price,min_price,max_price", "add_price_for_listing", array("for_what"=>$for_what,"status"=>1)));
    if (count($price_list) > 0) {
        foreach ($price_list as $k=>$v) {
            $ret_price= $v['price'];
        }
    }
    return $ret_price;
}
function show_price_classifiedDb123($for_what)
{
    global $conn;
    $ret_price=0;
    $query= "SELECT `apfc_id`,`for_what`,`price` FROM `add_price_for_classified` WHERE 1= 1 AND `for_what`= '$for_what' AND `status`= 1";
    $result= mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($data= mysqli_fetch_assoc($result)) {
                $ret_price= $data['price'];
            }
        }
    }
    return $ret_price;
}


function geocode($address)
{
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address
    if ($resp['status']=='OK') {
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
         
        // verify if data is complete
        if ($lati && $longi && $formatted_address) {
         
            // put the data in the array
            $data_arr = array();
             
            array_push(
                $data_arr,
                    $lati,
                    $longi,
                    $formatted_address
                );
             
            return $data_arr;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function AddViewCounter()
{
    global $conn;
    $dbdata=array();
    $ap_id = 0;
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $ap_id = $_GET['id'];
    }
 
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $session_id = session_id();
    $counter = 1;
    if (isset($_SESSION["ar_id"]) && $_SESSION["ar_id"] > 0) {
        $user_id = $_SESSION["ar_id"] ;
    } else {
        $user_id = 0;
    }

    $view_date = date("Y-m-d");
    if ($ap_id > 0) {
        $CheckPropertyquery="SELECT * FROM  `add_property`  WHERE  `ap_id` = '".$ap_id."'";
        $CheckData = mysqli_query($conn, $CheckPropertyquery);
        if ($CheckData) {
            $PropertyExist=mysqli_num_rows($CheckData);
         
            if ($PropertyExist > 0) {
                $query = "SELECT * FROM `tbl_add_property_view` WHERE `ap_id`='".$ap_id."' AND `ip_address` = '".$ip_address."' AND `view_date` = '".$view_date."'";
                $data = mysqli_query($conn, $query);
                if ($data) {
                    $rowcount=mysqli_num_rows($data);
                    if ($rowcount <= 0) {
                        $AddCounterquery="INSERT INTO `tbl_add_property_view` (`ap_id`, `ip_address`, `session_id`, `counter`, `user_id`,`view_date`) VALUES
										 ('".$ap_id."','".$ip_address."','".$session_id."','1','".$user_id."','".$view_date."');";
                        $LastID = mysqli_query($conn, $AddCounterquery);
                        if ($LastID > 0 && $ap_id > 0) {
                            $Updatequery="UPDATE `add_property` SET `view_counter` = `view_counter` + 1 WHERE  `ap_id` = '".$ap_id."'";
                            $UpdateStatus = mysqli_query($conn, $Updatequery);
                        }
                    }
                }
            }
        }
    }
}

function get_general_item_page_count($v)
{
    $count = getValue('add_general_items', 'page_count', $v['agi_id'], 'agi_id');
    return $count;
}

function increase_general_item_page_count($v)
{
    global $conn;
    $count = getValue('add_general_items', 'page_count', $v['agi_id'], 'agi_id');
    $count++;
    $query = "update add_general_items set page_count={$count} where agi_id = {$v['agi_id']}";
    mysqli_query($conn, $query);
}

function get_car_page_count($v)
{
    $count = getValue('add_car_motorcycle', 'page_count', $v['acm_id'], 'acm_id');
    return $count;
}

function increase_car_page_count($v)
{
    global $conn;
    $count = getValue('add_car_motorcycle', 'page_count', $v['acm_id'], 'acm_id');
    $count++;
    $query = "update add_car_motorcycle set page_count={$count} where acm_id = {$v['acm_id']}";
    mysqli_query($conn, $query);
}

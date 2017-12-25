<?php

/**
 * Reset Password
 */

function reset_password($new_password=null)
{
    if (!$new_password) {
        return false;
    }
    $new_password=md5($new_password);
    $ar_id = $_SESSION['ar_id'];
    doUpdate('ambit_registration', ['password' => $new_password], ['ar_id' => $ar_id]);
    return true;
}

function check_old_password($password)
{
    global $conn;
    $password=md5($password);
    $ar_id = $_SESSION['ar_id'];
    $q="SELECT * from ambit_registration where ar_id={$ar_id} and password='{$password}'";
    $results = mysqli_query($conn, $q);

    if (!$results) {
        die('Invalid query: ' . mysqli_info($conn));
    } else {
        return !! mysqli_num_rows($results);
    }

    return false;
}

function car_extra_fields($acm_id = null)
{
    global $conn;
    $fields = [];
    if (!$acm_id) {
        return $fields;
    }

    $query = "Select acmef.* , ccef.field_name, ccef.label_name, ccef.extra_field_type, ccef.value as value_expected  from add_car_motorcycle_extra_field as acmef left join  car_cat_extra_field as ccef on ccef.ccef_id = acmef.ccef_id where acmef.acm_id={$acm_id}";
    $results = mysqli_query($conn, $query);
    if (!$results) {
        die('Invalid query: ' . mysqli_info($conn));
    }

    $num_rows = mysqli_num_rows($results);
    if ($num_rows <= 0) {
        return $fields;
    }

    while ($row = mysqli_fetch_assoc($results)) {
        $fields[] = $row;
    }

    return $fields;
}

function general_item_extra_fields($agi_id = null)
{
    global $conn;
    $fields = [];
    if (!$agi_id) {
        return $fields;
    }

    $query = "Select agief.* , gcef.field_name, gcef.label_name, gcef.extra_field_type, gcef.value as value_expected  from add_general_items_extra_field as agief left join  general_cat_extra_field as gcef on gcef.gcef_id = agief.gcef_id where agief.agi_id={$agi_id}";
    $results = mysqli_query($conn, $query);
    if (!$results) {
        die('Invalid query: ' . mysqli_info($conn));
    }

    $num_rows = mysqli_num_rows($results);
    if ($num_rows <= 0) {
        return $fields;
    }

    while ($row = mysqli_fetch_assoc($results)) {
        $fields[] = $row;
    }

    return $fields;
}


/**
 * Car Q\A functions
 */
function getCarQuestions($car_id)
{
    global $conn;
    $dbdata=array();
    $query="select * from car_questions where car_id='$car_id'";
    $rows=mysqli_query($conn, $query);
    if ($rows) {
        while ($data=mysqli_fetch_assoc($rows)) {
            array_push($dbdata, $data);
        }
    }
    return $dbdata;
}
function getCarNumberQuestions($id)
{
    global $conn;
    $query="select * from car_questions where car_id=".$id;
    $data= mysqli_query($conn, $query);
    $rows = mysqli_num_rows($data);
    return $rows;
}

function sendMailForCarQNA($type, $car_id, $question)
{
    if ($type=='question') {
        $listing_title=getValue("add_car_motorcycle", "listing_title", $car_id, "acm_id");
        $send_to=getValue("add_car_motorcycle", "uploader", $car_id, "acm_id");
        $send_email=getValueDetails("ambit_registration", "*", $send_to, "ar_id");
        extract($send_email);
        include("car_mailer.php");
    } else {
        $listing_id=getValue("car_questions", "car_id", $car_id, "id");
        $listing_title=getValue("add_car_motorcycle", "listing_title", $listing_id, "acm_id");
        $send_to=getValue("car_questions", "cus_id", $car_id, "id");
        $send_email=getValueDetails("ambit_registration", "*", $send_to, "ar_id");
        extract($send_email);
        include("mailer.php");
    }
}

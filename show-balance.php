<?php 
session_start();
include "function.php";
$balance = get_cus_acnt_balance($_SESSION["ar_id"]);
echo json_encode( $balance );

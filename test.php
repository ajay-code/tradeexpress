<?php 
session_start(); 
require_once("function.php"); 
$acm_id = 158;
$v = alreadyMadeAutoBidOnCar($acm_id, $_SESSION['ar_id']);
var_dump($v);
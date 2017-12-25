<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);

if(isset($_POST["msg"])){
$msg=$_POST["msg"];
unset($_POST["msg"]);
}

if($msg=='stop_bid' && $_POST["db"]=='add_general_items'){
	doUpdate($_POST["db"],array("sold_status"=>1),array("agi_id"=>$_POST["id"]));
	$id_array=getDetails(doSelect("agib_id","ambit_general_item_bid",array(),' ORDER BY bid_price DESC LIMIT 1'));
	if(!empty($id_array)){
	$agib_id=$id_array[0]["agib_id"];
	doUpdate('ambit_general_item_bid',array("won"=>1),array("agib_id"=>$agib_id));
	doUpdate1('ambit_general_item_bid',array("won"=>2),array("agib_id !"=>$agib_id));
	$cus_id=seeMoreDetails("cus_id","ambit_general_item_bid",array("agib_id"=>$agib_id));
	$bid_price=seeMoreDetails("bid_price","ambit_general_item_bid",array("agib_id"=>$agib_id));
	
	$field=array("db"=>$_POST["db"],"item_id"=>$_POST["id"],"cus_id"=>$cus_id,"status"=>1,"price"=>$bid_price);
	doInsert($field,"ambit_won_lost");
	$other_cus=getDetails(doSelect1("cus_id","ambit_general_item_bid",array("cus_id !"=>$cus_id)));
	$other_cus=trimmer_db_array($other_cus);
	foreach($other_cus as $k=>$v){
	$field=array("db"=>$_POST["db"],"item_id"=>$_POST["id"],"cus_id"=>$v['cus_id'],"status"=>0);
	doInsert($field,"ambit_won_lost");	
	}
	$vendor_id=seeMoreDetails("uploader","add_general_items",array("agi_id"=>$_POST["id"]));
	$to =getCusEmail($cus_id);
	$subject = "Auction";
	$txt = "Hello ".getCusName($cus_id).',';
	$headers = "From: ".getCusEmail($vendor_id) . "\r\n" ."CC: ".$to;

	mail($to,$subject,$txt,$headers);
	}
	echo 1;
}


if($msg=='stop_bid' && $_POST["db"]=='add_car_motorcycle'){
	doUpdate($_POST["db"],array("sold_status"=>1),array("acm_id"=>$_POST["id"]));
	$id_array=getDetails(doSelect("acb_id","ambit_car_bid",array(),' ORDER BY bid_price DESC LIMIT 1'));
	if(!empty($id_array)){
	$acb_id=$id_array[0]["acb_id"];
	doUpdate('ambit_car_bid',array("won"=>1),array("acb_id"=>$acb_id));
	doUpdate1('ambit_car_bid',array("won"=>2),array("acb_id !"=>$acb_id));
	$cus_id=seeMoreDetails("cus_id","ambit_car_bid",array("acb_id"=>$acb_id));
	$bid_price=seeMoreDetails("bid_price","ambit_car_bid",array("acb_id"=>$acb_id));
	
	$field=array("db"=>$_POST["db"],"item_id"=>$_POST["id"],"cus_id"=>$cus_id,"status"=>1,"price"=>$bid_price);
	doInsert($field,"ambit_won_lost");
	$other_cus=getDetails(doSelect1("cus_id","ambit_car_bid",array("cus_id !"=>$cus_id)));
	$other_cus=trimmer_db_array($other_cus);
	foreach($other_cus as $k=>$v){
	$field=array("db"=>$_POST["db"],"item_id"=>$_POST["id"],"cus_id"=>$v['cus_id'],"status"=>0);
	doInsert($field,"ambit_won_lost");	
	}
	$vendor_id=seeMoreDetails("uploader","add_car_motorcycle",array("acm_id"=>$_POST["id"]));
	$to =getCusEmail($cus_id);
	$subject = "Auction";
	$txt = "Hello ".getCusName($cus_id).',';
	$headers = "From: ".getCusEmail($vendor_id) . "\r\n" ."CC: ".$to;

	mail($to,$subject,$txt,$headers);
	}
	echo 1;
}


if($msg=='stop_listing'){
	if($_POST["db"]=="add_general_items"){
	doDelete($_POST["db"],array("agi_id"=>$_POST["id"]));
	}
	if($_POST["db"]=="add_car_motorcycle"){
	doDelete($_POST["db"],array("acm_id"=>$_POST["id"]));
	}
	echo 1;
}
?>
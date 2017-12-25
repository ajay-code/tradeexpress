<?php
//error_reporting(0);
require_once("config.php");
//require_once("../language/english.php");

function doInsert($field=array(),$table){
	 global $conn;
	$dbdata=array();
	$set=" SET ";
	if(!empty($field)){
		foreach($field as $k=>$v){
			array_push($dbdata,"`".$k."`='".mysqli_real_escape_string($conn,$v)."'");
		}
	}
	$set.=implode(",",$dbdata);
	$query="INSERT INTO ".$table.$set;
	//echo $query;
	return mysqli_query($conn,$query);
}

function newly_insert_id(){
	global $conn;
	return mysqli_insert_id($conn);
}

function doSelect($select,$table,$condition=array(),$orderBy=""){
	global $conn;
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,$k."='".mysql_real_escape_string($v)."'");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="SELECT ".$select." FROM ".$table.$where.$orderBy;
	//echo $query;
	return mysqli_query($conn,$query);
}
function doSelect1($select,$table,$condition=array(),$orderBy=""){
	global $conn;
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,$k."=".mysqli_real_escape_string($conn,$v)."");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="SELECT ".$select." FROM ".$table.$where.$orderBy;
	//echo $query;
	return mysqli_query($conn,$query);
}
function doSelect2($select,$table,$condition=array(),$orderBy=""){
	global $conn;
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,$k."=".mysqli_real_escape_string($conn,$v)."");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="SELECT ".$select." FROM ".$table.$where.$orderBy;
	//echo $query;
	//return mysql_query($query);
	return $query;
}
function selectWhereIn($select,$table,$condition=array(),$orderBy=""){
	global $conn;
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,$k." IN(".mysqli_real_escape_string($conn,$v).")");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="SELECT ".$select." FROM ".$table.$where.$orderBy;
	//echo $query;
	return mysqli_query($conn,$query);
}
function doSelect3($query){
	global $conn;
	//echo $query;
	return mysqli_query($conn,$query);
}

function loginCheck($query){
	$dbdata=array();
	$rows=mysqli_num_rows($query);
	if($rows==1){
		while($data=mysqli_fetch_assoc($query)){
			array_push($dbdata, $data);
		}
	}
	return $dbdata;
}

function session_chk_login($field=array()){
	if(empty($field)){
		return false;
	}
	$query=getDetails(doSelect("*","customer",$field));
	if(count($query)==1){
		return true;
	}else{
		return false;
	}
}

function getDetails($query){

	$dbdata=array();
	$rows=mysqli_num_rows($query);
	if($rows >= 1){
		while($data=mysqli_fetch_assoc($query)){
			array_push($dbdata, $data);
		}
	}
	return $dbdata;
}

function doUpdate($table,$field=array(),$condition=array()){
	global $conn;
	$dbdata=array();
	$set=" SET ";
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($field)){
		foreach($field as $k=>$v){
			array_push($dbdata,"`".$k."`='".mysqli_real_escape_string($conn,$v)."'");
		}
	$set.=implode(",",$dbdata);
	}
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,"`".$k."`='".mysqli_real_escape_string($conn,$v)."'");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="UPDATE ".$table.$set.$where;
	//echo $query;
	return mysqli_query($conn,$query);
}

function doUpdate1($table,$field=array(),$condition=array()){
	global $conn;
	$dbdata=array();
	$set=" SET ";
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($field)){
		foreach($field as $k=>$v){
			array_push($dbdata,"`".$k."`='".mysqli_real_escape_string($conn,$v)."'");
		}
	$set.=implode(",",$dbdata);
	}
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,$k."='".mysqli_real_escape_string($conn,$v)."'");	
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="UPDATE ".$table.$set.$where;
	//echo $query;
	return mysqli_query($conn,$query);
}

function doDelete($table,$condition=array()){
	global $conn;
	$condition1=array();
	$where=" WHERE 1 ";
	if(!empty($condition)){
		foreach($condition as $k=>$v){
		array_push($condition1,$k."='".mysqli_real_escape_string($conn,$v)."'");
		}
	$where.=" AND ".implode(" AND ",$condition1);
	}
	$query="DELETE FROM ".$table.$where;
	//echo $query;
	return mysqli_query($conn,$query);
}

function rating($rate){

			//$rate=getDetails(doSelect1("count(*) as count,SUM(rate) as sum","rating",array("rating_ho_id"=>$ho_id)));
			//$rate=getDetails(mysql_query("SELECT count(*) as count,SUM(rate) as sum FROM rating WHERE rating_ho_idin('$ho_id')"));
			if($rate[0]["count"] !=0){
			$member=$rate[0]["count"];
			$rate=$rate[0]["sum"];
			$cal=($rate/$member);
			$half=0;
			$full=0;
			$no_star=0;
			if(is_int($cal)){
				if(round($cal) < 5){
				$no_star=5-round($cal);
			}	
			return '0||'.$cal.'||'.$no_star;	
			}
			$rem=explode(".",$cal)[1];
			if($rem[0]==5){
			$half_full=1+floor($cal);
			if($half_full < 5){
				$no_star=5-$half_full;
			}
			return '1||'.floor($cal).'||'.$no_star;
			}else{
			if(round($cal) < 5){
				$no_star=5-round($cal);
			}	
				return '0||'.round($cal).'||'.$no_star;
			}
		}else{
			return '0||0||5';
		}
	}

function get_site_settings($id=""){
	$result=getDetails(doSelect1("st_value","site_settings",array("st_id"=>$id)));
	return $result[0]["st_value"];
}



function seeMoreDetails($select,$from,$where){
	$result=getDetails(doSelect1($select,$from,$where));
	if(!empty($result)){
	return $result[0][$select];
	}
}




function count_days($new_date){
$now = time();
$date = strtotime($new_date);
$datediff = $now - $date;
$day=floor($datediff / (60 * 60 * 24));
if($day==0){
	return 'Today';
}else{
	return $day." day's ago";
}
}

function getCustomerName($id){
	$name=getDetails(doSelect1("fname,lname","ambit_customer",array("ac_id"=>$id)));
	$name=$name[0]["fname"].' '.$name[0]["lname"];
	return $name;
}


function currency(){
	return '$';
}
function get_date_str($date){
	echo date("jS F, Y",strtotime($date));
}
function getRatingStar($id){
	
				$rate=getDetails(doSelect1("count(*) as count,SUM(rating) as sum","ambit_product_review",array("apr_apa_id"=>$id)));
				$a=explode("||",rating($rate));
				$half_star=$a[0];
				$full_star=$a[1];
				$no_star=$a[2];
				for($i=1;$i<=$full_star;$i++){
				echo '<span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
				}
				for($i=1;$i<=$half_star;$i++){
				echo '<span class="fa fa-stack"><i class="fa fa-star-half-o"></i><i class="fa fa-star-o fa-stack-1x"></i></span>';
				}
				for($i=1;$i<=$no_star;$i++){
				echo '<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>';
				}
				
}
function fileDelete($field,$from,$condition,$path){
	$prev_image=getDetails(doSelect($field,$from,$condition));
	if(!empty($prev_image)){
		foreach($prev_image as $k=>$v){
			$file=$v[$field];
			if(file_exists($path.$file)){
			unlink($path.$file);
			}
		}			
	}
	return true;	
}


function getGeneralItemTitle($agi_id){
	return trim(seeMoreDetails("listing_title","add_general_items",array("agi_id"=>$agi_id)));
}
function getGeneralItemCategory($gic_id){
	return trim(seeMoreDetails("category","general_item_category",array("gic_id"=>$gic_id)));
}
function getGeneralItemLabel($gcef_id){
	return trim(seeMoreDetails("label_name","general_cat_extra_field",array("gcef_id"=>$gcef_id)));
}

function getPropertyTitle($ap_id){
	return trim(seeMoreDetails("listing_title","add_property",array("ap_id"=>$ap_id)));
}
function getPropertyCategory($pc_id){
	return trim(seeMoreDetails("category","property_category",array("pc_id"=>$pc_id)));
}
function getPropertyLabel($pcef_id){
	return trim(seeMoreDetails("label_name","property_cat_extra_field",array("pcef_id"=>$pcef_id)));
}
function getJobTitle($aj_id){
	return trim(seeMoreDetails("listing_title","add_job",array("aj_id"=>$aj_id)));
}
function getJobCategory($jc_id){
	return trim(seeMoreDetails("category","job_category",array("jc_id"=>$jc_id)));
}
function getJobLabel($jcef_id){
	return trim(seeMoreDetails("label_name","job_cat_extra_field",array("jcef_id"=>$jcef_id)));
}
function getCarTitle($acm_id){
	return trim(seeMoreDetails("listing_title","add_car_motorcycle",array("acm_id"=>$acm_id)));
}
function getCarCategory($cc_id){
	return trim(seeMoreDetails("category","car_category",array("cc_id"=>$cc_id)));
}
function getCarLabel($ccef_id){
	return trim(seeMoreDetails("label_name","car_cat_extra_field",array("ccef_id"=>$ccef_id)));
}



function getCountryName($id){
	return trim(seeMoreDetails("cn_name","ambit_country",array("cn_id"=>$id)));
}
function getCityName($id){
	return trim(seeMoreDetails("ct_name","ambit_city",array("ct_id"=>$id)));
}
function getRegionName($id){
	return trim(seeMoreDetails("region","ambit_region",array("ar_id"=>$id)));
}
function getCityIdByRegion($id){
	return trim(seeMoreDetails("ct_id","ambit_region",array("ar_id"=>$id)));
}
function getCountryIdByCity($id){
	return trim(seeMoreDetails("ct_cn_id","ambit_city",array("ct_id"=>$id)));
}

function addDaysWithDate($date,$days){
    $date = strtotime("+".$days." days", strtotime($date));
    return  date("Y-m-d", $date);
}
function trimmer($field){
	$field1=array();
	foreach($field as $k=>$v){
		$field1[trim($k)]=trim($v);
	}
	return $field1;
}
function trimmer_db_array($field){
	$field1=array();
	foreach($field as $k1=>$v1){
		foreach($v1 as $k=>$v){
		$field1[trim($k)]=trim($v);
		}
		$field[trim($k1)]=$field1;
	}
	return $field;
}

function is_price_currency($price){
	if($price == '0' || $price == ""){
	$ret_price="";
}else{
	$ret_price=$price;
	if (is_numeric($ret_price)) {
	$ret_price=currency().$ret_price;	
		}
	 }
	return $ret_price;
}


function show_price_classifiedDb($for_what){
	$ret_price=0;
	$price_list=getDetails(doSelect("apfc_id,for_what,price,min_price,max_price","add_price_for_classified",array("for_what"=>$for_what,"status"=>1)));
	$price_list=trimmer_db_array($price_list);
	if(!empty($price_list)){
	foreach($price_list as $k=>$v){
	extract($v);	
	}
	if($price !=""){
		$ret_price=is_price_currency($price);
	}else if($min_price >= '0' && $max_price > '0'){
		$ret_price=is_price_currency($min_price).' - '.is_price_currency($max_price); 
	}else{
		$ret_price="";
	}
	}
	return $ret_price;
}

function show_price_listingDb($for_what){
	$price_list=getDetails(doSelect("apfl_id,for_what,price,term,min_price,max_price,price_term,rent_term,rent_min,rent_max","add_price_for_listing",array("for_what"=>$for_what,"status"=>1)));
	$price_list=trimmer_db_array($price_list);
	$ret_price="";
	if(!empty($price_list)){
	foreach($price_list as $k=>$v){
	extract($v);
	}
	if($price !=""){
		$ret_price=is_price_currency($price).' '.$term;
	}else if($min_price >= '0' && $max_price > '0'){
		$ret_price=is_price_currency($min_price).' - '.is_price_currency($max_price).' '.$price_term; 
	}else{
		$ret_price=is_price_currency($rent_min).' - '.is_price_currency($rent_max).' '.$rent_term; 
	}
	}
	return $ret_price;
}

function show_price_classifiedDb_numeric($for_what){
	$price_list=getDetails(doSelect("apfc_id,for_what,price,min_price,max_price","add_price_for_classified",array("for_what"=>$for_what,"status"=>1)));
	$price_list=trimmer_db_array($price_list);
	if(!empty($price_list)){
	foreach($price_list as $k=>$v){
	extract($v);	
	}
	if($price !=""){
		$ret_price=$price;
	}else if($min_price >= '0' && $max_price > '0'){
		$ret_price=$min_price.' - '.$max_price; 
	}else{
		$ret_price="";
	}
	}
	return $ret_price;
}

function show_price_listingDb_numeric($for_what){
	$price_list=getDetails(doSelect("apfl_id,for_what,price,term,min_price,max_price,price_term,rent_term,rent_min,rent_max","add_price_for_listing",array("for_what"=>$for_what,"status"=>1)));
	$price_list=trimmer_db_array($price_list);
	$ret_price="";
	if(!empty($price_list)){
	foreach($price_list as $k=>$v){
	extract($v);
	}
	if($price !=""){
		$ret_price=$price;
	}else if($min_price >= '0' && $max_price > '0'){
		$ret_price=$min_price.' - '.$max_price; 
	}else{
		$ret_price=$rent_min.' - '.$rent_max; 
	}
	}
	return $ret_price;
}

function string_display($string,$start_pos,$end_pos){
	$length=strlen($string);
	$string=substr($string,$start_pos,$end_pos);
	if($length > $end_pos){
		return $string.'';
	}else{
		return $string;
	}
}

function total_general_item_by_cat($cat_id){
	$query=doSelect2("count(*) as count","add_general_items",array("status"=>1));
	$query.=' AND (cat_id='.$cat_id.' OR cat1_id='.$cat_id.')';
	$result=getDetails(doSelect3($query));
	return $result[0]['count'];	
}
function total_general_item_by_sub_cat($sub_cat_id){
	$query=doSelect2("count(*) as count","add_general_items",array("status"=>1));
	$query.=' AND (sub_cat_id='.$sub_cat_id.' OR sub_cat1_id='.$sub_cat_id.')';
	$result=getDetails(doSelect3($query));
	return $result[0]['count'];	
}
function total_general_item_by_sub_sub_cat($sub_sub_cat_id){
	$query=doSelect2("count(*) as count","add_general_items",array("status"=>1));
	$query.=' AND (sub_sub_cat_id='.$sub_sub_cat_id.' OR sub_sub_cat1_id='.$sub_sub_cat_id.')';
	$result=getDetails(doSelect3($query));
	return $result[0]['count'];	
}
function total_general_item_by_sub_sub_sub_cat($sub_sub_sub_cat_id){
	$query=doSelect2("count(*) as count","add_general_items",array("status"=>1));
	$query.=' AND (sub_sub_sub_cat_id='.$sub_sub_sub_cat_id.' OR sub_sub_sub_cat1_id='.$sub_sub_sub_cat_id.')';
	$result=getDetails(doSelect3($query));
	return $result[0]['count'];	
}
function total_property_by_cat($cat_id){
	return trim(seeMoreDetails("count(*)","add_property",array("status"=>1,"cat_id"=>$cat_id)));
}
function total_property_by_sub_cat($sub_cat_id){
	return trim(seeMoreDetails("count(*)","add_property",array("status"=>1,"sub_cat_id"=>$sub_cat_id)));
}
function total_property_by_sub_sub_cat($sub_sub_cat_id){
	return trim(seeMoreDetails("count(*)","add_property",array("status"=>1,"sub_sub_cat_id"=>$sub_sub_cat_id)));
}
function total_job_by_cat($cat_id){
	return trim(seeMoreDetails("count(*)","add_job",array("status"=>1,"cat_id"=>$cat_id)));
}
function total_job_by_sub_cat($sub_cat_id){
	return trim(seeMoreDetails("count(*)","add_job",array("status"=>1,"sub_cat_id"=>$sub_cat_id)));
}
function total_job_by_sub_sub_cat($sub_sub_cat_id){
	return trim(seeMoreDetails("count(*)","add_job",array("status"=>1,"sub_sub_cat_id"=>$sub_sub_cat_id)));
}
function total_car_by_cat($cat_id){
	$query=doSelect2("count(*) as count","add_car_motorcycle",array("status"=>1));
	$query.=' AND (cat_id='.$cat_id.' OR cat1_id='.$cat_id.')';
	$result=getDetails(doSelect3($query));
	return $result[0]['count'];
}
function total_car_by_sub_cat($sub_cat_id){
	$query=doSelect2("count(*) as count","add_car_motorcycle",array("status"=>1));
	$query.=' AND (sub_cat_id='.$sub_cat_id.' OR sub_cat1_id='.$sub_cat_id.')';
	$result=getDetails(doSelect3($query));
	return $result[0]['count'];
}
function total_car_by_sub_sub_cat($sub_sub_cat_id){
	$query=doSelect2("count(*) as count","add_car_motorcycle",array("status"=>1));
	$query.=' AND (sub_sub_cat_id='.$sub_sub_cat_id.' OR sub_sub_cat1_id='.$sub_sub_cat_id.')';
	$result=getDetails(doSelect3($query));
	return $result[0]['count'];
}

function getAdminName(){
	return seeMoreDetails("full_name","admin",array());
}
function getAdminEmail(){
	return seeMoreDetails("email","admin",array());
}
function getAdminImage(){
	return seeMoreDetails("image","admin",array());
}
function getCusName($ar_id){
	return trim(seeMoreDetails("name","ambit_registration",array("ar_id"=>$ar_id)));
}

function total_submission_by_cus($ar_id){
	$counter=0;
	$a=trim(seeMoreDetails("count(*)","add_car_motorcycle",array("uploader"=>$ar_id)));
	$b=trim(seeMoreDetails("count(*)","add_job",array("uploader"=>$ar_id)));
	$c=trim(seeMoreDetails("count(*)","add_property",array("uploader"=>$ar_id)));
	$d=trim(seeMoreDetails("count(*)","add_general_items",array("uploader"=>$ar_id)));
	$counter=$a+$b+$c+$d;
	return $counter;
}

function getCusEmail($ar_id){
	return trim(seeMoreDetails("email","ambit_registration",array("ar_id"=>$ar_id)));
}

function check_watch_list($db_name,$field){
	$check=getDetails(doSelect("*",$db_name,$field));
	if(!empty($check)){
		return true;
	}else{
		return false;
	}
	
}

function getItemReviewNumber($db,$item){
	return trim(seeMoreDetails("count(*)",$db,array("status"=>1,"item_id"=>$item)));
}

function get_facebook_cus($cus_id){
	$link=getDetails(doSelect("link","ambit_cus_social_media",array("cus_id"=>$cus_id,"acnt_type"=>"Facebook")));
	if(!empty($link)){
	return trim($link[0]["link"]);
	}else{
		return '';
	}
}
function get_twitter_cus($cus_id){
	$link=getDetails(doSelect("link","ambit_cus_social_media",array("cus_id"=>$cus_id,"acnt_type"=>"Twitter")));
	if(!empty($link)){
	return trim($link[0]["link"]);
	}else{
		return '';
	}
}
function get_google_plus_cus($cus_id){
	$link=getDetails(doSelect("link","ambit_cus_social_media",array("cus_id"=>$cus_id,"acnt_type"=>"Google +")));
	if(!empty($link)){
	return trim($link[0]["link"]);
	}else{
		return '';
	}
}
function get_linked_in_cus($cus_id){
	$link=getDetails(doSelect("link","ambit_cus_social_media",array("cus_id"=>$cus_id,"acnt_type"=>"LinkedIn")));
	if(!empty($link)){
	return trim($link[0]["link"]);
	}else{
		return '';
	}
}

function get_cus_acnt_balance($ar_id){
	return seeMoreDetails("balance","cus_acnt_blnce",array("cus_id"=>$ar_id));
}
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

function chk_genrl_itm_fld_exist($field,$agi_id){
	return trim(seeMoreDetails($field,"add_general_items",array("agi_id"=>$agi_id)));
}

function chk_car_fld_exist($field,$acm_id){
	return trim(seeMoreDetails($field,"add_car_motorcycle",array("acm_id"=>$acm_id)));
}

function chk_car_listing_fld_exist($field,$acm_id){
	return trim(seeMoreDetails($field,"add_car_motorcycle_listing_features",array("acm_id"=>$acm_id)));
}
function check_job_applied($aj_id,$cus_id){
	$apply=trim(seeMoreDetails("aja_id","ambit_job_apply",array("aj_id"=>$aj_id,"cus_id"=>$cus_id)));
	if($apply!=""){
		return true;
	}else{
		return false;
	}
	}
function higest_bid_car($acm_id){
	$bid=trim(seeMoreDetails("MAX(bid_price)","ambit_car_bid",array("acm_id"=>$acm_id)));
	if($bid==""){
		return trim(seeMoreDetails('start_price','add_car_motorcycle',array("acm_id"=>$acm_id)));
	}else{
		return $bid;
	}
	}
function higest_bid_general_item($agi_id){
	$bid=trim(seeMoreDetails("MAX(bid_price)","ambit_general_item_bid",array("agi_id"=>$agi_id)));
	if($bid==""){
		return trim(seeMoreDetails('start_price','add_general_items',array("agi_id"=>$agi_id)));
	}else{
		return $bid;
	}
	}
function check_car_featured($field,$acm_id){
	return trim(seeMoreDetails($field,"add_car_motorcycle_listing_features",array("acm_id"=>$acm_id)));
}

function get_add_car_field($field,$acm_id){
	return trim(seeMoreDetails($field,"add_car_motorcycle",array("acm_id"=>$acm_id)));
}
?>
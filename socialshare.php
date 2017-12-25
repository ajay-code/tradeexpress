<?php
session_start();
require_once("function.php");
$SocialShare = $_GET['socialshare']; // facebook,twitter
$PostID = trim($_GET["id"]);
$select="ap_id,uploader,cat_id,sub_cat_id,sub_sub_cat_id,listing_title,listing_duration,street,posting_date,unit_flat,street_name,region,rateable_value,rateable_value_hide,expected_sale_price,bedroom,bathroom,floor_area,land_area,open_home_date,open_home_strt_time,open_home_end_time,prop_desc,parking,amenities,smoke_alarm,agency_reference,Posting_status,classified_status,status, contact_type, name, agent_email, mobile, website_address, name2, email_address2, agency, landline, landline2, mobile2, logo,view_counter";
$from="add_property";

$PHPSELF = $_SERVER['PHP_SELF'];
$condition=array("ap_id"=>$PostID);
$property_detls=getDetails(doSelect1($select,$from,$condition));
$property_detls=trimmer_db_array($property_detls);
$PropertyTitle = getPropertyTitle(trim($_GET["id"]));
foreach($property_detls as $k=>$v){
	$ImageCounter = 1;
	$listing_img = '';
	$property_image=getDetails(doSelect("image","add_property_photo",array("ap_id"=>$v["ap_id"],"status"=>1)));
	foreach($property_image as $k2=>$v2){
		if($ImageCounter == 1 ){
			 $listing_img = 'https://www.tradeexpress.co.nz/property_image/'.$v2["image"];
		}
		break;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if( $SocialShare == 'twitter' ){ ?>
 	 <meta name="twitter:card" content="summary">
	 <meta name="title" content="<?php echo $ShareablePropertyTitle; ?>" />
	 <meta name="description" content="<?php echo $ShareablePropertyDescription ; ?>" />
	 <meta name="twitter:card" content="summary">
	 <meta name="twitter:site" content="https://www.tradeexpress.co.nz/">
	 <meta name="twitter:title" content="<?php echo $ShareablePropertyTitle?>">
	 <meta name="twitter:description" content="<?php echo $ShareablePropertyDescription?>">
	 <meta name="twitter:image" content="<?php echo $listing_img?>">
	 <meta name="twitter:domain" content="https://www.tradeexpress.co.nz">
	<script>
		window.location  = 'https://twitter.com/home?status=<?php echo urlencode("https://www.tradeexpress.co.nz/property_details.php?id=".$PostID); ?>'
	</script>
<?php }else if( $SocialShare == 'facebook' ){ ?>
	  <title><?php echo $ShareablePropertyTitle; ?>-<?php echo $ShareablePropertyDescription ; ?></title>
	  <meta property="og:url"         content="https://www.tradeexpress.co.nz/property_details.php?id=<?php echo $PostID;?>" />
	  <meta property="og:type"        content="website" />
	  <meta property="og:title"       content="<?php echo $ShareablePropertyTitle; ?>" />
	  <meta property="og:description" content="<?php echo $ShareablePropertyDescription ; ?>" />
	  <meta property="og:image"    content="<?php echo  $listing_img; ?>" />
	   <meta property="og:image:alt"    content="<?php echo $ShareablePropertyTitle; ?>" />
	  <meta name="title" content="<?php echo $ShareablePropertyTitle; ?>" />
	  <meta name="description" content="<?php echo $ShareablePropertyDescription ; ?>" />
	<script>
	window.location =  'https://www.facebook.com/sharer.php?u=<?php echo urlencode("https://www.tradeexpress.co.nz/property_details.php?id=".$PostID); ?>'
	</script>
<?php } ?>
</head>
<body>
<center>Please wait while sharing url to social sharing....</center>
</body>
</html>
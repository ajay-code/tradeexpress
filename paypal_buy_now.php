<?
require_once("function.php");
$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value)
{
	$value = urlencode(stripslashes($value));
	$req .= '&' . $key . '=' . $value;
}
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
// If testing on Sandbox use: 
//$header .= "Host: www.sandbox.paypal.com:443\r\n";
$header .= "Host: www.paypal.com:443\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);


$payment_status = $_POST['payment_status'];
$amount = $_POST['mc_gross'];
$pay_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$custom = explode("||",$_POST['custom']);
$table_name=$custom[0];
$item_id=$custom[1];
$cus_id=$custom[2];

if (!$fp)
{
$checkpay="no";
	$error_output = $errstr . ' (' . $errno . ')';
}
else
{
	fputs ($fp, $header . $req);
	while (!feof($fp))
	{
		$res = fgets ($fp, 1024);
		if (strcmp ($res, "VERIFIED") == 0)
		{
$checkpay="yes";

		}
	}
	fclose ($fp);
}

if($checkpay=="yes")
{
$date=date("Y-m-d h:i:s");

$item_amount=trim(seeMoreDetails("buy_now",$table_name,array("agi_id"=>$item_id)));
if($amount==$item_amount){
$field=array("transaction_id"=>$txn_id,"table_name"=>$table_name,"item_id"=>$item_id,"cus_id"=>$cus_id,"amount"=>$amount,"status"=>1,"date"=>$date);
doInsert($field,"paypal_buy_now");	
}else{
$field=array("transaction_id"=>$txn_id,"table_name"=>$table_name,"item_id"=>$item_id,"cus_id"=>$cus_id,"amount"=>$amount,"status"=>0,"date"=>$date);
doInsert($field,"paypal_buy_now");	
}
	//code


//code
}
?>
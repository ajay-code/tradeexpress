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
$cus_id = $_POST['custom'];

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
$field=array("cus_id"=>$cus_id,"transaction_id"=>$txn_id,"amount"=>$amount,"date"=>$date,"transaction_by"=>"Paypal","type"=>"1");
doInsert($field,"paypal_transaction_table");
$cus_balnce=trim(seeMoreDetails("balance","cus_acnt_blnce",array("cus_id"=>$cus_id)));
$total_balance=$cus_balnce+$amount;
doUpdate("cus_acnt_blnce",array("balance"=>$total_balance),array("cus_id"=>$cus_id));
	//code


//code
}
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "./vendor/autoload.php";

$mail = new PHPMailer;

//Enable SMTP debugging. 
//$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//For the local testing
/*$mail->Host = "smtp.mailtrap.io";
$mail->SMTPAuth = true;                          
$mail->Username = "af4a33499716be";                 
$mail->Password = "7fcc818b903e90";                           
$mail->SMTPSecure = "tls";                           
$mail->Port = 2525;  */

 //For the mail client 

include("mail_client.php");                               

$mail->From = "trade_express@bulafaces.com";
$mail->FromName = "Trade Express";

$mail->addAddress($seller_email, $seller_name);

$mail->isHTML(true);

$mail->Subject = "Item Sold: Trade Express";
ob_start();                      // start capturing output
include('product_sold_mail_html.php');   // execute the file
$mailcontent = ob_get_contents();    // get the contents from the buffer
$mail->Body = $mailcontent;
$mail->AltBody = "Item Sold By Team Trade Express";
ob_end_clean();        

if(!$mail->send()) 
{
    // echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    // echo "Mail Sent";
}
?>
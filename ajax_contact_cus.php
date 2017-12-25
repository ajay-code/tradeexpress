<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);

if($_POST["agent"]=="admin"){
	$to=getAdminEmail();
}else{
	$to=getCusEmail($_POST["agent"]);
}

ini_set('SMTP','myserver');
ini_set('smtp_port',25);
$to = $to;
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers  .= "From: NO-REPLY<".$_POST["email"].">" . "\r\n";
$subject = "Query about item";
$message = '<html>
                <body>
                    <p>Hi i am,'.$_POST["name"].'</p>
                    <p>'.
                     $_POST["message"]   
                    .'</p>
                    
                    <p>
                    Thanks<br>
                    </p>
                </body>
            </html>';
$status=mail( $to, $subject, $message, $headers ); 
if($status){
	echo 1;
}else{
	echo 0;
}
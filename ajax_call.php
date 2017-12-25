<?php
session_start();
require_once("function.php");
/*ini_set('SMTP','myserver');
ini_set('smtp_port',25);*/
$sendact = $_POST['sendact'];
if( $sendact != "" ){
     switch( $sendact ){
	     case 'email_frnd':{
		 	 $post_id = $_POST['post_id'];  
 			 $link_url  = $_POST['link_url']; 
			 $send_to_Frnd_pid   = $_POST['send_to_Frnd_pid'];
			 $sendact   = $_POST['sendact'];
			 $to_name_friend  = $_POST['to_name_friend']; 
			 $to_friend_email  = $_POST['to_friend_email']; 
			 $yourname   = $_POST['yourname'];
			 $youremail   = $_POST['youremail'];
			 $frnd_subject   = $_POST['frnd_subject'];
			 $frnd_comments  = $_POST['frnd_comments'];
			 $IsValidated = true;
			 $ErrorMessage = ""; 
			 if( $to_name_friend == "" ){
			   $IsValidated = false;
			   $ErrorMessage = "Please enter name of friend<br/>";
			 }
			 if( $to_friend_email == "" ){
			    $IsValidated = false;
			    $ErrorMessage .= "Please enter friend's email<br/>";
			 }else{
				if (filter_var($to_friend_email, FILTER_VALIDATE_EMAIL)) {
					//echo("$email is a valid email address");
				} else {
					//echo("$email is not a valid email address");
					$IsValidated = false;
			   	    $ErrorMessage .= "Please enter valid email for friend<br/>";
				}
			 }
			  if( $yourname == "" ){
			   $IsValidated = false;
			   $ErrorMessage .= "Please enter your name<br/>";
			 }
			 if( $youremail == "" ){
			    $IsValidated = false;
			    $ErrorMessage .= "Please enter your email<br/>";
			 }else{
				if (filter_var($youremail, FILTER_VALIDATE_EMAIL)) {
					//echo("$email is a valid email address");
				} else {
					//echo("$email is not a valid email address");
					$IsValidated = false;
			   	    $ErrorMessage .= "Please enter valid your email<br/>";
				}
			 }
			 if( $frnd_subject == "" ){
			    $IsValidated = false;
			    $ErrorMessage .= "Please enter subject<br/>";
			 }
			 if( $frnd_comments == "" ){
			   $IsValidated = false;
			   $ErrorMessage .= "Please enter comments<br/>";
			 }
			 if( $IsValidated ){
					$EmailMessage = "Hello ".$to_name_friend.", <br/><br/>";
					$EmailMessage .= "A property has bene shared by your friend <strong>".$yourname."</strong>, Please click <a href='".$link_url."'>here</a> to view property<br/><br/>";
					$EmailMessage .= "Your friend's comment <br/><br/>";
					$EmailMessage .= $frnd_comments;
					$headers  = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
					$headers  .= "From: NO-REPLY<".$youremail.">" . "\r\n";
					$subject = "Sharing Property With Friend";
					$EmailTemplate = file_get_contents("email_templates/email_template.php");
					$message = '<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
						<tr>
							<td valign="top" style="padding-bottom:15px; background-color:#ffffff;">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" style="padding-bottom:20px; background-color:#ffffff;">'.$EmailMessage.'</td>
						</tr>
					</table>';
					$EmailTemplate = str_replace('{{email_body_content}}',$message,$EmailTemplate);
  					$status=mail( $to_friend_email, $frnd_subject, $EmailTemplate, $headers ); 
					
					if($status){
						 echo "<div class='alert alert-success fade in alert-dismissable'>".'<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'."Property shared with your friend ".$to_name_friend."</div>";
					}else{
 						  echo "<div class='alert alert-danger fade in alert-dismissable'>".'<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'."Problem while sending email</div>";
					}
			 }else{
 				 echo "<div class='alert alert-danger fade in alert-dismissable'>".'<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'.$ErrorMessage."</div>";
			 }
		 	 break;
		}	 
		 case 'send_enquiry':{
			if($_POST["uploader"]=="admin"){
				$to=getAdminEmail();
			}else{
				$to=getCusEmail($_POST["uploader"]);
			}
			 $post_id = $_POST['post_id'];  
			 $sendact  = $_POST['sendact'];
 			 $request_uri   = $_POST['request_uri'];
			 $full_name   = $_POST['full_name'];
			 $your_iemail   = $_POST['your_iemail'];
			 $contact_number   = $_POST['contact_number'];
			 $inq_subject   = $_POST['inq_subject'];
			 $inq_msg  = $_POST['inq_msg'];
			 $IsValidated = true;
			 $ErrorMessage = ""; 
			 if( $full_name == "" ){
			   $IsValidated = false;
			   $ErrorMessage = "Please enter full name<br/>";
			 }
			 if( $your_iemail == "" ){
			   $IsValidated = false;
			   $ErrorMessage = "Please enter your email<br/>";
			 }
			 if( $your_iemail == "" ){
			   $IsValidated = false;
			   $ErrorMessage = "Please enter your email<br/>";
			 }
			 if( $contact_number == "" ){
			   $IsValidated = false;
			   $ErrorMessage = "Please enter contact number<br/>";
			 }
			  if( $inq_subject == "" ){
			   $IsValidated = false;
			   $ErrorMessage = "Please enter subject<br/>";
			 }
			  if( $inq_msg == "" ){
			   $IsValidated = false;
			   $ErrorMessage = "Please enter your query<br/>";
			 }
 			 if( $IsValidated ){
					$EmailMessage = "Hello <br/>";
					$EmailMessage .= "An enquiry has been posted by website user please have a look at the following details<br/><br/>";
					$EmailMessage .= "Enquiry Regarding Property URL ".$request_uri."<br/><br/>";
					$EmailMessage .= "Name ".$full_name."<br/><br/>";
					$EmailMessage .= "Email ".$your_iemail."<br/><br/>";
					$EmailMessage .= "Contact No. ".$contact_number."<br/><br/>";
					$EmailMessage .= "Subject : ".$inq_subject."<br/><br/>";
					$EmailMessage .= "Message : ".$inq_msg."<br/><br/>";
 					$headers  = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
					$headers  .= "From: NO-REPLY<contact@scriptsbundle.com>" . "\r\n";
					$subject = "Enquery posted by ".$full_name;
					$EmailTemplate = file_get_contents("email_templates/email_template.php");
					$message = '<table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
						<tr>
							<td valign="top" style="padding-bottom:15px; background-color:#ffffff;">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" style="padding-bottom:20px; background-color:#ffffff;">'.$EmailMessage.'</td>
						</tr>
					</table>';
					$EmailTemplate = str_replace('{{email_body_content}}',$message,$EmailTemplate);
					//$to=getAdminEmail();
					$status=mail( $to, $inq_subject, $EmailTemplate, $headers ); 
					
					if($status){
 						  echo "<div class='alert alert-success fade in alert-dismissable'>".'<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'."Enquiry has been posted</div>";
					}else{
					     echo "<div class='alert alert-danger fade in alert-dismissable'>".'<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'."Problem while sending email</div>";
					}
			 }else{
			 	 echo "<div class='alert alert-danger fade in alert-dismissable'>".'<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'.$ErrorMessage."</div>";
			 }
		 	 break;
		}	 
	 }
}
exit;
?>
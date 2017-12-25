	
<script>
function contact_admin(){
	//alert("sidd");
	var path='<?php echo basename($_SERVER["REQUEST_URI"]);  ?>';  	
	$.post(
	'check_login.php',
	{path:path},
	function (r){
	if(r==1){
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var name=$("#your_name").val().trim();
	var email=$("#your_email").val().trim();
	var subject=$("#your_subject").val().trim();
	var message=$("#your_message").val().trim();	
	
	if(name==""){
	required_alert('Name Required.. !!!','bottom-right','warning');
	blank_focus('your_name');
	return false;
	}
	
	if(email==""){
	required_alert('Email Required.. !!!','bottom-right','warning');
	blank_focus('your_email');
	return false;
	}
	if(!regex.test(email)){
    required_alert('Email Invalid.. !!!','bottom-right','warning');
	blank_focus('your_email');
     return false;
    }
	if(subject==""){
	required_alert('Subject Required.. !!!','bottom-right','warning');
	blank_focus('your_subject');
	return false;
	}
	
	if(message==""){
	required_alert('Message Required.. !!!','bottom-right','warning');
	blank_focus('your_message');
	return false;
	}
	
		$.post(
		'ajax_admin_contact.php',
		{name:name,email:email,subject:subject,message:message},
		function(r){	
		if(r==1){
		required_alert('Mail sent successfully..','bottom-right','info');
		blank_focus('your_name');
		blank_focus('your_email');
		blank_focus('your_subject');
		blank_focus('your_message');
		}else{
		required_alert('Something went wrong!!!','bottom-right','warning');
		}	
		}
		);
		
		}else{
		window.location="login.php";
		}
	}
	);
}

</script>	
		<div id="supreme_contact_widget-1" class="widget contact_us"><div class="widget-wrap widget-inside">			<div class="widget contact_widget" id="contact_widget">
			<h3 class="widget-title">Contact Us</h3>			
			
		<form action="javascript:void(0);" method="post" id="contact_widget_frm" name="contact_frm" class="wpcf7-form">
			<div class="form_row ">
				  <input type="text" name="your_name" id="your_name" value="" class="textfield" size="40" placeholder="Name*" />
			</div>
			<div class="form_row ">
				  <input type="text" name="your_email" id="your_email" value="" class="textfield" size="40" placeholder="Email*"/>
			</div>
			<div class="form_row ">
				  <input type="text" name="your_subject" id="your_subject" value="" size="40" class="textfield" placeholder="Subject*"/>
			</div>
			<div class="form_row clearfix">
				  <textarea name="your_message" id="your_message" cols="40" class="textarea textarea2" rows="10" placeholder="Message"></textarea>
			</div>
				<div class="clearfix">
				  							<div  id="contact_recaptcha_div"></div>
							<script>
								var onloadCallback = function() {
									if(jQuery('#contact_recaptcha_div').length > 0){
										grecaptcha.render('contact_recaptcha_div', {
											'sitekey' : '6LedJQ4TAAAAACtihu6vk5X9y4HW_KDEp6OwYU0N',
											'theme' : 'standard'
										});
									}
								}	
							</script>
							
				<input type="submit" value="Send" onclick="contact_admin();" class="b_submit" />
				</div>
			</form>
			</div>
			</div>
		</div>
			
			
	
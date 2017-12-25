<?php
include_once("footer_main.php");
?>
<!-- #footer -->
</div>
	<!-- Login form -->
	<div id="tmpl_reg_login_container" class="reveal-modal tmpl_login_frm_data" data-reveal>
		<a href="javascript:;" class="modal_close"></a>
		<div id="tmpl_login_frm" > 
			<div class="login_form_l"><h3>Sign In</h3>			<div class="login_form_box">
			
            					<form name="popup_login" id="popup_login" action="classifieds/" method="post" >
                <p style="text-align: center;color: red;">This socials login not configured for this demo site.</p>					<input type="hidden" name="action" value="login" />                         
					<div class="form_row clearfix">
						<label>Username <span class="indicates">*</span> </label>
						<input type="text" name="log" id="user_login" value="" size="20" class="textfield" />
						<span id="user_loginInfo"></span> 
					</div>
					
					<div class="form_row clearfix">
						<label> Password <span class="indicates">*</span> </label>
						<input type="password" name="pwd" id="user_pass" class="textfield" value="" size="20"  />
						<span id="user_passInfo"></span> 
					</div>
					<input type="hidden" name="redirect_to" value="" />
					<input type="hidden" name="testcookie" value="1" />
					<div class="form_row rember clearfix">
					<label>
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" class="fl" />
						Remember me on this computer 
					</label>	
					
					 <!-- html to show social login -->
                    <a onClick="showhide_forgetpw('popup_login');" href="javascript:void(0)" class="lw_fpw_lnk">Forgot your password?</a> 
				    </div>
				 	
					<div class="form_row ">
				    <input class="b_signin_n" type="submit" value="Sign In"  name="submit" />		
					<p class="forgot_link">
								
					</p>
				    </div> 
					
					 
							
				</form>
								
					
	<div  class='forgotpassword' id="lostpassword_form" style="display:none;" >
	<h3>Forgot password</h3>
	<form name="popup_login_forgot_pass" id="popup_login_forgot_pass" action="classifieds/" method="post" >
			<input type="hidden" name="action" value="lostpassword" />
		<div class="form_row clearfix">
		<label> Email: </label>
		<input type="text" name="user_login" id="user_login_email"  value="" size="20" class="textfield" />
			 <span id="forget_user_email_error" class="message_error2"></span>
				</div>
		<input type="hidden" name="pwdredirect_to" value="" />
		<input type="submit" name="get_new_password" onClick="return forget_email_validate('popup_login_forgot_pass');" value="Get New Password" class="b_signin_n " />
	</form>
	</div>
   
			</div>
			<!-- Enable social media(gigya plugin) if activated-->         
						<!--End of plugin code-->
			
			<script  type="text/javascript" async >
				function showhide_forgetpw(form_id)
				{
					jQuery(document).on('click','form#'+form_id+' .lw_fpw_lnk', function(e){
						jQuery(this).closest('form#'+form_id).next().show();
						e.preventDefault();
						return false;
					});
				}
			</script>
		</div>		</div>
		
				
	</div>
					<link rel='stylesheet' id='jQuery_datepicker_css-css'  href='images/jquery.ui.all.min.css' type='text/css' media='all' />
<script type='text/javascript' src='images/core.min.js'></script>
<script type='text/javascript' src='images/widget.min.js'></script>
<script type='text/javascript' src='images/tabs.min.js'></script>
<script type='text/javascript' src='images/jquery.blockui.min.js'></script>
<script type='text/javascript' src='images/woocommerce.min.js'></script>
<script type='text/javascript' src='images/_supreme.min.js'></script>
<script type='text/javascript' src='images/wp-embed.min.js'></script>
<script type='text/javascript' src='images/position.min.js'></script>
<script type='text/javascript' src='images/menu.min.js'></script>
<script type='text/javascript' src='images/wp-a11y.min.js'></script>
<script type='text/javascript' src='images/autocomplete.min.js'></script>
<script type='text/javascript' src='images/tevolution-script.min.js'></script>
<script type='text/javascript' src='images/bootstrap-mini.js'></script>
       		<script id="tmpl-foundation" src="images/foundation.min.js"> </script>
<style type="text/css">
.by_this_theme_fix {display: none;}
@media only screen and (min-width: 1024px) {
 .by_this_theme_fix {background-color: #4DC46F;color:#fff;position: fixed;bottom: 80px;right: 80px;z-index: 99999;display: inline-block;text-align:center;border-radius: 3px%;-webkit-border-radius: 3px; -moz-border-radius: 3px; box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15); -webkit-box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15); -moz-box-shadow: -6.772px 8.668px 16px 0px rgba(28, 30, 35, 0.15);font-size:20px;font-weight:bold;transition: all 1s ease;-webkit-transition: all 1s ease;-moz-transition: all 1s ease;-o-transition: all 1s ease;animation-name:animFadeUp; animation-fill-mode: both; animation-duration: 0.4s;animation-timing-function: ease;animation-delay: 1.5s; -webkit-animation-name: animFadeUp; -webkit-animation-fill-mode: both; -webkit-animation-duration: 0.4s;-webkit-animation-timing-function: ease;-webkit-animation-delay: 1.5s; -moz-animation-name: animFadeUp;-moz-animation-fill-mode: both; -moz-animation-duration: 0.4s;-moz-animation-timing-function: ease; -moz-animation-delay: 1.5s; -o-animation-name: animFadeUp;-o-animation-fill-mode: both;-o-animation-duration: 0.4s;-o-animation-timing-function: ease;-o-animation-delay: 1.5s; padding:8px 25px}
 .by_this_theme_fix span{font-size:16px; vertical-align: middle;}
 .by_this_theme_fix:hover{background-color:#58da7d; color:#fff;}
</style></body>
</html>
<script type="text/javascript">

  function required_alert(text,position,type,time=5000,a=false){
			toastr.options = {
                "closeButton": true,
				"progressBar":a,
                "positionClass": "toast-"+position,
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
			
			
            toastr[type](text, "Hey, <?php if(isset($_SESSION["ar_id"])) echo getCusName($_SESSION["ar_id"]); ?>",{
                timeOut: time
            })
	}
function blank_focus(id){
	$("#"+id).val("");
	$("#"+id).focus();
}

function only_number(value)
       {
          var charCode = (value.which) ? value.which : value.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
function capital(textboxid, str) {
      if (str && str.length >= 1)
      {       
          var firstChar = str.charAt(0);
          var remainingStr = str.slice(1);
          str = firstChar.toUpperCase() + remainingStr;
      }
      document.getElementById(textboxid).value = str;
  }

  function page_info_alert(){
	var info='<?php if(isset($_SESSION["info"])) { echo trim($_SESSION["info"]); unset($_SESSION["info"]); } else {echo '';}  ?>';
	if(info.trim()!=""){
	required_alert('<font color="yellow">'+info+'</font>','bottom-full-width','error','8000','true');
	}
  }
</script>
<?php
session_start();
require_once("function.php");
if(isset($_SESSION["id"]) && $_SESSION["username"]){
$admin_details=getDetails(doSelect("*","admin",array("id"=>$_SESSION["id"])));
include("include/header.php");
?>
<script type="text/javascript">
	function fetch_city(){
    var cn_id=$("#country").val();
	if(cn_id.trim()=="0"){
		$('#city').prop('disabled', true);
		return false;
	}
    $.ajax({
      url:'fetch_city.php?cn_id='+cn_id,
      type:'post',
      dataType:'text',
      cache:false,
      contentType:false,
      processData:false,
      success:function(response){
      //alert(response);
       $("#city").removeAttr("disabled");
       $("#city").html(response); 
      }
    });
  }
  
  function fetch_hotel(){
    var city=$("#city").val();
	if(city.trim()=="0"){
		$('#hotel').prop('disabled', true);
		return false;
	}
    $.ajax({
      url:'fetch_hotel.php?city='+city,
      type:'post',
      dataType:'text',
      cache:false,
      contentType:false,
      processData:false,
      success:function(response){
      //alert(response);
       $("#hotel").removeAttr("disabled");
       $("#hotel").html(response); 
      }
    });
  }

  
 function enable_image_upload(){
	$("#image").removeAttr("disabled"); 
	
 }
 function enable_button(){
	 $("#submit_button").removeAttr("disabled"); 
 }
  
$(document).ready(function() {
	
$("#add_hotel_image").on('submit',(function(e){  

var hotel=$("#hotel").val();


if(hotel.trim()=="0"){
	alert("Please Select Hotel...");
	return false;
}

	
$.ajax({
        	url: "ajax_add_hotel_image.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
			//alert(data);
			if(data==1){
				alert("Image Uploaded Successfully");
				location.reload();
			}else if(data==3){
				alert("Please Select Iamge !!!");
			}else{
				alert("Something Went Wrong !!!");
			}
		    },
		    error: function() 
	    	{
	    	}	        
	   });
	
	}));
		  
	  });  

</script>




<section id="content_wrapper">

 
<header id="topbar" class="alt">


</header>
 
 
<div class="chute chute-center">
 
<div class="row">
 
<div class="chute chute-center col-sm-12 col-xl-3"">
<div class="mw1000 center-block">
 
<div class="allcp-form">
<div class="panel">
<div class="panel-heading">
<div class="panel-title">Add Hotel Image
</div>
</div>
<div class="panel-body">
<form method="post" action="javascript:void(0);" id="add_hotel_image" enctype="multipart/form-data">


<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="country"    onchange="fetch_city();">
<option value="0">Select Country</option>
				<?php
                        $country=getDetails(doSelect("cn_id,cn_name","ambit_country",array()));
                        foreach ($country as $k => $v) {
                          # code...
                        ?>
                        <option value="<?php echo $v["cn_id"]; ?>"><?php echo $v["cn_name"];  ?></option>
                        <?php
                        }
                ?>
</select>
<i class="arrow"></i>
</label>
</div>
</div>

<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="city"  disabled   onchange="fetch_hotel();">
<option value="0">Select City</option>

</select>
<i class="arrow"></i>
</label>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="section">
<label class="field select">
<select id="hotel" name="ahi_aah_id" disabled onchange="enable_image_upload();">
<option value="0">Select Hotel</option>

</select>
<i class="arrow"></i>
</label>
</div>
</div>
<div class="col-md-6">
<div class="section">
<label class="field prepend-icon append-button file">
<span class="button">Choose Image File</span>
<input type="file" class="gui-file" name="image[]" multiple  id="image"  disabled  onclick="enable_button();">
<input type="text" class="gui-input" id="uploader1" placeholder="Select Hotel Logo">
<label class="field-icon">
<i class="fa fa-cloud-upload"></i>
</label>
</label>
</div>
</div>
</div>




<div class="row" style="margin-top:30px;">
<div class="col-md-4">
<input class="btn btn-default btn-primary" type="submit" id="submit_button" name="submit" disabled value="Upload" >
</div>
</div>
</form>
 
</div>
</div>
</div>
</div>
</div>


<div class="chute chute-center col-sm-12 col-xl-3" >
<div class="mh15 pv15 br-b br-light">
<div class="row" >
<div class="col-xs-7">
<div class="mixitup-controls ib">
<form class="controls" id="select-filters">
<div class="btn-group ib mr10">
<button type="button" class="btn btn-default hidden-xs">
<span class="fa fa-folder"></span>
</button>
<div class="btn-group mb5">
<fieldset>
<select id="filter1">
<option value="">All Folders</option>
<option value=".folder1">Folder 1</option>
<option value=".folder2">Folder 2</option>
<option value=".folder3">Folder 3</option>
</select>
</fieldset>
</div>
</div>
<div class="btn-group ib mr10 mb5">
<button type="button" class="btn btn-default hidden-xs">
<span class="fa fa-tag"></span>
</button>
<div class="btn-group">
<fieldset>
<select id="filter2">
<option value="">All Labels</option>
<option value=".label1">Label 1</option>
<option value=".label3">Label 2</option>
<option value=".label2">Label 3</option>
</select>
</fieldset>
</div>
</div>
</form>
</div>
</div>
<div class="col-xs-5 text-right">
<button type="button" id="mixitup-reset" class="btn btn-default mb5 mr5">Clear Filters</button>
<div class="btn-group mb5">
<button type="button" class="btn btn-default to-grid">
<span class="fa fa-th"></span>
</button>
<button type="button" class="btn btn-default to-list">
<span class="fa fa-navicon"></span>
</button>
</div>
</div>
</div>
<div class="mixitup-controls hidden">
<form class="controls allcp-form" id="checkbox-filters">
<fieldset class="">
<h4>Cars</h4>
<label class="option block mt10">
<input type="checkbox" value=".circle">
<span class="checkbox"></span>Circle
</label>
</fieldset>
<button id="mixitup-reset2">Clear All</button>
</form>
</div>
</div>
<div id="mixitup-container" >
<div class="filter-error-message">
<span>No items were found matching the selected filters</span>
</div>






<div class="mix label1 folder1">
<div class="panel p6 pbn">
<div class="of-h">
<img src="assets/img/pages/2.jpg" class="img-responsive" title="img_3.jpg">
<div class="row table-layout">
<div class="col-xs-8 va-m pln">
<h6>img_3.jpg</h6>
</div>
<div class="col-xs-4 text-right va-m prn">
<span class="fa fa-circle fs10 text-info ml10"></span>
</div>
</div>
</div>
</div>
</div>






</div>
</div>


</div>
 
<aside id="sidebar_right" class="nano affix">
 
<div class="sidebar-right-wrapper nano-content">
<div class="sidebar-block br-n p15">
<h6 class="title-divider text-muted mb20"> Visitors Stats
<span class="pull-right"> 2015
<i class="fa fa-caret-down ml5"></i>
</span>
</h6>
<div class="progress mh5">
<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%">
<span class="fs11">New visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%">
<span class="fs11 text-left">Returnig visitors</span>
</div>
</div>
<div class="progress mh5">
<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
<span class="fs11 text-left">Orders</span>
</div>
</div>
<h6 class="title-divider text-muted mt30 mb10">New visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">350</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-warning mn">
<i class="fa fa-caret-down"></i> 15.7% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">660</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success-dark mn">
<i class="fa fa-caret-up"></i> 20.2% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt25 mb10">Orders</h6>
<div class="row">
<div class="col-xs-5">
<h3 class="text-primary mn pl5">153</h3>
</div>
<div class="col-xs-7 text-right">
<h3 class="text-success mn">
<i class="fa fa-caret-up"></i> 5.3% </h3>
</div>
</div>
<h6 class="title-divider text-muted mt40 mb20"> Site Statistics
<span class="pull-right text-primary fw600">Today</span>
</h6>
</div>
</div>
</aside>
 
</div>
 
<style>body{min-height:2300px;}.content-header b,.allcp-form .panel.heading-border:before,.allcp-form .panel .heading-border:before{transition:all 0.7s ease;}@media (max-width: 800px) {.allcp-form .panel-body{padding:18px 12px;}.option-group .option{display:block;}.option-group .option+.option{margin-top:8px;}}</style>
 
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>
 
<script src="assets/js/plugins/highcharts/highcharts.js"></script>
 
<script src="assets/js/plugins/mixitup/jquery.mixitup.min.js"></script>
 
<script src="assets/js/plugins/magnific/jquery.magnific-popup.js"></script>
<script src="assets/js/plugins/fileupload/fileupload.js"></script>
<script src="assets/js/plugins/holder/holder.min.js"></script>
 
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/demo/widgets_sidebar.js"></script>
<script src="assets/js/pages/basic-gallery.js"></script>
 
</body>
</html> 
<?php
//require_once("include/footer.php");

}else{
	echo '<script>window.location="utility-login.php";</script>';
}
?>

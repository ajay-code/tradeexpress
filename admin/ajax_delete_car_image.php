<?php
session_start();
require_once("function.php");
$acm_id=trim($_SESSION["updated_id"]);

if(isset($_POST["msg"]) && $_POST["msg"]=="delete_car_motorcycle_image"){
	unset($_POST["msg"]);
	
	fileDelete("image","add_car_motorcycle_photo",array("acmp_id"=>$_POST["acmp_id"]),"../car_motorcycle_image/");
	$status=doDelete("add_car_motorcycle_photo",array("acmp_id"=>$_POST["acmp_id"]));	
}
?>
<div class="clearfix"></div>
				<?php
				$image=getDetails(doSelect("acm_id,acmp_id,image,status","add_car_motorcycle_photo",array("acm_id"=>$acm_id)));
				foreach($image as $k=>$v){
				?>
             <div class="col-md-4">
				<div class="mix label2 folder2">
             <div class="panel p6 pbn">
<div class="of-h">
<img src="../car_motorcycle_image/<?php echo $v["image"];  ?>" class="img-responsive" title="">
<div class="row table-layout">
<div class="col-xs-4 va-m pln" style="color:red;">
<a href="javascript:void(0);" onclick="delete_image('<?php echo $v["acmp_id"];?>');" data-toggle="tooltip" title="To Delete Click Here"  style="text-decoration:none; color: red;">
<h6>Delete</h6></a>
</div>
<div class="col-xs-6 text-right va-m prn">
<a href="javascript:void(0)" title=" <?php if($v["status"]==0)echo getCarTitle($v["acm_id"]).' Not Approved ';else echo getCarTitle($v["acm_id"]).' is Approved';  ?> "><span class="fa fa-circle fs10 <?php if($v["status"]==0)echo ' text-danger ';  ?> ml10"></span></a>
<!-- text-danger for red icon -->
</div>
</div>
</div>
</div>
</div>
</div>
              <?php
               }
               ?>
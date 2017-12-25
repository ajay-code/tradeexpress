<?php
session_start();
require_once("function.php")

?>
	<div class="table-responsive ">          
  <table class="table">
    <thead>
      <tr>
        <th>Job Seekers Name</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
<?php
	$page =$_GET["page"];
	$setLimit =$_GET["limit"];
	$pageLimit = ($page * $setLimit) - $setLimit;
	$limit=' LIMIT '.$pageLimit.','.$setLimit;
	$oredr_by=" ORDER BY aja_id ASC";	
		
	$select="aja_id,aj_id,cus_id,date";
	$con=array("aj_id"=>$_GET["aj_id"]);
	$application_details=getDetails(doSelect1($select,"ambit_job_apply",$con,$oredr_by.$limit));
	$application_details_total=getDetails(doSelect1($select,"ambit_job_apply",$con,$oredr_by));
	$total_page=ceil(count($application_details_total)/$setLimit);
	$application_details=trimmer_db_array($application_details);
	if(!empty($application_details_total)){
	foreach($application_details as $k=>$v){
	?>
      <tr>
        <td><a href="profile_details.php?cus_id=<?php echo $v['cus_id']; ?>" style="font-size: 1.2em;"><?php echo getCusName($v["cus_id"]);  ?></a></td>
        <td><?php echo get_date_str($v["date"]);  ?></td>
      </tr>
	<?php
	}
	}else{
	?>
	<tr><td colspan="4" style="color:red;">No Data Found !!!</td></tr>
	<?php
	}
	?>
	    </tbody>
  </table>
	<div id="listpagi">
	
                <div class="pagination pagination-position">
				<?php
                    if($page != 1){
                      $prev=$page-1;
                ?>
				<a href="javascript:void(0);" onclick="ajax_pagintn('1');" class="next page-numbers"><strong>FIRST</strong></a>
				<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $prev; ?>');" class="next page-numbers"><strong>PREV</strong></a>
				<?php
                }
                ?>
				
				<?php
				$l=1;
				$s=$page-5;
				if($s < 1){
				  $s=1;
				  }
				for($p=$s;$p<$page;$p++){
				  if($p!=$page){
				?>
				<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $p; ?>');" class="page-numbers"><strong><?php echo $p; ?></strong></a>
				<?php
				}else{
				?>
				<a  class="current page-numbers"><?php echo $p; ?></a>
				<?php
				}
				$l++;
				if($l==7){
				  break;
				}
				}
				
				if($total_page > 1){
				$l=1;
				for($p=$page;$p<=$total_page;$p++){
				  if($p!=$page){
				?>
				<a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $p; ?>');" class="page-numbers"><strong><?php echo $p; ?></strong></a>
				<?php
				}else{
				?>
				<a  class="current page-numbers"><?php echo $p; ?></a>
				<?php
				}
				$l++;
				if($l==5){
				  break;
				}
				}
				}

									if($page < $total_page){
									  $next=$page+1;
									  ?>
									  <a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $next; ?>');" class="next page-numbers"><strong>NEXT</strong></a>
									  <a href="javascript:void(0);" onclick="ajax_pagintn('<?php echo $total_page; ?>');" class="next page-numbers"><strong>LAST</strong></a>
									  <?php
									  }
									  ?>
			    </div>
    </div>
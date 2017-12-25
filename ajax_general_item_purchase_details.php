<?php
session_start();
require_once("function.php")

?>
	<div class="table-responsive ">          
  <table class="table">
    <thead>
      <tr>
        <th>#Transaction Id</th>
        <th>Buyer Name</th>
        <th>Amount (<?php echo currency();  ?>)</th>
        <th>Status</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
<?php
	$page =$_GET["page"];
	$setLimit =$_GET["limit"];
	$pageLimit = ($page * $setLimit) - $setLimit;
	$limit=' LIMIT '.$pageLimit.','.$setLimit;
	$oredr_by=" ";	
		
	$select="txn_id,table_name,item_id,cus_id,amount,status,date";
	$con=array("table_name"=>'add_general_item','item_id'=>$_GET["agi_id"]);
	$action_details=getDetails(doSelect($select,"paypal_buy_now",$con,$oredr_by.$limit));
	$action_details_total=getDetails(doSelect($select,"paypal_buy_now",$con,$oredr_by));
	$total_page=ceil(count($action_details_total)/$setLimit);
	$action_details=trimmer_db_array($action_details);
	if(!empty($action_details_total)){
	foreach($action_details as $k=>$v){
	?>
      <tr>
	  <td><?php echo $v["txn_id"];  ?></td>
        <td><a href="profile_details.php?cus_id=<?php echo $v['cus_id']; ?>" style="font-size: 1.2em;"><?php echo getCusName($v["cus_id"]);  ?></a></td>
        <td><?php echo currency().$v["amount"];  ?></td>
		<?php
		if($v["status"]=="1"){
		$status="Successfull";
		}else{
		$status="Unpaid";	
		}
		?>
        <td><?php echo $status;  ?></td>
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
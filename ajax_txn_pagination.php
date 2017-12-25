<?php
session_start();
require_once("function.php")

?>
	<div class="table-responsive ">          
  <table class="table">
    <thead>
      <tr>
        <th>#Transaction Id</th>
        <th>Transaction By</th>
        <th>Amount (<?php echo currency();  ?>)</th>
        <th>Type</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
<?php
	$page =$_GET["page"];
	$setLimit =$_GET["limit"];
	$pageLimit = ($page * $setLimit) - $setLimit;
	$limit=' LIMIT '.$pageLimit.','.$setLimit;
	$orderBy = ' order by date desc';	
		
	$select="transaction_id,transaction_by,cus_id,amount,date,type,for_what";
	$con=array("cus_id"=>$_SESSION["ar_id"]);
	$txn_details=getDetails(doSelect1($select,"paypal_transaction_table",$con,$orderBy.' '.$limit));
	$txn_details_total=getDetails(doSelect1($select,"paypal_transaction_table",$con));
	$total_page=ceil(count($txn_details_total)/$setLimit);
	$txn_details=trimmer_db_array($txn_details);
	if(!empty($txn_details_total)){
	foreach($txn_details as $k=>$v){
	?>
      <tr>
        <td><?php echo $v["transaction_id"];  ?></td>
        <td><?php echo $v["transaction_by"];  ?></td>
        <td><?php echo $v["amount"];  ?></td>
		<?php
		if($v["type"]=="1"){
			$type='Credited';
		}else{
			$type='Debited';
		}
		?>
        <td><?php echo $type;  ?> 
		<?php
		if($v['type']!="1"){
		?>
		&nbsp <i class="fa fa-info-circle"  onmouseover="get_info('<?php echo $v["for_what"]; ?>');" style="color:blue;" aria-hidden="true"></i>
		<?php
		}
		?>
		</td>
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
<?php
session_start();
require_once("function.php");
$_GET=trimmer($_GET);

?>
<?php
$page =$_GET["page"];
$setLimit =$_GET["limit"];
$pageLimit = ($page * $setLimit) - $setLimit;
$limit=' LIMIT '.$pageLimit.','.$setLimit;

$select1="cus_id,item_id,rating,comment,date,name,image";
$from1=$_GET["db"]." as a,ambit_registration as b";
$con2=array("item_id"=>$_GET["id"],"a.status"=>1,'a.cus_id'=>'b.ar_id','b.status'=>1);
$review_dtls_limit=getDetails(doSelect1($select1,$from1,$con2,$limit));
$review_dtls_total=getDetails(doSelect1($select1,$from1,$con2));
$total_page=ceil(count($review_dtls_total)/$setLimit);
$review_dtls_limit=trimmer_db_array($review_dtls_limit);
$total_review=count($review_dtls_total);

?>	
<article id="comments">
<?php
if(!empty($review_dtls_total)){
?>
    <h3 id="comments-number" class="comments-header"><?php echo $total_review; ?> Reviews</h3>
<ol class="comment-list">
<?php
foreach($review_dtls_limit as $k7=>$v7){
?>
<li class="comment even thread-even depth-1" id="li-comment-329">
	<a href="" rel="external nofollow" title="Brad Kesselman" class="avatar-img"><a href="" rel="external nofollow" title="Brad Kesselman">
	<img alt='No Image' src='' srcset='customer_image/<?php echo $v7["image"]; ?>' class='avatar avatar-60 photo' height='60' width='60' /></a></a>	<div id="comment-329" class="comment-wrap">
				<div class="comment-header comment-author vcard"> 
					<div class="comment-author"><span class="comment-author vcard"><cite class="fn"><?php echo $v7["name"];  ?></cite></span><!-- .comment-author .vcard --></div>   
					<div id="comment-329" class="comment odd alt thread-odd thread-alt depth-1" >
					<div class="comment-text">
					<span class="single_rating" style="font-size: 5px;">
<?php
$no_rating=5-$v7["rating"];
for($i=1;$i<=$v7["rating"];$i++){
?>
<i class="fa fa-star" style="color:#F0B74A;" aria-hidden="true"></i>					
<?php
}
for($i=1;$i<=$no_rating;$i++){
?>
<i class="fa fa-star-o" style="color:#F0B74A;" aria-hidden="true"></i>
<?php
}
?>
</span>
					
					</div>
					</div>
				</div>
		<!-- .comment-meta -->
		<div class="comment-content comment">
		  <p style="text-align:justify;"><?php echo $v7["comment"];  ?></p>
		</div>
		<!-- .comment-content -->
		<div class="comment-meta"><span class="published"><abbr class="comment-date" title=""><?php echo get_date_str($v7["date"]);  ?></abbr></span></div></div>
  <!-- #comment-## -->
  
</li>
<?php
}
}else{
?>

<h3 id="comments-number" class="comments-header">Not Found !!!</h3>

<?php
}
?>
<div id="listpagi">
                <div class="pagination pagination-position">
				<?php
                    if($page != 1){
                      $prev=$page-1;
                ?>
				<a href="javascript:void(0);" onclick="ajax_pagintn111('1');" class="next page-numbers"><strong>FIRST</strong></a>
				<a href="javascript:void(0);" onclick="ajax_pagintn111('<?php echo $prev; ?>');" class="next page-numbers"><strong>PREV</strong></a>
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
				<a href="javascript:void(0);" onclick="ajax_pagintn111('<?php echo $p; ?>');" class="page-numbers"><strong><?php echo $p; ?></strong></a>
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
				<a href="javascript:void(0);" onclick="ajax_pagintn111('<?php echo $p; ?>');" class="page-numbers"><strong><?php echo $p; ?></strong></a>
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
									  <a href="javascript:void(0);" onclick="ajax_pagintn111('<?php echo $next; ?>');" class="next page-numbers"><strong>NEXT</strong></a>
									  <a href="javascript:void(0);" onclick="ajax_pagintn111('<?php echo $total_page; ?>');" class="next page-numbers"><strong>LAST</strong></a>
									  <?php
									  }
									  ?>
			    </div>
        </div>	
</ol>
		<!-- .comment-list -->
	
</article>
<!-- #comments -->

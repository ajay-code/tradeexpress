<?php
session_start();
require_once("function.php");
$_POST=trimmer($_POST);
$db=$_POST["db"];
$id=$_POST["id"];
unset($_POST["db"]);
unset($_POST["id"]);

if(isset($_SESSION["ar_id"])){
 $_POST["cus_id"]=$_SESSION["ar_id"];
 $check=getDetails(doSelect("*",$db,$_POST));
 if(!empty($check)){
 $status=doDelete($db,$_POST);
 if($status){
	 echo '2 || ';
?>



<?php
if(isset($_GET["msg"]) && $_GET["msg"]=="listing"){
?>
<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:grey;"></i><a title="Add to watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $_POST["item_id"]; ?>','<?php echo $db; ?>','<?php echo $id; ?>');" > Add to watchlist</a></span>
<?php
}
if(isset($_GET["msg"]) && $_GET["msg"]=="details"){
?>
<a href="javascript:void(0);"  title="Add to watchlist" class="watchlist"  onclick="add2watch_details_page('<?php echo $_POST["item_id"]; ?>','<?php echo $db; ?>','<?php echo $id; ?>');"  >Add to watchlist</a>
<?php
}
?>

<?php
 }else{
	 echo 0;
 }
 }else{
 $status=doInsert($_POST,$db);
 if($status){
 echo '1 || ';
 ?>
 
 
 
<?php
if(isset($_GET["msg"]) && $_GET["msg"]=="listing"){
?>
<span id="tmplfavorite_1080" class=""><i class="fa fa-binoculars" style="font-size:1em;color:#F0B74A;"></i><a title="Remove from watchlist" href="javascript:void(0);"  onclick="add2watch_general_item('<?php echo $_POST["item_id"]; ?>','<?php echo $db; ?>','<?php echo $id; ?>');" > Remove from watchlist</a></span>
<?php
}
if(isset($_GET["msg"]) && $_GET["msg"]=="details"){
?>
<a href="javascript:void(0);"  title="Remove from watchlist" class="watchlist"  onclick="add2watch_details_page('<?php echo $_POST["item_id"]; ?>','<?php echo $db; ?>','<?php echo $id; ?>');"  >Remove from watchlist</a>
<?php
}
?>
 
 
 
 
 <?php
 }else{
 echo '0 || ';	 
 }
 }
}else{
	echo '404 ||';
}

?>
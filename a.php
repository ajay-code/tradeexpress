<?php
print_r($_GET);
echo '<br>';
$ex=explode('%?&',$_GET["category"]);

echo $category=$ex[0].'<br>';
if(isset($ex[1])){
echo $for=$ex[1].'<br>';
}


?>
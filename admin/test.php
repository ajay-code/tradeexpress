<?php
session_start();
require_once("function.php");
/* print_r($_SESSION);

$field=array("0"=>array("a"=>"eferf ","b"=>" dfgdg ","c"=>"dsfgd"),"1"=>array("l"=>"ertr"));
echo '<pre>';
print_r($field);
echo '</pre>';
echo '<pre>';
print_r(trimmer_db_array($field));
echo '</pre>'; */

echo show_price_listingDb("general_item");

?>
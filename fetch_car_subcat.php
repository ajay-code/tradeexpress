 <?php
 require_once("function.php");
 if(isset($_GET["cc_id"])){
 $category=getDetails(doSelect("cc_id,category","car_category",array("parent_id"=>$_GET["cc_id"])));
 ?>
 <option value="0">Select</option>
 <?php

                        foreach ($category as $k => $v) {
                        
                         ?>
                        <option value="<?php echo $v["cc_id"]; ?>"><?php echo $v["category"];  ?></option>
                        <?php
                      }
}

                      ?>
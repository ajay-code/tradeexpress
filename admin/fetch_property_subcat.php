 <?php
 require_once("function.php");
 if(isset($_GET["pc_id"])){
 $category=getDetails(doSelect("pc_id,category","property_category",array("parent_id"=>$_GET["pc_id"])));
 ?>
 <option value="0">Select</option>
 <?php

                        foreach ($category as $k => $v) {
                        
                         ?>
                        <option value="<?php echo $v["pc_id"]; ?>"><?php echo $v["category"];  ?></option>
                        <?php
                      }
}

                      ?>
 <?php
 require_once("function.php");
 if(isset($_GET["jc_id"])){
 $category=getDetails(doSelect("jc_id,category","job_category",array("parent_id"=>$_GET["jc_id"])));
 ?>
 <option value="0">Select</option>
 <?php

                        foreach ($category as $k => $v) {
                        
                         ?>
                        <option value="<?php echo $v["jc_id"]; ?>"><?php echo $v["category"];  ?></option>
                        <?php
                      }
}

                      ?>
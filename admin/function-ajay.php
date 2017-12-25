<?php

/**
 * Reset Password
 */

 function reset_password($new_password=null)
 {
     if(!$new_password){
         return false;
     }
     $new_password=md5($new_password);
     $id = $_SESSION["id"];
     doUpdate('admin', ['password' => $new_password], ['id' => $id]);
     return true;
 }

 function check_old_password($password)
 {
     global $conn;
     $password=md5($password);
     $id = $_SESSION["id"];
     $q="SELECT * from admin where id={$id} and password='{$password}'";
     $results = mysqli_query($conn, $q);
     
     if (!$results) {
         die('Invalid query: ' . mysqli_info($conn));
     } else {
         return !! mysqli_num_rows($results);
     }

     return fasle;
 }

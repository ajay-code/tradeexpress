<?php
session_start();
require_once("../function.php");

	$heading=addslashes($_POST['slide_heading']);
    
	$text=addslashes($_POST['slide_text']);
    $action=$_POST['action'];
    
    if ($_FILES["upload"]["error"]==0) {
        $type=$_FILES["upload"]["type"];
        $temp=explode("/", $type);
        $ext=$temp[1];
        if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
            $filePath = "images/" .date('d-m-Y-H-i-s').'-'.$_FILES['upload']['name'];
            $yes=move_uploaded_file($_FILES["upload"]["tmp_name"], $filePath);
            if($action=='update'){
                $id=$_POST['id'];
                if($_FILES['upload']['name']==''){
                        $query="UPDATE `slides` SET `heading`='$heading', `text`='$text' WHERE id='$id'";
                }else{
                    $query="UPDATE `slides` SET `heading`='$heading', `text`='$text', `path`='$filePath' WHERE id='$id'";
                }
            }else if($action=='add'){
                $query="insert into slides (heading, text, path) values ('$heading','$text','$filePath')";
            }
            //$query="insert into slides (heading, text, path) values ('$heading','$text','$filePath')";
            if(mysqli_query($conn, $query)){
                echo "Action performed successfully.";
            }else{
            	echo "Action does not performed successfully";
            }
        }else{
        	echo "Please add the supported image file formats (jpeg, jpg, gif, png)";
        }
    }	//
    else{
		echo "Problem adding slide.";
	}
?>

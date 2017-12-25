<?php
	session_start();
	require_once("function.php");
	if(isset($_POST['question'])){
		$question=$_POST['question'];
		$cus_id=$_SESSION["ar_id"];
		$item_id=$_POST['item_id'];
		$query="INSERT INTO `questions`(`item_id`, `cus_id`, `question`, `question_time`) VALUES ('$item_id','$cus_id','$question',NOW())";
		if(mysqli_query($conn, $query)){
			$res=sendMail('question',$item_id, $question);
			echo 'Question submitted successfully';
		}
		else{
			echo 'Sorry! Try Again.';
		}
	}
?>
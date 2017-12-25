<?php
    session_start();
    require_once("function.php");
    if (isset($_POST['question'])) {
        $question=$_POST['question'];
        $cus_id=$_SESSION["ar_id"];
        $car_id=$_POST['car_id'];
        $query="INSERT INTO `car_questions`(`car_id`, `cus_id`, `question`, `question_time`) VALUES ('$car_id','$cus_id','$question',NOW())";
        if (mysqli_query($conn, $query)) {
            $res=sendMailForCarQNA('question', $car_id, $question);
            echo 'Question submitted successfully';
        } else {
            echo 'Sorry! Try Again.';
        }
    }

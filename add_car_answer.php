<?php
    session_start();
    require_once("function.php");
    if (isset($_POST['answer'])) {
        $answer=$_POST['answer'];
        $a_id=$_POST["a_id"];
        $query="UPDATE `car_questions` SET `answer`='$answer',`answer_time`=NOW() WHERE id='$a_id'";
        if (mysqli_query($conn, $query)) {
            $res=sendMailForCarQNA('answer', $a_id, $answer);
            echo 'Answer submitted successfully';
        } else {
            echo 'Sorry! Try Again.';
        }
    }

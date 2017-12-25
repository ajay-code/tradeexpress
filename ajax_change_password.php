<?php
session_start();

require_once("function.php");

if (!check_old_password($_POST['old_password'])) {
    echo 'wrong password';
    die();
}

if ($_POST['password'] == $_POST['confirm_password']) {
    if(reset_password( $_POST['password'])){
        echo 'success';
        die();
    }
} else {
    echo 'password did not match';
    die();
}

echo 'failed';
die();

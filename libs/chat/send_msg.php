<?php
    require '../authorization/db.php';

    date_default_timezone_set('ALL');

    $user = $_POST['login'];
    $msg = $_POST['msg'];
    $data = date('G:i');

    if($user == "") {
        exit();
    }

    $result = mysqli_query($db, "INSERT INTO message (user,message,date) VALUES('$user','$msg','$data')");
?>
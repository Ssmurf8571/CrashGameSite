<?php
    include('../libs/authorization/db.php');

    date_default_timezone_set('ALL');

    $user = $_GET['login'];
    $msg = $_GET['msg'];
    $data = date('G:i');

    $result = mysqli_query($db, "INSERT INTO message (user,message,date) VALUES('$user','$msg','$data')");

    header('Location: /CrashGameSite/en/index.php');
?>
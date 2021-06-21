<?php
    session_start();
    
    include('../../db.php');

    $login = $_SESSION['login'];
    $X2 = $_POST['X2'];
    $X3 = $_POST['X3'];
    $X5 = $_POST['X5'];
    $X20 = $_POST['X20'];
    $Win = $_POST['win'];

    $result = mysqli_query($db,"SELECT balance FROM `users` WHERE login = '".$_SESSION['login']."'");

    if ($login == '') { exit(); }

    while ($row = mysqli_fetch_assoc($result)) { $balance = $row['balance']; }

    function checkValue($balance, $X2, $X3, $X5, $X20) {
        if ($balance < $X2 || $X2 == '') { $X2 = 0; }
        if ($balance < $X3 || $X3 == '') { $X3 = 0; }
        if ($balance < $X5 || $X5 == '') { $X5 = 0; }
        if ($balance < $X20 || $X20 == '') { $X20 = 0; }
        $balance = $balance - $X2 - $X3 - $X5 - $X20;
    }

    checkValue($balance, $X2, $X3, $X5, $X20);

    if ($Win == "green") {
        if ($X2 == "" || $X2 = 0) { exit($balance); }
        $X2 = $X2 * 2;
        $balance = $balance + $X2;
    }

    if ($Win == "blue") {
        if ($X3 == "" || $X3 = 0) { exit($balance); }
        $X3 = $X3 * 3;
        $balance = $balance + $X3;
    }

    if ($Win == "red") {
        if ($X5 == "" || $X5 = 0) { exit($balance); }
        $X5 = $X5 * 5;
        $balance = $balance + $X5;
    }

    if ($Win == "gold") {
        if ($X20 == "" || $X20 = 0) { exit($balance); }
        $X20 = $X20 * 20;
        $balance = $balance + $X20;
    }

    $query = mysqli_query($db,"UPDATE `users` SET `balance`='".$balance."' WHERE login = '".$login."'");


    echo $balance;
    
?>
<?php
    session_start();
    $db = @new mysqli("localhost","root","root","db_piroll");
    $login = $_SESSION['login'];
    $X2 = $_POST['X2'];
    $X3 = $_POST['X3'];
    $X5 = $_POST['X5'];
    $X20 = $_POST['X20'];
    $Win = $_POST['win'];

    $result = mysqli_query($db,"SELECT balance FROM `users` WHERE login = '".$_SESSION['login']."'");

    if ($login == '') { exit(); }

    while ($row = mysqli_fetch_assoc($result)) { $balance = $row['balance']; }

    checkValue($balance, $X2, $X3, $X5, $X20);

    if($X2 == '') { $X2 = 0; }
    if($X3 == '') { $X3 = 0; }
    if($X5 == '') { $X5 = 0; }
    if($X20 == '') { $X20 = 0; }

    if ($Win == "green") {
        $balance = $balance - $X2 - $X3 - $X5 - $X20;
        if ($X2 == "") { exit($balance); }
        $X2 = $X2 * 3;
        $balance = $balance + $X2;
    }

    if ($Win == "blue") {
        $balance = $balance - $X2 - $X3 - $X5 - $X20;
        if ($X3 == "") { exit($balance); }
        $X3 = $X3 * 4;
        $balance = $balance + $X3;
    }

    if ($Win == "red") {
        $balance = $balance - $X2 - $X3 - $X5 - $X20;
        if ($X5 == "") { exit($balance); }
        $X5 = $X5 * 6;
        $balance = $balance + $X5;
    }

    if ($Win == "gold") {
        $balance = $balance - $X2 - $X3 - $X5 - $X20;
        if ($X20 == "") { exit($balance); }
        $X20 = $X20 * 21;
        $balance = $balance + $X20;
    }

    $query = mysqli_query($db,"UPDATE `users` SET `balance`='".$balance."' WHERE login = '".$login."'");

    echo $balance;

    function checkValue($balance, $X2, $X3, $X5, $X20) {
        if ($balance < $X2) { exit(); }
        if ($balance < $X3) { exit(); }
        if ($balance < $X5) { exit(); }
        if ($balance < $X20) { exit(); }
    }
?>
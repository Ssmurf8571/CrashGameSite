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

    if ($login == '') {
        exit('<h4 style="background: red; display: inline-block;">Вы не авторизовались</h4>');
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $balance = $row['balance'];
    }

    checkValue();

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


    // if ($X2 !== "") {
    //     $balance = $balance - $X2;
    //     $X2 = $X2 * 3;
    //     $balance = $balance + $X2;
    //     // $query = mysqli_query($db,"UPDATE `users` SET `balance`='".$balance."' WHERE login = '".$_SESSION['login']."'");
    // }


    echo $balance;

    function NULLvalue($balance) {
        echo $balance;
    }
























    // function greenWin($balance, $X2) {
    //     if ($X2 !== "") {
    //         $X2 = $X2 * 3;
    //         $balance = $balance + $X2;
    //         // $query = mysqli_query($db,"UPDATE `users` SET `balance`='".$balance."' WHERE login = '".$_SESSION['login']."'");
    //         $sql = "UPDATE `users` SET `balance` = ".$balance." WHERE login = '".$_SESSION['login']."'";
    //         echo $sql;
    //     }
    // }
    // function blueWin($balance, $X3) {
    //     if ($X3 !== "") {
    //         $X3 = $X3 * 4;
    //         $balance = $balance + $X3;
    //         // $query = mysqli_query($db,"UPDATE `users` SET `balance`='".$balance."' WHERE login = '".$_SESSION['login']."'");
    //         $sql = "UPDATE `users` SET `balance` = ".$balance." WHERE login = '".$_SESSION['login']."'";
    //         echo $sql;
    //     }
    // }

    function checkValue() {
        if ($balance < $X2) {
            exit();
        }
        if ($balance < $X3) {
            exit();
        }
        if ($balance < $X5) {
            exit();
        }
        if ($balance < $X20) {
            exit();
        }
    }
?>
<?php
session_start();
    $db = @new mysqli("localhost","root","root","db_piroll");
    $login = $_SESSION['login'];
    $total = $_POST[''];
    $X2 = $_POST['X2'];
    $X3 = $_POST['X3'];
    $X5 = $_POST['X5'];
    $X20 = $_POST['X20'];

    $result = mysqli_query($db,"SELECT balance FROM users WHERE login = '".$_SESSION['login']."'");

    if ($login == '') {
        exit('<h4 style="background: red; display: inline-block;">Вы не авторизовались</h4>');
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $balance = $row['balance'];
    }

    // if ($balance < $total) {
    //     exit('<h4 style="background: red; display: inline-block;">Недостаточно средств</h4>');
    // }
?>
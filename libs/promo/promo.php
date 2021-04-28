<?php
    session_start();

    $db = @new mysqli("localhost","root","root","db_piroll");

    $login = $_SESSION['login'];
    $UserPromo = $_POST['UserPromo'];

    $queryCommand = mysqli_query($db, "SELECT * FROM promolist WHERE name = '".$UserPromo."'");

    while ($row = mysqli_fetch_assoc($queryCommand)) {
        $promoName = $row['name'];
        $promoMoney = $row['money'];
        $promoActivates = $row['activates'];
    }

    if ($promoName == '') {
        exit('<h5 style="margin: -30px 0 5px; color: red; font-weight: 700;">Incorrected value</h5>');
    }

    $getUserMoney = mysqli_query($db, "SELECT login, balance FROM users WHERE login = '".$login."'");

    while ($row = mysqli_fetch_assoc($getUserMoney)) {
        $balance = $row['balance'];
    }

    $newBalance = $balance + $promoMoney;
    $newpromoActivates = $promoActivates + 1;

    $result1 = mysqli_query($db, "UPDATE `users` SET `balance`= ".$newBalance." WHERE login = '".$login."'");
    $result2 = mysqli_query($db, "UPDATE `promolist` SET `activates`= ".$newpromoActivates." WHERE name = '".$promoName."'");
?>
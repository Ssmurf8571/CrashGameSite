<?php
session_start();
    $db = @new mysqli("localhost","root","root","db_piroll");

    $login = $_SESSION['login'];
    $total = $_POST['total'];
    $percent = $_POST['percent'];
    $buttonId = $_POST['buttonId'];

    $result = mysqli_query($db,"SELECT balance FROM users WHERE login = '".$login."'");

    if ($login == '') {
        exit('<h4 style="background: red; display: inline-block; color: #fff;">Вы не авторизовались</h4>');
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $balance = $row['balance'];
    }

    if ($balance < $total) {
        exit('<h4 style="background: red; display: inline-block; color: #fff;">Недостаточно средств</h4>');
    }

    $fromPercent = $percent * 9999;
    $toPercent = 999999 - $fromPercent;
    $fromPercent = (int) $fromPercent;
    $toPercent = (int) $toPercent;

    $randomNumber = rand(0,999999);

    $rangeFromPercent = range('0', $fromPercent);
    $rangeToPercent = range($toPercent, '999999');



    if($buttonId == 'Меньше')
    {
        if (in_array($randomNumber, $rangeFromPercent)) {
            WinGame($randomNumber,$balance,$total,$percent,$db,$login);
        } 
        else {
            LoseGame($randomNumber,$balance,$total,$db,$login);
        }
    }

    if($buttonId == 'Больше')
    {
        if (in_array($randomNumber, $rangeToPercent)) {
            WinGame($randomNumber,$balance,$total,$percent,$db,$login);
        } else {
            LoseGame($randomNumber,$balance,$total,$db,$login);

        }
    }

    function WinGame($randomNumber,$balance,$total,$percent,$db,$login) {
        echo '<h4 style="background: #2BDE6D; display: inline-block; color: #fff;">Выпало: '.$randomNumber.'</h4>';
        $newBalance = $balance + (round(($total * 100 / $percent),2)) - $total;

        echo '<div id="BetBalance" style="display: none;">'.$newBalance.'</div>';

        $result =  mysqli_query($db, 'UPDATE `users` SET `balance`= "'.$newBalance.'" WHERE `login`= "'.$login.'"');
    }

    function LoseGame($randomNumber,$balance,$total,$db,$login) {
        echo '<h4 style="background: red; display: inline-block; color: #fff;">Выпало: '.$randomNumber.'</h4>';
        $newBalance = ($balance - $total);

        echo '<div id="BetBalance" style="display: none;">'.$newBalance.'</div>';
        $result =  mysqli_query($db, 'UPDATE `users` SET `balance`= "'.$newBalance.'" WHERE `login`= "'.$login.'"');
    }
?>
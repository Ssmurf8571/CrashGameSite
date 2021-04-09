<?php
session_start();
    $db = @new mysqli("localhost","root","root","db_piroll");

    $result = mysqli_query($db,"SELECT balance FROM users WHERE `login`= ".$_SESSION['login']);

    while ($row = $result->fetch_assoc()) {
        $balance = $row['balance'];
    }

    $login = $_SESSION['login'];
    $total = $_POST['total'];
    $percent = $_POST['percent'];
    $buttonId = $_POST['buttonId'];

    if ($balance < $total) {
        exit('Недостаточно средств');
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
            echo '<h4 style="background: #2BDE6D; display: inline-block;">Выпало: '.$randomNumber.'</h4>';
            $newBalance = $balance + (round(($total * 100 / $percent),2)) - $total;

            echo '<div id="BetBalance" style="display: none;">'.$newBalance.'</div>';

            $result =  mysqli_query($db, 'UPDATE users SET balance= "'.$newBalance.'" WHERE login= "'.$login.'"');
        } 
        else {
            echo '<h4 style="background: red; display: inline-block;">Выпало: '.$randomNumber.'</h4>';
            $newBalance = ($_SESSION['balance'] - $total);
            $newBalance = $balance + $newBalance;
            echo '<div id="BetBalance" style="display: none;">'.$newBalance.'</div>';
            $result =  mysqli_query($db, 'UPDATE `users` SET `balance`= "'.$newBalance.'" WHERE `login`= "'.$login.'"');
        }
    }

    if($buttonId == 'Больше')
    {
        if (in_array($randomNumber, $rangeToPercent)) {
            echo '<h4 style="background: #2BDE6D; display: inline-block;">Выпало: '.$randomNumber.'</h4>';
            $newBalance = $balance + (round(($total * 100 / $percent),2)) - $total;

            echo '<div id="BetBalance" style="display: none;">'.$newBalance.'</div>';

            $result =  mysqli_query($db, 'UPDATE `users` SET `balance`= "'.$newBalance.'" WHERE `login`= "'.$login.'"');
        } else {
            echo '<h4 style="background: red; display: inline-block;">Выпало: '.$randomNumber.'</h4>';
            $newBalance = ($_SESSION['balance'] - $total);
            $newBalance = $balance + $newBalance;
            echo '<div id="BetBalance" style="display: none;">'.$newBalance.'</div>';
            $result =  mysqli_query($db, 'UPDATE `users` SET `balance`= "'.$newBalance.'" WHERE `login`= "'.$login.'"');

        }
    }
?>
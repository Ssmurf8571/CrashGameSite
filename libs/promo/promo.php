<?php

    $db = @new mysqli("localhost","root","root","db_piroll");

    $login = $_SESSION['login'];
    $UserPromo = $_POST['UserPromo'];
    echo "login: ".$login." Value: ".$UserPromo."<br/>";

    $queryCommand = mysqli_query($db, "SELECT * FROM promolist");










?>
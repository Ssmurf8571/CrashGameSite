<?php
  session_start();
  if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
  if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

  $login = stripslashes($login);
  $login = htmlspecialchars($login);
  $password = stripslashes($password);
  $password = htmlspecialchars($password);

  $login = trim($login);
  $password = trim($password);

  include ("db.php");

  $result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'"); 
  $myrow = mysqli_fetch_array($result);

  if ($myrow['password']==$password) {
    $_SESSION['login']=$myrow['login'];
    $_SESSION['id']=$myrow['id'];
    $_SESSION['balance']=$myrow['balance'];
    header('Location: ../../');
  }
  else {
    header('Location: ../../');
  }
?>
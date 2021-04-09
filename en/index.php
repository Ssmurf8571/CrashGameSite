<?php
  session_start(); 

  $db = @new mysqli("localhost","root","root","db_piroll");
  $result = mysqli_query($db,"SELECT balance FROM users WHERE `login`= ".$_SESSION['login']."");

  while ($row = $result->fetch_assoc()) {
      $balance = $row['balance'];
  }
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ru"> <!--<![endif]-->

<head>

	<meta charset="utf-8">

	<title>CrushGame</title>
	<meta name="description" content="">

	<link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="../img/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../img/favicon/apple-touch-icon-114x114.png">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="../libs/bootstrap/css/bootstrap-grid.min.css">
	
	<link rel="stylesheet" href="../css/fonts.css">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/chat.css">
  <link rel="stylesheet" href="../css/auth.css">
	<link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/darkmode.css">
	<link rel="stylesheet" href="../css/media.css">

  <link rel="stylesheet" href="../libs/games/dice/style.css">

	<script src="../libs/modernizr/modernizr.js"></script>

</head>

<body>

  <header>
    <div class="container">
      <div class="header__wraper">
        <div class="app__logo">
          <a href="./">
            <h3>C<span>rush</span>G<span>ame</span></h3>
          </a>
        </div>
        <div class="app__nav__menu">
          <div class="app__nav__page__language">
            <div class="app__nav__language__current">
              <a href="#" class="clear__hash">
                <span id="page__language">en</span>
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M506.157,132.386c-7.803-7.819-20.465-7.831-28.285-0.029l-207.73,207.299c-7.799,7.798-20.486,7.797-28.299-0.015L34.128,132.357c-7.819-7.803-20.481-7.79-28.285,0.029c-7.802,7.819-7.789,20.482,0.029,28.284l207.701,207.27c11.701,11.699,27.066,17.547,42.433,17.547c15.358,0,30.719-5.846,42.405-17.533L506.128,160.67C513.946,152.868,513.959,140.205,506.157,132.386z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
              </a>
            </div>
            <div class="app__nav__language__dropdown" id="app__nav__language__dropdown">
              <a class="app__nav__language" href="../en/">English</a>
              <a class="app__nav__language" href="../ru/">Русский</a>
            </div>
          </div>
          <div class="app__nav__page__nightmode">
            <a href="#" class="clear__hash">
            <svg class="button-simple-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
            </a>
          </div>
          <?php
            if(isset($_SESSION['login'])) 
            { 
              echo '<li class="nav-item pers__area">
                <a id="login__btn" href="../libs/authorization/logout.php">'.$_SESSION['login'].'</a></li>';
                echo '<li class="nav-item"><div class="user-balance">'.$balance.'</div>
              </li>'; 
            } else { 
              echo '<div class="nav-item">
              <button id="login_btn">Login</button>
              </div>'; 
            } 
          ?>
        </div>
      </div>
    </div>
  </header>

  <div class="main__wrapper">
    <div class="left__sidebar">

      <?php
        include('../libs/games/dice/index.html');
      ?>

      <div class="login__form">
        <?php
          include('../login.html');
        ?>
      </div>
      <div class="register_form">
        <?php
          include('../register.html');
        ?>
      </div>
    </div>
    <div class="right__sidebar">
      <form id="content" action="" method="POST">
        <div id="chatwindow">
          <?php
            require('../libs/chat/post_msg.php');
          ?>
        </div>
        <br>
        <?php
          echo '<input id="chatnick" value="'.$_SESSION['login'].'" name="login">';
        ?>
        <input id="chatmsg" type="text" name="msg" placeholder="message" autocomplete="off">
        <button id="submit-msg" type="submit"></button>
      </div>
    </div>
  </div>

	<div class="hidden"></div>

	<div class="loader">
		<div class="loader_inner"></div>
	</div>

  <div>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
      
      <script src="../js/common.js"></script>
      <script src="../js/autorization.js"></script>
  </div>

</body>
</html>
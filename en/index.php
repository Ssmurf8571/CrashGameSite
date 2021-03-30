<?php
  session_start(); 
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
  <link rel="stylesheet" href="../css/auth.css">
  <link rel="stylesheet" href="../css/chat.css">
	<link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/darkmode.css">
	<link rel="stylesheet" href="../css/media.css">

	<script src="../libs/modernizr/modernizr.js"></script>

</head>

<body>

  <header>
    <div class="container">
      <div class="header__wraper">
        <div class="app__logo">
          <a href="./index.php">
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
                <a id="login__btn" href="./../php/checkProfile.php">'.$_SESSION['login'].'</a>
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
      <div class="login__form">
        <div id="id01" class="modal">     
          <form class="modal-content animate" action="/CrashGameSite/libs/authorization/login.php" method="post">
            <div class="imgcontainer">
              <span class="close" id="close" title="Close Modal">&times;</span>
            </div>
        
            <div class="container_auth">
              <label for="uname"><b>Username</b></label>
              <input type="text" name="login" placeholder="Enter Username" name="uname" required>
        
              <label for="psw"><b>Password</b></label>
              <input type="password" name="password" placeholder="Enter Password" name="psw" required>
                
              <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
            </div>
        
            <div class="container_auth" style="background-color:#2A2D33">
              <button type="button" id="close" class="cancelbtn" >Cancel</button>
              <button type="submit">Login</button>
              <span class="psw register_btn clear__hash"><a class="clear__hash" href="#">register?</a></span>
              <span class="psw clear__hash">Forgot <a class="clear__hash" href="#">password?</a></span>
            </div>
          </form>
        </div>
      </div>

      <div class="register_form">

        <div id="id02" class="modal">
          <span class="close" title="Close Modal">&times;</span>
          <form id="form_register" class="modal-content animate" action="/CrashGameSite/php/reg.php" method="post">
            <div class="imgcontainer">
              <span class="close" id="close" title="Close Modal">&times;</span>
            </div>
            <div class="container_auth">
              <label for="login"><b>Username</b></label>
              <input name="login" type="text" placeholder="Enter Username" required>

              <label for="email"><b>Email</b></label>
              <input name="email" type="email" placeholder="Enter Email" required>

              <label for="psw"><b>Password</b></label>
              <input name="password" type="password" class="reg_form__password" id="form__password" placeholder="Enter Password" required>

              <label for="psw-repeat"><b>Repeat Password</b></label>
              <input name="psw-repeat" type="password" class="reg_form__password" id="form_re__password" placeholder="Repeat Password" required>
              
              <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
              </label>

              <p>By creating an account you agree to our <a class="clear__hash" href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>       

              <div id="error__message"></div>

              <div class="clearfix">
                <button type="button" class="cancelbtn" id="close">Cancel</button>
                <button type="submit" name="submit" class="signupbtn submit">Sign Up</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="right__sidebar">
      <form id="content" action="" method="POST">
        <div id="chatwindow">
          <?php
            require('chat.php');
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

      <!--<script type="text/javascript">
        /* most simple ajax chat script (www.linuxuser.at) (GPLv2) */
        var nick_maxlength=4;
        var http_request=false;
        var http_request2=false;
        var intUpdate;

        /* http_request for writing */
        function ajax_request(url){http_request=false;if(window.XMLHttpRequest){http_request=new XMLHttpRequest();if(http_request.overrideMimeType){http_request.overrideMimeType('text/xml');}}else if(window.ActiveXObject){try{http_request=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{http_request=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){}}}
        http_request.onreadystatechange=alertContents;http_request.open('GET',url,true);http_request.send(null);}
        function alertContents(){if(http_request.readyState==4){if(http_request.status==200){rec_response(http_request.responseText);}else{}}}

        /* http_request for reading */
        function ajax_request2(url){http_request2=false;if(window.XMLHttpRequest){http_request2=new XMLHttpRequest();if(http_request2.overrideMimeType){http_request2.overrideMimeType('text/xml');}}else if(window.ActiveXObject){try{http_request2=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{http_request2=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){}}}
        http_request2.onreadystatechange=alertContents2;http_request2.open('GET',url,true);http_request2.send(null);}
        function alertContents2(){if(http_request2.readyState==4){if(http_request2.status==200){rec_chatcontent(http_request2.responseText);}else{}}}

        /* chat stuff */
        chatmsg.focus()
        var show_newmsg_on_bottom=1;     /* set to 0 to let new msg´s appear on top */
        var waittime=100;        /* time between chat refreshes (ms) */

        intUpdate=window.setTimeout("read_cont();", waittime);
        chatwindow.value = "loading...";

        function read_cont()         { zeit = new Date(); ms = (zeit.getHours() * 24 * 60 * 1000) + (zeit.getMinutes() * 60 * 1000) + (zeit.getSeconds() * 1000) + zeit.getMilliseconds(); ajax_request2("chat.txt?x=" + ms); }
        function display_msg(msg1)     { chatwindow.value = msg1.trim(); }
        function keyup(arg1)         { if (arg1 == 13) submit_msg(); }
        function submit_msg()         { clearTimeout(intUpdate); if (chatnick.value == "") { check = prompt("please enter username:"); if (check === null) return 0; if (check == "") check="..."; chatnick.value=check; } if (chatnick.value.length > nick_maxlength) chatnick.value=chatnick.value.substring(0,nick_maxlength); spaces=""; for(i=0;i<(nick_maxlength-chatnick.value.length);i++) spaces+=" "; v=chatwindow.value.substring(chatwindow.value.indexOf("\n")) + "\n" + chatnick.value + spaces + " " + chatmsg.value; if (chatmsg.value != "") chatwindow.value=v.substring(1); write_msg(chatmsg.value,chatnick.value); chatmsg.value=""; intUpdate=window.setTimeout("read_cont();", waittime);}
        function write_msg(msg1,nick1)     { ajax_request("test.php?msg=" + escape(msg1) + "&user=" + escape(nick1)); }
        function rec_response(str1)     { }

        function rec_chatcontent(cont1) {
            if (cont1 != "") {
                out1 = unescape(cont1);
                if (show_newmsg_on_bottom == 0) { out1 = ""; while (cont1.indexOf("\n") > -1) { out1 = cont1.substr(0, cont1.indexOf("\n")) + "\n" + out1; cont1 = cont1.substr(cont1.indexOf("\n") + 1); out1 = unescape(out1); } }
                if (chatwindow.value != out1) { display_msg(out1); }
                intUpdate=window.setTimeout("read_cont()", waittime);
            }
        }
      </script>-->
  </div>

</body>
</html>
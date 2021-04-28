//Load Page 2:6
$(window).on('load', function() {

	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut("slow");
});

//Header 9:17
$( ".app__nav__language__current" ).click(function() {
    var dropdown_btn_lang = document.getElementById('app__nav__language__dropdown');
    dropdown_btn_lang.classList.toggle("active");
});

$( ".app__nav__page__nightmode" ).click(function() {
var body_dark__mode = document.body;
body_dark__mode.classList.toggle("dark-mode");
});
  
//Chat 20:49
$(document).ready(function(){  
          
	$('#submit-msg').click(function() {
		var login = $(this).parent().find('input[name="login"]').val();
		var msg = $(this).parent().find('input[name="msg"]').val();
		var data = $(this).parents('form').serialize()

		$.ajax({
				url : "../libs/chat/send_msg.php",
				type : "POST",
				data : {
				login : login,
				msg : msg
				},
				success : function(data) {
					document.getElementById('chatmsg').value='';
					$.ajax({
						url : "../libs/chat/post_msg.php",
						type: "GET",
						success : function(data) {
							$('#chatwindow').html(data);
						}
					});
				}
		});
		return false;

	});
	  
});

// Scroll Chat and Clear Hash 51:66 
$(document).ready(function(){

	//Scroll Chat
	setInterval(() => {
		$('#chatwindow').animate({
		scrollTop: $('#chatwindow').get(0).scrollHeight}, 3500);
	}, 1000);

	//Clear Hash
	$('.clear__hash').click(function(e){
		window.location.hash = '';
		history.pushState('', document.title, window.location.pathname);
		e.preventDefault();
	});
});

$('.user-balance').click(function() {
	document.getElementById('promo__box').style.display = "block";

	var promoBox = document.getElementById('promo__box');

    window.onclick = function(event) {
        if (event.target == promoBox) {
            promoBox.style.display = "none";
        }
    }
});

$('#hideChat').click(function() {
	$('#hideChat').toggleClass('open__chat close__chat');

	$('#content').animate({width: "toggle"}, 300, function(){});
});
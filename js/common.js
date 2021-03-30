//Load Page 2:6
$(window).on('load', function() {

	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut("slow");
});

//Chat 8:37
$(document).ready(function(){  
          
	$('#submit-msg').click(function() {
		var login = $(this).parent().find('input[name="login"]').val();
		var msg = $(this).parent().find('input[name="msg"]').val();
		var data = $(this).parents('form').serialize()

		$.ajax({
				url : "send_msg.php",
				type : "POST",
				data : {
				login : login,
				msg : msg
				},
				success : function(data) {
					$.ajax({
						url : "chat.php",
						type: "GET",
						success : function(data) {
							document.getElementById('chatmsg').value='';
							$('#chatwindow').html(data);
						}
					});
				}
		});
		return false;

	});
	  
});

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
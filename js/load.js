let classes = ['#chatwindow', '#nvuti', '#login__form', '#register_form', '#promo_box', '#formDonate', '#wheel', '#slots'];	

$.each(classes, function(i) {
	let pages = ['../libs/chat/post_msg.php', '../libs/games/dice/index.html', '../login.html', '../register.html', '../libs/cash/promo/promo.html', '../libs/cash/donate/index.html', '../libs/games/wheel/index.html', '../libs/games/slots/index.php'];

	$(classes[i]).load(pages[i]);
});
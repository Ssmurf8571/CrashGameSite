let classes = ['#chatwindow', '#nvuti', '#wheel', '#login__form', '#register_form', '#promo_box', '#formDonate'];	

$.each(classes, function(i) {
	let pages = ['../libs/chat/post_msg.php', '../libs/games/dice/index.html', '../libs/games/wheel/index.html', '../login.html', '../register.html', '../libs/cash/promo/promo.html', '../libs/cash/donate/index.html'];

	$(classes[i]).load(pages[i]);
});
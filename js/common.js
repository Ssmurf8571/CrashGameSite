
$(window).on('load', function() {

	$(".loader_inner").fadeOut();
	$(".loader").delay(400).fadeOut("slow");
});


$( ".app__nav__language__current" ).click(function() {
  var dropdown_btn_lang = document.getElementById('app__nav__language__dropdown');
  dropdown_btn_lang.classList.toggle("active");
});

$( ".app__nav__page__nightmode" ).click(function() {
  var body_dark__mode = document.body;
  body_dark__mode.classList.toggle("dark-mode");
});




$( "#login_btn" ).click(function() {

	document.getElementById("id01").style.display = "block";


	var modal = document.getElementById('id01');

	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
});


$( ".close" ).click(function() {

	document.getElementById("id01").style.display = "none";
	document.getElementById("id02").style.display = "none";

});

$(".cancelbtn").click(function() {
    document.getElementById("id01").style.display = "none";
	document.getElementById("id02").style.display = "none";
});


$( ".register_btn" ).click(function() {

	document.getElementById("id01").style.display = "none";
	document.getElementById("id02").style.display = "block";


	  var modal = document.getElementById('id02');
  
	  window.onclick = function(event) {
		  if (event.target == modal) {
			  modal.style.display = "none";
		  }
	  }
});
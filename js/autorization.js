//Click Login Form
$( "#login_btn" ).click(function() {

    document.getElementById("id01").style.display = "block";


    var modal = document.getElementById('id01');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

//X-Close Button
$( ".close" ).click(function() {

    document.getElementById("id01").style.display = "none";
    document.getElementById("id02").style.display = "none";

});

//Cansel-Button
$(".cancelbtn").click(function() {
    document.getElementById("id01").style.display = "none";
    document.getElementById("id02").style.display = "none";
});

//Click Register Button
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
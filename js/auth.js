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

$('.clear__hash').click(function(e){
    window.location.hash = '';
    history.pushState('', document.title, window.location.pathname);
    e.preventDefault();
});
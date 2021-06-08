$('#PromoBoxBlock').submit((e)=> {
    e.preventDefault();
    var UserPromo = $('input[name="promo"]').val();

    $.ajax({
        url : "../libs/cash/promo/promo.php",
        type : "POST",
        data : {
            UserPromo : UserPromo,
        },
        success: function(data) {
            $('#newBalancePromo').html(data);
            location.reload();
        }
    });
});

$('.psw.donate').click(function() {
    document.getElementById('promo__box').style.display = 'none';
    $('#formDonate').css('display', 'block');
});

$('.clear__hash').click(function(e){
    window.location.hash = '';
    history.pushState('', document.title, window.location.pathname);
    e.preventDefault();
});
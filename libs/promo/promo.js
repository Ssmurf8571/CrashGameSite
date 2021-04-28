$('#PromoBoxBlock').submit((e)=> {
    e.preventDefault();
    var UserPromo = $('input[name="promo"]').val();

    $.ajax({
        url : "../libs/promo/promo.php",
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
$('#PromoBoxBlock').submit((e)=> {
    e.preventDefault();
    var UserPromo = $('input[name="promo"]').val();

    $.ajax({
        URL : "../libs/promo/promo.php",
        type : "POST",
        data : {
            UserPromo : UserPromo
        },
        success: function(data) {
            $('#MessageBoxPromo').html(data);
        }
    });
});
$(document).ready(function() {

    $(".min_price").click(function() {
        $('#prise_input').val(1);
        funcBetPrice();
    });  
    
    $(".max_price").click(function() {
        var MaxBalance = parseFloat(document.getElementsByClassName("user-balance")[0].innerHTML);
        if (MaxBalance > 1) {
            $('#prise_input').val(MaxBalance);
        }
        
        funcBetPrice();
    });   

    $(".double_price").click(function() {
        var MaxBalance = parseFloat(document.getElementsByClassName("user-balance")[0].innerHTML);
        var priseValue = parseFloat($('#prise_input').val());
        var doubleValue = priseValue * 2;
        doubleValue = Math.ceil((doubleValue)*100) / 100;
        if (doubleValue > MaxBalance) {
            $('#prise_input').val(MaxBalance);
        } else {
            $('#prise_input').val(doubleValue);
        }
        funcBetPrice();
    });   

    $(".half_price").click(function() {
        var priseValue = parseFloat($('#prise_input').val());
        var halfValue = priseValue / 2;
        halfValue = Math.ceil((halfValue)*100) / 100;
        if (halfValue < 1) {
            $('#prise_input').val("1");
        } else {
            $('#prise_input').val(halfValue);
        }
        funcBetPrice();
    }); 
});



$(document).ready(function() {

    document.getElementById('percent_input').addEventListener('input', function() {
        var percentValue = parseFloat($('#percent_input').val());
        if (percentValue >= 95) {
            $('#percent_input').val('95');
            percentValue = 95;
        } if (percentValue < 1) {
            $('#percent_input').val('1');
            percentValue = 1;
        }
    });
});



document.getElementById('prise_input').addEventListener('input', function() {
    var MaxBalance = parseFloat(document.getElementsByClassName("user-balance")[0].innerHTML);
    var priseValue = parseFloat($('#prise_input').val());

    if (priseValue >= MaxBalance) {
        $('#prise_input').val(MaxBalance);
    } if (priseValue < 1) {
        $('#prise_input').val(1);
    } else {
        return false;
    }
});


$(document).ready(function() {

    $(".min_percent").click(function() {
        $('#percent_input').val('1');
        funcBetPrice();
    });  
    
    $(".max_percent").click(function() {
        $('#percent_input').val('95');
        funcBetPrice();
    });   

    $(".double_percent").click(function() {
        var percentValue = parseFloat($('#percent_input').val());
        var doubleValue = percentValue * 2;
        doubleValue = Math.ceil((doubleValue)*100) / 100;
        if (doubleValue > 95) {
            $('#percent_input').val('95');
        } else {
            $('#percent_input').val(doubleValue);
        }
        funcBetPrice();
    });   

    $(".half_percent").click(function() {
        var percentValue = parseFloat($('#percent_input').val());
        var halfValue = percentValue / 2;
        halfValue = Math.ceil((halfValue)*100) / 100;

        if (halfValue < 1) {
            $('#percent_input').val('1');
        } else {
            $('#percent_input').val(halfValue);
        }
        funcBetPrice();
    }); 
});



document.getElementById('percent_input').addEventListener('input', funcBetPrice);
document.getElementById('prise_input').addEventListener('input', funcBetPrice);

funcBetPrice();


function funcBetPrice() {
    var BetPrise = parseFloat($('#prise_input').val());
    var BetPercent = parseFloat($('#percent_input').val());

    var MinPercent = parseInt(BetPercent * 9999);
    var MaxPercent = parseInt(999999 - MinPercent);
    var BetProfit = parseFloat(BetPrise * 100 / BetPercent).toFixed(2);

    document.getElementById('MinPercent').innerHTML = ("<p>0 - " + MinPercent + "</p>");
    document.getElementById('MaxPercent').innerHTML = ("<p>" + MaxPercent + " - 999999</p>");
    document.getElementById('bet__profit').innerHTML = ("<h1>" + BetProfit + "</h1>");
}

$('.betSubmitDice[type="submit"]').click(function() {

    var total = $('#GetFormGame').parent().find('input[name="total"]').val();
    var percent = $('#GetFormGame').parent().find('input[name="percent"]').val();
    var buttonId = $(this).parent().find('input[type="submit"]').val();
    var data = $(this).parents('form').serialize()

    $.ajax({
            url : "../libs/games/dice/game.php",
            type : "POST",
            data : {
                total: total,
                percent: percent,
                buttonId: buttonId,
            },
            success : function(data) {
                $('.betCheckProfit').html(data);
                $('.user-balance').html(document.getElementById('BetBalance').innerHTML);
            }
    });
    return false;

});
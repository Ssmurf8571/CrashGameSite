$(document).ready(function() {
    $('head').append('<link rel="stylesheet" href="../libs/games/wheel/main.css">');
});

function hideInputBox() {
    $('#wheelPost').parent().find('#fa-times').removeClass('active');
    $('#wheelPost').parent().find('#inputBoxX2').removeClass('active');
    $('#wheelPost').parent().find('#inputBoxX3').removeClass('active');
    $('#wheelPost').parent().find('#inputBoxX5').removeClass('active');
    $('#wheelPost').parent().find('#inputBoxX20').removeClass('active');
    $('#wheelPost').parent().find('#selectedValue').removeClass('active X2 X3 X5 X20');
}

$(document).ready(function() {
    let timer; // пока пустая переменная
    let x = 15; // стартовое значение обратного отсчета
    countdown(); // вызов функции
    function countdown(){  // функция обратного отсчета
        document.getElementById('checkTime').innerHTML = x;
        x--; // уменьшаем число на единицу
        if (x<0){
            clearTimeout(timer); // таймер остановится на нуле
            startSpin();
            return;
        }
        else {
            timer = setTimeout(countdown, 1000);
        }
    }
        
        // Create new wheel object specifying the parameters at creation time.
        let theWheel = new Winwheel({
            'outerRadius'     : 150,        // Set outer radius so wheel fits inside the background.
            'innerRadius'     : 115,         // Make wheel hollow so segments don't go all way to center.
            'textFontSize'    : 0,         // Set default font size for the segments.
            'textOrientation' : 'vertical', // Make text vertial so goes down from the outside of wheel.
            'textAlignment'   : 'outer',    // Align text to outside of wheel.
            'numSegments'     : 40,         // Specify number of segments.
            'segments'        :             // Define segments including colour and text.
            [                               // font size and test colour overridden on backrupt segments.
                {'fillStyle' : '#ffd700', 'text' : 'gold'}, //x20
                {'fillStyle' : '#ff0000', 'text' : 'red'}, //x5
                {'fillStyle' : '#32cd32', 'text' : 'green'}, //x2
                {'fillStyle' : '#1e90ff', 'text' : 'blue'}, //x3
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#ff0000', 'text' : 'red'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#ff0000', 'text' : 'red'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#ff0000', 'text' : 'red'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'},
                {'fillStyle' : '#ffd700', 'text' : 'gold'},
                {'fillStyle' : '#ff0000', 'text' : 'red'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#ff0000', 'text' : 'red'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#ff0000', 'text' : 'red'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#ff0000', 'text' : 'red'},
                {'fillStyle' : '#32cd32', 'text' : 'green'},
                {'fillStyle' : '#1e90ff', 'text' : 'blue'}
            ],
            'animation' :           // Specify the animation to use.
            {
                'type'     : 'spinToStop',
                'duration' : 1,    // Duration in seconds.
                'spins'    : 3,     // Default number of complete spins.
                'callbackFinished' : alertPrize,
            },
            'pins' :				// Turn pins on.
            {
                'number'     : 40,
                'fillStyle'  : 'silver',
                'outerRadius': 0,
            }
        });

        // Vars used by the code in this page to do power controls.
        let wheelSpinning = false;

        // -------------------------------------------------------
        // Click handler for spin button.
        // -------------------------------------------------------
        function startSpin()
        {
            resetWheel();
            // Ensure that spinning can't be clicked again while already running.
            if (wheelSpinning == false) {
                // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                // to rotate with the duration of the animation the quicker the wheel spins.
                    theWheel.animation.spins = 3;


                // Begin the spin animation by calling startAnimation on the wheel object.
                theWheel.startAnimation();

                // Set to true so that power can't be changed and spin button re-enabled during
                // the current animation. The user will have to reset before spinning again.
                wheelSpinning = true;
            }
        }

        // -------------------------------------------------------
        // Function for reset button.
        // -------------------------------------------------------
        function resetWheel()
        {
            theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
            theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
            theWheel.draw();                // Call draw to render changes to the wheel.

            wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
        }

        // -------------------------------------------------------
        // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
        // -------------------------------------------------------
        function alertPrize(indicatedSegment)
        {
            // Just alert to the user what happened.
            // In a real project probably want to do something more interesting than this with the result.

            

            console.log("You have won " + indicatedSegment.text);

            var X2 = $('#inputBoxX2').val();
            var X3 = $('#inputBoxX3').val();
            var X5 = $('#inputBoxX5').val();
            var X20 = $('#inputBoxX20').val();
            var win = indicatedSegment.text;

            $.ajax({
                url: "../libs/games/wheel/wheel.php",
                method: "POST",
                data: {
                    X2 : X2,
                    X3 : X3,
                    X5 : X5,
                    X20 : X20,
                    win : win
                },
                success : function(data) {
                    $('#UserBalanceWheel').html(data);
                    $('.user-balance').html(document.getElementById('UserBalanceWheel').innerHTML);
                }
            });

            document.getElementById('inputBoxX2').value='';
            document.getElementById('inputBoxX3').value='';
            document.getElementById('inputBoxX5').value='';
            document.getElementById('inputBoxX20').value='';

            hideInputBox();

            countdown(x = 15);
        }
});

$(document).ready(function() {
    $('#buttonX2').click(function() {
        hideInputBox();
        $('#wheelPost').parent().find('#fa-times').addClass('active');
        $('#wheelPost').parent().find('#inputBoxX2').addClass('active');
        $('#wheelPost').parent().find('#selectedValue').addClass('active X2');
    });

    $('#buttonX3').click(function() {
        hideInputBox();
        $('#wheelPost').parent().find('#fa-times').addClass('active');
        $('#wheelPost').parent().find('#inputBoxX3').addClass('active');
        $('#wheelPost').parent().find('#selectedValue').addClass('active X3');
    });

    $('#buttonX5').click(function() {
        hideInputBox();
        $('#wheelPost').parent().find('#fa-times').addClass('active');
        $('#wheelPost').parent().find('#inputBoxX5').addClass('active');
        $('#wheelPost').parent().find('#selectedValue').addClass('active X5');
    });

    $('#buttonX20').click(function() {
        hideInputBox();
        $('#wheelPost').parent().find('#fa-times').addClass('active');
        $('#wheelPost').parent().find('#inputBoxX20').addClass('active');
        $('#wheelPost').parent().find('#selectedValue').addClass('active X20');
    });

    $('#fa-times').click(function() {
        $('input[type=number].active').val('');
    });
});


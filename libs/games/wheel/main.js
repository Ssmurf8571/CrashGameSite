$(document).ready(function() {
    $('#buttonX2').click(function() { $('#checkboxX2').prop('checked', true); });
    $('#buttonX3').click(function() { $('#checkboxX3').prop('checked', true); });
    $('#buttonX5').click(function() { $('#checkboxX5').prop('checked', true); });
    $('#buttonX20').click(function() { $('#checkboxX20').prop('checked', true); });
});

function CheckCheckBox() {
   if($('#checkboxX2').is(':checked')) { var X2 = $('#checkboxX2').val(); } else { X2 = "" }
   if($('#checkboxX3').is(':checked')) { var X3 = $('#checkboxX3').val(); } else { X3 = "" }
   if($('#checkboxX5').is(':checked')) { var X5 = $('#checkboxX5').val(); } else { X5 = "" }
   if($('#checkboxX20').is(':checked')) { var X20 = $('#checkboxX20').val(); } else { X20 = "" }
}

$(document).ready(function() {
    let timer; // пока пустая переменная
        let x = 3; // стартовое значение обратного отсчета
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

            if($('#checkboxX2').is(':checked')) { var X2 = $('#checkboxX2').val(); } else { X2 = "" }
            if($('#checkboxX3').is(':checked')) { var X3 = $('#checkboxX3').val(); } else { X3 = "" }
            if($('#checkboxX5').is(':checked')) { var X5 = $('#checkboxX5').val(); } else { X5 = "" }
            if($('#checkboxX20').is(':checked')) { var X20 = $('#checkboxX20').val(); } else { X20 = "" }

            $.ajax({
                url: "../libs/games/wheel/wheel.php",
                method: "POST",
                data: {
                    X2 : X2,
                    X3 : X3,
                    X5 : X5,
                    X20 : X20
                },
                success : function(data) {
                    $('#testdiv').html(data);
                }
            });

            countdown(x = 15);
        }
});
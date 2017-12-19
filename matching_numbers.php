<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="jquery.ui.touch-punch.min.js"></script>
<script>
    jQuery(document).ready(function($){

        // SHUFFLE ARRAY FUNCTION
        function shuffle(array) {
            var currentIndex = array.length,
                temporaryValue, randomIndex;
            // While there remain elements to shuffle...
            while (0 !== currentIndex) {
                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;
                // And swap it with the current element.
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }
            return array;
        }

        var optionsArr = [1, 2, 3, 4, 5, 6, 7, 8];
        optionsArr = shuffle(optionsArr);
        optionsArr = optionsArr.slice(0,4);            

        for (i = 0; i < optionsArr.length; i++) {

           $('.targets').append('<div class="col-xs-3 target_holder"><div id="target_'+optionsArr[i]+'" class="ui-widget-content"><p>TARGET '+optionsArr[i]+'</p></div></div>');                  
           $('.numbers').append('<div class="col-xs-3 number_holder"><div id="number_'+optionsArr[i]+'" class="ui-widget-header"><p>NUMBER '+optionsArr[i]+'</p></div></div>');

           function fireDroppable(number) {
             $('#number_' + number).droppable({
                 accept: '#target_' + number,
                 drop: function(event, ui) {
                     $(this)
                         .addClass("ui-state-highlight")
                         .find("p")
                         .html("Dropped!");
                     $(this).html(ui.draggable.remove().html());
                     $(this).droppable('destroy');
                 }
             });
           }

           $('#target_' + optionsArr[i]).draggable({revert: "invalid"});
           fireDroppable(optionsArr[i]);

        }

    });
</script>

<div class="numbers clearfix"></div>

<hr/>

<div class="targets clearfix"></div>
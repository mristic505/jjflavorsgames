jQuery(document).ready(function($) {

    // CONFIGURE SPINNER ================================ 
    var options = {
        prices: [{
                name: 'Fruit <br>Punch',
                bg: '#df2626',
                slug: 'fruit_punch'
            },
            {
                name: 'Strawberry <br>Watermelon',
                bg: '#f27e5a',
                slug: 'str_melon'
            },
            {
                name: 'Kiwi <br>Strawberry',
                bg: '#f97799',
                slug: 'kiwi_str'
            },
            {
                name: 'Apple <br>Raspberry',
                bg: '#d31a68',
                slug: 'apple_ras'
            },
            {
                name: 'Cherry',
                bg: '#b92654',
                slug: 'cherry'
            },
            {
                name: 'Cranberry <br>Apple',
                bg: '#892433',
                slug: 'cran_apple'
            },
            {
                name: 'Passion <br>Dragonfruit',
                bg: '#9c2164',
                slug: 'pdrfr'
            },
            {
                name: 'Grape',
                bg: '#94398b',
                slug: 'grape'
            },
            {
                name: 'Berry',
                bg: '#477bbd',
                slug: 'berry'
            },
            {
                name: 'Grand Prize',
                bg: '#fff',
                slug: 'hurricane_white'
            },
            {
                name: 'Tropical',
                bg: '#138995',
                slug: 'tropical'
            },
            {
                name: 'Apple',
                bg: '#65a521',
                slug: 'apple'
            },
            {
                name: 'White <br>Grape',
                bg: '#9ca943',
                slug: 'w_grape'
            },
            {
                name: 'Strawberry <br>Banana',
                bg: '#fec53d',
                slug: 'str_ban'
            },
            {
                name: 'Orange <br>Tangerine',
                bg: '#f18a23',
                slug: 'or_tang'
            },
            {
                name: 'Peach <br>Apple',
                bg: '#f27e5a',
                slug: 'p_apple'
            },
            {
                name: 'Mango',
                bg: '#e5541b',
                slug: 'mango'
            }
        ],
        duration: 3500,
        clockWise: false,
        min_spins: 1, // The minimum number of spins 
        max_spins: 10, // The maximum number of spins
    };

    var $r = $('.roulette').fortune(options);

    var clickHandler = function() {
        $('.spin').off('click');
        $('.spinner span').hide();
        //var price = Math.floor((Math.random() * 8));
        $r.spin(9).done(function(price) {
            if (price.name == "Grand Prize") {
                   window.location.href = '?page=spin&play=pcf';                             
            } else {
                $('.prize_info')
                    .html(function() {
                        setTimeout(function() {
                            
                            $('.wheel_logo').fadeOut(600); 
                        }, 0);
                        setTimeout(function() {
                            $('.prize_info span').html('<span>'+price.name+'</span>').fadeIn();
                        }, 700);
                        setTimeout(function() {
                            $('.prize_info span').fadeOut();
                        }, 2000);
                        setTimeout(function() {
                            $('.prize_info span').html('<img src="img/bottles/' + price.slug + '.png">').fadeIn();
                        }, 2500);
                    });
                   
            }
            // console.log(price.name);
            // $('.spinner').css('background-color', price.bg);
            $('#prize_hurricane')
                .attr('src', 'img/' + price.slug + '.png')
                .css('opacity', 1);
            // $('.spin').on('click', clickHandler);
            $('.spinner span').show();
        });
    };
    

    $('.spin').on('click', clickHandler);

    // if($('.spin_holder').hasClass('registered')) {
    //     $("#roulette").swipe( {
    //         swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
    //           // $("#test").text("You swiped " + direction + " with " + fingerCount + " fingers");
    //           document.getElementById('spin_btn_1').click();
    //         },
    //         threshold:0,
    //         fingers:'all'
    //     });
    // }


    // END OF SPINNER CONFIG ====================================


    /***************** REGISTRATION FORM ******************/

    $('#register').submit(function() {
        // Clear Form Errors
        $('.has-error').each(function() { $(this).removeClass('has-error'); });
        $('label[for="age"]').removeClass('red');
        // Get form data
        var formData = $(this).serialize();
        // Process the form
        $.ajax({
            type: 'POST',
            url: 'process.php',
            data: formData,
            dataType: 'json',
            encode: true
        }).done(function(data) {
            console.log(data);

            // if errors exist
            if (!data.success) {
                if (data.errors.email) {
                    $('#email-group').addClass('has-error');
                }
                if (data.errors.age) {
                    $('#age-group').addClass('has-error');
                }
                if (data.errors.recaptcha) {
                    $('#recaptcha').addClass('has-error');
                }
            }
            // if no errors
            else {
                console.log(data.safety_string);
                // $('#register').append('<div class="alert alert-success">' + data.message + '</div>');
                var form = '<form id="safety" action="?page=spin" method="POST"><input type="hidden" name="dsid" id="dsid" value="' + data.safety_string + '"></form>';
                $('body').append(form);
                $('#safety').submit();
            }
        });

        event.preventDefault();
    });

    /***************** PRIZE CLAIM FORM ******************/

    $('#prize_form').submit(function() {
        // Clear Form Errors
        $('.has-error').each(function() { $(this).removeClass('has-error'); });
        $('label[for="age"]').removeClass('red');
        $('.help-block').each(function(){
            $(this).remove();
        });
        // Get form data
        var formData = $(this).serialize();
        // Process the form
        $.ajax({
            type: 'POST',
            url: 'process_prize_claim.php',
            data: formData,
            dataType: 'json',
            encode: true
        }).done(function(data) {
            console.log(data);

            // if errors exist
            if (!data.success) {                  
                if (data.errors.first_name) {
                    $('#first-name-group').addClass('has-error');
                }  
                if (data.errors.last_name) {
                    $('#last-name-group').addClass('has-error');
                } 
                if (data.errors.email) {
                    $('#email-group').addClass('has-error');
                }               
                if (data.errors.email_conf) {
                    $('#email-conf-group').addClass('has-error');
                }
                if (data.errors.email_invalid) {
                    $('#email-group').addClass('has-error').append('<div class="help-block">' + data.errors.email_invalid + '</div>');
                }
                if (data.errors.email_conf_invalid) {
                    $('#email-conf-group').addClass('has-error').append('<div class="help-block">' + data.errors.email_conf_invalid + '</div>');
                }
                if (data.errors.email_mismatch) {
                    $('.email-group-holder').addClass('has-error').append('<div class="help-block">' + data.errors.email_mismatch + '</div>');
                }
                if (data.errors.address_1) {
                    $('#address-group').addClass('has-error');
                }
                if (data.errors.city) {
                    $('#city-group').addClass('has-error');
                }
                if (data.errors.state) {
                    $('#state-group').addClass('has-error');
                }  
                if (data.errors.zip) {
                    $('#zip-group').addClass('has-error');
                }  
                if (data.errors.legal) {
                    $('#legal-group').addClass('has-error');
                }       
                console.log(data.errors);
            }
            // if no errors
            else {
                // console.log(data.safety_string);
                // // $('#register').append('<div class="alert alert-success">' + data.message + '</div>');
                // var form = '<form id="safety" action="?page=spin" method="POST"><input type="hidden" name="dsid" id="dsid" value="' + data.safety_string + '"></form>';
                // $('body').append(form);
                // $('#safety').submit();
                $('.thank_you_prize_claim').addClass('visible_on');
                $('.pcf_title, .pfi').addClass('visible_off');
                $('#prize_form').removeClass('visible_on');
                $('html, body').animate({
                    scrollTop: $(".logo-2").offset().top
                }, 500);

            }
        });

        event.preventDefault();
    });

    $('.rules_link').click(function(){
        window.location.href = '?page=official-rules';
    });

    /********************** MEMORY MATCH ********************/

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    var play = getParameterByName('play');
    if (play == 'grape') {
        $('.game_holder').css('background', 'url(memory-images/grape_bg.png)');
        end_message = '“White” grapes are <br>actually green.';
        end_fruit = 'grape';
    }
    if (play == 'cherry') {
        $('.game_holder').css('background', 'url(memory-images/cherry_bg.png)');
        end_message = 'The world record <br>for cherry pit-spitting <br>is a whopping <br>93 feet 6.5 inches.';
        end_fruit = 'cherry';
    }
    if (play == 'kiwi-strawberry') {
        $('.game_holder').css('background', 'url(memory-images/kiwi_strawberry_bg.png)');
        end_message = 'Kiwis and strawberries<br>both have more<br>Vitamin C than oranges.';
        end_fruit = 'kiwi_str';
    }
    if (play == 'pcf') {
        $('#roulette').prepend('<div style="z-index: 99999;" id="register"> <div class="clearfix prc_holder"> <h1 class="h1_title">Congratulations!</h1> <img class="prc_boy_big" src="img/boy_big.png"> <div class="prc_wheel_copy"> <div class="prc1">You are a potential prizewinner.</div><div class="prc2">As soon as we receive your prize claim form and verify your compliance with the Official Rules and game play validation, you will be named an OFFICIAL WINNER! <br><br>To get started, please complete: </div><a class="spin_btn prc_btn" href="?page=prize-claim-form">PRIZE CLAIM FORM</a> </div></div><div class="ghost"></div></div>');
        $('.spin_holder').after('<div  class="overlay"></div>');
        $('#roulette .spinner').hide();
    }

    function end_action(end_message_holder, end_fruit_holder) {
        $('.memory_game_board').append($('<div class="completed_holder"> <img class="you_did_it" src="img/you_did_it.png"> <div class="ctext">You’ve completed the Memory Match Game.</div><div class="message_board"> <div class="holder"> <img class="fruit_fact_head" src="img/fruit_fact_head_'+end_fruit_holder+'.png"> <div class="fruit_fact_info">'+end_message_holder+'</div></div><div class="ghost"></div><img class="girl" src="img/girl.png"> <img class="fruit_fact" src="img/fruit_fact_'+end_fruit_holder+'.png"> </div><div class="end_ctas"><a class="play_again" href="">PLAY AGAIN <span class="glyphicon glyphicon-play" aria-hidden="true"></span></a><a class="spin_again" href="/flavordiscovery/">SPIN <span class="glyphicon glyphicon-play" aria-hidden="true"></span></a><br><a class="get_coupon_btn" href="#">GET COUPON</a></div></div>').hide().fadeIn(1000));
    }    

    $.fn.shuffle = function() {
        var allElems = this.get(),
            getRandom = function(max) {
                return Math.floor(Math.random() * max);
            },
            shuffled = $.map(allElems, function() {
                var random = getRandom(allElems.length),
                    randEl = $(allElems[random]).clone(true)[0];
                allElems.splice(random, 1);
                return randEl;
            });
        this.each(function(i) {
            $(this).replaceWith($(shuffled[i]));
        });
        return $(shuffled);
    }

    $('.clickme').shuffle();

    $(".clickme").flip({
        axis: 'x',
        trigger: 'manual'
    });

    var selected_values = [];
    var i = 0;    
    $('.clickme').click(function() {

        // If not clicked on the same card
        if (!$(this).hasClass('selected')) {
            i++;
            $(this)
                .stop()
                .flip(true)
                .addClass('selected');                 
            selected_values.push($(this).attr('data-value'));
            console.log(selected_values);
            if(i==2) {
                if (selected_values[1] == selected_values[0]) {
                    $('.selected').each(function() {
                        $(this).removeClass('clickme').removeClass('selected').delay(2000).addClass('solved');
                    });
                }
                // else {
                //     $('.clickme').removeClass('selected')
                //     setTimeout(function() {
                //         $('.clickme').stop().flip(false);
                //     }, 600); 
                // }
                selected_values = [];
            } 
            if(i>2) {
                $('.clickme').not(this).removeClass('selected').stop().flip(false);
                i = 1;                
            } 
            if($('.clickme').length == 0) {
                setTimeout(function() {
                    end_action(end_message, end_fruit);
                }, 1500);                
            }
        } 
    });
    // end_action(end_message, end_fruit);

    $('.start-game-button').click(function(){
        $('.completed_holder').fadeOut(function(){
            setTimeout(function() {
                     $('.completed_holder').remove();
                }, 1000);
        });
    });

    // $('#roulette').prepend('<div style="z-index: 99999;" id="register"> <div class="clearfix prc_holder"> <h1 class="h1_title">Congratulations!</h1> <img class="prc_boy_big" src="img/boy_big.png"> <div class="prc_wheel_copy"> <div class="prc1">You are a potential prizewinner.</div><div class="prc2">As soon as we receive your prize claim form and verify your compliance with the Official Rules and game play validation, you will be named an OFFICIAL WINNER! <br><br>To get started, please complete: </div><a class="spin_btn prc_btn" href="?page=prize-claim-form">PRIZE CLAIM FORM</a> </div></div><div class="ghost"></div></div>');
    // $('.spin_holder').after('<div class="overlay"></div>');
    // $('#roulette .spinner').hide();
    

});
<?php
    if(isset($_GET['play'])){
        if($_GET['play'] == 'apple_raspberry'){
            $game_title = "<img src='assets/game_end/apple_raspberry_title.png'>";
            $message_box_image = " <img class='game-end-image' src='assets/game_end/apple_raspberry_bg.png'>";
            $message_box_message = "Apples and raspberries are both members of the rose family.";
        }elseif($_GET['play'] == 'straw_watermelon'){
            $game_title ="<img src='assets/game_end/straw_watermelon_title.png'>";
            $message_box_image = " <img class='game-end-image' src='assets/game_end/straw_watermelon_bg.png'>";
            $message_box_message = "Japanese farmers grow square watermelons because they’re easier to stack and store.";
        }else{
            $game_title ="<img src='assets/game_end/grape_title.png'>";
            $message_box_image = " <img class='game-end-image' src='assets/game_end/grape_bg.png'>";
            $message_box_message = "The oldest grapevine in America is a 400-year-old Scuppernong vine in North Carolina.";
        }
    }else{
        $game_title ="<img src='assets/game_end/grape_title.png'>";
        $message_box_image = " <img class='game-end-image' src='assets/game_end/grape_bg.png'>";
        $message_box_message = "The oldest grapevine in America is a 400-year-old Scuppernong vine in North Carolina.";
    }

?>      

<div class="game-end-wrapper">
    <img class="you-did-it-title" src="assets/game_end/great_job.png">
    <h2>You popped <span id="popped-fruits"></span> fruits. That’s super juicy!</h2>
    <div class="game-end-message-container">
        <?=$game_title?>
        <p><?=$message_box_message?></p>
    </div>
    <?=$message_box_image?>
    <div class="bottom-cta-container">
            <a href="index.php" class="play-again cta">PLAY AGAIN <img src="assets/arrow.png"></a>
            <a class="spin cta" href="">SPIN <img src="assets/arrow.png"></a>
            <a href="" class="get-coupon-button">GET COUPON</a>
    </div>
</div>
    

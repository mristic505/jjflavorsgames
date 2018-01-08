  <link rel="stylesheet" href="pop-a-fruit-style.css?v=4.0">
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script> 
  <script src="js/pop-a-fruit-main.js?v=4.0"></script>
  <script src="js/jquery.ui.touch-punch.min.js"></script>

    <?php 
    if(isset($_GET['play'])){
        if($_GET['play']=='apple_raspberry') {
            $class = "apple-raspberry";
            $fruit_type = "apple";
        }elseif($_GET['play'] == 'straw_watermelon'){
            $class = "watermelon";
            $fruit_type = "watermelon";
        }else{
            $class = "grape";
            $fruit_type = "grape";
        }
    }else{
        $class = "grape";
        $fruit_type = "grape";
    }
    ?>

    <div class="main-wrapper pop-a-fruit clearfix <?=$class?>">
        <div class="game-container">
            <div class="puzzle-background clearfix">
                <div id="game-counter">30</div>    
                <div class="section-1 sections">
                    <div class="hole-container two-holes-first <?=$fruit_type?>">
                        <div class="fruit-container fruit-0 <?=$fruit_type?>" fruit-id="0" draggable="false"></div>
                    </div>
                    <div class="hole-container two-holes-second <?=$fruit_type?>">
                        <div class="fruit-container fruit-1 <?=$fruit_type?>" fruit-id="1" draggable="false"></div>
                    </div>
                </div>
                <div class="section-2 sections">
                    <div class="hole-container three-holes-first <?=$fruit_type?>">
                        <div class="fruit-container fruit-2 <?=$fruit_type?>" fruit-id="2" ></div>
                    </div>
                    <div class="hole-container three-holes-second <?=$fruit_type?>">
                        <div class="fruit-container fruit-3 <?=$fruit_type?>" fruit-id="3" ></div>
                    </div>
                    <div class="hole-container three-holes-third <?=$fruit_type?>">
                        <div class="fruit-container fruit-4 <?=$fruit_type?>" fruit-id="4" ></div>
                    </div>
                </div>
                <div class="section-3 sections">
                    <div class="hole-container two-holes-first <?=$fruit_type?>">
                        <div class="fruit-container fruit-5 <?=$fruit_type?>" fruit-id="5" draggable="false"></div>
                    </div>
                    <div class="hole-container two-holes-second <?=$fruit_type?>">
                        <div class="fruit-container fruit-6  <?=$fruit_type?>" fruit-id="6" draggable="false"></div>
                    </div>
                </div>
                <div class="section-4 sections"></div>
            </div>
            
            <div class="how-to-play-wrapper">
                <div class="how-to-play-container">
                    <img class="how-to-play-title" src="assets/pop-a-fruit/game_start/game_title.png">
                    <h2 class="how-to-play-subtitle">HOW TO PLAY</h2>
                    <p>Click on the fruit before<br/> it disappears. How many can<br/>you pop in 30 seconds?</p>
                    <button class="start-game-button">PLAY</button>
                </div>
            </div>
            
            <?php
            if(isset($_GET['play'])){
                if($_GET['play'] == 'apple_raspberry'){
                    $game_title = "<img src='assets/pop-a-fruit/game_end/apple_raspberry_title.png'>";
                    $message_box_image = " <img class='game-end-image' src='assets/pop-a-fruit/game_end/apple_raspberry_bg.png'>";
                    $message_box_message = "Apples and raspberries are both members of the rose family.";
                }elseif($_GET['play'] == 'straw_watermelon'){
                    $game_title ="<img src='assets/pop-a-fruit/game_end/straw_watermelon_title.png'>";
                    $message_box_image = " <img class='game-end-image' src='assets/pop-a-fruit/game_end/straw_watermelon_bg.png'>";
                    $message_box_message = "Japanese farmers grow square watermelons because they’re easier to stack and store.";
                }else{
                    $game_title ="<img src='assets/pop-a-fruit/game_end/grape_title.png'>";
                    $message_box_image = " <img class='game-end-image' src='assets/pop-a-fruit/game_end/grape_bg.png'>";
                    $message_box_message = "The oldest grapevine in America is a 400-year-old Scuppernong vine in North Carolina.";
                }
            }else{
                $game_title ="<img src='assets/pop-a-fruit/game_end/grape_title.png'>";
                $message_box_image = " <img class='game-end-image' src='assets/pop-a-fruit/game_end/grape_bg.png'>";
                $message_box_message = "The oldest grapevine in America is a 400-year-old Scuppernong vine in North Carolina.";
            }

            ?>      

            <div class="game-end-wrapper">
                <img class="you-did-it-title" src="assets/pop-a-fruit/game_end/great_job.png">
                <h2 class="popped-fruits">You popped <span id="popped-fruits"></span> fruits. That’s super juicy!</h2>
                <h2 class="failed-to-pop-fruits">You did not pop any fruits!</h2>
                <div class="game-end-message-container">
                    <?=$game_title?>
                    <p><?=$message_box_message?></p>
                </div>
                <?=$message_box_image?>
                <div class="bottom-cta-container">
                        <a href="index.php" class="play-again cta">PLAY AGAIN <img src="assets/pop-a-fruit/arrow.png"></a>
                        <a class="cta" href="">SPIN <img src="assets/pop-a-fruit/arrow.png"></a>
                        <a href="" class="get-coupon-button">GET COUPON</a>
                </div>
            </div>
                

        </div>   
    </div>
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

    <div class="main-wrapper clearfix <?=$class?>">
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
            <?php include('game_start.php');?>
            <?php include('game_end.php');?>
        </div>   
    </div>
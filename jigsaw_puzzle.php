    <link rel="stylesheet" href="jigsaw-puzzle-style.css?v=1.0">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script> 
    <script src="js/jigsaw-puzzle.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>

    <?php 
        if(isset($_GET['play'])){
            if($_GET['play']=='cranberry'){
                $class = "cranberry-apple";
            }elseif($_GET['play'] == 'peach'){
                $class = "peach-apple";
            }else{
                $class = "tropical";
            }
        }else{
            $class = "tropical";
        }
    ?>
    <div class="main-wrapper clearfix <?=$class?> jigsaw-puzzle">
        <div class="puzzle-sidebar" id="puzzle-left-sidebar">&nbsp;</div>
        <div class="puzzle-container">
            <div class="how-to-play-wrapper">
                <div class="how-to-play-container">
                    <img class="how-to-play-title" src="assets/jigsaw_puzzle/juicy_jigsaw_title.png">
                    <h2>HOW TO PLAY</h2>
                    <p>Drag each puzzle piece to the correct spot to complete the fruity scene.</p>
                    <button class="start-game-button">PLAY</button>
                </div>
            </div>
        
        <div class="game-end-wrapper">
            <img class="you-did-it-title" src="assets/jigsaw_puzzle/game_end/you_did_it.png">
            <h2>You've completed 100% of the juicy jigsaw</h2>
            <div class="game-end-message-container">
                <?php
                    if(isset($_GET['play'])){
                        if($_GET['play']=='cranberry'){
                            echo " <img src='assets/jigsaw_puzzle/game_end/cranberry_apple_title.png'>";
                        }elseif($_GET['play'] == 'peach'){
                            echo " <img src='assets/jigsaw_puzzle/game_end/peach_apple_title.png'>";
                        }else{
                            echo " <img src='assets/jigsaw_puzzle/game_end/pineapple_title.png'>";
                        }
                    }else{
                        echo " <img src='assets/jigsaw_puzzle/game_end/pineapple_title.png'>";
                    }
                ?>
                <p>
                <?php
                    if(isset($_GET['play'])){
                        if($_GET['play']=='cranberry'){
                            echo "Cranberries bounce! Because they have a tiny pouch of air, when you drop one, it might jump right back at you.";
                        }elseif($_GET['play'] == 'peach'){
                            echo "Georgia is known as the Peach State but California grows more peaches than any other state.";
                        }else{
                            echo "Stand a pineapple upside down to make it ripen more quickly.";
                        }
                    }else{
                        echo "Stand a pineapple upside down to make it ripen more quickly. ";
                    }
                ?>
                </p>
            </div>
            <?php
                    if(isset($_GET['play'])){
                        if($_GET['play']=='cranberry'){
                            echo " <img class='game-end-image' src='assets/jigsaw_puzzle/game_end/cranberry_apple_bg.png'>";
                        }elseif($_GET['play'] == 'peach'){
                            echo " <img class='game-end-image' src='assets/jigsaw_puzzle/game_end/peach_apple_bg.png'>";
                        }else{
                            echo " <img class='game-end-image' src='assets/jigsaw_puzzle/game_end/pineapple_bg.png'>";
                        }
                    }else{
                        echo " <img class='game-end-image' src='assets/jigsaw_puzzle/game_end/pineapple_bg.png'>";
                    }
                ?>
        <div class="bottom-cta-container">
                <a href="" class="play-again puzzle-cta">PLAY AGAIN <img src="assets/jigsaw_puzzle/arrow.png"></a>
                <a class="puzzle-spin puzzle-cta" href="?page=spin">SPIN <img src="assets/jigsaw_puzzle/arrow.png"></a>
                <a href="?page=coupon" class="get-coupon-button">GET COUPON</a>
        </div>
        </div>
            <div class="puzzle-background clearfix">


                <?php for($i = 0; $i < 16; $i++): ?>
                    <div class="puzzle-piece-container">
                        <div class="piece-<?=$i?>-drop drop-container" piece-number="<?=$i?>"> 
                            <div class="puzzle-piece piece-<?=$i?>" >
                                <?php 
                                    if(isset($_GET['play'])){
                                        if($_GET['play']=='cranberry'){
                                            $class = "cranberry-apple";
                                            echo '<img src="assets/jigsaw_puzzle/puzzles/cranberry_apple/pieces/thumbnails/'.$i.'.png" alt="">';
                                        }elseif($_GET['play'] == 'peach'){
                                            echo '<img src="assets/jigsaw_puzzle/puzzles/peach_apple/pieces/thumbnails/'.$i.'.png" alt="">';
                                        }else{
                                            echo '<img src="assets/jigsaw_puzzle/puzzles/tropical/pieces/thumbnails/'.$i.'.png" alt="">';
                                        }
                                    }else{
                                        echo '<img src="assets/jigsaw_puzzle/puzzles/tropical/pieces/thumbnails/'.$i.'.png" alt="">';                                        
                                    }
                                ?>
                                <div class="puzzle-piece-image">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor;?>
            </div>
        </div>
            
            <div class="puzzle-sidebar" id="puzzle-right-sidebar">&nbsp;</div>

            <div class="puzzle-bottom-bar clearfix"></div>
    </div>
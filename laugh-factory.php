
    <link rel="stylesheet" type="text/css" href="laugh-factory-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=0.6">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<body>
    <!-- Slide show container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides slidefade slide1">
    <h1 id="introParagraph">Experience lots of laughs as you click through<br>this fruity fun.</h1>
    <button id="startJokesBtn" onclick="plusSlides(1)">GET STARTED</button>
  </div>

  <div class="mySlides slidefade">
    <h1 class="joke"></h1>
    <h2 class="answerBtn">SEE ANSWER &#9654;</h2>
    <a class="prev">&#10094;</a>
    <a class="next">&#10095;</a>
  </div>

  <div class="mySlides slidefade slide3">
    <h1 id="lastSlideText">Share these jokes with your friends and family</h1>
    <h2 id="fruitFactTitle">Fun Fruity Fact</h2>
    <p id="fruityFact"></p>
    <div id="slide3-BtnGroup">
      <button id="jokesAgainBtn" onclick="plusSlides(-1)">SEE JOKES AGAIN<img class="rightArrow" src="img/rightArrow.png"></button>
      <button id="spinBtn">SPIN<img class="rightArrow" src="img/rightArrow.png"></button>
      <button id="getCoupBtn">GET COUPON</button>
    </div>  
  </div>
  

  <!-- Next and previous buttons -->
</div>
<br>

<!-- The dots/circles -->
<div style="text-align: center;">
  <span style="display: none;" class="dot" onclick="currentSlide(1)"></span> 
  <span style="display: none;" class="dot" onclick="currentSlide(2)"></span> 
  <span style="display: none;" class="dot" onclick="currentSlide(3)"></span> 
</div>

  <script type="text/javascript" src="laugh-factory-script.js"></script>
</body>
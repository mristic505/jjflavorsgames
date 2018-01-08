// Jokes are on the even indexes starting at zero
// Punchlines fall on the odd indexes


var orangeJokes = [

                    "Why did the orange stop in the middle of the road?", "Because it ran out of juice!",
                    "What school subject is the fruitiest?", "History because it's full of dates!",
                    "What is a vampire\'s favorite fruit?", "A neck-tarine!",
                    "When do you go on red and stop at green?", "When you\'re eating a watermelon",
                    "What do you call an orange that plays the trumpet?","A tooty fruity",
                    "What are twins\' favorite fruit?", "Pears.",
                    "Why do oranges wear suntan lotion?", "Because they peel.",
                    "What kind of fruit can fix your sink?", "A PLUM-ber"
]

var appleJokes = [

                    "What did the apple tree say to the hungry caterpillar?", "Leaf me alone.",
                    "What kind of apple isn\'t an apple?", "A pineapple!",
                    "What did the apple tree say to the farmer?", "Stop picking on me.",
                    "What can a whole apple do that half an apple can\'t do?", "It can look round!",
                    "What did the apple skin say to the apple?", "I\'ve got you covered!",
                    "What\'s red and goes up and down?", "An apple in an elevator!",
                    "Why did the apple go to the doctor?", "It felt rotten to the core.",
                    "Why was the apple alone with the orange?", "Because the banana split."
]

var strawberryBananaJokes = [

                    "Why did the banana go to the doctor?", "Because it wasn\'t peeling well.",
                    "What kind of shoes are made from banana peels?", "Slippers.",
                    "Why was the baby strawberry sad?", "Because its mom was in a jam.",
                    "What key opens a banana?", "A mon-key.",
                    "Why aren\'t bananas ever lonely?", "Because they come in bunches!",
                    "What do you call a sad strawberry?", "A blueberry.",
                    "What do you call a banana that likes to dance?", "A banana shake!",
                    "What is a ghost\'s favorite fruit?", "A Boo-nana."

]

var jokesList = orangeJokes.concat(appleJokes,strawberryBananaJokes);

// SLIDE SHOW CODE

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}

// var count = 0;

$(".prev, .next").click(function(){
    $(".answerBtn").html("SEE ANSWER &#9654;");
});

var count = 0; 

//Query String CODE
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


// ORANGE SECTION
if (play == 'orange') {

    $("#startJokesBtn").click(function(){

        $(".mySlides").addClass("orangeBg");
        $(".joke").html(orangeJokes[count]);
    });

    $(".next").click(function(){
    
        if (count > orangeJokes.length) {
            
            currentSlide(3);
            $("#fruitFactTitle").addClass("orange");
            $("#fruityFact").html("Not all oranges are orange");
            $(".mySlides").addClass("orangeImg");

        }else {

            $(".joke").html(orangeJokes[count]);
            count += 2;
        }

    });
    $("#jokesAgainBtn").click(function(){
        count = 0;
            $("#fruitFactTitle").removeClass("orange");
            $("#fruityFact").html();
            $(".mySlides").removeClass("orangeImg");
    });

    $(".answerBtn").click(function() {
        
        $(".answerBtn").html(orangeJokes[count + 1]);
    });
}


// APPLE SECTION
if (play == 'apple') {

    

    $("#startJokesBtn").click(function(){

        $(".mySlides").addClass("appleBg");
        $(".joke").html(appleJokes[count]);
        
    });
    $(".next").click(function(){
        
        if (count > appleJokes.length) {
            
            currentSlide(3);
            $("#fruitFactTitle").addClass("green");
            $("#fruityFact").html("Apples float in water because they are 25% air.");
            $(".mySlides").addClass("appleImg");

        }
    
        $(".joke").html(appleJokes[count]);
        
        count += 2;

    });
    $(".prev").click(function(){
        if (count < 2) {
            //do nothing
        }else {
            count -= 2;
            $(".joke").html(appleJokes[count]);
        }
    });
    $("#jokesAgainBtn").click(function(){
        
        count = 0;
        
        $("#fruitFactTitle").removeClass("green");
        $("#fruityFact").html();
        $(".mySlides").removeClass("appleImg");
        $(".joke").html(appleJokes[count]);

    });

    $(".answerBtn").click(function() {
        
        if (true) {}
        $(".answerBtn").html(appleJokes[count + 1]);
    });
}


// STRAWBERRY BANANA
if (play == 'strawberryBanana') {

        $("#startJokesBtn").click(function(){

            $(".mySlides").addClass("strawBanBg");
            $(".joke").html(strawberryBananaJokes[count]);
            
        });    
        $(".next").click(function(){
        
        count += 2;

        

        if (count > strawberryBananaJokes.length) {
            
            currentSlide(3);
            $("#fruitFactTitle").addClass("yellow");
            $("#fruityFact").html("A strawberry is not an actual berry, but a banana is.");
            $(".mySlides").addClass("strawBanImg");
            $(".joke").html(strawberryBananaJokes[count]);

        }else {

            $(".joke").html(strawberryBananaJokes[count]);
        }

    });
    $("#jokesAgainBtn").click(function(){
        count = 0;
            $("#fruitFactTitle").removeClass("yellow");
            $("#fruityFact").html();
            $(".mySlides").removeClass("strawBanImg");
    });

    $(".answerBtn").click(function() {
        
        $(".answerBtn").html(strawberryBananaJokes[count + 1]);
    });


}
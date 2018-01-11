<?php

ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
error_log( "Hello, errors!" );
// session_start();
// $_SESSION["firstname"] = "Peter";

include 'functions.php';
include 'db.php';
include 'header.php';

if (strpos($url_string, 'page') !== false) {
    
    $page = $_GET['page'];

    if ($page == 'spin') {   
        include 'spin.php';          
    }
    if ($page == 'test') {
        include 'test.php';          
    }
    if ($page == 'memory-match') {
        include 'memory-match.php';          
    }
    if ($page == 'pop-a-fruit') {
        include 'pop_a_fruit.php';          
    }
    if ($page == 'jigsaw-puzzle') {
        include 'jigsaw_puzzle.php';          
    }
    if ($page == 'hidden-pictures') {
        include 'hidden_pictures.php';          
    }
    if ($page == 'matching-numbers') {
        include 'matching_numbers.php';          
    }
    if ($page == 'prize-claim-form') {
        include 'prize_claim_form.php';          
    }          
    if ($page == 'official-rules') {
	    include 'official_rules.php';
    }
    if ($page == 'faq') {
	    include 'faq.php';
    }
    if ($page == 'prizes') {
	   include 'prizes.php';
    }
    if ($page == 'coupon') {
       include 'coupon.php';
    }
    if ($page == 'laugh-factory') {
        include 'laugh-factory.php';
    }
        
} else {
    include 'register.php';
}

include 'footer.php';
?>

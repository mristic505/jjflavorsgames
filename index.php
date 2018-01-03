<?php
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
        
} else {
    include 'register.php';
}

include 'footer.php';
?>

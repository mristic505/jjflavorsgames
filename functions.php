<?php

include 'db.php';

$base_url_slug = '/';

function decrypt_email($email_to_decrypt)
{
    $key       = 'hzrd7vhs9o';
    $data      = base64_decode(strtr($email_to_decrypt, '._-', '+/='));
    $iv        = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, hash('sha256', $key, true), substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)), MCRYPT_MODE_CBC, $iv), "\0");
    return $decrypted;
}

function encrypt_email($email_to_encrypt)
{
    $key    = 'hzrd7vhs9o';
    $string = $email_to_encrypt;
    
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
    
    $encrypted = base64_encode($iv . mcrypt_encrypt(MCRYPT_RIJNDAEL_128, hash('sha256', $key, true), $string, MCRYPT_MODE_CBC, $iv));
    return strtr($encrypted, '+/=', '._-');
}

function return_to_hp()
{
    header('location: ' . $GLOBALS['base_url_slug']);
    die();
}

$url_string = $_SERVER['QUERY_STRING'];

// Routing 
if (strpos($url_string, 'page') !== false) {
    
    $page = $_GET['page'];
    
    if ($page == 'spin') {
        $page_title = 'Spin the Wheel';
        $inlcude    = 'spin.php';
    }
    if ($page == 'hidden-pictures') {
        $page_title = 'Hidden Pictures';
        $inlcude    = 'hidden_pictures.php';
    }
    if ($page == 'memory-match') {
        $page_title = 'Fruity Match';
        $inlcude    = 'memory-match.php';
    }
    if ($page == 'pop-a-fruit') {
        $page_title = 'Pop a Fruit';
        $inlcude    = 'pop_a_fruit.php';
    }
    if ($page == 'matching-numbers') {
        $page_title = 'Matching Numbers';
        $inlcude    = 'matching_numbers.php';
    }
    if ($page == 'laugh-factory') {
        $page_title = 'Laugh Factory';
        $inlcude    = 'laugh-factory.php';
    }
    if ($page == 'prize-claim-form') {
        $page_title = 'Prize Claim Form';
        $inlcude    = 'prize_claim_form.php';
    }
    if ($page == 'official-rules') {
        $page_title = 'Official Rules';
        $inlcude    = 'official_rules.php';
    }
    if ($page == 'faq') {
        $page_title = 'FAQ';
        $inlcude    = 'faq.php';
    }
    if ($page == 'coupon') {
        $page_title = 'Offer';
        $inlcude    = 'coupon.php';
    }
    if ($page == 'prizes') {
        $page_title = 'Prizes';
        $inlcude    = 'prizes.php';
    }
    if ($page == 'jigsaw-puzzle') {
        $page_title = 'Jigsaw Puzzle';
        $inlcude    = 'jigsaw_puzzle.php';
    }
    if ($page == 'register') {
        $page_title = 'Register';
        $inlcude    = 'register.php';
    }
    
} else {
    $page_title = 'Register';
    $page       = 'register';
    $inlcude    = 'register.php';
    
}

/********************************************/
/***************** SESSIONS *****************/
/********************************************/

// Terminate session after 60 minutes ===========================
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
    // last request was more than 60 minutes ago
    session_unset(); // unset $_SESSION variable for the run-time 
    session_destroy(); // destroy session data in storage
    header("Location: ?page=register");
    exit;
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp    

// Start Session
session_start();


if (strpos($url_string, 'page') !== false) {
    // If on register page unset seesion and start a new one ===========================
    if ($page == 'register') {
        session_unset();
        session_regenerate_id(true);
    }
    $restricted_pages = array(
        'spin',
        'hidden-pictures',
        'jigsaw-puzzle',
        'pop-a-fruit',
        'laugh-factory',
        'memory-match',
        'matching-numbers'
    );
    // If on one of restricted pages ======================================
    foreach ($restricted_pages as $restricted_page) {
        if ($page == $restricted_page) {  
            // Look for session ID in the DB ==============================         
            $result = DB::query("SELECT * FROM flavors_games_registered_users WHERE session_id=%s", session_id());
            if (empty($result)) { // If session ID not found ==============
                header("Location: ?page=register");
            } else { 
                $times_played = $result[0]['times_played'];
                // echo 'times_played: ' . $times_played;
                if($restricted_page == 'spin') {
                    if ($times_played == 10) header("Location: ?page=register");
                } else {                    
                    if ($times_played < 11) {
                        
                    } else {
                        header("Location: ?page=register");
                    }
                }                    
            }
        }
    }
}

// IF no query strings in the URL ===========================
if (empty($_GET)) {
    header("Location: ?page=register");
    exit;
}
// IF query string exists in the URL ===========================
else {
    
}
// echo '<br>' . session_id();
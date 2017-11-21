<?php

$base_url_slug = '/';

function decrypt_email($email_to_decrypt) {
    $key = 'hzrd7vhs9o';
    $data = base64_decode(strtr($email_to_decrypt, '._-', '+/='));
    $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
    $decrypted = rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', $key, true),
            substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
            MCRYPT_MODE_CBC,
            $iv
        ),
        "\0"
    );
    return $decrypted ;
}

function encrypt_email($email_to_encrypt) {
    $key = 'hzrd7vhs9o';
    $string = $email_to_encrypt;

    $iv = mcrypt_create_iv(
        mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
        MCRYPT_DEV_URANDOM
    );

    $encrypted = base64_encode(
        $iv .
        mcrypt_encrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', $key, true),
            $string,
            MCRYPT_MODE_CBC,
            $iv
        )
    );
    return strtr($encrypted, '+/=', '._-');
}

function return_to_hp() {
    header('location: '.$GLOBALS['base_url_slug']);
    die();
}

$url_string = $_SERVER['QUERY_STRING'];
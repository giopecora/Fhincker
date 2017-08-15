<?php

Function aes128Decrypt($key, $data) {
    $data = base64_decode($data);
    if(16!== strlen($key)) $key = hash('MD5', $key, true);
    $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, STR_REPEAT("\0",16));
    mcrypt_decrypt(MCRYPT_RIJNDAEL_128, hash('SHA256', $key, true), $data, MCRYPT_MODE_ECB);
    $padding = ord($data[strlen($data) - 1]); 
    return substr($data, 0, -$padding); 
}
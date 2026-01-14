<?php

declare(strict_types=1);

ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);

session_set_cookie_params([
    
    'lifetime' => 1800,
    'domain' => 'mrkubayi.ac.za',
    'path' => '/',
    'secure' => true,
    'httponly' => true
    
]);

session_start();

if(isset($_SESSION['last_regenerate'])){
    regenerateID();
}else{
    $interval = 1800;
    
    if(time() - $_SESSION['last_regenerate'] >= $interval){
        regenerateID();
    }
}


function regenerateID(){
    $_SESSION['last_regenerate'] = time();
    session_regenerate_id();
}
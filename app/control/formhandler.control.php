<?php

declare(strict_types=1);

function field_empty(string $email, string $message){
    
    if(empty($email) || empty($message)){
        return true;
    }else{
        return false;
    }
}

function is_email_invalid(string $email){
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function log_message(object $pdo, string $email, string $message){
    
    $message = trim($message);
    $message = stripslashes($message);
    
    send_to_database($pdo, $email, $message);
}
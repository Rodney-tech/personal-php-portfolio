<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    require_once '../config/db.inc.php';
    require_once '../app/model/formhandler.model.php';
    //require_once '../app/view/formhandler.view.php';
    require_once '../app/control/formhandler.control.php';
    
    $errors = [];
    
    if(field_empty($email, $message)){
        
        $errors['empty_field'] = 'fill all fields';
    }
    
    if(is_email_invalid($email)){
        $errors['invalid_email'] = 'enter a valid email';
    }
    
    if($errors){
        $_SESSION['errors'] = $errors;
        header('Location: message.route.php');
        die();
    }
    
    $database = new Database();
    $database->requestConnection();
    $pdo = $database->getConnection();
    unset($database);
    
    log_message($pdo, $email, $message);
    $pdo = null;
    header('Refresh: 1; url=../public/thankyou');
    die();
    
    
}else{
    header('Location: 404.route.php');
    die();
}


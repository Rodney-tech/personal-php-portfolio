<?php

declare(strict_types=1);

function send_to_database(object $pdo, string $email,  string $message){
    
    try{
        
        $query = "INSERT INTO rp_messages (email,message) VALUES(:email,:message);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'email' => $email,
            'message' => $message
        ]);
        
    } catch (PDOException $ex) {
        
        header('Refresh: 1; url=../public/connectionfailed');
        die();
    }
}

<?php

session_start();

require_once('config.php');

if(isset($_POST['userid']) && isset($_POST['password'])){
    
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    
    $hashedPassword = md5($password);

    $sql = "SELECT * FROM users WHERE userid = ? AND password = ? LIMIT 1";
    $stmtselect = $db->prepare($sql);
    $result = $stmtselect->execute([$userid, $hashedPassword]);

    if($result) {
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($stmtselect->rowCount() > 0) {
            $_SESSION['userlogin'] = $user;
            echo '1';
        } else {
            echo 'There is no user with that user ID.';
                
        }
    } else {
        echo 'Failure while login.';
    }
}
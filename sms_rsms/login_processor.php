<?php

session_start();

require_once('db_connect.php');


if(isset($_POST['userid']) && isset($_POST['password'])){
    
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    
    $hashedPassword = md5($password);

    $sql = "SELECT * FROM users WHERE userid = '".$userid."' AND password = '".$hashedPassword."' LIMIT 1";
    $result = mysqli_query($conn, $sql);
       
    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        
        // changing user status to online when logged in.
        $userstatus = 1;
        $query = "UPDATE users SET userstatus = '".$userstatus."' WHERE userid = '$userid'";
        $statusResult = mysqli_query($conn, $query);
        
        $_SESSION['userid'] = $row['userid'];
       
        if($row['usertype'] == 'Admin'){
            echo "1";
            
        } else if($row['usertype'] == 'Standard User'){
            echo "2";
        }            
    } else {
        echo "Either the user ID or password is wrong!\n Please try again...";
    }
    
    $conn->close();

}
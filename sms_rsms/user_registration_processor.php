<?php

include('db_connect.php');


if(
   isset($_POST['userid']) &&
   isset($_POST['usertype']) &&
   isset($_POST['firstname']) && 
   isset($_POST['lastname']) &&
   isset($_POST['email']) &&
   isset($_POST['phonenumber']) &&
   isset($_POST['password']) &&
   isset($_POST['userstatus'])) {    
    $userid         = $_POST['userid'];
    $usertype       = $_POST['usertype'];
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $email          = $_POST['email'];
    $phonenumber    = $_POST['phonenumber'];
    $password       = $_POST['password'];
    $userstatus     = $_POST['userstatus'];

    $hashedpassword = md5($password);
    
    $checkUserAvailabilityQuery = "SELECT phonenumber FROM users WHERE phonenumber = '".$phonenumber."'";
    $checkUserResult = mysqli_query($conn, $checkUserAvailabilityQuery);
        
    //checks if user already exists in the database
    if (mysqli_num_rows($checkUserResult) > 0) {
        echo "1";
    } else {
        
        //register user if $checkUserResult = 0
        $sqlInsert = "INSERT INTO `users`
        (`userid`,
        `usertype`,
        `firstname`,
        `lastname`,
        `email`,
        `phonenumber`,
        `password`, 
        `userstatus`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bind_param("sssssisi", 
                          $userid, 
                          $usertype,
                          $firstname,
                          $lastname,
                          $email,
                          $phonenumber,
                          $hashedpassword,
                          $userstatus);
        
        if ($stmt->execute()) {
            echo "New User successfully registered.";
        } else {
            echo "Error: User could not be registered! ";
        }

    }
}

?>


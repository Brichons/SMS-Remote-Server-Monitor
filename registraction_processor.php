<?php

include('db_connect.php');

?>

<?php  

if(
   isset($_POST['userid']) &&
   isset($_POST['usertype']) &&
   isset($_POST['firstname']) && 
   isset($_POST['lastname']) &&
   isset($_POST['phonenumber']) &&
   isset($_POST['password']) &&
   isset($_POST['userstatus'])) {    
    $userid         = $_POST['userid'];
    $usertype       = $_POST['usertype'];
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $phonenumber    = $_POST['phonenumber'];
    $password       = $_POST['password'];
    $userstatus     = $_POST['userstatus'];

    $hashedpassword = md5($password);
    
    $checkUserAvailabilityQuery = "SELECT phonenumber FROM users WHERE phonenumber = '".$phonenumber."'";
    $checkUserResult = mysqli_query($conn, $checkUserAvailabilityQuery);
        
    //check if user already exists in the database
    if (mysqli_num_rows($checkUserResult) > 0) {
        echo "1";
//        echo "User with either that ID or phone number already exists in the database";
    } else {
        //register user if $checkUserResult = 0
        $sqlInsert = "INSERT INTO `users`
        (`userid`,
        `usertype`,
        `firstname`,
        `lastname`,
        `phonenumber`,
        `password`, 
        `userstatus`) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bind_param("ssssisi", $userid, 
                          $usertype,
                          $firstname,
                          $lastname,
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

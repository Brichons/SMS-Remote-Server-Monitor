<?php

include('db_connect.php');


if(
   isset($_POST['userserverid']) &&
   isset($_POST['domainname'])) {    
    $userid       = $_POST['userserverid'];
    $domainname   = $_POST['domainname'];
    $serverstatus = 1;

    $sql = "SELECT firstname, email FROM users WHERE userid = '$userid' LIMIT 1";
    $userResult = mysqli_query($conn, $sql);
    if (mysqli_num_rows($userResult) > 0) {
        $row = $userResult->fetch_assoc();
        $username = $row['firstname'];
        $email = $row['email'];
    }
    
    
    $checkServerAvailabilityQuery = "SELECT domainname FROM server WHERE domainname = '".$domainname."'";
    $checkServerResult = mysqli_query($conn, $checkServerAvailabilityQuery);
        
    //check if domain name already exists in the database
    if (mysqli_num_rows($checkServerResult) > 0) {
        echo "1";
    } else {
           
            //register user if $checkUserResult = 0
            $ipaddress = gethostbyname($domainname);
            $sqlInsert = "INSERT INTO `server`
            (`userid`,
            `username`,
            `email`,
            `domainname`,
            `ipaddress`, 
            `serverstatus`) 
        VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bind_param("sssssi",  
                              $userid,
                              $username,
                              $email,
                              $domainname,
                              $ipaddress,
                              $serverstatus);

        if ($stmt->execute()) {
            echo "Server successfully added.";
        } else {
            echo "Error: Server could not be registered! ";
        }
        
    }
}

?>

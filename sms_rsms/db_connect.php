<?php

    $db_host = "localhost";
    $db_name = "sms_rsms";
    $db_user = "root";
    $db_pass = "";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(!@$conn)
    {
        die("Could not connect to the database");
    } 
    else
    {
//        echo "Connection successful...";
            
    }

?>
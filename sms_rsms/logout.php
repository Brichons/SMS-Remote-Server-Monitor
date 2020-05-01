<?php 
    include_once('db_connect.php');
    session_start();

    $userid = $_SESSION['userid'];
    $userstatus = 0;
    $query = "UPDATE users SET userstatus = '".$userstatus."' WHERE userid = '$userid'";
    $statusResult = mysqli_query($conn, $query);
    if($statusResult){
        $_SESSION = array();
        session_destroy();
        header("location: index.php");
    } 
?>
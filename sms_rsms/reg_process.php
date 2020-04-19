<?php

include('config.php');

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

    $sql = "INSERT INTO `users`
        (`userid`,
        `usertype`,
        `firstname`,
        `lastname`,
        `phonenumber`,
        `password`, 
        `userstatus`) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$userid, $usertype, $firstname, $lastname, $phonenumber, $hashedpassword, $userstatus]);

    if($result) {
        echo 'Record successfully saved.';
    } else {
        echo 'There was an error while saving the record.';
    }
} else {
    echo '<br/>No data';
    echo print_r($_POST);
} 

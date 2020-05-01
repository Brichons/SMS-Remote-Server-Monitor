<?php

include('db_connect.php');

if(!empty($_POST['update'])) {
    $serverid = $_POST['update'];
    
 $sql = "SELECT * FROM server";
        $result = mysqli_query($conn, $sql);
        $serverCount = mysqli_num_rows($result);
        $count = 0;
        if($serverCount > 0) {
            if($row = $result->fetch_assoc()) {
                
                foreach($serverid as $key => $serverID) { 
                    if($row['serverstatus'] == 0){
                        $query = "UPDATE server SET serverstatus = '1' WHERE serverid = '$serverID'";
                        $onResult = mysqli_query($conn, $query);
                        if($onResult) {
                            echo $serverID.": ON! <br/>";
                        } 
                    }else {
                        $query = "UPDATE server SET serverstatus = '0' WHERE serverid = '$serverID'";
                        $onResult = mysqli_query($conn, $query);
                        if($onResult) {
                            $sql = "SELECT * FROM server WHERE serverid = '".$serverID."'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $userRow = $result->fetch_assoc();
                            
                                echo $serverID.": OFF! <br/>";
                                //send email to responsible engineer
                                $to = $userRow['email'];
                                $subject = "SERVER: ".$serverID." DOWN.";
                                $message = "Hello ".$userRow['username'].",\nServer: ".$serverID." has gone offline. Kindly check it and respond ASAP.";
                                $headers = "From: sms.remoteserversystem@gmail.com";

                                if(mail($to, $subject, $message, $headers)) {
                                    echo "<h2>Mail successfully sent!</h2>";
                                } else {
                                    echo "<h2> Email couldnot be sent!</h2>";
                                }
                            } else {
                                echo "Email not selected.";
                            }
                        }
                    }
                }
            } 
        }

}

?>

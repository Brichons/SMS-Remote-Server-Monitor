<?php

  session_start();
  include_once('db_connect.php');

  $page = $_SERVER['PHP_SELF'];
  $sec = "12";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_template.css">
    <meta http-equiv="refresh" content="<?php echo $sec ?>; URL='<?php echo $page?>'">
    <title></title>
</head>
<body>

<!-- Nav Bar-->
  <nav class="navbar navbar-expand-lg text-light" style="background-color: #27AE60">
  <img src="images/logo.jpg" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="admin_dashboard.php" >Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="view_servers.php">Servers<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view_users.php">Users</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Notifications <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active current">
        <a class="nav-link" href="system_switch.php">System Switch <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button type="button" class="btn btn-light btn-outline-light"><a href="logout.php" style="text-decoration: none">Logout</a></button>
    </form>
  </div>
</nav>



<div class="container">
    <header>
        <h1>Server Switch</h1>    
    </header>
    
<!--Table-->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Server Status</th>
      <th scope="col">Server ID</th>
      <th scope="col">Domain Name</th>
      <th scope="col">IP Address</th>
      <th scope="col">Assigned User</th>
      <th scope="col">User Status</th>
    </tr>
  </thead>
  <?php
    
        $sql = "SELECT * FROM server";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()) {
                foreach($result as $server) 
                {
                    if($server['serverstatus'] === '1')
                    {
                        
                        echo "<tr><td><form action='' method='post'>
                      <label><input type='checkbox' value=".$server['serverid']." name='server_switch'></label>
                    </form></td><td>SVR 0" .$server['serverid']. 
                    "</td><td>" .$server['domainname']. 
                    "</td><td>" .$server['ipaddress']. 
                    "</td><td>".$server['userid'].": ".$server['username'].
                            "</td><td>Online</td> </tr>";
                        
                    }
                    else
                    {
                        echo "<tr><td><form action='' method='post'>
                      <label><input type='checkbox' value=".$server['serverid']." name='server_switch'></label>
                    </form></td><td>SVR 0" .$server['serverid']. 
                    "</td><td>" .$server['domainname']. 
                    "</td><td>" .$server['ipaddress']. 
                    "</td><td>".$server['userid'].": ".$server['username']."</td><td>Online</td> </tr>";
                        
                    } 
                
                }
                
            }
            echo "</tbody></table>";
            
        } else {
            echo "<p style='color: red'>No active servers.";
        }
    
    $conn->close();
        
    ?>

<form action="" method="post">
  <input type="button" id="submit" name="submit" value="update">
</form>
</div>

<br>
<h3 id="result"></h3>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!--       Server Registration Processor begins here... -->

    <script>
    $(document).ready(function() {
        $("#submit").click(function(){
            var update = [];
            $.each($("input[name='server_switch']:checked"), function(){
                update.push($(this).val());
            });
            
            $.ajax({
                  url: 'update_system_switch.php',
                  method: 'POST',
                  data: {update: update},
                  success: function(data) {
                      $('#result').html(data);
                  }
               });
        });
    });
</script>
    
</body>
</html>
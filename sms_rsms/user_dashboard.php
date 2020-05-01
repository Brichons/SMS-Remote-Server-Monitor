<?php

      session_start();
    include_once('db_connect.php');
//
//    if(!isset($_SESSION['userlogin'])) {
//        header("Location: index.php");
//    }
//
//    if(isset($_GET['logout'])) {
//        session_destroy();
//        unset($_SESSION);
//        header("Location: index.php");
//    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_template.css">
    <title></title>
</head>
<body>

<!--User Registration Starts Here-->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
    <!--Registration Form -->
      <form action="registration.php" method="post">
<!--       <p>Fill up the form with correct values.</p>-->
        <div class="container">
            <form>
             <div class="form-row">
                <div class="form-group col-md-6 has-error">
                  <label for="userid">User ID</label>
                  <input type="text" class="form-control" id="userid" required>
                </div>
                <div class="form-group col-md-6 has-error">
                  <label for="usertype">User Type</label>
                  <select id="usertype" class="form-control" required>
                    <option value="">Choose...</option>
                    <option>Admin</option>
                    <option>Standard User</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6 has-error">
                  <label for="firstname">First Name</label>
                  <input type="text" class="form-control" id="firstname" required>
                </div>
                <div class="form-group col-md-6 has-error">
                  <label for="lastname">Last Name</label>
                  <input type="text" class="form-control" id="lastname" required>
                </div>
                <div class="form-group col-md-6 has-error">
                  <label for="phonenumber">Phone Number</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">+26</div>
                    </div>
                    <input type="text" class="form-control" id="phonenumber" placeholder="096623064" required>
                  </div>
              </div>
              <div class="form-group col-md-6 has-error">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" required>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="registerUser" data-dismiss="modal">Save</button>
              </div>
            </form>
        </div>
    </form>
    </div>
</div>
</div>
</div>
    <!-- User Registration Form end Here... -->
    
    <!-- Server Registration Form Starts Here... -->
          
<div class="modal fade" id="serverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Server Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
    <!--Registration Form -->
      <form action="registration.php" method="post">
        <div class="container">
            <form>
             <div class="form-row">
                <div class="form-group col-md-6 has-error">
                  <label for="userid">User ID</label>
                  <input type="text" class="form-control" id="userserverid" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6 has-error">
                  <label for="domainname">Domain Name</label>
                  <input type="text" class="form-control" id="domainname" required>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" id="registerServer" data-dismiss="modal">Save</button>
                </div>
            </form>
        </div>
    </form>       
  </div>
</div>
</div>
</div>
    <!-- Server Registration Form end Here... -->
   
<!-- Nav Bar-->
  <nav class="navbar navbar-expand-lg text-light" style="background-color: #27AE60">
  <img src="images/logo.jpg" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item current">
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
      <li class="nav-item active">
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
        <h1>Welcome to User Dashboard.</h1>    
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
                        echo "<tr><td><img src='images/server_on.png' width='20' height='20'></td><td>SVR 0" .$server['serverid']. 
                    "</td><td>" .$server['domainname']. 
                    "</td><td>" .$server['ipaddress']. 
                    "</td><td>".$server['userid'].": ".$server['username'].
                            "</td><td>Online</td> </tr>";
                    }
                    else
                    {
                        echo "<tr><td><img src='images/server_off.png' width='20' height='20'></td><td>SVR 0" .$server['serverid']. 
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

</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
    
</body>
</html>
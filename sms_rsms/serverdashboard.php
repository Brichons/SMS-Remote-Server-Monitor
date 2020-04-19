<?php

    session_start();

    if(!isset($_SESSION['userlogin'])) {
        header("Location: index.php");
    }

    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION);
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_template.css">
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
      <li class="nav-item current">
        <a class="nav-link" href="serverdashboard.php" >Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Servers<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage_users.php">Users</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Notifications <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button type="button" class="btn btn-light btn-outline-light"><a href="serverdashboard.php?logout=true" style="text-decoration: none">Logout</a></button>
    </form>
  </div>
</nav>

<div class="container">
    <header>
    <h1>Welcome to Server Dashboard.</h1>    
</header>
<!--Table-->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Server Status</th>
      <th scope="col">Server ID</th>
      <th scope="col">Domain Name</th>
      <th scope="col">IP Address</th>
      <th scope="col">Port No.</th>
      <th scope="col">Assigned Engineer</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>server1</td>
      <td>server1</td> 
      <td>server1</td>
      <td>server1</td>
      <td>server1</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>server2</td>
      <td>server2</td>
      <td>server2</td>
      <td>server2</td>
      <td>server2</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>server3</td>
      <td>server3</td>
      <td>server3</td>
      <td>server3</td>
      <td>server3</td>
    </tr>
  </tbody>
</table>

</div>

</body>
</html>






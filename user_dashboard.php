<?php

//    session_start();
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
     </ul>
     <div  class="loggedUser">
         <p>Hello</p>
     </div>
    <form class="form-inline my-2 my-lg-0">
      <button type="button" class="btn btn-light btn-outline-light"><a href="logout.php" style="text-decoration: none">Logout</a></button>
    </form>
  </div>
</nav>

<div class="container">
    <header>
        <h1>Welcome to User Dashboard.</h1>    
    </header>

        
</div> 
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
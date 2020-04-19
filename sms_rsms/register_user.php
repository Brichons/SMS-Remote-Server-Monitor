<?php
    require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration | PHP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_template.css">
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle  current" href="register_user.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          System Management
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="register_user.php">Register User</a>
          <a class="dropdown-item" href="register_user.php">Manager Server</a>
          <a class="dropdown-item" href="register_user.php">Manage Notifications</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button type="button" class="btn btn-light btn-outline-light"><a href="serverdashboard.php?logout=true" style="text-decoration: none">Logout</a></button>
    </form>
  </div>
</nav>
   
    <div>
        <form action="registration.php" method="post">
            <div class="container">
                <h1>User Registration</h1>
                <p>Fill up the form with correct values.</p>
                <hr>
                <form>
                 <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="userid">User ID</label>
                      <input type="text" class="form-control" id="userid" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="usertype">User Type</label>
                      <select id="usertype" class="form-control" required>
                        <option value="">Choose...</option>
                        <option>Admin</option>
                        <option>Standard User</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="firstname">First Name</label>
                      <input type="text" class="form-control" id="firstname" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="lastname">Last Name</label>
                      <input type="text" class="form-control" id="lastname" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="phonenumber">Phone Number</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">+26</div>
                        </div>
                        <input type="text" class="form-control" id="phonenumber" placeholder="096623064" required>
                      </div>
                  </div>
                  
<!--
                  Register Button trigger modal 
                    <button id="toggle" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Launch demo modal
                    </button>

                     Modal 
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            ...
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" data-target="#exampleModal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
-->
                  
                    <div class="form-group col-md-6">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" required>
                    </div>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-primary" data-toggle="modal" id="register">Register</button>
                </form>              
               
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        $(function(){
            $('#register').click(function(e){
                
                var isValid = this.form.checkValidity();
                if(isValid) {
                    
                    var userid      = $('#userid').val();
                    var usertype    = $('#usertype').val();
                    var firstname   = $('#firstname').val();
                    var lastname    = $('#lastname').val();
                    var phonenumber = $('#phonenumber').val();
                    var password    = $('#password').val();
                    var userstatus  = 0;                    
                    e.preventDefault();
                    
                $.ajax({
                   type: 'POST',
                   url: 'reg_process.php',
                   data: {userid: userid,
                          usertype: usertype,
                          firstname: firstname, 
                          lastname: lastname, 
                          phonenumber: phonenumber,
                          password: password,
                          userstatus: userstatus},
                   success: function(data) {
                       Swal.fire({
                        'title': 'Success!',
                        'text': data,
                        'type': 'success'
                       })
                       
                       $('form').trigger('reset');
                   },
                   error: function(data) {
                       Swal.fire({
                        'title': 'Error!',
                        'text': 'There was an error while saving the data.',
                        'type': 'error'
                       })
                   }
                    
                    
                });
                    
                } else {
                   
                }
                
            });
          
            
        });
        
        $('#exampleModal').on('shown.bs.modal', function () {
          $('#toggle').trigger('focus')
        })
    </script>
    
</body>
</html>
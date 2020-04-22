<?php
    require_once('db_connect.php');
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="submit" class="btn btn-primary" id="register" data-dismiss="modal">Add User</button>
              </div>
<!--              <button type="submit" class="btn btn-primary" data-target="#exampleModal" data-toggle="modal" id="register">Register</button>-->
            </form>
        </div>
    </form>
    <!-- Registration Form end Here... -->
          
  </div>
      
    </div>
  </div>
</div>

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
      <li class="nav-item dropdown current">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          System Management
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="register_user.php">Add User</a>
          <a class="dropdown-item" href="add_server.php">Add Server</a>
        </div>
      </li>
<!--
     
-->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button type="button" class="btn btn-light btn-outline-light"><a href="logout.php" style="text-decoration: none">Logout</a></button>
    </form>
  </div>
</nav>

<div class="container">
<header>
    <h1>User Management</h1>    
</header>
<header id="createuser">
    <button type="submit" class="btn btn-primary" data-target="#exampleModal" data-toggle="modal" id="register">Create User</button>
</header>
<!--Table-->
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">User Status</th>
    </tr>
  </thead>
  
  
<!--
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>user1</td>
      <td>user1</td> 
      <td>user1</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>user2</td>
      <td>user2</td>
      <td>user2</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>user3</td>
      <td>user3</td>
      <td>user3</td>
    </tr>
  </tbody>
-->
</table>
    <h4 id="nouser">Add Users here...</h4>
    
</div>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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

                    $.ajax({
                       type: 'POST',
                       url: 'registraction_processor.php',
                       data: {userid: userid,
                              usertype: usertype,
                              firstname: firstname, 
                              lastname: lastname, 
                              phonenumber: phonenumber,
                              password: password,
                              userstatus: userstatus},
                       success: function(data) {
                           if($.trim(data) === "1"){
                               Swal.fire({
                                'title': 'User Already Exists',
                                'text': "User with that phone number already exists in the database",
                                'type': 'warning'
                               })
                           } else {                   
                               Swal.fire({
                                'title': 'Success!',
                                'text': data,
                                'type': 'success'
                               })

                                $('form').trigger('reset');
                           }

                       },
                        error: function(data) {
                           Swal.fire({
                            'title': 'Error!',
                            'text': 'There was an error while saving the data!',
                            'type': 'error'
                           })
                       }                   

                    });
                } else {
                    Swal.fire({
                    'title': 'Failure to Register!',
                    'text': 'Kindly enter all the required details.',
                    'type': 'error'
                   })
                }   
            });
          
            
        });
        
    </script>
    
</body>
</html>
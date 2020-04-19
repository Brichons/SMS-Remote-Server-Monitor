<?php
    
    session_start();

    if(isset($_SESSION['userlogin'])) {
        header("Location: serverdashboard.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SMS-RSMS | Login</title>
    
    
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
</head>
<body>
   
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        <h4>SMS - REMOTE SERVER MONITORING SYSTEM</h4>
                    </span>
                </div>
            <form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">User ID</span>
						<input class="input100" id="userid" type="text" name="username" placeholder="Enter your user ID here..." required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" id="password" type="password" name="pass" placeholder="Enter your password..." required>
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
					    <div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
						<button class="login100-form-btn btn-lg active" id="login">
							Login
						</button>
				</form>
            </div>
        </div>
    </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    
    <script>
        $(function(){
            $('#login').click(function(e){
                var isValid = this.form.checkValidity();
                    if(isValid) {
                        var userid      = $('#userid').val();
                        var password       = $('#password').val();

                        e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'jslogin.php',
                        data: {userid: userid, password: password},
                        success: function(data) {
                           if($.trim(data) === "1") {
                               setTimeout('window.location.href = "serverdashboard.php"', 800);
                           } else {
                               Swal.fire({
                                'title': 'Error!',
                                'text': data,
                                'type': 'error'
                               })
                           }
                          $('form').trigger('reset');
                        },
                        error: function(data) {
                            alert('Login failed!');
                            Swal.fire({
                            'title': 'Error!',
                            'text': 'There was an error while saving the data.',
                            'type': 'error'
                            })
                        }

                    });

                }
            });
        });
    </script>

    
</body>
</html>
<?php
session_start();
$sessionid = session_id();
include_once("config/index.php");
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login and Register || Profile Code - The Leading Digital Downloads Marketplace in Kenya</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <!-- Place favicon.ico in the root directory -->
	    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">	
		<!-- all CSS hear -->		
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/mainmenu.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">		
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        
        <div class="wrapper wishlist-page">
            <?php include_once("includes/header.php") ?>
            
            
            <!-- content-wraper start -->
            <div class="content-wraper login-register-area bg-gray">
                <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="customer-login-register">
                                    <h3>Login As a Vendor/Merchant</h3>
                                    <div class="login-Register-info">
                                        <form method="post" id="loginfrm"> 
                                            <p class="coupon-input form-row-first">
                                                <label>Username or email <span class="required">*</span></label>
                                                <input type="text" name="email" required>
                                            </p>
                                            <p class="coupon-input form-row-last">
                                                <label>password <span class="required">*</span></label>
                                                <input type="password" name="pass" required>
                                            </p>
                                           <div class="clear"></div>
                                            <p>
                                                <button value="Login" name="login" class="button-login" type="submit">Login</button>
                                                <!--<label><input type="checkbox" value="1"><span>Remember me</span></label>-->
                                                <!--<a href="forgot-password.php" class="lost-password">Forgot password?</a>-->
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6  col-md-6 col-sm-12">
                                <div class="customer-login-register">
                                    <h3>Register As a Vendor/Merchant</h3>
                                    <div class="login-Register-info">
                                        <form method="post" id="signupfrm"> 
                                            <p class="coupon-input form-row-first">
                                                <label>Your Name<span class="required">*</span></label>
                                                <input type="text" name="vname" required>
                                            </p>
                                            <p class="coupon-input form-row-first">
                                                <label>Mpesa Phone Number (earnings will be paid here)<span class="required">*</span></label>
                                                <input type="number" name="vphone" required>
                                            </p>
                                            <p class="coupon-input form-row-first">
                                                <label>Email Address<span class="required">*</span></label>
                                                <input type="email" name="vemail" required>
                                            </p>
                                            <p class="coupon-input form-row-last">
                                                <label>Password <span class="required">*</span></label>
                                                <input type="password" name="vpassword" required>
                                            </p>
                                           <div class="clear"></div>
                                            <p>
                                                <button class="button-login" type="submit">Register</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- content-wraper end -->
            
            <?php include_once("includes/footer.php") ?> 
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/bootstrap/bootstrap.min.js"></script>
            <script>
            KSH (function() {
             KSH ("#loginfrm").submit(function(e){
               e.preventDefault();
                KSH ("#status").html("<p class='alert alert-success'><i class='fas fa-spinner fa-pulse'></i> Logging in...</p>");
                KSH .ajax({
                  method: "POST",
                  url : "app/vendorlogin",
                  data: new FormData(this),
                  contentType: false,
                  processData: false,
                  cache: false
                }).done(function (data){
                 if(data.status == 200){
                  window.location.replace("vendors/");
                 }
                 if(data.status == 300){
                  KSH ("#status").html("<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Login invalid. Wrong email or password.</p>");
                 }
                });
               
             });
             
              KSH ("#signupfrm").submit(function(e){
               e.preventDefault();
                KSH ("#status").html("<p class='alert alert-success'><i class='fas fa-spinner fa-pulse'></i> Submitting data...</p>");
                KSH .ajax({
                  method: "POST",
                  url : "app/vendorsignup",
                  data: new FormData(this),
                  contentType: false,
                  processData: false,
                  cache: false
                }).done(function (data){
                 if(data.status == 200){
                  KSH ("#status").html("<p class='alert alert-success'><i class='fas fa-check'></i> Signup successful. Please login to proceed</p>");
                 }
                 if(data.status == 300){
                  KSH ("#status").html("<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Login invalid. Wrong email or password.</p>");
                 }
                });
               
             });
             
            });
            </script>
    </body>
</html>
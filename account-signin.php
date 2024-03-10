<?php
session_start();
$sessionid = session_id();
include_once("config/index.php");
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Account Sign In</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Profile Code KE |Leading File MarketPlace |PROFILECODE">
    <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
    <meta name="author" content="ProfileCode">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon.png">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Google Tag Manager-->

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">


<!-- // navigation bar code was removed from here -->
  <?php include_once("includes/navbar.php") ?>


                             <!-- NOTIFICATION POP UP BOX -->
                             <div class="form-group d-flex a-center">
                          <div id="status"></div>
                         </div>
                           <!-- NOTIFICATION POP UP BOX -->
      <div class="container py-4 py-lg-5 my-4">
        <div class="row">
          <div class="col-md-6">
            <div class="card border-0 shadow">
              <div class="card-body">
                <h2 class="h4 mb-1">Sign in</h2>
                <div class="py-3">
                  <h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">With social account:</h3>
                  <div class="d-inline-block align-middle"><a class="btn-social bs-google me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Google"><i class="ci-google"></i></a><a class="btn-social bs-facebook me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Facebook"><i class="ci-facebook"></i></a><a class="btn-social bs-twitter me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Twitter"><i class="ci-twitter"></i></a></div>
                </div>
                <hr>
                <h3 class="fs-base pt-4 pb-2">Or using form below</h3>
                <form   method="post" id="login" class="needs-validation" novalidate>
                  <div class="input-group mb-3"><i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                    <input class="form-control rounded-start" type="email" placeholder="Email"  name="email" required>
                  </div>
                  <div class="input-group mb-3"><i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                    <div class="password-toggle w-100">
                      <input class="form-control" type="password" placeholder="Password" name="pass" required>
                      <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                      </label>
                    </div>
                  </div>
                  <div class="d-flex flex-wrap justify-content-between">
                    <!-- <div class="form-check">
                      <input class="form-check-input" type="checkbox" checked id="remember_me">
                      <label class="form-check-label" for="remember_me">Remember me</label>
                    </div> -->
                    <a class="nav-link-inline fs-sm" href="password-recovery.php">Forgot password?</a>
                  </div>
                  <hr class="mt-4">
                  <div class="text-end pt-4">
                    <button class="btn btn-primary" type="submit" name="login"><i class="ci-sign-in me-2 ms-n21"></i>Sign In</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          
          <div class="col-md-6 pt-4 mt-3 mt-md-0">
            <h2 class="h4 mb-3">No account? Sign up</h2>
            <p class="fs-sm text-muted mb-4">Registration takes less than a minute but gives you full control over your orders.</p>
            <form class="needs-validation"  method="post" id="signup" novalidate>
              <div class="row gx-4 gy-3">
                <div class="col-sm-12">
                  <label class="form-label" for="reg-fn">Name</label>
                  <input class="form-control" type="text" name="vname"  required id="reg-fn">
                  <div class="invalid-feedback">Please enter your first name!</div>
                </div>
    
                <div class="col-sm-12">
                  <label class="form-label" for="reg-phone">Phone Number</label>
                  <input class="form-control" type="text" name="vphone" required id="reg-phone">
                  <div class="invalid-feedback">Please enter your phone number!</div>
                </div>

                <div class="col-sm-12">
                  <label class="form-label" for="reg-email" name="vemail">E-mail Address</label>
                  <input class="form-control" type="email" required id="reg-email">
                  <div class="invalid-feedback">Please enter valid email address!</div>
                </div>

 
                <div class="col-sm-12">
                  <label class="form-label" for="reg-password">Password</label>
                  <input class="form-control" type="password" name="vpassword"  required id="reg-password">
                  <div class="invalid-feedback">Please enter password!</div>
                </div>

                <!-- <div class="col-sm-6">
                  <label class="form-label" for="reg-password-confirm">Confirm Password</label>
                  <input class="form-control" type="password" required id="reg-password-confirm">
                  <div class="invalid-feedback">Passwords do not match!</div>
                </div> -->
                <div class="col-12 text-end">
                  <button class="btn btn-primary" type="submit" ><i class="ci-user me-2 ms-n1"></i>Sign Up</button>
                </div>
              </div>
            </form>
          </div>

          <!-- here -->
        </div>
      </div>
    </main>

  <!-- footer section code was removed here -->
  <?php include_once("includes/footer.php") ?>

<!-- LOGIN REGISTER AJAX JQUERY CODE -->
<script>
            $(function() {
             $("#login").submit(function(e){
               e.preventDefault();
                $("#status").html("<p class='alert alert-success'><i class='fas fa-spinner fa-pulse'></i> Logging in...</p>");
                $.ajax({
                  method: "POST",
                  url : "app/vendorlogin.php",
                  data: new FormData(this),
                  contentType: false,
                  processData: false,
                  cache: false
                }).done(function (data){
                 if(data.status == 200){
                  window.location.replace("seller/");
                 }
                 if(data.status == 300){
                  $("#status").html("<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Login invalid. Wrong email or password.</p>");
                 }
                });
               
             });
             
              $("#signup").submit(function(e){
               e.preventDefault();
                $("#status").html("<p class='alert alert-success'><i class='fas fa-spinner fa-pulse'></i> Submitting data...</p>");
                $.ajax({
                  method: "POST",
                  url : "app/vendorsignup.php",
                  data: new FormData(this),
                  contentType: false,
                  processData: false,
                  cache: false
                }).done(function (data){
                 if(data.status == 200){
                  $("#status").html("<p class='alert alert-success'><i class='fas fa-check'></i> Signup successful. Please login to proceed</p>");
                 }
                 if(data.status == 300){
                  $("#status").html("<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Login invalid. Wrong email or password.</p>");
                 }
                });
               
             });
             
            });
            </script>
  </body>

</html>
<?php
session_start();
$sessionid = session_id();
include_once("./includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Account Sign In</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Bootstrap E-commerce Template">
    <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
    <meta name="author" content="ProfileCode">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon.png">
    
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="../vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="../vendor/tiny-slider/dist/tiny-slider.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="../css/theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Google Tag Manager-->

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">


<!-- // navigation bar code was removed from here -->
 


      <div class="container py-4 py-lg-12 my-4">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card border-0 shadow">
              <div class="card-body">
                <h2 class="h4 mb-1">ADMIN LOGIN</h2>
                <div class="py-3">
                  <h3 class="d-inline-block align-middle fs-base fw-medium mb-2 me-2">With social account:</h3>
                  <div class="d-inline-block align-middle"><a class="btn-social bs-google me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Google"><i class="ci-google"></i></a><a class="btn-social bs-facebook me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Facebook"><i class="ci-facebook"></i></a><a class="btn-social bs-twitter me-2 mb-2" href="#" data-bs-toggle="tooltip" title="Sign in with Twitter"><i class="ci-twitter"></i></a></div>
                </div>
                <hr>
                <h3 class="fs-base pt-4 pb-2">Or using form below</h3>
                <form class="needs-validation" novalidate  id="loginfrm">
                  <div class="input-group mb-3"><i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                    <input class="form-control rounded-start" type="email" placeholder="Email" required id="email">
                  </div>
                  <div class="input-group mb-3"><i class="ci-locked position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
                    <div class="password-toggle w-100">
                      <input class="form-control" type="password" placeholder="Password" required id="pass">
                      <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                      </label>
                    </div>
                  </div>

                  <div class="d-flex flex-wrap justify-content-between">
                    <div class="form-check">
                      
                    </div><a class="nav-link-inline fs-sm" href="password-recovery.php">Forgot password?</a>
                  </div>
                  
                  <hr class="mt-4">
                  <div class="text-end pt-4">
                    <button class="btn btn-primary" type="submit"><i class="ci-sign-in me-2 ms-n21"></i>Sign In</button>
                  </div>
                  <br>

                  <div class="form-group">
    <div id="status"></div>
   </div>
                </form>
              </div>
            </div>
          </div>
    
        
      </div>
    </main>
 <!-- footer section code was removed here -->
 <script>
       $(function() {
    $("#loginfrm").submit(function(e){
        e.preventDefault();
        var email = $("#email").val();
        var pass = $("#pass").val();

        if((email !== "") && (pass !== "")){
            $("#status").html("<p class='alert alert-success'><i class='fas fa-spinner fa-pulse'></i> Logging in...</p>");
            $.ajax({
                method: "POST",
                url : "../app/login.php",
                data: {
                    email: email,
                    pass: pass
                },
                cache: false
            }).done(function (data){
                if(data.status == 200){
                    window.location.href = data.url; // Redirect to the specified URL
                } else if(data.status == 300){
                    $("#status").html("<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Login invalid. Wrong email or password.</p>");
                } else {
                    $("#status").html("<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> An error occurred. Please try again.</p>");
                }
            });
        }
        else{
            $("#status").html("<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Please enter all login details.</p>");
        }
    });
});

    </script>
 <?php include_once("includes/footerscripts-only.php") ?>
 




  </body>

</html>
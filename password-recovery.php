<?php
session_start();
$sessionid = session_id();
include_once("config/index.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Password Recovery</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Leading Digital File Marketplace">
    <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
    <meta name="author" content="ProfileCode">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <!-- Google Tag Manager-->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-WKV3GT5');
    </script>
  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">


        <!-- // navigation bar code was removed from here -->
        <?php include_once("includes/navbar.php") ?>


      <div class="container py-4 py-lg-5 my-4">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
            <h2 class="h3 mb-4">Forgot your password?</h2>
            <p class="fs-md">Change your password in three easy steps. This helps to keep your new password secure.</p>
            <ol class="list-unstyled fs-md">
              <li><span class="text-primary me-2">1.</span>Fill in your email address below.</li>
              <li><span class="text-primary me-2">2.</span>We'll email you a temporary code.</li>
              <li><span class="text-primary me-2">3.</span>Use the code to change your password on our secure website.</li>
            </ol>
            <div class="card py-2 mt-4">
              <form class="card-body needs-validation" novalidate>
                <div class="mb-3">
                  <label class="form-label" for="recover-email">Enter your email address</label>
                  <input class="form-control" type="email" id="recover-email" required>
                  <div class="invalid-feedback">Please provide valid email address.</div>
                </div>
                <button class="btn btn-primary" type="submit">Get new password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- FOOTER -->

    
    <!-- footer section code was removed here -->
  <?php include_once("includes/footer.php") ?>

  
  </body>


</html>
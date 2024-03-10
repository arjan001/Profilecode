<?php
session_start();
$sessionid = session_id();
include_once("config/index.php");
?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Checkout Complete</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Profile Code KE |Leading File MarketPlace |PROFILECODE">
    <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
    <meta name="author" content="ProfileCode">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
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
    <!-- Google Tag Manager (noscript)-->

    
<!-- // navigation bar code was removed from here -->
  <?php include_once("includes/navbar.php") ?>
    <main class="page-wrapper">


      <div class="container pb-5 mb-sm-4">
        <div class="pt-5">
          <div class="card py-3 mt-sm-3">
            <div class="card-body text-center">
              <h2 class="h4 pb-3">Thank you for your order!</h2>
              <p class="fs-sm mb-2">Your order has been placed and will be processed as soon as possible.</p>
              <p class="fs-sm mb-2">Make sure you make note of your order number, which is <span class='fw-medium'>34VB5540K83.</span></p>
              <p class="fs-sm">You will be receiving an email shortly with confirmation of your order. <u>You can now:</u></p>
              <a class="btn btn-secondary mt-3 me-3" href="index.php">Go back to shopping page</a>
              
            </div>
          </div>
        </div>

      </div>
    </main>
    <!-- Footer-->

   
<!-- // footer section included here -->
  <?php include_once("includes/footer.php") ?>

  </body>


</html>
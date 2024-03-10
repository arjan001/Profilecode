<?php
session_start();

 include_once("./includes/config.php");
 include_once("./includes/auth.php");

//  var_dump("SHOW HERE");
//  die();

?>

<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Sales |Profile Code KE</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Profile Code KE |Leading File MarketPlace |PROFILECODE">
    <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
    <meta name="author" content="ProfileCode">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="../vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="../vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="../vendor/chartist/dist/chartist.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="../css/theme.min.css">
    <!-- Google Tag Manager-->

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->


    <main class="page-wrapper">
      <!-- Navbar Marketplace-->
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

         <!-- Navigation Bart r starts-->

        <?php include_once("includes/navbar.php") ?>

      <!-- Navigation bar ends here-->


      <!-- Dashboard header starts-->

      <?php 
      
      include_once("includes/header.php"); 

      
      ?>
  

      <!-- Dashboard header ends-->

      
      <div class="container mb-5 pb-3">
        <div class="bg-light shadow-lg rounded-3 overflow-hidden">
          <div class="row">
            <!-- Sidebar-->
  
               <!-- Dashboard header starts-->
               <?php include_once("includes/sidebar.php") ?>
              <!-- Dashboard header ends-->

            <!-- Content-->
            <section class="col-lg-9 pt-lg-4 pb-4 mb-3">
              <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                <h2 class="h3 py-2 text-center text-sm-start">Total Sales</h2>
                <div class="row mx-n2 pt-2">
                  <div class="col-md-4 col-sm-6 px-2 mb-4">
                    <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                      <h3 class="fs-sm text-muted">Total sale</h3>
                      <p class="h2 mb-2"><?php echo number_format(mysqli_num_rows(mysqli_query($con,"SELECT * FROM vendorsales WHERE vendorid='$vendorid'")));?></p>
                      
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 px-2 mb-4">
                    <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                      <h3 class="fs-sm text-muted">Total Earning</h3>
                      <p class="h2 mb-2">KSH <?php echo number_format(mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS ttearnings FROM vendorsales WHERE vendorid='$vendorid'"))["ttearnings"],2);?></p>
                      
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12 px-2 mb-4">
                    <div class="bg-secondary h-100 rounded-3 p-4 text-center">
                      <h3 class="fs-sm text-muted">My Balances</h3>
                      <p class="h2 mb-2">KSH <?php echo number_format(mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM vendors WHERE id='$vendorid'"))["balance"],2);?></p>
                      
                    </div>
                  </div>
                </div>

              </div>
            </section>
          </div>
        </div>
      </div>
    </main>


    <!-- Footer-->

    <!-- FOOTER SECTIONS STARTS  FROM HERE -->

    <?php include_once("includes/footerscripts-only.php") ?>

    <!-- FOOTER SECTIONS ENDS FROM HERE -->

  </body>

</html>
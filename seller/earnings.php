<?php
ob_start();
session_start();

 include_once("includes/config.php");
 include_once("includes/auth.php");
 $now = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <title>PROFILECODE| EARNINGS | Profile Code KE</title>
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
    <script src="../js/jquery-3.7.1.min.js"></script>
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

      <?php include_once("includes/header.php") ?>

      <!-- Dashboard header ends-->

      
      <div class="container mb-5 pb-3">
        <div class="bg-light shadow-lg rounded-3 overflow-hidden">
          <div class="row">
            <!-- Sidebar-->
  
               <!-- Dashboard header starts-->
               <?php include_once("includes/sidebar.php") ?>
              <!-- Dashboard header ends-->

            <!-- Content-->
            <section class="col-lg-9">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
              <h6 class="fs-base text-light mb-0"></h6><a class="btn btn-success btn-sm" href="#"><i class="ci-dollar"></i>EARNINGS</a>
            </div>
            <!-- Payment methods list-->
            <div class="table-responsive fs-md mb-4">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Attachment</th>
                    <th>Amount Earned</th>
                    <th>Commision</th>
                    <th>Acc No</th>
                    <th>Txn Code</th>
                    <th>Sale Date</th>
                    
                  </tr>
                </thead>
                <tbody>

                <?php
             $chkearnings = mysqli_query($con,"SELECT vendorsales.*,products.url,products.productname,products.productprice,products.docs FROM vendorsales,products WHERE vendorsales.vendorid='$vendorid' AND vendorsales.productid=products.id ORDER BY vendorsales.id DESC");
             while($row = mysqli_fetch_assoc($chkearnings)){
                 $vid=$row["id"];
                 $vendorid=$row["vendorid"];
                //  $paid=$row["paid"];
                if($vendorid!="0"){
                    $vendor=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM vendors WHERE id='$vendorid'"));
                    $vname=$vendor["vname"];
                    $vphone=$vendor["vphone"];
                }else{
                   $vname="Admin"; 
                   $vphone="";
                }
             ?>
          

                
                  <tr>
                    <td class="py-3 align-middle">
                      <div class="d-flex align-items-center">
                        <div class="ps-2"><span class="fw-medium text-heading me-1"><?php echo $row["productname"];?></span></div>
                      </div>
                    </td>
                    <td class="py-3 align-middle"><a target="_blank" href="../docs/<?php echo $row['docs'] ?>">View Attachment</a></td>
                    <td class="py-3 align-middle">Ksh. <?php echo $row["amount"];?></td>
                    <td class="py-3 align-middle">Ksh. <?php echo $row["sitecommission"];?></td>
                    <td class="py-3 align-middle"><?php echo $row["accno"];?></td>
                    <td class="py-3 align-middle"><?php echo $row["txncode"];?></td>
                    <td class="py-3 align-middle"><?php echo date("d M Y",strtotime($row["createdon"]));?></td>
                    
                  </tr>
                  <?php } ?>
                </tbody>
              </table>

              <!-- Pagination-->
            <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a></li>
              </ul>
              <ul class="pagination">
                <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
              </ul>
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="ci-arrow-right ms-2"></i></a></li>
              </ul>
            </nav>
              
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
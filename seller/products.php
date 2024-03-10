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
    <title>PROFILECODE| Sales</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Profile Code KE |Leading File MarketPlace |PROFILECODE">
    <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
    <meta name="author" content="ProfileCode">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../../img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../img/favicon.png">
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
              <h6 class="fs-base text-light mb-0"></h6><a class="btn btn-success btn-sm" href="#"><i class="ci-dollar"></i>PRODUCTS</a>
            </div>
            <!-- Payment methods list-->
            <div class="table-responsive fs-md mb-4">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Attachement</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>

           <?php

          $chkpurchs = mysqli_query($con,"SELECT * FROM products WHERE vendorid='$vendorid' ORDER BY id DESC");
          while($row = mysqli_fetch_assoc($chkpurchs)){
              $productid=$row["id"];
              // $tailor=$row["tailor"];
              $productcategory=$row["productcategory"];
              $subcat1=$row["subcat1"]
             
          ?>
          

                
                  <tr>

                    <td class="py-3 align-middle"><?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM categories WHERE id='$productcategory'"))['catname'];?></td>

                    <td class="py-3 align-middle"><?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM subcategories WHERE id='$subcat1'"))['subcatname'];?></td>

                    <td class="py-3 align-middle"><a target="_blank" href="../product/<?php echo $row['url'] ?>"><?php echo $row["productname"];?></a></td>
                    <td class="py-3 align-middle">Ksh. <?php echo number_format($row["productprice"]);?></td>
                    <td class="py-3 align-middle"><a target="_blank" href="../docs/<?php echo $row['docs'] ?>">View Attachment</a></td>
                    <td class="py-3 align-middle"><?php echo $row["description"];?></td>
                    <td class="py-3 align-middle"><?php echo date("d M Y",strtotime($row["createdon"]));?> </td>
                    <td>
            <button class="btn btn-xs btn-primary edtpurch" data-toggle="tooltip" data-placement="bottom" title="Edit product" data-productcategory="<?php echo $row['productcategory'] ?>" data-subcat1="<?php echo $row['subcat1'] ?>" data-productname="<?php echo $row['productname'] ?>" data-productprice="<?php echo $row['productprice'] ?>" data-id="<?php echo $row["id"];?>" data-description="<?php echo $row["description"];?>" ><i class="ci-edit"></i></button>
            
           </td>
                    
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
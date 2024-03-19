<?php

session_start();
$sessionid = session_id();
include_once("config/index.php");

?>

<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <title> 
    ProfileCode | Kenyans Leading Digital Files store </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE - Leading Digital File Marketplace">
    <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
    <meta name="author" content="ProfileCode">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon.png">
    <!-- 1 -->
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="vendor/drift-zoom/dist/drift-basic.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
   <script src="js/jquery-3.7.1.min.js"></script>
    <!-- Google Tag Manager-->

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">




    <main class="page-wrapper">
      <!-- // navigation bar code was removed from here -->
  <?php include_once("includes/navbar.php") ?>

      <!-- Page Title-->
      <div class="bg-accent pt-4 pb-5">
        <div class="container pt-2 pb-3 pt-lg-3 pb-lg-4">
          <div class="d-lg-flex justify-content-between pb-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                  <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
                  <li class="breadcrumb-item text-nowrap"><a href="">CATEGORIES</a>
                  </li>
                  <li class="breadcrumb-item text-nowrap active" aria-current="page">..</li>
                </ol>
              </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">

     <?php

    // Check if catid is set in the URL
    if (isset($_GET['catid'])) {
        $catid = $_GET['catid'];
        // Fetch products for the selected category
        $listproducts = mysqli_query($con, "SELECT * FROM categories WHERE id = $catid");
        while ($lp = mysqli_fetch_assoc($listproducts)) {

      ?>

        <h1 class="h3 text-light mb-0"> SHOP BY CATEGORY - <span class="text-uppercase text-warning"><?php echo $lp['catname'] ?></span></h1>

       <?php }
     } else {
       echo "Category not selected.";
     }
     ?>

            </div>
          </div>
        </div>
      </div>
      <div class="container pb-5 mb-2 mb-md-4">
        <!-- Toolbar-->
        <div class="bg-light shadow-lg rounded-3 p-4 mt-n5 mb-4">
          <div class="row gy-3 gx-4 justify-content-between">
            <div class="col-lg-2 col-md-3 col-sm-5 col-12 order-md-1 order-sm-2 order-3">
              <div class="dropdown"><a class="btn btn-outline-secondary dropdown-toggle w-100" href="#shop-filters" data-bs-toggle="collapse"><i class="ci-filter me-2"></i>Filters</a></div>
            </div>
            <div class="col-md col-12 order-md-2 order-sm-1 order-1">
              <div class="input-group">
                <input class="form-control pe-5 rounded" type="text" placeholder="Search collection, title or user..."><i class="ci-search position-absolute top-50 end-0 translate-middle-y zindex-5 me-3"></i>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-7 col-12 order-md-3 order-sm-3 order-2">
              <div class="d-flex align-items-center flex-shrink-0">
                <label class="form-label mb-0 me-2 pe-1 fw-normal text-nowrap d-sm-block d-none">Sort by:</label>
                <select class="form-select">
                  <option selected disabled>Newest</option>
                  <option>Oldest</option>
                </select>
              </div>
            </div>
          </div>
          <!-- Toolbar with expandable filters-->

        </div>



        <!-- Products grid-->
        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 gy-sm-4 gy-3 pt-sm-3" id="defaultcontent">
    <?php

    // Check if catid is set in the URL
    if (isset($_GET['catid'])) {
        $catid = $_GET['catid'];
        // Fetch products for the selected category
        $listproducts = mysqli_query($con, "SELECT * FROM products WHERE productcategory = $catid");
        while ($lp = mysqli_fetch_assoc($listproducts)) {

      ?>

      
          <!-- Product-->
          <div class="col mb-2">
            <article class="card h-100 border-0 shadow">
              <div class="card-img-top position-relative overflow-hidden "><a class="d-block" href="product.php?id=<?php echo $lp['id']; ?>"><img src="products/<?php echo $lp['productimage'] ?>" alt="products/<?php echo $lp['productname'] ?>"></a>

                 
              </div>
              <div class="card-body">
                <h3 class="product-title mb-2 fs-base"><a class="d-block text-truncate" href="product.php?id=<?php echo $lp['id']; ?>"><?php echo $lp['productname']; ?></a></h3>
                <div class="d-flex align-items-center flex-wrap">
                  <h4 class="mt-1 mb-0 fs-base text-darker">KSH<?php echo $lp['productprice']; ?></h4>
                </div>
              </div>
              <div class="card-footer mt-n1 py-0 border-0">
          <div class="d-flex align-items-center position-relative mb-1 py-3 border-top">
        <button class="addtocart btn btn-primary btn-sm d-block w-100 mb-2" type="button" id="<?php echo $lp['id'] ?>"> <i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                </div>
              </div>
            </article>
          </div>

                  <?php
      }
    } else {
      echo "Category not selected.";
    }
    ?>
                 



        </div>
        <hr class="mt-4 mb-3">
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
    </main>
    <!-- Bg shape-->
    <div class="pt-4 bg-secondary">
      <!-- Features-->
      <!-- Marketplace features-->
      <section class="bg-accent bg-size-cover bg-position-center pt-5 pb-4 pb-lg-5" style="background-image: url(img/marketplace/features/features-bg.jpg);">
        <div class="container pt-lg-3">
          <h2 class="h3 mb-3 pb-4 text-light text-center">Why Choose ProfileCode Leading Digital File Marketplace in Kenya?</h2>
          <div class="row pt-lg-2 text-center">
            <div class="col-lg-3 col-sm-6 mb-grid-gutter">
              <div class="d-inline-flex align-items-center text-start"><img src="img/marketplace/features/quality.png" width="52" alt="Quality Guarantee">
                <div class="ps-3">
                  <h6 class="text-light fs-base mb-1">Quality Guarantee</h6>
                  <p class="text-light fs-ms opacity-70 mb-0">Quality checked by our team</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-grid-gutter">
              <div class="d-inline-flex align-items-center text-start"><img src="img/marketplace/features/support.png" width="52" alt="Customer Support">
                <div class="ps-3">
                  <h6 class="text-light fs-base mb-1">Customer Support</h6>
                  <p class="text-light fs-ms opacity-70 mb-0">Friendly 24/7 customer support</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-grid-gutter">
              <div class="d-inline-flex align-items-center text-start"><img src="img/marketplace/features/updates.png" width="52" alt="Free Updates">
                <div class="ps-3">
                  <h6 class="text-light fs-base mb-1">Lifetime Free Updates</h6>
                  <p class="text-light fs-ms opacity-70 mb-0">Upload Files & Earn per Download</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-grid-gutter">
              <div class="d-inline-flex align-items-center text-start"><img src="img/marketplace/features/secure.png" width="52" alt="Secure Payments">
                <div class="ps-3">
                  <h6 class="text-light fs-base mb-1">Secure Payments</h6>
                  <p class="text-light fs-ms opacity-70 mb-0">Fully Secured Mobile Payments</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
    <!-- Footer-->

     <!-- footer section code was removed here -->
  <?php include_once("includes/footer.php") ?>

  <script>
            $('#defaultcontent').on('click','.addtocart', function(){
            var productid=$(this).attr("id");
            var sessionid="<?php echo $sessionid ?>"
            $("#status").html("<div class=' col-md-12 alert alert-success alert-dismissible'><i class='fa fa-pulse fa-spin'>&nbsp;</i>adding product to cart </div>");
            $.ajax({
            
            url:"app/addtocart.php",
            method:"POST",
            data:{productid:productid,sessionid:sessionid},
            success: 
            function(returnhtml){
            if(returnhtml=="success"){
            $("#status").fadeIn(1);
            $("#status").html("<div class=' col-md-12 alert alert-success alert-dismissible'><i class='fa fa-check'>&nbsp;</i>Product Added to cart </div>");
            $('.hi1').load(document.URL +  ' .hi1');
            $("#status").fadeOut(3000);
            }else{
            $("#status").fadeIn(1);
            $("#status").html("<div class=' col-md-12 alert alert-danger alert-dismissible'><i class='fa fa-times-circle-o'>&nbsp;</i>Error adding product to cart</div>");
            $('.hi1').load(document.URL +  ' .hi1');
            $("#status").fadeOut(3000);
            }
            }
            })
            });
          </script>

  </body>

</html>
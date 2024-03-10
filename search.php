<?php
session_start();
 $sessionid = session_id();
include_once("config/index.php");
if(isset($_POST['searchproduct'])){
    $searchproduct=$_POST['searchproduct'];
}else{
    header("Location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <title><?php echo $searchproduct ?> | PROFILECODE| Shop |File & Folders|Search Page</title>
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
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="vendor/nouislider/dist/nouislider.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/drift-zoom/dist/drift-basic.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <!-- Google Tag Manager-->

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->



    <main class="page-wrapper">
      <!-- Quick View Modal-->


      <!-- // navigation bar code was removed from here -->
      <?php include_once("includes/navbar.php") ?>

      
      <!-- used for shop templates with filters on top-->
      <div class="bg-dark pt-4 pb-5">
        <div class="container pt-2 pb-3 pt-lg-3 pb-lg-4">
          <div class="d-lg-flex justify-content-between pb-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                  <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
                  <li class="breadcrumb-item text-nowrap"><a href="#">Search </a>
                  </li>
                  
                </ol>
              </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
              <h1 class="h3 text-light mb-0">YOUR SEARCH RESULTS</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="container pb-5 mb-2 mb-md-4" id="defaultcontent">

        <!-- Products grid-->
        <div class="row pt-3 mx-n2">
        <?php
                                                $listproducts=mysqli_query($con,"SELECT * FROM products,categories,subcategories WHERE (productname LIKE '%$searchproduct%' OR description LIKE '%$searchproduct%' OR categories.catname LIKE '%$searchproduct%' OR subcategories.subcatname LIKE '%$searchproduct%') AND products.productcategory=categories.id AND products.subcat1=subcategories.id AND categories.id=subcategories.catid");
                                                if(mysqli_num_rows($listproducts)>0){
                                                while($lp=mysqli_fetch_assoc($listproducts)){
            ?>
          <!-- Product-->

          <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card">
              <a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="products/<?php echo $lp['productimage'] ?>" alt="<?php echo $lp['productname'] ?>"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">SEARCHED PRODUCT</a>
                <h3 class="product-title fs-sm"><a href="single-product.php"><?php echo $lp['productname'] ?></a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">KSH <?php echo $lp['productprice'] ?> </span></div>
                  <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                  </div>
                </div>
              </div>
              <div class="card-body card-body-hidden">

                <button class="btn btn-primary btn-sm d-block w-100 mb-2 addtocart" type="button"id="<?php echo $lp['id'] ?>"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                
              </div>
            </div>
            <hr class="d-sm-none">


          </div>
          <?php }}else{ ?>
                      <div class="product-info">
                                   <h6 class="product-name">No product or category found, please try again</h6>
                                  
                              </div>
                     <?php } ?>





        </div>


        <!-- Banners-->
        <div class="row py-sm-2">
          <div class="col-md-8 mb-4">
            <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden rounded-3">
              <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                <h4 class="fs-lg fw-light mb-2">Hurry up! Limited time offer</h4>
                <h3 class="mb-4">Browse extensive Files Categories</h3><a class="btn btn-primary btn-shadow btn-sm" href="#">Shop Now</a>
              </div><img class="d-block ms-auto" src="img/shop/catalog/dummy2.png" alt="Shop Converse">
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="d-flex flex-column h-100 bg-size-cover bg-position-center rounded-3 py-4" style="background-image: url(img/blog/banner-bg.jpg);">
              <div class="py-4 my-2 px-4 text-center">
                <h5 class="mb-2">Your Add Banner Here</h5>
                <p class="fs-sm text-muted">Hurry up to reserve your spot</p><a class="btn btn-primary btn-shadow btn-sm" href="#">Contact us</a>
              </div>
            </div>
          </div>
        </div>


      </div>
    </main>
    <!-- Footer-->

    
    <!-- footer section code was removed here -->
  <?php include_once("includes/footer.php") ?>


  <script>
           $('#defaultcontent').on('click', '.addtocart', function(){
            var productid=$(this).attr("id");
            var sessionid="<?php echo $sessionid ?>"
      $("#status").html("<div class=' col-md-12 alert alert-success alert-dismissible'><i class='fa fa-pulse fa-spin'>&nbsp;</i>adding product to cart </div>");
      $.ajax({

        url: "app/addtocart.php",
        method: "POST",
        data: { productid: productid, sessionid: sessionid },
        success:
          function (returnhtml) {
            if (returnhtml == "success") {
              $("#status").fadeIn(1);
              $("#status").html("<div class=' col-md-12 alert alert-success alert-dismissible'><i class='fa fa-check'>&nbsp;</i>Product Added to cart </div>");
              $('.hi1').load(document.URL + ' .hi1');
              $("#status").fadeOut(3000);
            } else {
              $("#status").fadeIn(1);
              $("#status").html("<div class=' col-md-12 alert alert-danger alert-dismissible'><i class='fa fa-times-circle-o'>&nbsp;</i>Error adding product to cart</div>");
              $('.hi1').load(document.URL + ' .hi1');
              $("#status").fadeOut(3000);
            }
          }

      })
    });

  </script>


  </body>

</html>
<?php
session_start();
$sessionid = session_id();
include_once("config/index.php");
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Your cart</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Bootstrap E-commerce Template">
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
    <script src="js/jquery-3.7.1.min.js"></script>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <!-- Google Tag Manager-->

  </head>

  <!-- Body-->
  <body class="handheld-toolbar-enabled">

        <!-- // navigation bar code was removed from here -->
        <?php include_once("includes/navbar.php") ?>


      <!-- Page Title-->
      <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                </li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Your cart</h1>
          </div>
        </div>
      </div>
      <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">

          <!-- List of items-->
          <section class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
              <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2" href="shop.php"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
            </div>

                                          <?php
                                            $listcart=mysqli_query($con,"SELECT * FROM cart WHERE sessionid='$sessionid'");
                                            $subtotal=0;
                                            if(mysqli_num_rows($listcart)>0){
                                            while($lc=mysqli_fetch_assoc($listcart)){
                                                $productid=$lc["productid"];
                                                $cartid=$lc["id"];
                                                $product=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM products WHERE id='$productid'"));
                                                
                                                $subtotal+=$product['productprice']*$lc['quantity'];
                                            ?>


            <!-- Item-->
            <div class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
              <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"><img src="img/shop/cart/dummy.png" width="160" alt="Product"></a>
                <div class="pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html"><?php echo $product['productname'] ?></a></h3>
        
                  <div class="fs-lg text-accent pt-2">KSH <?php echo $product['productprice']*$lc['quantity'] ?></div>
                </div>
              </div>
              <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                
                <button class="btn btn-link px-0 text-danger removefromcart" type="button"><i class="removefromcart ci-close-circle me-2" id="<?php echo $lc['id'] ?>"></i><span class="fs-sm">Remove</span></button>
              </div>
            </div>

            <?php }} ?>

            <!-- <button class="btn btn-outline-accent d-block w-100 mt-4" type="button"><i class="ci-loading fs-base me-2"></i>Update cart</button> -->
          </section>


          <!-- Sidebar-->

          <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5 mt-5">
            <div class="bg-white rounded-3 shadow-lg p-4">
              <div class="py-2 px-xl-2">
                <div class="text-center mb-4 pb-3 border-bottom">
                  <h2 class="h6 mb-3 pb-1">Subtotal</h2>
                  <h3 class="fw-normal">KSH  <?php echo $subtotal ?></h3>
                </div>
                <div class="accordion" id="order-options">

                </div><a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="checkout-payment.php"><i class="ci-card fs-lg me-2"></i>Proceed to Checkout</a>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </main>

    <!-- Footer-->

 <!-- footer section code was removed here -->
  <?php include_once("includes/footer.php") ?>




                 <script>
                    // remove from cart
                    $(".removefromcart").click(function(){
                  var cartid= $(this).attr("id");
                  var sessionid="<?php echo $sessionid ?>"
                    $.ajax({
                    
                    url:"app/removefromcart.php",
                    method:"POST",
                    data:{cartid:cartid,sessionid:sessionid},
                    success: 
                    function(returnhtml){
                    if(returnhtml=="success"){
                     $("#status").html("<div class=' col-md-12 alert alert-success alert-dismissible'><i class='fa fa-check'>&nbsp;</i>Product removed from cart </div>");
                        setTimeout( 
                      function() {
                        window.location.reload("cart.php");
                      }, 2000);
                    }else{
                    $("#status").html("<div class=' col-md-12 alert alert-danger alert-dismissible'><i class='fa fa-times-circle-o'>&nbsp;</i>Error removing product</div>");
                        setTimeout( 
                      function() {
                        window.location.reload(true);
                      }, 2000);
                    }
                    }
                    })
                  
                 });
    </script>
  </body>

</html>
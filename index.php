<?php
session_start();
$sessionid = session_id();
include_once("config/index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ProfileCode | Kenyans Leading Digital Files store</title>
  <!-- SEO Meta Tags-->
  <meta name="description" content="PROFILECODE- Leading Digital File Marketplace">
  <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
  <meta name="author" content="ProfileCode">
  <!-- Viewport-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon and Touch Icons-->
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
  <link rel="manifest" href="site.webmanifest">
  <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
  <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css" />
  <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css" />
  <link rel="stylesheet" media="screen" href="vendor/drift-zoom/dist/drift-basic.min.css" />
  <!-- Main Theme Styles + Bootstrap-->
  <link rel="stylesheet" media="screen" href="css/theme.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Google Tag Manager-->

</head>


<!-- Body-->

<body class="handheld-toolbar-enabled">

  <!-- // navigation bar code was removed from here -->
  <?php include_once("includes/navbar.php") ?>

  <!-- Hero slider starts here-->
  <section class="tns-carousel tns-controls-lg">
    <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
      <!-- Item-->
      <div class="px-sm-5" style="background-color: #3aafd2;">
        <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/home/hero-slider/dummy.png" alt="Summer Collection">
          <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
            <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
              <h3 class="h2 text-light fw-light pb-1 from-start">Welcome to the</h3>
              <h2 class="text-light display-5 from-start delay-1">Leading Digital File Marketplace in Kenya</h2>
              <h3 class="fs-lg text-light pb-3 from-start delay-2">Download Priced BOQs, Cold-Call Marketing Contacts, Church Bulletins, Pass Codes and Much More</h3>
              <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="shop-grid-ls.html">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item-->
      <div class="px-lg-5" style="background-color: #f5b1b0;">
        <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/home/hero-slider/dummy2.png" alt="Women Sportswear">
          <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
          <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
              <h3 class="h2 text-light fw-light pb-1 from-start">Welcome to the</h3>
              <h2 class="text-light display-5 from-start delay-1">Leading Digital File Marketplace in Kenya</h2>
              <h3 class="fs-lg text-light pb-3 from-start delay-2">Download Priced BOQs, Cold-Call Marketing Contacts, Church Bulletins, Pass Codes and Much More</h3>
              <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="shop-grid-ls.html">Download<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item-->
      <div class="px-lg-5" style="background-color: #eba170;">
        <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/home/hero-slider/dummy3.png" alt="Men Accessories">
          <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem; z-index: 10;">
          <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
              <h3 class="h2 text-light fw-light pb-1 from-start">Welcome to the</h3>
              <h2 class="text-light display-5 from-start delay-1">Leading Digital File Marketplace in Kenya</h2>
              <h3 class="fs-lg text-light pb-3 from-start delay-2">Download Priced BOQs, Cold-Call Marketing Contacts, Church Bulletins, Pass Codes and Much More</h3>
              <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="shop-grid-ls.html">Download<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- Hero slider ends here-->

  <!-- Page Title-->
  <div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      
      <!-- Breadcrump should be dynamic start-->
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a>
            </li>
            <!-- <li class="breadcrumb-item text-nowrap active" aria-current="page">Grid left sidebar</li> -->
          </ol>
        </nav>
      </div>
      <!-- Breadcrump should be dynamic  ends here-->

      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">ProfileCode shop</h1>
      </div>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
      <!-- Sidebar-->
      <aside class="col-lg-3">
        <!-- Sidebar-->
        <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar" style="max-width: 20rem;">
          <div class="offcanvas-header align-items-center shadow-sm">
            <h2 class="h5 mb-0">Filters</h2>
            <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body py-grid-gutter px-sm-grid-gutter">

            <!-- Categories SIDE BAR STARTS HERE-->

            
<!-- // navigationCategory sidebar was here but now include -->

  <?php include_once("includes/category-sidebar.php") ?>


            <!-- Categories SIDE BAR ENDS HERE-->

          </div>
        </div>
      </aside>
      <!-- Content  -->
      <section class="col-lg-9">
        <!-- Toolbar-->
        <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">

          <div class="d-flex pb-3"><a class="nav-link-style nav-link-light me-3" href="#"></div>
          <div class="d-none d-sm-flex pb-3"></div>
        </div>


        <!-- Products grid-->
        <div class="row mx-n2"  id="defaultcontent">
          
        <?php
             $listproducts=mysqli_query($con,"SELECT * FROM products ORDER BY id DESC LIMIT 12");
            while($lp=mysqli_fetch_assoc($listproducts)){   ?>
            

          <!-- Product-->

           <div class="col-md-3 col-sm-6 px-2 mb-4">

            <div class="card product-card">
               
              <a class="card-img-top d-block overflow-hidden" href="product/<?php echo $lp['url'] ?>"><img src="products/<?php echo $lp['productimage'] ?>" alt="<?php echo $lp['productname'] ?> " class="fit-image"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"></a>
                <h3 class="product-title fs-sm"><a href="product/<?php echo $lp['url'] ?>"><?php echo $lp['productname'] ?></a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">KSH <?php echo $lp['productprice'] ?></span></div>
  
                </div>
              </div>
              <div class="card-body card-body-hidden">

                <button class="addtocart btn btn-primary btn-sm d-block w-100 mb-2" type="button" id="<?php echo $lp['id'] ?>" ><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                
              </div>
            </div>
            <hr class="d-sm-none">

            
          </div>
          <?php } ?> 

          <style>
           .fit-image {
    max-width: 550px;  /* Set the maximum width */
    max-height: 370px; /* Set the maximum height */
    width: auto;       /* Allow the image to scale width while maintaining aspect ratio */
    height: auto;      /* Allow the image to scale height while maintaining aspect ratio */
    object-fit: cover;
}
            </style>

        </div>


        <!-- Banner-->
        <div class="py-sm-2">
          <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
            <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
              <h4 class="fs-lg fw-light mb-2">Converse All Star</h4>
              <h3 class="mb-4">Make Your Day Comfortable</h3><a class="btn btn-primary btn-shadow btn-sm" href="shop.php">Shop Now</a>
            </div><img class="d-block ms-auto" src="img/shop/catalog/dummy2.png" alt="Shop Converse">
          </div>
        </div>

        <!-- Products grid-->

        <div class="row mx-n2">

          <!-- Product-->
           <div class="col-md-3 col-sm-6 px-2 mb-4">
            <div class="card product-card">
               <a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Company Profiles</a>
                <h3 class="product-title fs-sm"><a href="single-product.php">Company Product 1</a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">Ksh 30 .<small>50</small></span></div>
  
                </div>
              </div>
              <div class="card-body card-body-hidden">

                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>

          <!-- Product-->
           <div class="col-md-3 col-sm-6 px-2 mb-4">
            <div class="card product-card">
               <a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Company Profiles</a>
                <h3 class="product-title fs-sm"><a href="single-product.php">Company Product 1</a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">Ksh 30 .<small>50</small></span></div>
  
                </div>
              </div>
              <div class="card-body card-body-hidden">

                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>

          <!-- Product-->

           <div class="col-md-3 col-sm-6 px-2 mb-4">
            <div class="card product-card">
               <a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Company Profiles</a>
                <h3 class="product-title fs-sm"><a href="single-product.php">Company Product 1</a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">Ksh 30 .<small>50</small></span></div>
  
                </div>
              </div>
              <div class="card-body card-body-hidden">

                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>

          <!-- Product-->

           <div class="col-md-3 col-sm-6 px-2 mb-4">
            <div class="card product-card">
               <a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Company Profiles</a>
                <h3 class="product-title fs-sm"><a href="single-product.php">Company Product 1</a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">Ksh 30 .<small>50</small></span></div>
  
                </div>
              </div>
              <div class="card-body card-body-hidden">

                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>

          <!-- Product-->

           <div class="col-md-3 col-sm-6 px-2 mb-4">
            <div class="card product-card">
               <a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Company Profiles</a>
                <h3 class="product-title fs-sm"><a href="single-product.php">Company Product 1</a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">Ksh 30 .<small>50</small></span></div>
  
                </div>
              </div>
              <div class="card-body card-body-hidden">

                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>

          <!-- Product-->

           <div class="col-md-3 col-sm-6 px-2 mb-4">
            <div class="card product-card">
               <a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Company Profiles</a>
                <h3 class="product-title fs-sm"><a href="single-product.php">Company Product 1</a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">Ksh 30 .<small>50</small></span></div>
  
                </div>
              </div>
              <div class="card-body card-body-hidden">

                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>

          <!-- Product-->

           <div class="col-md-3 col-sm-6 px-2 mb-4">
            <div class="card product-card">
               <a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Company Profiles</a>
                <h3 class="product-title fs-sm"><a href="single-product.php">Company Product 1</a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">Ksh 30 .<small>50</small></span></div>
  
                </div>
              </div>
              <div class="card-body card-body-hidden">

                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>

          <!-- Product-->

           <div class="col-md-3 col-sm-6 px-2 mb-4">
            <div class="card product-card">
               <a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Company Profiles</a>
                <h3 class="product-title fs-sm"><a href="single-product.php">Company Product 1</a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">Ksh 30 .<small>50</small></span></div>
  
                </div>
              </div>
              <div class="card-body card-body-hidden">

                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                <div class="text-center"><a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick view</a></div>
              </div>
            </div>
            <hr class="d-sm-none">
          </div>



        </div>
        <hr class="my-3">
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
      </section>
    </div>
  </div>
  </main>
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
  <!-- footer section code was removed here -->
  <?php include_once("includes/footer.php") ?>

  <script>
           $('#defaultcontent').on('click', '.addtocart', function(){
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

<!-- LOGIN SIGNUP AJAX SCRIPT STARTS HERE -->
<script>
            $(function() {
             $("#loginfrm").submit(function(e){
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
             
              $("#signupfrm").submit(function(e){
               e.preventDefault();
                $("#status").html("<p class='alert alert-success'><i class='fas fa-spinner fa-pulse'></i> Submitting data...</p>");
                $.ajax({
                  method: "POST",
                  url : "app/vendorsignup",
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
<!-- LOGIN SIGNUP AJAX SCRIPT STARTS HERE -->

</body>

</html>
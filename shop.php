<?php
session_start();
$sessionid = session_id();
include_once("config/index.php");
$expld_url = $_SERVER["REQUEST_URI"];
$url = $_GET['fbclid'] ?? $expld_url;
$expld_url = explode("/", $url);
$url = end($expld_url);
if (!empty($url)) {
    $lb = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM categories WHERE url='$url'"));
    $pcatid = $lb["id"];
} else {
    header("Location:../");
}
?>

<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <title> ProfileCode | Kenyans Leading Digital Files store</title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Google Tag Manager-->

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">




    <main class="page-wrapper">
      <!-- // navigation bar code was removed from here -->
  <?php include_once("includes/navbar.php") ?>

        <!-- Page Title (Light)-->
        <div class="bg-secondary py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">SHOP</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">SHOP  NOW</h1>
          </div>
        </div>
      </div>
      
      <br>
      <br>
      <br>
      <br>
      <br>
    
    
      <!-- Popular categories-->
      <section class="container position-relative pt-5 pt-lg-0 pb-5 mt-lg-n10" style="z-index: 10;">
        <div class="row">
          <div class="col-xl-8 col-lg-9">
            <div class="card border-0 shadow-lg">
              <div class="card-body px-3 pt-grid-gutter pb-0">
                <div class="row g-0 ps-1">

                  <div class="col-sm-4 px-2 mb-grid-gutter"><a class="d-block text-center text-decoration-none me-1" href="#"><img class="d-block rounded mb-3" src="img/shop/catalog/dummy.png" alt="Product">
                  <h3 class="fs-base pt-1 mb-0">Academic Files</h3></a>
                  </div>

                  <div class="col-sm-4 px-2 mb-grid-gutter"><a class="d-block text-center text-decoration-none me-1" href="#"><img class="d-block rounded mb-3" src="img/shop/catalog/dummy.png" alt="Product">
                  <h3 class="fs-base pt-1 mb-0">Pass Codes</h3></a></div>

                  <div class="col-sm-4 px-2 mb-grid-gutter"><a class="d-block text-center text-decoration-none me-1" href="#"><img class="d-block rounded mb-3" src="img/shop/catalog/dummy.png" alt="Product">
                      <h3 class="fs-base pt-1 mb-0">Printable Calenders</h3></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Products grid (Trending products)-->
      <section class="container pt-md-3 pb-5 mb-md-3">
        <!-- <h2 class="h3 text-center">Trending Product Files</h2> -->
        <div class="row pt-4 mx-n2">


                                              <?php
                                                if($pcatid!=""){
                                                $listproducts=mysqli_query($con,"SELECT * FROM products WHERE productcategory='$pcatid' ORDER BY id DESC LIMIT 32");
                                                }else{
                                                 $listproducts=mysqli_query($con,"SELECT * FROM products ORDER BY id DESC LIMIT 32");   
                                                }
                                                while($lp=mysqli_fetch_assoc($listproducts)){
                                                ?>


          <!-- Product-->
          <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card mb-4">
              <a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="./products/<?php echo $lp['productimage'] ?>"  class="fit-image" alt="<?php echo $lp['productname'] ?>"></a>
              <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Company Templates</a>
                <h3 class="product-title fs-sm"><a href="single-product.php"><?php echo $lp['productname'] ?></a></h3>
                <div class="d-flex justify-content-between">
                  <div class="product-price"><span class="text-accent">KSH <?php echo $lp['productprice'] ?></span></div>
    
                </div>
              </div>
              

                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button" id="<?php echo $lp['id'] ?>"><i class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                
              
            </div>

            <hr class="d-sm-none">

          </div>

          <?php } ?>

          <style>
           .fit-image {
    max-width: 500px;  /* Set the maximum width */
    max-height: 370px; /* Set the maximum height */
    width: auto;       /* Allow the image to scale width while maintaining aspect ratio */
    height: auto;      /* Allow the image to scale height while maintaining aspect ratio */
    object-fit: cover;
}
            </style>

        </div>

        <div class="text-center pt-3"><a class="btn btn-outline-accent" href="#">More products<i class="ci-arrow-right ms-1"></i></a></div>
      </section>


      <!-- Banners-->
      <section class="container pb-4 mb-md-3">
        <div class="row">
          <div class="col-md-8 mb-4">
            <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden rounded-3">
              <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                <h4 class="fs-lg fw-light mb-2">Hurry up! Limited time offer</h4>
                <h3 class="mb-4">Printable Calenders on Sale !</h3><a class="btn btn-primary btn-shadow btn-sm" href="#">Shop Now</a>
              </div><img class="d-block ms-auto" src="img/shop/catalog/dummy2.png" alt="Shop Converse">
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="d-flex flex-column h-100 justify-content-center bg-size-cover bg-position-center rounded-3" style="background-image: url(img/blog/banner-bg.jpg);">
              <div class="py-4 my-2 px-4 text-center">
                <div class="py-1">
                  <h5 class="mb-2">Your Add Banner Here</h5>
                  <p class="fs-sm text-muted">Hurry up to reserve your spot</p><a class="btn btn-primary btn-shadow btn-sm" href="contact.php">Contact us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Featured category (Hoodie)-->
      <section class="container mb-4 pb-3 pb-sm-0 mb-sm-5">
        <div class="row">
          <!-- Banner with controls-->
          <div class="col-md-5">
            <div class="d-flex flex-column h-100 overflow-hidden rounded-3" style="background-color: #e2e9ef;">
              <div class="d-flex justify-content-between px-grid-gutter py-grid-gutter">
                <div>
                  <h3 class="mb-1">Files & Folders Day</h3><a class="fs-md" href="#">Shop Pass Code Files<i class="ci-arrow-right fs-xs align-middle ms-1"></i></a>
                </div>
                <div class="tns-carousel-controls" id="hoodie-day">
                  <button type="button"><i class="ci-arrow-left"></i></button>
                  <button type="button"><i class="ci-arrow-right"></i></button>
                </div>
              </div><a class="d-none d-md-block mt-auto" href="#"><img class="d-block w-100" src="img/home/categories/dummy.png" alt="For Women"></a>
            </div>
          </div>
          <!-- Product grid (carousel)-->
          <div class="col-md-7 pt-4 pt-md-0">
            <div class="tns-carousel">
              <div class="tns-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#hoodie-day&quot;}">
                <!-- Carousel item-->
                <div>
                  <div class="row mx-n2">

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>



                  </div>
                </div>
                <!-- Carousel item-->
                <div>
                  <div class="row mx-n2">

                  <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="single-product.php"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">Profile &amp; Code</a>
                          <h3 class="product-title fs-sm"><a href="single-product.php">Product A</a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">KSH 24.<small>99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Shop by brand-->
      <!-- <section class="container py-lg-4 mb-4">
        <h2 class="h3 text-center pb-4">Shop by SubCategory</h2>
        <div class="row">

          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/catalog/dummy.png" style="width: 150px;" alt="Brand"></a></div>

          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/catalog/dummy.png" style="width: 150px;" alt="Brand"></a></div>

          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/catalog/dummy.png" style="width: 150px;" alt="Brand"></a></div>

          <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="#"><img class="d-block mx-auto" src="img/shop/catalog/dummy.png" style="width: 150px;" alt="Brand"></a></div>

       

 
        </div>
      </section> -->
      <!-- Blog + Instagram info cards-->
      <section class="container-fluid px-0">
        <div class="row g-0">
          <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-primary" href="blog-list-sidebar.html">
              <div class="card-body text-center"><i class="ci-edit h3 mt-2 mb-4 text-primary"></i>
                <h3 class="h5 mb-1">Read the blog</h3>
                <p class="text-muted fs-sm">Latest store, Product News and trends</p>
              </div></a></div>
          <div class="col-md-6"><a class="card border-0 rounded-0 text-decoration-none py-md-4 bg-faded-accent" href="#">
              <div class="card-body text-center"><i class="ci-instagram h3 mt-2 mb-4 text-accent"></i>
                <h3 class="h5 mb-1">Follow on Instagram</h3>
                <p class="text-muted fs-sm">@theprofilecode</p>
              </div></a></div>
        </div>
      </section>
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
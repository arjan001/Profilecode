<?php
session_start();
$sessionid = session_id();

include_once("config/index.php");
?>

<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <title>PROFILECODE | Best Products ever</title>
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

    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="vendor/drift-zoom/dist/drift-basic.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/lightgallery/css/lightgallery-bundle.min.css"/>

    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <!-- Google Tag Manager-->

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled" id="defaultcontent">
    <!-- Google Tag Manager (noscript)-->


      <!-- // navigation bar code was removed from here -->
      <?php include_once("includes/navbar.php") ?>

      <!-- Custom page title-->
      <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3" id="defaultcontent">

                      <?php

                      // Fetch the product details from the database using the product ID
                      
                     $product_id = $_GET['id'];
                      $listproducts = mysqli_query($con, "SELECT * FROM products WHERE id = $product_id");
                      while ($lp = mysqli_fetch_assoc($listproducts)) {

                      // Display the product details on the single product page
                      

                      
                      ?>





        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
        <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
        <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a></li>
        <li class="breadcrumb-item text-nowrap active" aria-current="page"><?php echo $lp['productname']; ?></li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-2"><?php echo $lp['productname']; ?></h1>
            <div>
                 
              <span class="d-inline-block fs-sm text-white opacity-70 align-middle mt-1 ms-1">74 Reviews</span>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="bg-light shadow-lg rounded-3">
          <!-- Tabs-->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link py-4 px-sm-4 active" href="#general" data-bs-toggle="tab" role="tab">General Product <span class='d-none d-sm-inline'>Info</span></a></li>
          
       
          </ul>
          <div class="px-4 pt-lg-3 pb-3 mb-5">
            <div class="tab-content px-lg-3">
              <!-- General info tab-->
              <div class="tab-pane fade show active" id="general" role="tabpanel">

                <div class="row">

                  <!-- Product gallery-->
                  <div class="col-lg-7 pe-lg-0">

                    <div class="product-gallery">

                      <div class="product-gallery-preview order-sm-2">
                        
            <div class="product-gallery-preview-item active fit-image" id="first"><img class="image-zoom" src="products/<?php echo $lp['productimage'] ?>" data-zoom="products/<?php echo $lp['productimage'] ?>" alt="<?php echo $lp['productname'] ?>">
                          <div class="image-zoom-pane"></div>

                        </div>
                      </div>
                    </div>

                  </div>
                                          <style>
                        .fit-image {
                        max-width: 400px;  /* Set the maximum width */
                         max-height: 400px; /* Set the maximum height */
                         width: auto;       /* Allow the image to scale width while maintaining aspect ratio */
                         height: auto;      /* Allow the image to scale height while maintaining aspect ratio */
                         
                                   }
                       </style>

                  <!-- Product details-->
                  <div class="col-lg-5 pt-4 pt-lg-0">
                    <div class="product-details ms-auto pb-3">
                      <div class="h3 fw-normal text-accent mb-3 me-1">PRICE : KSH <span class="text-danger"><?php echo $lp['productprice'] ?></span> </div>

                           <br>                     

                      <div class="position-relative me-n4 mb-3">


                        <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product available</div>
                      </div>
                      <div class="d-flex align-items-center pt-2 pb-4">

                        <button class="addtocart btn btn-primary btn-shadow d-block w-100" id="<?php echo $lp['id'] ?>" type="button"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                      </div>
                      <div class="d-flex mb-4">
                        <div class="w-100 me-3">
                            
                        </div>
 
                      </div>
                      <!-- Product panels-->
                      <div class="accordion mb-4" id="productPanels">
                        <div class="accordion-item">
                          <h3 class="accordion-header"><a class="accordion-button" href="#shippingOptions" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Shipping options</a></h3>
                          <div class="accordion-collapse collapse show" id="shippingOptions" data-bs-parent="#productPanels">
                            <div class="accordion-body fs-sm">
                              <div class="d-flex justify-content-between border-bottom pb-2">
                                <div>
                                  <div class="fw-semibold text-dark">Local courier shipping</div>
                                  <div class="fs-sm text-muted">2 - 4 days</div>
                                </div>
                                <div>KSH 16 </div>
                              </div>
                              <div class="d-flex justify-content-between border-bottom py-2">
                                <div>
                                  <div class="fw-semibold text-dark">UPS ground shipping</div>
                                  <div class="fs-sm text-muted">4 - 6 days</div>
                                </div>
                                <div>KSH 19 </div>
                              </div>
                              <div class="d-flex justify-content-between pt-2">
                                <div>
                                  <div class="fw-semibold text-dark">Local pickup from store</div>
                                  <div class="fs-sm text-muted">&mdash;</div>
                                </div>
                                <div>KSH 0</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h3 class="accordion-header"><a class="accordion-button collapsed" href="#localStore" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="localStore"><i class="ci-location text-muted fs-lg align-middle mt-n1 me-2"></i>Find in local store :coming soon</a></h3>

                        </div>
                      </div>
                      <!-- Sharing-->
                      <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
                    </div>
                  </div>
                </div>
              </div>



              
            </div>
          </div>
        </div>
      </div>
      <!-- Product description-->
      <div class="container pt-lg-3 pb-4 pb-sm-5">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2 class="h3 pb-2"><span class="text-dark"> <?php echo $lp['productname'] ?> </span>  DESCRIPTION</h2>
            <p><?php echo $lp['description'] ?></p>
          </div>
        </div>
      </div>

      <?php } ?>
       
      <hr class="mb-5">

      

      <!-- Product carousel (You may also like)-->
      <div class="container pt-lg-2 pb-5 mb-md-3">
        <h2 class="h3 text-center pb-4">BROWSE SIMILAR PROCUCT CATEGORIES</h2>
        <div class="tns-carousel tns-controls-static tns-controls-outside">
          <div class="tns-carousel-inner " data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: true, &quot;nav&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 18},&quot;768&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:4, &quot;gutter&quot;: 30}}}">


               


            <!-- Product-->
            <div>
              <div class="card product-card card-static">
                 <a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">SIMILAR PRODUCTS</a>
                  <h3 class="product-title fs-sm"><a href="#">Reformed Church Bulletins</a></h3>
                  <div class="d-flex justify-content-between">
                    <div class="product-price"><span class="text-accent">KSH 250.<small>00</small></span></div>
   
                  </div>
                </div>
                <button class="addtocart btn btn-primary btn-sm d-block w-100 mb-2" type="button" id="<?php echo $lp['id'] ?>"> <i
                    class="ci-cart fs-sm me-1"></i>Add to Cart</button>
              </div>
            </div>
            <!-- Product-->
            <div>
              <div class="card product-card card-static">
                 <a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">SIMILAR PRODUCTS</a>
                  <h3 class="product-title fs-sm"><a href="#">Reformed Church Bulletins</a></h3>
                  <div class="d-flex justify-content-between">
                    <div class="product-price"><span class="text-accent">KSH 250.<small>00</small></span></div>
   
                  </div>
                </div>
                <button class="addtocart btn btn-primary btn-sm d-block w-100 mb-2" type="button" id="<?php echo $lp['id'] ?>"> <i
                    class="ci-cart fs-sm me-1"></i>Add to Cart</button>
              </div>
            </div>
            <!-- Product-->
            <div>
              <div class="card product-card card-static">
                 <a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">SIMILAR PRODUCTS</a>
                  <h3 class="product-title fs-sm"><a href="#">Reformed Church Bulletins</a></h3>
                  <div class="d-flex justify-content-between">
                    <div class="product-price"><span class="text-accent">KSH 250.<small>00</small></span></div>
   
                  </div>
                </div>
                <button class="addtocart btn btn-primary btn-sm d-block w-100 mb-2" type="button" id="<?php echo $lp['id'] ?>"> <i
                    class="ci-cart fs-sm me-1"></i>Add to Cart</button>
              </div>
            </div>
            <!-- Product-->
            <div>
              <div class="card product-card card-static">
                 <a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">SIMILAR PRODUCTS</a>
                  <h3 class="product-title fs-sm"><a href="#">Reformed Church Bulletins</a></h3>
                  <div class="d-flex justify-content-between">
                    <div class="product-price"><span class="text-accent">KSH 250.<small>00</small></span></div>
   
                  </div>
                  <button class="addtocart btn btn-primary btn-sm d-block w-100 mb-2" type="button" id="<?php echo $lp['id'] ?>"> <i
                      class="ci-cart fs-sm me-1"></i>Add to Cart</button>
                </div>
              </div>
            </div>
            <!-- Product-->
            <div>
              <div class="card product-card card-static">
                 <a class="card-img-top d-block overflow-hidden" href="#"><img src="img/shop/catalog/dummy.png" alt="Product"></a>
                <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#">SIMILAR PRODUCTS</a>
                  <h3 class="product-title fs-sm"><a href="#">Reformed Church Bulletins</a></h3>
                  <div class="d-flex justify-content-between">
                    <div class="product-price"><span class="text-accent">KSH 250.<small>00</small></span></div>
   
                  </div>
                </div>
                <button class="addtocart btn btn-primary btn-sm d-block w-100 mb-2" type="button" id="<?php echo $lp['id'] ?>"> <i
                    class="ci-cart fs-sm me-1"></i>Add to Cart</button>
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
          $(function() {

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




      });
    </script>

  </body>


</html>
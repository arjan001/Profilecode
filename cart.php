<?php
session_start();
$sessionid = session_id();
include_once("config/index.php");
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Your cart | Profile Code KE</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Profile Code KE |Leading File MarketPlace |PROFILECODE">
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
              <h2 class="h6 text-light mb-0">Products</h2><a class="btn btn-outline-primary btn-sm ps-2" href="index.php"><i class="ci-arrow-left me-2"></i>Continue shopping</a>
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
              <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="#"><img src="products/<?php echo $product['productimage'] ?>" alt="<?php echo $product['productname'] ?> "  width="160" alt="Product"></a>
                <div class="pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="#"><?php echo $product['productname'] ?></a></h3>
        
                  <div class="fs-lg text-accent pt-2">KSH <?php echo $product['productprice']*$lc['quantity'] ?></div>
                </div>
              </div>
              <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                
                <button class="btn btn-link px-0 text-danger removefromcart" type="button"><i class="removefromcart ci-close-circle me-2" id="<?php echo $lc['id'] ?>"></i><span class="fs-sm">Remove</span></button>
              </div>
            </div>

            <?php }} ?>



            <!-- Payment methods accordion-->
            
            <div class="accordion mb-2" id="payment-method">
              <div class="accordion-item">
                <h3 class="accordion-header"><a class="accordion-button" href="#cardz" data-bs-toggle="collapse"><i class="ci-card fs-lg me-2 mt-n1 align-middle"></i>Pay with Mpesa</a></h3>
                <div class="accordion-collapse collapse show" id="cardz" data-bs-parent="#payment-method">
                  <div class="accordion-body">
                    <p class="fs-sm">We accept Mpesa Mobile money :&nbsp;&nbsp;<img class="d-inline-block align-middle" src="img/mpesa.png" width="150" height="12px" alt="Mpesa mobile money"></p>

                    <p class="fs-lg">To download the files;</p>
                    <p class="fs-lg">Key in your mpesa registered phone number and email</p>
                    <p class="fs-lg">Once we receive your payment, you will receive the files on your email.</p>
                    <div class="credit-card-wrapper"></div>
                    <form class="credit-card-form row needs-validation" id="paymentform" autocomplete="off" novalidate  id="si-email">
                      <div class="mb-3 col-sm-12">
                        
                                    <input type="hidden" name="amount" value="<?php echo $subtotal ?>">
                                    <input type="hidden" name="productid" value="<?php echo $productid ?>">
                                    <input class="form-control mb-3" type="text" name="phone" placeholder="Mpesa Number" required>
                                    <input class="form-control" type="email" name="email" placeholder="johndoe@example.com" required>
                        
                                    <div class="invalid-feedback">Please provide a valid email address.</div>
                        
                                  </div>
                                  <div class="col-sm-12">
                                    <button class="btn btn-success d-block w-100 mt-0" type="submit">PAY NOW</button>
                                  </div>
                                </form>
                                <br>
                                <div style="display:none" id="doc">
                                  <h4>Here is your download</h4>
                                  <p id="thedoc"><a target="_blank" href="">Click here to download</a>
                                  </p>
                                  <h3>OR</h3>
                                  <p>Check in your email</p>
                                </div>
                        
                              </div>
                            </div>
                          </div>
                        
                        
                        </div>
            
          </section>


          <!-- Sidebar-->

          <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5 mt-5">
            <div class="bg-white rounded-3 shadow-lg p-4">
              <div class="py-2 px-xl-2">
                <div class="text-center mb-4 pb-3 border-bottom">
                  
                               <ul class="list-unstyled fs-sm pb-2 border-bottom">
                  <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">KSH KSH  <?php echo $subtotal ?>
                                  </span></li>
                              
                              </ul>
                              <h3 class="fw-normal text-center my-4">KSH
                                <?php echo $subtotal ?>
                              </h3>
                </div>
                <div class="accordion" id="order-options">

                </div><a class="btn btn-success btn-shadow d-block w-100 mt-4"><i class="ci-card fs-lg me-2"></i>PAY WITH MPESA BELOW</a>
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
                 
                  $("#paymentform").submit(function(e){
                   e.preventDefault();
                   $("#btnpay2").show()
                    $("#status").html("<p class='alert alert-success'><i class='fa fa-spinner fa-pulse'></i> Initiating payment...</p>");
                    $.ajax({
                      method: "POST",
                      url : "app/initiatepayment.php",
                      data: new FormData(this),
                      contentType: false,
                      processData: false,
                      cache: false
                    }).done(function (data){
                     if(data.status == 200){
                    //   window.location.replace("vendors/");
                     $("#status").html("<p class='alert alert-success'><i class='fa fa-check'></i> Payment initiated successfully. Please enter MPESA PIN to proceed</p>");
                     var CheckoutRequestID=data.CheckoutRequestID;
                     if(CheckoutRequestID!=""){
                   
                      setTimeout(
                      function() 
                          {
                           $("#status").html("<p class='alert alert-success'><i class='fa fa-spinner fa-pulse'></i>checking for payment... please do not cancel</p>")
                            $.ajax({
                               method: "POST",
                               url: "app/checkpayment2",
                               data: {CheckoutRequestID:CheckoutRequestID},
                               cache:false
                               
                           }).done(function(data){ 
                              if(data.status == "200"){
                                  $("#status").hide()
                                  $("#btnpay2").show()
                                  $("#doc").show();
                                  $("#thedoc a").attr("href","https://www.profilecode.ke/docs/"+data.docs);
                              }else{
                                  setTimeout(
                      function() 
                          {
                           $("#status").html("<p class='alert alert-success'><i class='fa fa-spinner fa-pulse'></i>checking for payment... please do not cancel</p>")
                            $.ajax({
                               method: "POST",
                               url: "app/checkpayment2",
                               data: {CheckoutRequestID:CheckoutRequestID},
                               cache:false
                               
                           }).done(function(data){ 
                              if(data.status == "200"){
                                  $("#status").hide()
                                  $("#btnpay2").show()
                                  $("#doc").show();
                                  $("#thedoc a").attr("href","https://www.profilecode.ke/docs/"+data.docs);
                              }else{
                                $("#status").html("<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> No Payment found.</p>");  
                              }
                           })
                              
                          }, 8000);
                              }
                           })
                              
                          }, 8000);
               }
                     }
                     if(data.status == 300){
                      $("#status").html("<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> An Error Occured, Please try again.</p>");
                     }
                    });
                   
                 });
            </script>
  </body>

</html>
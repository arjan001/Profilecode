<?php
session_start();
 $sessionid = session_id();
include_once("config/index.php");
$expld_url = $_SERVER["REQUEST_URI"];//explode("/", $_SERVER["REQUEST_URI"]);
 if($_GET['fbclid']){
 $url= $expld_url;  
 $pos = strpos($url, "?");
 $url = substr($url, 0, $pos);
}else{
$url= $expld_url; 
}
  $expld_url = explode("/", $url);
 $url = end($expld_url);
 if(!empty($url)){
  $lb=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM subcategories WHERE url='$url'"));   
  $subcatid=$lb["id"];
  $pcatid=$lb["catid"];
  
  $catdetails=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM categories WHERE id='$pcatid'"));
 }else{
     header("Location:../");
 }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $lb['subcatname'] ?> ||Profile Code - The Leading Digital Downloads Marketplace in Kenya</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <!-- Place favicon.ico in the root directory -->
	    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">	
		<!-- all CSS hear -->		
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/ionicons.min.css">
        <link rel="stylesheet" href="../css/animate.css">
        <link rel="stylesheet" href="../css/nice-select.css">
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/mainmenu.css">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../css/responsive.css">		
        <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
     
        <div class="wrapper shop">
            <?php include_once("includes/header-product.php") ?>
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="../shop/<?php echo $catdetails['url'] ?>"><?php echo $catdetails['catname'] ?></a></li>
                                <li class="breadcrumb-item active"><a href="../product-subcategory/<?php echo $lb['url'] ?>"><?php echo $lb['subcatname'] ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 order-2 order-lg-1">
                            
                            <!-- categories-box start -->
                            <div class="categories-box sidebar-categores-box">
                                <div class="secton-title">
                                    <h2>Categories</h2>
                                </div>
                                <div class="sidebar-categores-inner">
                                   <div class="vertical-menu-list">
                                    <ul>
                                        <?php
                                        $listcat=mysqli_query($con,"SELECT * FROM categories ORDER BY catname ASC");
                                        while($lc=mysqli_fetch_assoc($listcat)){
                                            $catid=$lc["id"];
                                                ?>
                                        <li><a href='../shop/<?php echo $lc["url"] ?>'> <?php echo $lc["catname"] ?><span><i class="fa fa-angle-right"></i></span></a>
                                            <ul class="right-sub-menu">
                                                <?php
                                                    $listsubcat=mysqli_query($con,"SELECT * FROM subcategories WHERE catid='$catid' ORDER BY subcatname ASC LIMIT 10");
                                                    while($lsc=mysqli_fetch_assoc($listsubcat)){
                                                ?>
                                                <li><a href='../product-subcategory/<?php echo $lsc["url"] ?>'><?php echo $lsc["subcatname"] ?> <span><i class="fa fa-angle-right"></i></span></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                       
                                        <!--<li><a href="#">Uncategorized</a></li>-->
                                       <?php } ?> 
                                    </ul>
                                </div>
                                </div>
                            </div>
                            <!-- categories-box end -->
                           
                        </div>
                        <div class="col-lg-9 order-1 order-lg-2">
                           
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid" class="tab-pane fade active show" role="tabpanel">
                                        <div id="defaultcontent" class="shop-product-wrap box-module">
                                             <div class="row">
                                                <?php
                                                $listproducts=mysqli_query($con,"SELECT * FROM products WHERE subcat1='$subcatid' ORDER BY id DESC LIMIT 32");
                                                if(mysqli_num_rows($listproducts)>0){
                                                while($lp=mysqli_fetch_assoc($listproducts)){
                                                ?>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                                    <!-- sinle-product-item start -->
                                                    <div class="sinle-product-item mb-20 box-module">
                                                        <div class="product-thumb">
                                                            <a href="../product/<?php echo $lp['url'] ?>">
                                                                <img alt="<?php echo $lp['productname'] ?>" src="../products/<?php echo $lp['productimage'] ?>" class="primary-image">
                                                            </a>
                                                           
                                                            <div class="add-to-cart">
                                                                <a id="<?php echo $lp['id'] ?>" style="cursor:pointer" class="btn-cart addtocart"><span> Add to Cart </span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-info">
                                                            <h4 class="product-name"><a href="../product/<?php echo $lp['url'] ?>"><?php echo $lp['productname'] ?></a></h4>
                                                            <div class="price-box">
                                                                <span class="new-price">Ksh. <?php echo $lp['productprice'] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- sinle-product-item end -->
                                                </div>
                                               <?php }}else{ ?>
                                                    <div class="product-info">
                                                            <h6 class="product-name1">No products founds currently</h6>
                                                            
                                                        </div>
                                               <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- paginatoin-area start -->
                                    <div style="display:none" class="paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <p>Showing 10-13 of 13 item(s) </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination-box">
                                                    <li><a href="../#" class="Previous"> <i class="fa fa-angle-double-left"></i> </a>
                                                    </li>
                                                    <li><a href="../#" class="active">1</a></li>
                                                    <li><a href="../#">2</a></li>
                                                    <li><a href="../#">3</a></li>
                                                    <li>
                                                      <a href="../#" class="Next"> <i class="fa fa-angle-double-right"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- paginatoin-area end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            
            <?php include_once("includes/footer-product.php") ?> 
            <script>
              $('#defaultcontent').on('click', '.addtocart', function(){
                var productid=$(this).attr("id");
                var sessionid="<?php echo $sessionid ?>"
                $("#status").html("<div class=' col-md-12 alert alert-success alert-dismissible'><i class='fa fa-pulse fa-spin'>&nbsp;</i>adding product to cart </div>");
                $.ajax({
                
                url:"../app/addtocart",
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
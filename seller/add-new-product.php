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
    <title>PROFILECODE| Add New Product |Profile Code KE</title>
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
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="../vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="../vendor/tiny-slider/dist/tiny-slider.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="../css/theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Google Tag Manager-->

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->


    <main class="page-wrapper">
      <!-- Navbar Marketplace-->
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

          <!-- Navbar sectior starts-->

          <?php include_once("includes/navbar.php") ?>

        <!-- Navbar section  ends-->

      <!-- Dashboard header-->

      <!-- Dashboard  header starts-->

       <?php include_once("includes/header.php") ?>

     <!-- Dashboard section  ends-->

      <div class="container mb-5 pb-3">
        <div class="bg-light shadow-lg rounded-3 overflow-hidden">
          <div class="row">
            <!-- Sidebar-->

                      <!-- seller sidebar  starts here-->

                      <?php include_once("includes/sidebar.php") ?>

                      <!-- seller sidebar  ends here-->
            <!-- Content-->
            <section class="col-lg-9 pt-lg-4 pb-4 mb-3">
              <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                <!-- Title-->
                <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
                  <h2 class="h3 py-2 me-2 text-center text-sm-start">Add New Product</h2>

                </div>
                <form id="productfrm" enctype="multipart/form-data" method="post">
                  <div class="mb-3 pb-2">
                    <label class="form-label" for="unp-product-name">Product name</label>
                    <input class="form-control" type="text" id="productname" name="productname">
                  </div>

                  <div class="py-2 ">
                  <label>category</label>
                  <input type="hidden" id="id" name="id" value="">
                    <input type="hidden" value="<?php echo $vendorid ?>" name="vendorid">
                    <select id="productcategory" name="productcategory"class="form-select me-2" >
                      
                      <?php
                           $chkprodss = mysqli_query($con,"SELECT * FROM categories ORDER BY catname ASC");
                           while($rows = mysqli_fetch_assoc($chkprodss)){ ?>
                            <option value="<?php echo $rows["id"];?>"><?php echo $rows["catname"];?>
                          </option>

                           <?php } ?>
                    </select>
                   
                    
                    <label class="mt-3">Subcategory</label>
                    <select class="form-select me-2 "id="subcat1" name="subcat1">
                    
                      

                    </select>
                  </div>
                </div>

                  <div class="file-drop-area mb-3">
                    <div class="file-drop-icon ci-cloud-upload">

                    </div>
                    <span class="file-drop-message">Drag and drop here to upload product Image Or Screenshot</span>
                    <input class="file-drop-input" type="file" id="productimage" name="productimage" accept="image/*">
                    <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
                    <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
                  </div>

                  <div class="mb-3 py-2">
                    <label class="form-label" for="unp-product-description">Product description</label>
                    <textarea class="form-control" rows="6" id="description" name="description"></textarea>
                    <div class="bg-secondary p-3 fs-ms rounded-bottom"><span class="d-inline-block fw-medium me-2 my-1">Markdown supported:</span><em class="d-inline-block border-end pe-2 me-2 my-1">*Italic*</em><strong class="d-inline-block border-end pe-2 me-2 my-1">**Bold**</strong><span class="d-inline-block border-end pe-2 me-2 my-1">- List item</span><span class="d-inline-block border-end pe-2 me-2 my-1">##Heading##</span><span class="d-inline-block">--- Horizontal rule</span></div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 mb-3">
                      <label class="form-label" for="unp-standard-price">Standard price</label>
                      <div class="input-group"><span class="input-group-text">KSH</span>
                        <input class="form-control" type="text"id="productprice" name="productprice">
                      </div>
                      <div class="form-text">Average marketplace price for this category is KSH .</div>
                    </div>

                  </div>

                  <div class="mb-3 pb-2">
                    <label class="form-label" for="unp-product-files">Product files for sale</label>
                    <input class="form-control" type="file" id="productatt" name="productatt">
                    <div class="form-text">Maximum file size 10MB</div>
                  </div>
                  <button class="btn btn-primary d-block w-100" type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Save Product</button>

                    <!-- NOTIFICATION POP UP BOX -->
                    <div class="form-group  text-center d-flex align-items-center justify-content-center pt-2">
                   <div id="status"></div>
                  </div>
                   <!-- NOTIFICATION POP UP BOX -->

                </form>
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer-->
              <!-- Footer sectionr starts-->

              <?php include_once("includes/footerscripts-only.php") ?>



<script>

$(function(){
 $("#prd").attr("class","active");
 $('#tb_purchs').DataTable({"aaSorting":[]});
 
   $("#productcategory").change(function(){
     var categoryid = $(this).val();
     $.ajax({
        method: "POST",
        url: "app/getsubcategories.php",
        data: {categoryid:categoryid},
        cache:false
     }).done(function(data){
        if(data != ""){
         $("#subcat1").html(data);
        }else{
         $("#subcat1").html("No subcategories found");   
        }
     });
    });


 $("body").on("click",".edtpurch",function(){
  $("#id").val($(this).attr("data-id"));
  $("#productcategory").val($(this).attr("data-productcategory"));
  $("#subcat1").val($(this).attr("data-subcat1"));
  $("#productname").val($(this).attr("data-productname"));
  $("#productprice").val($(this).attr("data-productprice"));
  CKEDITOR.instances['description'].setData($(this).attr("data-description"))
  
  $("#theimage").hide();
  $("#status").html("");
  $(".item1").click();
 });

 $("#productfrm").submit(function(e){
  e.preventDefault();
  $("#status").html("<p class='text-success bg-success'><i class='fa fa-spinner fa-pulse'></i> Saving the product...</p>"); 
  $.ajax({
    method: "POST",
    url: "app/products.php",
    data: new FormData(this),
    cache:false,
    contentType: false,
    processData: false,
  }).done(function(data){
   if(data.status == 200){
    $("#status").html("<p class='alert alert-success'><i class='fa fa-check'></i> product saved successfully.</p>").delay(5000);
     window.location.replace($("#portal_url").html()+"products");
   }
   if(data.status == 300){
    $("#status").html("<p class='alert alert-danger'><i class='fa fa-exclamation-circle'></i> An error occured, please try again later.</p>");
   }
   if(data.status == 301){
    $("#status").html("<p class='alert alert-danger'><i class='fa fa-exclamation-circle'></i> An error occured uploading the file, please use a smaller file of not more than 1 MB.</p>");
   }
  });
 });

 //Deleting a product
 $(".delpurch").click(function(){
  var delpurch = $(this).attr("id");
  var d = confirm('Are you sure you want to delete this product?');
  if(d == false){
   return false;
  }
  else{
    $.ajax({
      method:"post",
      url: $("#portal_url").html()+"app/products.php",
      data:{
        delpurch:delpurch
      },
      cache:false
    }).done(function(data){
      if(data.status == "200"){
       window.location.replace($("#portal_url").html()+"products");
      }
    });
    }
   });
   
    //completeting a product
 $(".markascomplete").click(function(){
  var markascomplete = $(this).attr("id");
  var d = confirm('Are you sure you want to mark this product as complete?');
  if(d == false){
   return false;
  }
  else{
    $.ajax({
      method:"post",
      url: $("#portal_url").html()+"app/products.php",
      data:{
        markascomplete:markascomplete
      },
      cache:false
    }).done(function(data){
      if(data.status == "200"){
       window.location.replace($("#portal_url").html()+"products");
      }
    });
    }
   });
   
   //Custom duration report
  $("#filterform").submit(function(e){
   e.preventDefault();
   var date1 = $("#date1").val();
   var date2 = $("#date2").val();
   $("#filterform .btn").attr("disabled","disabled");
   $("#filterstatus").html("<p class='alert alert-success' style='padding:10px;'><i class='fa fa-spinner fa-pulse'></i> Please wait....</p>");
   $.ajax({
    type: "POST",
    url: $("#portal_url").html()+"reports/products.php",
    data: {
      date1:date1,
      date2:date2
    },
    cache: false
   }).done(function(data){
    $("#filterform .btn").removeAttr("disabled");
    $("#filterstatus").html("");
    $(".dashboard").html(data);
    $('#filtermodal').modal('toggle');
    $('#tb_purchs').DataTable({"aaSorting": []});
   });
  });
 });
</script>

          <!-- footer section  ends-->
  </body>


</html>
<!DOCTYPE html>
<?php
ob_start();
session_start();

include_once("includes/config.php");
//  include_once("includes/auth.php");
$now = date('Y-m-d H:i:s');

?>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Products</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Profile Code KE |Leading File MarketPlace |PROFILECODE">
    <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
    <meta name="author" content="ProfileCode">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href= "../img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon.png">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
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

              <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
              <h6 class="fs-base text-light mb-0">Primary payment method is used by default</h6><a class="btn btn-primary btn-sm" href="#add-admin-modal" data-bs-toggle="modal"><i class="ci-sign-out me-2"></i>ADD ADMIN</a>
            </div>
            <!-- Payment methods list-->
            <div class="table-responsive fs-md mb-4">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>category</th>
                    <th>subcategory</th>
                    <th>Product</th>
                    <th>price</th>
                    <th>vendor</th>
                    <th>Attachement</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>action</th>
                    
                  </tr>
                </thead>
                <tbody>
                          <?php
          $chkpurchs = mysqli_query($con,"SELECT * FROM products ORDER BY id DESC");
          while($row = mysqli_fetch_assoc($chkpurchs)){
              $productid=$row["id"];
              // $tailor=$row["tailor"];
              $productcategory=$row["productcategory"];
              $subcat1=$row["subcat1"];
              $vendorid=$row["vendorid"];
             
          ?>

                  <tr>
                    <td class="py-3 align-middle"><?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM categories WHERE id='$productcategory'"))['catname'];?></td>

                    <td class="py-3 align-middle"> <?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM subcategories WHERE id='$subcat1'"))['subcatname'];?></td>

                    <td class="py-3 align-middle"><a target="_blank" href="../product/<?php echo $row['url'] ?>"><?php echo $row["productname"];?></a></td>
                    <td class="py-3 align-middle">Ksh. <?php echo number_format($row["productprice"]);?></td>
                    <td class="py-3 align-middle"><?php
               if($vendorid!="0"){
                 echo mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM vendors WHERE id='$vendorid'"))["vname"];  
               }else{
                   echo "By Admin";
               }
               ?></td>
                    <td class="py-3 align-middle"><a target="_blank" href="../docs/<?php echo $row['docs'] ?>">View File</a></td>
                    <td class="py-3 align-middle"><?php echo $row["description"];?></td>
                    <td class="py-3 align-middle"><?php echo date("d M Y",strtotime($row["createdon"]));?></td>
                    
                    <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                        <div class="ci-trash"></div></a></td>
                  </tr>
                  
                <?php } ?>
                </tbody>
              </table>
            </div>
            
          </section>
          </div>
        </div>
      </div>
    </main>


    <!-- Footer-->

    <!-- FOOTER SECTIONS STARTS  FROM HERE -->

    <?php include_once("includes/footerscripts-only.php") ?>

    <script>
$(function(){
//  $("#prd").attr("class","active");
//  $('#tb_purchs').DataTable({"aaSorting":[]});
 
   $("#productcategory").change(function(){
     var categoryid = $(this).val();
     $.ajax({
        method: "POST",
        url: "app/getsubcategories",
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
    url: $("#portal_url").html()+"app/products",
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
      url: $("#portal_url").html()+"app/products",
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
      url: $("#portal_url").html()+"app/products",
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
    url: $("#portal_url").html()+"reports/products",
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

    <!-- FOOTER SECTIONS ENDS FROM HERE -->

  </body>

</html>
<?php
ob_start();
session_start();

 include_once("includes/config.php");
//  include_once("includes/auth.php");
$now = date('Y-m-d H:i:s');

?>
<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Add Vendors</title>
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
    <!-- <script src="../js/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
              <h6 class="fs-base text-light mb-0">Primary payment method is used by default</h6><a class="btn btn-primary btn-sm" href="#">..</a>
            </div>

            <span class="item item2" data-dismiss="modal" data-toggle="modal" data-target="#vendormodal" style="display: none;"></span>
          
            <!-- Payment methods list-->
            <div class="table-responsive fs-md mb-4">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Balance</th>
                    <th>Products</th>
                    <th>Attempted Sales</th>
                    <th>Complete Sales</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                 

                <?php
             $chkvendors = mysqli_query($con,"SELECT * FROM vendors ORDER BY id DESC");
             while($row = mysqli_fetch_assoc($chkvendors)){
                 $vid=$row["id"];
             ?>

                  <tr>
                    <td class="py-3 align-middle"><?php echo $row["vname"];?></td>
                    <td class="py-3 align-middle"><?php echo $row["vphone"];?></td>
                    <td class="py-3 align-middle"><?php echo $row["vemail"];?></td>
                    <td class="py-3 align-middle">Ksh. <?php echo $row["balance"];?></td>

                    <td class="py-3 align-middle"><?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) AS prds FROM products WHERE vendorid='$vid'"))["prds"] ?></td>

                    <td class="py-3 align-middle"><?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) AS prds FROM sales,products WHERE sales.productid=products.id AND products.vendorid='$vid'"))["prds"] ?></td>

                    <td class="py-3 align-middle"><?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) AS prds FROM sales,products WHERE sales.productid=products.id AND products.vendorid='$vid' AND paid='1'"))["prds"] ?></td>

                    <td class="py-3 align-middle">

                  <a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit Vendor" data-id="<?php echo $row["id"];?>" id="vendormodal" data-balance="<?php echo $row["balance"];?>" data-vname="<?php echo $row["vname"];?>" data-vphone="<?php echo $row["vphone"];?>" data-vemail="<?php echo $row["vemail"];?>"> <i class="ci-edit"></i></a>
                    
                    <a class="nav-link-style text-danger"  id="<?php echo $row["id"];?>"  href="#" data-bs-toggle="tooltip" title="Delete Vendor">
                        <div class="ci-trash"></div></a></td>
                  </tr>
                  
                  <?php }  ?>
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
 $("#cust").attr("class","active");
 //$('#tb_vendors').DataTable({"aaSorting":[]});
 
  $("body").on("click",".edtvendor",function(){
  $("#vid").val($(this).attr("data-id"));
  $("#vname").val($(this).attr("data-vname"));
  $("#vphone").val($(this).attr("data-vphone"));
  $("#vemail").val($(this).attr("data-vemail"));
  $("#vbalance").val($(this).attr("data-balance"));
  $("#status").html("");
  $("#vendormodal").modal('show');
 });
 
 $("#vendorfrm").submit(function(e){
  e.preventDefault();
  var id = $("#vid").val();
  var vname = $("#vname").val();
  var vphone = $("#vphone").val();
  var vemail = $("#vemail").val();
  var vbalance = $("#vbalance").val();
  
  $("#status").html("<p class='text-success bg-success'><i class='fa fa-spinner fa-pulse'></i> Saving the vendor...</p>"); 
  $.ajax({
    method: "POST",
    url: "app/vendors",
    data: {
      id:id,
      vname:vname,
      vphone:vphone,
      vemail:vemail,
      vbalance:vbalance
    },
    cache:false
  }).done(function(data){
   if(data.status == 200){
    $("#status").html("<p class='alert alert-success'><i class='fa fa-check'></i> Vendor saved successfully.</p>").delay(5000);
     window.location.replace($("#portal_url").html()+"vendors");
   }
   if(data.status == 300){
    $("#status").html("<p class='alert alert-danger'><i class='fa fa-exclamation-circle'></i> An error occured, please try again later.</p>");
   }
   if(data.status == 401){
    $("#status").html("<p class='alert alert-danger'><i class='fa fa-exclamation-circle'></i> A vendor with this email address already exist. Use a different email.</p>");
   }
  });
 });

 //Deleting a vendor
 $(".delvendor").click(function(){
  var delvendor = $(this).attr("id");
  var d = confirm('Are you sure you want to delete this vendor?');
  if(d == false){
   return false;
  }
  else{
    $.ajax({
      method:"post",
      url: $("#portal_url").html()+"app/vendors.php",
      data:{
        delvendor:delvendor
      },
      cache:false
    }).done(function(data){
      if(data.status == "200"){
       window.location.replace($("#portal_url").html()+"vendors");
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
    url: $("#portal_url").html()+"reports/vendors.php",
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
    $('#tb_vendors').DataTable({"aaSorting": []});
   });
  });
 });
</script>

    <!-- FOOTER SECTIONS ENDS FROM HERE -->

  </body>

</html>
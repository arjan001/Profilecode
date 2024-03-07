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
    <title>PROFILECODE| Payouts | Withdrawals</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Files shop E-commerce Template">
    <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
    <meta name="author" content="ProfileCode">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="../safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="../vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="../vendor/tiny-slider/dist/tiny-slider.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="../css/theme.min.css">
    
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


                      <!-- seller sidebar  starts here-->

                    <?php include_once("includes/sidebar.php") ?>

                    <!-- seller sidebar  ends here-->
                    
            <!-- Content-->
            <section class="col-lg-9 pt-lg-4 pb-4 mb-3">
              <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                <h2 class="h3 py-2 text-center text-sm-start">Payouts</h2>
                <div class="row mx-n2 py-2">
                  <div class="col-sm-6 px-2 mb-4">
                    <div class="bg-secondary h-100 rounded-3 p-4">
                      <h3 class="h5">Your Earnings</h3>
                      <p class="fs-sm">Your current earnings of <span class='fw-medium'>KSH </span> </p>
                    </div>
                  </div>
                  <div class="col-sm-6 px-2 mb-4">
                    <div class="bg-secondary h-100 rounded-3 p-4">
                      <h3 class="h5">Payout method</h3>
                      <div class="d-flex flex-wrap align-items-center py-1 mb-2"><img class="d-block mb-2 me-2" src="../img/mpesa2.png" width="100" alt="Mpesa"><span class="fs-xs mb-2"><?php echo $user["vemail"];?></span></div><a class="btn btn-primary btn-sm" href="#withdraw-modal" data-bs-toggle="modal">WITHDRAW</a>
                    </div>
                  </div>
                </div>
                <h3 class="h5 pb-2">Payout history</h3>
                <div class="table-responsive">
                  <table class="table table-layout-fixed fs-sm mb-0">

                    <thead>

                      <tr>

                        <th>Amount</th>
                        <th>Date processed</th>
                        
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                          $chkpurchs = mysqli_query($con,"SELECT * FROM withdrawals WHERE 
                          vendorid='$vendorid' ORDER BY id DESC");

                           while($row = mysqli_fetch_assoc( $chkpurchs)){
                           $withdrawid=$row["id"]; 

                           
                           ?>


                      <tr>

                        <td>KSH <?php echo number_format($row["amount"]);?></td>
                        <td><?php echo date("d M Y",strtotime($row["createdon"]));?></td>

                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <hr class="mb-grid-gutter">

                <!-- Pagination-->
                <nav class="d-md-flex justify-content-between align-items-center text-center text-md-start" aria-label="Page navigation">
                  <div class="d-md-flex align-items-center w-100"><span class="fs-sm text-muted me-md-3">Showing 10 of 52 records</span>
                    <div class="progress w-100 my-3 mx-auto mx-md-0" style="max-width: 10rem; height: 4px;">
                      <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <button class="btn btn-outline-primary btn-sm" type="button">More records</button>
                </nav>
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
 $("#withd").attr("class","active");
 $('#tb_purchs').DataTable({"aaSorting":[]});


 $("#withdrawfrm").submit(function(e){
  e.preventDefault();
  
  $("#status").html("<p class='text-success bg-success'><i class='fa fa-spinner fa-pulse'></i> Submitting withdrawal request... Please wait</p>"); 
  $.ajax({
    method: "POST",
    url: $("#portal_url").html()+"app/withdraw.php",
    data: new FormData(this),
    cache:false,
    contentType: false,
    processData: false,
  }).done(function(data){
   if(data.status == 200){
    $("#status").html("<p class='alert alert-success'><i class='fa fa-check'></i> withdrawal successful. Please wait for mpesa message</p>").delay(5000);
     window.location.replace($("#portal_url").html()+"withdraw");
   }
   if(data.status == 201){
    $("#status").html("<p class='alert alert-danger'><i class='fa fa-exclamation-circle'></i> Your balance is less than amount you want to withdraw.</p>");
   }
   if(data.status == 300){
    $("#status").html("<p class='alert alert-danger'><i class='fa fa-exclamation-circle'></i> An error occured, please try again later.</p>");
   }
  });
 });

 //Deleting a withdraw
 $(".delpurch").click(function(){
  var delpurch = $(this).attr("id");
  var d = confirm('Are you sure you want to delete this withdraw?');
  if(d == false){
   return false;
  }
  else{
    $.ajax({
      method:"post",
      url: $("#portal_url").html()+"app/withdrawals.php",
      data:{
        delpurch:delpurch
      },
      cache:false
    }).done(function(data){
      if(data.status == "200"){
       window.location.replace($("#portal_url").html()+"withdrawals");
      }
    });
    }
   });
   
    //completeting a withdraw
 $(".markascomplete").click(function(){
  var markascomplete = $(this).attr("id");
  var d = confirm('Are you sure you want to mark this withdraw as complete?');
  if(d == false){
   return false;
  }
  else{
    $.ajax({
      method:"post",
      url: $("#portal_url").html()+"app/withdrawals.php",
      data:{
        markascomplete:markascomplete
      },
      cache:false
    }).done(function(data){
      if(data.status == "200"){
       window.location.replace($("#portal_url").html()+"withdrawals");
      }
    });
    }
   });
   
  //  //Custom duration report
  // $("#filterform").submit(function(e){
  //  e.preventDefault();
  //  var date1 = $("#date1").val();
  //  var date2 = $("#date2").val();
  //  $("#filterform .btn").attr("disabled","disabled");
  //  $("#filterstatus").html("<p class='alert alert-success' style='padding:10px;'><i class='fa fa-spinner fa-pulse'></i> Please wait....</p>");
  //  $.ajax({
  //   type: "POST",
  //   url: $("#portal_url").html()+"reports/withdrawals",
  //   data: {
  //     date1:date1,
  //     date2:date2
  //   },
  //   cache: false
  //  }).done(function(data){
  //   $("#filterform .btn").removeAttr("disabled");
  //   $("#filterstatus").html("");
  //   $(".dashboard").html(data);
  //   $('#filtermodal').modal('toggle');
  //   $('#tb_purchs').DataTable({"aaSorting": []});
  //  });
  // });
 });
</script>
<!-- FOOTER SECTIONS ENDS FROM HERE -->

  </body>


</html>
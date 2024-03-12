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
    <title>PROFILECODE| Sales | View Sales </title>
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
              <h6 class="fs-base text-light mb-0">Primary payment method is used by default</h6>
            </div>
            <!-- Payment methods list-->
            <div class="table-responsive fs-md mb-4">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>customer email</th>
                    <th>customer Phone</th>
                    <th>Product name </th>
                    <th>product price </th>
                    <th>Attachement</th>
                    <th>ACC No</th>
                    <th>Status</th>
                    <th>Date</th>
                    
                  </tr>
                </thead>
                <tbody>

             <?php
             $chksales = mysqli_query($con,"SELECT sales.*,products.url,products.productname,products.productprice,products.docs FROM sales,products WHERE sales.productid=products.id ORDER BY sales.id DESC");
             while($row = mysqli_fetch_assoc($chksales)){
                 $vid=$row["id"];
                 $paid=$row["paid"];
             ?>

                  <tr>
                    <td class="py-3 align-middle"><?php echo $row["cemail"];?></td>
                    <td class="py-3 align-middle"><?php echo $row["cphone"];?></td>
                    <td class="py-3 align-middle"><a target="_blank" href="../product/<?php echo $row['url'] ?>"><?php echo $row["productname"];?></a></td>
                    <td class="py-3 align-middle">Ksh. <?php echo $row["productprice"];?></td>
                    <td class="py-3 align-middle"><a target="_blank" href="../docs/<?php echo $row['docs'] ?>">View File</a></td>
                    <td class="py-3 align-middle"><?php echo $row["accno"];?></td>


                    
                    <td class="py-3 align-middle">

                                  
                 <?php
                                    if ($row["accno"]) { ?>
                                      <span class="badge bg-success m-0">Paid</span>
                                    <?php } else { ?>
                                      <span class="badge bg-danger m-0">Not Paid</span>
                                    <?php } ?>
                                  

                      
                    
                    </td>


                    <td class="py-3 align-middle"><?php echo date("d M Y",strtotime($row["createdon"]));?></td>
                    
                    
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
//  $("#sls").attr("class","active");
//  $('#tb_sales').DataTable({"aaSorting":[]});

 //Deleting a customer
 $(".delvendor").click(function(){
  var delvendor = $(this).attr("id");
  var d = confirm('Are you sure you want to delete this customer?');
  if(d == false){
   return false;
  }
  else{
    $.ajax({
      method:"post",
      url: $("#portal_url").html()+"app/customer",
      data:{
        delvendor:delvendor
      },
      cache:false
    }).done(function(data){
      if(data.status == "200"){
       window.location.replace($("#portal_url").html()+"customer");
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
    url: $("#portal_url").html()+"reports/sales",
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
    $('#tb_sales').DataTable({"aaSorting": []});
   });
  });
 });
</script>

    <!-- FOOTER SECTIONS ENDS FROM HERE -->

  </body>

</html>
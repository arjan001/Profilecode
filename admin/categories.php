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
    <title>PROFILECODE| Categories | add categories</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Best online files shop E-commerce ">
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
              <h6 class="fs-base text-light mb-0">Primary payment method is used by default</h6><a class="btn btn-primary btn-sm" href="#add-category-modal" data-bs-toggle="modal"><i class="ci-sign-out me-2"></i>Add Category</a>
            </div>
            <!-- Payment methods list-->
            <div class="table-responsive fs-md mb-4">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>Category Name</th>
                    <th>Date Added</th>
                    
                    <th>Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
          $chkcategory = mysqli_query($con,"SELECT * FROM categories ORDER BY id DESC");
          while($row = mysqli_fetch_assoc($chkcategory)){
             
          ?>

                  <tr>
                    <td class="py-3 align-middle"><?php echo $row["catname"];?></td>
                    <td class="py-3 align-middle"><?php echo date("d M Y",strtotime($row["createdon"]));?></td>

                    <td class="py-3 align-middle">

                      <a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit" data-catname="<?php echo $row['catname'] ?>" data-id="<?php echo $row["id"];?>"><i class="ci-edit"></i></a>
                      
                      <a class="nav-link-style text-danger" href="#"  id="<?php echo $row["id"];?>" data-bs-toggle="tooltip" title="Remove">
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
 $("#cat").attr("class","active");
 $('#tb_category').DataTable({"aaSorting":[]});
 

 $("body").on("click",".edtcategory",function(){
  $("#id").val($(this).attr("data-id"));
  $("#catname").val($(this).attr("data-catname"));
  $("#status").html("");
  $(".item1").click();
 });

 $("#categoryfrm").submit(function(e){
  e.preventDefault();
  var id = $("#id").val();
  var catname = $("#catname").val();
  
  $("#status").html("<p class='text-success bg-success'><i class='fa fa-spinner fa-pulse'></i> Saving the category...</p>"); 
  $.ajax({
    method: "POST",
    url: $("#portal_url").html()+"app/categories.php",
    data: {
      id:id,
      catname:catname
    },
    cache:false
  }).done(function(data){
   if(data.status == 200){
    $("#status").html("<p class='alert alert-success'><i class='fa fa-check'></i> category saved successfully.</p>").delay(3000);
     window.location.replace($("#portal_url").html()+"categories");
   }
   if(data.status == 300){
    $("#status").html("<p class='alert alert-danger'><i class='fa fa-exclamation-circle'></i> An error occured, please try again later.</p>");
   }
  });
 });

 //Deleting a category
 $(".delcategory").click(function(){
  var delcategory = $(this).attr("id");
  var d = confirm('Are you sure you want to delete this category?');
  if(d == false){
   return false;
  }
  else{
    $.ajax({
      method:"post",
      url: $("#portal_url").html()+"app/categories.php",
      data:{
        delcategory:delcategory
      },
      cache:false
    }).done(function(data){
      if(data.status == "200"){
       window.location.replace($("#portal_url").html()+"categories");
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
    url: $("#portal_url").html()+"reports/categories.php",
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
    $('#tb_category').DataTable({"aaSorting": []});
   });
  });
 });
</script>

    <!-- FOOTER SECTIONS ENDS FROM HERE -->

  </body>

</html>
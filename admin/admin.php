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
    <meta name="description" content="PROFILECODE- Bootstrap E-commerce Template">
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
    <!-- <script src="../js/jquery.min.js"></script> -->
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
                    <!-- <th>Image</th> -->
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                <?php
                            $chkusers = mysqli_query($con,"SELECT * FROM users WHERE typeId='1'");
                            while($row = mysqli_fetch_assoc($chkusers)){  
                  ?>

                  <tr>
                    <!-- <td class="py-3 align-middle">Image</td> -->
                    <td class="py-3 align-middle"><?php echo $row["first_name"]." ".$row["last_name"];?></td>
                    <td class="py-3 align-middle"><?php echo $row["phone"];?></td>
                    <td class="py-3 align-middle"><?php echo $row["email"];?></td>
                    <td class="py-3 align-middle">

                      <a class="nav-link-style me-2" href="#" data-id="<?php echo $row["id"];?>"  data-fname="<?php echo $row["first_name"];?>" data-lname="<?php echo $row["last_name"];?>" data-phone="<?php echo $row["phone"];?>" data-email="<?php echo $row["email"];?>"  data-bs-toggle="tooltip" title="Edit Admin"><i class="ci-edit"></i></a>
                      
                      <a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove" id="<?php echo $row["id"];?>"><div class="ci-trash"></div></a>
                    
                    </td>
                  </tr>
                  
                  <?php }?>
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

 $("#userfrm").submit(function(e){
  e.preventDefault();
  var id = $("#id").val();
  var typeid = $("#typeid").val();
  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var phone = $("#phone").val();
  var email = $("#email").val();
  
  $("#status").html("<p class='text-success bg-success'><i class='fa fa-spinner fa-pulse'></i> Saving the admin...</p>"); 
  $.ajax({
    method: "POST",
    url: "app/users.php",
    data: {
      id:id,
      typeid:typeid,
      fname:fname,
      lname:lname,
      phone:phone,
      email:email
    },
    cache:false
  }).done(function(data){
   if(data.status == 200){
    $("#status").html("<p class='alert alert-success'><i class='fa fa-check'></i> Admin saved successfully.</p>").delay(5000);
     window.location.replace($("#portal_url").html()+"admins");
   }
   if(data.status == 300){
    $("#status").html("<p class='alert alert-danger'><i class='fa fa-exclamation-circle'></i> An error occured, please try again later.</p>");
   }
   if(data.status == 401){
    $("#status").html("<p class='alert alert-danger'><i class='fa fa-exclamation-circle'></i> A user with this email address already exist. Use a different email.</p>");
   }
  });
 });

 //Deleting a admin
 $(".deluser").click(function(){
  var deluser = $(this).attr("id");
  var d = confirm('Are you sure you want to delete this admin?');
  if(d == false){
   return false;
  }
  else{
    $.ajax({
      method:"post",
      url: $("#portal_url").html()+"app/users.php",
      data:{
        deluser:deluser
      },
      cache:false
    }).done(function(data){
      if(data.status == "200"){
       window.location.replace($("#portal_url").html()+"admins");
      }
    });
    }
   });
 });
</script>

    <!-- FOOTER SECTIONS ENDS FROM HERE -->

  </body>

</html>
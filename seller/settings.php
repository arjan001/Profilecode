<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Account Settings</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="PROFILECODE- Bootstrap E-commerce Template">
    <meta name="keywords" content=" e-commerce ,ProfileCode, Digital files ,Kenyan online File Store ,busines ,Creative files and folders store ,get cheap documents and files here">
    <meta name="author" content="ProfileCode">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="../vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="../vendor/tiny-slider/dist/tiny-slider.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="../css/theme.min.css">
    <!-- Google Tag Manager-->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-WKV3GT5');
    </script>
  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->


    
    <main class="page-wrapper">
      <!-- Add Payment Method-->
      <form class="needs-validation modal fade" method="post" id="add-payment" tabindex="-1" novalidate>
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Mpesa Number</h5>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-check mb-4">
                <input class="form-check-input" type="radio" id="paypal" name="payment-method">
                <label class="form-check-label" for="paypal">Safaricom<img class="d-inline-block align-middle ms-2" src="../img/mpesa2.png" width="39" alt="Mpesa logo"></label>
              </div>

              <div class="row g-3 mb-2">
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="number" placeholder="Mpesa Number" required>
                  <div class="invalid-feedback">Please fill in the mpesa number!</div>
                </div>
                <div class="col-sm-6">
                  <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                  <div class="invalid-feedback">Please provide your name</div>
                </div>

   
                <div class="col-sm-12">
                  <button class="btn btn-primary d-block w-100" type="submit">Register this Number</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Navbar Marketplace-->
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

          <!-- VENDOR NAVIGATION BAR  -->
          
          <?php include_once("includes/navbar.php") ?>

          <!-- VENDOR NAVIGATION BAR ENDS HERE B  -->

      <!-- Dashboard header starts-->

      <?php include_once("includes/header.php") ?>

      <!-- Dashboard header ends-->

      <div class="container mb-5 pb-3">
        <div class="bg-light shadow-lg rounded-3 overflow-hidden">
          <div class="row">

          <!-- seller sidebar  starts here-->

          <?php include_once("includes/sidebar.php") ?>

          <!-- seller sidebar  ends here-->
          

            <!-- Content-->
            <section class="col-lg-9 pt-lg-4 pb-4 mb-3">
              <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                <h2 class="h3 py-2 text-center text-sm-start">Settings</h2>
                <!-- Tabs-->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                  <li class="nav-item"><a class="nav-link px-0 active" href="#profile" data-bs-toggle="tab" role="tab">
                      <div class="d-none d-lg-block"><i class="ci-user opacity-60 me-2"></i>Profile</div>
                      <div class="d-lg-none text-center"><i class="ci-user opacity-60 d-block fs-xl mb-2"></i><span class="fs-ms">Profile</span></div></a></li>
                  <li class="nav-item"><a class="nav-link px-0" href="#notifications" data-bs-toggle="tab" role="tab">
                      <div class="d-none d-lg-block"><i class="ci-bell opacity-60 me-2"></i>Notifications</div>
                      <div class="d-lg-none text-center"><i class="ci-bell opacity-60 d-block fs-xl mb-2"></i><span class="fs-ms">Notifications</span></div></a></li>
                  <li class="nav-item"><a class="nav-link px-0" href="#payment" data-bs-toggle="tab" role="tab">
                      <div class="d-none d-lg-block"><i class="ci-card opacity-60 me-2"></i>Payment methods</div>
                      <div class="d-lg-none text-center"><i class="ci-card opacity-60 d-block fs-xl mb-2"></i><span class="fs-ms">Payment</span></div></a></li>
                </ul>
                <!-- Tab content-->
                <div class="tab-content">
                  <!-- Profile-->
                  <div class="tab-pane fade show active" id="profile" role="tabpanel">
                    <div class="bg-secondary rounded-3 p-4 mb-4">
                      <div class="d-flex align-items-center"><img class="rounded" src="../img/marketplace/account/avatar.png" width="90" alt="ProfileCode">
                        <div class="ps-3">
                          <button class="btn btn-light btn-shadow btn-sm mb-2" type="button"><i class="ci-loading me-2"></i>Change <span class='d-none d-sm-inline'>avatar</span></button>
                          <div class="p mb-0 fs-ms text-muted">Upload JPG, GIF or PNG image. 300 x 300 required.</div>
                        </div>
                      </div>
                    </div>
                    <div class="row gx-4 gy-3">
                      <div class="col-sm-6">
                        <label class="form-label" for="dashboard-fn">First Name</label>
                        <input class="form-control" type="text" id="dashboard-fn" value="John">
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="dashboard-ln">Last Name</label>
                        <input class="form-control" type="text" id="dashboard-ln" value="Doe">
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="dashboard-email">Email address</label>
                        <input class="form-control" type="text" id="dashboard-email" value="contact@example.com" disabled>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="dashboard-profile-name">Profile Name</label>
                        <input class="form-control" type="text" id="dashboard-profile-name" value="ProfileCode">
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="dashboard-country">Country</label>
                        <select class="form-select" id="dashboard-country">
                          <option value>Select country</option>
                          <option value="Argentina">Kenya</option>
                          <option value="Belgium">Uganda</option>
                          <option value="France">Tanzania</option>
                       
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="dashboard-city">City</label>
                        <input class="form-control" type="text" id="dashboard-city" value="Antananarivo">
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="dashboard-address">Address Line</label>
                        <input class="form-control" type="text" id="dashboard-address" value="Some Cool Street, 22/1">
                      </div>
                      <div class="col-sm-6">
                        <label class="form-label" for="dashboard-zip">ZIP Code</label>
                        <input class="form-control" type="text" id="dashboard-zip">
                      </div>
                      <div class="col-12">
                        <hr class="mt-2 mb-4">
                        <div class="d-sm-flex justify-content-between align-items-center">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="freelancer" checked>
                            <label class="form-check-label" for="freelancer">I'm available for freelance</label>
                          </div>
                          <button class="btn btn-primary mt-3 mt-sm-0" type="button">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Notifications-->
                  <div class="tab-pane fade" id="notifications" role="tabpanel">
                    <div class="bg-secondary rounded-3 p-4">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="nf-disable-all" data-master-checkbox-for="#notifocation-settings">
                        <label class="form-check-label fw-medium" for="nf-disable-all">Enable/disable all notifications</label>
                      </div>
                    </div>
                    <div id="notifocation-settings">
                      <div class="border-bottom p-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="nf-product-sold" checked>
                          <label class="form-check-label" for="nf-product-sold">Product sold notifications</label>
                        </div>
                        <div class="form-text">Send an email when someone purchased one of my products</div>
                      </div>
                      <div class="border-bottom p-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="nf-product-updated" checked>
                          <label class="form-check-label" for="nf-product-updated">Product update notifications</label>
                        </div>
                        <div class="form-text">Send an email when a product I've purchased is updated</div>
                      </div>
                      <div class="border-bottom p-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="nf-product-comment" checked>
                          <label class="form-check-label" for="nf-product-comment">Product comment notifications</label>
                        </div>
                        <div class="form-text">Send an email when someone comments on one of my products</div>
                      </div>
                      <div class="border-bottom p-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="nf-product-review" checked>
                          <label class="form-check-label" for="nf-product-review">Product review notification</label>
                        </div>
                        <div class="form-text">Send an email when someone leaves a review with their rating</div>
                      </div>
                      <div class="border-bottom p-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="nf-daily-summary">
                          <label class="form-check-label" for="nf-daily-summary">Daily summary emails</label>
                        </div>
                        <div class="form-text">Send me a daily summary of all products sold, commented or reviewed</div>
                      </div>
                    </div>
                    <div class="text-sm-end mt-4">
                      <button class="btn btn-primary" type="button">Save changes</button>
                    </div>
                  </div>
                  <!-- Payment methods-->
                  <div class="tab-pane fade" id="payment" role="tabpanel">
                    <div class="bg-secondary rounded-3 p-4 mb-4">
                      <p class="fs-sm text-muted mb-0">Primary payment method is used by default</p>
                    </div>
                    <div class="table-responsive fs-md mb-4">
                      <table class="table table-hover mb-0">
                        <thead>
                          <tr>
                            <th>Your credit / debit cards</th>
                            <th>Name on card</th>
                            <th>Expires on</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="py-3 align-middle">
                              <div class="d-flex align-items-center"><img src="../img/mpesa2.png" width="39" alt="Visa">
                                <div class="ps-2"><span class="fw-medium text-heading me-1">MPESA</span>ending in 4999<span class="align-middle badge badge-info ms-2">Primary</span></div>
                              </div>
                            </td>
                            <td class="py-3 align-middle">John doe</td>
                            <td class="py-3 align-middle">08 / 2019</td>
                            <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                                <div class="ci-trash"></div></a></td>
                          </tr>
   
                        </tbody>
                      </table>
                    </div>
                    <div class="text-sm-end"><a class="btn btn-primary" href="#add-payment" data-bs-toggle="modal">Add Mpesa Number</a></div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer-->
    
    <?php include_once("includes/footerscripts-only.php") ?>

  </body>


</html>
<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Products</title>
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

  </head>
  <!-- Body-->
  <body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->


    <main class="page-wrapper">
      <!-- Navbar Marketplace-->
      <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

          <!-- VENDOR NAVIGATION BAR  -->
          
          <?php include_once("includes/navbar.php") ?>

          <!-- VENDOR NAVIGATION BAR ENDS HERE B  -->

           <!-- Dashboard header-->

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

                     <!-- EDIT PRODUCT MODAL STARTS HERE -->

      <div class="modal fade" id="edit-product-modal" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDIT YOUR PRODUCT INFORMATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
            <form>
                  <div class="mb-3 pb-2">
                    <label class="form-label" for="unp-product-name">Product name</label>
                    <input class="form-control" type="text" id="unp-product-name">
                    <div class="form-text">Maximum 100 characters. No HTML or emoji allowed.</div>
                  </div>
                  <div class="file-drop-area mb-3">
                    <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Drag and drop here to upload product screenshot</span>
                    <input class="file-drop-input" type="file">
                    <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
                    <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
                  </div>
                  <div class="mb-3 py-2">
                    <label class="form-label" for="unp-product-description">Product description</label>
                    <textarea class="form-control" rows="6" id="unp-product-description"></textarea>
                    <div class="bg-secondary p-3 fs-ms rounded-bottom"><span class="d-inline-block fw-medium me-2 my-1">Markdown supported:</span><em class="d-inline-block border-end pe-2 me-2 my-1">*Italic*</em><strong class="d-inline-block border-end pe-2 me-2 my-1">**Bold**</strong><span class="d-inline-block border-end pe-2 me-2 my-1">- List item</span><span class="d-inline-block border-end pe-2 me-2 my-1">##Heading##</span><span class="d-inline-block">--- Horizontal rule</span></div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 mb-3">
                      <label class="form-label" for="unp-standard-price">Standard license price</label>
                      <div class="input-group"><span class="input-group-text"><i class="ci-dollar"></i></span>
                        <input class="form-control" type="text" id="unp-standard-price">
                      </div>
                      <div class="form-text">Average marketplace price for this category is KSH .</div>
                    </div>

                  </div>
                  <div class="mb-3 py-2">
                    <label class="form-label" for="unp-product-tags">Product tags</label>
                    <textarea class="form-control" rows="4" id="unp-product-tags"></textarea>
                    <div class="form-text">Up to 10 keywords that describe your item. Tags should all be in lowercase and separated by commas.</div>
                  </div>
                  <div class="mb-3 pb-2">
                    <label class="form-label" for="unp-product-files">Product files for sale</label>
                    <input class="form-control" type="file" id="unp-product-files">
                    <div class="form-text">Maximum file size is 1GB</div>
                  </div>
                  <button class="btn btn-primary d-block w-100" type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Upload Product</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
                     <!-- EDIT PRODUCT MODAL ENDS HERE -->


            <!-- Content-->
            <section class="col-lg-9 pt-lg-4 pb-4 mb-3">
              <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                <!-- Title-->
                <div class="d-sm-flex flex-wrap justify-content-between align-items-center border-bottom">
                  <h2 class="h3 py-2 me-2 text-center text-sm-start">Your products<span class="badge bg-faded-accent fs-sm text-body align-middle ms-2">5</span></h2>
                  <div class="py-2">
                    <div class="d-flex flex-nowrap align-items-center pb-3">
                      <label class="form-label fw-normal text-nowrap mb-0 me-2" for="sorting">Sort by:</label>
                      <select class="form-select form-select-sm me-2" id="sorting">
                        <option>Date Created</option>
                        <option>Product Name</option>
                        <option>Price</option>
                        <option>Your Rating</option>
                        <option>Updates</option>
                      </select>
                      <button class="btn btn-outline-secondary btn-sm px-2" type="button"><i class="ci-arrow-up"></i></button>
                    </div>
                  </div>
                </div>
                <!-- Product-->
                <div class="d-block d-sm-flex align-items-center py-4 border-bottom"><a class="d-block mb-3 mb-sm-0 me-sm-4 ms-sm-0 mx-auto" href="marketplace-single.html" style="width: 12.5rem;"><img class="rounded-3" src=" ../img/marketplace/products/dummy.png" alt="Product"></a>
                  <div class="text-center text-sm-start">
                    <h3 class="h6 product-title mb-2"><a href="marketplace-single.html">PRODUCT 01 BY EDWIN</a></h3>
                    <div class="d-inline-block text-accent">KSH 18</div>
                    <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Sales: <span class="fw-medium">6</span></div>
                    <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Earnings: <span class="fw-medium">KSH 327</span></div>
                    <div class="d-flex justify-content-center justify-content-sm-start pt-3">
                       
                    <a href="#edit-product-modal" data-bs-toggle="modal" class="btn bg-faded-info btn-icon me-2" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit text-info"></i></a>

                      <button class="btn bg-faded-danger btn-icon" type="button" data-bs-toggle="tooltip" title="Delete"><i class="ci-trash text-danger"></i></button>
                    </div>
                  </div>
                </div>
                <!-- Product-->
                <div class="d-block d-sm-flex align-items-center py-4 border-bottom"><a class="d-block mb-3 mb-sm-0 me-sm-4 ms-sm-0 mx-auto" href="marketplace-single.html" style="width: 12.5rem;"><img class="rounded-3" src=" ../img/marketplace/products/dummy.png" alt="Product"></a>
                  <div class="text-center text-sm-start">
                    <h3 class="h6 product-title mb-2"><a href="marketplace-single.html">PRODUCT 02 BY EDWIN</a></h3>
                    <div class="d-inline-block text-accent">KSH 20</div>
                    <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Sales: <span class="fw-medium">6</span></div>
                    <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Earnings: <span class="fw-medium">KSH 140</span></div>
                    <div class="d-flex justify-content-center justify-content-sm-start pt-3">
                       
                    <a href="#edit-product-modal" data-bs-toggle="modal" class="btn bg-faded-info btn-icon me-2" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit text-info"></i></a>

                      <button class="btn bg-faded-danger btn-icon" type="button" data-bs-toggle="tooltip" title="Delete"><i class="ci-trash text-danger"></i></button>
                    </div>
                  </div>
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

          <!-- Footer sectionr starts-->

          <?php include_once("includes/footerscripts-only.php") ?>

          <!-- footer section  ends-->

  </body>

  
</html>
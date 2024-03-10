<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>PROFILECODE| Add New Product</title>
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
                  <div class="py-2">
                    <select class="form-select me-2" id="unp-category">
                      <option>Select category</option>
                      <option>Photos</option>
                      <option>Graphics</option>
                      <option>UI Design</option>
                      <option>Web Themes</option>
                      <option>Fonts</option>
                      <option>Add-Ons</option>
                    </select>
                  </div>
                </div>
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
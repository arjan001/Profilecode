
    <!-- Sign in / sign up modal -->


    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab" data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>Sign in as Vendor</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign up as Vendor</a></li>
                    </ul>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body tab-content py-4">
                    <form method="post" id="loginfrm"  class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="signin-tab">
                        <div class="mb-3">
                            <label class="form-label" for="si-email">Username or Email</label>
                            <input class="form-control" type="email" id="si-email" name="email"placeholder="johndoe@example.com" required>
                            <div class="invalid-feedback">Please provide a valid email address. or Userername</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="si-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="si-password"  name="pass" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 d-flex flex-wrap justify-content-between">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="si-remember">
                                <label class="form-check-label" for="si-remember">Remember me</label>
                            </div><a class="fs-sm" href="password-recovery.php">Forgot password?</a>
                        </div>
                        <button  name="login" class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign in</button>
                    </form>
                    <form method="post" id="signupfrm" class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
                        <div class="mb-3">
                            <label class="form-label" for="su-name">Full name</label>
                            <input class="form-control" type="text" name="vname" placeholder="John Doe" required>
                            <div class="invalid-feedback">Please fill in your name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="su-email">Mpesa Phone Number (earnings will be paid here)</label>
                            <input class="form-control" type="number"  name="vphone" placeholder="0712345678" required>
                            <div class="invalid-feedback">Please provide Your Mpesa Number.</div>
                        </div>

                        <div class="mb-3">
                            <label for="su-email">Email address</label>
                            <input class="form-control" type="email" id="su-email"  name="vemail" placeholder="johndoe@example.com" required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password-confirm">Confirm password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="su-password-confirm" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign in / sign up modal ends here-->

    <main class="page-wrapper">

        <!-- Navbar 3 Level (Light)-->

        <header class="shadow-sm">
            <!-- Topbar-->
            <div class="topbar topbar-dark bg-dark">
                <div class="container">
                    <div class="topbar-text dropdown d-md-none"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Useful links</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tel:00331697720"><i class="ci-support text-muted me-2"></i>(00) 33 169 7720</a></li>
                            <li><a  class="dropdown-item hidden" href="#"><i class="ci-location text-muted me-2"></i>  </a></li>
                        </ul>
                    </div>
                    <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="ci-support"></i><span class="text-muted me-1">Support</span><a class="topbar-link" href="tel:  +254769401004"> +254769401004</a></div>
                    <div class="tns-carousel tns-controls-static d-none d-md-block">
                        <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
                            <div class="topbar-text">Leading Digital File Marketplace In Kenya</div>
                            <div class="topbar-text">We are best at what we Do</div>
                            <div class="topbar-text">Friendly 24/7 customer support</div>
                        </div>
                    </div>
                    <div class="ms-3 text-nowrap"><a class="topbar-link me-4 d-none d-md-inline-block" href="#"><i class="ci-location hidden"></i>   </a>
                        <div class="topbar-text dropdown disable-autohide"><a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><img class="me-2" src="img/flags/en.png" width="20" alt="English">Eng / KSH</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
            <div class="navbar-sticky bg-light">
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0" href="index.php"><img src="img/logo.png" width="142" alt="ProfileCode"></a><a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="index.php"><img src="img/logo.png" width="135" alt="ProfileCode"></a>

                        <div class="input-group d-none d-lg-flex mx-4">
                        <form action="./search.php" method="post">
                            <input class="form-control rounded-end pe-5" name="searchproduct"  type="text" placeholder="Search for products"> <button class="btn btn-primary btn-sm position-absolute top-50 end-0 translate-middle-y  "  type="submit" id="" >Search</button>
                            

                        </form>
                        </div>
                        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button><a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Expand menu</span>
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                            </a><a class="navbar-tool d-none d-lg-flex" href="#"><span class="navbar-tool-tooltip">.</span>
                                <div class="navbar-tool-icon-box"></div>
                            </a><a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                                <div class="navbar-tool-text ms-n3"><small>Login As Vendor </small><a class="navbar-tool-text" href="cart.php"><small>My Account</small></a></div>
                            </a>
                            <div class="navbar-tool dropdown ms-3">
                                <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="cart.php"><span class="navbar-tool-label" >
                                <?php echo mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) AS therows FROM cart WHERE sessionid='$sessionid'"))["therows"]  ?>
                            
                               </span><i class="navbar-tool-icon ci-cart"></i></a>
                               <a class="navbar-tool-text" href=" cart.php"><small>My Cart</small></a>


                            </div>



                        </div>
                    </div>
                </div>
                          <!-- NOTIFICATION POP UP BOX -->
                          <div class="form-group  text-center d-flex align-items-center justify-content-center pt-2">
                          <div id="status"></div>
                         </div>
                           <!-- NOTIFICATION POP UP BOX -->

                <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <!-- Search-->
                            <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                                <input class="form-control rounded-start" type="text" placeholder="Search for products">
                            </div>

                            <!-- Departments menu-->
                            <!-- <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown"><i class="ci-view-grid me-2"></i>Categories</a>
                                    <div class="dropdown-menu px-2 pb-4">
                                        <div class="d-flex flex-wrap flex-sm-nowrap">
                                            <div class="mega-dropdown-column pt-3 pt-sm-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/dummy2.png" alt="Clothing"></a>
                                                    <h6 class="fs-base mb-2">Category 1</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Women's clothing</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Men's clothing</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kid's clothing</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/dummy2.png" alt="Shoes"></a>
                                                    <h6 class="fs-base mb-2">Category 2</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Women's shoes</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Men's shoes</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kid's shoes</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/dummy2.png" alt="Gadgets"></a>
                                                    <h6 class="fs-base mb-2">Category 3</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Smartphones &amp; Tablets</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Wearable gadgets</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">E-book readers</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap flex-sm-nowrap">
                                            <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/dummy2.png" alt="Furniture"></a>
                                                    <h6 class="fs-base mb-2">Category 4</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Home furniture</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Office furniture</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Lighting and decoration</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/dummy2.png" alt="Accessories"></a>
                                                    <h6 class="fs-base mb-2">Category 5</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Hats</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Sunglasses</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Bags</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                                                <div class="widget widget-links"><a class="d-block overflow-hidden rounded-3 mb-3" href="#"><img src="img/shop/departments/dummy2.png" alt="Entertainment"></a>
                                                    <h6 class="fs-base mb-2">Category 6</h6>
                                                    <ul class="widget-list">
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kid's toys</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Video games</a></li>
                                                        <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Outdoor / Camping</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul> -->

                            <!-- Primary menu-->
                            <ul class="navbar-nav">

                                <li class="nav-item dropdown active"><a class="nav-link " href="index.php">Home</a></li>

                                <li class="nav-item dropdown"><a class="nav-link " href="shop.php" >Shop</a></li>

                                <li class="nav-item dropdown"><a class="nav-link " href="about.php" >How it Works</a></li>

                                <li class="nav-item dropdown"><a class="nav-link " href="./admin/index.php" >Admin Demo Page</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

                          </header>


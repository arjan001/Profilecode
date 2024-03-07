    <!-- MPESA WITHDRAW MODAL  modal -->
    
  <div class="modal fade" id="withdraw-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link fw-medium active"  data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>WITHDRAW</a></li>
                        

                    </ul>
                   
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body tab-content py-4">
                    <form  class="needs-validation tab-pane fade show active" autocomplete="off"  id="withdrawfrm" enctype="multipart/form-data" method="post">

                        <div class="mb-3">
                        <label class="form-label" for="phone">Phone Number <span style="color: red;">*</span></label>
                            <br>
                            <small>To change mpesa number please contact admin 0769401004)</small>
                            <input class="form-control" type="phone" id="vphone" name="vphone" value="<?php echo $vendorphone ?>" placeholder="0712345678"   required>
                            <div class="invalid-feedback">Please provide a valid Safaricom Number</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="amount">Amount<span style="color: red;">*</span></label>
                            <input type="hidden" value="<?php echo $vendorbalance ?>" name="vbalance" id="vbalance">
                            <input type="hidden" value="<?php echo $vendorid ?>" name="vid" id="vid">

                            <input class="form-control" type="number" id="vamount" name="vamount" min="10" max="<?php echo $vendorbalance ?>" placeholder="" required>
                            <div class="invalid-feedback">Please provide an Amount to withdraw.</div>
                        </div>
                        <p>* Minimum withdrawal amount is Ksh. 10</p>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Withdraw</button>

                         <!-- NOTIFICATION POP UP BOX -->
                              <div class="form-group  text-center d-flex align-items-center justify-content-center pt-2">
                          <div id="status"></div>
                         </div>
                           <!-- NOTIFICATION POP UP BOX -->
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- MPESA WITHDRAW MODAL  ends here-->


<header class="bg-light shadow-sm navbar-sticky">
        <div class="navbar navbar-expand-lg navbar-light">
          <div class="container"><a class="navbar-brand d-none d-sm-block flex-shrink-0 me-4 order-lg-1" href="index.php"><img src="../img/logo.png" width="142" alt="ProfileCode"></a><a class="navbar-brand d-sm-none me-2 order-lg-1" href="index.php"><img src="../img/logo.png" width="74" alt="ProfileCode"></a>
            <!-- Toolbar-->
            <div class="navbar-toolbar d-flex align-items-center order-lg-3">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
              
  
              <div class="navbar-tool dropdown ms-2"><a class="navbar-tool-icon-box border dropdown-toggle" href="#"><img src="../img/marketplace/account/avatar-sm.png" width="32" alt="ProfileCode"></a><a class="navbar-tool-text ms-n1" href="#"><small><?php echo $user["vname"];?></small>KSH <?php echo number_format(mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS ttearnings FROM vendorsales WHERE vendorid='$vendorid'"))["ttearnings"],2);?>  </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <div style="min-width: 14rem;">
                    <h6 class="dropdown-header">Account</h6>

                    <!-- <a class="dropdown-item d-flex align-items-center" href="settings.php"><i class="ci-settings opacity-60 me-2"></i>Settings</a> -->
                  
                    <a class="dropdown-item d-flex align-items-center"
                     href="logout.php"><i class="ci-sign-out opacity-60 me-2"></i>Log Out</a>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
              <!-- Search-->
              <div class="input-group d-lg-none my-3"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                <input class="form-control rounded-start" type="text" placeholder="Search marketplace">
              </div>

              <!-- Primary menu-->
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="../index.php">Back to shopping Page</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Search collapse-->
        <div class="search-box collapse" id="searchBox">
          <div class="card pt-2 pb-4 border-0 rounded-0">
            <div class="container">
              <div class="input-group"><i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                <input class="form-control rounded-start" type="text" placeholder="Search marketplace">
              </div>
            </div>
          </div>
        </div>
      </header>
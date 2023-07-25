<?php
require_once("func/session.php");
require_once("func/sql.php");
require_once("func/misc.php");
require_once("func/validate_login.php");
require_once("func/time_ago.php");
require_once("partials/alert.php");
$pagetitle = "";
require_once("partials/head.php");
?>
    <div class="preloader"></div>

    
    <div class="main-wrapper">
        <?php
        require_once("partials/nav_top.php");
        require_once("partials/nav_left.php");
        ?>
        
        <!-- main content -->
        <div class="main-content bg-lightblue theme-dark-bg">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            
                            <div class="card-body p-lg-5 p-4 w-100 border-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mb-4 font-xxl fw-700 mont-font mb-lg-5 mb-4 font-md-xs">Settings</h4>

                                        <div class="nav-caption fw-600 font-xssss text-grey-500 mb-2">Genaral</div>
                                        <ul class="list-inline mb-4">
                                            <li class="list-inline-item d-block border-bottom me-0"><a href="account-information" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-primary-gradiant text-white feather-home font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Acount Information</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                            <li class="list-inline-item d-block me-0"><a href="social" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-red-gradiant text-white feather-twitter font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Social Accounts</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                        </ul>

                                        <div class="nav-caption fw-600 font-xsss text-grey-500 mb-2">Acount</div>
                                        <ul class="list-inline mb-4">
                                            <li class="list-inline-item d-block  me-0"><a href="password" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-blue-gradiant text-white feather-inbox font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Password</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                            
                                        </ul>

                                        <div class="nav-caption fw-600 font-xsss text-grey-500 mb-2">Other</div>
                                        <ul class="list-inline">
                                            <li class="list-inline-item d-block border-bottom me-0"><a href="preference" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-gold-gradiant text-white feather-sliders font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Preference</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                            <li class="list-inline-item d-block border-bottom me-0"><a href="help-box" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-primary-gradiant text-white feather-help-circle font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Help</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                            <li class="list-inline-item d-block border-bottom me-0"><a href="tandc" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-mini-gradiant text-white feather-file font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Term and Conditions of Use</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                            <li class="list-inline-item d-block me-0"><a href="logout" class="pt-2 pb-2 d-flex align-items-center"><i class="btn-round-md bg-red-gradiant text-white feather-lock font-md me-3"></i> <h4 class="fw-600 font-xsss mb-0 mt-0">Logout</h4><i class="ti-angle-right font-xsss text-grey-500 ms-auto mt-3"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                 
            </div>            
        </div>
        <!-- main content -->

        
        <?php
        require_once("partials/mobile_nav.php");
        require_once("partials/search.php");
        ?>
        

    </div> 

    <script src="js/plugin.js"></script>

    <script src="js/lightbox.js"></script>
    <script src="js/scripts.js"></script>
    
</body>
</html>
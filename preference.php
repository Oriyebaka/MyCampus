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
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                <a href="settings.php" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                                <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Change reference</h4>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0">
                                <h4 class="fw-700 font-sm mb-4">Settings</h4>
                                <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">Choose Color Theme</h6>
                                
                                <div class="card bg-transparent-card border-0 d-block mt-3">
                                    <h4 class="d-inline font-xssss mont-font fw-700">Menu Position</h4>
                                    <div class="d-inline float-right mt-1">
                                        <label class="toggle toggle-menu"><input type="checkbox"><span class="toggle-icon"></span></label>
                                    </div>
                                </div>
                                <div class="card bg-transparent-card border-0 d-block mt-3">
                                    <h4 class="d-inline font-xssss mont-font fw-700">Dark Mode</h4>
                                    <div class="d-inline float-right mt-1">
                                        <label class="toggle toggle-dark"><input type="checkbox"><span class="toggle-icon"></span></label>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <!-- <div class="card w-100 border-0 p-2"></div> -->
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

    
    <script src="js/lightbox.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>
</html>
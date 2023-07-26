<?php
require_once("func/session.php");
require_once("func/sql.php");
require_once("func/misc.php");
require_once("func/validate_login.php");
require_once("func/time_ago.php");
require_once("partials/alert.php");
$pagetitle = "Garage - ";
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
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card p-md-5 p-4 bg-primary-gradiant rounded-3 shadow-xss bg-pattern border-0 overflow-hidden">
                                        <div class="bg-pattern-div"></div>
                                        <h2 class="display2-size display2-md-size fw-700 text-white mb-0 mt-0">Garage <span class="fw-700 ls-3 text-grey-200 font-xsssss mt-2 d-block">32 ITEMS FOUND</span></h2>
                                    </div>
                                </div>
                            
                                <div class="col-lg-12 mt-3">
                                    <h4 class="float-left font-xssss fw-700 text-grey-500 text-uppercase ls-3 mt-2 pt-1">32 Items found</h4>
                                    <input type="search" class="searchCat float-right border-0 lh-32 pt-2 pb-2 ps-3 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg">
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-9.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Textured Sleeveless Camisole</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-10.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Adjustable Shoulder Straps</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-13.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Neck Strappy Camisole</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-14.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Scoop-Neck Strappy</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-8.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Butler Stool Ladder</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-22.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Butler Stool Ladder</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-23.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Butler Stool Ladder</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-8.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Butler Stool Ladder</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-9.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Textured Sleeveless Camisole</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-10.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Adjustable Shoulder Straps</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-11.png" alt="product-image" class="w-100 mt-0 mb-0 p-5"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Neck Strappy Camisole</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card w-100 border-0 mt-4">
                                        <div class="card-image w-100 p-0 text-center bg-greylight rounded-3 mb-2">
                                            <a href="#"><img src="images/pp-4.png" alt="product-image" class="w-100 mt-0 mb-0 p-5 mt-4 mb-4"></a>
                                        </div>
                                        <div class="card-body w-100 p-0 text-center">
                                            <h2 class="mt-2 mb-1"><a href="single-product.html" class="text-black fw-700 font-xsss lh-26">Scoop-Neck Strappy</a></h2>
                                            <h6 class="font-xsss fw-600 text-grey-500 ls-2">$449</h6>
                                        </div>                                
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3 mb-5 text-center"><a href="#" class="fw-700 text-white font-xssss text-uppercase ls-3 lh-32 rounded-3 mt-3 text-center d-inline-block p-2 bg-current w150">Load More</a></div>
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

    
    <script src="js/lightbox.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>
</html>
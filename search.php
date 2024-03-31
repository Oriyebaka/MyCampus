<?php
require "php_includes/sql_con.php";
require "php_includes/time_ago.php";
if (isset($_GET["search"])) {
    if (isset($_GET["filter"])) {
        if ($_GET["filter"] == "person" || $_GET["filter"] == "post" || $_GET["filter"] == "topic" ||$_GET["filter"] == "garageitem") {
            $search = $_GET["search"];
            $filter = $_GET["filter"];
        } else {
            $search = $_GET["search"];
            $filter = "person";
        }
    } else {
        $search = $_GET["search"];
        $filter = "person";
    }
} else {
    $search = $_GET["search"];
    $filter = "person";
}
?>
<!-- html head here -->
<?php include "html_includes/html_head.php"; ?>
<!-- html head here -->

<body class="<?php echo $getpref["color_theme"]." ".$getpref["dark_mode"]; ?> mont-font">

    <div class="preloader"></div>

    
    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include "html_includes/navigation_top.php"; ?>
        <!-- navigation top -->

        <!-- navigation left -->
        <?php include "html_includes/navigation_left.php"; ?>
        <!-- navigation left -->

        <!-- main content -->
        <div class="main-content <?php echo $getpref["menu_pos"]; ?> right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left pe-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card shadow-xss w-100 d-block d-flex border-0 p-4 mb-3">
                                <div class="card-body d-flex align-items-center p-0 pb-2">
                                    <h2 class="fw-700 mb-0 mt-0 font-md text-grey-900">Search</h2>
                                    <form action="search.php" method="get" class="search-form-2 ms-auto">
                                        <i class="ti-search font-xss"></i>
                                        <input type="hidden" name="filter" value="person">
                                        <input type="text" name="search" class="form-control text-grey-500 mb-0 bg-greylight theme-dark-bg border-0" placeholder="Search here...">
                                    </form>
                                    <div class="dropdown">
                                        <a href="javascript:void(0)" data-bs-toggle="dropdown" class="btn-round-md ms-2 bg-greylight theme-dark-bg rounded-3"><i class="feather-filter font-xss text-grey-500"></i><span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="search.php?filter=person&search=<?php echo $search; ?>">Person</a></li>
                                            <li><a class="dropdown-item" href="search.php?filter=post&search=<?php echo $search; ?>">Post</a></li>
                                            <li><a class="dropdown-item" href="search.php?filter=topic&search=<?php echo $search; ?>">Topic</a></li>
                                            <li><a class="dropdown-item" href="search.php?filter=garageitem&search=<?php echo $search; ?>">Garage Item</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row ps-2 pe-1">
                                
                                <?php
                                if (isset($search) && isset($filter)) {
                                    // Search Operation Begins
                                    switch ($filter) {
                                        case "person":
                                            $selectsearchkey = "SELECT * FROM userdetails WHERE firstname LIKE '%$search%' || lastname LIKE '%$search%' || username LIKE '%$search%'";
                                            $querysearchkey = mysqli_query($con, $selectsearchkey);
                                            $numresults = mysqli_num_rows($querysearchkey);
                                            if ($numresults > 0) {
                                                while ($getresults = mysqli_fetch_assoc($querysearchkey)) {
                                                    echo "
                                                    <div class='col-md-4 col-sm-6 pe-2 ps-2'>
                                                        <div class='card d-block border-0 shadow-xss rounded-3 overflow-hidden mb-3'>
                                                            <div class='card-body d-block w-100 p-4 text-center'>
                                                                <figure class='avatar ms-auto me-auto mb-0 position-relative w90 z-index-1'><img src='profile/".$getresults["profilepic"]."' alt='image' class='float-right p-1 bg-white rounded-circle' style='height:100px;width:100px;border-radius:50%;object-fit:cover'></figure>
                                                                <div class='clearfix'></div>
                                                                <h4 class='fw-700 font-xss mt-3 mb-0'>".$getresults["firstname"]." ".$getresults["lastname"]."</h4>
                                                                <p class='fw-500 font-xssss text-grey-500 mt-0 mb-3'>".$getresults["email"]."</p>
                                                                <ul class='d-flex align-items-center justify-content-center mt-1'>
                                                                    <li class='m-2'><h4 class='fw-700 font-sm'>500+ <span class='font-xsssss fw-500 mt-1 text-grey-500 d-block'>Friends</span></h4></li>
                                                                    <li class='m-2'><h4 class='fw-700 font-sm'>88.7 k <span class='font-xsssss fw-500 mt-1 text-grey-500 d-block'>Follower</span></h4></li>
                                                                    <li class='m-2'><h4 class='fw-700 font-sm'>1,334 <span class='font-xsssss fw-500 mt-1 text-grey-500 d-block'>Followings</span></h4></li>
                                                                </ul>
                                                                <form action='getprofile.php' method='post'>
                                                                <input type='hidden' name='personid' value='".$getresults["id"]."'>
                                                                <button type='submit' class='mt-4 p-0 btn p-2 lh-24 w100 ms-1 ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white'>PROFILE</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>";
                                                }
                                            }
                                            break;
                                        case "post":
                                            $selectsearchkey = "SELECT * FROM news WHERE post LIKE '%$search%'";
                                            $querysearchkey = mysqli_query($con, $selectsearchkey);
                                            $numresults = mysqli_num_rows($querysearchkey);
                                            if ($numresults > 0) {
                                                while ($getresults = mysqli_fetch_assoc($querysearchkey)) {
                                                    # code...
                                                }
                                            }
                                            break;
                                        case "topic":
                                            $selectsearchkey = "SELECT * FROM research WHERE topic LIKE '%$search%' || tags LIKE '%$search%' || briefing LIKE '%$search%'";
                                            $querysearchkey = mysqli_query($con, $selectsearchkey);
                                            $numresults = mysqli_num_rows($querysearchkey);
                                            if ($numresults > 0) {
                                                while ($getresults = mysqli_fetch_assoc($querysearchkey)) {
                                                    # code...
                                                }
                                            }
                                            break;
                                        case "garageitem":
                                            $selectsearchkey = "SELECT * FROM garage WHERE itemcat LIKE '%$search%' || itemdesc LIKE '%$search%'";
                                            $querysearchkey = mysqli_query($con, $selectsearchkey);
                                            $numresults = mysqli_num_rows($querysearchkey);
                                            if ($numresults > 0) {
                                                while ($getresults = mysqli_fetch_assoc($querysearchkey)) {
                                                    # code...
                                                }
                                            }
                                            break;
                                        default:
                                            echo "
                                            <div class='col-md-4 col-sm-6 pe-2 ps-2 text-center'>
                                            <h2 class='fw-700 mb-0 mt-0 font-md text-grey-900'>There's nothing to see here</h2>
                                            </div>
                                            ";
                                            break;
                                    }
                                } else {
                                    echo "
                                    <div class='col-md-4 col-sm-6 pe-2 ps-2 text-center'>
                                    <h2 class='fw-700 mb-0 mt-0 font-md text-grey-900'>There's nothing to see here</h2>
                                    </div>
                                    ";
                                }
                                ?>
                                 
                            </div>
                        </div>               
                    </div>
                </div>
                 
            </div>            
        </div>
        <!-- main content -->

        <!-- right chat -->
        <div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                <!-- loader wrapper -->
                <div class="preloader-wrap p-3">
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer mb-3">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                </div>
                <!-- loader wrapper -->

                <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">CONTACTS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-8.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-7.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Victor Exrixon</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-6.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Surfiya Zakir</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-5.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Goria Coast</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-4.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">4:09 pm</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-3.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">David Goria</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 days</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-2.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Seary Victor</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-12.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Ana Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
                </div>
                <div class="section full pe-3 ps-4 pt-4 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">GROUPS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Studio Express</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 min</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany Design</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-mini-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">De fabous</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                    </ul>
                </div>
                <div class="section full pe-3 ps-4 pt-0 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">Pages</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Entropio Inc</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
                </div>

            </div>
        </div>

        
        <!-- right chat -->
        
        <?php include "html_includes/mobile_menu.php"; ?>

    </div> 

    <div class="modal bottom side fade" id="Modalstries" tabindex="-1" role="dialog" style=" overflow-y: auto;">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 bg-transparent">
                <button type="button" class="close mt-0 position-absolute top--30 right--10" data-dismiss="modal" aria-label="Close"><i class="ti-close text-white font-xssss"></i></button>
                <div class="modal-body p-0">
                    <div class="card w-100 border-0 rounded-3 overflow-hidden bg-gradiant-bottom bg-gradiant-top">
                        <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none">
                            <div class="item"><img src="images/story-5.jpg" alt="image"></div>
                            <div class="item"><img src="images/story-6.jpg" alt="image"></div>
                            <div class="item"><img src="images/story-7.jpg" alt="image"></div>
                            <div class="item"><img src="images/story-8.jpg" alt="image"></div>
                            
                        </div>
                    </div>
                    <div class="form-group mt-3 mb-0 p-3 position-absolute bottom-0 z-index-1 w-100">
                        <input type="text" class="style2-input w-100 bg-transparent border-light-md p-3 pe-5 font-xssss fw-500 text-white" value="Write Comments">               
                        <span class="feather-send text-white font-md text-white position-absolute" style="bottom: 35px;right:30px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-popup-chat">
        <div class="modal-popup-wrap bg-white p-0 shadow-lg rounded-3">
            <div class="modal-popup-header w-100 border-bottom">
                <div class="card p-3 d-block border-0 d-block">
                    <figure class="avatar mb-0 float-left me-2">
                        <img src="images/user-12.png" alt="image" class="w35 me-1">
                    </figure>
                    <h5 class="fw-700 text-primary font-xssss mt-1 mb-1">Hendrix Stamp</h5>
                    <h4 class="text-grey-500 font-xsssss mt-0 mb-0"><span class="d-inline-block bg-success btn-round-xss m-0"></span> Available</h4>
                    <a href="#" class="font-xssss position-absolute right-0 top-0 mt-3 me-4"><i class="ti-close text-grey-900 mt-2 d-inline-block"></i></a>
                </div>
            </div>
            <div class="modal-popup-body w-100 p-3 h-auto">
                <div class="message"><div class="message-content font-xssss lh-24 fw-500">Hi, how can I help you?</div></div>
                <div class="date-break font-xsssss lh-24 fw-500 text-grey-500 mt-2 mb-2">Mon 10:20am</div>
                <div class="message self text-right mt-2"><div class="message-content font-xssss lh-24 fw-500">I want those files for you. I want you to send 1 PDF and 1 image file.</div></div>
                <div class="snippet pt-3 ps-4 pb-2 pe-3 mt-2 bg-grey rounded-xl float-right" data-title=".dot-typing"><div class="stage"><div class="dot-typing"></div></div></div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-popup-footer w-100 border-top">
                <div class="card p-3 d-block border-0 d-block">
                    <div class="form-group icon-right-input style1-input mb-0"><input type="text" placeholder="Start typing.." class="form-control rounded-xl bg-greylight border-0 font-xssss fw-500 ps-3"><i class="feather-send text-grey-500 font-md"></i></div>
                </div>
            </div>
        </div> 
    </div>


    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>


<!-- Mirrored from uitheme.net/sociala/default-badge.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Apr 2022 22:53:32 GMT -->
</html>
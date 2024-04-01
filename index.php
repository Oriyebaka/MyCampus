<?php
require_once "required/session.php";
require_once "required/sql.php";
require_once "required/auth.php";

require_once "func/time_ago.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
const PAGE_TITLE = "Home";
include_once "includes/head.php";
include_once "includes/alert.php";


// $startid = 0;
// $stopid = 20;
// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     if (isset($_GET["postid"])) {
//         $postid = $_GET["postid"];
//         unset($_GET["postid"]);

// This was already commented
// if (isset($_SESSION["userid"]) && isset($_SESSION["username"])) {
//     $con = mysqli_connect("localhost", "root", "", "mycampus");
//     $userid = $_SESSION["userid"];
//     $username = $_SESSION["username"];
//     $selectuser = "SELECT * FROM userdetails WHERE id='$userid' && username='$username'";
//     $queryuser = mysqli_query($con, $selectuser);
//     $numuser = mysqli_num_rows($queryuser);
//     if ($numuser == 1) {
//         openpost($postid);
//     } else {
//         header("location: sharepost.php?postid=$postid");
//     }
// } else {
//     header("location: sharepost.php?postid=$postid");
// }
// This was already commented\
//     } elseif (isset($_GET["startid"]) && isset($_GET["stopid"])) {
//         $startid = $_GET["startid"];
//         $stopid = $_GET["stopid"];
//         unset($_GET["startid"]);
//         unset($_GET["stopid"]);
//     }
// }
?>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>


    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include_once "includes/nav.php"; ?>
        <!-- navigation top -->

        <!-- navigation left -->
        <?php include_once "includes/sidebar.php"; ?>
        <!-- navigation left -->

        <!-- main content -->

        <div class="main-content right-chat-active">

            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">

                    <!-- loader wrapper -->
                    <?php include_once "includes/preloader.php"; ?>
                    <!-- loader wrapper -->

                    <div class="row feed-body">

                        <!-- Start Main area -->
                        <div class="col-xl-8 col-xxl-9 col-lg-8">
                            <div class="card pointer w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3" onclick="document.getElementById('compose').style.display='block'">
                                <div class="card-body p-0">
                                    <a href="#" class=" font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Create Post</a>
                                </div>
                                <div class="card-body p-0 mt-3 position-relative">
                                    <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="images/female-profile.png" style="height:30px; object-fit:cover" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                    <textarea name="message" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?" style="resize:none"></textarea>
                                </div>
                                <div class="card-body d-flex p-0 mt-0">
                                    <a href="#" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i class="font-md text-success feather-image me-2"></i><span class="d-none-xs">Photo/Video</span></a>
                                </div>
                            </div>


                            <div id="compose" class="w3-modal" style="top: 70px !important">
                                <div class="w3-modal-content w3-animate-zoom" style="background-color: rgb(0,0,0,0) !important">
                                    <div class="card pointer w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3">
                                        <div class="modal-header">
                                            <h2 class="modal-title align-center text-grey-500 fw-600"><b><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2"></i>Create Post</b></h2>
                                            <button type="button" class="btn-close" onclick="document.getElementById('compose').style.display='none'"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="card-body p-0 mt-3 position-relative">
                                                    <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="images/female-profile.png" style="height:30px; object-fit:cover" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                                    <div class="d-flex">

                                                        <textarea name="message" class="h200 mb-3 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?" style="resize:none"></textarea>
                                                        <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 300px; height: 200px; object-fit: contain; margin-left: 10px;">
                                                    </div>
                                                </div>
                                                <div class="card-body d-flex p-0 mt-0">
                                                    <a id="mediaUpld" style="cursor:pointer" class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"><i class="font-md text-success feather-image me-2"></i><span class="d-none-xs">Photo/Video</span><span class="d-none-xs" id="filetxt" style="padding-left:5px;"></span></a>

                                                    <input type="file" name="upld_image" id="upld_image" accept="image/*" onchange="previewImage()" style="display:none">
                                                    <span class="d-flex">
                                                        <button type="submit" class="btn btn-primary ms-auto text-light" style="border-radius:5px; padding:5px; float:right !important">Send <i class="feather-send text-light"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <?php
                            // This is where a modal for sharing/shared posts (url located posts) is suppose to be
                            // $selectupd = "SELECT * FROM news ORDER BY id DESC LIMIT $startid, $stopid";
                            // $queryupd = mysqli_query($con, $selectupd);
                            // $num_o_rows = mysqli_num_rows($queryupd);
                            ?>
                            <!-- <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                                <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                    <div class="d-flex justify-content-between stage"> -->
                            <?php
                            // if ($startid >= 20) {
                            //     $new_startid = $startid - 20;
                            //     $new_stopid = 20;
                            //     echo "
                            //     <form action='' method='get' style=''>
                            //     <input type='hidden' name='startid' value='$new_startid'>
                            //     <input type='hidden' name='stopid' value='$new_stopid'>
                            //     <button style='height:40px;width:40px;border-radius:50%;float:left !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-left text-white'></span></button>
                            //     </form>";
                            // }
                            ?>
                            <?php
                            // if ($num_o_rows > 0) {
                            //     $new_startid = $startid + 20;
                            //     $new_stopid = 20;
                            //     echo "
                            //     <form action='' method='get' style=''>
                            //     <input type='hidden' name='startid' value='$new_startid'>
                            //     <input type='hidden' name='stopid' value='$new_stopid'>
                            //     <button style='height:40px;width:40px;border-radius:50%;float:right !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-right text-white'></span></button>
                            //     </form>";
                            // }
                            ?>
                            <!-- </div>
                                </div>
                            </div> -->
                            <?php

                            $select_feed = "SELECT * FROM feeds ORDER BY id DESC";
                            $query_feed = mysqli_query($con, $select_feed);
                            $num_rows = mysqli_num_rows($query_feed);
                            while ($get_feed = mysqli_fetch_assoc($query_feed)) {
                                $select_likes = "SELECT * FROM likes WHERE feed_id='" . $get_feed["id"] . "'";
                                $query_likes = mysqli_query($con, $select_likes);
                                $likes = mysqli_num_rows($query_likes);
                                // $getid = $getupd["posterid"];

                                // Check if current user has liked feed
                                $check_likes = "SELECT * FROM likes WHERE user_id='$user_id' AND feed_id='" . $get_feed["id"] . "'";
                                $query_likes = mysqli_query($con, $check_likes);
                                if (mysqli_num_rows($query_likes) == 1) {
                                    $like_status = 'unlike';
                                } else {
                                    $like_status = 'like';
                                }
                                $select_author = "SELECT * FROM users WHERE id='" . $get_feed["user_id"] . "'";
                                $query_author = mysqli_query($con, $select_author);
                                $get_author = mysqli_fetch_assoc($query_author);
                                // $selectposter = "SELECT * FROM userdetails WHERE id='$getid'";
                                // $queryposter = mysqli_query($con, $selectposter);
                                // $getposter = mysqli_fetch_assoc($queryposter);

                            ?>
                                <div id='feed_<?= $get_feed["id"] ?>' class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                    <div class='card-body p-0 d-flex'>
                                        <figure class='avatar me-3'><img src='images/female-profile.png' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer;' alt='image' class='shadow-sm rounded-circle w45'></figure>

                                        <h4 class='fw-700 text-grey-900 font-xssss mt-1'><?= $get_author["firstname"] . " " . $get_author["lastname"] ?><span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'><?= time_ago(strtotime($get_feed["datetime"])) ?></span></h4>
                                    </div>
                                    <div class='card-body p-0 me-lg-5'>
                                        <p class='fw-500 text-grey-500 lh-26 font-xssss w-100 mt-2'><?= $get_feed["feed"] ?></p>
                                    </div>
                                    <div class='card-body d-flex p-0 mt-3'>
                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' <?php echo (mysqli_num_rows($query_likes) == 1) ? "style='color:green !important'" : "" ?>><i class='ti-thumb-up font-xs m-1'></i><?= $likes . " " . $like_status ?></a>
                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss p-0'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-xs m-0'></i><span class='d-none-xss'>22 Comment</span></a>
                                    </div>
                                </div>
                            <?php
                            }

                            if ($num_rows == 0) {
                            ?>
                                <div class='card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3'>
                                    <div class='snippet mt-2 ms-auto me-auto' data-title='.dot-typing'>
                                        <div class='stage'>
                                            <h3 class='fw-700 text-grey-900 font-xssss'>There is nothing to see here...</h3>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>



                            <!-- <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                                <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                    <div class="d-flex justify-content-between stage"> -->
                            <?php
                            // if ($startid >= 20) {
                            //     $new_startid = $startid - 20;
                            //     $new_stopid = 20;
                            //     echo "
                            //     <form action='' method='get' style=''>
                            //     <input type='hidden' name='startid' value='$new_startid'>
                            //     <input type='hidden' name='stopid' value='$new_stopid'>
                            //     <button style='height:40px;width:40px;border-radius:50%;float:left !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-left text-white'></span></button>
                            //     </form>";
                            // }
                            ?>
                            <?php
                            // if ($num_o_rows > 0) {
                            //     $new_startid = $startid + 20;
                            //     $new_stopid = 20;
                            //     echo "
                            //     <form action='' method='get' style=''>
                            //     <input type='hidden' name='startid' value='$new_startid'>
                            //     <input type='hidden' name='stopid' value='$new_stopid'>
                            //     <button style='height:40px;width:40px;border-radius:50%;float:right !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-right text-white'></span></button>
                            //     </form>";
                            // }
                            ?>
                            <!-- </div>
                                </div>
                            </div> -->


                        </div>
                        <!-- End of main area -->



                        <div class="col-xl-4 col-xxl-3 col-lg-4 ps-lg-0">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3">
                                <div class="card-body d-flex align-items-center p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Friends (0)</h4>
                                    <a href="find-friends.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                            </div>

                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-3">
                                <div class="card-body d-flex align-items-center p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Popular Archives</h4>
                                    <a href="group.html" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                <div class="card-body d-flex pt-4 ps-4 pe-4 pb-0 overflow-hidden border-top-xs bor-0">
                                    <img src="images/e-2.jpg" alt="img" class="img-fluid rounded-xxl mb-2">
                                </div>
                                <div class="card-body dd-block pt-0 ps-4 pe-4 pb-4">
                                    <ul class="memberlist mt-1 mb-2 ms-0 d-block">
                                        <li class="w20"><a href="#"><img src="images/user-6.png" alt="user" class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                        <li class="w20"><a href="#"><img src="images/user-7.png" alt="user" class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                        <li class="w20"><a href="#"><img src="images/user-8.png" alt="user" class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                        <li class="w20"><a href="#"><img src="images/user-3.png" alt="user" class="w35 d-inline-block" style="opacity: 1;"></a></li>
                                        <li class="last-member"><a href="#" class="bg-greylight fw-600 text-grey-500 font-xssss w35 ls-3 text-center" style="height: 35px; line-height: 35px;">+2</a></li>
                                        <li class="ps-3 w-auto ms-1"><a href="#" class="fw-600 text-grey-500 font-xssss">Member apply</a></li>
                                    </ul>
                                </div>



                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- main content -->

        <!-- right chat -->
        <?php include_once "includes/mobile_menu.php"; ?>

    </div>

    <?php include_once "includes/script.php"; ?>
</body>

</html>
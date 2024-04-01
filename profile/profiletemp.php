<?php
require "../../includes_nested/sql_con.php";
$startid = 0;
$stopid = 20;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["startid"]) && isset($_GET["stopid"])) {
        $startid = $_GET["startid"];
        $stopid = $_GET["stopid"];
        unset($_GET["startid"]);
        unset($_GET["stopid"]);
    }
}
require "../../php_includes/time_ago.php";
$personid = $_SESSION["personid"];
if ($userid == $personid) {
    header("location: ../../profile.php");
}
$selectpersonuser = "SELECT * FROM userdetails WHERE id='$personid'";
$querypersonuser = mysqli_query($con, $selectpersonuser);
$getpersonuser = mysqli_fetch_assoc($querypersonuser);

$selectpersonpref = "SELECT * FROM preference WHERE userid='$personid'";
$querypersonpref = mysqli_query($con, $selectpersonpref);
$getpersonpref = mysqli_fetch_assoc($querypersonpref);
?>

<!-- html head here -->
<?php include "../../includes_nested/html_head.php"; ?>
<!-- html head here -->

<script type="text/JavaScript" src="../../js/jquery.min.js"></script>
<body class="<?php echo $getpref["color_theme"]." ".$getpref["dark_mode"]; ?> mont-font">

    <div class="preloader"></div>

    
    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include "../../includes_nested/navigation_top.php"; ?>
        <!-- navigation top -->

        <!-- navigation left -->
        <?php include "../../includes_nested/navigation_left.php"; ?>
        <!-- navigation left -->

        <!-- main content -->
        <div class="main-content <?php echo $getpref["menu_pos"]; ?> right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card w-100 border-0 p-0 bg-white shadow-xss rounded-xxl">
                                <div class="card-body h250 p-0 rounded-xxl overflow-hidden m-3"><img name="coverpic" src="../../<?php echo "profile/".$getpersonuser["coverpic"]; ?>" style="width:960px; height:250px; object-fit:cover; cursor:pointer;" id="coverpic" alt="image"></div>
                                <div class="card-body p-0 position-relative">
                                    <figure class="avatar position-absolute w100 z-index-1" style="top:-40px; left: 30px;"><img src="../../<?php echo "profile/".$getpersonuser["profilepic"]; ?>" style="height:100px; width:100px;object-fit:cover;cursor:pointer;" id="profilepic" alt="image" class="float-right p-1 bg-white rounded-circle"></figure>
                                    <h4 class="fw-700 font-sm mt-2 mb-lg-5 mb-4 pl-15"><?php echo $getpersonuser["firstname"]." ".$getpersonuser["lastname"]; ?><span class="fw-500 font-xssss text-grey-500 mt-1 d-block"><?php echo $getpersonuser["email"]; ?></span><span class="fw-500 font-xssss text-grey-500 mt-1 mb-3 d-block"><?php echo $getpersonuser["phone"]; ?></span></h4>
                                    
                                    <div class="d-flex align-items-center justify-content-center position-absolute-md right-15 top-0 me-2">
                                        <?php
                                        $personfriendlist = json_decode($getpersonuser["friends_list"]);
                                        if ($personfriendlist == "") {
                                            $personfriendlist = array();
                                        }
                                        $pendingfr = json_decode($getpersonuser["pfr"]);
                                        if ($pendingfr == "") {
                                            $pendingfr = array();
                                        }
                                        if (in_array($username, $pendingfr)) {
                                            echo "
                                            <form action='../tem_friendship.php' method='post'>
                                            <input type='hidden' value='".$getpersonuser["id"]."' name='personid'>
                                            <button type='submit' class='d-none d-md-block bg-danger btn-round-lg ms-2 rounded-3 text-grey-700' title='Terminate Friend Request'><i class='feather-x font-md'></i></button>
                                            </form>";
                                        }
                                        $my_pfr = json_decode($getuser["pfr"]);
                                        if ($my_pfr == "") {
                                            $my_pfr = array();
                                        }
                                        if (in_array($getpersonuser["username"], $my_pfr)) {
                                            echo "
                                            <form action='../dec_friendship.php' method='post'>
                                            <input type='hidden' value='".$getpersonuser["id"]."' name='personid'>
                                            <button type='submit' class='d-none d-md-block bg-danger text-white btn-round-lg ms-2 rounded-3 text-grey-700' title='Decline Friend Request'><i class='feather-x font-md'></i></button>
                                            </form>
                                            <form action='../acc_friendship.php' method='post'>
                                            <input type='hidden' value='".$getpersonuser["id"]."' name='personid'>
                                            <button type='submit' class='d-none d-md-block bg-success text-white btn-round-lg ms-2 rounded-3 text-grey-700' title='Accept Friend Request'><i class='feather-check font-md'></i></button>
                                            </form>";
                                        }
                                        if (in_array($username,$personfriendlist)) {
                                            echo "
                                            <a href='#' class='d-none d-md-block bg-greylight btn-round-lg ms-2 rounded-3 text-grey-700'><i class='feather-user-check font-md' data-bs-toggle='tooltip' title=\"You're already friends\"></i></a>";
                                        }
                                        if ((!in_array($username,$personfriendlist)) && (!in_array($username, $pendingfr)) && (!in_array($getpersonuser["username"], $my_pfr))) {
                                            echo "
                                            <form action='../req_friendship.php' method='post'>
                                            <input type='hidden' value='".$getpersonuser["id"]."' name='personid'>
                                            <button type='submit' class='d-none d-md-block bg-lightgrey btn-round-lg ms-2 rounded-3 text-grey-700' title='Send Friend Request'><i class='feather-user-plus font-md'></i></button>
                                            </form>";
                                        }
                                        ?>
                                        <form action='../' method='post'>
                                        <input type='hidden' value='' name='receiver'>
                                        <li class='list-inline-item me-5'><button type='submit' class="d-none d-md-block bg-greylight btn-round-lg ms-2 rounded-3 text-grey-700" title="Start Chat"><i class="feather-message-circle font-md"></i></button></li>
                                        </form>
                                    </div>
                                </div>

                                <div class="card-body d-block d-md-none w-100 shadow-none mb-0 p-0">
                                    <ul class="nav nav-pill h55 justify-content-center d-flex border-bottom-0 ps-4" id="" role="tablist">
                                        <?php
                                        $personfriendlist = json_decode($getpersonuser["friends_list"]);
                                        if ($personfriendlist == "") {
                                            $personfriendlist = array();
                                        }
                                        $pendingfr = json_decode($getpersonuser["pfr"]);
                                        if ($pendingfr == "") {
                                            $pendingfr = array();
                                        }
                                        if (in_array($username, $pendingfr)) {
                                            echo "
                                            <form action='../tem_friendship.php' method='post'>
                                            <input type='hidden' value='".$getpersonuser["id"]."' name='personid'>
                                            <button type='submit' class='bg-danger btn-round-md ms-2 text-grey-700' title='Terminate Friend Request'><i class='feather-x font-md'></i></button>
                                            </form>";
                                        }
                                        $my_pfr = json_decode($getuser["pfr"]);
                                        if ($my_pfr == "") {
                                            $my_pfr = array();
                                        }
                                        if (in_array($getpersonuser["username"], $my_pfr)) {
                                            echo "
                                            <form action='../dec_friendship.php' method='post'>
                                            <input type='hidden' value='".$getpersonuser["id"]."' name='personid'>
                                            <button type='submit' class='bg-danger text-white btn-round-md ms-2 text-grey-700' title='Decline Friend Request'><i class='feather-x font-md'></i></button>
                                            </form>
                                            <form action='../acc_friendship.php' method='post'>
                                            <input type='hidden' value='".$getpersonuser["id"]."' name='personid'>
                                            <button type='submit' class='bg-success text-white btn-round-md ms-2 text-grey-700' title='Accept Friend Request'><i class='feather-check font-md'></i></button>
                                            </form>";
                                        }
                                        if (in_array($username,$personfriendlist)) {
                                            echo "
                                            <a href='javascript:void(0)' class='bg-greylight btn-round-md ms-2 text-grey-700'><i class='feather-user-check font-md' data-bs-toggle='tooltip' title=\"You're already friends\"></i></a>";
                                        }
                                        if ((!in_array($username,$personfriendlist)) && (!in_array($username, $pendingfr)) && (!in_array($getpersonuser["username"], $my_pfr))) {
                                            echo "
                                            <form action='../req_friendship.php' method='post'>
                                            <input type='hidden' value='".$getpersonuser["id"]."' name='personid'>
                                            <button type='submit' class='bg-lightgrey btn-round-md ms-2 text-grey-700' title='Send Friend Request'><i class='feather-user-plus font-md'></i></button>
                                            </form>";
                                        }
                                        ?>
                                        <li class='list-inline-item me-5'>
                                            <form action='../' method='post'>
                                            <input type='hidden' value='' name='receiver'>
                                            <li class='list-inline-item me-5'><button type='submit' class='ms-auto me-2 btn-round-md'><i class='feather-message-circle text-grey-900 font-sm btn-round-md bg-lightgrey-gradiant'></i></button></li>
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body d-block w-100 shadow-none mb-0 p-0 border-top-xs">
                                    <ul class="nav nav-tabs h55 d-flex border-bottom-0 ps-4" id="" role="tablist">
                                        <li class="active list-inline-item me-4"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block active" href="#about" data-bs-toggle="tab">About</a></li>
                                        <li class="list-inline-item me-4"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#groups" data-bs-toggle="tab">Groups</a></li>
                                        <li class="list-inline-item me-4"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#media" data-bs-toggle="tab">Media</a></li>
                                        <li class="list-inline-item me-4"><a class="fw-700 font-xssss text-grey-500 pt-3 pb-3 ls-1 d-inline-block" href="#friends" data-bs-toggle="tab">Friends (<?php echo count($personfriendlist); ?>) </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        
                        <div class="col-xl-4 col-xxl-3 col-lg-4 pe-0 tab-content">
                            <!-- About -->
                            <div id="about" class="card w-100 shadow-xss rounded-xxl border-0 mt-3 mb-3 tab-pane active">
                                
                                <div class='card-body d-block p-4'>
                                    <h4 class='fw-700 mb-3 font-xsss text-grey-900'>About</h4>
                                <?php
                                if ($getpersonuser["biograph"] != "") {
                                    echo "<p class='fw-500 text-grey-500 lh-24 font-xssss mb-0'>".$getpersonuser["biograph"]."</p>";
                                }
                                ?>
                                </div>
                                <div class="card-body d-flex pt-0">
                                    <i class="feather-eye text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-0">Profile Visbility <span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?php echo $getpersonpref["profile_visibility"]; ?></span></h4>
                                </div>
                                <div class="card-body d-flex pt-0"> 
                                    <i class="feather-map-pin text-grey-500 me-3 font-lg"></i>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?php echo $getpersonuser["residence"]; ?></h4>
                                </div>
                                <div class="card-body d-flex pt-0">
                                    <?php
                                    if ($getpersonuser["relationship"] != "") {
                                        echo "
                                        <i class='feather-users text-grey-500 me-3 font-lg'></i>
                                        <h4 class='fw-700 text-grey-900 font-xssss mt-1'>Relationship Status <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".$getpersonuser["relationship"]."</span></h4>";
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- Photos -->
                            <div id="media" class="card w-100 shadow-xss rounded-xxl border-0 mt-3 mb-3 tab-pane fade">
                                <div class="card-body d-flex align-items-center  p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Photos</h4>
                                    <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                <div class="card-body d-block pt-0 pb-2">
                                    <div class="row">
                                        <div class="col-6 mb-2 pe-1"><a href="../../images/e-2.jpg" data-lightbox="roadtrip"><img src="../../images/e-2.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                        <div class="col-6 mb-2 ps-1"><a href="../../images/e-3.jpg" data-lightbox="roadtrip"><img src="../../images/e-3.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                        <div class="col-6 mb-2 pe-1"><a href="../../images/e-4.jpg" data-lightbox="roadtrip"><img src="../../images/e-4.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                        <div class="col-6 mb-2 ps-1"><a href="../../images/e-5.jpg" data-lightbox="roadtrip"><img src="../../images/e-5.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                        <div class="col-6 mb-2 pe-1"><a href="../../images/e-2.jpg" data-lightbox="roadtrip"><img src="../../images/e-2.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                        <div class="col-6 mb-2 ps-1"><a href="../../images/e-1.jpg" data-lightbox="roadtrip"><img src="../../images/e-1.jpg" alt="image" class="img-fluid rounded-3 w-100"></a></div>
                                    </div>
                                </div>
                                <div class="card-body d-block w-100 pt-0">
                                    <a href="#" class="p-2 lh-28 w-100 d-block bg-grey text-grey-800 text-center font-xssss fw-700 rounded-xl"><i class="feather-external-link font-xss me-2"></i> More</a>
                                </div>
                            </div>
                            
                            <!-- Groups -->
                            <div id="groups" class="card w-100 shadow-xss rounded-xxl border-0 mt-3 mb-3 tab-pane fade">
                                <div class="card-body d-flex align-items-center  p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Groups</h4>
                                    <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                    <div class="bg-success me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">FEB</span>22</h4></div>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-2">Meeting with clients <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                </div>

                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                    <div class="bg-warning me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">APR</span>30</h4></div>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-2">Developer Programe <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                </div>

                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                    <div class="bg-primary me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">APR</span>23</h4></div>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-2">Aniversary Event <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                </div>
                                 
                            </div>
                            
                            <!-- Friends -->
                            <div id="friends" class="card w-100 shadow-xss rounded-xxl border-0 mt-3 mb-3 tab-pane fade">
                                <div class="card-body d-flex align-items-center  p-4">
                                    <h4 class="fw-700 mb-0 font-xssss text-grey-900">Friends</h4>
                                    <a href="#" class="fw-600 ms-auto font-xssss text-primary">See all</a>
                                </div>
                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                    <div class="bg-success me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">FEB</span>22</h4></div>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-2">Meeting with clients <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                </div>

                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                    <div class="bg-warning me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">APR</span>30</h4></div>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-2">Developer Programe <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                </div>

                                <div class="card-body d-flex pt-0 ps-4 pe-4 pb-3 overflow-hidden">
                                    <div class="bg-primary me-2 p-3 rounded-xxl"><h4 class="fw-700 font-lg ls-3 lh-1 text-white mb-0"><span class="ls-1 d-block font-xsss text-white fw-600">APR</span>23</h4></div>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-2">Aniversary Event <span class="d-block font-xsssss fw-500 mt-1 lh-4 text-grey-500">41 madison ave, floor 24 new work, NY 10010</span> </h4>
                                </div>
                                 
                            </div>
                        </div>


                        <div class="col-xl-8 col-xxl-9 col-lg-8">
                            
                            <?php
                            // This is where a modal for sharing/shared posts (url located posts) is suppose to be
                            $selectupd="SELECT * FROM news WHERE posterid='$personid' ORDER BY id DESC LIMIT $startid, $stopid";
                            $queryupd = mysqli_query($con, $selectupd);
                            $num_o_rows = mysqli_num_rows($queryupd);
                            ?>
                            <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                                <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                    <div class="d-flex justify-content-between stage">
                                        <?php
                                        if ($startid >= 20) {
                                            $new_startid = $startid - 20;
                                            $new_stopid = 20;
                                            echo "
                                            <form action='' method='get' style=''>
                                            <input type='hidden' name='startid' value='$new_startid'>
                                            <input type='hidden' name='stopid' value='$new_stopid'>
                                            <button style='height:40px;width:40px;border-radius:50%;float:left !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-left text-white'></span></button>
                                            </form>";
                                        }
                                        ?>
                                        <?php
                                        if ($num_o_rows > 0) {
                                            $new_startid = $startid + 20;
                                            $new_stopid = 20;
                                            echo "
                                            <form action='' method='get' style=''>
                                            <input type='hidden' name='startid' value='$new_startid'>
                                            <input type='hidden' name='stopid' value='$new_stopid'>
                                            <button style='height:40px;width:40px;border-radius:50%;float:right !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-right text-white'></span></button>
                                            </form>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php

                            while ($getupd = mysqli_fetch_assoc($queryupd)) {
                                $likes = str_word_count($getupd["likes"]);
                                if (stristr($getupd["likes"], " ".$username." ")) {
                                $like_status = "Unlike";
                                } else {
                                $like_status = "Like";
                                }
                                $dislikes = str_word_count($getupd["dislikes"]);
                                if (stristr($getupd["dislikes"], " ".$username." ")) {
                                $displaydis = "Revert";
                                } else {
                                $displaydis = "Dislike";
                                }
                                $getid = $getupd["posterid"];
                                $selectposter = "SELECT * FROM userdetails WHERE id='$getid'";
                                $queryposter = mysqli_query($con, $selectposter);
                                $getposter = mysqli_fetch_assoc($queryposter);

                                if ($getupd["postmedia"] == "") {
                                    echo "
                                    <div id='".$getupd["id"]."' class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                        <div class='card-body p-0 d-flex'>
                                            <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                <figure class='avatar me-3'><img src='../../profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer;' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                            </form>

                                            <h4 class='fw-700 text-grey-900 font-xssss mt-1'>".$getposter["firstname"]." ".$getposter["lastname"]." <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                        </div>
                                        <div class='card-body p-0 me-lg-5'>
                                            <p class='fw-500 text-grey-500 lh-26 font-xssss w-100 mt-2'>";
                                            if (strlen($getupd["post"]) > 200) {
                                                echo substr($getupd["post"],0,200)."...<a onclick=\"document.getElementById('seefull".$getupd["id"]."').style.display='block'\" style='cursor:pointer' class='fw-600 text-primary ms-2'>See more</a>";
                                            } else {
                                                echo $getupd["post"];
                                            }
                                            echo "</p>
                                        </div>
                                        <div class='card-body d-flex p-0 mt-3'>
                                            <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $like_status</a>
                                            <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                            <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                        </div>
                                    </div>
                                    ";
                                    
                                    echo "
                                    <div id='seefull".$getupd["id"]."' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                        <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                            <div class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                            
                                                <div class='modal-header'>
                                                    <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                        <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                        <figure class='avatar me-3'><img src='../../profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                    </form>
                                                    <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                    <button type='button' class='btn-close' onclick=\"document.getElementById('seefull".$getupd["id"]."').style.display='none'\"></button>
                                                </div>
                                                <div class='modal-body me-lg-5 mb-0'>
                                                    <p class='fw-500 text-grey-500 lh-26 font-xssss w-100 text-break'>".$getupd["post"]."</p>
                                                </div>
                                                <div class='modal-footer text-center'>
                                                    <div class='card-body d-flex p-0 mt-3'>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $like_status</a>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                    </div>
            
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                } else {
                                echo "
                                <div id='".$getupd["id"]."' class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                    <div class='card-body p-0 d-flex'>
                                        <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                            <input type='hidden' name='username' value='".$getposter["username"]."'>
                                            <figure class='avatar me-3'><img src='../../profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                        </form>

                                        <h4 class='fw-700 text-grey-900 font-xssss mt-1'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                    </div>
    
                                    <div class='card-body p-0 me-lg-5'>
                                        <p class='fw-500 text-grey-500 lh-26 font-xssss w-100'>";
                                        if (strlen($getupd["post"]) > 200) {
                                            echo substr($getupd["post"],0,200)."...<a onclick=\"document.getElementById('seefull".$getupd["id"]."').style.display='block'\" style='cursor:pointer' class='fw-600 text-primary ms-2'>See more</a>";
                                        } else {
                                            echo $getupd["post"];
                                        }
                                        
                                    echo "
                                    <div id='seefull".$getupd["id"]."' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                        <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                            <div class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                            
                                                <div class='modal-header'>
                                                    <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                        <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                        <figure class='avatar me-3'><img src='../../profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                    </form>
                                                    <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                    <button type='button' class='btn-close' onclick=\"document.getElementById('seefull".$getupd["id"]."').style.display='none'\"></button>
                                                </div>
                                                <div class='modal-body me-lg-5 mb-0'>
                                                    <p class='fw-500 text-grey-500 lh-26 font-xssss w-100 text-break'>".$getupd["post"]."</p>
                                                </div>
                                                <div class='modal-footer text-center'>
                                                    <div class='card-body d-flex p-0 mt-3'>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $like_status</a>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                    </div>
            
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                        echo "</p>
                                    </div>
                                    <div class='card-body d-block p-0'>
                                        <div class='row ps-2 pe-2 text-center'>";
                                        if (strstr($getupd["postmedia"], " <joinpostmedia/> ")) {
                                            $postmedia = $getupd["postmedia"];
                                            $arromed = explode(" <joinpostmedia/> ", $postmedia);
                                            foreach ($arromed as $key => $value) {
                                                $dot = explode('.',$value);
                                                $file_ext=strtolower(end($dot));
                                                if (($file_ext == "jpg") || ($file_ext == "png") || ($file_ext == "jpeg")) {
                                                    echo "<div onclick=\"document.getElementById('seefull$value').style.display='block'\" class='col-xs-4 col-sm-4 p-1'><img src='../../$value' class='rounded-3 w-100' alt='image'></div>";

                                                    echo "
                                                    <div id='seefull$value' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                                        <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                                            <div class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                                            
                                                                <div class='modal-header'>
                                                                    <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                                        <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                                        <figure class='avatar me-3'><img src='../../profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                                    </form>
                                                                    <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                                    <button type='button' class='btn-close' onclick=\"document.getElementById('seefull$value').style.display='none'\"></button>
                                                                </div>
                                                                <div class='modal-body mb-0'>
                                                                    <p class='fw-500 text-grey-500 lh-26 font-xssss w-100'>".$getupd["post"]."</p>
                                                                </div>
                                                                <div class='modal-body text-center'>
                                                                    <img src='../../$value' class='rounded-3 w-100' style='height: 250px; object-fit:contain'>
                                                                </div>
                                                                <div class='modal-footer text-center'>
                                                                    <div class='card-body d-flex p-0 mt-3'>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $like_status</a>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                                    </div>
                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                                } elseif (($file_ext == "mp4") || ($file_ext == "3gp") || ($file_ext == "mp3") || ($file_ext == "gif")) {
                                                    echo "<div class='col-xs-4 col-sm-4 p-1'><video onclick=\"document.getElementById('seefull$value').style.display='block'\" src='../../$value' class='rounded-3 w-100' alt='video'></video></div>";

                                                    echo "
                                                    <div id='seefull$value' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                                        <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                                            <div class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                                                <div class='modal-header'>
                                                                    <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                                        <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                                        <figure class='avatar me-3'><img src='../../profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                                    </form>
                                                                    <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                                    <button type='button' class='btn-close' onclick=\"document.getElementById('seefull$value').style.display='none'\"></button>
                                                                </div>
                                                                <div class='modal-body mb-0'>
                                                                    <p class='fw-500 text-grey-500 lh-26 font-xssss w-100'>".$getupd["post"]."</p>
                                                                </div>
                                                                <div class='modal-body text-center'>
                                                                    <video src='../../$value' class='rounded-3 w-100' style='height: 250px; object-fit:contain' controls></video>
                                                                </div>
                                                                <div class='modal-footer text-center'>
                                                                    <div class='card-body d-flex p-0 mt-3'>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $like_status</a>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                                    </div>
                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                                }
                                            }
                                        } else {
                                            $dot = explode('.',$getupd["postmedia"]);
                                            $file_ext=strtolower(end($dot));
                                            if (($file_ext == "jpg") || ($file_ext == "png") || ($file_ext == "jpeg")) {
                                                echo "
                                                <div class='col-sm-12 p-1 text-center'><img onclick=\"document.getElementById('seefull".$getupd["postmedia"]."').style.display='block'\" src='../../".$getupd["postmedia"]."' class='mx-auto rounded-3 w-100' style='height:250px; object-fit:contain;' alt='image'></div>";
                                                
                                                echo "
                                                <div id='seefull".$getupd["postmedia"]."' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                                    <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                                        <div class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                                            
                                                            <div class='modal-header'>
                                                                <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                                    <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                                    <figure class='avatar me-3'><img src='../../profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                                </form>
                                                                <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                                <button type='button' class='btn-close' onclick=\"document.getElementById('seefull".$getupd["postmedia"]."').style.display='none'\"></button>
                                                            </div>
                                                            <div class='modal-body mb-0'>
                                                                <p class='fw-500 text-grey-500 lh-26 font-xssss w-100'>".$getupd["post"]."</p>
                                                            </div>
                                                            <div class='modal-body text-center'>
                                                                <img src='../../".$getupd["postmedia"]."' class='rounded-3 w-100' style='height: 250px; object-fit:contain'>
                                                            </div>
                                                            <div class='modal-footer text-center'>
                                                                <div class='card-body d-flex p-0 mt-3'>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $like_status</a>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                                </div>
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                            } elseif (($file_ext == "mp4") || ($file_ext == "3gp") || ($file_ext == "mp3") || ($file_ext == "gif")) {
                                                echo "
                                                <div class='col-sm-12 p-1 text-center'><video onclick=\"document.getElementById('seefull".$getupd["postmedia"]."').style.display='block'\" src='../../".$getupd["postmedia"]."' class='rounded-3 w-100' style='height: 250px;object-fit:contain' alt='video'></video></div>";
                                                
                                                echo "
                                                <div id='seefull".$getupd["postmedia"]."' class='w3-modal' style='top: 50px !important; overflow-y:auto;'>
                                                    <div class='w3-modal-content w3-animate-zoom' style='background-color: rgb(0,0,0,0) !important'>
                                                        <div class='card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3'>
                                                        
                                                            <div class='modal-header'>
                                                                <form id='".$getupd["id"]."form' action='../search/profile/getprofile.php' method='post'>
                                                                    <input type='hidden' name='username' value='".$getposter["username"]."'>
                                                                    <figure class='avatar me-3'><img src='../../profile/".$getposter["profilepic"]."' style='width:45px; height:45px; border-radius:50%; object-fit:cover; cursor:pointer' alt='image' onclick=\"document.getElementById('".$getupd["id"]."form').submit()\" class='shadow-sm rounded-circle w45'></figure>
                                                                </form>
                                                                <h4 class='fw-700 text-grey-900 font-xssss'>".$getposter["firstname"]." ".$getposter["lastname"]."  <span class='d-block font-xssss fw-500 mt-1 lh-3 text-grey-500'>".time_ago($getupd["timepd"])."</span></h4>
                                                                <button type='button' class='btn-close' onclick=\"document.getElementById('seefull".$getupd["postmedia"]."').style.display='none'\"></button>
                                                            </div>
                                                            <div class='modal-body mb-0'>
                                                                <p class='fw-500 text-grey-500 lh-26 font-xssss w-100'>".$getupd["post"]."</p>
                                                            </div>
                                                            <div class='modal-body text-center'>
                                                                <video src='../../".$getupd["postmedia"]."' class='rounded-3 w-100' style='height: 250px; object-fit:contain' controls></video>
                                                            </div>
                                                            <div class='modal-footer text-center'>
                                                                <div class='card-body d-flex p-0 mt-3'>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $like_status</a>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                                                    <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                                                </div>
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";

                                            }
                                        }
                                        echo "
                                        </div>
                                    </div>
                                    
                                    <div class='card-body d-flex p-0 mt-3'>
                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:green !important'><i class='ti-thumb-up'></i>  $likes $like_status</a>
                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2' style='color:red !important'><i class='ti-thumb-down'></i>  $dislikes $displaydis</a>
                                        <a href='#' class='d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss'><i class='feather-message-circle text-dark text-grey-900 btn-round-sm font-lg'></i><span class='d-none-xss'>22 Comment</span></a>
                                    </div>

                                </div>";
                                }
                            }
                            
                            if ($num_o_rows == 0) {
                                echo "
                                <div class='card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3'>
                                    <div class='snippet mt-2 ms-auto me-auto' data-title='.dot-typing'>
                                        <div class='stage'>
                                            <h3 class='fw-700 text-grey-900 font-xssss'>There is nothing to see here...</h3>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                            ?>



                            <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                                <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                    <div class="d-flex justify-content-between stage">
                                        <?php
                                        if ($startid >= 20) {
                                            $new_startid = $startid - 20;
                                            $new_stopid = 20;
                                            echo "
                                            <form action='' method='get' style=''>
                                            <input type='hidden' name='startid' value='$new_startid'>
                                            <input type='hidden' name='stopid' value='$new_stopid'>
                                            <button style='height:40px;width:40px;border-radius:50%;float:left !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-left text-white'></span></button>
                                            </form>";
                                        }
                                        ?>
                                        <?php
                                        if ($num_o_rows > 0) {
                                            $new_startid = $startid + 20;
                                            $new_stopid = 20;
                                            echo "
                                            <form action='' method='get' style=''>
                                            <input type='hidden' name='startid' value='$new_startid'>
                                            <input type='hidden' name='stopid' value='$new_stopid'>
                                            <button style='height:40px;width:40px;border-radius:50%;float:right !important;' class='bg-current rounded-circle' style='border:none'><span class='ti-arrow-right text-white'></span></button>
                                            </form>";
                                        }
                                        ?>
                                    </div>
                                </div>
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
                                <img src="../../images/user-8.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="../../images/user-7.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Victor Exrixon</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="../../images/user-6.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Surfiya Zakir</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="../../images/user-5.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Goria Coast</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="../../images/user-4.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">4:09 pm</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="../../images/user-3.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">David Goria</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 days</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="../../images/user-2.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Seary Victor</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="../../images/user-12.png" alt="image" class="w35">
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

        <?php include "../../includes_nested/mobile_menu.php"; ?>

    </div> 

    <div class="modal bottom side fade" id="Modalstries" tabindex="-1" role="dialog" style=" overflow-y: auto;">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 bg-transparent">
                <button type="button" class="close mt-0 position-absolute top--30 right--10" data-dismiss="modal" aria-label="Close"><i class="ti-close text-white font-xssss"></i></button>
                <div class="modal-body p-0">
                    <div class="card w-100 border-0 rounded-3 overflow-hidden bg-gradiant-bottom bg-gradiant-top">
                        <div class="owl-carousel owl-theme dot-style3 story-slider owl-dot-nav nav-none">
                            <div class="item"><img src="../../images/story-5.jpg" alt="image"></div>
                            <div class="item"><img src="../../images/story-6.jpg" alt="image"></div>
                            <div class="item"><img src="../../images/story-7.jpg" alt="image"></div>
                            <div class="item"><img src="../../images/story-8.jpg" alt="image"></div>
                            
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
                        <img src="../../images/user-12.png" alt="image" class="w35 me-1">
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


    <script src="../../js/plugin.js"></script>
    <script src="../../js/lightbox.js"></script>
    <script src="../../js/scripts.js"></script>
    <script src="../../js/jquery.easypiechart.min.js"></script> 
    <script>
        $('.chart').easyPieChart({
            easing: 'easeOutElastic',
            delay: 3000,
            barColor: '#3498db',
            trackColor: '#aaa',
            scaleColor: false,
            lineWidth: 5,
            trackWidth: 5,
            size: 50,
            lineCap: 'round',
            onStep: function(from, to, percent) {
                this.el.children[0].innerHTML = Math.round(percent);
            }
        });
    </script> 
    
</body>

</html>

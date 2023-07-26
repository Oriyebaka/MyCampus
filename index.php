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

                    <?php require_once("partials/loader_wrapper.php") ?>
                    <div class="row feed-body">
                        <!-- Ads -->
                        <div class="col-xl-2 col-xxl-2 col-lg-2"></div>
                        <div class="col-xl-8 col-xxl-8 col-lg-8">

                            <?php require_once("partials/post_field.php"); ?>

                            <?php
                            $selectposts = "SELECT * FROM posts ORDER BY id DESC";
                            $queryposts = mysqli_query($con, $selectposts);
                            while ($getposts = mysqli_fetch_assoc($queryposts)) {
                            ?>
                            <div id="posts<?= $getposts["id"] ?>" class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3">
                                <div class="card-body p-0 d-flex">
                                    <figure class="avatar me-3 m-0"><img src="<?= ucwords(querytable($con, "users", "id", $getposts["userid"], "picture")) ?>" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?= ucwords(querytable($con, "users", "id", $getposts["userid"], "username")) ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?= time_ago(strtotime($getposts["datetime"])) ?></span></h4>
                                </div>
                                <div class="card-body p-0 me-lg-5 mt-2">
                                    <p class="fw-500 text-grey-500 lh-26 font-xssss w-100"><?= $getposts["post"] ?></p>
                                </div>
                                <div class="card-body d-flex p-0">
                                    <button class="likebtn emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2 border-0 bg-transparent"><i class="feather-heart me-2 btn-round-xs font-xss<?php
                                    if (in_array($getuser["username"], json_decode(unclean($getposts["likes"])))) {
                                        echo " text-white bg-red-gradiant";
                                    } ?>"></i><span><?php
                                    if (is_array(json_decode(unclean($getposts["likes"])))) {
                                        echo count(json_decode(unclean($getposts["likes"])))." Like";
                                        if (count(json_decode(unclean($getposts["likes"]))) > 1) {
                                            echo "s";
                                        }
                                    } else {
                                        echo "No Likes";
                                    }
                                    ?></span></button>
                                    <a href="#" class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"><i class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"></i><span class="d-none-xss">22 Comment</span></a>
                                </div>
                            </div>
                            <?php
                            }
                            ?>


                            <div class="card w-100 text-center shadow-xss rounded-xxl border-0 p-4 mb-3 mt-3">
                                <div class="snippet mt-2 ms-auto me-auto" data-title=".dot-typing">
                                    <div class="stage">
                                        <div class="dot-typing"></div>
                                    </div>
                                </div>
                            </div>


                        </div>               
                        <!-- Ads -->
                        <div class="col-xl-2 col-xxl-2 col-lg-2"></div>
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
    <script>
    const buttons = document.querySelectorAll('.likebtn');
    buttons.forEach(button => {
        button.addEventListener('click', function(event) {
            const postcard = event.currentTarget.closest('.card');
            console.log(postcard.id);
            const xhr = new XMLHttpRequest();
            const url = "func/like";
            const postid = postcard.id;
            const params = "post=" + postid;
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const likeicon = postcard.querySelector('i.feather-heart');
                    const response = xhr.responseText.split('_')[0];
                    if (response == "Liked") {
                        likeicon.classList.add('text-white');
                        likeicon.classList.add('bg-red-gradiant');
                    } else {
                        likeicon.classList.remove('text-white');
                        likeicon.classList.remove('bg-red-gradiant');
                    }
                    const count = button.querySelector('span');
                    count.innerHTML = xhr.responseText.split('_')[1];
                }
            };
            xhr.send(params);
        });
    });
    </script>

</body>
</html>
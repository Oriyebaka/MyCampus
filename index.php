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
                                    
                                    <figure class="avatar me-3 m-0 cursor-pointer" onclick="<?= "window.location.assign('u/".ucwords(querytable($con, "users", "id", $getposts["userid"], "username"))."');" ?>"><img src="<?= ucwords(querytable($con, "users", "id", $getposts["userid"], "picture")) ?>" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    <h4 class="fw-700 text-grey-900 font-xssss mt-1 cursor-pointer" onclick="<?= "window.location.assign('u/".ucwords(querytable($con, "users", "id", $getposts["userid"], "username"))."');" ?>"><?= ucwords(querytable($con, "users", "id", $getposts["userid"], "username")) ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?= time_ago(strtotime($getposts["datetime"])) ?></span></h4>
                                    <a href="#" class="ms-auto" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg" aria-labelledby="dropdownMenu2">
                                        <div class="card-body p-0 d-flex cursor-pointer">
                                            <i class="feather-flag text-grey-500 me-3 font-lg"></i>
                                            <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4">Report Post</h4>
                                        </div>
                                        <div class="card-body p-0 d-flex mt-2 cursor-pointer">
                                            <i class="feather-alert-circle text-grey-500 me-3 font-lg"></i>
                                            <h4 class="fw-600 text-grey-900 font-xssss mt-0 me-4" onclick="hidePost(<?= $getposts['id'] ?>)">Hide Post</h4>
                                        </div>
                                        <?php
                                        if ($getposts["userid"] == $userid) {
                                        ?>
                                        <div class="card-body p-0 d-flex mt-2 cursor-pointer">
                                            <i class="feather-trash text-danger me-3 font-lg"></i>
                                            <h4 class="fw-600 mb-0 text-danger font-xssss mt-0 me-4" onclick="deletePost(<?= $getposts['id'] ?>)">Delete Post</h4>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                if ($getposts["reply"] != "") {
                                    $selectreply = "SELECT * FROM posts WHERE id='".$getposts["reply"]."'";
                                    $queryreply = mysqli_query($con, $selectreply);
                                    if (mysqli_num_rows($queryreply) == 1) {
                                        $getreply = mysqli_fetch_assoc($queryreply);
                                ?>
                                <div class="card-body p-0 mt-3 position-relative">
                                    <blockquote class="blockquote pl-4 ps-3" style="border-left: 3px solid #1e74fd">
                                        <div class="card-body p-0 d-flex cursor-pointer" onclick="<?= "window.location.assign('u/".ucwords(querytable($con, "users", "id", $getreply["userid"], "username"))."');" ?>">
                                            <figure class="avatar me-2 m-0"><img src="<?= ucwords(querytable($con, "users", "id", $getreply["userid"], "picture")) ?>" alt="image" class="shadow-sm rounded-circle w30"></figure>
                                            <h4 class="fw-700 text-grey-900 font-xssss mt-1"><?= ucwords(querytable($con, "users", "id", $getreply["userid"], "username")) ?><span class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"><?= time_ago(strtotime($getreply["datetime"])) ?></span></h4>
                                        </div>
                                        <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">
                                        <?php
                                        $replyText = $getreply["post"];
                                        $maxWords = 20;
                                        $words = explode(' ', $replyText);
                                        if (count($words) > $maxWords) {
                                            echo implode(' ', array_slice($words, 0, $maxWords));
                                            echo '...';
                                            echo '<span class="full-text d-none">' . $replyText . '</span>';
                                            echo '<span class="see-more fw-600 text-primary ms-2 cursor-pointer">See more</span>';
                                        } else {
                                            echo $replyText;
                                        } 
                                        ?></p>
                                    </blockquote>
                                </div>
                                <?php
                                    } else {
                                    ?>
                                    <div class="card-body p-0 mt-3 position-relative">
                                        <blockquote class="blockquote pl-4 ps-3" style="border-left: 5px solid red; border-right:1px solid red; border-top:1px solid red; border-bottom:1px solid red">
                                            <p class="fw-500 text-danger lh-26 font-xssss w-100">This is resource is not available or may have been deleted</p>
                                        </blockquote>
                                    </div>
                                    <?php
                                        
                                    }
                                }
                                ?>
                                <div class="card-body p-0 me-lg-5 mt-2">
                                    <p class="fw-500 text-grey-500 lh-26 font-xssss w-100">
                                        <?php
                                        $postText = $getposts["post"];
                                        $maxWords = 20;
                                        $words = explode(' ', $postText);
                                        if (count($words) > $maxWords) {
                                            echo implode(' ', array_slice($words, 0, $maxWords));
                                            echo '...';
                                            echo '<span class="full-text d-none">' . $postText . '</span>';
                                            echo '<span class="see-more fw-600 text-primary ms-2 cursor-pointer">See more</span>';
                                        } else {
                                            echo $postText;
                                        } 
                                        ?>
                                    </p>

                                </div>
                                <div class="card-body d-flex p-0">
                                    <button class="likebtn emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2 border-0 bg-transparent"><i class="feather-heart me-2 btn-round-xs font-xss<?php
                                    $likesarr = explode("_", $getposts["likes"]);
                                    if (in_array($getuser["username"], $likesarr)) {
                                        echo " text-white bg-red-gradiant";
                                    } ?>"></i><span><?php
                                    $likes = explode("_", $getposts["likes"]);
                                    echo (count($likes)-1)." Like";
                                    if ((count($likes)-1) > 1) {
                                        echo "s";
                                    }
                                    ?></span></button>
                                    <button class="replybtn border-0 bg-transparent d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss reply-btn" data-bs-toggle="modal" data-bs-target="#replyModal" data-postid="posts<?= $getposts["id"] ?>">
                                        <i class="feather-message-square text-dark text-grey-900 btn-round-sm font-lg"></i>
                                        <span class="d-none-xss"><?= countreply($getposts["id"], $con) ?></span>
                                    </button>

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
    
    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="z-index: 1051;">
            <div class="modal-content bg-transparent">
                <form action="func/reply" method="post">
                    <div class="modal-body">
                        <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-5" style="max-height: 70vh; overflow-y: auto;">
                            <div class="card-body p-0">
                                <div class="modal-header">
                                    <div class="modal-title font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center">
                                        <i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Reply To
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="card-body p-0 mt-3 position-relative">
                                <blockquote class="blockquote pl-4 ps-3" style="border-left: 3px solid #1e74fd">
                                    <p id="replytxt" class="fw-500 text-grey-500 lh-26 font-xssss w-100"></p>
                                </blockquote>
                            </div>
                            <div class="card-body p-0 mt-3 position-relative">
                                <?php if (isset($getuser["picture"]) && !empty($getuser["picture"])): ?>
                                    <figure class="avatar position-absolute ms-2 mt-1 top-5">
                                        <img src="<?= $getuser["picture"] ?>" alt="image" class="shadow-sm rounded-circle w30" width="30px" height="30px" style="object-fit: cover; border-radius: 50%">
                                    </figure>
                                <?php endif; ?>
                                <input type="hidden" id="postIDInput" name="postid">
                                <textarea name="reply" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?" required></textarea>
                            </div>
                            <div class="card-body d-flex p-0 mt-0">
                                <button type="submit" class="text-center p-2 lh-20 w100 ms-auto ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white border-0">Reply</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="alert" class="alert alert-info fixed-bottom ms-3 mb-3 fade show" style="display: none; margin-bottom: 20px; width:400px;">
        <span id="alerttxt"></span>
        <button type="button" class="btn-close" style="float:right" data-bs-dismiss="alert"></button>
    </div>


<script src="js/plugin.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/scripts.js"></script>
<script>
    function callalert(alerttxt) {
        var callAlert = document.getElementById('alert');
        callAlert.style.display = 'block';
        setTimeout(function () {
        callAlert.style.display = 'none';
        }, 5000);
        callAlert.querySelector("span#alerttxt").innerHTML = alerttxt;
    }
    callalert("Hello, how are you doing today&nbsp;👋🖐.");
    function hidePost(postId) {
        document.getElementById("posts" + postId).remove();
        callalert("Post removed");
    }
    function deletePost(postId) {
        if (confirm("Are you sure you want to delete this post?")) {
            const xhr = new XMLHttpRequest();
            const url = "func/delete_post.php";
            const params = "post_id=" + postId;
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = xhr.responseText.trim();
                    if (response === "success") {
                        const postDiv = document.getElementById("posts" + postId);
                        callalert("Post Deleted.");
                        if (postDiv) {
                            postDiv.remove();
                        }
                    } else {
                        alert("Failed to delete the post. Please try again later.");
                    }
                }
            };
            xhr.send(params);
        }
    }
    const likebtns = document.querySelectorAll('.likebtn');
    likebtns.forEach(button => {
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
    const replyButtons = document.querySelectorAll('.reply-btn');
    replyButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const postID = button.dataset.postid;
            const replyModal = document.getElementById('replyModal');
            const replytxt = document.getElementById('replytxt');
            document.getElementById('postIDInput').value = postID;
            const postText = document.querySelector(`#${postID} .fw-500.text-grey-500.lh-26.font-xssss.w-100`).innerHTML;
            replytxt.innerHTML = postText;
        });
    });
    const seeMoreLinks = document.querySelectorAll('.see-more');
    seeMoreLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            const postText = event.target.previousElementSibling;
            const seeLessLink = event.target.previousElementSibling.previousElementSibling;
            
            if (postText.classList.contains('d-none')) {
                postText.classList.remove('d-none');
                seeLessLink.classList.remove('d-none');
                event.target.textContent = 'See less';
            } else {
                postText.classList.add('d-none');
                seeLessLink.classList.add('d-none');
                event.target.textContent = 'See more';
            }
        });
    });
    </script>

</body>
</html>
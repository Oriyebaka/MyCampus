<?php
require_once("session.php");
require_once("sql.php");
require_once("misc.php");
require_once("validate_login2.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post = nl2br(clean($_POST["post"]));
    if (($post != "") && strstr($post,"posts")) {
        $post = str_ireplace("posts", "", $post);
        $selectposts = "SELECT * FROM posts WHERE id='$post'";
        $queryposts = mysqli_query($con, $selectposts);
        if (mysqli_num_rows($queryposts) == 1) {
            $getposts = mysqli_fetch_assoc($queryposts);
            $likesarr = json_decode(unclean($getposts["likes"]), true);
            if (is_array($likesarr)) {
                if (in_array($getuser["username"], $likesarr)) {
                    // Unlike
                    $likesarr = array_diff($likesarr, [$getuser["username"]]);
                    $likesjson = json_encode($likesarr);
                    echo "Unliked";
                } else {
                    $likesarr[] = $getuser["username"];
                    $likesjson = json_encode($likesarr);
                    echo "Liked";
                }
            } else {
                $likesjson = json_encode([$getuser["username"]]);
            }
        } else {
            $likesjson = json_encode([$getuser["username"]]);
        }
        $likesjson = clean($likesjson);
        $updatepost = "UPDATE posts SET likes='$likesjson' WHERE id='$post'";
        if (mysqli_query($con, $updatepost)) {
            echo "_";
        } else {
            echo "Not Liked_";
        }
    } else {
            echo "Not Liked_";
    }
} else {
            echo "Not Liked_";
}
$selectposts = "SELECT * FROM posts WHERE id='$post'";
$queryposts = mysqli_query($con, $selectposts);
if (mysqli_num_rows($queryposts) == 1) {
    $getposts = mysqli_fetch_assoc($queryposts);
    if (is_array(json_decode(unclean($getposts["likes"])))) {
        echo count(json_decode(unclean($getposts["likes"])))." Like";
        if (count(json_decode(unclean($getposts["likes"]))) > 1) {
            echo "s";
        }
    } else {
        echo "No Likes";
    }
}
?>
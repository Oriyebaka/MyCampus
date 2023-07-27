<?php
require_once("session.php");
require_once("sql.php");
require_once("misc.php");
require_once("validate_login2.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post = clean($_POST["post"]);
    if (($post != "") && strstr($post,"posts")) {
        $post = str_ireplace("posts", "", $post);
        $selectposts = "SELECT * FROM posts WHERE id='$post'";
        $queryposts = mysqli_query($con, $selectposts);
        $likes = "";
        if (mysqli_num_rows($queryposts) == 1) {
            $getposts = mysqli_fetch_assoc($queryposts);
            if ($getposts["likes"] == "") {
                $likes = $getuser["username"]."_";
                echo "Liked";
            } else {
                $likesarr = explode("_", $getposts["likes"]);
                if (in_array($getuser["username"], $likesarr)) {
                    echo "Unliked";
                    $likes = str_replace($getuser["username"]."_", "", $getposts["likes"]);
                } else {
                    echo "Liked";
                    $likes = $getposts["likes"].$getuser["username"]."_";
                }
            }
            $updatepost = "UPDATE posts SET likes='$likes' WHERE id='$post'";
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
        $likes = explode("_", $getposts["likes"]);
        echo (count($likes)-1)." Like";
        if ((count($likes)-1) > 1) {
            echo "s";
        }
    }
} else {
    echo "Not Liked_";
}
?>
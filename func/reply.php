<?php
require_once("session.php");
require_once("sql.php");
require_once("misc.php");
require_once("validate_login2.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post = (clean($_POST["postid"]));
    $reply = nl2br(clean($_POST["reply"]));
    
    if (($post != "") && strstr($post,"posts")) {
        $post = str_ireplace("posts", "", $post);
        $selectposts = "SELECT * FROM posts WHERE id='$post'";
        $queryposts = mysqli_query($con, $selectposts);
        $likes = "";
        if (mysqli_num_rows($queryposts) == 1) {
            if ($reply != "") {
                $insertpost = "INSERT INTO posts (userid, reply, post) VALUES ('$userid', '$post', '$reply')";
                if (mysqli_query($con, $insertpost)) {
                    alert("", [], "../");
                } else {
                    alert("An error occured<br>Try again later", [], "../");
                }
            } else {
                alert("You can reply an empty text", [], "../");
            }
        } else {
            alert("An error occured connecting to server", [], "../");
        }
    } else {
        alert("An error occured connecting to server", [], "../");
    }
} else {
    alert("An error occured connecting to server", [], "../");
}
?>
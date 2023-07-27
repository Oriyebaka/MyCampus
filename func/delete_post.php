<?php
require_once("session.php");
require_once("sql.php");
require_once("misc.php");
require_once("validate_login2.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["post_id"])) {
        $postId = clean($_POST["post_id"]);
        $selectposts = "SELECT * FROM posts WHERE id='$postId'";
        $queryposts = mysqli_query($con, $selectposts);
        $likes = "";
        if (mysqli_num_rows($queryposts) == 1) {
            $getposts = mysqli_fetch_assoc($queryposts);
            if ($getposts["userid"] == $userid) {
                $deletePostQuery = "DELETE FROM posts WHERE id = '$postId'";
                if (mysqli_query($con, $deletePostQuery)) {
                    echo "success";
                } else {
                    echo "failed";
                }
            } else {
                echo "failed";
            }
        } else {
            echo "failed";
        }
    } else {
        echo "failed";
    }
}
?>
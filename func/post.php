<?php
require_once("session.php");
require_once("sql.php");
require_once("misc.php");
require_once("validate_login2.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post = nl2br(clean($_POST["post"]));
    if ($post != "") {
        $insertpost = "INSERT INTO posts (userid, post) VALUES ('$userid', '$post')";
        if (mysqli_query($con, $insertpost)) {
            alert("", [], "../");
        } else {
            alert("An error occured<br>Try again later", [], "../");
        }
    } else {
        alert("You can post an empty text", [], "../");
    }
} else {
    alert("An error occured connecting to server", [], "../");
}
?>
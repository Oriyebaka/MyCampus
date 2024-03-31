<?php
require "php_includes/sql_con.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $personid = $_POST["personid"];
    $selectperson = "SELECT username FROM userdetails WHERE id='$personid'";
    $queryperson = mysqli_query($con, $selectperson);
    $numperson = mysqli_num_rows($queryperson);
    if ($numperson > 0) {
        $getperson = mysqli_fetch_assoc($queryperson);
        if ($username == $getperson["username"]) {
            header("location: profile.php");
        } else {
            $_SESSION["personid"] = $personid;
            header("location: profile/".$getperson["username"]."/");
        }
    } else {
        header("location: ".$_SERVER["HTTP_REFERER"]);
    }
} else {
    header("location: ".$_SERVER["HTTP_REFERER"]);
}
?>
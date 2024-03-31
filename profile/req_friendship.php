<?php
require "../php_includes/sql_con.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $personid = $_POST["personid"];
    $selectpfr = "SELECT pfr FROM userdetails WHERE id='$personid'";
    $querypfr = mysqli_query($con, $selectpfr);
    $getpfr = mysqli_fetch_assoc($querypfr);
    $jsonpfr = json_decode($getpfr["pfr"]);
    if ($jsonpfr == "") {
        $jsonpfr = array();
    }
    array_push($jsonpfr, $username);
    $newpfr = json_encode($jsonpfr);
    $updatepfr = "UPDATE userdetails SET pfr='$newpfr' WHERE id='$personid'";
    mysqli_query($con, $updatepfr);
    
    // Sending notification to person
    
    $selectreceiver = "SELECT * FROM userdetails WHERE id='$personid'";
    $queryreceiver = mysqli_query($con, $selectreceiver);
    $getreceiver = mysqli_fetch_assoc($queryreceiver);

    $link = "profile/".$getreceiver["username"]."/";
    $msg = $getuser["firstname"] . " " . $getuser["lastname"] . " sent you a friend request";
    $now = time();
    $insertnot = "INSERT INTO notifications (userid, notifications, link, date_time) VALUES ('$personid', '$msg', '$link', '$now')";
    $querynot = mysqli_query($con, $insertnot);
    header("location:".$_SERVER["HTTP_REFERER"]);
}
?>
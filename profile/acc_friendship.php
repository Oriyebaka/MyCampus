<?php
require "../php_includes/sql_con.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $personid = $_POST["personid"];
    $selectpfr = "SELECT pfr FROM userdetails WHERE id='$personid'";
    $querypfr = mysqli_query($con, $selectpfr);
    $getpfr = mysqli_fetch_assoc($querypfr);
    if (stristr($getpfr["pfr"],"\"".$getuser["username"]. "\",")) {
        $newpfr = str_ireplace("\"".$getuser["username"] . "\",", "", $getpfr["pfr"]);
    } elseif (stristr($getpfr["pfr"],",\"".$getuser["username"]. "\"")) {
        $newpfr = str_ireplace(",\"".$getuser["username"] . "\"", "", $getpfr["pfr"]);
    } else {
        $newpfr = str_ireplace("\"".$getuser["username"] . "\"", "", $getpfr["pfr"]);
    }
    $updatepfr = "UPDATE userdetails SET pfr='$newpfr' WHERE id='$personid'";
    mysqli_query($con, $updatepfr);
    
    // Deleting notification from person
    $msg = $getuser["firstname"] . " " . $getuser["lastname"] . " sent you a friend request";
    
    $selectnot = "SELECT * FROM notifications WHERE notifications='$msg'";
    $querynot = mysqli_query($con, $selectnot);
    $num = mysqli_fetch_assoc($querynot);
    if ($num > 0) {
        $deletenot = "DELETE FROM notifications WHERE notifications='$msg'";
        mysqli_query($con, $deletenot);
    }
    

    // Add name to person friends_list
    $selectfr = "SELECT friends_list FROM userdetails WHERE id='$personid'";
    $queryfr = mysqli_query($con, $selectfr);
    $getfr = mysqli_fetch_assoc($queryfr);
    $jsonfr = json_decode($getpfr["friends_list"]);
    if ($jsonfr == "") {
        $jsonfr = array();
    }
    array_push($jsonfr, $username);
    $newfr = json_encode($jsonfr);
    $updatefr = "UPDATE userdetails SET friends_list='$newfr' WHERE id='$personid'";
    mysqli_query($con, $updatefr);

    // Add person to my friends_list
    $selectfr = "SELECT friends_list FROM userdetails WHERE id='$userid'";
    $queryfr = mysqli_query($con, $selectfr);
    $getfr = mysqli_fetch_assoc($queryfr);
    $jsonfr = json_decode($getpfr["friends_list"]);
    if ($jsonfr == "") {
        $jsonfr = array();
    }
    array_push($jsonfr, $getpfr["username"]);
    $newfr = json_encode($jsonfr);
    $updatefr = "UPDATE userdetails SET friends_list='$newfr' WHERE id='$userid'";
    mysqli_query($con, $updatefr);
}
header("location:".$_SERVER["HTTP_REFERER"]);
?>
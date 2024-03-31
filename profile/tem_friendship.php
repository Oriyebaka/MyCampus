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
    
    // Deleting notification to person
    $msg = $getuser["firstname"] . " " . $getuser["lastname"] . " sent you a friend request";
    
    $selectnot = "SELECT * FROM notifications WHERE notifications='$msg'";
    $querynot = mysqli_query($con, $selectnot);
    $num = mysqli_fetch_assoc($querynot);
    if ($num > 0) {
        $deletenot = "DELETE FROM notifications WHERE notifications='$msg'";
        mysqli_query($con, $deletenot);
    }
}
header("location:".$_SERVER["HTTP_REFERER"]);
?>
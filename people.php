<?php
require "../template/mysql_con.php";
$searchkey = $_POST["searchkeyword"];
$peoplearr = array();
$selectsearch = "SELECT id FROM userdetails WHERE firstname LIKE '%$searchkey%' || lastname LIKE '%$searchkey%' || username LIKE '%$searchkey%' ORDER BY id DESC";
$querysearch = mysqli_query($con,$selectsearch);
while ($getsearch = mysqli_fetch_assoc($querysearch)) {
    array_push($peoplearr,$getsearch["id"]);
}
$_SESSION["peoplearr"] = implode("-",$peoplearr);
$_SESSION["searchkey"] = $searchkey;
header("location: index.php");
?>
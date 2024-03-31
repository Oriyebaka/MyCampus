<?php
require "php_includes/sql_con.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo 1;
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phone = $_POST["phone"];
    $username = $_POST["email"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $residence = $_POST["residence"];
    $relationship = $_POST["relationship"];
    $biograph = $_POST["biograph"];
    $faculty = $_POST["faculty"];
    $updated = "UPDATE userdetails SET firstname='$firstname', lastname='$lastname', phone='$phone', email='$username', dayb='$day', monthb='$month', faculty='$faculty', residence='$residence', relationship='$relationship', biograph='$biograph' WHERE id='$userid' && username='$username'";
    if (mysqli_query($con, $updated)) {
        header("location: account-information.php");
    } else {
        header("location: account-information.php");
    }
} else {
    $_SESSION["error"] = "An unknown error occured";
    header("location: account-information.php");
}
?>
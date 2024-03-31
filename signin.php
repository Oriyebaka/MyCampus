<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "", "mycampus");
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $select = "SELECT id, username, pword FROM userdetails WHERE username='$username'";
    $query = mysqli_query($con, $select);
    $get = mysqli_fetch_assoc($query);
    if ($get["pword"]==$password) {
        $_SESSION["userid"] = $get["id"];
        $_SESSION["username"] = $get["username"];
        header("location: index.php");
    } else {
        $_SESSION["error"] = "Incorrect username or password";
        header("location: login.php");
    }
} else {
    $_SESSION["errror"] = "An unknown error occured";
    header("location: login.php");
}
?>
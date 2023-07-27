<?php
require_once("session.php");
require_once("sql.php");
require_once("misc.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ucwords(str_replace(' ', '', extraclean(clean($_POST["username"]))));
    $password = (clean($_POST["password"]));

    if (($username != "")) {
        // Check if account exists
        $selectuser = "SELECT * FROM users WHERE username='$username' || email='$username'";
        $queryuser = mysqli_query($con, $selectuser);
        $numuser = mysqli_num_rows($queryuser);
        if ($numuser == 1) {
            $getuser = mysqli_fetch_assoc($queryuser);
            if ($password == $getuser["password"]) {
                $userid = $getuser["id"];
                $loginkey = password_hash(time(), PASSWORD_BCRYPT);
                $_SESSION["userid"] = $userid;
                $_SESSION["loginkey"] = $loginkey;
                $insertloginkey = "UPDATE users SET loginkey='$loginkey' WHERE id='$userid'";
                if (mysqli_query($con, $insertloginkey)) {
                    alert("", "", "../");
                } else {
                    unset($_SESSION["userid"]);
                    unset($_SESSION["loginkey"]);
                    alert("An error occured", [$username], "../login");
                }
            } else {
                    alert("Invalid username and password combination", [$username], "../login");
            }
        } else {
            alert("Invalid username and password combination", [$username], "../login");
        }
    } else {
        alert("Please fill all fields", [$username], "../login");
    }
} else {
    alert("An error occured connecting to server", [$username], "../login");
}
?>
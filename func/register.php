<?php
require_once("session.php");
require_once("sql.php");
require_once("misc.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ucwords(str_replace(' ', '', extraclean(clean($_POST["username"]))));
    $email = extraclean(clean($_POST["email"]));
    $password = (clean($_POST["password"]));
    $confirm = (clean($_POST["confirm"]));

    if (($username != "") || ($email != "")) {
        if ($password == $confirm) {
            // Check for duplicate
            $selectuser = "SELECT username, email FROM users WHERE username='$username' || email='$email'";
            $queryuser = mysqli_query($con, $selectuser);
            $numuser = mysqli_num_rows($queryuser);
            if ($numuser == 0) {
                $insertuser = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
                if (mysqli_query($con, $insertuser)) {
                    alert(ucwords($username)." was created successfully", [], "../login");
                } else {
                    alert("An error occured when creating $username", [$username, $email], "../register");
                }
            } else {
                alert("The username: $username or email: $email is already taken...", [$username, $email], "../register");
            }
        } else {
            alert("The passwords do not match", [$username, $email], "../register");
        }
    } else {
        alert("Please fill all fields", [$username, $email], "../register");
    }
} else {
    alert("An error occured connecting to server", [$username, $email], "../register");
}
?>
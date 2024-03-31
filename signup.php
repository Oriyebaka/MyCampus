<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "", "mycampus");
    $firstname = ucfirst($_POST["firstname"]);
    $lastname = ucfirst($_POST["lastname"]);
    $phone = $_POST["phone"];
    $username = $_POST["email"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $gender = $_POST["gender"];
    $faculty = $_POST["faculty"];
    if (strstr($_POST["username"], " ")) {
        $username = str_replace(" ", "_", $_POST["username"]);
    } else {
        $username = $_POST["username"];
    }
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];
    $now = time();
    if ($password == $confirm) {
        //First check if the username already exists
        $selectuser = "SELECT username FROM userdetails WHERE username='$username'";
        $queryuser = mysqli_query($con, $selectuser);
        $numuser = mysqli_num_rows($queryuser);
        if ($numuser == 0) {
            //Check for multiple email
            $selectemail = "SELECT email FROM userdetails WHERE email='$username'";
            $queryemail = mysqli_query($con, $selectemail);
            $numemail = mysqli_num_rows($queryemail);
            if ($numemail == 0) {
                //Check for multiple phone number
                $selectphone = "SELECT phone FROM userdetails WHERE phone='$phone'";
                $queryphone = mysqli_query($con, $selectphone);
                $numphone = mysqli_num_rows($queryphone);
                if ($numphone == 0) {
                    $insert = "INSERT INTO userdetails (firstname, lastname, phone, gender, email, dayb, monthb, faculty, username, pword, regdate) VALUES('$firstname', '$lastname','$phone', '$gender', '$username', '$day', '$month', '$faculty', '$username', '$password', '$now')";
                    if (mysqli_query($con, $insert)) {
                        $selectid = "SELECT id, username FROM userdetails WHERE username='$username' && phone='$phone' && email='$username'";
                        $queryid = mysqli_query($con, $selectid);
                        $getid = mysqli_fetch_assoc($queryid);
                        $userid = $getid["id"];

                        $insertpref = "INSERT INTO preference (userid, last_update) VALUES('$userid', '$now')";
                        mysqli_query($con, $insertpref);
                        mkdir("profile/".$username);
                        mkdir("profile/".$username."/media");
                        $myfile = fopen("profile/".$username."/logs.txt", "w");
                        fclose($myfile);
                        $myfile = fopen("profile/".$username."/media/logs.txt", "w");
                        fclose($myfile);

                        copy("profile/profiletemp.php", "profile/$username/index.php");
                        copy("profile/change_color_theme.php", "profile/$username/change_color_theme.php");
                        copy("profile/change_darkmode.php", "profile/$username/change_darkmode.php");
                        copy("profile/change_menu_color.php", "profile/$username/change_menu_color.php");
                        copy("profile/change_menu_position.php", "profile/$username/change_menu_position.php");

                        $old_line = "\$personid = \$_SESSION[\"personid\"];";
                        $new_line = "\$personid = $userid;";
                        $contents = file_get_contents("profile/$username/index.php");
                        $new_contents= "";
                        if (strpos($contents, $old_line) !== false) {
                            $contents_array = preg_split("/\\r\\n|\\r|\\n/", $contents);
                            foreach ($contents_array as &$record) {
                                if (strpos($record, $old_line) !== false) {
                                    $new_contents .= $new_line;
                                }else{
                                    $new_contents .= $record . "\r";
                                }
                            }
                            file_put_contents("profile/$username/index.php", $new_contents);
                        }
                        
                        $_SESSION["userid"] = $getid["id"];
                        $_SESSION["username"] = $getid["username"];
                        $_SESSION["welcomemsg"] = "True";
                        header("location: account-information.php");
                    } else {
                        $_SESSION["error"] = "An error occured";
                        header("location: register.php");
                    }
                } else {
                    $_SESSION["error"] = "This phone number is already linked to an account";
                    header("location: register.php");
                }
            } else {
                $_SESSION["error"] = "This email is already linked to an account";
                header("location: register.php");
            }
        } else {
            $_SESSION["error"] = "An account already exist with this username";
            header("location: register.php");
        }
    } else {
        $_SESSION["error"] = "Passwords do not match";
        header("location: register.php");
    }
} else {
    $_SESSION["errror"] = "An unknown error occured";
    header("location: register.php");
}
?>
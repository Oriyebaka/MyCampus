<?php
require "php_includes/sql_con.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['profilepic'])){
        $file_name = $_FILES['profilepic']['name'];
        $file_path = "media/".$file_name;
        $file = "profile/".$username."/".$file_path;
        $save_path = $username."/".$file_path;
        $file_size = $_FILES['profilepic']['size'];
        $file_tmp = $_FILES['profilepic']['tmp_name'];
        $file_type = $_FILES['profilepic']['type'];
        $dot = explode('.',$file_name);
        $file_ext = strtolower(end($dot));
        $extensions = array("jpeg","jpg","png");
        if (in_array($file_ext,$extensions)){
            if (($file_size < (2*1024*1024)) && ($file_size >= 0)){
                move_uploaded_file($file_tmp, $file);
                $log = fopen($username."/media/logs.txt", "a");
                fwrite($log, "\n".$file."\n".time()."\n");
                fclose($log);
                $updated = "UPDATE userdetails SET profilepic='$save_path' WHERE id='$userid' && username='$username'";
                mysqli_query($con, $updated);
                header("location: profile.php");
            } else {
                $_SESSION["error"]="Sorry, file is too large";
                header("location: profile.php");
            }
        } else {
            $_SESSION["error"]="Sorry, the file format is not supported";
            header("location: profile.php");
        }
    } else {
        $_SESSION["error"]="Sorry, an error occured";
        header("location: profile.php");
    }
}
?>
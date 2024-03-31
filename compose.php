<?php
require "php_includes/sql_con.php";
$message = trim(nl2br(htmlspecialchars($_POST["message"])));
$now = time();
$files = NULL;
$file = NULL;
if (($message == "") && !isset($_FILES['mediafile']['name'])) {
  header("location: index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES['mediafile']["name"] != ""){
        $file_array = array_filter($_FILES['mediafile']['name']);
        $files = array();
        $error = 0;
        foreach ($file_array as $key => $value) {
            $file_name = $_FILES['mediafile']['name'][$key];
            $file_size = $_FILES['mediafile']['size'][$key];
            $file_tmp = $_FILES['mediafile']['tmp_name'][$key];
            $file_type = $_FILES['mediafile']['type'][$key];
            $file = "profile/".$username."/media/".$file_name;
            $dot = explode('.',$file_name);
            $file_ext = strtolower(end($dot));
            $extensions = array("jpeg","jpg","png","mp4","gif", "3gp", "mp3");
            if (count($_FILES["mediafile"]["name"]) <= 6) {
                if (in_array($file_ext,$extensions)){
                    if (!file_exists($file)) {
                        if (($file_size < (100*1024*1024)) && ($file_size >= 0)) {
                            move_uploaded_file($file_tmp, $file);
                            $log = fopen("profile/".$username."/media/logs.txt", "a");
                            fwrite($log, "\n".$file."\n".time()."\n");
                            fclose($log);
                            array_push($files, $file);
                        } else {
                            $error = 1;
                            $_SESSION["error"] =  "Sorry, your picture is too large";
                            header("location: index.php");
                        }
                    } else {
                        $error = 1;
                        $_SESSION["error"] =  "Sorry, a picture with your picture's name aleady exists in our database, try renaming your picture";
                        header("location: index.php");
                    }
                } else {
                    $error = 1;
                    $_SESSION["error"] = "Sorry, your picture type is not supported with our program. Use '.jpeg', '.jpg', '.png', '.gif', '.mp4', '.3gp' media formats";
                    header("location: index.php");
                }
            } else {
                $error = 1;
                $_SESSION["error"] = "Sorry, you exceeded the 6 files upload limit";
                header("location: index.php");
            }
        }
    } else {
        $error = 1;
        $_SESSION["error"] =  "Sorry, An error occured while uploading your file";
        header("location: index.php");
    }
    if ($error == 0) {
        if (count($files) > 1) {
            $mediafiles = implode(" <joinpostmedia/> ", $files);
        } else {
            $mediafiles = $file;
        }
        $insertupd = "INSERT INTO news (posterid, post, postmedia, timepd) VALUES('$userid', '$message', '$mediafiles', '$now')";
        if (mysqli_query($con, $insertupd)) {
            header("location: index.php");
        } else {
            header("location: index.php");
        }
    } else {
        header("location: index.php");
    }
} else {
}
?>
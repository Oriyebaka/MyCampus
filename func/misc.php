<?php
function clean($data) {
    return stripslashes(htmlspecialchars(trim($data), ENT_QUOTES | ENT_HTML5));
}function extraclean($data) {
    return str_replace(' ', '', ucwords($data));
}
function unclean($data) {
    return htmlspecialchars_decode(stripslashes($data));
}

function alert($alert_msg="", $form_data=[], $location="") {
    if ($alert_msg != "") {
        $_SESSION["alert"] = $alert_msg;
    }
    if ($form_data != []) {
        $_SESSION["form_data"] = $form_data;
    }
    if ($location != "") {
        header("location: $location");
    }
}
function querytable($connection, $table, $searchby, $searchbyvalue, $searchquery) {
    $selecttable = "SELECT * FROM $table WHERE $searchby='$searchbyvalue'";
    $querytable = mysqli_query($connection, $selecttable);
    if (mysqli_num_rows($querytable) == 1) {
        $value = mysqli_fetch_assoc($querytable)[$searchquery];
    } else {
        $value = "Cannot Find $table";
    }
    return $value;
}

function encrypt($data) {
    $encryptionKey = openssl_random_pseudo_bytes(32);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    $cipherText = openssl_encrypt($data, 'AES-256-CBC', $encryptionKey, OPENSSL_RAW_DATA, $iv);
    $encryptedData = $iv . $cipherText;
    return base64_encode($encryptedData);
}
function decrypt($encryptedData) {
    $encryptionKey = openssl_random_pseudo_bytes(32);
    $encryptedData = base64_decode($encryptedData);
    $ivLength = openssl_cipher_iv_length('AES-256-CBC');
    $iv = substr($encryptedData, 0, $ivLength);
    $cipherText = substr($encryptedData, $ivLength);
    $decryptedData = openssl_decrypt($cipherText, 'AES-256-CBC', $encryptionKey, OPENSSL_RAW_DATA, $iv);
    return $decryptedData;
}
function countreply($postid, $con) {
    $selectposts = "SELECT * FROM posts WHERE reply='$postid'";
    $queryposts = mysqli_query($con, $selectposts);
    if (mysqli_num_rows($queryposts) > 1) {
        $reply = "Replies";
    } else {
        $reply = "Reply";
    }
    return mysqli_num_rows($queryposts) ." ". $reply;
}
?>
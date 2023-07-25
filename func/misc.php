<?php
function clean($data) {
    return htmlspecialchars(str_replace("`", "\`", (str_replace("'", "\'", stripslashes(trim($data))))));
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
?>
<?php
require "php_includes/sql_con.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $color_theme = "color-theme-".$_POST["color_theme"];
    $updated = "UPDATE preference SET color_theme='$color_theme' WHERE userid='$userid'";
    mysqli_query($con, $updated);
}
?>
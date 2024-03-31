<?php
require "../../php_includes/sql_con.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menu_color = $_POST["menu_color"];
    $updated = "UPDATE preference SET header_bg='$menu_color' WHERE userid='$userid'";
    mysqli_query($con, $updated);
}
?>
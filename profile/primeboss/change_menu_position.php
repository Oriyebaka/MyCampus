<?php
require "../../php_includes/sql_con.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menu_position = $_POST["menu_position"];
    $updated = "UPDATE preference SET menu_pos='$menu_position' WHERE userid='$userid'";
    mysqli_query($con, $updated);
}
?>
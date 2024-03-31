<?php
require "../../php_includes/sql_con.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $darkmode = $_POST["darkmode"];
    $updated = "UPDATE preference SET dark_mode='$darkmode' WHERE userid='$userid'";
    mysqli_query($con, $updated);
}
?>
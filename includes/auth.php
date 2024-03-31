<?php
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["loginkey"])) {
	header("location: logout");
	$_SESSION["alert"] = "Session Expired";
	exit;
} else {
	$select_user = "SELECT * FROM users WHERE id='" . $_SESSION["user_id"] . "' && loginkey='" . $_SESSION["loginkey"] . "'";
	$query_user = mysqli_query($con, $select_user);
	if (mysqli_num_rows($query_user) != 1) {
		header("location: logout");
		$_SESSION["alert"] = "Session Expired";
		exit;
	}
	$get_user = mysqli_fetch_assoc($query_user);
}

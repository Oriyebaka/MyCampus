<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$select_user = "SELECT id, username, email, password FROM users
					WHERE username='$username' || email='$username'";
	$query_user = mysqli_query($con, $select_user);
	if (mysqli_num_rows($query_user) == 0) {
		$_SESSION["alert"] = "Cannot find account linked with that username or email.";
		header("location: login");
		exit;
	} else {
		$getuser = mysqli_fetch_assoc($query_user);
		if ($getuser["password"] != $password) {
			$_SESSION["alert"] = "Invalid Login Credentials";
			header("location: login");
			exit;
		} else {
			$loginkey = password_hash(time(), PASSWORD_BCRYPT);
			$login_user = "UPDATE users SET loginkey='$loginkey'
							WHERE username='$username' || email='$username'";
			$query_login = mysqli_query($con, $login_user);
			$_SESSION["loginkey"] = $loginkey;
			$_SESSION["user_id"] = $getuser["id"];
			if (isset($_SESSION["new_user"]) && $_SESSION["new_user"] == true) {
				header("location: get-started");
				unset($_SESSION["new_user"]);
			} else
				header("location: index");
			exit;
		}
	}
}

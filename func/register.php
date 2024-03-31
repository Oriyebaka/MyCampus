<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm = $_POST["confirm"];
	if ($password != $confirm) {
		$_SESSION["alert"] = "Passwords do not match";
		header("location: register");
		exit;
	} else {
		$select_duplicate = "SELECT id, username, email FROM users
							WHERE username='$username' || email='$email'";
		$query_duplicate = mysqli_query($con, $select_duplicate);
		if (mysqli_num_rows($query_duplicate) != 0) {
			$_SESSION["alert"] = "Username or Email is already in use.";
			header("location: register");
			exit;
		} else {
			$create_user = "INSERT INTO users (firstname, lastname, username, email, password)
							VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
			$query_user = mysqli_query($con, $create_user);
			$_SESSION["alert"] = "Your account has been created, please login to continue";
			$_SESSION["new_user"] = true;
			header("location: login");
			exit;
		}
	}
}

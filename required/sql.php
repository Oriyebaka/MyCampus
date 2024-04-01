
<?php
try {
	$host = "localhost";
	$user = "root";
	$pswd = "";
	$dbnm = "mycampus";
	$con = mysqli_connect($host, $user, $pswd, $dbnm);
} catch (Exception $e) {
	// Contains Database Error Messages
	echo '<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Error Page | My Campus</title>
		<link rel="stylesheet" href="css/themify-icons.css">
		<link rel="stylesheet" href="css/feather.css">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="color-theme-blue mont-font">
		<div class="preloader"></div>    
		<div class="main-wrapper">
			<div class="main-content pt-0 bg-white ps-0 pe-0">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6 col-md-8 text-center default-page vh-100 align-items-center d-flex">
							<div class="card border-0 text-center d-block p-0">
								<img src="images/bg-43.png" alt="icon" class="w200 mb-4 ms-auto me-auto pt-md-5">
								<h1 class="fw-700 text-grey-900 display3-size display4-md-size">Oops! our database connection fell off.</h1>
								<p class="text-grey-500 font-xsss">I am unable to connect to the database right now. I apologize for any inconvienence this may cause</p>
								<a href="index" class="p-3 w175 bg-current text-white d-inline-block text-center fw-600 font-xssss rounded-3 text-uppercase ls-3">retry?</a>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div> 
		
		<script src="js/plugin.js"></script>
		<script src="js/scripts.js"></script>
	
	</body>
	</html>';
	exit;
}

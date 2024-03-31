<?php
require_once "required/session.php";
require_once "required/sql.php";

// session_start();
// if (isset($_SESSION["userid"]) && isset($_SESSION["username"])) {
//     $con = mysqli_connect("localhost", "root", "", "mycampus");
//     $userid = $_SESSION["userid"];
//     $username = $_SESSION["username"];
//     $selectuser = "SELECT * FROM userdetails WHERE id='$userid' && username='$username'";
//     $queryuser = mysqli_query($con, $selectuser);
//     $numuser = mysqli_num_rows($queryuser);
//     if ($numuser == 1) {
//         header("location: index.php");
//     }
// }
// 
?>
<!DOCTYPE html>
<html lang="en">

<?php
const PAGE_TITLE = "Login";
include_once "includes/head.php";
include_once "includes/alert.php";


// Login Submission Form Handler
require_once "func/login.php";
?>

<body class="color-theme-blue">

    <div class="preloader"></div>

    <div class="main-wrap">

        <div class="nav-header bg-transparent shadow-none border-0">
            <div class="nav-top w-100" style="justify-content: start;">
                <a href="#"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span class="fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0" style="margin-right: auto">MyCampus</span></a>
            </div>


        </div>

        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(images/login-bg.jpg);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <form action="" method="post" class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-3">Login into <br>your account</h2>

                        <div class="form-group icon-input mb-3">
                            <i class="font-sm ti-email text-grey-500 pe-0"></i>
                            <input type="text" name="username" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Email Address" required>
                        </div>
                        <div class="form-group icon-input mb-1">
                            <input type="Password" name="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password" required>
                            <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                        </div>
                        <div class="form-check text-left mb-3">
                            <input type="checkbox" class="form-check-input mt-2" id="exampleCheck5">
                            <label class="form-check-label font-xsss text-grey-500" for="exampleCheck5">Remember me</label>
                            <a href="forgot" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a>
                        </div>

                        <div class="col-sm-12 p-0 text-left">
                            <div class="form-group mb-1"><button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Login</button></div>
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Dont have account <a href="register" class="fw-700 ms-1">Register</a></h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>
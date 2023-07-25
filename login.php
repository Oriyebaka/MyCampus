<?php
require_once("func/session.php");
require_once("func/sql.php");
require_once("func/misc.php");
if (isset($_SESSION["userid"]) && isset($_SESSION["loginkey"])) {
    $userid = $_SESSION["userid"];
    $loginkey = $_SESSION["loginkey"];
    $selectuser = "SELECT * FROM users WHERE id='$userid'";
    $queryuser = mysqli_query($con, $selectuser);
    $getuser = mysqli_fetch_assoc($queryuser);
    if ($loginkey == $getuser["loginkey"]) {
        alert("", [], "index");
    }
}
include("partials/alert.php");
$pagetitle = "Login - ";
include("partials/head.php");
?>

    <div class="preloader"></div>

    <div class="main-wrap">

        <div class="nav-header bg-transparent shadow-none border-0">
            <div class="nav-top w-100">
                <a href="login"><i class="feather-zap text-success me-2 ms-0 display1-size"></i><span class="fredoka-font ls-3 fw-600 text-current font-xxl mb-0">MyCampus.</span> </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(images/login-bg.jpg);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
                <div class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-3">Login into <br>your account</h2>
                        <form action="func/login" method="POST">

                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-user text-grey-500 pe-0"></i>
                                <input type="text" name="username" value="<?php if (isset($_SESSION["form_data"])) { echo $_SESSION["form_data"][0]; } ?>" class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600" placeholder="Your Username">                        
                            </div>
                            <div class="form-group icon-input mb-1">
                                <input type="Password" name="password" class="style2-input ps-5 form-control text-grey-900 font-xss ls-3" placeholder="Password">
                                <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                            </div>
                            <div class="form-check text-left mb-3">
                                <input type="checkbox" class="form-check-input mt-2" id="exampleCheck5">
                                <label class="form-check-label font-xsss text-grey-500" for="exampleCheck5">Remember me</label>
                                <a href="forgot" class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your Password?</a>
                            </div>
                            
                            <div class="col-sm-12 p-0 text-left">
                                <div class="form-group mb-1">
                                    <button type="submit" class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Login</button>
                                </div>
                                <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Dont have account <a href="register" class="fw-700 ms-1">Register</a></h6>
                            </div>
                        </form>
                         
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>

</html>
<?php
unset($_SESSION["form_data"]);
?>
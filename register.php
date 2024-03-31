<?php
require_once "required/session.php";
require_once "required/sql.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
const PAGE_TITLE = "Register";
include_once "includes/head.php";
include_once "includes/alert.php";


// Register Submission Form Handler
require_once "func/register.php";
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
            <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat" style="background-image: url(images/login-bg-2.jpg);"></div>
            <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3">
                <form action="" method="post" class="card shadow-none border-0 ms-auto me-auto login-card">
                    <div class="card-body rounded-0 text-left">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Create <br>your account</h2>
                        <div class="form-group input-group icon-input mb-3">
                            <i class="font-sm ti-user text-grey-500 pe-0"></i>
                            <input type="text" name="firstname" class="style-input ps-5 form-control text-grey-900 font-xss" placeholder="Firstname" required>
                            <i class="font-sm ti-user text-grey-500 pe-0"></i>
                            <input type="text" name="lastname" class="style-input ps-5 form-control text-grey-900 font-xss" placeholder="Lastname" required>
                        </div>
                        <div class="form-group icon-input mb-3">
                            <i class="font-sm ti-email text-grey-500 pe-0"></i>
                            <input type="email" name="email" class="style-input ps-5 form-control text-grey-900 font-xss" placeholder="Email Address" required>
                        </div>
                        <!-- <div class="form-group icon-input mb-3 mx-auto" style="display: inline-flex">
                                <div class="form-check" style="display: inline-flex">
                                    <input type="radio" class="form-check mx-3" id="" name="gender" value="Male" checked required>Male
                                    <label class="form-check-label" for=""></label>
                                    <input type="radio" class="form-check mx-3" id="" name="gender" value="Female" required>Female
                                    <label class="form-check-label" for=""></label>
                                </div>
                            </div>
                            <div class="form-group icon-input mb-3">
                                <i class="font-sm ti-book text-grey-500 pe-0"></i>
                                <select name="faculty" class="style2-input ps-5 form-select text-grey-900 font-xsss fw-600" id="faculty" required>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Humanities">Humanities</option>
                                    <option value="Law">Law</option>
                                    <option value="Science">Science</option>
                                    <option value="Social Sciences">Social Sciences</option>
                                </select>
                            </div> -->
                        <div class="form-group icon-input mb-3">
                            <i class="font-sm ti-user text-grey-500 pe-0"></i>
                            <input type="text" name="username" class="style-input ps-5 form-control text-grey-900 font-xss" placeholder="Username" required>
                        </div>
                        <div class="form-group icon-input mb-3">
                            <input type="Password" name="password" class="style-input ps-5 form-control text-grey-900 font-xss" placeholder="Password" required>
                            <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                        </div>
                        <div class="form-group icon-input mb-1">
                            <input type="Password" name="confirm" class="style-input ps-5 form-control text-grey-900 font-xss" placeholder="Confirm Password" required>
                            <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                        </div>
                        <div class="form-check text-left mb-3">
                            <input type="checkbox" class="form-check-input mt-2" id="tsandcs" required>
                            <label class="form-check-label font-xsss text-grey-500" for="">Accept Term and Conditions</label>
                        </div>

                        <div class="col-sm-12 p-0 text-left">
                            <div class="form-group mb-1"><button type="submit" class="form-control text-center style-input text-white fw-600 bg-dark border-0 p-0 ">Register</button></div>
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Already have account <a href="login" class="fw-700 ms-1">Login</a></h6>
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
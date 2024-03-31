<?php
require "php_includes/sql_con.php";
if (isset($_SESSION["welcomemsg"])) {
    echo "<script>alert(' Welcome to \"MyCampus-Social\" \\n\\n You can complete your profile here');</script>";
}
?>
<!-- html head here -->
<?php include "html_includes/html_head.php"; ?>
<!-- html head here -->

<body class="<?php echo $getpref["color_theme"]." ".$getpref["dark_mode"]; ?> mont-font">

    <div class="preloader"></div>

    
    <div class="main-wrapper">

        <!-- navigation top-->
        <?php include "html_includes/navigation_top.php"; ?>
        <!-- navigation top -->

        <!-- navigation left -->
        <?php include "html_includes/navigation_left.php"; ?>
        <!-- navigation left -->
        
        <!-- main content -->
        <!-- main content -->
        <div class="main-content <?php echo $getpref["menu_pos"]; ?> bg-lightblue theme-dark-bg right-chat-active">
            

            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="middle-wrap">
                        <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                            <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                                <a href="settings.php" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-white"></i></a>
                                <h4 class="font-xs text-white fw-600 ms-4 mb-0 mt-2">Account Details</h4>
                            </div>
                            <div class="card-body p-lg-5 p-4 w-100 border-0 ">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 text-center">
                                        <form id="form" enctype="multipart/form-data" action="changepic.php" method="POST">
                                            <figure class="avatar ms-auto me-auto mb-0 mt-2"><img src="<?php echo "profile/".$getuser["profilepic"]; ?>" alt="image" name="profilepic" class="shadow-sm rounded-circle" style="object-fit:cover;cursor: pointer; height:150px; width:150px;" id="profilepic"></figure>
                                            <input id="upload" type="file" name="profilepic" value="" onchange='document.getElementById("form").submit()' style="display:none"/>
                                        </form>
                                        <h2 class="fw-700 font-sm text-grey-900 mt-3"><?php echo $getuser["firstname"]." ".$getuser["lastname"]; ?></h2>
                                        <h4 class="text-grey-500 fw-500 mb-3 font-xsss mb-4"><?php echo "@".$getuser["username"]; ?></h4>    
                                        <!-- <a href="#" class="p-3 alert-primary text-primary font-xsss fw-500 mt-2 rounded-3">Upload New Photo</a> -->
                                    </div>
                                </div>

                                <form action="edit.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">First Name</label>
                                                <input type="text" name="firstname" class="form-control search-bar" value="<?php echo $getuser["firstname"]; ?>">
                                            </div>        
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Last Name</label>
                                                <input type="text" name="lastname" class="form-control search-bar" value="<?php echo $getuser["lastname"]; ?>">
                                            </div>        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Email</label>
                                                <input type="email" name="email" class="form-control search-bar" value="<?php echo $getuser["email"]; ?>">
                                            </div>        
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Phone</label>
                                                <input type="tel" name="phone" class="form-control search-bar" value="<?php echo $getuser["phone"]; ?>">
                                            </div>        
                                        </div>
                                        
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Day</label>
                                                <input type="number" min="1" max="31" name="day" class="form-control search-bar" value="<?php echo $getuser["dayb"]; ?>">
                                            </div>        
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Month</label>
                                                <select name="month" class="form-control form-select search-bar" id="month" required>
                                                    <option value='January'
                                                    <?php
                                                    if ($getuser["monthb"] == "January") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >January</option>
                                                    <option value='Febuary'
                                                    <?php
                                                    if ($getuser["monthb"] == "Febuary") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >Febuary</option>
                                                    <option value='March'
                                                    <?php
                                                    if ($getuser["monthb"] == "March") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >March</option>
                                                    <option value='April'
                                                    <?php
                                                    if ($getuser["monthb"] == "April") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >April</option>
                                                    <option value='May'
                                                    <?php
                                                    if ($getuser["monthb"] == "May") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >May</option>
                                                    <option value='June'
                                                    <?php
                                                    if ($getuser["monthb"] == "June") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >June</option>
                                                    <option value='July'
                                                    <?php
                                                    if ($getuser["monthb"] == "July") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >July</option>
                                                    <option value='August'
                                                    <?php
                                                    if ($getuser["monthb"] == "August") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >August</option>
                                                    <option value='September'
                                                    <?php
                                                    if ($getuser["monthb"] == "September") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >September</option>
                                                    <option value='October'
                                                    <?php
                                                    if ($getuser["monthb"] == "October") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >October</option>
                                                    <option value='November'
                                                    <?php
                                                    if ($getuser["monthb"] == "November") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >November</option>
                                                    <option value='December'
                                                    <?php
                                                    if ($getuser["monthb"] == "December") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >December</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Faculty</label>
                                                <select name="faculty" class="form-control form-select search-bar" id="faculty" required>
                                                    <option value='Agriculture'
                                                    <?php
                                                    if ($getuser["faculty"] == "Agriculture") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >Agriculture</option>

                                                    <option value='College of Medical Sciences'
                                                    <?php
                                                    if ($getuser["faculty"] == "College of Medical Sciences") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >College of Medical Sciences</option>

                                                    <option value='Education'
                                                    <?php
                                                    if ($getuser["faculty"] == "Education") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >Education</option>

                                                    <option value='Engineering'
                                                    <?php
                                                    if ($getuser["faculty"] == "Engineering") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >Engineering</option>

                                                    <option value='Environmental Sciences'
                                                    <?php
                                                    if ($getuser["faculty"] == "Environmental Sciences") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >Environmental Sciences</option>

                                                    <option value='Humanities'
                                                    <?php
                                                    if ($getuser["faculty"] == "Humanities") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >Humanities</option>

                                                    <option value='Law'
                                                    <?php
                                                    if ($getuser["faculty"] == "Law") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >Law</option>
                                                    <option value='Management Science'
                                                    <?php
                                                    if ($getuser["faculty"] == "Management Science") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >Management Science</option>

                                                    <option value='Science'
                                                    <?php
                                                    if ($getuser["faculty"] == "Science") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >Science</option>

                                                    <option value='Social Sciences'
                                                    <?php
                                                    if ($getuser["faculty"] == "Social Sciences") {
                                                        echo "selected";
                                                    }
                                                    ?>
                                                    >Social Sciences</option>
                                                </select>
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Residence</label>
                                                <?php
                                                if ($getuser["residence"] == "Hostel F") {
                                                    echo "
                                                    <select name='residence' class='form-select'>
                                                        <option value='Hostel F' selected>Hostel F</option>
                                                        <option value='Hostel G'>Hostel G</option>
                                                        <option value='NDDC'>NDDC</option>
                                                        <option value='Hostel H'>Hostel H</option>
                                                        <option value='Hostel E'>Hostel E</option>
                                                        <option value='Hostel D'>Hostel D</option>
                                                        <option value='Hostel C'>Hostel C</option>
                                                        <option value='Hostel B'>Hostel B</option>
                                                        <option value='Old Site'>Old Site</option>
                                                        <option value='Off Campus'>Off Campus</option>
                                                    </select>";
                                                } elseif ($getuser["residence"] == "Hostel G") {
                                                    echo "
                                                    <select name='residence' class='form-select'>
                                                        <option value='Hostel F'>Hostel F</option>
                                                        <option value='Hostel G' selected>Hostel G</option>
                                                        <option value='NDDC'>NDDC</option>
                                                        <option value='Hostel H'>Hostel H</option>
                                                        <option value='Hostel E'>Hostel E</option>
                                                        <option value='Hostel D'>Hostel D</option>
                                                        <option value='Hostel C'>Hostel C</option>
                                                        <option value='Hostel B'>Hostel B</option>
                                                        <option value='Old Site'>Old Site</option>
                                                        <option value='Off Campus'>Off Campus</option>
                                                    </select>";
                                                } elseif ($getuser["residence"] == "NDDC") {
                                                    echo "
                                                    <select name='residence' class='form-select'>
                                                        <option value='Hostel F'>Hostel F</option>
                                                        <option value='Hostel G'>Hostel G</option>
                                                        <option value='NDDC' selected>NDDC</option>
                                                        <option value='Hostel H'>Hostel H</option>
                                                        <option value='Hostel E'>Hostel E</option>
                                                        <option value='Hostel D'>Hostel D</option>
                                                        <option value='Hostel C'>Hostel C</option>
                                                        <option value='Hostel B'>Hostel B</option>
                                                        <option value='Old Site'>Old Site</option>
                                                        <option value='Off Campus'>Off Campus</option>
                                                    </select>";
                                                } elseif ($getuser["residence"] == "Hostel H") {
                                                    echo "
                                                    <select name='residence' class='form-select'>
                                                        <option value='Hostel F'>Hostel F</option>
                                                        <option value='Hostel G'>Hostel G</option>
                                                        <option value='NDDC'>NDDC</option>
                                                        <option value='Hostel H' selected>Hostel H</option>
                                                        <option value='Hostel E'>Hostel E</option>
                                                        <option value='Hostel D'>Hostel D</option>
                                                        <option value='Hostel C'>Hostel C</option>
                                                        <option value='Hostel B'>Hostel B</option>
                                                        <option value='Old Site'>Old Site</option>
                                                        <option value='Off Campus'>Off Campus</option>
                                                    </select>";
                                                } elseif ($getuser["residence"] == "Hostel E") {
                                                    echo "
                                                    <select name='residence' class='form-select'>
                                                        <option value='Hostel F'>Hostel F</option>
                                                        <option value='Hostel G'>Hostel G</option>
                                                        <option value='NDDC'>NDDC</option>
                                                        <option value='Hostel H'>Hostel H</option>
                                                        <option value='Hostel E' selected>Hostel E</option>
                                                        <option value='Hostel D'>Hostel D</option>
                                                        <option value='Hostel C'>Hostel C</option>
                                                        <option value='Hostel B'>Hostel B</option>
                                                        <option value='Old Site'>Old Site</option>
                                                        <option value='Off Campus'>Off Campus</option>
                                                    </select>";
                                                } elseif ($getuser["residence"] == "Hostel C") {
                                                    echo "
                                                    <select name='residence' class='form-select'>
                                                        <option value='Hostel F'>Hostel F</option>
                                                        <option value='Hostel G'>Hostel G</option>
                                                        <option value='NDDC'>NDDC</option>
                                                        <option value='Hostel H'>Hostel H</option>
                                                        <option value='Hostel E'>Hostel E</option>
                                                        <option value='Hostel D'>Hostel D</option>
                                                        <option value='Hostel C' selected>Hostel C</option>
                                                        <option value='Hostel B'>Hostel B</option>
                                                        <option value='Old Site'>Old Site</option>
                                                        <option value='Off Campus'>Off Campus</option>
                                                    </select>";
                                                } elseif ($getuser["residence"] == "Hostel B") {
                                                    echo "
                                                    <select name='residence' class='form-select'>
                                                        <option value='Hostel F'>Hostel F</option>
                                                        <option value='Hostel G' selected>Hostel G</option>
                                                        <option value='NDDC'>NDDC</option>
                                                        <option value='Hostel H'>Hostel H</option>
                                                        <option value='Hostel E'>Hostel E</option>
                                                        <option value='Hostel D'>Hostel D</option>
                                                        <option value='Hostel C'>Hostel C</option>
                                                        <option value='Hostel B' selected>Hostel B</option>
                                                        <option value='Old Site'>Old Site</option>
                                                        <option value='Off Campus'>Off Campus</option>
                                                    </select>";
                                                } elseif ($getuser["residence"] == "Old Site") {
                                                    echo "
                                                    <select name='residence' class='form-select'>
                                                        <option value='Hostel F'>Hostel F</option>
                                                        <option value='Hostel G' selected>Hostel G</option>
                                                        <option value='NDDC'>NDDC</option>
                                                        <option value='Hostel H'>Hostel H</option>
                                                        <option value='Hostel E'>Hostel E</option>
                                                        <option value='Hostel D'>Hostel D</option>
                                                        <option value='Hostel C'>Hostel C</option>
                                                        <option value='Hostel B'>Hostel B</option>
                                                        <option value='Old Site'selected>Old Site</option>
                                                        <option value='Off Campus'>Off Campus</option>
                                                    </select>";
                                                } else {
                                                    echo "
                                                    <select name='residence' class='form-select'>
                                                        <option value='Hostel F'>Hostel F</option>
                                                        <option value='Hostel G' selected>Hostel G</option>
                                                        <option value='NDDC'>NDDC</option>
                                                        <option value='Hostel H'>Hostel H</option>
                                                        <option value='Hostel E'>Hostel E</option>
                                                        <option value='Hostel D'>Hostel D</option>
                                                        <option value='Hostel C'>Hostel C</option>
                                                        <option value='Hostel B'>Hostel B</option>
                                                        <option value='Old Site'>Old Site</option>
                                                        <option value='Off Campus' selected>Off Campus</option>
                                                    </select>";
                                                }
                                                ?>
                                            </div>        
                                        </div>
                                        
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="mont-font fw-600 font-xsss">Relationship</label>
                                                <?php
                                                if ($getuser["relationship"] == "Prefer not to say") {
                                                    echo "
                                                    <select name='relationship' class='form-select'>
                                                        <option value='Single'>Single</option>
                                                        <option value='Dating'>Dating</option>
                                                        <option value='Married'>Married</option>
                                                        <option value='Prefer not to say' selected>Prefer not to say</option>
                                                    </select>";
                                                } elseif ($getuser["relationship"] == "Dating") {
                                                    echo "
                                                    <select name='relationship' class='form-select'>
                                                        <option value='Single'>Single</option>
                                                        <option value='Dating' selected>Dating</option>
                                                        <option value='Married'>Married</option>
                                                        <option value='Prefer not to say'>Prefer not to say</option>
                                                    </select>";
                                                } elseif ($getuser["relationship"] == "Married") {
                                                    echo "
                                                    <select name='relationship' class='form-select'>
                                                        <option value='Single'>Single</option>
                                                        <option value='Dating'>Dating</option>
                                                        <option value='Married' selected>Married</option>
                                                        <option value='Prefer not to say'>Prefer not to say</option>
                                                    </select>";
                                                } else {
                                                    echo "
                                                    <select name='relationship' class='form-select'>
                                                        <option value='Single' selected>Single</option>
                                                        <option value='Dating'>Dating</option>
                                                        <option value='Married'>Married</option>
                                                        <option value='Prefer not to say'>Prefer not to say</option>
                                                    </select>";
                                                }
                                                ?>
                                            </div>        
                                        </div>

                                        <div class="col-lg-12 mb-3">
                                            <label class="mont-font fw-600 font-xsss search-bar">Biograph</label>
                                            <textarea name="biograph" class="form-control search-bar mb-0 p-3 h100 lh-16" rows="5" placeholder="Write a biograph about your self..." spellcheck="false"><?php echo $getuser["biograph"]; ?></textarea>
                                        </div>

                                        <div class="col-lg-12">
                                            <button type="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- <div class="card w-100 border-0 p-2"></div> -->
                    </div>
                </div>
                 
            </div>            
        </div>
        <!-- main content -->

                <!-- right chat -->
        <div class="right-chat nav-wrap mt-2 right-scroll-bar">
            <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                <!-- loader wrapper -->
                <div class="preloader-wrap p-3">
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer mb-3">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                    <div class="box shimmer">
                        <div class="lines">
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                            <div class="line s_shimmer"></div>
                        </div>
                    </div>
                </div>
                <!-- loader wrapper -->

                <div class="section full pe-3 ps-4 pt-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">CONTACTS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-8.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge badge-primary text-white badge-pill fw-500 mt-0">2</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-7.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Victor Exrixon</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-6.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Surfiya Zakir</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-5.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Goria Coast</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-4.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Hurin Seary</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">4:09 pm</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-3.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">David Goria</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 days</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-2.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Seary Victor</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            <figure class="avatar float-left mb-0 me-2">
                                <img src="images/user-12.png" alt="image" class="w35">
                            </figure>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Ana Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
                </div>
                <div class="section full pe-3 ps-4 pt-4 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">GROUPS</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Studio Express</a>
                            </h3>
                            <span class="badge mt-0 text-grey-500 badge-pill pe-0 font-xsssss">2 min</span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany Design</a>
                            </h3>
                            <span class="bg-warning ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-mini-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">De fabous</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                    </ul>
                </div>
                <div class="section full pe-3 ps-4 pt-0 pb-4 position-relative feed-body">
                    <h4 class="font-xsssss text-grey-500 text-uppercase fw-700 ls-3">Pages</h4>
                    <ul class="list-group list-group-flush">
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-primary-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Armany Seary</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        <li class="bg-transparent list-group-item no-icon pe-0 ps-0 pt-2 pb-2 border-0 d-flex align-items-center">
                            
                            <span class="btn-round-sm bg-gold-gradiant me-3 ls-3 text-white font-xssss fw-700">UD</span>
                            <h3 class="fw-700 mb-0 mt-0">
                                <a class="font-xssss text-grey-600 d-block text-dark model-popup-chat" href="#">Entropio Inc</a>
                            </h3>
                            <span class="bg-success ms-auto btn-round-xss"></span>
                        </li>
                        
                    </ul>
                </div>

            </div>
        </div>

        
        <!-- right chat -->
        <?php include "html_includes/mobile_menu.php"; ?>


        <div class="app-header-search">
            <form class="search-form">
                <div class="form-group searchbox mb-0 border-0 p-1">
                    <input type="text" class="form-control border-0" placeholder="Search...">
                    <i class="input-icon">
                        <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                    </i>
                    <a href="#" class="ms-1 mt-1 d-inline-block close searchbox-close">
                        <i class="ti-close font-xs"></i>
                    </a>
                </div>
            </form>
        </div>

    </div> 


    <script src="js/plugin.js"></script>
    <script src="js/scripts.js"></script>
    
</body>


<!-- Mirrored from uitheme.net/sociala/account-information.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Apr 2022 22:59:41 GMT -->
</html>
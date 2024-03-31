<?php
echo "
<nav class='navigation ".$getpref["menu_pos"]." ".$getpref["header_bg"]." scroll-bar' style='overflow-y:auto !important'>
    <div class='container ps-0 pe-0'>
        <div class='nav-content'>
            <div class='nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2'>
                <div class='nav-caption fw-600 font-xssss text-grey-500'><span>New </span>Feeds</div>
                <ul class='mb-1 top-content'>
                    <li class='logo d-none d-xl-block d-lg-block'></li>
                    <li><a href='index.php' class='nav-content-bttn open-font' ><i class='feather-tv btn-round-md bg-blue-gradiant me-3'></i><span>Newsfeed</span></a></li>
                    <li><a href='messages.php' class='nav-content-bttn open-font' ><i class='feather-message-square btn-round-md bg-primary-gradiant me-3'></i><span>Chat</span></a></li>
                    <li><a href='notification.php' class='nav-content-bttn open-font' ><i class='feather-bell btn-round-md bg-mini-gradiant me-3'></i><span>Notifications</span></a></li>
                    <li><a href='group.php' class='nav-content-bttn open-font' ><i class='feather-zap btn-round-md bg-red-gradiant me-3'></i><span>Groups</span></a></li> 
                    <li><a href='research.php' class='nav-content-bttn open-font' ><i class='feather-globe btn-round-md bg-gold-gradiant me-3'></i><span>Project & Research</span></a></li>
                    <li><a href='garage.php' class='nav-content-bttn open-font' ><i class='feather-shopping-cart btn-round-md bg-mini-gradiant me-3'></i><span>Garage</span></a></li> 
                </ul>
            </div>
            <div class='nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1'>
                <div class='nav-caption fw-600 font-xssss text-grey-500'><span></span> Account</div>
                <ul class='mb-1'>
                    <li class='logo d-none d-xl-block d-lg-block'></li>
                    <li><a href='settings.php' class='nav-content-bttn open-font h-auto pt-2 pb-2'><i class='font-sm feather-settings animation-spin me-3 text-grey-500'></i><span>Settings</span></a></li>
                    <li><a href='logout.php' class='nav-content-bttn open-font h-auto pt-2 pb-2'><i class='font-sm feather-power me-3 text-grey-500' style='color:red !important'></i><span style='color:red !important'>Logout</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>";
?>
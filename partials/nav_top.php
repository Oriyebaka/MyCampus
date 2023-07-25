<!-- navigation top-->
<div class="nav-header bg-white shadow-xs border-0">
    <div class="nav-top">
        <a href="index"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">MyCampus.</span> </a>
        <!-- Mobile Menu -->
        <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
        <a href="default-video.html" class="mob-menu me-2"><i class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
        <a href="#" class="me-2 menu-search-icon mob-menu"><i class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
        <button class="nav-menu me-0 ms-2"></button>
        <!-- Mobile Menu -->
    </div>
    
    <form action="func/search" class="float-left header-search">
        <div class="form-group mb-0 icon-input">
            <i class="feather-search font-sm text-grey-400"></i>
            <input type="text" placeholder="Start typing to search.." class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg">
        </div>
    </form>

    <a href="index" class="p-2 text-center ms-auto menu-icon"><i class="feather-home font-xl text-current"></i></a>
    <a href="notifications" class="p-2 text-center ms-3 menu-icon"><span class="dot-count bg-warning"></span><i class="feather-bell font-xl text-current"></i></a>
    <a href="message" class="p-2 text-center ms-3 menu-icon chat-active-btn"><span class="dot-count bg-warning"></span><i class="feather-message-square font-xl text-current"></i></a>
    <a href="garage" class="p-2 text-center ms-3 menu-icon center-menu-icon"><i class="feather-shopping-cart font-xl text-current"></i></a>
    <a href="u/<?= $getuser["username"] ?>" class="p-0 ms-3 menu-icon"><img src="<?= $getuser["picture"] ?>" alt="<?= $getuser["id"] ?>" style="object-fit:cover; border-radius:50%;" height="40px" width="40px"></a>
    
</div>
<!-- navigation top -->
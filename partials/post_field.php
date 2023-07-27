<form action="func/post" method="post">
    <div class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-5">
        <div class="card-body p-0">
            <a href="#" class="font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"><i class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"></i>Create Post</a>
        </div>
        <div class="card-body p-0 mt-3 position-relative">
            <?php if (isset($getuser["picture"]) && !empty($getuser["picture"])): ?>
                <figure class="avatar position-absolute ms-2 mt-1 top-5"><img src="<?= $getuser["picture"] ?>" alt="image" class="shadow-sm rounded-circle w30" width="30px" height="30px" style="object-fit:cover; border-radius:50%"></figure>
            <?php endif; ?>
            <textarea name="post" class="h100 bor-0 w-100 rounded-xxl p-2 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg" cols="30" rows="10" placeholder="What's on your mind?" required></textarea>
        </div>
        <div class="card-body d-flex p-0 mt-0">
            <button type="submit" class="text-center p-2 lh-20 w100 ms-auto ls-3 d-inline-block rounded-xl bg-current font-xsssss fw-700 ls-lg text-white border-0">Post</button>
        </div>
    </div>
</form>

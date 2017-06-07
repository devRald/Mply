<header>
    <ul id="slide-out" class="side-nav custom-scrollbar ps-container ps-theme-default">
        <!-- Logo -->
        <li>
            <div class="logo-wrapper sn-ad-avatar-wrapper">
                <img src="<?= get_image_url($user_info->applicant_image); ?>" class="img-fluid img-circle">
                <div class="rgba-stylish-strong">
                    <p class="user white-text"><?= $user_info->applicant_fname . ' ' . $user_info->applicant_lname; ?>
                        <br><?= $user_info->applicant_emailadd; ?></p>
                </div>
            </div>
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">
                <li><a href="<?= site_url('applicant'); ?>" class="collapsible-header waves-effect arrow-r"><i class="fa fa-home"></i> Home </a> </li>
                <li><a href="<?= site_url('applicant/profile'); ?>" class="collapsible-header waves-effect arrow-r"><i class="fa fa-user"></i> Profile </a> </li>
                <li><a href="skill.html" class="collapsible-header waves-effect arrow-r"><i class="fa fa-user"></i> My Skill </a> </li>
                <li><a href="<?= site_url('applicant/notification'); ?>" class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope"></i> Notification </a> </li>
                <li><a href="<?= site_url('home/logout_user'); ?>" class="collapsible-header waves-effect arrow-r"><i class="fa fa-sign-out "></i> Logout</a> </li>
            </ul>
        </li>
    </ul>
    <!--Navbar-->
    <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">
        <!-- Breadcrumb-->
        <div class="pull-left">
            <a href="" data-activates="slide-out" class="button-collapse">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="breadcrumb-dn">
            <p>MPower</p>
        </div>
    </nav>
</header>
<header>
    <ul id="slide-out" class="side-nav custom-scrollbar ps-container ps-theme-default">
        <!-- Logo -->
        <li>
            <div class="logo-wrapper sn-ad-avatar-wrapper">
                <img src="<?= get_image_url($company_info->company_image); ?>" class="img-fluid img-circle">
                <div class="rgba-stylish-strong">
                    <p class="user white-text"><?= $company_info->company_name; ?>
                        <br>organizer@gmail.com</p>
                </div>
            </div>
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">
                <li><a href="<?= site_url('company'); ?>" class="collapsible-header waves-effect arrow-r"><i class="fa fa-home"></i> Home </a> </li>
                <li><a href="<?= site_url('company/profile'); ?>" class="collapsible-header waves-effect arrow-r"><i class="fa fa-user"></i> Profile </a> </li>
                <li><a href="<?= site_url('home/logout_company'); ?>" class="collapsible-header waves-effect arrow-r"><i class="fa fa-sign-out "></i> Logout</a> </li>
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
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="#" data-toggle="modal" data-target="#filterModal" type="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-filter fa-lg"></i>Filter</a>
            </li>
        </ul>
    </nav>
</header>
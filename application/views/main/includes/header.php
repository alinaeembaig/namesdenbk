<!----------------------------------------------------------------------------------------------------------->
<!-- header -->
<nav class="navbar navbar-top">

<div class="container navbar-container">
    <div class="row navbar-top-row">
        <div class="col-md-6">
            <!-- left nav top -->
            <div class="welcome-msg-top">
                Welcome to Our NamesDen &nbsp; | &nbsp; Call Us Today! +12486906648
            </div>
        </div>
        <div class="col-md-6">
            <!-- right nav top -->
            <ul class="nav navbar-nav pull-right">
                <li class="email-top"><a href = "mailto: webenlance@gmail.com">webenlance@gmail.com</a>  </li>
                <li class="icon-sign-top dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user"></i><i
                                class="fa fa-caret-down" aria-hidden="true"></i>
                                <ul class="dropdown-menu login-sign-menu">
<li class="sign-in"><a href="/login">Login</a></li>
                        <li class="/sign-up"><a href="/login">Register</a></li>
    </ul>
    </li>

            </ul>
        </div>


    </div>


</div>

</nav>
<nav class="navbar navbar-default" id="main-navbar">
<div class="container navbar-container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url();?>"><img class="img-responsive"
                src="<?php echo base_url();?>assets/home-assets/images/header-logo.png"></a>
        <a class="btn ml-2 btn-selling" href="#">Start Selling</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#myDefaultNavbar1" aria-expanded="false"> <span class="sr-only">Toggle
                navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                class="icon-bar"></span> </button>


    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="/auctions">Auctions</a></li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                    aria-expanded="false" aria-haspopup="true">Categories<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php foreach ($categoriesData as $category) { ?>
                    <li><a
                            href="<?php echo base_url() ?>main/category/<?php echo $category['url_slug']; ?>"><?php echo $category["c_name"] ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                    aria-expanded="false" aria-haspopup="true">Resource <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/blog">Blogs</a></li>
                    <?php if(in_array('website',array_column($platforms,'platform'))) { ?>
                    <li><a
                            href="<?php echo base_url().'websites' ?>"><?php echo $this->lang->line('lang_header_main_sub_website'); ?></a>
                    </li>
                    <?php } ?>
                    <?php if(in_array('domain',array_column($platforms,'platform'))) { ?>
                    <li><a
                            href="<?php echo base_url().'domains' ?>"><?php echo $this->lang->line('lang_header_main_sub_domains'); ?></a>
                    </li>
                    <?php } ?>
                    <?php if(in_array('app',array_column($platforms,'platform'))) { ?>
                    <li><a
                            href="<?php echo base_url().'apps' ?>"><?php echo $this->lang->line('lang_header_main_sub_apps'); ?></a>
                    </li>
                    <?php } ?>
                    <?php if(in_array('account',array_column($platforms,'platform'))) { ?>
                    <li><a
                            href="<?php echo base_url().'accounts' ?>"><?php echo $this->lang->line('lang_header_main_sub_accounts'); ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                    aria-expanded="false" aria-haspopup="true">Digital Assets <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php if(in_array('website',array_column($platforms,'platform'))) { ?>
                    <li><a
                            href="<?php echo base_url().'websites' ?>"><?php echo $this->lang->line('lang_header_main_sub_website'); ?></a>
                    </li>
                    <?php } ?>
                    <?php if(in_array('domain',array_column($platforms,'platform'))) { ?>
                    <li><a
                            href="<?php echo base_url().'domains' ?>"><?php echo $this->lang->line('lang_header_main_sub_domains'); ?></a>
                    </li>
                    <?php } ?>
                    <?php if(in_array('app',array_column($platforms,'platform'))) { ?>
                    <li><a
                            href="<?php echo base_url().'apps' ?>"><?php echo $this->lang->line('lang_header_main_sub_apps'); ?></a>
                    </li>
                    <?php } ?>
                    <?php if(in_array('account',array_column($platforms,'platform'))) { ?>
                    <li><a
                            href="<?php echo base_url().'accounts' ?>"><?php echo $this->lang->line('lang_header_main_sub_accounts'); ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <li><a href="/contact">Contact Us</a></li>
            <li class="nav-item">
                <a class="btn ml-2 btn-selling" href="/signup">Start Selling</a>
            </li>
        </ul>

    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
</nav>

	
<!-- header -->

<!---------------------------------------Google Analytics--------------------------------------------------->
<!-- Global site tag (gtag.js) - Google Analytics -->
<?php if(!empty($settings[0]['google_analytics'])) { 
    echo "<script async src='https://www.googletagmanager.com/gtag/js?id='".$settings[0]['google_analytics']."></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

        gtag('config', '".$settings[0]['google_analytics']."');
    </script>";
} ?>
<!-- /Global site tag (gtag.js) - Google Analytics -->

<!---------------------------PRE LOADER---------------------------------------------------------------------->
<?php if(!empty($imagesData[0]['loader'])) { ?>
<div class="slippa-preloder">
    <div class="preloder-box">
        <img src="<?php if(!empty($imagesData[0]['loader'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['loader']; ?>" alt="preloder logo" draggable="false">
    </div><!-- /.preloder-box -->
</div><!-- /.slippa-preloder -->
<?php } ?>
<!----------------------------------------------------------------------------------------------------------->
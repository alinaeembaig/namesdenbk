<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home|Namesden|Buy and sell domains, websites</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/home-assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/home-assets/css/style.css">


    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
    <nav class="navbar navbar-top">

        <div class="container navbar-container">
            <div class="row">
                <div class="col-md-6">
                    <!-- left nav top -->
                    <div class="welcome-msg-top">
                        Welcome to Our NamesDen &nbsp; | &nbsp; Call Us Today! +12486906648
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- right nav top -->
                    <ul class="nav navbar-nav pull-right">
                    <li class="email-top"><a href = "mailto: support@namesden.com">support@namesden.com</a>  </li>

                        <li class="icon-sign-top dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user"></i><i
                                class="fa fa-caret-down" aria-hidden="true"></i>
                                <ul class="dropdown-menu login-sign-menu">
<li class="sign-in"><a href="/login">Login</a></li>
                        <li class="sign-up"><a href="/login">Register</a></li>
    </ul>
    </li>
                        


                    </ul>
                </div>


            </div>


        </div>

    </nav>
    <nav class="navbar navbar-default">
        <div class="container navbar-container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img class="img-responsive"
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

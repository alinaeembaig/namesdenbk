<?php $this->load->view('main/includes/header_old_1');?>
    <!--Main Slider Section Start-->

    <section id="main-slider">
        <!--Main Slider Section Start-->

        <div class="row header-wrapper">
            <div class="col-xs-6 col-sm-8 link-block">

            </div>
            <div class="col-xs-6 col-sm-4 map-block">

            </div>
            <!--bg-end -->
            <div id="main-slider-wrapper">
                <div id="slickCarousel" class="slick-carousel">
                    <div class="slide-wrapper slide01">
                        <div class="slide-row">
                            <div class="col-xs-12 col-sm-6 col-with-text">
                                <div class="content-wrap">
                                    <p class="slider-caption-1">There Are 93,178 Postings Here For you!</p>
                                    <p class="slider-caption-2">Do you want to buy or sell ?</p>
                                    <form id="home_search" name="home_search" method="post" action="<?php echo base_url().'main/search/' ?>">
                                        <div class="input-wrap">
                                        <div class="input-group">
                                        <input type="text" name="searchterm" placeholder="&#xF002; Find and Purchase a domain name"
                                            style="font-family:Arial, FontAwesome" class="form-control">
                                        <div class="input-group-btn">
                                           <select name="listing_type" class="selectpicker dropup slider-dropdown" data-dropup-auto="false">
                                                <?php foreach ($platforms as $platform) { ?>
                                                    <option value="<?php echo $platform['platform']; ?>"><?php echo ucfirst($this->lang->line($platform['platform'])); ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>
                                            <button type="submit" value="Search" class="btn btn-primary btn-search">search</button>
                                        </div>
                                    </form>
                                    <div class="tags-wrap">
                                        <span class="tags-caption">Trending</span>
                                        <ul class="tags-list">
                                            <?php if(in_array('website',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'websites' ?>">Websites</a></li>
                                            <?php } ?>
                                            <?php if(in_array('domain',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'domains' ?>">Domains</a></li>
                                            <?php } ?>
                                            <?php if(in_array('app',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'apps' ?>">Apps</a></li>
                                            <?php } ?>
                                            <?php if(in_array('account',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'accounts' ?>">Amazon Store</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="icons-wrap">
                                        <a href="https://www.producthunt.com/posts/namesden?utm_source=badge-featured&utm_medium=badge&utm_souce=badge-namesden"
                                            target="_blank">
                                            <img src="https://api.producthunt.com/widgets/embed-image/v1/featured.svg?post_id=370584&theme=dark"
                                                alt="NamesDen - &#0032;Buy&#0032;and&#0032;Premium&#0032;Businesses&#0032;and&#0032;Domain&#0032;name&#0032;for&#0032;Sale | Product Hunt"
                                                style="width: 250px; height: 54px;" width="250" height="54" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-with-imgs">
                                <img src="<?php echo base_url();?>./assets/home-assets/images/home/slide1-img.png" alt="">
                            </div>
                        </div>
                    </div>
                    <!--end of slide1-->
                    <div class="slide-wrapper slide02">
                    <div class="slide-row">
                            <div class="col-xs-12 col-sm-6 col-with-text">
                                <div class="content-wrap">
                                    <p class="slider-caption-1">There Are 93,178 Postings Here For you!</p>
                                    <p class="slider-caption-2">Do you want to buy or sell ?</p>
                                    <form id="home_search" name="home_search" method="post" action="<?php echo base_url().'main/search/' ?>">
                                        <div class="input-wrap">
                                            <div class="input-group">
                                                <input type="text" name="searchterm" placeholder="&#xF002; Find and Purchase a domain name"
                                                    style="font-family:Arial, FontAwesome" name="searchterm" class="form-control">
                                                    <div class="input-group-btn">
                                                        <select name="listing_type" class="selectpicker dropup slider-dropdown" data-dropup-auto="false">
                                                            <?php foreach ($platforms as $platform) { ?>
                                                                <option value="<?php echo $platform['platform']; ?>"><?php echo ucfirst($this->lang->line($platform['platform'])); ?></option>
                                                            <?php } ?>
                                                        </select>

                                                    </div>
                                                </div>
                                            <button type="submit" value="Search" class="btn btn-primary btn-search">search</button>
                                        </div>
                                    </form>
                                    <div class="tags-wrap">
                                        <span class="tags-caption">Trending</span>
                                        <ul class="tags-list">
                                            <?php if(in_array('website',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'websites' ?>">Websites</a></li>
                                            <?php } ?>
                                            <?php if(in_array('domain',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'domains' ?>">Domains</a></li>
                                            <?php } ?>
                                            <?php if(in_array('app',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'apps' ?>">Apps</a></li>
                                            <?php } ?>
                                            <?php if(in_array('account',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'accounts' ?>">Amazon Store</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="icons-wrap">
                                        <a href="https://www.producthunt.com/posts/namesden?utm_source=badge-featured&utm_medium=badge&utm_souce=badge-namesden"
                                            target="_blank">
                                            <img src="https://api.producthunt.com/widgets/embed-image/v1/featured.svg?post_id=370584&theme=dark"
                                                alt="NamesDen - &#0032;Buy&#0032;and&#0032;Premium&#0032;Businesses&#0032;and&#0032;Domain&#0032;name&#0032;for&#0032;Sale | Product Hunt"
                                                style="width: 250px; height: 54px;" width="250" height="54" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-with-imgs">
                                <img src="<?php echo base_url();?>./assets/home-assets/images/home/banner2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="slide-wrapper slide02">
                    <div class="slide-row">
                            <div class="col-xs-12 col-sm-6 col-with-text">
                                <div class="content-wrap">
                                    <p class="slider-caption-1">There Are 93,178 Postings Here For you!</p>
                                    <p class="slider-caption-2">Do you want to buy or sell ?</p>
                                    <form id="home_search" name="home_search" method="post" action="<?php echo base_url().'main/search/' ?>">
                                        <div class="input-wrap">
                                            <div class="input-group">
                                                <input type="text" name="searchterm" placeholder="&#xF002; Find and Purchase a domain name"
                                                    style="font-family:Arial, FontAwesome" name="searchterm" class="form-control">
                                                    <div class="input-group-btn">
                                           <select name="listing_type" class="selectpicker dropup slider-dropdown" data-dropup-auto="false">
                                                <?php foreach ($platforms as $platform) { ?>
                                                    <option value="<?php echo $platform['platform']; ?>"><?php echo ucfirst($this->lang->line($platform['platform'])); ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>
                                            <button type="submit" value="Search" class="btn btn-primary btn-search">search</button>
                                        </div>
                                    </form>
                                    <div class="tags-wrap">
                                        <span class="tags-caption">Trending</span>
                                        <ul class="tags-list">
                                            <?php if(in_array('website',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'websites' ?>">Websites</a></li>
                                            <?php } ?>
                                            <?php if(in_array('domain',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'domains' ?>">Domains</a></li>
                                            <?php } ?>
                                            <?php if(in_array('app',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'apps' ?>">Apps</a></li>
                                            <?php } ?>
                                            <?php if(in_array('account',array_column($platforms,'platform'))) { ?>
                                            <li><a href="<?php echo base_url().'accounts' ?>">Amazon Store</a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="icons-wrap">
                                        <a href="https://www.producthunt.com/posts/namesden?utm_source=badge-featured&utm_medium=badge&utm_souce=badge-namesden"
                                            target="_blank">
                                            <img src="https://api.producthunt.com/widgets/embed-image/v1/featured.svg?post_id=370584&theme=dark"
                                                alt="NamesDen - &#0032;Buy&#0032;and&#0032;Premium&#0032;Businesses&#0032;and&#0032;Domain&#0032;name&#0032;for&#0032;Sale | Product Hunt"
                                                style="width: 250px; height: 54px;" width="250" height="54" /></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-with-imgs">
                                <img src="<?php echo base_url();?>./assets/home-assets/images/home/banner3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!--Main Slider Section endhere-->

    </section>

    <!--Main Slider Section End-->

    <!--Business Marketplace Section Start-->

    <section class="business-market-sec">
        <div class="container">
            <div class="row">
                <div class="market-wrapper">
                    <div class="heading-wrapper">
                        <div class="main-heading market-heading">
                            The #1 Curated Online Business Marketplace.
                        </div>
                        <div class="market-heading-caption">Join thousands of customers around the globe who've bought
                            and sold over 400+ millions worth<br> of online Business.</div>
                    </div>
                    <div class="btn-wrapper-market">
                        <a href="/signup" class="btn-main started-btn">Get Started for free<span
                                class="btn-icon">></span></a>
                        <a href="/signup" class="btn-main learn-btn">Learn More<span class="btn-icon">></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Buiness Marketplace Section End-->

    <!--Working Prcoess Section Start-->

    <section class="working-process-section">
        <div class="container-fluid working-text text-center maintitle">
            <div class="row maintitlerow">
                <div class="main-heading working-title">Working Process</div>
                <div class="how-it-work-sub">How it works</div>
            </div>
        </div>
        <div class="section-block-grey">
            <div class="container-fluid">

                <div class="row mt-60">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="serv-section-2">
                            <div class="serv-section-2-icon"> <img src="<?php echo base_url();?>assets/home-assets/images/working/ribbon1.png">
                            </div>
                            <div class="serv-section-desc">
                                <img class="working-icon"
                                    src="<?php echo base_url();?>assets/home-assets/images/working/icon/account-balance.png">
                                <h4>Create An Account</h4>
                                <p>Post a website or a domain. We'll quickly match you with the right buyer.</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="serv-section-2 serv-section-2-act">
                            <div class="serv-section-2-icon serv-section-2-icon-act"> <img
                                    src="<?php echo base_url();?>assets/home-assets/images/working/ribbon1.png"> </div>
                            <div class="serv-section-desc">
                                <img class="working-icon" src="<?php echo base_url();?>assets/home-assets/images/working/icon/listing.png">
                                <h4>Create a Listing</h4>
                                <p>List a Domain Or a Website to Receive Best Offers & Bids instantly</p>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="serv-section-2">
                            <div class="serv-section-2-icon"> <img src="<?php echo base_url();?>assets/home-assets/images/working/ribbon1.png">
                            </div>
                            <div class="serv-section-desc">
                                <img class="working-icon" src="<?php echo base_url();?>assets/home-assets/images/working/icon/meet-burger.png">
                                <h4>Meet the Buyer</h4>
                                <p>Select the Best Offer or Winning Bid , Then Open a Contract & Close the Deal.</p>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="serv-section-2">
                            <div class="serv-section-2-icon"> <img src="<?php echo base_url();?>assets/home-assets/images/working/ribbon1.png">
                            </div>
                            <div class="serv-section-desc">
                                <img class="working-icon" src="<?php echo base_url();?>assets/home-assets/images/working/icon/get-paid.png">
                                <h4>Get Paid</h4>
                                <p>Select the Best Offer or Winning Bid , Then Open a Contract & Close the Deal.</p>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="how-it-works-btn">
                    <a href="/signup" class="btn-main work-btn">Explore All</a>
                </div>
            </div>
        </div>

    </section>

    <!--Working Process Section End-->

    <!--About Us Section Start-->
    <section class="about-us-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 about-image">
                    <img class="img-responsive" src="<?php echo base_url();?>assets/home-assets/images/about-us/about-2-11.png">

                </div>
                <div class="col-lg-6 about-us-detail">
                    <div class="about-us-top">About Us</div>
                    <h2 class="about-us-title main-heading">More than a decade of Excellence in domain and website
                    </h2>
                    <div class="left-line">

                        <img src="<?php echo base_url();?>assets/home-assets/images/about-us/Rectangle 7640.png">
                    </div>
                    <p class="about-us-des">From building a simple site to creating an online store, we have everything
                        you need to thrive online. Best of all, they all work together for one cohesive online
                        experience.</p>
                    <div class="btn-wrapper">
                        <div class="btn-more-wrapper">
                            <a class="btn btn-main more-info-btn" href="/signup">More Info <i
                                    class="fa-solid fa-arrow-up-right"></i> </a>
                        </div>

                        <div class="help-wrapper">
                            <div class="help-icon">
                                <img class="img-responsive help-img"
                                    src="<?php echo base_url();?>assets/home-assets/images/about-us/help-icon.png">
                            </div>
                            <div class="help-text-wrapper">
                                <div class="text-help">Need Help?</div>
                                <div class="help-phone">+000(123)456 88</div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>

    <!--About Us Section End-->

    <!--Why Choose Us Section Start-->

    <section class="why-choose-us-sec">
        <div class="container">
            <div class="row">
                <div class="why-choose-us-title main-heading">
                    Why Choose Us?
                </div>
                <div class="online-para">
                    $400+ Million of Online Businesses Sold
                </div>
                <div class="why-choose-para">Empire Flippers is an Inc. 5000 company and the #1 curated marketplace for
                    <br>buying and selling established, profitable online businesses.!
                </div>
            </div>
        </div>
    </section>

    <!--Why Choose Us Section End-->

    <!--Featured Listing Start-->

    <section class="feature-list-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="main-heading listing-heading">Featured Listings</div>
                <div class="listing-main-head-para">NamesDen Provides best opportunities to invest on right for get
                    higher growth<br> and setup instant business with in.</div>
                <div id="featured-listing-carousel" class="carousel slick-theme">
                    <!--		Featured Listing Carousel Item Start-->
                    <?php foreach ($recentlyAdded as $asset) { ?>
                   

                    <div class="item">
                        <div class="col-md-3 col-sm-6">
                            <div class="listing-wrapper">
                                <div class="listing-top-head">
                                    <div class="listing-top-heading">
                                    <?php echo $asset['category']; ?>
                                    </div>
                                </div>
                                <div class="listing-img">
                                    <img class="main-img-listing img-responsive"
                                        src="<?php if(isset($asset['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$asset['website_thumbnail'];  ?>">
                                    <div class="cart-icon">
                                        <img class="cart-img img-responsive"
                                            src="assets/home-assets/images/featured-listing/Icon awesome-shopping-cart.png">
                                    </div>
                                </div>
                                <div class="listing-body-wrapper">
                                    <div class="listing-title-wrapper">
                                        <div class="listing-title">
                                            <?php if(isset($asset['website_BusinessName'])) echo $asset['website_BusinessName'];  ?>
                                        </div>
                                        <div class="title-heart-icon">
                                            <img class="heart-img img-responsive"
                                                src="assets/home-assets/images/featured-listing/Icon awesome-heart.png">
                                        </div>
                                    </div>
                                    <div class="listing-body">
                                        <div class="listing-para">
                                            <?php echo $asset['website_tagline'] ?>
                                        </div>
                                        <div class="star-rating">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="feature-list-btn">
                                        <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>"
                                            class="btn-main list-box-btn">Explore</a>
                                    </div>
                                    <hr>
                                    <div class="price-list-footer-wrapper">
                                        <div class="price-type">
                                            Price type:
                                            <?php if($asset['listing_option'] === 'auction') { ?>
                                            <span class="price-type-span">Auction</span>
                                            <?php }else{ ?>
                                            <span class="price-type-span">Fixed</span>
                                            <?php } ?>

                                        </div>
                                        <div class="price-dollar-list">
                                            <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?>
                                            <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!--			Featured Listing Carousel Item End-->
                </div>



            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="listing-btn-see">
                    <a href="/main/search/" class="btn-main list-btn">See More</a>
                </div>
            </div>
        </div>
    </section>

    <!--Featured Listing End-->

    <!--Sell Your domain or business Section Start-->

    <section class="sell-your-domain">
        <div class="container-fluid sell-your-cont">
            <div id="custom_carousel" class="owl-carousel owl-dots slide sell-slider owl-theme">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="container-fluid sell-para-main">
                            <div class="row">
                                <div class="col-md-5 sell-para-col">
                                    <div class="sell-para-wrapper">
                                        <div class="sell-sub-heading">How it works?</div>
                                        <div class="main-heading sell-heading">Sell your domain or website</div>
                                        <div class="sell-para">
                                            <p>Discover the effortless way to sell your domain or website with NamesDen, the ultimate platform for digital asset transactions. Our thriving community of buyers and sellers provides the perfect ecosystem to maximize your selling potential. With our streamlined process and robust network, you can showcase your domain or website to a vast audience of motivated investors, ensuring a quick and lucrative sale. Selling has never been this easy—join NamesDen today and unlock the power of our large community to effortlessly sell your domain or website with confidence.</p>
                                            <p>Say goodbye to complicated selling processes and hello to seamless transactions with NamesDen. Our large and vibrant community of domain and website enthusiasts is eager to explore your offerings. With our user-friendly platform and extensive buyer network, you can connect with the right audience and receive competitive offers in no time. Trust in our proven track record and let NamesDen be your partner in selling success. Start your journey today and experience the satisfaction of effortlessly selling your domain or website within our dynamic community.</p>
                                            <a href="/signup" class="btn btn-sell-sec">How to Buy a Business</a>
                                        </div>
                                    </div>



                                </div>
                                <div class="col-md-7 sell-img-col">
                                    <div class="img-wrapper">
                                        <img class="img-responsive"
                                            src="assets/home-assets/images/sell-your-domain/domain-img.png">
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>



                    <!-- End Item -->
                </div>

                <div class="carousel-inner">
                    <div class="item active">
                        <div class="container-fluid sell-para-main">
                            <div class="row">
                                <div class="col-md-5 sell-para-col">
                                    <div class="sell-para-wrapper">
                                        <div class="sell-sub-heading">How it works?</div>
                                        <div class="main-heading sell-heading">Sell your Amazon Stores And Accounts</div>
                                        <div class="sell-para">
                                            <p>Unlock the potential of your Amazon store or account by leveraging the power of NamesDen, the premier destination for selling digital assets. Our platform offers a seamless and hassle-free solution for selling your Amazon stores and accounts, backed by a vibrant and expansive community of buyers. With NamesDen, you can tap into our large network of motivated investors who are actively seeking profitable Amazon ventures. Our user-friendly interface and expert support ensure that the selling process is as smooth as possible, enabling you to maximize your returns with ease. Don't miss out on this opportunity to capitalize on your Amazon success—join NamesDen today and let our large community help you effortlessly sell your Amazon store or account.<p>
                                            <p>Say goodbye to the complexities of selling your Amazon store or account and hello to a straightforward and efficient process with NamesDen. Our thriving community of buyers, combined with our unrivaled expertise in digital asset transactions, makes us the ideal platform for selling your Amazon ventures. With our user-friendly interface and extensive network, you can showcase your store or account to a wide range of potential buyers, attracting competitive offers and ensuring a seamless transaction. Don't let your hard work go to waste—leverage the power of NamesDen's large community and unlock the full value of your Amazon store or account today.</p>
                                            <a href="/signup" class="btn btn-sell-sec">How to Buy a Business</a>
                                        </div>
                                    </div>



                                </div>
                                <div class="col-md-7 sell-img-col">
                                    <div class="img-wrapper">
                                        <img class="img-responsive"
                                            src="assets/home-assets/images/sell-your-domain/domain-img.png">
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>



                    <!-- End Item -->
                </div>



            </div>
            <!-- End Carousel -->
        </div>
    </section>

    <!--Sell Your Domain or Business Section End-->

    <!--Trending on Namesden Section Start-->

    <section class="trending-section">
        <div class="container">
            <div class="row">
                <div class="main-heading trending-heading">Trending on Namesden</div>
                <div class="trending-para-head">NamesDen Provides best opportunities to invest on right for get higher
                    growth<br> and setup instant business with in.</div>
                <div class="col-xs-12">

                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#domain" aria-controls="domain" role="tab"
                                    data-toggle="tab">Domain</a></li>
                            <li role="presentation"><a href="#websites" aria-controls="websites" role="tab"
                                    data-toggle="tab">Websites</a></li>
                            <li role="presentation"><a href="#amazon" aria-controls="amazon" role="tab"
                                    data-toggle="tab">Amazon Store</a></li>
                            <li role="presentation"><a href="#apps" aria-controls="apps" role="tab"
                                    data-toggle="tab">Apps</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="domain">
                                <div id="tab-domains" class="owl-carousel">
                                    <?php foreach ($featuredDomains as $featuredDomain) {?>
                                        <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>" class="item trending-wrapper">
                                            
                                            <div class="trending-image">
                                                <img class="img-responsive" src="<?php if(isset($asset['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$asset['website_thumbnail'];  ?>">
                                                <div class="trending-price-wrapper">
                                                    <div class="trending-price">
                                                        <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?>
                                                        <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="trending-body-wrapper">
                                                <div class="trending-title"><?php echo $featuredDomain['website_BusinessName']; ?></div>
                                                <div class="trending-para"><?php echo htmlspecialchars_decode($featuredDomain['website_tagline']); ?></div>
                                                <div class="trending-tag-wrapper">
                                                    <div class="trending-tag-1 trend-tag"><?php echo $featuredDomain['category']; ?></div>
                                                </div>
                                                <div class="trending-reg-wrapper">
                                                    <div class="trending-age">Age:<span class="age-trend">21 Years</span>
                                                </div>
                                                    <div class="trending-month">Exp: <span class="trend-month">1
                                                            Month</span></div>
                                                            <div class="trending-reg">List Type: <span class="trend-reg"><?php echo $featuredDomain['listing_option']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="trend-btn-wrapper">
                                            <a class="btn-main trending-btn" href="/domains">See More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="websites">
                                <div id="tab-websites" class="owl-carousel">
                                    <?php foreach ($featuredWebsites as $featuredWebsite) {?>
                                        <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>" class="item trending-wrapper">
                                            
                                            <div class="trending-image">
                                                <img class="img-responsive" src="<?php if(isset($asset['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$asset['website_thumbnail'];  ?>">
                                                <div class="trending-price-wrapper">
                                                    <div class="trending-price">
                                                        <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?>
                                                        <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="trending-body-wrapper">
                                                <div class="trending-title"><?php echo $featuredWebsite['website_BusinessName']; ?></div>
                                                <div class="trending-para"><?php echo htmlspecialchars_decode($featuredWebsite['website_tagline']); ?></div>
                                                <div class="trending-tag-wrapper">
                                                    <div class="trending-tag-1 trend-tag"><?php echo $featuredWebsite['category']; ?></div>
                                                </div>
                                                <div class="trending-reg-wrapper">
                                                    <div class="trending-age">Age:<span class="age-trend">21 Years</span>
                                                </div>
                                                    <div class="trending-month">Exp: <span class="trend-month">1
                                                            Month</span></div>
                                                            <div class="trending-reg">List Type: <span class="trend-reg"><?php echo $featuredWebsite['listing_option']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="trend-btn-wrapper">
                                            <a class="btn-main trending-btn" href="/websites">See More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="amazon">
                                <div id="tab-amazonstore" class="owl-carousel">
                                    <?php foreach ($featuredAmazonstores as $featuredAmazonstore) {?>
                                        <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>" class="item trending-wrapper">
                                            
                                            <div class="trending-image">
                                                <img class="img-responsive" src="<?php if(isset($asset['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$asset['website_thumbnail'];  ?>">
                                                <div class="trending-price-wrapper">
                                                    <div class="trending-price">
                                                        <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?>
                                                        <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="trending-body-wrapper">
                                                <div class="trending-title"><?php echo $featuredAmazonstore['website_BusinessName']; ?></div>
                                                <div class="trending-para"><?php echo htmlspecialchars_decode($featuredAmazonstore['website_tagline']); ?></div>
                                                <div class="trending-tag-wrapper">
                                                    <div class="trending-tag-1 trend-tag"><?php echo $featuredAmazonstore['category']; ?></div>
                                                </div>
                                                <div class="trending-reg-wrapper">
                                                    <div class="trending-age">Age:<span class="age-trend">21 Years</span>
                                                </div>
                                                    <div class="trending-month">Exp: <span class="trend-month">1
                                                            Month</span></div>
                                                            <div class="trending-reg">List Type: <span class="trend-reg"><?php echo $featuredAmazonstore['listing_option']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="trend-btn-wrapper">
                                            <a class="btn-main trending-btn" href="/accounts">See More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="apps">
                                <div id="tab-apps" class="owl-carousel">
                                    <?php foreach ($featuredAccounts as $featuredAccounts) {?>
                                        <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>" class="item trending-wrapper">    
                                                <div class="trending-image">
                                                    <img class="img-responsive" src="<?php if(isset($asset['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$asset['website_thumbnail'];  ?>">
                                                    <div class="trending-price-wrapper">
                                                        <div class="trending-price">
                                                            <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?>
                                                            <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="trending-body-wrapper">
                                                    <div class="trending-title"><?php echo $featuredAccounts['website_BusinessName']; ?></div>
                                                    <div class="trending-para"><?php echo htmlspecialchars_decode($featuredAccounts['website_tagline']); ?></div>
                                                    <div class="trending-tag-wrapper">
                                                        <div class="trending-tag-1 trend-tag"><?php echo $featuredAccounts['category']; ?></div>
                                                    </div>
                                                    <div class="trending-reg-wrapper">
                                                        <div class="trending-age">Age:<span class="age-trend">21 Years</span>
                                                    </div>
                                                        <div class="trending-month">Exp: <span class="trend-month">1
                                                                Month</span></div>
                                                                <div class="trending-reg">List Type: <span class="trend-reg"><?php echo $featuredAccounts['listing_option']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>        
                                            </a>
                                    <?php } ?>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="trend-btn-wrapper">
                                            <a class="btn-main trending-btn" href="/apps">See More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <!--Trending on Namesden Section End-->

    <!--Pricing Table Section Start-->

    <section class="price-main-section">
        <div class="container">
            <div class="row">
                <div class="price-heading main-heading">
                    Believe this Pricing
                </div>
                <div class="price-text-para">
                    NamesDen Provides best opportunities to invest on right for get higher<br> growth and setup instant
                    business with in.
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="panel panel-primary">

                        <div class="panel-body">
                            <div class="the-price">
                                <div class="table-heading">
                                    Recently Added
                                </div>
                                <div class="table-heading-icon">
                                    <img class="responsive-img price-icon"
                                        src="<?php echo base_url();?>assets/home-assets/images/pricing-table/price-title-icon.png">
                                </div>
                            </div>
                            <table class="table">
                            <?php if (!empty($featuredDomains) > 0) {
                                foreach ($featuredDomains as $asset) { ?>
                                    <tr class="active">
                                        <td class="text-data">
                                        <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>"><?php if(isset($asset['website_BusinessName'])) echo $asset['website_BusinessName'];  ?></a>
                                    </td>
                                    <td class="price-data">
                                            <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                                        </td>
                                    </tr>
                                <?php } 
                            } else { ?>
                                <tr class="active">
                                    <td class="text-data">
                                        rxwell.com
                                    </td>
                                    <td class="price-data">
                                        $550,000
                                    </td>
                                </tr>
                            <?php }  ?>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="panel panel-success">


                        <div class="panel-body">
                            <div class="the-price">
                                <div class="table-heading">
                                    Popular Listings
                                </div>
                                <div class="table-heading-icon">
                                    <img class="responsive-img price-icon"
                                        src="<?php echo base_url();?>assets/home-assets/images/pricing-table/price-title-icon.png">
                                </div>
                            </div>
                            <table class="table">
                                <?php if (!empty($auctionedDomains) > 0) {
                                    foreach ($auctionedDomains as $asset) { ?>
                                        <tr class="active">
                                            <td class="text-data">
                                                <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>"><?php if(isset($asset['website_BusinessName'])) echo $asset['website_BusinessName'];  ?></a>
                                            </td>
                                            <td class="price-data">
                                                <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                                            </td>
                                        </tr>
                                    <?php } 
                                } else { ?>                                        
                                    <tr class="active">
                                        <td class="text-data">
                                            Portfolio of 10 Premium Domains
                                        </td>
                                        <td class="price-data">
                                            $25
                                        </td>
                                    </tr>
                                <?php }  ?>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="panel panel-info">

                        <div class="panel-body">
                            <div class="the-price">

                                <div class="table-heading">
                                    Recently Sold
                                </div>
                                <div class="table-heading-icon">
                                    <img class="responsive-img price-icon"
                                        src="<?php echo base_url();?>assets/home-assets/images/pricing-table/price-title-icon.png">
                                </div>
                            </div>
                            <table class="table">
                            <?php if (!empty($soldDomains) > 0) {
                                foreach ($soldDomains as $asset) { ?>
                                    <tr class="active">
                                        <td class="text-data">
                                        <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>"><?php if(isset($asset['website_BusinessName'])) echo $asset['website_BusinessName'];  ?></a>
                                    </td>
                                    <td class="price-data">
                                            <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                                        </td>
                                    </tr>
                                <?php } 
                            } else { ?>

                                <tr class="active">
                                    <td class="text-data">
                                        rxwell.com
                                    </td>
                                    <td class="price-data">
                                        $550,000
                                    </td>
                                </tr>
                            <?php }  ?>
                            </table>
                        </div>

                    </div>

                </div>


            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="price-see-more-btn">
                    <a href="/main/search/" class="btn btn-main btn-price">See More</a>
                </div>
            </div>
        </div>
    </section>

    <!--Pricing Table Section End-->

    <!--Our Partners Section Start-->

    <section class="our-partners-sec">
        <div class="container">
            <div class="row">
                <div class="our-partner-heading main-heading">
                    Our Partners
                </div>
            </div>
        </div>
        <div id="our-partner-carousel" class="carousel">
            <div class="item"> <img class="img-responsive" src="<?php echo base_url();?>assets/home-assets/images/our-partners/1-3.png"> </div>
            <div class="item"> <img class="img-responsive" src="<?php echo base_url();?>assets/home-assets/images/our-partners/1-2.png"> </div>
            <div class="item"> <img class="img-responsive" src="<?php echo base_url();?>assets/home-assets/images/our-partners/1-1.png"> </div>
            <div class="item"> <img class="img-responsive" src="<?php echo base_url();?>assets/home-assets/images/our-partners/1-7.png"> </div>
            <div class="item"> <img class="img-responsive" src="<?php echo base_url();?>assets/home-assets/images/our-partners/1-6.png"> </div>
            <div class="item"> <img class="img-responsive" src="<?php echo base_url();?>assets/home-assets/images/our-partners/1-5.png"> </div>

        </div>
    </section>

    <!--Our Partners Section End-->

    <!--shipping Available Following Language Section Start-->

    <section class="countries-sec" style="display:none;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 country-sec-col">
                    <div class="country-sec-para">
                        Namesden is available in the following language
                    </div>
                </div>
                <div class="col-md-7 flag-img-col">
                    <div class="container-fluid">
                        <div class="row">
                            <div id="country-carousel" class="carousel">
                                <div class="item"><img class="img-responsive"
                                        src="<?php echo base_url();?>assets/home-assets/images/ship-countries/uk.png"></div>
                                <div class="item"><img class="img-responsive"
                                        src="<?php echo base_url();?>assets/home-assets/images/ship-countries/spain.png"></div>
                                <div class="item"><img class="img-responsive"
                                        src="<?php echo base_url();?>assets/home-assets/images/ship-countries/portugal.png"></div>
                                <div class="item"><img class="img-responsive"
                                        src="<?php echo base_url();?>assets/home-assets/images/ship-countries/russia.png"></div>
                                <div class="item"><img class="img-responsive"
                                        src="<?php echo base_url();?>assets/home-assets/images/ship-countries/france.png"></div>
                                <div class="item"><img class="img-responsive"
                                        src="<?php echo base_url();?>assets/home-assets/images/ship-countries/turkey.png"></div>
                                <div class="item"><img class="img-responsive"
                                        src="<?php echo base_url();?>assets/home-assets/images/ship-countries/italy.png"></div>
                                <div class="item"><img class="img-responsive"
                                        src="<?php echo base_url();?>assets/home-assets/images/ship-countries/germany.png"></div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--shipping Available Following Language Section End-->

    <!--Testimonial Section Start-->

    <section class="testimonial-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 testimonial-img-col">

                </div>
                <div class="col-md-5 testimonial-col">
                    <div id="testimonial-carousel" class="carousel">
                        <!--				Testimonial Item Start-->
                        <div class="item">
                            <div class="testimonial-wrapper">
                                <div class="testimonial-star-ratting-wrapper">
                                    <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="single-star-with-name">
                                        <i class="fa fa-star"></i><span class="star-rat-name">Trustpilot</span>
                                    </div>
                                </div>
                                <div class="testimonial-para-q">
                                    <q>I had an amazing experience purchasing a domain through this platform. It was incredibly easy to navigate and find the perfect domain for my needs. The wide selection and efficient search filters made the process smooth and hassle-free. The transaction was secure, and the customer support team was responsive and helpful at every step. I highly recommend using this platform for buying domains. It offers a reliable and user-friendly experience that exceeded my expectations.</q>
                                </div>
                                <hr>
                                <div class="testimonial-img-wrapper">
                                    <div class="testimonial-img">
                                        <img class="img-responsive"
                                            src="<?php echo base_url();?>assets/home-assets/images/testimonial/avatar-img.png">
                                    </div>
                                    <div class="testimonail-name-wrapper">
                                        <div class="testimonail-name">Boris Elbert</div>
                                        <div class="testimonial-name-comp">Green Tech</div>
                                    </div>


                                </div>
                            </div>
                            <div class="quote-wrapper">
                                <div class="quote-image">
                                    <img class="img-responsive" src="<?php echo base_url();?>assets/home-assets/images/testimonial/quote.png">
                                </div>
                            </div>
                        </div>
                        <!--					Testimonial Item End-->
                        <!--				Testimonial Item Start-->
                        <div class="item">
                            <div class="testimonial-wrapper">
                                <div class="testimonial-star-ratting-wrapper">
                                    <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="single-star-with-name">
                                        <i class="fa fa-star"></i><span class="star-rat-name">Trustpilot</span>
                                    </div>
                                </div>
                                <div class="testimonial-para-q">
                                    <q>Buying a domain through this platform was a fantastic experience. It was user-friendly, efficient, and secure. With a wide selection of domains available and helpful search filters, I quickly found the perfect one. The customer support team was responsive and helpful throughout the process. I highly recommend this platform for buying domains. It's reliable and hassle-free.</q>
                                </div>
                                <hr>
                                <div class="testimonial-img-wrapper">
                                    <div class="testimonial-img">
                                        <img class="img-responsive"
                                            src="<?php echo base_url();?>assets/home-assets/images/testimonial/testimonial1.png">
                                    </div>
                                    <div class="testimonail-name-wrapper">
                                        <div class="testimonail-name">Johnson</div>
                                        <div class="testimonial-name-comp">RV Tech</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--					Testimonial Item End-->
                        <!--				Testimonial Item Start-->
                        <div class="item">
                            <div class="testimonial-wrapper">
                                <div class="testimonial-star-ratting-wrapper">
                                    <div class="star-rating">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="single-star-with-name">
                                        <i class="fa fa-star"></i><span class="star-rat-name">Trustpilot</span>
                                    </div>
                                </div>
                                <div class="testimonial-para-q">
                                    <q>Selling my domain here was a great experience. The platform made it easy to list and showcase my domain. I attracted interested buyers quickly and the negotiation process was smooth. I highly recommend this platform for selling domains. It's user-friendly and effective.</q>
                                </div>
                                <hr>
                                <div class="testimonial-img-wrapper">
                                    <div class="testimonial-img">
                                        <img class="img-responsive"
                                            src="<?php echo base_url();?>assets/home-assets/images/testimonial/testimonial2.png">
                                    </div>
                                    <div class="testimonail-name-wrapper">
                                        <div class="testimonail-name">Nick James</div>
                                        <div class="testimonial-name-comp">ArbiSoft</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--					Testimonial Item End-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Testimonial Section End-->

    <!--From Our Blog Section Start-->

    <section class="blog-section">
        <div class="container">
            <div class="row">
                <div class="section-top-blog">
                    <div class="main-heading blog-heading">From Our Blog</div>
                    <div class="blog-main-des">Post a job to tell us about your project. We'll quickly match you with
                        the right freelancers.</div>
                </div>
                <div id="blog-carousel" class="carousel slick-theme">
                    <!--   Blog Carousel Item Start-->
                    <?php foreach ($featuredPosts as $key=>$post) { ?>
                        <div class="item">
                            <div class="col-12 col-sm-8 col-md-4 col-lg-3">
                                <div class="blog-card">
                                    <img class="card-img img-responsive"
                                        src="<?php if(isset($post['thumbnail'])) echo base_url().BLOG_UPLOAD.$post['thumbnail']; ?>" alt="News-5">
                                    <div class="card-top  d-flex justify-content-between bg-transparent border-top-0">
                                        <?php if(isset($ownerData[0]['username'])) { ?>
                                            <div class="profile-icon">
                                                <img class="img-responsive blog-img"
                                                src="<?php echo base_url();?>assets/home-assets/images/from-our-blog/profile-icon.png">
                                                <span class="profile-name"><?php if(isset($ownerData[0]['username'])) echo $ownerData[0]['username']; ?></span>
                                            </div>
                                        <?php } ?>
                                        <div class="calendar-views">
                                            <img class="img-responsive blog-img"
                                                src="<?php echo base_url();?>assets/home-assets/images/from-our-blog/calendar-icon.png">
                                            <span class="calendar-text"><?php if(isset($post['date'])) echo date('M d Y',strtotime($post['date'])); ?></span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php if(isset($post['title'])) echo $post['title']; ?></h4>
                                        <p class="card-text"><?php if(isset($post['metadescription'])) echo substr($post['metadescription'], 0,125); ?></p>
                                        <a href="<?php echo base_url().'blog_post/'.$post['slug'] ?>" class="btn btn-main blog-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!--   Blog Carousel Item End-->
                   
                </div>




            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="blog-btn-wrapper">
                    <a href="/blog" class="btn-main blog-btn-see">See More</a>
                </div>
            </div>
        </div>
    </section>

    <!--From Our Blog Section End-->

    <!--Newsletter Section Start-->

    <section class="newsletter-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="newsletter-wrapper">
                        <div class="newsletter-heading-wrapper">
                            <div class="newsletter-heading main-heading">Sign Up For a Newsletter</div>
                            <div class="newsletter-heading-caption">
                                Weekly breaking news, analysis and cutting edge advices<br> on job searching.
                            </div>
                        </div>
                        <div class="newsletter-btn-wrapper">
                            <!-- <form method="post" enctype="multipart/form-data" class="newsletter"> -->
                                <div class="news-input-group">
                                    <input type="text" id="subscribe_email" name="subscribe_email" class="form-control" placeholder="Enter your email address">
                                </div>
                                <div class="newsletter-btn">
                                    <button type="submit" class="btn newsletter-btn-main">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24">
                                            <rect x="0" y="0" width="24" height="24" fill="none" stroke="none" />
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M22 2L11 13M22 2l-7 20l-4-9l-9-4l20-7z" />
                                        </svg>
                                    </button>
                                    <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                </div>
                            <!-- </form> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Newsletter Section End-->

<?php $this->load->view('main/includes/footer_old_1');?>
<!DOCTYPE html>
<html dir="<?= !empty($l_format) ? $l_format : 'ltr'; ?>" lang="<?php if(!empty($language)) echo $language; else echo 'en'; ?>">
<head>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="author" content="onlinetoolhub.com">
<meta name="keywords" content="<?php echo $this->lang->line('site_domains_keywords'); ?>"/>
<meta name="description" content="<?php echo $this->lang->line('site_domains_metadescription'); ?>"/>
<meta name="copyright"content="onlinetoolhub">
<meta name="robots" content="index,follow" />
<meta name="url" content="<?php echo base_url(); ?>">
<title><?php echo $this->lang->line('site_domains'); ?> | <?php echo $this->lang->line('site_name'); ?></title>
<meta name="og:title" content="<?php echo $this->lang->line('site_domains'); ?> | <?php echo $this->lang->line('site_name'); ?>"/>
<meta name="og:url" content="<?php echo current_url(); ?>"/>
<meta name="og:image" content="<?php if(isset($imagesData[0]['sitelogo'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['sitelogo']; ?>" alt="thumbnail" />
<meta name="og:site_name" content="<?php echo $this->lang->line('site_domains'); ?> | <?php echo $this->lang->line('site_name'); ?>"/>
<meta name="og:description" content="<?php echo $this->lang->line('site_domains_metadescription'); ?>"/>
<link rel="icon" href="<?php if(isset($imagesData[0]['favicon'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['favicon']; ?>" alt="favicon" />
<!--------------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/headerscripts'); ?>
<!--------------------------------------------------------------------------------------------------------------->
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

<!--------------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/header'); ?>
<!--------------------------------------------------------------------------------------------------------------->
<div class="clearfix"></div>

<div class="margin-top-50 p-5"></div>

<!-- Page Content-->
<div class="container p-5">
    <!---Section Title--->
    <div class="container-fluid">
    <div class="jumbotron">
        <h2 class="slippa-section-title dark"><?php echo $this->lang->line('lang_domains_category_h2'); ?></h2>
        <p class="lead rtl-right"><?php echo $this->lang->line('lang_domains_category_p'); ?></p>
        <p><a href="<?php echo base_url()?>/domains" target="_blank" class="button ripple-effect move-on-hover full-width margin-top-20"><?php echo $this->lang->line('lang_domains_category_button'); ?></a></p>
    </div>
    </div>
    <!---/Section Title--->

    <?php if(!empty($sponsoredAds)) { ?>
    <!------Sponsored Ads---------> 
    <div class="margin-top-1">
    <div class="container">
    <div class="main-content">
    <div class="section featureds">
    <!--top heading--->
    <div class="row">
        <div class="col-sm-12">
          <div class="section-title featured-top">
            <h3><b><?php echo $this->lang->line('lang_sponsored_domains'); ?></b></h3>
          </div>
        </div>
    </div><!--/top heading--->
          
    <!-- Sponsored-slider -->
    <div class="featured-slider">
    <div id="<?php if(isset($slider_name)) echo $slider_name;  ?>">
    <?php $i=1; foreach ($sponsoredAds as $ad) { ?>
    <div class="featured">
    <span class="bookmark-icon"></span>
        <!--featured image -->
        <div class="featured-image slippa-category-box slippa-rounded-10 slippa-p-20">
        <?php if($settings[0]['image_thumbnails'] === '1') { ?>
        <a href="<?php echo base_url().$ad['sell_type'].'/'.$ad['sell_web'].'/'.$ad['id'];  ?>"><img src="<?php if(isset($ad['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$ad['website_thumbnail'];  ?>" alt="" class="img-sponsored"></a>
            <?php } else { ?>
        <a href="<?php echo base_url().$ad['sell_type'].'/'.$ad['sell_web'].'/'.$ad['id'];  ?>"><div class="category-box-icon domian-bg-color color--<?php echo $i; ?> text-center f-size-28">.<?php if(isset($ad['extension'])) echo $ad['extension'];  ?></div></a>
        <?php } ?>
        <?php if($ad['sell_type'] === 'auction') { ?>
        <a href="#" class="auction" data-toggle="tooltip" data-placement="left" title="AUCTION"><i class="fas fa-gavel"></i></a>
        <?php } else { ?>
         <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="CLASSIFIED"><i class="fab fa-adversal"></i></a>
        <?php } ?>
        </div><!-- featured image -->
                    
        <!-- ad-info -->
        <div class="ad-info">
        <h2 class="item-title">
            <strong><a href="#"><?php if(isset($ad['website_BusinessName'])) echo $ad['website_BusinessName'];  ?></a></strong>
        </h2>
        <h4 class="item-price"><?php if(isset($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($ad['website_buynowprice'])) echo number_format(floatval($ad['website_buynowprice'])); else echo number_format(floatval($ad['website_buynowprice']));  ?>
        </h4>
        </div><!-- ad-info -->
                    
        <!-- ad-meta -->
        <div class="ad-meta">
        <div class="meta-content">
            <span class="item-cat"><b><?php if(isset($ad['listing_type'])) echo strtoupper($this->lang->line($ad['listing_type']));  ?></b></span>
        </div>                  
            <!-- item-info-right -->
        <div class="user-option pull-right">
            <?php if($ad['user_id'] !== $this->session->userdata('user_id')) { ?>
                <?php if(!empty($ad['website_buynowprice'])) { ?>
            <a href="<?php echo base_url().'checkout/'.'buynow'.'/'.$ad['id']; ?>" class="text-primary" data-toggle="tooltip" data-placement="top" title="Buy Now"><i class="mdi mdi-cart-plus"></i></a>
                <?php } ?>
            <?php } else {  ?>
            <a href="#" class="add-to-cart-own text-primary" class="text-primary" data-toggle="tooltip" data-placement="top" title="Buy Now"><i class="mdi mdi-cart-plus"></i></a>  
              <?php } ?>
            <a href="<?php echo base_url().'user_profile/'.$ad['user_id'];  ?>" data-toggle="tooltip" data-placement="top" title="<?php if(isset($ad['username'])) echo $ad['username'];  ?>"><i class="fa fa-user"></i> </a>                     
        </div><!-- item-info-right -->
        </div><!-- ad-meta -->

    </div><!-- featured -->
    <?php $i++; } ?>  

    </div><!-- featured-slider -->
    </div><!-- #featured-slider -->
    </div><!-- featureds -->
    </div>

    </div>
    </div><!--/Sponsored Ads------>
    <?php } ?>

    <?php if(!empty($featuredDomains)) { ?>
    <!------Featured Domains---------> 
    <div class="margin-top-1">
    <div class="container">
    <div class="main-content">
    <div class="section featureds">
    <!--top heading--->
    <div class="row">
        <div class="col-sm-12">
          <div class="section-title featured-top">
            <h3><b><?php echo $this->lang->line('lang_featured_domains'); ?></b></h3>
          </div>
        </div>
    </div><!--/top heading--->
          
    <!-- Sponsored-slider -->
    <div class="featured-slider">
    <div id="<?php if(isset($slider_feat_name)) echo $slider_feat_name;  ?>">
    <?php $i=1; foreach ($featuredDomains as $ad) { ?>
    <div class="featured">
    <span class="bookmark-icon"></span>
        <!--featured image -->
        <div class="featured-image slippa-category-box slippa-rounded-10 slippa-p-20">
        <?php if($settings[0]['image_thumbnails'] === '1') { ?>
        <a href="<?php echo base_url().$ad['listing_option'].'/'.$ad['listing_type'].'/'.$ad['id'];  ?>"><img src="<?php if(isset($ad['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$ad['website_thumbnail'];  ?>" alt="" class="img-sponsored"></a>
            <?php } else { ?>
        <a href="<?php echo base_url().$ad['listing_option'].'/'.$ad['listing_type'].'/'.$ad['id'];  ?>"><div class="category-box-icon domian-bg-color color--<?php echo $i; ?> text-center f-size-28">.<?php if(isset($ad['extension'])) echo $ad['extension'];  ?></div></a>
        <?php } ?>
        <?php if($ad['listing_option'] === 'auction') { ?>
        <a href="#" class="auction" data-toggle="tooltip" data-placement="left" title="<?= $this->lang->line('lang_txt_auctions'); ?>"><i class="fas fa-gavel"></i></a>
        <?php } else { ?>
         <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="<?= $this->lang->line('lang_txt_classified'); ?>"><i class="fab fa-adversal"></i></a>
        <?php } ?>
        </div><!-- featured image -->
                    
        <!-- ad-info -->
        <div class="ad-info">
        <h2 class="item-title">
            <strong><a href="#"><?php if(isset($ad['website_BusinessName'])) echo $ad['website_BusinessName'];  ?></a></strong>
        </h2>
        <h4 class="item-price"><?php if(isset($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($ad['website_buynowprice'])) echo number_format(floatval($ad['website_buynowprice'])); else echo number_format(floatval($ad['website_buynowprice']));  ?>
        </h4>
        </div><!-- ad-info -->
                    
        <!-- ad-meta -->
        <div class="ad-meta">
        <div class="meta-content">
            <span class="item-cat"><b><?php if(isset($ad['listing_type'])) echo strtoupper($this->lang->line($ad['listing_type']));  ?></b></span>
        </div>                  
            <!-- item-info-right -->
        <div class="user-option pull-right">
            <?php if($ad['user_id'] !== $this->session->userdata('user_id')) { ?>
                <?php if(!empty($ad['website_buynowprice'])) { ?>
            <a href="<?php echo base_url().'checkout/'.'buynow'.'/'.$ad['id']; ?>" class="text-primary" data-toggle="tooltip" data-placement="top" title="Buy Now"><i class="mdi mdi-cart-plus"></i></a>
                <?php } ?>
            <?php } else {  ?>
            <a href="#" class="add-to-cart-own text-primary" class="text-primary" data-toggle="tooltip" data-placement="top" title="Buy Now"><i class="mdi mdi-cart-plus"></i></a>  
              <?php } ?>
            <a href="<?php echo base_url().'user_profile/'.$ad['user_id'];  ?>" data-toggle="tooltip" data-placement="top" title="<?php if(isset($ad['username'])) echo $ad['username'];  ?>"><i class="fa fa-user"></i> </a>                     
        </div><!-- item-info-right -->
        </div><!-- ad-meta -->

    </div><!-- featured -->
    <?php $i++; } ?>  

    </div><!-- featured-slider -->
    </div><!-- #featured-slider -->
    </div><!-- featureds -->
    </div>

    </div>
    </div><!--/Featured Domains------>
    <?php } ?>

    <!-- ad-section --> 
    <!-------------------------------------------------------------------------------------------------------------->
    <?php if(!empty($ads[0]['webpage_banner_720x90'])) { ?>                 
        <div class="ad-section text-center margin-bottom-25">
            <?php print_r($ads[0]['webpage_banner_720x90']); ?>
        </div>
    <?php } ?>
    <!--------------------------------------------------------------------------------------------------------------->
    <!-- ad-section / End-->
    

    <!-- Featured Domains -->   
    <!--------------------------------------------------------------------------------------------------------------->
    <?php $this->load->view('main/add-ons/domains-listings'); ?>
    <!--------------------------------------------------------------------------------------------------------------->
    <!-- Featured Domains / End-->
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->
<!--------------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/footer'); ?>
<!--------------------------------------------------------------------------------------------------------------->

</div>
<!-- Wrapper / End -->
<!--------------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/footerscripts'); ?>
<!--------------------------------------------------------------------------------------------------------------->

</body>
</html>
<!DOCTYPE html>
<html dir="<?= !empty($l_format) ? $l_format : 'ltr'; ?>" lang="<?php if(!empty($language)) echo $language; else echo 'en'; ?>">
<head>
<!-- Meta Tags--->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="author" content="onlinetoolhub.com">
<meta name="keywords" content="<?php echo $this->lang->line('site_keywords'); ?>"/>
<meta name="description" content="<?php if(isset($userprofile[0]['user_metadescription'])) echo $userprofile[0]['user_metadescription'];?>"/>
<meta name="copyright"content="onlinetoolhub">
<meta name="robots" content="index,follow" />
<meta name="url" content="<?php echo current_url(); ?>">
<title><?php if(isset($userprofile[0]['username'])) echo $userprofile[0]['username']; ?> | <?php echo $this->lang->line('site_name'); ?> </title>
<meta name="og:title" content="<?php if(isset($userprofile[0]['username'])) echo $userprofile[0]['username']; ?> | Domain Marketplace "/>
<meta name="og:url" content="<?php echo current_url(); ?>"/>
<meta name="og:image" content="<?php if(isset($userprofile[0]['thumbnail'])) echo base_url().USER_UPLOAD.$userprofile[0]['thumbnail']; ?>" alt="thumbnail" />
<meta name="og:site_name" content="<?php if(isset($userprofile[0]['username'])) echo $userprofile[0]['username']; ?> | <?php echo $this->lang->line('site_name'); ?>"/>
<meta name="og:description" content="<?php if(isset($userprofile[0]['user_metadescription'])) echo $userprofile[0]['user_metadescription'];?>"/>
<link rel="icon" href="<?php if(isset($imagesData[0]['favicon'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['favicon']; ?>" alt="favicon" />
<!--- /Meta Tags --->

<!--------------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/headerscripts'); ?>
<!--------------------------------------------------------------------------------------------------------------->

</head>

<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

<!--------------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/header'); ?>
<!--------------------------------------------------------------------------------------------------------------->
<div class="clearfix"></div>
<!--------------------------------------------------------------------------------------------------------------->

<div class="margin-top-50 p-5"></div>


<!-- Page Content-->
<div class="container p-5">
	<div class="row">
		<input type="hidden" name="listingidwebsite" id="listingidwebsite" value="<?php if(isset($listing_data[0]['id'])) echo $listing_data[0]['id']; ?>">
		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">
		<div class="imil-box margin-bottom-30">
            <div class="slippa-box-style-2">
                <h4 class="f-size-36 f-size-xs-30 slippa-semiblod text-422"><?php if(isset($userprofile[0]['firstname'])) echo $userprofile[0]['firstname'].' '.$userprofile[0]['lastname']; ?> <span></h4>  
                	<?php if(!empty($this->session->userdata('user_id'))) { ?>
					<?php if($userprofile[0]['user_id'] !== $this->session->userdata('user_id')) { ?>
					<a href="#small-dialog-2" class="popup-with-zoom-anim badge badge-light"><i class="icon-material-outline-thumb-up"></i> <?= $this->lang->line('lang_model_leave_review_title'); ?></a>
					<?php } } ?>  
                <div class="row margin-top-50">
                    <div class="domain-border col-lg-4">
                        <span class="d-block f-size-24 slippa-semiblod"><?php if(isset($userprofile[0]['username'])) echo '@'.$userprofile[0]['username']; ?></span>
                        <span class="d-block f-size-16 slippa-light3"><?= $this->lang->line('lang_user_username'); ?></span>
                    </div>

                    <div class="domain-border col-lg-4">
                        <span class="d-block f-size-24 slippa-semiblod"><div class="star-rating" data-rating="<?php if(isset($profileRatingsAvg[0]['avg_r'])) echo number_format(floatval($profileRatingsAvg[0]['avg_r']),1); ?>"></div></span>
                        <span class="d-block f-size-16 slippa-light3"><?= $this->lang->line('lang_user_reviews'); ?></span>
                    </div>

                    <div class="col-lg-4 media-body">
                        <span class="d-block f-size-24 slippa-semiblod">
						<img class="flag" src="<?php echo base_url().ICON_FLAGS ?><?php if(isset($userprofile[0]['user_country'])) echo strtolower($userprofile[0]['user_country']); ?>.svg" alt=""> <?php if(isset($userprofile[0]['user_country'])) echo strtoupper($userprofile[0]['user_country']); ?></span>
                        <span class="d-block f-size-16 slippa-light3"><?= $this->lang->line('lang_user_country'); ?></span>
                   </div>

                </div><!-- /.d-flex -->
            </div><!-- /.slippa-box-style-2 -->
            <div class="slippa-gradient-4 text-center f-size-18 slippa-semiblod padding-top-10 margin-bottom-10 padding-bottom-10 text-white">
                <?= $this->lang->line('lang_user_premium_tag'); ?>
           	</div><!-- /.slippa-gradient-4 -->
        </div><!-- /.imil-box -->

        <div class="imil-box">
        <div class="slippa-box-style-2 margin-bottom-30">
        	<span class="f-size-24 d-block margin-bottom-30"><h3><?= $this->lang->line('lang_user_about_me'); ?></h3></span>
        	 <!-- About me -->
			<p class="f-size-18 slippa-light3 line-height-34"><?php if(isset($userprofile[0]['user_description'])) echo $userprofile[0]['user_description']; ?></p>

			<!----User Review ------>
			<div id="user_reviews_tab" class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-thumb-up"></i> <?= $this->lang->line('lang_user_user_reviews'); ?></h3>
				</div>
				<ul class="boxed-list-ul">
					<?php if(!empty($profileRatings)) { foreach ($profileRatings as $review) { ?>

					<!----User Review ------>
					<li>
						<div class="boxed-list-item">
							<div class="review-avatar">
								<a href="<?php echo base_url().'main/user_profile/'.$review['user_id']; ?>"><img src="<?php if(isset($review['thumbnail'])) echo base_url().USER_UPLOAD.$review['thumbnail']; ?>" alt=""></a>
							</div>
							<!-- Content -->
							<div class="item-content">

								<h4><a href="<?php echo base_url().'main/user_profile/'.$review['user_id']; ?>"><?php if(isset($review['username'])) echo $review['firstname'].' '.$review['lastname']; ?> <span><?php if(isset($review['username'])) echo '@'.$review['username']; ?></span></a></h4>
								<div class="item-details margin-top-10">
									<div class="star-rating" data-rating="<?php if(isset($review['ratings'])) echo number_format(floatval($review['ratings']),1); ?>"></div>
									<div class="detail-item"><i class="icon-material-outline-date-range"></i><?php echo date('M/Y', strtotime($review['date'])); ?></div>
								</div>
								<div class="item-description">
									<p><?php if(isset($review['review'])) echo $review['review']; ?> </p>
								</div>
							</div>
						</div>
					</li>
					<!----/Ends User Review ------>
					<?php } } ?>

				</ul>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="pagination-container margin-top-40 margin-bottom-10 centerButtons">
					<nav class="pagination paginationReviews">
						<ul>
							<?php if(isset($links)) { echo $links; }?>
						</ul>
					</nav>
				</div>
				<div class="clearfix"></div>
				<!-- Pagination / End -->

			</div>
			<!----/Ends User Reviews ------>

        </div>
    	</div>

        </div>

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				<!----About Seller --->
				<div class="sidebar-widget">
					<div class="seller-box margin-bottom-30">
                    <div class="slippa-box-style-2">
                        <h4 class="f-size-20 slippa-semiblod text-center"><?= $this->lang->line('lang_payments_seller_head'); ?></h4>
                        <div class="media  margin-top-30">
                            <div class="media-body text-center">
                            	<img src="<?php if(isset($userprofile[0]['thumbnail'])) echo base_url().USER_UPLOAD.$userprofile[0]['thumbnail']; ?>" alt="" class="msgavatar centerButtons">

                                <h5 class="margin-bottom-15 f-size-24 slippa-semiblod"><a href="<?php echo base_url().'user_profile/'.$userprofile[0]['username']?>"><?php if(isset($userprofile[0]['username'])) echo $userprofile[0]['username']; ?></a></h5>
                                <img class="flag" src="<?php echo base_url().ICON_FLAGS ?><?php if(isset($userprofile[0]['user_country'])) echo strtolower($userprofile[0]['user_country']); ?>.svg" alt=""> <?php if(isset($userprofile[0]['user_country'])) echo strtoupper($userprofile[0]['user_country']); ?>
                                <p class="margin-bottom-15 f-size-18 text-338">
                                    <div class="star-rating" data-rating="<?php if(isset($profileRatingsAvg[0]['avg_r'])) echo number_format(floatval($profileRatingsAvg[0]['avg_r']),1); ?>"></div>
                                </p>
                            </div>
                        </div>
                    </div><!-- /.slippa-box-style-3 -->
                </div><!-- /.seller-box -->
				</div>
				
				<!-- Profile Overview -->
				<div class="profile-overview">
					<div class="overview-item"><strong><?php if(isset($default_currency)) echo $default_currency; else echo '$'; ?><?php if(isset($totalEarnings)) echo number_format(floatval($totalEarnings)); ?></strong><span><?= $this->lang->line('lang_user_earnings'); ?></span></div>
					<div class="overview-item"><strong><?php echo count($websitelistings); ?></strong><span><?= $this->lang->line('lang_user_listings'); ?></span></div>
					<div class="overview-item"><strong><?php echo count($soldlistings); ?></strong><span><?= $this->lang->line('lang_user_sold'); ?></span></div>
				</div>

				<?php if($userprofile[0]['user_id'] !== $this->session->userdata('user_id')) { ?>
				<!-- Button -->
				<a href="#small-dialog-3" class="apply-now-button popup-with-zoom-anim margin-bottom-50"><?= $this->lang->line('lang_user_contact_me'); ?> <i class="icon-material-outline-arrow-right-alt"></i></a>
				<?php } ?>

				<!-- seller Indicators -->
				<div class="sidebar-widget">
					<div class="seller-indicators">

						<!-- Indicator -->
						<div class="indicator">
							<strong><?php if(!empty($profileRatingsAvg[0]['avg_r']) || $profileRatingsAvg[0]['avg_r'] !== 0) echo (floatval($profileRatingsAvg[0]['avg_r']) / 5) * 100; else echo 0; ?>%</strong>
							<div class="indicator-bar" data-indicator-percentage="<?php if(!empty($profileRatingsAvg[0]['avg_r']) || $profileRatingsAvg[0]['avg_r'] !== 0) echo (floatval($profileRatingsAvg[0]['avg_r']) / 5) * 100; else echo 0; ?>"><span></span></div>
							<span><?= $this->lang->line('lang_user_user_rartings'); ?></span>
						</div>

						<!-- Indicator -->
						<div class="indicator">
							<strong><?php if( count($websitelistings) !== 0 &&  count($soldlistings) !== 0) echo number_format((count($soldlistings) /  count($websitelistings)) * 100 , 2); else echo 0; ?>%</strong>
							<div class="indicator-bar" data-indicator-percentage="<?php if( count($websitelistings) !== 0 &&  count($soldlistings) !== 0) echo number_format((count($soldlistings) /  count($websitelistings)) * 100 , 2); else echo 0; ?>"><span></span></div>
							<span><?= $this->lang->line('lang_user_selling_score'); ?></span>
						</div>

					</div>
				</div>
				
				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					<h3><?= $this->lang->line('lang_btn_share'); ?></h3>
					<!-- Copy URL -->
					<div class="copy-url">
						<input id="copy-url" type="text" value="" class="with-border">
						<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="<?php echo $this->lang->line('lang_pop_copy');  ?>" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
					</div>

					<!-- Share Buttons -->
					<div class="share-buttons margin-top-25">
						<div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
						<div class="share-buttons-content">
							<span><?php echo $this->lang->line('lang_social_interesting');  ?> <strong><?php echo $this->lang->line('lang_social_share');  ?></strong></span>
							<ul class="share-buttons-icons">
								<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url(); ?>" data-button-color="#3b5998" title="Share on <?php echo $this->lang->line('lang_social_facebook');  ?>" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/intent/tweet?text=<?php echo current_url(); ?>" data-button-color="#1da1f2" title="Share on <?php echo $this->lang->line('lang_social_Twitter');  ?>" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
								<li><a href="#" data-button-color="#dd4b39" title="Share on <?php echo $this->lang->line('lang_social_Google');  ?>" data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>
								<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=<?php echo current_url(); ?>" data-button-color="#0077b5" title="Share on <?php echo $this->lang->line('lang_social_linkedin');  ?>" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!------MORE FROM SAME USER--------------------------------------------------------------------------------------------> 
		<?php if(!empty($websitelistings)) {?>
    	<div class="container">
      		<div class="main-content">
          		<div class="section featureds">
              
            		<div class="row">
              			<div class="col-sm-12">
                			<div class="section-title featured-top">
                  				<h4> <?= $this->lang->line('lang_user_more_from'); ?>  <a href="<?php if(isset($review['user_id'])) echo base_url().'main/user_profile/'.$review['user_id']; ?>"><?php if(isset($userprofile[0]['username'])) echo $userprofile[0]['username']; ?></a></h4>
                			</div>
              			</div>
            		</div>

            		<!-- featured-slider -->
            		<div class="featured-slider">
                	<div id="user-products-slider" >
                		<?php $i=1; foreach ($websitelistings as $ad) { ?>
                  		<!-- featured -->
                  		<div class="featured box-hover">

                    	<!--featured image -->
        				<div class="featured-image slippa-category-box slippa-rounded-10 slippa-p-20">
            				<?php if($settings[0]['image_thumbnails'] === '1') { 
            				if($ad['listing_type'] === 'website' && $settings[0]['active_domain_screenshots'] === '1') { ?>
                            <a href="<?php echo base_url().$ad['listing_option'].'/'.$ad['listing_type'].'/'.$ad['id'];  ?>"><img src="<?php if(isset($ad['screenshot'])) echo base_url().SCREENSHOTS.$ad['screenshot'].'.jpg';  ?>" alt="" class="img-screenshot-thumb"></a>
                            <?php } else { ?> <a href="<?php echo base_url().$ad['listing_option'].'/'.$ad['listing_type'].'/'.$ad['id'];  ?>"><img src="<?php if(isset($ad['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$ad['website_thumbnail'];  ?>" alt="" class="img-sponsored"></a> 
                            <?php  } } else { ?>
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
                        		<span class="item-cat"><b><!--<a href="#"><?php if(isset($ad['category'])) echo $ad['category'];  ?></a>--><?php if(isset($ad['listing_type'])) echo strtoupper($this->lang->line($ad['listing_type']));  ?></b></span>
                      		</div>                  
                      		<div class="user-option pull-right">
                        		<?php if($ad['user_id'] !== $this->session->userdata('user_id')) { ?>
                        			<?php if(!empty($ad['website_buynowprice'])) { ?>
                        			<a href="<?php echo base_url().'checkout/'.'buynow'.'/'.$ad['id']; ?>" class="text-primary" data-toggle="tooltip" data-placement="top" title="<?= $this->lang->line('lang_txt__al_buy_now'); ?>"><i class="mdi mdi-cart-plus"></i></a>
                        			<?php } ?>
                        		<?php } else {  ?>
                        		<a href="#" class="add-to-cart-own text-primary" data-toggle="tooltip" data-placement="top" title="<?= $this->lang->line('lang_txt__al_buy_now'); ?>" ><i class="mdi mdi-cart-plus"></i></a>  
                        		<?php } ?>
                        		<a href="<?php echo base_url().'user_profile/'.$ad['user_id'];  ?>" data-toggle="tooltip" data-placement="top" title="<?php if(isset($ad['username'])) echo $ad['username'];  ?>"><i class="fa fa-user"></i> </a>                     
                      		</div><!-- item-info-right -->
                    	</div><!-- ad-meta -->

                  		</div><!-- featured -->
                  		<?php $i++; } ?>
                	</div><!-- featured-slider -->
              		</div><!-- #featured-slider -->
          		</div><!-- featureds -->
          		<!--------------------------------------------------------------------------------------------------------------->
      		</div>
  		</div>
  		<?php } ?>
		<!--------------------------------------------------------------------------------------------------------------->

	</div>
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->

<!-- Footer / End -->
<!----------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/footer'); ?>
<!----------------------------------------------------------------------------------------------------------->

</div>
<!-- Wrapper / End -->

<!--------------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/models'); ?>
<!--------------------------------------------------------------------------------------------------------------->


<!--------------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/footerscripts'); ?>
<!--------------------------------------------------------------------------------------------------------------->

</body>
</html>
<!DOCTYPE html>
<html dir="<?= !empty($l_format) ? $l_format : 'ltr'; ?>" lang="<?php if(!empty($language)) echo $language; else echo 'en'; ?>">
<head>
	<!-- Meta Tags--->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="onlinetoolhub.com">
	<meta name="keywords" content="<?php echo $this->lang->line('site_keywords'); ?>"/>
	<meta name="description" content="<?php echo $this->lang->line('site_metadescription'); ?>"/>
	<meta name="copyright"content="onlinetoolhub">
	<meta name="robots" content="index,follow" />
	<meta name="url" content="<?php echo base_url(); ?>">
	<title><?php echo $this->lang->line('site_title'); ?></title>
	<meta name="og:title" content="<?php echo $this->lang->line('site_title'); ?>"/>
	<meta name="og:url" content="<?php echo current_url(); ?>"/>
	<meta name="og:image" content="<?php if(isset($imagesData[0]['sitelogo'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['sitelogo']; ?>" alt="thumbnail" />
	<meta name="og:site_name" content="<?php if(isset($page[0]['txt_page_title'])) echo $page[0]['txt_page_title']; ?> | Domain Marketplace "/>
	<meta name="og:description" content="<?php echo $this->lang->line('site_metadescription'); ?>"/>
	<link rel="icon" href="<?php if(isset($imagesData[0]['favicon'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['favicon']; ?>" alt="favicon" />
	<!--- /Meta Tags --->

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/includes/headerscripts'); ?>
	<!--------------------------------------------------------------------------------------------------------------->

</head>

<body>

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/includes/header'); ?>
	<!--------------------------------------------------------------------------------------------------------------->

	<div class="clearfix"></div>

	<!-- Page Content-->
	<div class="container-fluid home-page-container">
		<div class="row mb-3">
			<div class="col-md-12">
				<div class="card border-0 rounded">
					<section class="banner-section-seven">
						<div class="image-outer">
							<figure class="image"><img src="assets/img/banner-img-1.png" alt=""></figure>
						</div>
						<div class="auto-container">
							<div class="row">
								<div class="content-column col-lg-7 col-md-12 col-sm-12">
									<div class="inner-column">
										<div class="title-box wow fadeInUp" data-wow-delay="500ms">
											<h3 class="font-weight-bold"><?php echo $this->lang->line('lang_model_main_title'); ?></h3>
											<div class="text"><?php echo $this->lang->line('lang_homepage_sub'); ?></div>
										</div>

										<!-- Job Search Form -->
										<div class="job-search-form wow fadeInUp" data-wow-delay="1000ms">
											<form id="home_search" name="home_search" method="post" action="<?php echo base_url().'main/search/' ?>">
												<div class="row">
													<div class="form-group col-lg-5 col-md-5 col-sm-5 search">
														<span class="icon fa fa-search"></span>
														<input type="text" name="searchterm" placeholder="<?php echo $this->lang->line('lang_search_placeholder'); ?>">
													</div>
													<!-- Form Group -->
													<div class="form-group col-lg-4 col-md-4 col-sm-4 category">
														<span class="icon fa fa-filter"></span>
														<select class="chosen-select search-category">
															<?php foreach ($platforms as $platform) { ?>
																<option value="<?php echo $platform['platform']; ?>"><?php echo ucfirst($this->lang->line($platform['platform'])); ?></option>
															<?php } ?>
														</select>
													</div>
													<!-- Form Group -->
													<div class="form-group col-lg-3 col-md-3 col-sm-3 btn-box">
														<button type="submit" class="slippa-btn slippa-gradient pill btn-style-one"><span class="fa fa-search"></span> </button>
													</div>
												</div>
											</form>
										</div>
										<!-- Job Search Form -->
										<div class="product-hunt">
											<a href="https://www.producthunt.com/posts/namesden?utm_source=badge-featured&utm_medium=badge&utm_souce=badge-namesden" target="_blank">
											<img src="https://api.producthunt.com/widgets/embed-image/v1/featured.svg?post_id=370584&theme=dark" alt="NamesDen - &#0032;Buy&#0032;and&#0032;Premium&#0032;Businesses&#0032;and&#0032;Domain&#0032;name&#0032;for&#0032;Sale | Product Hunt" style="width: 250px; height: 54px;" width="250" height="54" /></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>

			<div class="col-lg-6 col-md-12 col-sm-12 p-5">
				<div class="card border-0 card-partners">
					<div class="card-title mb-3">
						<h3 class="title text-bold font-weight-bold">Our Partners</h3>
					</div>
					<section class="clients-section-two wow fadeInUp" data-wow-delay="2000ms">
						
						<ul class="sponsors-carousel-two owl-carousel owl-theme">
							<li class="slide-item">
								<figure class="image-box"><a href="#"><img src="assets/img/clients/1-1.png" alt=""></a></figure>
							</li>
							<li class="slide-item">
								<figure class="image-box"><a href="#"><img src="assets/img/clients/1-2.png" alt=""></a></figure>
							</li>
							<li class="slide-item">
								<figure class="image-box"><a href="#"><img src="assets/img/clients/1-3.png" alt=""></a></figure>
							</li>
							<li class="slide-item">
								<figure class="image-box"><a href="#"><img src="assets/img/clients/1-4.png" alt=""></a></figure>
							</li>
							<li class="slide-item">
								<figure class="image-box"><a href="#"><img src="assets/img/clients/1-5.png" alt=""></a></figure>
							</li>
							<li class="slide-item">
								<figure class="image-box"><a href="#"><img src="assets/img/clients/1-6.png" alt=""></a></figure>
							</li>
							<li class="slide-item">
								<figure class="image-box"><a href="#"><img src="assets/img/clients/1-7.png" alt=""></a></figure>
							</li>
						</ul>
					</section>
				</div>
				
			</div>
		</div>
	</div>

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/add-ons/videos-home'); ?>
	<!--------------------------------------------------------------------------------------------------------------->

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/add-ons/popular-categories'); ?>
	<!--------------------------------------------------------------------------------------------------------------->

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/add-ons/recent-listings'); ?>
	<!--------------------------------------------------------------------------------------------------------------->

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/add-ons/fun-facts'); ?>
	<!--------------------------------------------------------------------------------------------------------------->

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/add-ons/featured-domains-home'); ?>
	<!--------------------------------------------------------------------------------------------------------------->

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/add-ons/featured-blog-posts-home'); ?>
	<!--------------------------------------------------------------------------------------------------------------->

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/includes/footer'); ?>
	<!--------------------------------------------------------------------------------------------------------------->


	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/includes/footerscripts'); ?>
	<script>loadTrendingAds(); auctionListings();</script>
	<!--------------------------------------------------------------------------------------------------------------->

</body>
</html>
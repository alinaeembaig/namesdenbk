<!DOCTYPE html>
<html dir="<?= !empty($l_format) ? $l_format : 'ltr'; ?>" lang="<?php if(!empty($language)) echo $language; else echo 'en'; ?>">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="author" content="onlinetoolhub.com">
<meta name="keywords" content="<?php echo $this->lang->line('site_keywords'); ?>"/>
<meta name="description" content="<?php echo $this->lang->line('site_metadescription'); ?>"/>
<meta name="copyright"content="onlinetoolhub">
<meta name="robots" content="index,follow" />
<meta name="url" content="<?php echo base_url(); ?>">
<title><?php echo 'SEARCH '.strtoupper($searchtype) ?> | <?php echo $this->lang->line('site_name'); ?> </title>
<meta name="og:title" content="<?php echo 'SEARCH '.strtoupper($searchtype) ?> | Domain Marketplace"/>
<meta name="og:url" content="<?php echo current_url(); ?>"/>
<meta name="og:image" content="<?php if(isset($imagesData[0]['sitelogo'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['sitelogo']; ?>" alt="thumbnail" />
<meta name="og:site_name" content="<?php echo 'SEARCH '.strtoupper($searchtype) ?> | <?php echo $this->lang->line('site_name'); ?> "/>
<meta name="og:description" content=""/>
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
<!-- Header Container / End -->


<div class="clearfix"></div>

<!-- Spacer -->
<div class="margin-top-40"></div>
<!-- Spacer / End-->

<!--SEARCH BAR -->
<section class="home-page-container p-5">
	<div class="container">
		<!-- Search Filter -->
		<div class="row extra-mrg">
			<div class="wrap-search-filter">
				<form>
					<div class="row">
						<div class="col-md-8 col-sm-8">
							<input id="searchterm" name="searchterm" value="<?php if(!empty($searchterm)) echo $searchterm; ?>" type="text" class="form-control border" placeholder="Keyword: Name, Tag">
						</div>
								
						<div class="col-md-4 col-sm-2">
							<button type="button" class="btn btn-primary full-width-button button-search slippa-gradient"><?= $this->lang->line('lang_search_btn_filter'); ?></button>
						</div>
					</div>

					<!-----collapse menu ------->
					<div class="row margin-top-10">
						<div class="col-md-12 col-sm-12">
							<a id="sidebar-toggle" class="float-right sidebar-toggle" type="button" data-toggle="collapse" href='#sidebar-search' aria-expanded='false' aria-controls='sidebar-search'><i class="fa fa-plus">&nbsp;</i><?= $this->lang->line('lang_search_advance_filters'); ?></a>
						</div>
					</div>
					<!-----/collapse menu ------->
					<input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
				</form>
			</div>
		</div>
		<!-- /Search Filter -->
	</div>
</section>
<!----/ SEARCH BAR -->

<!-- Page Content-->
<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-4">
			<div id="sidebar-search" class="sidebar-container collapse show">
				
				<!-- Location -->
				<div class="sidebar-widget">
					<h3><?= $this->lang->line('lang_search_filter_country'); ?></h3>
					<select id="location-input" name="location-input" class="form-control default">
						<option value=""><?= $this->lang->line('lang_search_filter_any'); ?></option>
					</select>
				</div>

				<!-- Keywords -->
				<div class="sidebar-widget">
					<h3><?= $this->lang->line('lang_search_filter_marketplace'); ?></h3>
					<div class="keywords-container">
						<div class="keyword-input-container">
							<input type="text" class="keyword-input" placeholder="e.g. domains title"/>
							<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
						</div>
						<div class="keywords-list"><!-- keywords go here --></div>
						<div class="clearfix"></div>
					</div>
				</div>
				
				<?php if($searchtype === 'website') { ?>
				<!--Website Category -->
				<div class="sidebar-widget">
					<h3><?= $this->lang->line('lang_search_filter_website_cat'); ?></h3>
					<select id="website_industry" name="website_industry" class="form-control default">
						<option value=""><?= $this->lang->line('lang_search_filter_any'); ?></option>
						<?php foreach ($categoriesData as $key) { ?>
							<option value="<?php echo $key['c_id']; ?>"><?php echo $key['c_name']; ?></option>
						<?php } ?>
					</select>
				</div>
				<?php } ?>

				<?php if($searchtype !== 'app') { ?>
				<!--Domain Extension -->
				<div class="sidebar-widget">
					<?php if($searchtype !== 'account') { ?>
					<h3><?= $this->lang->line('lang_search_filter_domain_ext'); ?></h3>
					<select id="extension" name="extension" class="form-control default">
						<option value=""><?= $this->lang->line('lang_search_filter_any'); ?></option>
					</select>
					<?php } else {  ?>
					<h3><?= $this->lang->line('lang_search_filter_channel'); ?></h3>
					<select id="extension" name="extension" class="form-control default">
						<option value=""><?= $this->lang->line('lang_search_filter_any'); ?></option>
						<?php foreach ($platform_list as $key) { ?>
							<option value="<?=$key['platfrom_domain']?>"><?=$key['platfrom']?></option>
						<?php } ?>
					</select>
					<?php } ?>
				</div>
				<?php } ?>
				
				<?php if(in_array('auction',array_column($options,'platform')) && in_array('classified',array_column($options,'platform'))) {?>
				<!-- domains Types -->
				<div class="sidebar-widget">
					<h3><?= $this->lang->line('lang_search_filter_listing_types'); ?></h3>

					<div class="switches-list">
						<div class="switch-container">
							<label class="switch"><input id="auction_check" name="auction_check" type="checkbox"><span class="switch-button"></span> <?= $this->lang->line('lang_search_filter_auction_listing'); ?></label>
						</div>

						<div class="switch-container">
							<label class="switch"><input id="classified_check" name="classified_check" type="checkbox"><span class="switch-button"></span> <?= $this->lang->line('lang_search_filter_classified_list'); ?></label>
						</div>

					</div>

				</div>
				<?php } ?>

				<!-- Price Range -->
				<div class="sidebar-widget">
					<h3><?= $this->lang->line('lang_search_filter_price_range'); ?></h3>
					<div class="margin-top-55"></div>
					<!-- Range Slider -->
					<input class="range-slider" type="text" value="" data-slider-currency="<?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?>" data-slider-min="<?php echo RANGE_MIN ?>" data-slider-max="<?php echo RANGE_MAX ?>" data-slider-step="<?php echo RANGE_STEP ?>" data-slider-value="[<?php echo RANGE_MIN ?>,<?php echo RANGE_MAX ?>]"/>
				</div>

			</div>
		</div>

		<input type="hidden" name="listing_type" id="listing_type" value="<?php echo $searchtype; ?>">
		<div id="results_div" class="col-xl-9 col-lg-8 content-left-offset">

		<h3 class="page-title"><?= $this->lang->line('lang_search_filter_results'); ?></h3>
		<div class="notify-box margin-top-15">
			<div class="sort-by">
				<span><?= $this->lang->line('lang_search_filter_results'); ?>:</span>
				<select id="sortyby" class="slippa-sort hide-tick">
					<option value="tbl_listings.date"><?= $this->lang->line('lang_sort_relevance'); ?></option>
					<option value="tbl_listings.views"><?= $this->lang->line('lang_sort_views'); ?></option>
					<option value="tbl_listings.date"><?= $this->lang->line('lang_sort_date'); ?></option>
				</select>
			</div>
		</div>

		<div id="searchResultsDiv" >
			
			<div class="listings-container grid-layout margin-top-35">
				
				<?php if(!empty($results)) { foreach ($results as $result) { ?>
				<!-- Listings -->
				<a href="<?php echo base_url().'item/'.$result['listing_type'].'/'.$result['website_BusinessName'].'/'.$result['id'];  ?>">
				<div class="domains-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden featured box-hover">
					<?php if(!empty($result['sponsored'])) { ?>
						<span class="tg-themetag tg-featuretag"><?= $this->lang->line('lang_search_filter_sponsored'); ?></span>
					<?php } ?>
					
					<div class="lable text-center pt-2 pb-2">
                        <ul class="list-unstyled best text-white mb-0 text-uppercase">
                            <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                        </ul>
                    </div>
					<!-- Listing Details -->
					<div class="domains-listing-details">
						<!-- Logo -->
						<div class="domains-listing-company-logo">
							<img src="<?php if(isset($result['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$result['website_thumbnail'];  ?>" alt="" class="img-sponsored">
						</div>

						<!-- Details -->
						<div class="ad-info">
							<h4 class="domains-listing-company"><?php if(isset($result['website_BusinessName'])) echo $result['website_BusinessName']; ?> 
							<?php if($result['google_verified'] === '1') { ?>
								<span class="verified-badge" title="<?= $this->lang->line('lang_search_google_ana'); ?>" data-tippy-placement="top"></span>
							<?php } ?>
							</h4>
							<h3 class="domains-listing-title"><?php if(isset($result['website_tagline'])) echo substr($result['website_tagline'], 0,60); ?></h3>
							<?php if($result['listing_type'] !== 'account') { ?>
							<a href="<?php base_url().'search/'.$result['listing_type']; ?>"><p class="text-muted mb-0"><img src="<?php echo base_url().ICON_UPLOAD.''.$result['categoryIcon']; ?>" alt="images" class="img-responsive text-primary mr-2 imageResize3"><?php if(isset($result['listing_type'])) echo strtoupper($this->lang->line($result['listing_type']));  ?></p></a>
							<?php } else { ?>
								<a href="<?php base_url().'search/'.$result['listing_type']; ?>"><b><?php if(isset($result['app_market'])) echo strtoupper($result['app_market']);  ?></b></p></a>
							<?php }?>
							<br>
							<?php if(!empty($result['website_buynowprice'])) { ?>
							<h4 class="item-price text-dark"><b><span><?php if(isset($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($result['website_buynowprice'])) echo number_format(floatval($result['website_buynowprice'])); else echo number_format(floatval($result['website_buynowprice']));  ?></b></h4>
							<?php } ?>
						</div>

						<div class="ad-meta">
							&nbsp;&nbsp;<i class="icon-material-outline-access-time"></i> <?php if(isset($result['ago'])) echo $result['ago'];  ?>
							&nbsp;&nbsp;<i class="fa fa-flag"></i> <?php if(isset($result['listing_option'])) echo $this->lang->line($result['listing_option']); ?>
							&nbsp;&nbsp;<i class="fa fa-user"></i> <?php if(isset($result['username'])) echo $result['username']; ?>
							&nbsp;&nbsp;<?php if($result['user_id'] !== $this->session->userdata('user_id')) { ?>
							<?php if(!empty($result['website_buynowprice'])) { ?>
                            	<a href="<?php echo base_url().'checkout/'.'buynow'.'/'.$result['id']; ?>" class="text-warning float-right"><i class="mdi mdi-credit-card-scan"></i><?= $this->lang->line('lang_btn_pay_now'); ?></a>
                        		<?php } ?>
                            <?php } else { ?>
                            <a href="#" class="add-to-cart-own text-warning float-right"><i class="mdi mdi-credit-card-scan"></i> P a y   N o w</a>  
                            <?php } ?>
						</div>

						<span class="bookmark-icon"></span>

					</div>

				</div>
				</a>

				<?php } } else { ?>
				<h4 class="domains-listing-company"><?php echo $this->lang->line('lang_nodatafound'); ?>
				<?php } ?>	

			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="pagination-container margin-top-40 margin-bottom-10 centerButtons">
				<nav class="pagination paginationSearch">
					<ul>
						<?php if(!empty($links)) if(isset($links)) { echo $links; }?>
					</ul>
				</nav>
			</div>
			<div class="clearfix"></div>
			<!-- Pagination / End -->
		</div>
		</div>
	</div>
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
<script>populateListOfCountries('location-input','');</script>
<script>
	$(window).bind('resize load', function (){
		if($(this).width() < 922){
			$('.collapse').removeClass('show');
		}
		else
		{
			$('.collapse').addClass('show');
		}
	});
</script>
<?php if($searchtype !== 'account') { ?>
<script>populateListTlds('extension');</script>
<?php } ?>
<!--------------------------------------------------------------------------------------------------------------->

</body>
</html>
<!DOCTYPE html>
<html dir="<?= !empty($l_format) ? $l_format : 'ltr'; ?>" lang="<?php if(!empty($language)) echo $language; else echo 'en'; ?>">
<head>
	<!---meta tags---->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="onlinetoolhub.com">
	<meta name="keywords" content="<?php if(!empty($listing_data[0]['website_metakeywords'])) echo implode(',', json_decode(html_entity_decode($listing_data[0]['website_metakeywords']),true)); ?>"/>
	<meta name="description" content="<?php if(isset($listing_data[0]['website_metadescription'])) echo $listing_data[0]['website_metadescription']; ?>"/>
	<meta name="copyright"content="onlinetoolhub">
	<meta name="robots" content="index,follow" />
	<meta name="url" content="<?php echo base_url(); ?>">
	<title><?php if(isset($listing_data[0]['website_BusinessName'])) echo $listing_data[0]['website_BusinessName'];?> - <?= $this->lang->line('lang_payments_for_sale');  ?> </title>
	<meta name="og:title" content="<?php if(isset($listing_data[0]['website_BusinessName'])) echo $listing_data[0]['website_BusinessName'];?> - <?= $this->lang->line('lang_payments_for_sale');  ?>"/>
	<meta name="og:url" content="<?php echo current_url(); ?>"/>
	<meta name="og:image" content="<?php if(isset($listing_data[0]['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$listing_data[0]['website_thumbnail']; ?>" alt="thumbnail" />
	<meta name="og:site_name" content="<?php if(isset($listing_data[0]['website_BusinessName'])) echo $listing_data[0]['website_BusinessName']; ?> | Domain Marketplace"/>
	<meta name="og:description" content="<?php if(isset($listing_data[0]['website_metadescription'])) echo $listing_data[0]['website_metadescription']; ?>"/>
	<link rel="icon" href="<?php if(isset($imagesData[0]['favicon'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['favicon']; ?>" alt="favicon" />
	<!---/meta tags---->
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


		<!-- Page Content-->
		<div class="container detail-page-container">
			<div class="row">
				<input type="hidden" name="listingidwebsite" id="listingidwebsite" value="<?php if(isset($listing_data[0]['id'])) echo $listing_data[0]['id']; ?>">
				<div class="col-md-12">
					<div class="card bg-white shadow-lg border-0 mb-4 rounded">
						<div class="row">
							<div class="col-md-6 p-5 text-container">

								<div class="alert alert-warning">
									<p class="text-captitalize p-1">
										<b class="text-success"><?= rand(100,1000) ?></b>  <?= $this->lang->line('lang_customer_view_count');  ?> 
									</p>
								</div>

								<p class="f-size-16 slippa-light3 note"><?php if(isset($listing_data[0]['listing_type'])) echo $this->lang->line($listing_data[0]['listing_type']); ?> <?= $this->lang->line('lang_payments_for_sale');  ?> </p>
								<div class="d-flex justify-content-between mb-3">
									<div>
										<h2 class="f-size-22 text-uppercase font-weight-bold text-dark"><strong><?php if(isset($listing_data[0]['website_BusinessName'])) echo $listing_data[0]['website_BusinessName']; ?></strong></h2>
									</div>

									<div class="my-auto">
										<?php if($listing_data[0]['listing_option']=== 'auction') { ?>
											<h2 class="f-size-22 text-uppercase font-weight-bold text-dark"><strong><?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?> <?php echo number_format(floatval($currentPrice)); ?></strong></h2>
										<?php }?>

										<?php if($listing_data[0]['listing_option']=== 'classified') { ?>
											<h2 class="f-size-22 text-uppercase font-weight-bold text-dark"><strong><?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?> <?php echo number_format(floatval($listing_data[0]['website_buynowprice'])); ?></strong></h2>
										<?php }?>
									</div>
								</div>

								<p class="f-size-14 slippa-light3 line-height-34 text-justify"><?php if(isset($listing_data[0]['website_tagline'])) echo $listing_data[0]['website_tagline']; ?></p>

								<div class="d-flex justify-content-between">
									<div class="row pl-3">
										<p class="f-size-18 font-weight-bold text-muted">Category / </p>
										<p class="f-size-18 font-weight-bold text-dark text-muted ml-1"> <?php if(isset($selectedcategoriesData[0]['c_name'])) echo $selectedcategoriesData[0]['c_name']; ?></p>
									</div>

									<?php if($listing_data[0]['listing_option']=== 'auction') { ?>
										<div>
											<span class="bidding-detail" style="float: right;"><a href="#sign-in-dialog" class="popup-with-zoom-anim"> <?php echo count($validBids); ?> <strong><?= $this->lang->line('lang_payments_view_bids');  ?> </a> </strong></span>
										</div>
									<?php }?>
								</div>

								<div class="row mt-4">
									<?php if($listing_data[0]['user_id'] !== $this->session->userdata('user_id')) { ?>
										<?php if(!empty($listing_data[0]['website_buynowprice'])) { ?>
											<div class="col mb-2">
												<a href="<?php echo base_url().'checkout/'.'buynow'.'/'.$listing_data[0]['id']; ?>" class="btn btn-outline-success p-3 w-100 text-nowrap active"><i class="fa fa-shopping-cart mr-2"></i><?= $this->lang->line('lang_payments_buy_it');  ?></a>
											</div>
										<?php }  ?>
										
										<?php if ($auctionstatus ==='valid' && $listing_data[0]['listing_option'] ==='auction') { ?>
											<div class="col mb-2">
												<a href="#small-dialog" class="btn btn-outline-dark p-3 popup-with-zoom-anim w-100 text-nowrap"><i class="fa fa-gavel mr-2"></i><?php echo $this->lang->line('lang_single_page_place_bid');  ?></a>
											</div>
										<?php }  ?>

										<?php if ($listing_data[0]['listing_option'] ==='classified' ) { ?>
											<div class="col mb-2">
												<a href="#small-dialog-6" class="btn btn-outline-dark p-3 popup-with-zoom-anim w-100 text-nowrap"><i class="fa fa-usd mr-2"></i><?php echo $this->lang->line('lang_single_page_place_offer');  ?> </a>
											</div>
										<?php }  ?>

										<div class="col mb-2">
											<a href="#small-dialog-4" class="btn btn-outline-dark p-3 popup-with-zoom-anim w-100 text-nowrap"><i class="fa fa-comment-o mr-2"></i><?php echo $this->lang->line('lang_payments_seller_contact');  ?></a>
										</div>
									<?php }  ?>
								</div>

								<div class="row mt-4">
									<?php if(!empty($listing_data[0]['godaddy_link'])) { ?>
										<div class="col-md-12">
											<a href="<?= $listing_data[0]['godaddy_link'] ?>" class="btn btn-outline-dark text-uppercase p-4 popup-with-zoom-anim w-100 text-center active">Buy On GoDaddy.com </a>
										</div>
									<?php }  ?>

									<?php if(!empty($listing_data[0]['dan_link'])) { ?>
										<div class="col-md-12 mt-2">
											<a href="<?= $listing_data[0]['dan_link'] ?>" class="btn btn-outline-dark text-uppercase p-4 popup-with-zoom-anim w-100 text-center active">Buy On Dan.com </a>
										</div>
									<?php }  ?>
								</div>
								
							</div>

							<div class="col-md-6">
								<div class="container">
									<div class="carousel-container position-relative row">

										<div id="myCarousel" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner" style=" width:100%; height: 400px !important;">
												<?php if(!empty($listing_data[0]['screenshot'])) {
													foreach(json_decode($listing_data[0]['screenshot'],true) as $key=>$screenshot) { ?>
														<div class="carousel-item <?= $key === 0 ? 'active' : ''  ?> main" data-slide-number="<?= $key ?>">
															<img src="<?= base_url().IMAGES_UPLOAD.$screenshot['file_name'] ?>" class="d-block w-100" data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
														</div>
													<?php }}?>
												</div>
											</div>

											<!-- Carousel Navigation -->
											<div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">
													<div class="carousel-item active">
														<div class="row mx-0">
															<?php if(!empty($listing_data[0]['screenshot'])) {
																foreach(json_decode($listing_data[0]['screenshot'],true) as $key=>$screenshot) {  ?>
																	<div id="carousel-selector-<?= $key ?>" class="thumb col-4 col-sm-2 px-1 py-2 selected" data-target="#myCarousel" data-slide-to="<?= $key ?>">
																		<img src="<?= base_url().IMAGES_UPLOAD.$screenshot['file_name'] ?>" class="img-fluid">
																	</div>
																<?php }}?>
															</div>
														</div>
														<a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
															<span class="carousel-control-prev-icon" aria-hidden="true"></span>
															<span class="sr-only">Previous</span>
														</a>
														<a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
															<span class="carousel-control-next-icon" aria-hidden="true"></span>
															<span class="sr-only">Next</span>
														</a>
													</div>
												</div> <!-- /row -->
											</div> <!-- /container -->
										</div>
									</div>
								</div>

								<div class="d-flex justify-content-between p-5">
									<!-- TrustBox widget - Micro Review Count -->
									<div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="6229fba27d14ea2e09980b77" data-style-height="24px" data-style-width="100%" data-theme="light" data-min-review-count="10" data-style-alignment="center">
										<a href="https://www.trustpilot.com/review/namesden.com" target="_blank" rel="noopener">Trustpilot</a>
									</div>
									<!-- End TrustBox widget -->
									<img src="https://www.squadhelp.com/static_images/payment-method.svg">
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-4 mb-4 faq">
						<div class="col-md-12">
							<div class="card bg-white shadow-lg border-0 mb-4 rounded">
								<div class="row p-5">
									<div class="domain-border col">
										<span class="d-block f-size-24 slippa-semiblod"><?php if(isset($domainExpYears)) echo $domainExpYears; ?> <?= $this->lang->line('lang_payments_text_years');  ?></span>
										<span class="d-block f-size-16 slippa-light3"><?= $this->lang->line('lang_payments_text_age');  ?></span>
									</div>

									<div class="domain-border col media-body">
										<?php if (!in_array($listing_data[0]['listing_type'], array('account'))) { ?>
											<span class="d-block f-size-24 slippa-semiblod"><img class="flag" src="<?php echo base_url().ICON_FLAGS ?><?php if(isset($listing_data[0]['business_registeredCountry'])) echo strtolower($listing_data[0]['business_registeredCountry']); ?>.svg" alt=""> <?php if(isset($listing_data[0]['business_registeredCountry'])) echo strtoupper($listing_data[0]['business_registeredCountry']); ?></span>
											<span class="d-block f-size-16 slippa-light3"><?= $this->lang->line('lang_payments_text_country');  ?></span>
										<?php } else { ?>
											<img class="flag" src="<?php echo base_url().CATEGORY_IMAGES ?>/<?php if(isset($platfrom[0]['platfrom_icon'])) echo strtolower($platfrom[0]['platfrom_icon']); ?>" alt=""> <?php if(isset($platfrom[0]['platfrom'])) echo strtoupper($platfrom[0]['platfrom']); ?></span>
											<span class="d-block f-size-16 slippa-light3"><?= $this->lang->line('lang_payments_text_channel');  ?></span>
										<?php } ?>
									</div>

									<div class="col">
										<?php if(in_array($listing_data[0]['listing_type'], array('domain','website'))) { ?>
											<span class="d-block f-size-24 slippa-semiblod"><?php if(!empty($domainRegistar)) echo $domainRegistar; else echo $this->lang->line('lang_txt_na'); ?></span>
											<span class="d-block f-size-16 slippa-light3">Registar</span>
										<?php } else { ?>
											<span class="d-block f-size-24 slippa-semiblod"><?php if(!empty($listing_data[0]['monthly_downloads'])) echo number_format($listing_data[0]['monthly_downloads']); else echo $this->lang->line('lang_txt_na'); ?></span>
											<?php if(in_array($listing_data[0]['listing_type'], array('app'))) { ?>
												<span class="d-block f-size-16 slippa-light3"><?= $this->lang->line('lang_payments_text_downloads');  ?></span>
											<?php } else {   ?>
												<span class="d-block f-size-16 slippa-light3"><?= $this->lang->line('lang_payments_text_likes');  ?> </span>
											<?php } ?>

										<?php } ?>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="row mt-4 mb-4 faq">
						<div class="col-md-12">
							<div class="card bg-white shadow-lg border-0 mb-4">
								<div class="row">
									<div class="col-md-12 p-5">
										<!------------------------------------------------------------------------------------------------->
										<?php $this->load->view('main/add-ons/google-analytics'); ?>
										<!------------------------------------------------------------------------------------------------->
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-4 mb-4 faq">
						<div class="col-md-12">
							<div class="card bg-white shadow-lg border-0 mb-4">
								<div class="row">

									<?php if(empty($this->session->userdata('user_id'))) { ?>
										<div class="card__overlay">
											<div class="row word">
												<div class="col-md-12">
						<!--<div class="lock">
							<i class="fa fa-lock"></i>
						</div>-->

						<div class="text-center">
							<i class="fa fa-lock"></i>
							<h3 class="text-captitalize text-muted mb-3"><?= $this->lang->line('report_view_login') ?></h3>
							<a href="<?= base_url().'login' ?>" class="btn btn-primary p-3" type="button">Signup to View</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<div class="col-md-12 p-5">
			<!------------------------------------------------------------------------------------------------->
			<?php $this->load->view('main/add-ons/moz'); ?>
			<!------------------------------------------------------------------------------------------------->
		</div>
	</div>
</div>
</div>
</div>

<div class="row mt-4 mb-4 faq">
	<div class="col-md-12">
		<div class="card bg-white shadow-lg border-0 mb-4">

			<div class="row">

				<div class="col-md-12">
					<div class="p-5">
						<h2 class="text-left text-dark">About <?= $listing_data[0]['website_BusinessName']  ?></h2>
					</div>
					<div class="pl-5 pr-5 pb-5">
						<p class="description-width text-muted"><?php if(isset($listing_data[0]['description'])) if(DECODE_DESCRIPTIONS) echo html_entity_decode($listing_data[0]['description']);  else echo ($listing_data[0]['description']); ?></p>
					</div>

					<div class="pl-5 pr-5 pb-5">
						<?php if(!empty($listing_data[0]['website_how_make_money'])) { ?>
							<!-- How to make money -->
							<div class="single-page-section">
								<?php if($listing_data[0]['listing_type'] !== 'app') { ?>
									<h3 class="margin-bottom-25 text-dark"><?= $this->lang->line('lang_payments_q_1');  ?></h3>
								<?php } else { ?>
									<h3 class="margin-bottom-25 text-dark"><?= $this->lang->line('lang_payments_q_2');  ?></h3>
								<?php } ?>
								<p class="description-width text-justify"><?php echo $listing_data[0]['website_how_make_money']; ?></p>
							</div>
						<?php } ?>

						<?php if(!empty($listing_data[0]['website_purchasing_fulfilment'])) { ?>
							<!-- Website Purchasing Fullfilment -->
							<div class="single-page-section">
								<h3 class="margin-bottom-25 text-dark"><?= $this->lang->line('lang_payments_q_3');  ?></h3>
								<p class="description-width text-justify"><?php echo $listing_data[0]['website_purchasing_fulfilment']; ?></p>
							</div>
						<?php } ?>

						<?php if(!empty($listing_data[0]['website_whyselling'])) { ?>
							<!-- Why are you selling this business -->
							<div class="single-page-section">
								<?php if($listing_data[0]['listing_type'] !== 'app') { ?>
									<h3 class="margin-bottom-25 text-dark"><?= $this->lang->line('lang_payments_q_4');  ?></h3>
								<?php } else { ?>
									<h3 class="margin-bottom-25 text-dark"><?= $this->lang->line('lang_payments_q_5');  ?></h3>
								<?php } ?>
								<p class="description-width text-justify"><?php echo $listing_data[0]['website_whyselling']; ?></p>
							</div>
						<?php } ?>


						<?php if(!empty($listing_data[0]['website_suitsfor'])) { ?>
							<!-- Website is sutable for -->
							<div class="single-page-section">
								<h3 class="margin-bottom-25 text-dark"><?= $this->lang->line('lang_payments_q_6');  ?></h3>
								<p class="description-width text-justify"><?php echo $listing_data[0]['website_suitsfor']; ?></p>
							</div>
						<?php } ?>

						<?php if(!empty($listing_data[0]['financial_uploadVisual']))  { ?>
							<!-- Atachments -->
							<div class="single-page-section">
								<h3 class="text-dark"><?= $this->lang->line('lang_payments_attachments');  ?></h3>
								<?php if(!empty($listing_data[0]['financial_uploadVisual']))  { ?>
									<div class="input-group margin-top-25">
										<div class="attachments-container">
											<a href="<?php echo base_url().FILES_UPLOAD.$listing_data[0]['financial_uploadVisual']; ?>" class="attachment-box ripple-effect"><span><?php echo $listing_data[0]['financial_uploadVisual']; ?></span><i><?php echo strtoupper(pathinfo($listing_data[0]['financial_uploadVisual'], PATHINFO_EXTENSION)); ?></i></a>
										</div>
									</div>
								<?php } ?>
								<?php if(!empty($listing_data[0]['financial_uploadProfitLoss']))  { ?>
									<div class="input-group margin-top-25">
										<div class="attachments-container">
											<a href="<?php echo base_url().FILES_UPLOAD.$listing_data[0]['financial_uploadVisual']; ?>" class="attachment-box ripple-effect"><span><?php echo $listing_data[0]['financial_uploadProfitLoss'] ?></span><i><?php echo strtoupper(pathinfo($listing_data[0]['financial_uploadProfitLoss'], PATHINFO_EXTENSION)); ?></i></a>
										</div>
									</div>              
								<?php } ?>
							</div>
						<?php } ?>

						<?php if(!empty($listing_data[0]['website_metakeywords'])) { ?>
							<!-- Tags -->
							<div class="single-page-section">
								<h3 class="margin-top-25 text-dark">Tags</h3>
								<div class="task-tags p-3">
									<?php foreach (json_decode(html_entity_decode($listing_data[0]['website_metakeywords']),true) as $key) { ?>
										<span><?php echo $key ?></span>
									<?php }?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>

									<!--<div class="col-md-4">
									</div>-->
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-4 faq">
						<div class="col-md-12">
							<div class="bg-white">
								<div class="p-5">
									<h2 class="text-center text-dark"> <?= $this->lang->line('customer_also_loved');  ?> </h2>
									<p class="text-center text-muted"> <?= $this->lang->line('customer_also_loved_subtitle');  ?>  <?= $listing_data[0]['website_BusinessName'] ?></p>
								</div>
								<div class="row">
									<?php foreach($similar as $item) { ?>
										<div class="col-lg-3 mb-3">
											<a href="<?php echo base_url().'item/'.$item['listing_type'].'/'.$item['website_BusinessName'].'/'.$item['id'];  ?>">
												<div class="card asset-card">
													<img class="card-img-top" style="height:150px" src="<?php if(isset($item['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$item['website_thumbnail'];  ?>">
													<div class="card-footer d-flex justify-content-between">
														<h4 class="font-weight-bold"><?php if(isset($item['website_BusinessName'])) echo $item['website_BusinessName'];  ?></h4>
														<h4 class="font-weight-bold">
															<?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($item['website_buynowprice'])) echo number_format(floatval($item['website_buynowprice'])); else echo number_format(floatval($item['website_buynowprice']));  ?>
														</h4>
													</div>
												</div>
											</a>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>

					<?php if(isset($video[0]['url'])) { ?>

						<div class="row mt-4 faq">
							<div class="col-md-12">
								<div class="bg-transparent">
									<div class="p-5">
										<h2 class="text-center text-dark"><?= $this->lang->line('why_should_buy_from_us');  ?></h2>
									</div>
									<div class="row">
										<div class="col-lg-9 mx-auto p-5">
											<div class="card">
												<div class="card-image">
													<div class="embed-responsive embed-responsive-16by9">
														<iframe width="560" height="315" src="<?= $video[0]['url'] ?>" frameborder="0" allowfullscreen></iframe>
													</div>

												</div><!-- card image -->

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php  } ?>

					<div class="row mt-4 faq">
						<div class="col-md-12">
							<div class="bg-transparent">
								<div class="p-5">
									<h2 class="text-center text-dark"><?= $this->lang->line('faqs_title');  ?></h2>
								</div>
								<div class="row">
									<div class="col-lg-9 mx-auto p-5">
										<!-- Accordion -->
										<div id="accordionExample" class="accordion shadow">

											<?php foreach($faqs as $faq) { ?>
												<!-- Accordion item 1 -->
												<div class="card">
													<div id="headingOne" class="card-header bg-white shadow-sm border-0">
														<h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#collapse<?= $faq['id'] ?>" aria-expanded="false" aria-controls="collapse<?= $faq['id'] ?>" class="d-block position-relative text-dark text-captitalize collapsible-link py-2 font-weight-bold text-dark"><?= $faq['heading'] ?></a></h6>
													</div>
													<div id="collapse<?= $faq['id'] ?>" aria-labelledby="heading<?= $faq['heading'] ?>" data-parent="#accordionExample" class="collapse">
														<div class="card-body p-5">
															<p class="font-weight-light m-0"><?= $faq['body'] ?></p>
														</div>
													</div>
												</div>
											<?php } ?>

										</div>
									</div>
								</div>
							</div>
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
		<!----page scripts ---->
		<script>textRotator();</script>
		<?php if(!empty($this->session->userdata('user_id'))) { ?>
			<script>loadDomainTrafficData('flotChart');</script>
			<?php if(!empty($adsense)) { ?>
				<script>loadAdsenseData('AdsenseChart');</script>
				<script>loadAdsenseData('adsenseEarnings','bar','all',false);</script>
				<script>loadAdsenseData('adsenseImpres','bar','impress',false);</script>
			<?php } } ?>
			<?php if($expiredStatus) { ?>
				<script>disableScreen();</script>
			<?php } ?>
			<!--------------------------------------------------------------------------------------------------------------->
			<?php $this->load->view('main/includes/models'); ?>
			<!--------------------------------------------------------------------------------------------------------------->
		</body>
		</html>
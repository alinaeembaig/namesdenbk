<!DOCTYPE html>
<html dir="<?= !empty($l_format) ? $l_format : 'ltr'; ?>" lang="<?php if(!empty($language)) echo $language; else echo 'en'; ?>">
<head>

	<!-- Meta Tags--->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="onlinetoolhub.com">
	<meta name="keywords" content="<?php if(!empty($page[0]['txt_page_meta_keywords'])) echo implode(',', json_decode(html_entity_decode($page[0]['txt_page_meta_keywords']),true)); ?>"/>
	<meta name="description" content="<?php echo $this->lang->line('lang_faq_description') ; ?>"/>
	<meta name="copyright"content="onlinetoolhub">
	<meta name="robots" content="index,follow" />
	<meta name="url" content="<?php echo base_url(); ?>">
	<title><?php echo $this->lang->line('lang_faq_title') ; ?> | <?php echo $this->lang->line('site_name') ; ?> </title>
	<meta name="og:title" content="<?php echo $this->lang->line('lang_faq_title') ; ?>"/>
	<meta name="og:url" content="<?php echo current_url(); ?>"/>
	<meta name="og:image" content="<?php if(isset($imagesData[0]['sitelogo'])) echo base_url().IMAGES_UPLOAD.$imagesData[0]['sitelogo']; ?>" alt="thumbnail" />
	<meta name="og:site_name" content="<?php echo $this->lang->line('site_name') ; ?> "/>
	<meta name="og:description" content="<?php echo $this->lang->line('lang_faq_description') ; ?>"/>
	<link rel="icon" href="<?php if(isset($imagesData[0]['favicon'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['favicon']; ?>" alt="favicon" />
	<!--- --->

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


		<!-- Post Content -->
		<div class="container detail-page-container">
			<div class="row">
				
				<!-- Inner Content -->
				<div class="col-xl-12 col-lg-12">
					<div class="bg-transparent">
						<div class="p-5">
							<h2 class="text-center text-dark">Frequently Asked Questions</h2>
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
				<!-- Inner Content / End -->

			</div>
		</div>

		<!-- Spacer -->
		<div class="padding-top-40"></div>
		<!-- Spacer -->

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
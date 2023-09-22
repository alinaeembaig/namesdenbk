<!----------------------------------------------------------------------------------------------------------->
<!-- footer -->
<div id="footer" class="new-footer">
	
	<!-- Footer Middle Section -->
	<!-- FOOTER WRAPPER -->
	<div class="upper-footer bg-black">
		<div class="container pt-5 pb-4">
			<div class="row">
				<div class="col-lg-5 mb-3 text-sm-left text-center my-auto">
					<h3 class="fw-700 font-sm text-uppercase ls-0 mb-0 mt-2  lh-24">Subscribe to our newsletter </h3>
					<span class="font-xsssss fw-500 text-grey-500">and receive $20 coupon for first shopping</span>
				</div>                 
				<div class="col-lg-7 mb-3 text-start">
					<form method="post" enctype="multipart/form-data" class="newsletter">
						<input type="text" id="subscribe_email" name="subscribe_email" placeholder="<?= $this->lang->line('lang_subscribe_placeholder'); ?>">
						<button type="submit"><i class="fas fa-arrow-<?= ($l_format === 'rtl') ? 'left' : 'right'; ?>"></i></button>
						<input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
					</form>
				</div>                 

			</div>
		</div>
	</div>
	<div class="upper-footer bg-black">
		<div class="container">
			<div class="row">
				<div class="col-lg-12"><hr /></div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 pt-4 mt-4"></div>
				<div class="col-md-4 col-xs-6 sm-mb-3">
					<h3>DISCLAIMER</h3>
					<p class="text-left ">
						In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final 
					</p>
					<img class="text-center" src="assets/img/svgs/dmca.png" style="height:60px">
				</div>
				<div class="col-md-4 col-xs-6 sm-mb-3">
					<h3>CONTACT INFORMATION</h3>
					<div class="list-group">
						<dt class="font-weight-bold">ADDRESS</dt>
						<dd class="text-muted">798 South Park Avenue, New York, USA</dd>
					</div>
					<div class="list-group">
						<dt class="font-weight-bold">EMAIL</dt>
						<dd class="text-muted"><a href="mailto:#">compagny@email.com</a></dd>
					</div>
					<div class="list-group">
						<dt class="font-weight-bold">PHONE</dt>
						<dd class="text-muted">(555) 652 258
						</dd>
					</div>
				</div>
				<div class="col-md-4 col-xs-6 sm-mb-3">
					<a href="#" class="me-2"><img src="assets/img/svgs/google-play.png" alt="play"></a>
					<a href="#" class="me-2"><img src="assets/img/svgs/app-store.png" alt="play"></a>
				</div>
				<div class="col-lg-12 pt-4 mt-4"></div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12"><hr /></div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 pt-4 mt-4"></div>
				<div class="col-md-3 col-xs-6 sm-mb-3">
					<h3>FRUIT & VEGETABLES</h3>
					<ul class="menu">
						<li ><a href="#">Fresh Vegetables</a></li>
						<li ><a href="#">Herbs &amp; Seasonings</a></li>
						<li ><a href="#">Fresh Fruits</a></li>
						<li ><a href="#">Cuts &amp; Sprouts</a></li>
						<li ><a href="#">Exotic Fruits &amp; Veggies</a></li>
						<li ><a href="#">Packaged Produce</a></li>
						<li ><a href="#">Party Trays</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-xs-6 sm-mb-3">
					<h3>BREAKFAST & DAIRY</h3>
					<ul class="menu">
						<li ><a href="#">Fresh Vegetables</a></li>
						<li ><a href="#">Herbs &amp; Seasonings</a></li>
						<li ><a href="#">Fresh Fruits</a></li>
						<li ><a href="#">Cuts &amp; Sprouts</a></li>
						<li ><a href="#">Exotic Fruits &amp; Veggies</a></li>
						<li ><a href="#">Packaged Produce</a></li>
						<li ><a href="#">Party Trays</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-xs-6 sm-mb-3">
					<h3>BEVERAGES</h3>
					<ul class="menu">
						<li ><a href="#">Packaged Produce</a></li>
						<li ><a href="#">Party Trays</a></li>
						<li ><a href="#">Fresh Vegetables</a></li>
						<li ><a href="#">Herbs &amp; Seasonings</a></li>
						<li ><a href="#">Fresh Fruits</a></li>
						<li ><a href="#">Cuts &amp; Sprouts</a></li>
						<li ><a href="#">Exotic Fruits &amp; Veggies</a></li>
						<li ><a href="#">Packaged Produce</a></li>
						<li ><a href="#">Party Trays</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-xs-6 sm-mb-3">
					<h3>FRUIT & VEGETABLES</h3>
					<ul class="menu">
						<li ><a href="#">Fresh Vegetables</a></li>
						<li ><a href="#">Herbs &amp; Seasonings</a></li>
						<li ><a href="#">Fresh Fruits</a></li>
						<li ><a href="#">Cuts &amp; Sprouts</a></li>
						<li ><a href="#">Exotic Fruits &amp; Veggies</a></li>
						<li ><a href="#">Packaged Produce</a></li>
						<li ><a href="#">Party Trays</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="lower-footer bg-black pt-5 pb-3">
		<div class="container">
			<div class="row">
				<div class="col-md-4 text-center text-sm-left xs-mb-3"><a href="#"><img src="<?php if(!empty($imagesData[0]['sitelogo'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['sitelogo']; ?>" alt="logo" class="w-125"></a></div>
				<div class="col-md-8 text-center text-sm-right xs-mb-3">
					<!--<a href="#" class="d-none d-md-inline-block d-lg-inline-block me-2"><img src="assets/img/svgs/google-play.png" alt="play"></a>
					<a href="#" class="d-none d-md-inline-block d-lg-inline-block me-2"><img src="assets/img/svgs/app-store.png" alt="play"></a>-->
					<a href="#" class="btn-round btn-round-md z-index-1 bg-facebook"><i class="icon-brand-facebook-f text-white"></i></a>
					<a href="#" class="btn-round btn-round-md z-index-1 bg-twiiter"><i class="icon-brand-twitter text-white"></i></a>
					<a href="#" class="btn-round btn-round-md z-index-1 bg-linkedin"><i class="icon-brand-github text-white"></i></a>
					<a href="#" class="btn-round btn-round-md z-index-1 bg-instagram"><i class="icon-brand-instagram text-white"></i></a>
				</div>
				<div class="col-md-8 text-center d-none d-xs-block ">
					<a href="#" class="me-2"><img src="assets/img/svgs/google-play.png" alt="play"></a>
					<a href="#" class="me-2"><img src="assets/img/svgs/app-store.png" alt="play"></a>
				</div>

				<div class="col-lg-12"><div class="border-bottom-light mt-5"></div></div>
			</div>
		</div>
	</div>

	<div class="lower-footer bg-black pb-3">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center text-sm-left xs-mb-3"><p class="text-grey-500 fw-500 font-xssss mb-0">&copy; Copyright 2021 All rights reserved. <?php echo date('Y');?><strong><a href="<?php echo base_url();?>" target="_blank"><?php echo $this->lang->line('site_name'); ?> </a></strong> <?php if($settings[0]['footer_credits'] === '1') { ?> | Powered By<a href="https://www.onlinetoolhub.com" target="_blank"> Onlinetoolhub</a>. <?php } ?></p></div>
				<div class="col-md-6 text-center text-sm-right"><img src="assets/img/svgs/payments.jpg" alt="payment"></div>
			</div>
		</div>
	</div>
	<!-- FOOTER WRAPPER -->
	<div class="lower-footer-bg bg-black" style="background-image: url(assets/img/svgs/building-2.png); width: 100%; "></div>
	<!-- Footer Middle Section / End -->


</div>
<!-- Footer / End -->	


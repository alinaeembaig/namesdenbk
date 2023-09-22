<!-- Category Boxes  -->

<div class="section">
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="section-title text-left mb-4 pb-2">
					<h4 class="title text-bold font-weight-bold">Our Latest & Editor Picks</h4>
					<p class="text-muted mb-1 font-weight-light">Every Monday we publish new businesses for sale on our marketplace.</p>
					<a href="domains/" class="btn btn-outline-warning p-3 mt-3">View Total 164 Listings<span class="fa fa-chevron-right ml-4"></span></a>
				</div>
			</div>
		</div>

		<!--<div class="row">
			
			<div class="featured-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="outer-box">
					
					<?php foreach ($recentlyAdded as $asset) { ?>
						<div class="job-block-five d-flex justify-content-between mb-3 shadow-lg rounded">
							<div class="inner-box">
								<div class="row">
									<div class="col-lg-2 col-md-12 col-sm-12 my-auto text-center">
										<img src="<?php if(isset($asset['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$asset['website_thumbnail'];  ?>" class="img-thumbnail">
									</div>
									<div class="col-lg-10 col-md-12 col-sm-12 my-auto">
										<h4 class="font-weight-bold text-capitalize mt-3"><a href="#"><?= $asset['website_BusinessName'] ?></a></h4>
										<p class="font-weight-light"><?= $asset['website_tagline'] ?></p>
										<ul class="job-info">
											
											<li><span class="icon fa fa-microchip"></span> <?php if(isset($asset['listing_type'])) echo strtoupper($this->lang->line($asset['listing_type']));  ?></li>
											<li><span class="icon a fa fa-clock"></span>  <?php if(isset($asset['listing_option'])) echo strtoupper($this->lang->line($asset['listing_option']));  ?></li>
											<li><span class="icon fa fa-map-marker"></span> <?=  $asset['business_registeredCountry'] ?></li>
											<li><span class="icon a fa fa-clock"></span> <?= Mcarbon::createFromDate($asset['date'])->diffForHumans() ?></li>
											<?php if($asset['listing_option']=== 'auction') { ?>
												<li><span class="icon fa fa-money"></span> <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?> <?php echo number_format(floatval($currentPrice)); ?></li>
											<?php }?>

											<?php if($asset['listing_option']=== 'classified') { ?>
												<li><span class="icon fa fa-money"></span> <?php if(isset($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?></li>
											<?php }?>
											
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>-->

		<div class="default-tabs pt-50 tabs-box">

			<!--Tabs Box-->
			<div class="tab-buttons-wrap">
				<ul class="tab-buttons -pills-condensed nav nav-tabs" id="myTab" role="tablist">
					<li>
						<a class="tab-btn nav-link active" href="latest" data-toggle="tab" data-target="#latest" role="tab" aria-controls="latest" aria-selected="true">Lastest</a>
					</li>
					<li>
						<a class="tab-btn nav-link" data-toggle="tab" href="editors" data-target="#editors" role="tab" aria-controls="editors" aria-selected="false">Editors Picked</a>
					</li>
				</ul>
			</div>

			<div class="tabs-content pt-50 wow fadeInUp">
				<!--Tab-->
				<div class="tab-pane fade show active" id="latest" aria-labelledby="latest-tab" role="tabpanel">
					<div class="row">
						<?php foreach ($recentlyAdded as $asset) { ?>
							<div class="col-lg-3 mb-3">
								<a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>">
									<div class="card asset-card">
										<?php if($asset['listing_option'] === 'auction') { ?>
											<div class="asset-icon">
												<span class="fa fa-gavel"></span>
											</div>
										<?php } ?>
										<img class="card-img-top" style="height:150px" src="<?php if(isset($asset['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$asset['website_thumbnail'];  ?>">
										<div class="card-footer d-flex justify-content-between">
											<h4 class="font-weight-bold"><?php if(isset($asset['website_BusinessName'])) echo $asset['website_BusinessName'];  ?></h4>
											<h4 class="font-weight-bold">
												<?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?> <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
											</h4>
										</div>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>

				<!--Tab-->
				<div class="tab-pane fade" id="editors" aria-labelledby="editors-tab" role="tabpanel">
					<div class="row">
						<?php foreach ($editorsPicked as $asset) { ?>
							<div class="col-lg-3 mb-3">
								<a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>">
									<div class="card asset-card">
										<img class="card-img-top" style="height:150px" src="<?php if(isset($asset['website_thumbnail'])) echo base_url().IMAGES_UPLOAD.$asset['website_thumbnail'];  ?>">
										<div class="card-footer d-flex justify-content-between">
											<h4 class="font-weight-bold"><?php if(isset($asset['website_BusinessName'])) echo $asset['website_BusinessName'];  ?></h4>
											<h4 class="font-weight-bold">
												<?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?><?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
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

	</div>

	<div class="row mt-4">
		<div class="col-md-12 d-flex justify-content-center">
			<a href="domains/" class="slippa-btn slippa-gradient">VIEW ALL<span class="fa fa-chevron-right"></span></a>
		</div>
	</div>
</div>
</div>

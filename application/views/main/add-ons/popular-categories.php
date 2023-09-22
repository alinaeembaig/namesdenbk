<!-- Category Boxes  -->

<div class="section category-section margin-top-5">
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="section-title text-left mb-4 pb-2">
					<h4 class="title text-bold font-weight-bold"><?= $this->lang->line('lang_categories_title'); ?></h4>
					<p class="text-muted mb-1 font-weight-light"><?= $this->lang->line('lang_categories_title_sub'); ?></p>
				</div>
			</div>
		</div>

		<div class="row">
			
			<?php $i=0; foreach ($categoriesData as $category) {

				if($i <= HOME_CAT_NOS) { ?>
					<div class="col-md-3 col-sm-6 company-block">
						<a href="<?php echo base_url() ?>main/category/<?php echo $category['url_slug']; ?>">
							<div class="inner-box bg-clr-<?= $i ?>">
								<figure class="image"><img src="<?php echo base_url().CATEGORY_IMAGES.'/'.$category["c_thumb"] ?>" alt=""></figure>
								<div class="category-text">
									<h4 class="name font-weight-bold"><?= $category["c_name"] ?></h4>
									<small class="text-muted text-center"><?= $category["count"] ?> Listings</small>
								</div>
							</div>
						</a>
					</div>
					<?php $i++; } } ?>	
				</div>
			</div>
		</div>

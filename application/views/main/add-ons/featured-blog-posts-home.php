<section class="news-section style-two p-5 mb-5">
	<div class="container">

		<div class="row justify-content-center mb-5">
			<div class="col-lg-12">
				<div class="section-title border-bottom text-left p-3 mb-4 pb-2">
					<div class="d-flex justify-content-between">
						<h4 class="title text-bold font-weight-bold"><?= $this->lang->line('lang_blog_title'); ?></h4>
						<a href="<?php echo base_url().'blog' ?>" class="headline-link"><?php echo $this->lang->line('lang_blog_link'); ?></a>
					</div>
					<p class="text-muted mb-1 font-weight-light"><?= $this->lang->line('lang_featured_title_sub'); ?></p>
				</div>
			</div>
		</div>

		<div class="row wow fadeInUp">
			<!-- News Block -->
			<?php foreach ($featuredPosts as $key=>$post) { ?>
				<div class="news-block col-lg-4 col-md-6 col-sm-12 news-block-<?php echo $key; ?>">
					<div class="inner-box">
						<div class="image-box">
							<figure class="image"><img src="<?php if(isset($post['thumbnail'])) echo base_url().BLOG_UPLOAD.$post['thumbnail']; ?>" /></figure>
						</div>
						<div class="lower-content">
							<ul class="post-meta">
								<li><a href="#"><?php if(isset($post['date'])) echo date('F d Y',strtotime($post['date'])); ?></a></li>
								<?php if(isset($ownerData[0]['username'])) { ?>
									<li><a href="#"><?php if(isset($ownerData[0]['username'])) echo $ownerData[0]['username']; ?></a></li>
								<?php } ?>
							</ul>
							<h3 class="font-weight-bold"><a href="<?php echo base_url().'blog_post/'.$post['slug'] ?>"><?php if(isset($post['title'])) echo $post['title']; ?></a></h3>
							<p class="text"><?php if(isset($post['metadescription'])) echo substr($post['metadescription'], 0,125); ?></p>
							<a href="<?php echo base_url().'blog_post/'.$post['slug'] ?>" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</section>

<!-- Recent Blog Posts / End -->
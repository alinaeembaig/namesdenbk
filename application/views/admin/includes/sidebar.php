	<!-- Dashboard Sidebar -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<a class="navbar-brand brand-logo-mini text-center" href="<?php echo base_url() ?>">
          					<img src="<?php if(isset($imagesData[0]['invoice_logo'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['invoice_logo']; ?>" alt="logo" />
        				</a>

						<ul data-submenu-title="Start">
							<li><a href="<?php echo site_url('admin'); ?>"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
						</ul>

						<ul data-submenu-title="Listings Manage">
							<li><a href="<?php echo site_url('admin/general_settings'); ?>"><i class="mdi mdi-wrench"></i> General Settings </a></li>
							<li><a href="<?php echo site_url('admin/main_categories'); ?>"><i class="mdi mdi-adjust"></i> Main Categories </a></li>
							<li><a href="<?php echo site_url('admin/platform_list'); ?>"><i class="mdi mdi-all-inclusive"></i> Platforms List </a></li>
							<li><a href="<?php echo site_url('admin/plugins_manager'); ?>"><i class="mdi mdi-power-plug"></i> Plugins Manager</a></li>
							<li><a href="<?= !DEMO_MODE ? site_url('admin/category_control') : '#' ?>" onclick="<?= DEMO_MODE ? 'disableddemo();' : ''?>"><i class="mdi mdi-pipe"></i> Category Control </a></li>
							<li><a href="<?php echo site_url('admin/current_listings'); ?>"><i class="mdi mdi-image-area-close"></i> Current Listings </a></li>
							<li><a href="<?php echo site_url('admin/cron_jobs'); ?>"><i class="mdi mdi-calendar-clock"></i> Cron Jobs Manager </a></li>
							<li><a href="<?php echo site_url('admin/email_settings'); ?>"><i class="mdi mdi-email"></i> Email Settings </a></li>
							<li><a href="<?php echo site_url('admin/listing_control'); ?>"><i class="mdi mdi-wallet-giftcard"></i> Listing Plans </a></li>
							
							<li><a href="#"><i class="mdi mdi-thumb-up"></i> Manage Disputes <span class="nav-tag"><?php echo count($disputes); ?></span></a>
								<?php if(!empty($disputes)) { ?>
								<ul>
									<?php foreach ($disputes as $dispute) { ?>
										<li><a href="<?php echo site_url('admin/manage_disputes/'.$dispute['contract_id']); ?>">Contract - #<?php echo $dispute['contract_id']; ?> </a></li>
									<?php } ?>
								</ul>	
								<?php } ?>
							</li>

							<li><a href="<?php echo site_url('admin/reported_listings'); ?>"><i class="mdi mdi-alert"></i> Reported Listings </a></li>
						</ul>

						<ul data-submenu-title="Listings Creator">
							<li><a href="<?php echo site_url('admin/create_domain'); ?>"><i class="mdi mdi-dots-horizontal-circle"></i> Create Domain</a></li>
							<li><a href="<?php echo site_url('admin/create_website'); ?>"><i class="mdi mdi-earth"></i> Create Website </a></li>
							<li><a href="<?php echo site_url('admin/bulk_upload'); ?>"><i class="mdi mdi-briefcase-upload"></i> Bulk Upload </a></li>
							<li><a href="<?php echo site_url('admin/admin_as_user'); ?>"><i class="mdi mdi-account-convert"></i> Login as a User</a></li>
						</ul>
						
						<ul data-submenu-title="Organize and Manage">
							<li><a href="<?php echo site_url('admin/pages_manager'); ?>"><i class="mdi mdi-book-open-page-variant"></i> Pages </a></li>
							<li><a href="<?php echo site_url('admin/blog_manager'); ?>"><i class="mdi mdi-blogger"></i> Blog </a></li>
							<li><a href="<?php echo site_url('admin/language_setup'); ?>"><i class="mdi mdi-language-swift"></i>Languages</a></li>
							<li><a href="<?= !DEMO_MODE ? site_url('admin/images_manager') : '#' ?>" onclick="<?= DEMO_MODE ? 'disableddemo();' : ''?>"><i class="mdi mdi-image-multiple"></i>Images </a></li>
							<li><a href="<?= !DEMO_MODE ? site_url('admin/ads_manager') : '#' ?>" onclick="<?= DEMO_MODE ? 'disableddemo();' : ''?>"><i class="mdi mdi-headset-dock"></i>Ads </a></li>
							<li><a href="<?php echo site_url('admin/homepage_setup'); ?>"><i class="mdi mdi-bootstrap"></i>Homepage Setup</a></li>
							<li><a href="<?php echo site_url('admin/manage_faqs'); ?>"><i class="mdi mdi-comment-question"></i>Manage FAQs</a></li>
							<li><a href="<?php echo site_url('admin/manage_videos'); ?>"><i class="mdi mdi-file-video"></i>Manage Listing Videos</a></li>
						</ul>

						<ul data-submenu-title="Payments & Withdrawals">
							<li><a href="<?php echo site_url('admin/payments_plugins'); ?>"><i class="mdi mdi-credit-card-scan"></i> Payments Extensions <span class="badge badge-warning"> new</span> </a></li>
							<li><a href="<?php echo site_url('admin/payments_data'); ?>"><i class="mdi mdi-cash-multiple"></i> Payments Data </a></li>
							<li><a href="<?php echo site_url('admin/escrow_transactions'); ?>"><i class="mdi mdi-shield"></i> Escrow Transactions </a></li>
							<li><a href="<?php echo site_url('admin/withdrawal_settings'); ?>"><i class="mdi mdi-cash-usd"></i> Withdrawal Requests </a></li>
							<li><a href="<?php echo site_url('admin/listings_types'); ?>"><i class="mdi mdi-format-annotation-plus"></i> Sponsored & Regular</a></li>
							<li><a href="<?= !DEMO_MODE ? site_url('admin/customizations') : '#' ?>" onclick="<?= DEMO_MODE ? 'disableddemo();' : ''?>"><i class="mdi mdi-brightness-auto"></i> Customizations </a></li>
						</ul>

						<ul data-submenu-title="User Controls">
							<li><a href="<?php echo site_url('admin/user_control'); ?>"><i class="mdi mdi-account-circle"></i> User Control </a></li>
							<?php if(file_exists(APPPATH.'/libraries/Referral_Module.php')) { ?>
								<li><a href="<?php echo site_url('refferal/load_admin_dashboard'); ?>"><i class="icon-material-outline-star"></i> Refferal Controls <span class="badge badge-warning">new</span></a></li>
							<?php } ?>
							<?php if(file_exists(APPPATH.'/libraries/SocialLogins.php')) { ?>
								<li><a href="<?php echo site_url('Social/load_social_logins'); ?>"><i class="icon-brand-facebook-square"></i> Social Login <span class="badge badge-warning">new</span></a> </li>
							<?php } ?>
							<li><a href="<?php echo site_url('admin/announcement_control'); ?>"><i class="mdi mdi-bullhorn"></i> Announcements </a></li>
						</ul>

						<ul data-submenu-title="Account">
							<li><a href="<?= !DEMO_MODE ? site_url('admin/user_settings') : '#' ?>" onclick="<?= DEMO_MODE ? 'disableddemo();' : ''?>"><i class="icon-material-outline-settings"></i> Settings</a></li>
							<li><a href="<?= !DEMO_MODE ? site_url('admin/change_password') : '#' ?>" onclick="<?= DEMO_MODE ? 'disableddemo();' : ''?>"><i class="icon-material-outline-lock"></i> Change Password</a></li>
							<li><a href="<?php echo site_url('admin/logout'); ?>"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>

						<ul data-submenu-title="About Developers & Credits">
							<li><a href="<?php echo site_url('admin/about_developers'); ?>"><i class="mdi mdi-information"></i> About us</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->
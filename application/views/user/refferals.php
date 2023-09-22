<!DOCTYPE html>
<html dir="<?= !empty($l_format) ? $l_format : 'ltr'; ?>" lang="<?php if(!empty($language)) echo $language; else echo 'en'; ?>">
<head>

<!--User Page Meta Tags-->
<title><?= $this->lang->line('lang_refferal_title') ?> | <?php echo $this->lang->line('site_name') ?> | <?= $this->lang->line('lang_userdashbaord_title') ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="<?php if(isset($imagesData[0]['favicon'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['favicon']; ?>" alt="favicon" />
<meta name="robots" content="noindex">
<!--User Page Meta Tags-->

<!--------------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/headerscripts'); ?>
<!--------------------------------------------------------------------------------------------------------------->

</head>

<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

<!--------------------------------------------------------------------------------------------------------------->
<div class="clearfix"></div>
<!--------------------------------------------------------------------------------------------------------------->


<!-- Dashboard Container -->
<!--------------------------------------------------------------------------------------------------------------->
<div class="dashboard-container">
<?php $this->load->view('user/includes/sidebar'); ?>
<!--------------------------------------------------------------------------------------------------------------->
	
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3><?= $this->lang->line('lang_refferal_title') ?></h3>
				<span class="margin-top-7"><?php if(isset($userdata[0]['firstname'])) echo $userdata[0]['firstname']; ?> <?php if(isset($userdata[0]['lastname'])) echo $userdata[0]['lastname']; ?> <a href=""></a></span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="<?= base_url() ?>user"><?= $this->lang->line('lang_userdashbaord_title') ?></a></li>
						<li><?= $this->lang->line('lang_refferal_title') ?></li>
					</ul>
				</nav>
			</div>

			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="mdi mdi-currency-usd"></i> <?= $this->lang->line('lang_refferal_settings_title') ?></h3>
						</div>

						<form>
						<div class="content  with-padding padding-bottom-0">
							<div class="row">
								<div class="col-xl-6">
									<div class="submit-field">
										<h5><?= $this->lang->line('lang_refferal_id') ?></h5>
										<input id="referral_code" name="referral_code" type="text" class="with-border" value="<?= $userdata[0]['referral_code'] ?>" readonly="true">
									</div>
								</div>

								<div class="col-xl-6">
									<div class="submit-field">
										<h5><?= $this->lang->line('lang_refferal_link') ?></h5>
										<div class="input-group-prepend">
											<input id="copy-ref-url" type="text" value="<?= base_url().'signup?referrer='.$userdata[0]['referral_code'] ?>" class="with-border">
											<button type="button" class="copy-url-button ripple-effect" data-clipboard-target="#copy-ref-url" title="<?php echo $this->lang->line('lang_pop_copy');  ?>" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>
										</div>
									</div>
								</div>

							</div>
							<!--- /row ------>
						</div>
						<input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
						</form>

					</div>
				</div>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-30">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="mdi mdi-currency-usd"></i> <?= $this->lang->line('lang_withdrawal_my_earnings') ?></h3>
						</div>

						<div class="content  with-padding padding-bottom-10">
							<!--- row ------>
							<div class="row">
								<div class="col-xl-12">
									<div class="fun-facts-container">

										<div class="fun-fact" data-fun-fact-color="#36bd78">
											<div class="fun-fact-text">
												<span><?= $this->lang->line('lang_refferal_total_reffers') ?></span>
												<h4><?= count($refferals); ?></h4>
											</div>
											<a class="withdraw-card__header-link" href="#"><i class="mdi mdi-account"></i></a>
										</div>

										<div class="fun-fact" data-fun-fact-color="#9bcd78">
											<div class="fun-fact-text">
												<span><?= $this->lang->line('lang_withdrawal_pending') ?></span>
												<h4><?php if(!empty($PE)) echo number_format(floatval($PE),2); ?></h4>
											</div>
											<a class="withdraw-card__header-link" href="#"><i class="mdi mdi-av-timer"></i></a>
										</div>

									</div>
								</div>
							</div>
							<!--- /row ------>
						</div>
					</div>
				</div>
				
				<div id="user_refferals" class="col-xl-12">
					<div class="dashboard-box margin-top-20">
						<!-- Headline -->
						<div class="headline">
							<h3><i class="mdi mdi-currency-usd"></i> <?= $this->lang->line('lang_refferal_current_reffers') ?></h3>
						</div>

						<div class="content  with-padding padding-bottom-0">
							<!--- row ------>
							<div class="row">
								<div class="col-xl-12">
              						<div class="withdraw-alert alert alert-info">
                						<img class="my-alert__icon" src="./images/icon-alert.svg" alt>
                						<span class="my-alert__text">
                  							<?= $this->lang->line('lang_refferal_current_reffers') ?>
                						</span>
              						</div>

              					<!-- Begin Pending card -->
              					<div class="withdraw-card card">
                					<div class="withdraw-card__header card-header">
                  						<h3 class="withdraw-card__header-title card-title"><?= $this->lang->line('lang_refferal_current_reffers') ?></h3>
                  							<a class="withdraw-card__header-link" href="#"><?= $this->lang->line('lang_withdrawal_history_seeall') ?></a>
                					</div>

                					<?php foreach ($refferals as $reffer) { ?>
   
                					<ul class="withdraw-list list-group list-group-flush">
                						<!----Item ----->
                  						<li class="withdraw-list-item list-group-item">
                    						<div class="withdraw-list-item__date">
                      							<span class="withdraw-list-item__date-day"><?php if(isset($reffer['date'])) echo date("d", strtotime($reffer['date'])); ?></span>
                      							<span class="withdraw-list-item__date-month"><b><?php if(isset($reffer['date'])) echo date("M", strtotime($reffer['date'])); ?></b></span>
                    						</div>

                    						<div class="withdraw-list-item__text">
                      							<h4 class="withdraw-list-item__text-title"><b><?php if(isset($reffer['firstname'])) echo $reffer['firstname'] ; ?> </b></h4>
                      							<p class="withdraw-list-item__text-description"><?= $this->lang->line('lang_refferal_from') ?> <?php if(isset($reffer['user_country'])) echo $reffer['user_country']; ?></p>
                      							<br>
                      							<p class="withdraw-list-item__text-description text-warning"> Reffered By <b> You </b></p>
                    						</div>

                    						<div class="withdraw-list-item__fee">
                      							<span class="withdraw-list-item__fee-delta">+<?= $reffer['eligible_count']; ?></span>
                      							<span class="withdraw-list-item__fee-currency">COUNT</span>
                      							<?php if((int) $reffer['eligible_count'] > 0) {?>
                      								<span class="badge badge-warning"> eligible</span>
                      							<?php } ?>
                    						</div>
                  
                  						</li>
                  						<!----/Item ----->
                					</ul>
                					<?php } ?>
              					</div>
              					<!-- End Pending card -->
            					</div>
							</div>
							<!---/row --->
						</div>
						<!-- Pagination -->
						<div class="clearfix"></div>
						<div class="pagination-container margin-top-40 margin-bottom-10 centerButtons">
							<nav class="pagination paginationWithdrawals">
								<ul>
									<?php if(isset($links)) { echo $links; }?>
								</ul>
							</nav>
						</div>
						<div class="clearfix"></div>
						<!-- Pagination / End -->
					</div>

					
				</div>


			</div>
			<!-- Row / End -->

			<div id="user_refferals" class="col-xl-12">
					<div class="dashboard-box margin-top-20">
						<!-- Headline -->
						<div class="headline">
							<h3><i class="mdi mdi-currency-usd"></i> <?= $this->lang->line('lang_refferal_payments') ?></h3>
						</div>

						<div class="content  with-padding padding-bottom-0">
							<!--- row ------>
							<div class="row">
								<div class="col-xl-12">
              						<div class="withdraw-alert alert alert-info">
                						<img class="my-alert__icon" src="./images/icon-alert.svg" alt>
                						<span class="my-alert__text">
                  							<?= $this->lang->line('lang_refferal_payments') ?>
                						</span>
              						</div>

              					<!-- Begin Pending card -->
              					<div class="withdraw-card card">
                					<div class="withdraw-card__header card-header">
                  						<h3 class="withdraw-card__header-title card-title"><?= $this->lang->line('lang_refferal_payments') ?></h3>
                  							<a class="withdraw-card__header-link" href="#"><?= $this->lang->line('lang_withdrawal_history_seeall') ?></a>
                					</div>

                					<?php foreach ($refferalsPaym as $reffer) { ?>
   
                					<ul class="withdraw-list list-group list-group-flush">
                						<!----Item ----->
                  						<li class="withdraw-list-item list-group-item">
                    						<div class="withdraw-list-item__date">
                      							<span class="withdraw-list-item__date-day"><?php if(isset($reffer['date'])) echo date("d", strtotime($reffer['date'])); ?></span>
                      							<span class="withdraw-list-item__date-month"><b><?php if(isset($reffer['date'])) echo date("M", strtotime($reffer['date'])); ?></b></span>
                    						</div>

                    						<div class="withdraw-list-item__text">
                      							<h4 class="withdraw-list-item__text-title"><b><?php if(isset($reffer['firstname'])) echo $reffer['firstname'] ; ?> </b></h4>
                      							<p class="withdraw-list-item__text-description"><?= $this->lang->line('lang_refferal_payments') ?> <?php if(isset($reffer['user_country'])) echo $reffer['user_country']; ?></p>
                      							<br>
                      							<p class="withdraw-list-item__text-description text-warning"> Reffered By <b> You </b></p>
                    						</div>

                    						<div class="withdraw-list-item__fee">
                      							<span class="withdraw-list-item__fee-delta">+<?= $reffer['payment_amount']; ?></span>
                      							<span class="withdraw-list-item__fee-currency"><?php if(!empty($currency)) echo $currency; else echo 'USD'; ?></span>
                      							<?php if((int) $reffer['eligible_count'] > 0) { 
                      								if($reffer['status'] === '0'){?>
                      								<span class="badge badge-warning"> <?= $this->lang->line('lang_invoice_status_pending') ?></span>
                      								<?php } else if($reffer['status'] === '1') { ?>
                      								<span class="badge badge-warning"><?= $this->lang->line('lang_invoice_status_paid') ?></span>
                      								<?php } else if($reffer['status'] === '2') {?>
                      								<span class="badge badge-danger"><?= $this->lang->line('lang_view_status_rejected') ?></span>
                      								<?php } ?>
                      							<?php } ?>
                    						</div>
                  
                  						</li>
                  						<!----/Item ----->
                					</ul>
                					<?php } ?>
              					</div>
              					<!-- End Pending card -->
            					</div>
							</div>
							<!---/row --->
						</div>
						<!-- Pagination -->
						<div class="clearfix"></div>
						<div class="pagination-container margin-top-40 margin-bottom-10 centerButtons">
							<nav class="pagination paginationWithdrawals">
								<ul>
									<?php if(isset($links)) { echo $links; }?>
								</ul>
							</nav>
						</div>
						<div class="clearfix"></div>
						<!-- Pagination / End -->
					</div>

					
				</div>


			</div>

			<!----------------------------------------------------------------------------------------------------------->
			<?php $this->load->view('user/includes/footer'); ?>
			<!----------------------------------------------------------------------------------------------------------->

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->

<!--------------------------------------------------------------------------------------------------------------->
<?php $this->load->view('main/includes/footerscripts'); ?>
<!--------------------------------------------------------------------------------------------------------------->

</body>
</html>
<!DOCTYPE html>
<html dir="<?= !empty($l_format) ? $l_format : 'ltr'; ?>" lang="<?php if(!empty($language)) echo $language; else echo 'en'; ?>">
<head>

<!--User Page Meta Tags-->
<title>Refferal Control | <?php echo $this->lang->line('site_name') ?> | Admin Dashboard</title>
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
						<li><a href="#"><?= $this->lang->line('lang_user_home') ?></a></li>
						<li><a href="#">Refferal Control</a></li>
					</ul>
				</nav>
			</div>

			<div id="admin_refferals" class="col-xl-12">
					<div class="dashboard-box margin-top-20">
						<!-- Headline -->
						<div class="headline">
							<h3><i class="mdi mdi-currency-usd"></i> USERS PENDING FOR REFERAL PAYMENTS</h3>
						</div>

						<div class="content  with-padding padding-bottom-0">
							<!--- row ------>
							<div class="row">
								<div class="col-xl-12">
              						<div class="withdraw-alert alert alert-info">
                						<img class="my-alert__icon" src="./images/icon-alert.svg" alt>
                						<span class="my-alert__text">
                  							Eligable users pending for referal payments
                						</span>
              						</div>

              					<!-- Begin Pending card -->
              					<div class="withdraw-card card">
                					<div class="withdraw-card__header card-header">
                  						<h3 class="withdraw-card__header-title card-title">USERS PENDING FOR REFERAL PAYMENTS</h3>
                  							<a class="withdraw-card__header-link" href="#"></a>
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
                      							<p class="withdraw-list-item__text-description text-success"> has purchased <?= $reffer['eligible_count']; ?> listings </p>
                      							<br>
                      							<p class="withdraw-list-item__text-description text-warning"> Reffered By <b><?= $reffer['userGroupname']?> </b> |  Waiting for affiliate payment </p>
                      							<br>
                      							<div class="input-group-prepend">
                      								<a href="<?= base_url().'refferal/markAsPaid?id='.$reffer['id'] ?>" class="text-success"><b>MARK AS PAID</b></a>  &nbsp;&nbsp;|&nbsp;&nbsp;  <a href="<?= base_url().'refferal/markAsRejected?id='.$reffer['id'] ?>" class="text-danger"><b>REJECT</b></a> 
                      							</div>
                    						</div>

                    						<div class="withdraw-list-item__fee">
                      							<span class="withdraw-list-item__fee-delta">+<?= $reffer['payment_amount']; ?></span>
                      							<span class="withdraw-list-item__fee-currency"><?php if(!empty($currency)) echo $currency; else echo 'USD'; ?></span>
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
<? if(DEMO_MODE) { 
	$this->load->view('admin/includes/disabled');
} ?>
<!--------------------------------------------------------------------------------------------------------------->

</body>
</html>
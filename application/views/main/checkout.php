<!doctype html>
<html dir="<?= !empty($l_format) ? $l_format : 'ltr'; ?>" lang="<?php if(!empty($language)) echo $language; else echo 'en'; ?>">
<head>

	<!-- Meta Tags--->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="onlinetoolhub.com">
	<meta name="keywords" content="<?php echo $this->lang->line('site_keywords'); ?>"/>
	<meta name="description" content="<?php echo $this->lang->line('site_metadescription'); ?>"/>
	<meta name="copyright"content="onlinetoolhub">
	<meta name="robots" content="index,follow" />
	<meta name="url" content="<?php echo base_url(); ?>">
	<title><?php echo $this->lang->line('site_checkout_page'); ?> | <?php echo $this->lang->line('site_name'); ?></title>
	<meta name="og:title" content="<?php echo $this->lang->line('site_checkout_page'); ?> | <?php echo $this->lang->line('site_name'); ?>"/>
	<meta name="og:url" content="<?php echo current_url(); ?>"/>
	<meta name="og:image" content="<?php if(isset($imagesData[0]['sitelogo'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['sitelogo']; ?>" alt="thumbnail" />
	<meta name="og:site_name" content="<?php echo $this->lang->line('site_checkout_page'); ?> | <?php echo $this->lang->line('site_name'); ?>"/>
	<meta name="og:description" content="<?php echo $this->lang->line('site_metadescription'); ?>"/>
	<link rel="icon" href="<?php if(isset($imagesData[0]['favicon'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['favicon']; ?>" alt="favicon" />
	<!--- /Meta Tags --->

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/includes/headerscripts'); ?>
	<!--------------------------------------------------------------------------------------------------------------->
	<input type="hidden" class="stripePubKey" name="stripePubKey" value="<?= $stripePubKey ?>">
	<script src="https://js.stripe.com/v3/"></script>
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

		<div class="margin-top-50 p-5"></div>


		<!-- Content -->
		<div class="container p-5">
			<div class="row">
				<div class="col-xl-8 col-lg-8 content-right-offset">

					<?php  if(!isset($userdata[0]['username'] )) { ?>
						<!-- Hedaline -->
						<h3>Login</h3>

						<!-- Billing Cycle Radios  -->
						<div class="billing-cycle margin-top-25">
							<div class="container">
								<div class="row">
									<div class="col-xl-8 offset-xl-3">
										<div class="login-register-page">
											<div id="loginStatus"></div>
											<!-- Welcome Text -->
											<div class="welcome-text">
												<h3><?php echo $this->lang->line('lang_checkout_page_val'); ?></h3>
												<span><?php echo $this->lang->line('lang_txt_notamember'); ?> <a href="<?php echo base_url()?>signup"><?php echo $this->lang->line('lang_header_main_signup'); ?>!</a></span>
											</div>

											<!-- Form -->
											<form id="UserLoginForm" method="post" enctype="multipart/form-data">
												<div class="input-with-icon-left">
													<i class="icon-material-baseline-mail-outline"></i>
													<input type="text" class="input-text with-border" name="login_username" id="login_username" placeholder="<?php echo $this->lang->line('lang_txt_username'); ?> / <?php echo $this->lang->line('lang_txt_email'); ?>"/>
												</div>

												<div class="input-with-icon-left">
													<i class="icon-material-outline-lock"></i>
													<input type="password" class="input-text with-border" name="login_password" id="login_password" placeholder="<?php echo $this->lang->line('lang_txt_password'); ?>"/>
												</div>
												<a href="<?php echo base_url().'forgotpassword'?>" class="forgot-password"><?php echo $this->lang->line('lang_txt_forgotpassword'); ?></a>

												<input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
											</form>

											<!-- Button -->
											<button id="button_login" name="button_login"  class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="UserLoginForm"><?php echo $this->lang->line('lang_btn_login'); ?><i class="icon-material-outline-arrow-right-alt"></i></button>
											<span id="loadingImageLogin" style="display:none;" class="centerButtons"> <img src="<?php echo base_url();?>assets/img/loadingimage.gif"/> </span>

										</div>
									</div>
								</div>
							</div>
						</div>

					<?php } else { ?>

						<!-- payment form --->
						<form id="paymentForm" class="creditly-card-form agileinfo_form" method="post" enctype="multipart/form-data" action="<?php echo site_url('payments/pay_contract');?>" data-stripe-publishable-key="pk_test_R0M3vS1yFzcwXbcIyl3dNmk600Y1rElqLh">

							<input type="hidden" name="txt_paytotal" id="txt_paytotal" value="<?php if(!empty($total)) echo $total; ?>"/>
							<input type="hidden" name="txt_description" id="txt_description" value="<?php echo $name; ?>"/>
							<input type="hidden" name="txt_id" id="txt_id" value="<?php echo $id; ?>"/>
							<input type="hidden" name="txt_type" id="txt_type" value="<?php echo $type; ?>"/>
							<input type="hidden" name="txt_contract" id="txt_contract" value="<?php if(!empty($contract_id)) echo $contract_id; ?>"/>
							<input type="hidden" name="paymentType" id="paymentType" value=""/>

							<!-- Hedline -->
							<h3 class="margin-top-50"><?= $this->lang->line('blog_co_payment_methods') ?></h3>

							<?php if(!empty($error)) {?>
								<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span><?php print_r($error); ?></span></div>
							<?php } ?>

							<br>
							<div id="paymentValidations"></div>

							<?php if(!empty($payments)) { ?>

								<!-- Payment Methods Accordion -->
								<div class="payment margin-top-30">

									<div class="accordion" id="paymentMethods">

										<?php foreach ($payments as $key) { ?>

											<!---- PAYMENT TABS ----->
											<div class="card payment-tab payment-tab-active">

												<div class="card-header">
													<div class="payment-tab-trigger">
														<input data-toggle="collapse" data-target="#<?= $key['paymentgateway_id'] ?>" type="radio" id="<?= $key['paymentgateway_id'] ?>" name="cardType" class="custom-control-input" value="<?= $key['paymentgateway_id'] ?>">
														<label class="custom-control-label" for="<?= $key['paymentgateway_id'] ?>"><?= $key['description'] ? $key['description'] : $key['method'] ?></label>
														<img class="payment-logo paypal" src="<?php if(!empty($key['icon_url'])) echo $key['icon_url'] ?>" alt="">
													</div>
												</div>

												
												<div id="<?= $key['paymentgateway_id'] ?>" class="collapse" data-parent="#paymentMethods">
													<div class="payment-tab-content">
														
														<div class="card-body">
															<?php if($key['card_status'] === '0') { 

																if($key['email_only'] === '0') { ?>

																	<p><?= $this->lang->line('blog_co_payment_redirect_part1') ?> <?= $key['method'] ?> <?= $this->lang->line('blog_co_payment_redirect_part2') ?></p>

																<?php } else { ?>

																	<section >
																		<div class="payment-tab-content <?= $key['paymentgateway_id'] ?>">

																			<div class="col-md-6">
																				<div class="card-label">
																					<input class="escrow_buyer_email" id="escrow_buyer_email" name="escrow_buyer_email" required type="email" placeholder="andrew@onlinetoolhub.com">
																				</div>
																			</div>

																			<input type="hidden" name="owner_escrow" id="owner_escrow" value="<?php echo $seller_email ?>"/>

																		</div>
																	</section>
																	<!---- / Escrow ----->
																<?php } 

															} else { 

																if($key['paymentgateway_id'] !== 'Stripe') { ?>

																	<section class="creditly-wrapper">
																		<div class="payment-tab-content <?= $key['paymentgateway_id'] ?>">
																			<div class="row payment-form-row credit-card-wrapper">

																				<div class="col-md-6">
																					<div class="card-label">
																						<input class="nameOnCard" name="name" required type="text" placeholder="Cardholder Name">
																						<input type="hidden" name="txt_name" class="txt_name"/>
																					</div>
																				</div>

																				<div class="col-md-6">
																					<div class="card-label">
																						<input class="number credit-card-number form-control" type="text" name="number"
																						inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;"  onkeypress='validateInputNumbers(event)'>

																						<input type="hidden" name="txt_number" class="txt_number"/>
																						<input type="hidden" name="txt_security-code" class="txt_security-code"/>
																					</div>
																				</div>

																				<div class="col-md-4">
																					<div class="card-label">
																						<label class="control-label"><?= $this->lang->line('lang_c_expire_date') ?></label>
																						<input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY"  onkeypress='validateInputNumbers(event)'>
																						<input type="hidden" name="txt_month" class="txt_month"/>
																						<input type="hidden" name="txt_year" class="txt_year"/>
																					</div>
																				</div>

																				<div class="col-md-4">
																					<div class="card-label">
																						<input class="security-code form-control"Â·inputmode="numeric"type="text" name="security-code"placeholder="&#149;&#149;&#149;">
																					</div>
																				</div>
																			</div>
																		</div>
																	</section>

																<?php } else { ?>
																	<div class="card-body">
																		<div id="card-element">
																		</div>
																		<small id="card-errors" role="alert" class="mt-2 text-danger" ></small>
																	</div>
																<?php } 

															} ?>
														</div>
														
													</div>
												</div>
											</div>
											<!----/ PAYMENT TABS ----->

											<!-- Payment Methods Accordion / End -->
										<?php } ?>

									</div>
								</div>

								<?php if(!empty($owner_id) && $owner_id !== $this->session->userdata('user_id')) { ?>
									<button class="button big ripple-effect margin-top-40 margin-bottom-65 <?= !DEMO_MODE ? 'paystripe' : '' ?> "><?= $this->lang->line('lang_checkout_btn') ?></button>

									<button class="button big ripple-effect margin-top-40 margin-bottom-65 submitpay" style="display:none;"><?= $this->lang->line('lang_checkout_btn') ?></button>

								<?php } else { ?>
									<button class="button big ripple-effect margin-top-40 margin-bottom-65 add-to-cart-own float-right"><?= $this->lang->line('lang_checkout_btn') ?></button>
								<?php } ?>

							<?php } else { echo 'No Payment Options are available. Please contact site owner';} ?>

							<input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

						</form> 
					<?php } ?>
					<!-- /payment form --->

				</div>


				<!-- Summary -->
				<div class="col-xl-4 col-lg-4 margin-top-0 margin-bottom-60">

					<!-- Summary -->
					<div class="boxed-widget summary margin-top-0">
						<div class="boxed-widget-headline">
							<h3><?= $this->lang->line('blog_co_payment_summary') ?>  <span class="noofitems-summary"></span></h3>
						</div>
						<div class="boxed-widget-inner">
							<ul class="checkout-items">
								<li><?php echo $name; ?><span><?php echo $currency; ?> <?php echo number_format($amount,2) ; ?></span></li>
								<li><?= $this->lang->line('blog_co_fee') ?> <b>(<?php echo $percentage ?>%)</b><span><?php echo $currency; ?> <?php echo number_format($fee,2) ; ?></span></li>
							</ul>
							<ul>
								<li class="total-costs"><?= $this->lang->line('blog_co_final_price') ?> <span class="total-cost"><?php echo $currency; ?><?php echo number_format($total,2); ?></span></li>
							</ul>
						</div>
					</div>
					<!-- Summary / End -->

					<form id="discountCouponForm">
						<div class="input-with-icon-left margin-top-30">
							<i class="fa fa-tags"></i>
							<input type="text" class="input-text with-border" name="checkoutCoupon" id="checkoutCoupon" placeholder="<?= $this->lang->line('lang_coupon_code') ?>" />
						</div>

						<div id="loadingCoupon" align="center" style="display:none;"> <img src="<?php echo base_url();?>assets/img/loadingimage.gif"/> </div>
						<div id="discountCouponValidate"></div>

						<button id="discountCodeApply" class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit"><?= $this->lang->line('lang_btn_apply') ?> <i class="icon-material-outline-arrow-right-alt"></i></button>

						<!-- Checkbox -->
						<div class="checkbox margin-top-30">
							<input type="checkbox" id="two-step" required="true">
							<label for="two-step"><span class="checkbox-icon"></span>  <?= $this->lang->line('lang_checkout_agree') ?> <a href="<?php echo base_url() ?>page/terms-of-service"><?php echo $this->lang->line('lang_termsandconditions'); ?></a> <?= $this->lang->line('lang_checkout_and') ?> <a href="<?php echo base_url().'page/privacy-policy'; ?>"><?php echo $this->lang->line('lang_privacy_policy'); ?></a></label>
						</div>

						<input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

					</form>
				</div>
				<!--/ summary -->
			</div>
		</div>
		<!-- Container / End -->

		<!--------------------------------------------------------------------------------------------------------------->
		<?php $this->load->view('main/includes/footer'); ?>
		<!--------------------------------------------------------------------------------------------------------------->

	</div>
	<!-- Wrapper / End -->

	<!--------------------------------------------------------------------------------------------------------------->
	<?php $this->load->view('main/includes/footerscripts'); ?>
	<script type="text/javascript">
		$(function() {

			if($('.stripePubKey').val()){
				var form = document.getElementById('paymentForm');
				var stripe = Stripe($('.stripePubKey').val());
				var elements = stripe.elements();
				var card = elements.create('card');
				card.mount('#card-element');
			}
			
			$(".creditly-card-form .paystripe").click(function(e) {
				e.preventDefault();

				if(!$('input[name="cardType"]:checked').val()){
					bootstrap_alert.error('Please select a payment method to proceed','#paymentValidations');
					popnotificaton('Please select a payment method to proceed',"danger");
					return false;
				}

				if($('input[name="cardType"]:checked').val() === 'Stripe')
				{
					if($('.stripePubKey').val())
					{
						createToken();
					}
					else
					{
						bootstrap_alert.error('Sorry this payment method is not available right now. ! Please contact support','#paymentValidations');
						popnotificaton('Sorry this payment method is not available right now. ! Please contact support',"danger");
						return false;
					}
					
				}
				else
				{
					$('.submitpay').click();
				}
			});

			function stripeTokenHandler(token) {
				var form = document.getElementById('paymentForm');
				var hiddenInput = document.createElement('input');
				hiddenInput.setAttribute('type', 'hidden');
				hiddenInput.setAttribute('name', 'stripeToken');
				hiddenInput.setAttribute('value', token.id);
				form.appendChild(hiddenInput);
				form.submit();
			}

			function createToken() {
				stripe.createToken(card).then(function(result) {
					if (result.error) {
						var errorElement = document.getElementById('card-errors');
						bootstrap_alert.error(result.error.message,'#paymentValidations');
						popnotificaton(result.error.message,"danger");
						errorElement.textContent = result.error.message;
						return false;
					} else {
						stripeTokenHandler(result.token);
					}
				});
			};

		});
	</script>

	<script>checkoutpage();</script>
	<!--------------------------------------------------------------------------------------------------------------->

</body>
</html>
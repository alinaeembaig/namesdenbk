<!DOCTYPE html>
<html dir="<?= !empty($l_format) ? $l_format : 'ltr'; ?>" lang="<?php if(!empty($language)) echo $language; else echo 'en'; ?>">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="onlinetoolhub.com">
  <meta name="keywords" content="<?php echo $this->lang->line('site_keywords'); ?>"/>
  <meta name="description" content="<?php echo $this->lang->line('site_metadescription'); ?>"/>
  <meta name="copyright"content="onlinetoolhub">
  <meta name="robots" content="index,follow" />
  <meta name="url" content="<?php echo base_url(); ?>">
  <title><?php echo $this->lang->line('login_meta_title'); ?> | <?php echo $this->lang->line('site_title'); ?></title>
  <meta name="og:title" content="<?php echo $this->lang->line('login_meta_title'); ?> | <?php echo $this->lang->line('site_title'); ?>"/>
  <meta name="og:type" content="music"/>
  <meta name="og:url" content="<?php echo base_url(); ?>"/>
  <meta name="og:image" content="<?php if(isset($imagesData[0]['sitelogo'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['sitelogo']; ?>" alt="logo" />
  <meta name="og:site_name" content="<?php echo $this->lang->line('login_meta_title'); ?> | <?php echo $this->lang->line('site_title'); ?>"/>
  <meta name="og:description" content="<?php echo $this->lang->line('site_metadescription'); ?>"/>
  <link rel="icon" href="<?php if(isset($imagesData[0]['favicon'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['favicon']; ?>" alt="logo" />
  <!-------------------------------------------------------------------------------------------------------------------->
  <?php $this->load->view('main/includes/headerscripts'); ?>
  
  <!-------------------------------------------------------------------------------------------------------------------->
</head>

<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center login-page auth auth-bg-1 theme-one" style="background-image: url('<?php if(isset($imagesData[0]['mainback'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['mainback']; ?>'); ">
        <div class="row w-100">

          <div class="col-lg-12 mx-auto">
            <div class="auto-form-wrapper-reset">
              <div class="row">
              <div class="col-xl-12">
              <div class="login-register-page">
      
                <!-- Welcome Text -->
                <div class="welcome-text">
                  <a href="<?php echo base_url(); ?>">
                      <img src="<?php if(!empty($imagesData[0]['invoice_logo'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['invoice_logo']; ?>" data-holder-rendered="true" width="30%" height="30%" />
                  </a>
                  <br>
                  <h3>Welcome to <?php echo $this->lang->line('site_name'); ?></h3>
                  <span><?php echo $this->lang->line('lang_txt_notamember'); ?> <a href="<?php echo base_url().'signup'; ?>"><?php echo $this->lang->line('lang_btn_register'); ?></a></span>
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

                  <a href="<?php echo base_url().'forgotpassword' ?>" class="forgot-password"><?php echo $this->lang->line('lang_txt_forgotpassword'); ?></a>

                  <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

                </form>
        
                <!-- Button -->
                <span id="loadingImageLogin" style="display:none;" class="centerButtons"> <img src="<?php echo base_url();?>assets/img/loadingimage.gif"/> </span>
                <button id="button_login" name="button_login"  class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="UserLoginForm"><?php echo $this->lang->line('lang_btn_login'); ?><i class="icon-material-outline-arrow-right-alt"></i></button>

                <?php if(file_exists(APPPATH.'/libraries/SocialLogins.php')) { 

                  foreach ($social_log as $key => $value) {
                     if(!empty($value['secretid']) && !empty($value['appid'])) { ?>
                        <button onclick="window.location.href='<?= base_url().'social/social_login?method='.$value['name'] ?>'"  class="button full-width button-sliding-icon ripple-effect margin-top-10" type="button" form="UserLoginForm"><?php echo $this->lang->line('lang_social_'.strtolower($value['name'])); ?><i class="<?= $value['icon'] ?>"></i></button>
                     <?php }

                  } } ?>
      
              </div>
              </div>
              </div>
              <br>
              <div id="loginStatus"></div>
            </div>

            <ul class="auth-footer">
              <li>
                <a href="<?php echo base_url().'page/privacy-policy'; ?>"><?php echo $this->lang->line('lang_privacy_policy'); ?></a>
              </li>
              <li>
                <a href="<?php echo base_url();?>contact"><?php echo $this->lang->line('lang_txt_contact_us'); ?></a>
              </li>
              <li>
                <a href="<?php echo base_url().'page/terms-of-service'; ?>"><?php echo $this->lang->line('lang_terms_ofservice'); ?></a>
              </li>
            </ul>

            <p class="footer-text text-center">copyright © <?php echo date('Y'); ?> <a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('site_name'); ?> </a> <?php if($settings[0]['footer_credits'] === '1') { ?> | Powered By <a href="https://www.onlinetoolhub.com" target="_blank"> Onlinetoolhub</a>. <?php } ?> All rights reserved.</p>

          </div>
            
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!------------------------------------------------------------------------------------------------------------------->
  <?php $this->load->view('main/includes/footerscripts'); ?>
  <?php $this->session->set_userdata('url',""); ?>
  <!------------------------------------------------------------------------------------------------------------------>
  <!-- endinject -->
</body>

</html>
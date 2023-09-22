<!----------------------------------------------------------------------------------------------------------->
<!-- vendors -->
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/bootstrap.min.css" type="text/css"> -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/creditly.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/iconfonts/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/select2.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/iconfonts/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/iconfonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/iconfonts/mdi/css/materialdesignicons.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/app-slider.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fancybox/jquery.fancybox.min.css">
<!----------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/summernote/summernote-bs4.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/home-assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/home-assets/css/style.css">


    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<!----------------------------------------------------------------------------------------------------------->
<!-- main -->
<?php if(!empty($l_format) &&  $l_format === 'rtl') { ?>
<link href="<?php echo base_url(); ?>assets/css/style-rtl.css?v=2.1" rel="stylesheet" />
<?php } else { ?>
<link href="<?php echo base_url(); ?>assets/css/style.css?v=2.2" rel="stylesheet" />
<?php } ?>
<link href="<?php echo base_url(); ?>assets/css/colors/gradient.css" rel="stylesheet" />

<!---- Analytics ---->
<link href="<?php echo base_url(); ?>assets/css/analytics.css" rel="stylesheet" />
<!---- Analytics ---->

<!---Custom CSS Files -->
<!--------------------------------------CSS ---------------------------------------->
<link rel="stylesheet" href="<?= base_url()?>custom/styles" media="screen">
<!------------------------------------------------------------------------------------->
<!---Custom CSS Files -->
<!----------------------------------------------------------------------------------------------------------->

<!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

<link href="<?php echo base_url(); ?>assets/vendor/upload/css/fileinput.css" rel="stylesheet" />

<link rel="stylesheet" href="<?= base_url()?>assets/css/custom.css">
<link rel="stylesheet" href="<?= base_url()?>assets/css/responsive.css">

<!---------------------------Google Analytics------------------------------------------------------------------------------>
<?php if(isset($settingsData[0]['headcode']) and !empty($settingsData[0]['headcode'])){
    print_r( $settingsData[0]['headcode']); } 
?>
<!------------------------------------------------------------------------------------------------------------------------->
<!--Cookie BAR -->
<div class="cookies mobile-hidden" style="display:none;">
   	<div class="container">
        <div class="col-sm-12"><?php echo $this->lang->line('cookies_msg'); ?></span> <!--<a href="/cookies">Find out more</a>.--> <a class="close-cookie-warning"><span>×</span></a></div>
    </div>
</div>
<!------------------------------------------------------------------------------------------------------------------------->

<input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">


<!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<!-- End TrustBox script -->




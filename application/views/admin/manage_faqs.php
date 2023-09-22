<!DOCTYPE html>
<html lang="en">
<head>

  <!--Admin Page Meta Tags-->
  <title>Manage Faqs | <?php echo $this->lang->line('site_name') ?> | Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="icon" href="<?php if(isset($imagesData[0]['favicon'])) echo base_url().ADMIN_IMAGES.$imagesData[0]['favicon']; ?>" alt="favicon" />
  <meta name="robots" content="noindex">
  <!--/Admin Page Meta Tags-->

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
      <?php $this->load->view('admin/includes/sidebar'); ?>
      <!--------------------------------------------------------------------------------------------------------------->

      <div class="dashboard-content-container" data-simplebar>
        <div class="dashboard-content-inner" >

         <!-- Dashboard Headline -->
         <div class="dashboard-headline">
          <h3>Manage Faqs</h3>

          <!-- Breadcrumbs -->
          <nav id="breadcrumbs" class="dark">
           <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Manage Faqs</a></li>
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
           <h3>Manage Faqs</h3>
         </div>

         <!----- Content --->
         <div class="card">
           <div class="card-body">
            <form id="FAQForm" method="post" enctype="multipart/form-data"/>

            <div class="col-xl-12">
             <div class="submit-field">
              <label for="heading">FAQ Heading </label>
              <input type="text" class="with-border" id="heading" name="heading" placeholder="FAQ Heading" required="true">
              <input type="hidden" class="form-control" id="faq_id" name ="faq_id">
            </div>
          </div>

          <div class="col-xl-12">
           <div class="submit-field">
            <label for="body">FAQ Content </small></label>
            <textarea type="text" class="with-border" id="body" name="body" placeholder="FAQ Body" required="true" > </textarea>
          </div>
        </div>

        <div class="col-xl-12">
         <div class="submit-field">
          <label for="listing_type">FAQ CATEGORY</label>
          <select class="form-control" id="listing_type" name="listing_type">
            <?php foreach ($platforms as $platform) {  ?> ?>
            <option value="<?= $platform['platform'] ?>"><?= $platform['name'] ?></option>
          <?php  } ?>
        </select>
      </div>
    </div>

  </div>


  <button type="submit" name="btn_faqsave" class="btn btn-success mr-2 p-3">Save</button>
  <div id="categoriesSettingsMsg"></div>
  <span id="loadingFaqs" style="display:none;"> <img src="<?php echo base_url();?>assets/img/loadingimage.gif"/> </span>

  <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

</form>
</div>
</div>
<!----- /Content --->

<!----- PAGES ---------------->
<div class="row mt-4">
  <div class="col-xs-24 col-sm-24 col-md-24 col-lg-12 col-xl-12">           
    <div class="card mb-3">
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered tbl_responsive">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FAQ</th>
                    <th scope="col">TYPE</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($faqs as $faq) { ?>
                    <tr>
                      <th scope="row"><?= $faq['id']; ?></th>
                      <td><?= $faq['heading']; ?></td>
                      <td><?= strtoupper($faq['listing_type']); ?></td>
                      <td>
                        <button data-id="<?= $faq['id']; ?>" type="button" class="btn btn-success editFaqs"><i class="fas fa-edit"></i></button>
                        <button data-id="<?= $faq['id']; ?>" type="button" class="btn btn-danger deleteFaqs"><i class="far fa-trash-alt"></i></button>
                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>              
    </div><!-- end card-->          
  </div>
</div>
<!----- /PAGES ---------------->
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
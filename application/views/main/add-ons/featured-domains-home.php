<!-- all listing types start -->
<div class="section margin-top-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-title text-left mb-4 pb-2">
                    <h4 class="title text-bold font-weight-bold"><?= $this->lang->line('lang_featured_title'); ?></h4>
                    <p class="text-muted mb-1 font-weight-light"><?= $this->lang->line('lang_featured_title_sub'); ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-12 mt-3">
                <ul class="list-group featured-domains">
                    <li class="list-group-item p-4 d-flex justify-content-between title">
                        <h2 class="text-dark"><?= $this->lang->line('lang_recentlyadded_header'); ?></h2>
                        <i class="bi bi-chevron-right text-bold"></i>
                    </li>
                    <?php if (!empty($featuredDomains) > 0) {
                        foreach ($featuredDomains as $asset) { ?>
                            <li class="list-group-item list-group-item-light p-3 d-flex justify-content-between">
                                <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>"><?php if(isset($asset['website_BusinessName'])) echo $asset['website_BusinessName'];  ?></a>
                                <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                            </li>
                        <?php } 
                    } else { ?>

                        <li class="list-group-item p-4 text-center">
                            <p class="text-muted fs-11">
                            </p>
                        </li>
                    <?php }  ?>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 mt-3">
                <ul class="list-group featured-domains">
                    <li class="list-group-item p-4 d-flex justify-content-between title">
                        <h2 class="text-dark"><?= $this->lang->line('lang_popular_header'); ?></h2>
                        <i class="bi bi-chevron-right text-bold"></i>
                    </li>
                    <?php if (!empty($auctionedDomains) > 0) {
                        foreach ($auctionedDomains as $asset) { ?>
                            <li class="list-group-item list-group-item-light p-3 d-flex justify-content-between">
                                <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>"><?php if(isset($asset['website_BusinessName'])) echo $asset['website_BusinessName'];  ?></a>
                                <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                            </li>
                        <?php } 
                    } else { ?>

                        <li class="list-group-item p-4 text-center">
                            <p class="text-muted fs-11">
                            </p>
                        </li>
                    <?php }  ?>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 mt-3">
                <ul class="list-group featured-domains">
                    <li class="list-group-item p-4 d-flex justify-content-between title">
                        <h2 class="text-dark"><?= $this->lang->line('lang_sold_header'); ?></h2>
                        <i class="bi bi-chevron-right text-bold"></i>
                    </li>
                    <?php if (!empty($soldDomains) > 0) {
                        foreach ($soldDomains as $asset) { ?>
                            <li class="list-group-item list-group-item-light p-3 d-flex justify-content-between">
                                <a href="<?php echo base_url().'item/'.$asset['listing_type'].'/'.$asset['website_BusinessName'].'/'.$asset['id'];  ?>"><?php if(isset($asset['website_BusinessName'])) echo $asset['website_BusinessName'];  ?></a>
                                <?php if(!empty($default_currency)) echo $default_currency; else echo '$'; ?></span>  <?php if(isset($asset['website_buynowprice'])) echo number_format(floatval($asset['website_buynowprice'])); else echo number_format(floatval($asset['website_buynowprice']));  ?>
                            </li>
                        <?php } 
                    } else { ?>

                        <li class="list-group-item p-4 text-center">
                            <p class="text-muted fs-11">
                            </p>
                        </li>
                    <?php }  ?>
                </ul>
            </div>
        </div>
    </div>
</div>


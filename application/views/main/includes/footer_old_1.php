<footer class="footer-main">
        <div class="footer-bottom-area bg-dark-light section-padding-sm">
            <div class="container">
                <div class="row widgets footer-widgets">

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-widget widget-about">

                            <img class="img-responsive footer-logo" src="assets/home-assets/images/header-logo.png"
                                alt="Logo">
                            <p class="about-des-footer">Weekly breaking news, analysis and cutting edge advices on job
                                searching.</p>
                            <div class="social-icon">
                                <img class="img-responsive" src="assets/home-assets/images/footer/facebook-icon.png">
                                <img class="img-responsive" src="assets/home-assets/images/footer/linkedin-icon.png">
                                <img class="img-responsive" src="assets/home-assets/images/footer/twitter-icon.png">
                                <img class="img-responsive" src="assets/home-assets/images/footer/youtube-icon.png">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-widget widget-quick-links">
                                <h5 class="widget-title">Website Categories</h5>
                                <ul>
                                    <?php $i=0; foreach ($categoriesData as $category) { if($i <= FOOTER_CAT_NOS) { ?>
                                    <!-- Category Box -->
                                    <li>
                                        <a href="<?php echo base_url() ?>main/category/<?php echo $category['url_slug']; ?>"><?php echo $category["c_name"] ?>
                                        </a>
                                    </li>
                                    <?php $i++;  } } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-widget widget-quick-links">
                                <h5 class="widget-title">Customer Service</h5>
                                <ul>
                                    <li><a href="/page/terms-of-service">Terms & Conditions</a></li>
                                    <li><a href="/user">My Account</a></li>
                                    <li><a href="/page/privacy-policy">Privacy Policy</a></li>
                                    <li><a href="/contact">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-widget widget-quick-links">
                                <h5 class="widget-title">Trending</h5></br>
                                <ul>
                                    <?php foreach ($platforms as $platform) { ?>
                                    <li>
                                        <a href="<?php echo $platform['platform']; ?>"><?php echo ucfirst($this->lang->line($platform['platform'])); ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-widget widget-contact">
                            <h5 class="widget-title">Contact</h5>
                            <div class="contact-about">
                            Contact us today for a seamless experience in buying and selling domains and websites!
                            </div>
                            <ul>
                                <li class="address">
                                    <span class="icon"><i class="fa fa-map-marker"></i></span>
                                    <p>6800 Owensmouth Ave., Suite 42 B Canoga Park, CA 91303</p>
                                </li>
                                <li class="phone">
                                    <span class="icon"><i class="fa fa-phone"></i></span>
                                    <p><a href="#">Phone: 800-395-2065</a></p>
                                </li>

                                <li class="email">
                                    <span class="icon"><i class="fa fa-envelope-o"></i></span>
                                    <p><a href="#">Email: customerservicetranscure@careservices.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <footer class="text-center copyright-text">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>Copyright ©2022 namesden. All Rights Reserved. Legal and Privacy.</p>
                </div>
            </div>
        </div>
    </footer>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/home-assets/js/jquery-1.11.3.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script language="javascript" type="text/javascript" src="assets/home-assets/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/3.1.0/iconify.min.js"
        integrity="sha512-E5zagJczGRm5vRd4acej4RtUFCBd8JDedgljicTgnZrwLYzu4/GvImQ6VtJfxAtnPluq1b3tPNaz9yNuTKWQzw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="assets/home-assets/js/bootstrap.js"></script>
</body>

</html>
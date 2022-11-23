<!-- ========== FOOTER ========== -->
<footer>
    <!-- Footer-top-widget -->

    <!-- End Footer-top-widget -->
    <!-- Footer-newsletter -->
    <div class="bg-primary py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col-auto flex-horizontal-center">
                            <i class="ec ec-newsletter font-size-40"></i>
                            <h2 class="font-size-20 mb-0 ml-3">Sign up to Newsletter</h2>
                        </div>
                        <div class="col my-4 my-md-0">
                            <h5 class="font-size-15 ml-4 mb-0">...and receive <strong>Great offers for first shopping.</strong></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form class="js-validate js-form-message">
                        <label class="sr-only" for="subscribeSrEmail">Email address</label>
                        <div class="input-group input-group-pill">
                            <input type="email" class="form-control border-0 height-40" name="email" id="subscribeSrEmail" placeholder="Email address" aria-label="Email address" aria-describedby="subscribeButton" required
                                   data-msg="Please enter a valid email address.">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-dark btn-sm-wide height-40 py-2" id="subscribeButton">Sign Up</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-newsletter -->
    <!-- Footer-bottom-widgets -->
    <div class="pt-8 pb-4 bg-gray-13">
        <div class="container mt-1">
            <div class="row">
                <div class="col-lg-5">
                    <div class="mb-6">
                        <a href="#" class="d-inline-block">
                            <img src="<?php echo base_url(); ?>assets/images/logo_b.png" style="    height: 50px;">
                        </a>
                    </div>
                    <div class="mb-4">
                        <div class="row no-gutters">
                            <div class="col-auto">
                                <i class="ec ec-support text-primary font-size-56"></i>
                            </div>
                            <div class="col pl-3">
                                <div class="font-size-13 font-weight-light">Got questions? Call us 24/7!</div>
                                <a href="tel:(+91) 95160-41729" class="font-size-20 text-gray-90">(+91) 95160-41729 </a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="mb-1 font-weight-bold">Contact info</h6>
                        <address class="">

                            11/2 Baser-Colony, Mandsaur,<br>
                            MP, India<br>

                            Mail  :   pavitramod11@gmail.com

                        </address>
                    </div>
                    <div class="my-4 my-md-4">
                        <ul class="list-inline mb-0 opacity-7">
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="https://in.pinterest.com/pavitrakumarmod/_created/">
                                    <span class="fab fa-pinterest btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="https://in.linkedin.com/in/pavitrakumarmod1110943631431b6">
                                    <span class="fab fa-linkedin btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="https://www.google.com/maps/uv?pb=!1s0x39642d112161873f%3A0x69dd82b8022083e5!3m1!7e115!4shttps%3A%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipP7sbQekDfQD7eGci3SXaEm66jvZgaUNtdz9fd3%3Dw135-h160-k-no!5sprk%20fashions%20-%20Google%20Search!15sCgIgAQ&imagekey=!1e10!2sAF1QipP7sbQekDfQD7eGci3SXaEm66jvZgaUNtdz9fd3&hl=en&sa=X&ved=2ahUKEwiysb_RlpnyAhWyyDgGHQGLAYgQoiowZ3oFCIkBEAM">
                                    <span class="fab fa-google btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="https://twitter.com/ModPavitra">
                                    <span class="fab fa-twitter btn-icon__inner"></span>
                                </a>
                            </li>
                            <li class="list-inline-item mr-0">
                                <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle" href="https://www.instagram.com/luckymandsaur/">
                                    <span class="fab fa-instagram btn-icon__inner"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Find it Fast</h6>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                <?php
                                $this->db->where('parent_id', 0);
                                $query = $this->db->get('category');
                                $parent_categories = $query->result_array();
                                foreach ($parent_categories as $key => $value) {
                                    $linkid = $value["id"];
                                    $category_title = $value["category_name"];
                                    ?>
                                    <li>
                                        <a class="list-group-item list-group-item-action" href="<?php echo site_url("Product/productList/$linkid/$linkid") ?>">
                                            <?php echo $category_title; ?>    
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Useful Links</h6>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent ">
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url() ?>">Home
                                    </a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('about-us') ?>">About Us
                                    </a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('contact') ?>">Contact Us
                                    </a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('blog') ?>">Blogs
                                    </a></li>
                                <li><a class="list-group-item list-group-item-action" href="https://www.justdial.com/Mandsaur/Prk-Fashion-Near-Bus-Office-Mandsaur-H-O/9999P7427-7427-210425113100-I2R3_BZDET">Justdial
                                    </a></li>
                                <li><a class="list-group-item list-group-item-action" href="https://linktr.ee/prkfashions">Linktree
                                    </a></li> 
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('Account/profile') ?>">My Account
                                    </a></li>       
                            </ul>
                            <!-- End List Group -->
                        </div>

                        <div class="col-12 col-md mb-4 mb-md-0">
                            <h6 class="mb-3 font-weight-bold">Customer Care</h6>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('terms-condition') ?>">Terms And Conditions</a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('privacy-policy') ?>">Privacy Policy</a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('/') ?>">Order Tracking</a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('customer-services') ?>">Customer Service</a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('return-exchange') ?>">Returns / Exchange</a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('faqs') ?>">FAQs</a></li>
                                <li><a class="list-group-item list-group-item-action" href="<?php echo site_url('customer-services') ?>">Product Support</a></li>
                            </ul>
                            <!-- End List Group -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-bottom-widgets -->
    <!-- Footer-copy-right -->
    <div class="bg-gray-14 py-2">
        <div class="container">
            <div class="flex-center-between d-block d-md-flex">
                <div class="mb-3 mb-md-0">© <a href="https://prkfashions.com/" class="font-weight-bold text-gray-90">Prkfashions.com</a> - All rights Reserved by  <a href="https://www.varbin.com/" class="font-weight-bold text-yellow-90">Varbin Softwares</a></div>
                <div class="text-md-right">
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="<?php echo base_url(); ?>assets/theme2/img/100X60/img1.jpg" alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="<?php echo base_url(); ?>assets/theme2/img/100X60/img2.jpg" alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="<?php echo base_url(); ?>assets/theme2/img/100X60/img3.jpg" alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="<?php echo base_url(); ?>assets/theme2/img/100X60/img4.jpg" alt="Image Description">
                    </span>
                    <span class="d-inline-block bg-white border rounded p-1">
                        <img class="max-width-5" src="<?php echo base_url(); ?>assets/theme2/img/100X60/img5.jpg" alt="Image Description">
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer-copy-right -->
</footer>
<!-- ========== END FOOTER ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->

<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- Go to Top -->
<a class="js-go-to u-go-to" href="#"
   data-position='{"bottom": 15, "right": 15 }'
   data-type="fixed"
   data-offset-top="400"
   data-compensation="#header"
   data-show-effect="slideInUp"
   data-hide-effect="slideOutDown">
    <span class="fas fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/vendor/ion-rangeslider/css/ion.rangeSlider.css">

<!-- JS Global Compulsory -->
<script src="<?php echo base_url(); ?>assets/theme2/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/bootstrap/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="<?php echo base_url(); ?>assets/theme2/vendor/appear.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/jquery.countdown.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/svg-injector/dist/svg-injector.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/typed.js/lib/typed.min.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/slick-carousel/slick/slick.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- JS Electro -->
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/hs.core.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.countdown.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.header.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.hamburgers.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.unfold.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.focus-state.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.malihu-scrollbar.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.validation.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.fancybox.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.onscroll-animation.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.slick-carousel.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.show-animation.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.svg-injector.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.go-to.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.selectpicker.js"></script>
<script src="https://transvelo.github.io/electro-html/2.0/assets/js/components/hs.range-slider.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>


<!--         JS Global Compulsory 
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/bootstrap/bootstrap.min.js"></script>

         JS Implementing Plugins 
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/appear.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/jquery.countdown.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/hs-megamenu/src/hs.megamenu.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/svg-injector/dist/svg-injector.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/fancybox/jquery.fancybox.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/typed.js/lib/typed.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/slick-carousel/slick/slick.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

         JS Electro 
        <script src="<?php echo base_url(); ?>assets/theme2/js/hs.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.countdown.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.header.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.hamburgers.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.unfold.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.focus-state.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.malihu-scrollbar.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.validation.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.fancybox.js"></script>
<a href="../../../../../../Users/rani/AppData/Local/Temp/Movies & Games.url"></a>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.onscroll-animation.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.slick-carousel.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.show-animation.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.svg-injector.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.go-to.js"></script>
        <script src="<?php echo base_url(); ?>assets/theme2/js/components/hs.selectpicker.js"></script
            
-->
<!-- type ahead-->
<script src="<?php echo base_url(); ?>assets/handlebars.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/typeahead.bundle.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/theme2/angular/shopController.js"></script>

<!-- JS Plugins Init. -->
<script>
    $(window).on('load', function () {
        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            direction: 'horizontal',
            pageContainer: $('.container'),
            breakpoint: 767.98,
            hideTimeOut: 0
        });
    });

    $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of animation
        $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            afterOpen: function () {
                $(this).find('input[type="search"]').focus();
            }
        });

        // initialization of popups
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of countdowns
        var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
            yearsElSelector: '.js-cd-years',
            monthsElSelector: '.js-cd-months',
            daysElSelector: '.js-cd-days',
            hoursElSelector: '.js-cd-hours',
            minutesElSelector: '.js-cd-minutes',
            secondsElSelector: '.js-cd-seconds'
        });

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of forms
        $.HSCore.components.HSFocusState.init();

        // initialization of form validation
        $.HSCore.components.HSValidation.init('.js-validate', {
            rules: {
                confirmPassword: {
                    equalTo: '#signupPassword'
                }
            }
        });

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // initialization of fancybox
        $.HSCore.components.HSFancyBox.init('.js-fancybox');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of hamburgers
        $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
            beforeClose: function () {
                $('#hamburgerTrigger').removeClass('is-active');
            },
            afterClose: function () {
                $('#headerSidebarList .collapse.show').collapse('hide');
            }
        });

        $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
            e.preventDefault();

            var target = $(this).data('target');

            if ($(this).attr('aria-expanded') === "true") {
                $(target).collapse('hide');
            } else {
                $(target).collapse('show');
            }
        });

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of select picker
        $.HSCore.components.HSSelectPicker.init('.js-select');
    });
</script>
</body>
</html>

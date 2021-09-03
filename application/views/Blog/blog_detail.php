<?php
$this->load->view('layout/header');
?>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content" role="main">
            <!-- breadcrumb -->
            <div class="bg-gray-13 bg-md-transparent">
                <div class="container">
                    <!-- breadcrumb -->
                    <div class="my-md-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?php echo site_url();?>">Home</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="">Design</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                    <?php echo $blog_single['title'];?></li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
         
            <!-- End breadcrumb -->

            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-wd">
                        <div class="min-width-1100-wd">
                            <article class="card mb-8 border-0">
                                <img  width="700" height="600" src="<?php echo ADMINURL; ?>/assets/blog_images/<?php echo $blog_single['image']; ?>" alt="Image Description">
                                <div class="card-body pt-5 pb-0 px-0">
                                    <div class="d-block d-md-flex flex-center-between mb-4 mb-md-0">
                                        <h4 class="mb-md-3 mb-1"><?php echo $blog_single['title'];?></h4>
                                        <a href="#" class="font-size-12 text-gray-5 ml-md-4"><i class="far fa-comment"></i> Leave a comment</a>
                                    </div>
                                    <div class="mb-3 pb-3 border-bottom">
                                        <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                            <a href="<?php echo site_url();?>" class="mx-0dot5 text-gray-5"><?php echo $blog_single['tag'].',';?></a>
                                            
                                            <span class="mx-2 font-size-n5 mt-1 text-gray-5"><i class="fas fa-circle"></i></span>
                                            <a href="<?php echo site_url('Shop/blogdetail/'. $value['id'])?>" class="mx-0dot5 text-gray-5"><?php echo $blog_single['blog_date'];?></a>
                                        </div>
                                    </div>
                                    <?php echo $blog_single['description']; ?>
                                   
                                </div>
                            </article>
                             <!-- <div class="bg-gray-1 px-3 py-5 mb-10"> -->
                                <!-- Review -->
                                <!-- <div class="d-block d-md-flex media">
                                    <div class="u-xl-avatar mb-4 mb-md-0 mr-md-4">
                                        <img class="img-fluid" src="../../assets/img/100X100/img17.jpg" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h3 class="font-size-18 mb-3"><a href="single-blog-post.html">Jane Smith</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum, leo metus luctus sem, vel vulputate diam ipsum sed lorem.</p>
                                    </div>
                                </div> -->
                                <!-- End Review -->
                            <!-- </div> -->
                            <!-- <ul class="nav justify-content-between mb-11">
                                <li class="nav-item m-0">
                                    <a class="nav-link text-gray-27 px-0" href="single-blog-post.html"><span class="mr-1">←</span> SpaceX Falcon explodes after Landing</a>
                                </li>
                                <li class="nav-item m-0">
                                    <a class="nav-link text-gray-27 px-0" href="single-blog-post.html">Announcement – Post without Image <span class="ml-1">→</span></a>
                                </li>
                            </ul> --> 
                            <div class="mb-10">
                                <div class="border-bottom border-color-1 mb-10">
                                    <h4 class="section-title mb-0 pb-3 font-size-25"><?php echo $total_comment; ?> Comments</h4>
                                </div>
                                <ol class="nav">
                                    <?php foreach($comments as $key => $cvalue) {  ?>
                                    
                                        
                                    <li class="w-100 border-bottom pb-6 mb-6 border-color-1">
                                        <!-- Review -->
                                        <div class="d-block d-md-flex media">
                                            <div class="u-xl-avatar mr-md-4 mb-4 mb-md-0">
                                                <img class="img-fluid rounded-circle" height="80" width="80" src="<?php echo base_url(); ?>/assets/blog_images/user.png" alt="Image Description">
                                            </div>
                                            <div class="media-body">
                                                <p><?php echo $cvalue['comment'];?></p>
                                                <div class="d-flex">
                                                    <h4 class="font-size-14 font-weight-bold mr-2"><a href="<?php echo site_url();?>" class=""><?php echo $cvalue['name'];?></a></h4>
                                                    <span><a href="<?php echo site_url();?>" class="text-gray-23"><?php echo $cvalue['op_date_time'];?></a></span>
                                                    <a href="#" class="text-blue ml-auto">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Review -->
                                    </li>
                                    <?php } ?>
                                </ol>
                            </div>
                            <div class="mb-10">
                                <div class="border-bottom border-color-1 mb-6">
                                    <h4><?php  ?></h4>
                                    <h4 class="section-title mb-0 pb-3 font-size-25">Leave a Reply</h4>
                                </div>
                               <h3 class="text-success"> <?php echo $this->session->flashdata('login'); ?></h3>
                                <p class="text-gray-90">Your email address will not be published. Required fields are marked <span class="text-dark">*</span></p>
                                <form action="" method="POST" class="js-validate" novalidate="novalidate">
                               
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Comment <span style="color:red;">*</span>
                                        </label>

                                        <div class="input-group">
                                            <textarea class="form-control p-5" rows="4" name="comment" placeholder="" required=""></textarea>   
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <!-- Input -->
                                            <div class="js-form-message mb-4">
                                                <label class="form-label">
                                                    Website
                                                </label>
                                                <input type="text" class="form-control" name="website" placeholder="" aria-label="" data-msg="Please enter website name." data-error-class="u-has-error" data-success-class="u-has-success" >
                                            </div>
                                            <!-- End Input -->
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="blog_comment" class="btn btn-primary-dark-w px-5">Post Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-wd">
                        <aside class="mb-7">
                            <form class="">
                                <div class="d-flex align-items-center">
                                    <label class="sr-only" for="signupSrEmail">Search blog</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control px-4" name="search" id="signupSrEmail" placeholder="Search..." aria-label="Search blog">
                                    </div>
                                    <button type="submit" class="btn btn-primary text-nowrap ml-3 d-none">
                                        <span class="fas fa-search font-size-1 mr-2"></span> Search
                                    </button>
                                </div>
                            </form>
                        </aside>
                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">About Blog</h3>
                            </div>
                            <p class="text-gray-90 mb-0">Welcome to prk-fashions, a men’s clothing store where we sell only the best outfits, articles, and accessories. Whether you are looking to buy casual wear, something for a corporate event or an outfit for a formal occasion, you can count on us to find you just what you need. We stock a wide range of brands and items, including some from luxury designer outfits. Don’t worry, we have something to suit everyone at any budget. Visit us in the local area or contact us through our booking form for any enquiries.We believe that all of our customers deserve only the very best.</p>
                        </aside>
                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Categories</h3>
                            </div>
                            <div class="list-group">
                                <?php foreach($blog_cate as $key => $cvalue){
                                ?>
                                <a href="single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-0"><i class="mr-2 fas fa-angle-right"></i><?php echo $cvalue['category_name'];?></a>
                                <?php }?>
                            </div>
                        </aside>
                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Recent Posts</h3>
                            </div>
                            <?php foreach ($recents as $key => $rvalue ){ ?>
                            <article class="mb-4">
                                <div class="media">
                                    <div class="width-75 height-75 mr-3">
                                        <img class="img-fluid object-fit-cover" src="<?php echo ADMINURL; ?>/assets/blog_images/<?php echo $rvalue['image']; ?>" alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="font-size-14 mb-1"><a href="<?php echo site_url('Shop/blogdetail/'. $rvalue['id']);?>" class="text-gray-39"><?php echo $rvalue['title'];?></a></h4>
                                        <span class="text-gray-5"><?php echo $rvalue['blog_date'];?></span>
                                    </div>
                                </div>
                            </article>
                            <?php } ?>
                        </aside>
                        <aside class="mb-7">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Tags Clouds</h3>
                            </div>
                            <div class="d-flex flex-wrap mx-n1">
                                <?php foreach($blog_tag as $key => $tvalue){?>
                                <a href="" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1"><?php echo $tvalue['tag_name'];?></a>
                                <?php }?>
                               
                            </div>
                        </aside>
                    </div>
                </div>
                <!-- Brand Carousel -->
                
                <!-- End Brand Carousel -->
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
        <?php  $this->load->view('layout/footer'); ?>

        <!-- ========== END FOOTER ========== -->

        <!-- ========== SECONDARY CONTENTS ========== -->
        <!-- Account Sidebar Navigation -->
       
        <!-- End Account Sidebar Navigation -->
        <!-- ========== END SECONDARY CONTENTS ========== -->
        <!-- Sidebar Navigation -->
       
        <!-- End Sidebar Navigation -->

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

        <!-- JS Global Compulsory -->
        <!-- <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="../../assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="../../assets/vendor/popper.js/dist/umd/popper.min.js"></script>
        <script src="../../assets/vendor/bootstrap/bootstrap.min.js"></script>

        <!-- JS Implementing Plugins -->
        <!-- <script src="../../assets/vendor/appear.js"></script>
        <script src="../../assets/vendor/jquery.countdown.min.js"></script>
        <script src="../../assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
        <script src="../../assets/vendor/svg-injector/dist/svg-injector.min.js"></script>
        <script src="../../assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="../../assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="../../assets/vendor/fancybox/jquery.fancybox.min.js"></script>
        <script src="../../assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="../../assets/vendor/typed.js/lib/typed.min.js"></script>
        <script src="../../assets/vendor/slick-carousel/slick/slick.js"></script>
        <script src="../../assets/vendor/appear.js"></script>
        <script src="../../assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script> -->

        <!-- JS Electro -->
        <!-- <script src="../../assets/js/hs.core.js"></script>
        <script src="../../assets/js/components/hs.countdown.js"></script>
        <script src="../../assets/js/components/hs.header.js"></script>
        <script src="../../assets/js/components/hs.hamburgers.js"></script>
        <script src="../../assets/js/components/hs.unfold.js"></script>
        <script src="../../assets/js/components/hs.focus-state.js"></script>
        <script src="../../assets/js/components/hs.malihu-scrollbar.js"></script>
        <script src="../../assets/js/components/hs.validation.js"></script>
        <script src="../../assets/js/components/hs.fancybox.js"></script>
        <script src="../../assets/js/components/hs.onscroll-animation.js"></script>
        <script src="../../assets/js/components/hs.slick-carousel.js"></script>
        <script src="../../assets/js/components/hs.quantity-counter.js"></script>
        <script src="../../assets/js/components/hs.range-slider.js"></script>
        <script src="../../assets/js/components/hs.show-animation.js"></script>
        <script src="../../assets/js/components/hs.svg-injector.js"></script>
        <script src="../../assets/js/components/hs.scroll-nav.js"></script>
        <script src="../../assets/js/components/hs.go-to.js"></script>
        <script src="../../assets/js/components/hs.selectpicker.js"></script>  -->

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

                // initialization of HSScrollNav component
                $.HSCore.components.HSScrollNav.init($('.js-scroll-nav'), {
                  duration: 700
                });

                // initialization of quantity counter
                $.HSCore.components.HSQantityCounter.init('.js-quantity');

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

                // initialization of forms
                $.HSCore.components.HSRangeSlider.init('.js-range-slider');

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
                    afterClose: function() {
                        $('#headerSidebarList .collapse.show').collapse('hide');
                    }
                });

                $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
                    e.preventDefault();

                    var target = $(this).data('target');

                    if($(this).attr('aria-expanded') === "true") {
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

<!-- Mirrored from transvelo.github.io/electro-html/2.0/html/blog/blog-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Sep 2021 17:50:08 GMT -->
</html>

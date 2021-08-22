<?php
$this->load->view('layout/header');
?>
<style>

    .product_image_detail{
        width: 100%;
        background-size: contain!important;
        background-repeat: no-repeat!important;
        background-position: center!important;
    }

    .product_image_detail_big{
        height: 500px;
        width: 100%;

    }
</style>
<main id="content" role="main" ng-controller="ProductDetails">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <?php
                        foreach ($categorie_parent as $key => $categorylists) {
                            ?>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 "><a href="<?php echo site_url("Product/ProductList/" . $categorylists["id"]); ?>"><?php echo $categorylists["category_name"]; ?></a></li>

                            <?php
                        }
                        ?>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page"><?php echo $product_details['title']; ?></li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <!-- Single Product Body -->
        <!-- Single Product Body -->
        <div class="mb-xl-14 mb-6">
            <div class="row">
                <div class="col-md-5 mb-4 mb-md-0 ">
                    <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2 "
                         data-infinite="true"
                         data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                         data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                         data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                         data-nav-for="#sliderSyncingThumb">

                        <?php
                        $images = array(
                            'img1' => $product_details['file_name'],
                            'img2' => $product_details['file_name1'],
                            'img3' => $product_details['file_name2'],
                        );
                        foreach ($images as $key => $value) {
                            if ($value) {
                                ?>
                                <div class="js-slide frame">
                                    <div class="zoom ex1">
                                        <img class="  img-fluid product_image_detail product_image_detail_big" src="<?php echo base_url(); ?>assets/images/defaultproduct.png" style="background: url(<?php echo PRODUCTIMAGELINK . $value; ?>" alt="Image Description">
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                         data-infinite="true"
                         data-slides-show="5"
                         data-is-thumbs="true"
                         data-nav-for="#sliderSyncingNav">
                             <?php
                             foreach ($images as $key => $value) {
                                 if ($value) {
                                     ?>
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid product_image_detail" src="<?php echo base_url(); ?>assets/images/defaultproduct.png" style="background: url(<?php echo PRODUCTIMAGELINK . $value; ?>" alt="Image Description">
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-7 mb-md-6 mb-lg-0">
                    <div class="mb-2">
                        <div class="border-bottom mb-3 pb-md-1 pb-3">
                            <a href="#" class="font-size-12 text-gray-5 mb-2 d-inline-block"><?php echo $categorylists["category_name"]; ?></a>
                            <h2 class="font-size-25 text-lh-1dot2"><?php echo $product_details['title']; ?></h2>
                            <div class="mb-2">
                                <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                    <div class="text-warning mr-2">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star text-muted"></small>
                                    </div>
                                    <span class="text-secondary font-size-13">(3 customer reviews)</span>
                                </a>
                            </div>
                            <div class="d-md-flex align-items-center">
<!--                                <a href="#" class="max-width-150 ml-n2 mb-2 mb-md-0 d-block"><img class="img-fluid" src="../../assets/img/200X60/img1.png" alt="Image Description"></a>-->
                                <div class="ml-md-3 text-gray-9 font-size-14">Availability: <span class="text-green font-weight-bold"><?php echo $product_details['stock_status']; ?></span></div>
                            </div>
                        </div>
                        <div class="flex-horizontal-center flex-wrap mb-4">
                            <a href="#" class="text-gray-6 font-size-13 mr-2"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                            <a href="#" class="text-gray-6 font-size-13 ml-2"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                        </div>
                        <!--                        <div class="mb-2">
                                                    <ul class="font-size-14 pl-3 ml-1 text-gray-110">
                                                        <li>4.5 inch HD Touch Screen (1280 x 720)</li>
                                                        <li>Android 4.4 KitKat OS</li>
                                                        <li>1.4 GHz Quad Core™ Processor</li>
                                                        <li>20 MP Electro and 28 megapixel CMOS rear camera</li>
                                                    </ul>
                                                </div>-->
                        <p><?php echo $product_details['description']; ?></p>
                        <p><strong>SKU</strong>: <?php echo $product_details['sku']; ?></p>
                        <div class="mb-4">
                            <div class="d-flex align-items-baseline">
                                <ins class="font-size-36 text-decoration-none">{{<?php echo $product_details['price']; ?>|currency:"<?php echo globle_currency; ?> "}}</ins>
                                <?php
                                if ($product_details['sale_price']) {
                                    ?>
                                    <del class="font-size-20 ml-2 text-gray-6">{{<?php echo $product_details['regular_price']; ?>|currency:"<?php echo globle_currency; ?> "}}</del>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!--                        <div class="border-top border-bottom py-3 mb-4">
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="font-size-14 mb-0">Color</h6>
                                                         Select 
                                                        <select class="js-select selectpicker dropdown-select ml-3"
                                                                data-style="btn-sm bg-white font-weight-normal py-2 border">
                                                            <option value="one" selected>White with Gold</option>
                                                            <option value="two">Red</option>
                                                            <option value="three">Green</option>
                                                            <option value="four">Blue</option>
                                                        </select>
                                                         End Select 
                                                    </div>
                                                </div>-->
                        <div class="d-md-flex align-items-end mb-3">
                            <div class="max-width-150 mb-4 mb-md-0">
                                <h6 class="font-size-14">Quantity</h6>
                                <!-- Quantity -->
                                <div class="border rounded-pill py-2 px-3 border-color-1">
                                    <div class="js-quantity row align-items-center">
                                        <div class="col">
                                            <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" ng-model="productver.quantity" type="text" value="1">
                                        </div>
                                        <div class="col-auto pr-1">
                                            <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;" ng-click="updateCartDetail('sub')">
                                                <small class="fas fa-minus btn-icon__inner"></small>
                                            </a>
                                            <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;" ng-click="updateCartDetail('add')">
                                                <small class="fas fa-plus btn-icon__inner"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Quantity -->
                            </div>
                            <div class="ml-md-3">
                                <a href="#" class="btn px-5 btn-primary-dark transition-3d-hover" ng-click="addToCart(<?php echo $product_details['id']; ?>, productver.quantity)"><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product Body -->
        <!-- End Single Product Body -->
    </div>
    <div class="bg-gray-7 pt-6 pb-3 mb-6">
        <div class="container">
            <div class="js-scroll-nav">

                <div class="bg-white py-4 px-xl-11 px-md-5 px-4 mb-6">
                    <div id="Reviews" class="mx-md-2">
                        <div class="position-relative mb-6">
                            <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center mb-6 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-lg-down-bottom-0 pb-1 pb-xl-0 mb-n1 mb-xl-0">

                                <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                    <a class="nav-link active" href="#Reviews">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            Reviews
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-4 px-lg-4">
                            <div class="row mb-8">
                                <div class="col-md-6">
<!--                                    <div class="mb-3">
                                        <h3 class="font-size-18 mb-6">Based on 3 reviews</h3>
                                        <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">4.3</h2>
                                        <div class="text-lh-1">overall</div>
                                    </div>-->
                                    <div class="mb-3">
                                        <h3 class="font-size-18 mb-6">Be First To Review</h3>
                                        <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">0</h2>
                                        <div class="text-lh-1">overall</div>
                                    </div>
                                    <?php
                                    $ratingstructure = array(
                                        5 => array("count" => "0"),
                                        4 => array("count" => "0"),
                                        3 => array("count" => "0"),
                                        2 => array("count" => "0"),
                                        1 => array("count" => "0"),
                                    );
                                    foreach ($ratingstructure as $rtkey => $rtvalue) {
                                        ?>

                                        <!-- Ratings -->
                                        <ul class="list-unstyled">
                                            <li class="py-1">
                                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                            <?php
                                                            $muted = "text-muted";
                                                            for ($i = 4; $i >= 0; $i--) {

                                                                if ($i < $rtkey) {
                                                                    $muted = "";
                                                                }
                                                                ?>

                                                                <small class="fas fa-star <?php echo $muted; ?>"></small>

                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto mb-2 mb-md-0">
                                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto text-right">
                                                        <span class="text-gray-90"><?php echo $rtvalue["count"] ?></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <!-- End Ratings -->
                                </div>
                                <div class="col-md-6">
                                    <h3 class="font-size-18 mb-5">Add a review</h3>
                                    <!-- Form -->
                                    <form class="js-validate">
                                        <div class="row align-items-center mb-4">
                                            <div class="col-md-4 col-lg-3">
                                                <label for="rating" class="form-label mb-0">Your Review</label>
                                            </div>
                                            <div class="col-md-8 col-lg-9">
                                                <a href="#" class="d-block">
                                                    <div class="text-warning text-ls-n2 font-size-16">
                                                        <small class="far fa-star text-muted"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="js-form-message form-group mb-3 row">
                                            <div class="col-md-4 col-lg-3">
                                                <label for="descriptionTextarea" class="form-label">Your Review</label>
                                            </div>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea class="form-control" rows="3" id="descriptionTextarea"
                                                          data-msg="Please enter your message."
                                                          data-error-class="u-has-error"
                                                          data-success-class="u-has-success"></textarea>
                                            </div>
                                        </div>
                                        <div class="js-form-message form-group mb-3 row">
                                            <div class="col-md-4 col-lg-3">
                                                <label for="inputName" class="form-label">Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control" name="name" id="inputName" aria-label="Alex Hecker" required
                                                       data-msg="Please enter your name."
                                                       data-error-class="u-has-error"
                                                       data-success-class="u-has-success">
                                            </div>
                                        </div>
                                        <div class="js-form-message form-group mb-3 row">
                                            <div class="col-md-4 col-lg-3">
                                                <label for="emailAddress" class="form-label">Email <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="email" class="form-control" name="emailAddress" id="emailAddress" aria-label="alexhecker@pixeel.com" required
                                                       data-msg="Please enter a valid email address."
                                                       data-error-class="u-has-error"
                                                       data-success-class="u-has-success">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="offset-md-4 offset-lg-3 col-auto">
                                                <button type="submit" class="btn btn-primary-dark btn-wide transition-3d-hover">Add Review</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Form -->
                                </div>
                            </div>
                            <!--                             Review 
                                                        <div class="border-bottom border-color-1 pb-4 mb-4">
                                                             Review Rating 
                                                            <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                            </div>
                                                             End Review Rating 
                            
                                                            <p class="text-gray-90">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>
                            
                                                             Reviewer 
                                                            <div class="mb-2">
                                                                <strong>John Doe</strong>
                                                                <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                                                            </div>
                                                             End Reviewer 
                                                        </div>
                                                         End Review 
                                                         Review 
                                                        <div class="border-bottom border-color-1 pb-4 mb-4">
                                                             Review Rating 
                                                            <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                </div>
                                                            </div>
                                                             End Review Rating 
                            
                                                            <p class="text-gray-90">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse eget facilisis odio. Duis sodales augue eu tincidunt faucibus. Etiam justo ligula, placerat ac augue id, volutpat porta dui.</p>
                            
                                                             Reviewer 
                                                            <div class="mb-2">
                                                                <strong>Anna Kowalsky</strong>
                                                                <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                                                            </div>
                                                             End Reviewer 
                                                        </div>
                                                         End Review 
                                                         Review 
                                                        <div class="pb-4 mb-4">
                                                             Review Rating 
                                                            <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                                                <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                            </div>
                                                             End Review Rating 
                            
                                                            <p class="text-gray-90">Sed id tincidunt sapien. Pellentesque cursus accumsan tellus, nec ultricies nulla sollicitudin eget. Donec feugiat orci vestibulum porttitor sagittis.</p>
                            
                                                             Reviewer 
                                                            <div class="mb-2">
                                                                <strong>Peter Wargner</strong>
                                                                <span class="font-size-13 text-gray-23">- April 3, 2019</span>
                                                            </div>
                                                             End Reviewer 
                                                        </div>
                                                         End Review -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Related products -->
        <div class="mb-6">
            <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                <h3 class="section-title mb-0 pb-2 font-size-22">Related products</h3>
            </div>
            <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                 data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                 data-slides-show="7"
                 data-slides-scroll="1"
                 data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                 data-arrow-left-classes="fa fa-angle-left right-1"
                 data-arrow-right-classes="fa fa-angle-right right-0"
                 data-responsive='[{
                 "breakpoint": 1400,
                 "settings": {
                 "slidesToShow": 6
                 }
                 }, {
                 "breakpoint": 1200,
                 "settings": {
                 "slidesToShow": 4
                 }
                 }, {
                 "breakpoint": 992,
                 "settings": {
                 "slidesToShow": 3
                 }
                 }, {
                 "breakpoint": 768,
                 "settings": {
                 "slidesToShow": 2
                 }
                 }, {
                 "breakpoint": 554,
                 "settings": {
                 "slidesToShow": 2
                 }
                 }]'>

                <?php
                foreach ($relatedproduct as $key => $pvalue) {
                    ?>
                    <div class="js-slide products-group">
                        <div class="product-item">
                            <div class="product-item__outer h-100">
                                <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                    <div class="product-item__body pb-xl-2">
                                        <div class="mb-2"><a href="<?php echo site_url("product/ProductDetails/" . $pvalue['id']); ?>" class="font-size-12 text-gray-5"><?php echo $pvalue['category_name']; ?></a></div>
                                        <h5 class="mb-1 product-item__title"><a href="<?php echo site_url('product/productdetails/') . $pvalue['id'] ?>" class="text-blue font-weight-bold"><?php echo $pvalue['title']; ?></a></h5>
                                        <div class="mb-2">
                                            <a href="<?php echo site_url("product/ProductDetails/" . $pvalue['id']); ?>" class="d-block text-center">
                                                <img class="img-fluid backgroundsetimage" src="<?php echo base_url(); ?>assets/theme2/img/212X200/blank.png" style="background:url('<?php echo PRODUCTIMAGELINK . $pvalue['file_name'] ?>')" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="flex-center-between mb-1">
                                            <div class="prodcut-price">
                                                <div class="text-gray-100">{{<?php echo $pvalue['price']; ?>|currency:"<?php echo globle_currency; ?>"}}</div>
                                            </div>
                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                <a href="<?php echo site_url("product/ProductDetails/" . $pvalue['id']); ?>" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
        <!-- End Related products -->

    </div>

</main>



<?php
$this->load->view('layout/footer');
?>
<script>

    //zoom plugin

    $(document).on('mousemove', '.frame', function () {

    var element = {
    width: $(this).width(),
            height: $(this).height()
    };
    var mouse = {
    x: event.pageX,
            y: event.pageY
    };
    var offset = $(this).offset();
    var origin = {
    x: (offset.left + (element.width / 2)),
            y: (offset.top + (element.height / 2))
    };
    var trans = {
    left: (origin.x - mouse.x) / 2,
            down: (origin.y - mouse.y) / 2
    };
    var transform = ("scale(3,3) translateX(" + trans.left + "px) translateY(" + trans.down + "px)");
    $(this).children(".zoom").css("transform", transform);
    });
    $(document).on('mouseleave', '.frame', function () {
    $(this).children(".zoom").css("transform", "none");
    });
    //end of zoom

</script>
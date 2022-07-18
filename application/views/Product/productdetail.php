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

    .activeattrbutton {
        background: #333e48!important;
        color: white!important;
        border-color: #333e48;
    }


    .disabled {
        pointer-events: none;
        cursor: default;
        border-color: #f1f1f1;
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
                <div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
                    <div class="mb-2">
                        <div class="border-bottom mb-3 pb-md-1 pb-3">
                            <a href="#" class="font-size-12 text-gray-5 mb-2 d-inline-block"><?php echo $categorylists["category_name"]; ?></a>
                            <h2 class="font-size-25 text-lh-1dot2"><?php echo $product_details['title']; ?></h2>
                            <div class="mb-2">
                                <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                    <div class="mr-2">
                                        <i class="fas fa-star text-muted mr-1 main_star" id="sub_star_1"></i>
                                        <i class="fas fa-star text-muted mr-1 main_star" id="sub_star_2"></i>
                                        <i class="fas fa-star text-muted mr-1 main_star" id="sub_star_3"></i>
                                        <i class="fas fa-star text-muted mr-1 main_star" id="sub_star_4"></i>
                                        <i class="fas fa-star text-muted mr-1 main_star" id="sub_star_5"></i>
                                    </div>
                                    <span class="text-secondary font-size-13">(<?php echo $review_content['total_review']; ?> customer reviews)</span>
                                </a>
                            </div>
  
                        </div>
                        
                 
                        <p><strong>SKU</strong>: <?php echo $product_details['sku']; ?></p>
                    

                        <div class="border-top py-3 " ng-repeat="(attrk, attrv) in productVeriants.filterd">
                            <div class="d-flex align-items-center">
                                <h6 class="font-size-14 mb-0">{{attrv.meta.title}}</h6>

                                <a id="attribute{{attobj.meta.id}}"  ng-repeat="(attval, attobj) in attrv.values" href="<?php echo site_url("product/ProductDetails/" . "") ?>{{productVeriants.next_filter[attval]}}" class="btn px-5 btn-primary-dark transition-3d-hover {{ attobj.meta.selected  ? 'activeattrbutton' : ''}} {{productVeriants.next_filter[attval]?'':'disabled'}}" style="background: white;color:black;margin: 0px 10px;padding: 5px 19px!important;" >
                                    {{attobj.meta.attribute_value}}
                                </a>



                            </div>
                        </div>


                        <div class="d-md-flex align-items-end mb-3">
                            
                         
                        </div>
                        <div class="border-top border-bottom py-3 mb-4">
                            <p style="white-space: break-spaces;"><?php echo $product_details['description']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                    <div class="mb-2">
                        <div class="card p-5 border-width-2 border-color-1 borders-radius-17">
                            <div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">
                                <div class="ml-md-3 text-gray-9 font-size-14">Availability: <span class="text-green font-weight-bold"><?php echo $product_details['stock_status']; ?></span></div>

                            </div>
                            <div class="mb-3">
                                <ins class="font-size-36 text-decoration-none">{{<?php echo $product_details['price']; ?>|currency:"<?php echo globle_currency; ?> "}}</ins>
                                <?php
                                if ($product_details['sale_price']) {
                                    ?>
                                    <del class="font-size-20 ml-2 text-gray-6">{{<?php echo $product_details['regular_price']; ?>|currency:"<?php echo globle_currency; ?> "}}</del>

                                    <?php
                                }
                                ?>
                            </div>
                            <div class="mb-3">
                                <h6 class="font-size-14">Quantity</h6>
                                <!-- Quantity -->
                                <div class="border rounded-pill py-2 px-3 border-color-1">
                                    <div class="js-quantity row align-items-center">
                                        <div class="col">
                                            <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" ng-model="productver.quantity" type="text" value="1"/>
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

                            <div class="mb-2 pb-0dot5">
                                <a href="#" class="btn px-5 btn btn-block  btn-primary-dark transition-3d-hover" ng-click="addToCart(<?php echo $product_details['id']; ?>, productver.quantity)"><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Add to Cart</a>
                            </div>
                            <div class="mb-3">
                                <a href="#" class="btn btn-block btn-dark">Buy Now</a>
                            </div>
                            <div class="flex-content-center flex-wrap">
                                <a href="#" class="text-gray-6 font-size-13 mr-2"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                <a href="#" class="text-gray-6 font-size-13 ml-2"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
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
                                        <?php if ($review_content['total_review'] == '0') { ?>
                                            <h3 class="font-size-18 mb-6">Be First To Review</h3>
                                        <?php } ?>                                 
                                        <div class="mb-3">
                                            <i class="fas fa-star text-muted mr-1 avg_star" id="sub_1"></i>
                                            <i class="fas fa-star text-muted mr-1 avg_star" id="sub_2"></i>
                                            <i class="fas fa-star text-muted mr-1 avg_star" id="sub_3"></i>
                                            <i class="fas fa-star text-muted mr-1 avg_star" id="sub_4"></i>
                                            <i class="fas fa-star text-muted mr-1 avg_star" id="sub_5"></i>
                                        </div>
                                        <input type="hidden" id="avg_rate" name="average_rate" value="<?php echo ceil($review_content['avg_rating']); ?>"/>

                                        <h2 id="avg_rating" class="font-size-30 font-weight-bold text-lh-1 mb-0">
                                            <?php
                                            if (ceil($review_content['avg_rating']) != 0) {
                                                echo ceil($review_content['avg_rating']);
                                            } else {
                                                echo '0';
                                            }
                                            ?> / 5</h2>
                                        <div class="text-lh-1">overall</div>
                                    </div>
                                    <?php
                                    $one = $review_content['one_star'];
                                    $two = $review_content['two_star'];
                                    $three = $review_content['three_star'];
                                    $four = $review_content['four_star'];
                                    $five = $review_content['five_star'];
                                    $ratingstructure = array(
                                        5 => array("count" => "$five", "id" => "prg_five"),
                                        4 => array("count" => "$four", "id" => "prg_four"),
                                        3 => array("count" => "$three", "id" => "prg_three"),
                                        2 => array("count" => "$two", "id" => "prg_two"),
                                        1 => array("count" => "$one", "id" => "prg_one"),
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
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" style="width: 100%;" aria-valuenow="100" id="<?php echo $rtvalue["id"]; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-auto text-right">
                                                        <span class="text-gray-90"><?php echo $rtvalue["count"]; ?></span>
                                                    </div>

                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul><br>
                                    <h4><span id="total_review"><?php echo $review_content['total_review']; ?></span> Reviews</h4>
                                    <!-- End Ratings -->
                                </div>
                                <div class="col-md-6">
                                    <h3 class="font-size-18 mb-5">Add a review</h3>
                                    <!-- Form -->
                                    <form class="js-validate" method="post" action="">
                                        <input type="hidden" id="" name="status" value="0"/>

                                        <input type="hidden" id="star_rating" name="rating" value="" required=""/>
                                        <div class="row align-items-center mb-4">
                                            <div class="col-md-4 col-lg-3">
                                                <label for="rating" class="form-label mb-0">Your Review</label>
                                            </div>
                                            <div class="col-md-8 col-lg-9">
                                                <a href="" style="color:gray"><i class="fas fa-star star-light submit_star mr-1" id="star_1"  data-rating="1"></i></a>  
                                                <a href="" style="color:gray"><i class="fas fa-star star-light submit_star  mr-1 " id="star_2"  data-rating="2"></i>  </a> 
                                                <a href="" style="color:gray"><i class="fas fa-star star-light submit_star  mr-1 " id="star_3" data-rating="3"></i> </a>  
                                                <a href="" style="color:gray"><i class="fas fa-star star-light submit_star  mr-1" id="star_4"  data-rating="4"></i></a>   
                                                <a href="" style="color:gray"><i class="fas fa-star star-light submit_star  mr-1 " id="star_5"  data-rating="5"></i></a> 

                                            </div>

                                        </div>
                                        <div class="js-form-message form-group mb-3 row">
                                            <div class="col-md-4 col-lg-3">
                                                <label for="descriptionTextarea" class="form-label">Your Review</label>
                                            </div>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea class="form-control" rows="3" name="comment" id="descriptionTextarea"
                                                          data-msg="Please enter your message."
                                                          data-error-class="u-has-error"
                                                          data-success-class="u-has-success"></textarea>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="offset-md-4 offset-lg-3 col-auto">
                                                <button id="save_review" type="submit" name="submit_review" class="btn btn-primary-dark btn-wide transition-3d-hover">Add Review</button>
                                            </div>
                                        </div>
                                    </form>
                                    <h5 class="p-1 mt-2 bg-light text-success"><?php echo $this->session->flashdata('login'); ?> </h5>

                                    <!-- End Form -->


                                    <?php
                                    foreach ($reviews as $key => $value) {
                                        if ($value['status'] == 'Approved') {
                                            ?>     

                                            <input type="hidden" id="user_rating" name="urate" value="<?php echo $value['rating']; ?>"/> 

                                            <div class="border-bottom border-color-1 pb-4 mb-4">

                                                <div class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2 ">
                                                    <div class="text-ls-n2 font-size-16 star_user" style="width: 80px;">
                                                        <?php
                                                        $rate = $value['rating'];
                                                        for ($star = 1; $star <= 5; $star++) {
                                                            if ($star <= $rate) {
                                                                ?>
                                                                <small class="fas fa-star text-warning user_star" id="users_1"></small>
                                                            <?php } else {
                                                                ?>
                                                                <small class="fas fa-star text-muted user_star" id="users_2"></small>
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                    </div>
                                                </div>


                                                <p class="text-gray-90"><?php echo $value['comment'] ?></p>


                                                <div class="mb-2">
                                                    <strong><?php echo $value['name'] ?></strong>
                                                    <span class="font-size-13 text-gray-23">- <?php echo $value['review_date']; ?>  At <?php echo $value['review_time']; ?></span>
                                                </div>

                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <!-- End Review -->
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
        </div>
    </div>
</main>



<script>
    var product_id = <?php echo $product_id; ?>;
    var base_product_id = <?php echo $base_product_id; ?>;</script>
<script src="<?php echo base_url(); ?>assets/theme2/angular/productController.js"></script>

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

    function reset_background() {
    var rating_data = 0;
    for (var count = 1; count <= 5; count++) {
    $('#star_' + count).addClass('star-light');
    $('#star_' + count).removeClass('text-warning');
    }
    }

    // $(document).on('mouseleave' , '.submit_star', function(){

    //  reset_background();

    // });
    $(document).on('click', '.submit_star', function () {
    $('.submit_star').addClass('star-light');
    $('.submit_star').removeClass('text-warning');
    rating_data = $(this).data('rating');
    for (var count = 1; count <= rating_data; count++)
    {
    $('#star_' + count).addClass('text-warning');
    }

    $("#star_rating").val(count - 1);
    });
    $('.main_star').each(function () {
    var count_star = 0;
    var avg_rating = $('#avg_rate').val();
    for (count_star = 1; count_star <= avg_rating; count_star++) {
    $('#sub_star_' + count_star).addClass('text-warning');
    $('#sub_star_' + count_star).removeClass('text-muted');
    }

    console.log(count_star);
    });
    $('.avg_star').each(function () {
    var count_star = 0;
    var avg_rating = $('#avg_rate').val();
    for (count_star = 1; count_star <= avg_rating; count_star++) {
    $('#sub_' + count_star).addClass('text-warning');
    $('#sub_' + count_star).removeClass('text-muted');
    }

    console.log(count_star);
    });
    $('#prg_five').css('width', (<?php echo $five; ?> / <?php echo $review_content['total_review']; ?>) * 100 + '%');
    $('#prg_four').css('width', (<?php echo $four; ?> / <?php echo $review_content['total_review']; ?>) * 100 + '%');
    $('#prg_three').css('width', (<?php echo $three; ?> / <?php echo $review_content['total_review']; ?>) * 100 + '%');
    $('#prg_two').css('width', (<?php echo $two; ?> / <?php echo $review_content['total_review']; ?>) * 100 + '%');
    $('#prg_one').css('width', (<?php echo $one; ?> / <?php echo $review_content['total_review']; ?>) * 100 + '%');
    $('#save_review').click(function () {

    var comment = $('#descriptionTextarea').val();
    var rating = $('#star_rating').val();
    if (comment == '' || rating == '') {
    alert("Please fill your Review");
    return false;
    }
    if (rating == '') {
    alert("Please fill Star rating");
    return false;
    }
    $("#star_rating").val(count - 1);
    });

</script>


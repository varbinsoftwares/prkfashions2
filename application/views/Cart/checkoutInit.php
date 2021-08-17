<?php
$this->load->view('layout/header');
?>

<style>
    .cartbutton{
        width: 100%;
        padding: 6px;
        color: #fff!important;
    }


    .noti-check1 span{
        color: red;
        color: red;
        width: 111px;
        float: left;
        text-align: right;
        padding-right: 13px;
    }

    .noti-check1 h6{
        font-size: 15px;
        font-weight: 600;
    }

    .address_block{
        background: #fff;
        border: 3px solid #d30603;
        padding: 5px 10px;
        margin-bottom: 20px;

    }
    .checkcart {
        border-radius: 50%;
        position: absolute;
        top: -28px;
        left: -8px;
        padding: 4px;
        background: #fff;
        border: 2px solid green;
    }


    .default{
        border: 2px solid green;
    }

    .default{
        border: 2px solid green;
    }

    .checkcart i{
        color: green;
    }

    .address_button{
        padding: 0px 10px;
        margin-top: 15px;
        font-size: 10px;
    }

    .cartdetail_small {
        float: left;
        width: 203px;
    }

</style>






<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/res/cart.css" type="text/css" />

<!-- Inner Page Banner Area Start Here -->
<section id="page-title" class="page-title-parallax page-title-center border-bottom" style="background-image: url('<?php echo base_url(); ?>assets/theme2/res/images/sections/cart.jpg');   margin-top: -30px;    padding: 55px 0px;    background-position: -237px -135px;" data-center="" data-top-bottom="">
    <div class="container clearfix">
        <span class="font-primary ls1 mb-2 color" style="font-size: 14px;">Top Services</span>
        <h1 class="font-secondary capitalize ls0" style="font-size: 62px;">Shopping Cart</h1>
    </div>
</section>
<!-- Inner Page Banner Area End Here -->

<!-- Content -->

<!-- Content -->
<section id="content" style="overflow: visible;">
    <div class="content-wrap nobottompadding">
        <div class="container clearfix">
            <div class="row clearfix">
                <?php
                $this->load->view('Cart/commanmessage');
                ?>
                <div class="cart-page-area">
                    <div class="container" ng-if="globleCartData.total_quantity">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="card card-default">
                                    <div class="card-heading" role="tab" id="headingOne">
                                        <h4 class="card-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <span class="fa-stack">
                                                    <i class="fa fa-shopping-cart fa-stack-1x"></i>
                                                    <i class="ion-bag fa-stack-1x "></i>
                                                </span>   My Shopping Bag
                                                <span style="float: right; line-height: 29px;" class="ng-binding">Total: {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}} (<small style="color: #fff" class="ng-binding">{{globleCartData.total_quantity}}</small>)</span> 
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="clearfix"></div>
                                        <div class="cart-page-top table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <td class="cart-form-heading text_center" style="width: 50%" colspan="2">Product</td>
                                                        <td class="cart-form-heading text_center">Price</td>

                                                        <td class="cart-form-heading numbertext">Total</td>
                                                        <td class="cart-form-heading"></td>
                                                    </tr>
                                                </thead>
                                                <tbody id="quantity-holder">
                                                    <tr ng-repeat="product in globleCartData.products">
                                                        <td class="cart-img-holder" style="    border-right: 0px;width: 40px;">
                                                            <a href="#">
                                                                <img  src="{{product.file_name}}" alt=""  alt="cart" class="img-responsive cart_image_block">
                                                            </a>
                                                        </td>
                                                        <td  style="    border-left: 0px;">
                                                            <h3>
                                                                <a href="#">{{product.title}}</a>
                                                                <br/>
                                                                <small style="font-size: 10px">{{product.sku}}</small>
                                                            </h3>
                                                        </td>
                                                        <td class="text-center">{{product.price|currency:" "}} X {{product.quantity}}
                                                        </td>
                                                        <td class="amount">{{product.total_price|currency:" "}}</td>
                                                        <td class="dismiss"><a href="#"  ng-click="removeCart(product.product_id)"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text_right">
                                                            SUB TOTAL
                                                        </td>
                                                        <td class="text-center amount">
                                                            {{globleCartData.sub_total_price|currency:"<?php echo globle_currency; ?>"}}
                                                        </td>
                                                        <td></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="3" class="text_right">
                                                            SHIPPING 
                                                        </td>
                                                        <td class="text-center amount">
                                                            {{globleCartData.shipping_price|currency:"<?php echo globle_currency; ?>"}}
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text_right">
                                                            TOTAL
                                                        </td>
                                                        <td class="text-center amount">
                                                            {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}}
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" class="text_right">
                                                            <div class="proceed-button pull-left " >
                                                                <a href=" <?php echo site_url("Cart/details"); ?>" class="btn-apply-coupon checkout_button_pre disabled" ><i class="fa fa-arrow-left"></i> Back To Cart</a>
                                                            </div>
                                                            <div class="proceed-button pull-right ">
                                                                <a href=" <?php echo site_url("Cart/checkoutShipping"); ?>" class="btn-apply-coupon checkout_button_next disabled" >Choose Shipping Address <i class="fa fa-arrow-right"></i></a>
                                                            </div>
                                                        </td>

                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                </div>


                            </div>


                            <?php
                            $this->load->view('Cart/itemblock', array('vtype' => 'shipping'));
                            ?>
                            <?php
                            $this->load->view('Cart/itemblock', array('vtype' => 'payment'));
                            ?>

                        </div>

                    </div>

                    <?php
                    $this->load->view('Cart/noproduct');
                    ?>


                </div>


            </div>
        </div>
    </div>
</section>




<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<script>
                                                                var avaiblecredits = 0;
</script>

<?php
$this->load->view('layout/footer', array('custom_item' => 0, 'custom_id' => 0));
?>
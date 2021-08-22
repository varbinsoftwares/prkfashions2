<div class="pl-lg-3 ">
    <div class="bg-gray-1 rounded-lg">
        <div class="p-4 mb-4 checkout-table">
            <!-- Title -->
            <div class="border-bottom ">
                <h3 class="section-title mb-0 pb-2 font-size-18">Your order</h3>
            </div>
            <!-- End Title -->

            <!-- Product Content -->
            <table class="table">
                <?php
                if ($vtype != 'payment') {
                    ?>
                    <thead>
                        <tr>
                            <th class="product-name">Product</th>
                            <th class="product-total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cart_item" ng-repeat="product in globleCartData.products">
                            <td>{{product.title}}&nbsp;<strong class="product-quantity">× {{product.quantity}}</strong></td>
                            <td>{{product.total_price|currency:"<?php echo globle_currency; ?>"}}</td>
                        </tr>

                    </tbody>
                    <?php
                }
                ?>
                <tfoot>
                    <tr>
                        <th>Subtotal</th>
                        <td>  {{globleCartData.sub_total_price|currency:"<?php echo globle_currency; ?>"}}</td>
                    </tr>
                    <tr>
                        <th>Shipping</th>
                        <td>{{globleCartData.shipping_price|currency:"<?php echo globle_currency; ?>"}}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td><strong>  {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}}</strong></td>
                    </tr>
                </tfoot>
            </table>

            <?php
            if ($vtype == 'payment') {
                ?>
                <form action="#" method="post">
                    <!-- End Product Content -->
                    <div class="border-top border-width-3 border-color-1 pt-3 mb-2">
                        <!-- Basics Accordion -->
                        <div id="basicsAccordion1">
                           


                            <!-- Card -->
                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                <div class="p-2" id="basicsHeadingThree">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="thirdpayment_type" name="payment_type" checked="" value="Cash On Delivery">
                                        <label class="custom-control-label form-label" for="thirdpayment_type" data-toggle="collapse" data-target="#basicsCollapseThree" aria-expanded="false" aria-controls="basicsCollapseThree">
                                            Cash on delivery
                                        </label>
                                    </div>
                                </div>
                                <div id="basicsCollapseThree" class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingThree" data-parent="#basicsAccordion1">
                                    <div class="p-2">
                                        Pay with cash upon delivery.
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->

                           

                        </div>
                        <!-- End Basics Accordion -->
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between px-3 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck10" required="" data-msg="Please agree terms and conditions." data-error-class="u-has-error" data-success-class="u-has-success">
                            <label class="form-check-label form-label" for="defaultCheck10">
                                I have read and agree to the website <a href="#" class="text-blue">terms and conditions </a>
                                <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3" name="place_order">Place order</button>
                </form>
                <?php
            } else {
                ?><?php
                if (count($user_address_details)) {
                    ?>
                    <div class=" ">
                        <a href=" <?php echo $isguest =="true" ? site_url("CartGuest/checkoutPayment") : site_url("Cart/checkoutPayment"); ?>" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3 " >Choose Payment Method <i class="fa fa-arrow-right"></i></a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
$this->load->view('layout/header');
?>

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
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">FAQ</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->

            <div class="container">
               
                <div class="mb-12 text-center">
                    <h1>Frequently Asked Questions</h1>
                </div>
                <!-- Basics Accordion -->
                <div id="basicsAccordion" class="mb-12">
                    <!-- Card -->
                    <div class="card mb-3 border-top-0 border-left-0 border-right-0 border-color-1 rounded-0">
                        <div class="card-header card-collapse bg-transparent-on-hover border-0" id="basicsHeadingOne">
                            <h5 class="mb-0">
                                <button type="button" class="px-0 btn btn-link btn-block d-flex justify-content-between card-btn py-3 font-size-25 border-0"
                                    data-toggle="collapse"
                                    data-target="#basicsCollapseOner"
                                    aria-expanded="true"
                                    aria-controls="basicsCollapseOner">
                                    What Shipping Methods Are Available?

                                    <span class="card-btn-arrow">
                                        <i class="fas fa-chevron-down text-gray-90 font-size-18"></i>
                                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseOner" class="collapse show"
                            aria-labelledby="basicsHeadingOne"
                            data-parent="#basicsAccordion">
                            <div class="card-body pl-0 pb-8">
                                <p class="mb-0">At Prk Fashions, we strive to make each shopping experience outstanding and enriching. Hence, we partner with the best in the industry. We use logistics services of Delhivery, Xpressbees &amp; Ecom Express. We will notify you the name of the partner delivering your order, in advance.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card mb-3 border-top-0 border-left-0 border-right-0 border-color-1 rounded-0">
                        <div class="card-header card-collapse bg-transparent-on-hover border-0" id="basicsHeadingTwo">
                            <h5 class="mb-0">
                                <button type="button" class="px-0 btn btn-link btn-block d-flex justify-content-between card-btn collapsed py-3 font-size-25 border-0"
                                    data-toggle="collapse"
                                    data-target="#basicsCollapseTwo"
                                    aria-expanded="false"
                                    aria-controls="basicsCollapseTwo">
                                    How Long Will it Take To Get My Package?

                                    <span class="card-btn-arrow">
                                        <i class="fas fa-chevron-down text-gray-90 font-size-18"></i>
                                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseTwo" class="collapse"
                            aria-labelledby="basicsHeadingTwo"
                            data-parent="#basicsAccordion">
                            <div class="card-body pl-0 pb-8">
                                <p class="mb-0">It's really quick! We strive to deliver all our orders / products in the fastest time possible. Depending upon your address, the delivery time may vary between 2 - 9 working days. That still won't stop us from trying to get you your order faster. On each product's display page, you can enter your location's pin code to check when you can expect to receive the delivery.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card mb-3 border-top-0 border-left-0 border-right-0 border-color-1 rounded-0">
                        <div class="card-header card-collapse bg-transparent-on-hover border-0" id="basicsHeadingThree">
                            <h5 class="mb-0">
                                <button type="button" class="px-0 btn btn-link btn-block d-flex justify-content-between card-btn collapsed py-3 font-size-25 border-0"
                                    data-toggle="collapse"
                                    data-target="#basicsCollapseThree"
                                    aria-expanded="false"
                                    aria-controls="basicsCollapseThree">
                                    How Do I Track My Order?

                                    <span class="card-btn-arrow">
                                        <i class="fas fa-chevron-down text-gray-90 font-size-18"></i>
                                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseThree" class="collapse"
                            aria-labelledby="basicsHeadingThree"
                            data-parent="#basicsAccordion">
                            <div class="card-body pl-0 pb-8">
                                <p class="mb-0">You can track your order as soon as it is shipped out. To know the status of your item real time, just tap on the tracking link in the email sent to you. Alternatively, you can also login to Prkfashions.com and visit the ‘My Account' section to know your order status.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card mb-3 border-top-0 border-left-0 border-right-0 border-color-1 rounded-0">
                        <div class="card-header card-collapse bg-transparent-on-hover border-0" id="basicsHeadingFour">
                            <h5 class="mb-0">
                                <button type="button" class="px-0 btn btn-link btn-block d-flex justify-content-between card-btn collapsed py-3 font-size-25 border-0"
                                    data-toggle="collapse"
                                    data-target="#basicsCollapseFour"
                                    aria-expanded="false"
                                    aria-controls="basicsCollapseFour">
                                    How Do I Place an Order?

                                    <span class="card-btn-arrow">
                                        <i class="fas fa-chevron-down text-gray-90 font-size-18"></i>
                                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseFour" class="collapse"
                            aria-labelledby="basicsHeadingFour"
                            data-parent="#basicsAccordion">
                            <div class="card-body pl-0 pb-8">
                                <p class="mb-0">Click on the wanted item and "Add to basket" then "Order". Then choose your delivery method, a delivery and billing address, and then proceed to checkout. To do this, first you have to accept the terms and conditions, and then choose one of our payement methods: credit card, Debit card, or Roser.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card mb-3 border-top-0 border-left-0 border-right-0 border-color-1 rounded-0">
                        <div class="card-header card-collapse bg-transparent-on-hover border-0" id="basicsHeadingFive">
                            <h5 class="mb-0">
                                <button type="button" class="px-0 btn btn-link btn-block d-flex justify-content-between card-btn collapsed py-3 font-size-25 border-0"
                                    data-toggle="collapse"
                                    data-target="#basicsCollapseFive"
                                    aria-expanded="false"
                                    aria-controls="basicsCollapseFive">
                                    How Should I to Contact if I Have Any Queries?

                                    <span class="card-btn-arrow">
                                        <i class="fas fa-chevron-down text-gray-90 font-size-18"></i>
                                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseFive" class="collapse"
                            aria-labelledby="basicsHeadingFive"
                            data-parent="#basicsAccordion">
                            <div class="card-body pl-0 pb-8">
                                <p class="mb-0">If you require any further information, feel free to <?php echo site_url('contact');?>">contact us</a>  through our <a href="<?php echo site_url('contact');?>">contact page</a> . If you require any further information, let us know. Please feel free to contact us if you need any further information. Please let us know if you have any questions.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card mb-3 border-top-0 border-left-0 border-right-0 border-color-1">
                        <div class="card-header card-collapse bg-transparent-on-hover border-0" id="basicsHeadingSix">
                            <h5 class="mb-0">
                                <button type="button" class="px-0 btn btn-link btn-block d-flex justify-content-between card-btn collapsed py-3 font-size-25 border-0"
                                    data-toggle="collapse"
                                    data-target="#basicsCollapseSix"
                                    aria-expanded="false"
                                    aria-controls="basicsCollapseSix">
                                    Do I Need an Account to Place an Order?

                                    <span class="card-btn-arrow">
                                        <i class="fas fa-chevron-down text-gray-90 font-size-18"></i>
                                    </span>
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseSix" class="collapse"
                            aria-labelledby="basicsHeadingSix"
                            data-parent="#basicsAccordion">
                            <div class="card-body pl-0">
                                <p class="mb-0">
                                    Having an account is not essential as you can select Checkout as Guest to complete an order without logging in. Any orders placed as a guest require you to manually enter your address and payment information and will not be saved for future reference.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Basics Accordion -->
               
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->
<?php
$this->load->view('layout/footer');
?>
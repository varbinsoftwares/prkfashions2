<?php
$this->load->view('layout/header_1');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="bg-img-hero mb-14" style="background-image: url(<?php echo base_url(); ?>assets/theme2/images/aboutback.jpg);">
        <div class="container">
            <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center ">
                <h1 class="h1 font-weight-bold"></h1>
                <p class="text-gray-39 font-size-18 text-lh-default">
                </p>
            </div>
        </div>
    </div>

    <div class="container mb-8 mb-lg-0">
        <div class="row mb-8">
            <div class="col-md-3">
                <img src="<?php echo base_url(); ?>assets/paymentstatus/payme-logo-white@2x.png" style="height: 100px;">

            </div>
            <div class="col-md-9">
                <h2>
                    You have selected PayMe as your payment method and will be redirected to the PayMe app to complete payment.
                </h2>
                 <div class="ml-md-3">
                <a href="<?php echo site_url("PaymePayment/login"); ?>" class="btn px-5 btn-primary-dark transition-3d-hover"><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Order Now</a>
            </div>
            </div>

           
        </div>

    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->
<?php
$this->load->view('layout/footer');
?>
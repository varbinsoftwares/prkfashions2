
<?php
$this->load->view('layout/header');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="bg-img-hero mb-6" style="background-image: url(<?php echo base_url(); ?>assets/theme2/images/aboutback.jpg);">
        <div class="container">
            <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center ">
                <h1 class="h1 font-weight-bold">Payment Failed</h1>

            </div>
        </div>
    </div>

    <div class="container mb-2 mb-lg-0">
        <div class="row mb-2">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="text-align: center">
                <h2>Order ID: <?php
                    echo $order_details['order_data']->order_no;
                    ?></h2>
                <h4>Price: <b>{{<?php echo $order_details['order_data']->total_price; ?> |currency:"HKD"}}</b></h4>

                <hr/>
                <h2><i class="fa fa-times" style="color:red"></i>&nbsp;&nbsp;&nbsp;Order Payment Unsuccessful</h2>
                <p>Your order payment failed.</p>
                <hr/>
                <div class="ml-md-3">
                    <a href="<?php echo site_url("PayuPayment/process/" . $order_details['order_data']->order_key); ?>" class="btn-apply-coupon btn btn-primary-dark-w mb-3" ><i class="ec ec-returning mr-2 font-size-20"></i>Restart Payment</a>
                    <p>
                        <b class="text-danger"> <?php echo ($faildata["error_Message"]);?></b>
                        <br/>
                        Payment failed. Please contact customer support for diagnosis and further steps.
                    </p>
                </div>
                 <hr/>
                <div class="ml-md-3">
                    <a href="<?php echo site_url("PayuPayment/cancel/" . $order_details['order_data']->order_key); ?>" class="btn-apply-coupon btn btn-danger mb-3" ><i class="ec ec-close-remove mr-2 font-size-20"></i>Cancel Order</a>
                    <p>
                        
                        If you don't want to complete payment, You can cancel order. 
                    </p>
                </div>
            


            </div>
            <div class="col-md-3"></div>
        </div>

    </div>

</main>
<!-- ========== END MAIN CONTENT ========== -->
<?php
$this->load->view('layout/footer');
?>
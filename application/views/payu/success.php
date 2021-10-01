<?php
$this->load->view('layout/header');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">

    <div class="container mt-4 mb-lg-0">

        <div class="row mb-8">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="text-align: center">
                <h2><i class="fa fa-check-circle" style="color:green"></i>&nbsp;&nbsp;&nbsp;Order Successful</h2>
                <p>Your order has been placed, please check your email.</p>
                <h2>Order ID: <?php
                    echo $order_details['order_data']->order_no;
                    ?></h2>
                <h4>Price: <b>{{<?php echo $order_details['order_data']->total_price; ?> |currency:"HKD"}}</b></h4>

                <hr/>
                <p>Your order payment done.</p>
                <div style="padding:5px;text-align: center">
                    <img style=" height:30px; width:30px;" src="<?php echo base_url(); ?>/assets/images/process.gif" alt="">
                </div>
                <hr/>
                <a href="<?php echo site_url("Order/orderdetails/" . $order_details['order_data']->order_key); ?>" class="btn-apply-coupon btn btn-primary-dark-w mb-3" ><i class="ec ec-printer mr-2 font-size-20"></i>View Order</a>

            </div>
            <div class="col-md-3"></div>
        </div>

    </div>


</main>
<!-- ========== END MAIN CONTENT ========== -->
<script>

    setInterval(function () {
        window.location = "<?php echo site_url("Order/orderdetails/" . $order_details['order_data']->order_key); ?>";
    }, 3000);
</script>
<?php
$this->load->view('layout/footer');
?>


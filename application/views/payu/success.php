<?php
$this->load->view('layout/header');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="bg-img-hero mb-8" style="background-image: url(<?php echo base_url(); ?>assets/theme2/images/aboutback.jpg);">
        <div class="container">
            <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center ">
                <h1 class="h1 font-weight-bold">Payment Success</h1>
                <p class="text-gray-39 font-size-18 text-lh-default">
                </p>
            </div>
        </div>
    </div>
    <div class="container mb-8 mb-lg-0">

        <div class="row mb-8">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="text-align: center">
                <h2><i class="fa fa-check-circle" style="color:green"></i>&nbsp;&nbsp;&nbsp;Order Successful</h2>
                <p>Your order has been placed, please check your email.</p>
                <h2>Order ID: <?php echo $order_details['order_data']->order_no; ?></h2>
                <h4>Price: <b>{{<?php echo $order_amount; ?> |currency:"HKD"}}</b></h4>

                <table class="table" style="text-align: left;width:400px;display: inline-block;margin-top: 50px;">
                    <tr>
                        <th style="width:50%">Customer Name</th>
                        <td><?php echo $order_details['order_data']->name; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Contact No.</th>
                        <td> </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>
    <?php
$status=$_POST["status"];
$txnid=$_POST["txnid"];
$bankcode=$_POST["bankcode"];
$amount= $_POST["amount"];
$msg= $_POST["field6"];


print_r($_POST);

// Salt should be same Post Request 
if (isset($_POST["txnid"])) {
      echo  "<center> ". $msg ." </center>";
     
          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . " from " . $bankcode . ". Your order will soon be shipped.</h4>";
}
?>	
    
</main>
<!-- ========== END MAIN CONTENT ========== -->

<?php
$this->load->view('layout/footer');
?>


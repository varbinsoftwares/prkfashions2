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


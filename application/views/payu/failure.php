
<?php
$this->load->view('layout/header');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="bg-img-hero mb-14" style="background-image: url(<?php echo base_url(); ?>assets/theme2/images/aboutback.jpg);">
        <div class="container">
            <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center ">
                <h1 class="h1 font-weight-bold">Payment Failed</h1>
              
            </div>
        </div>
    </div>
<?php
$status=$_POST["status"];
$txnid=$_POST["txnid"];

$msg= $_POST["field9"];
// Salt should be same Post Request 
if (isset($_POST["txnid"])) { ?>
<
      <center> <?php echo $faildata['error_Message'];?></center>
      <h4>Invalid Transaction. Please try again</h4>
    
      <h3>Your order status is <?php $faildata['error_Message'];?></h3>
          <h4>Your transaction id for this transaction is <b>".$txnid."</b>. <br>You may try making the payment by clicking the link below.</h4>";
<?php
}
?>	
   
</main>
<!-- ========== END MAIN CONTENT ========== -->
<?php
$this->load->view('layout/footer');
?>
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
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Customer-Services</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- End breadcrumb -->
                </div>
            </div>
            <!-- End breadcrumb -->

            <div class="container">
               
                <div class="mb-12 text-center">
                    <h1>Customer Services</h1>
                </div>
                <!-- Basics Accordion -->
                <div id="basicsAccordion" class="mb-12">
                    <div class="row">
                   <div class="col-lg-6 col-sm-12" style="font-size: 25px;">
                    <p>Our customers are our priority. We are 24/7 available for your assistance. We will answer your questions as soon as possible. you can contact us by submitting your query with this <a href="<?php echo site_url('contact');?>">contact form</a> or you can call us on our customer care number : <br><strong>(+91) 95160-41729</strong>.</p>
                    <p> <strong>You can also mail us:</strong> pavitramod11@gmail.com</p>
                    <p><strong>Submit query: </strong>  <a href="<?php echo site_url('contact');?>">Leave us a Message</a></p>
                   </div>
                   <div  class="col-lg-6 col-sm-12 ">
                       
                     <img src="<?php echo base_url();?>assets/theme2/images/banner/cservice.jpg" alt="customer services" height="400px" width ="500px" style="max-width:350px; ">
                   </div>
                   </div>
                </div>
                <!-- End Basics Accordion -->
               
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->
<?php
$this->load->view('layout/footer');
?>
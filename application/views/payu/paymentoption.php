<?php
$this->load->view('layout/header');
?> 
<html>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      //payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
  
    <h2 style="text-align:center">Payment Processing...</h2>

    <div style="padding:50px;">
    <img style="margin-left:540px; height:150px; width:150px;" src="<?php echo base_url();?>/assets/images/process.gif" alt="">
    </div>

    
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>

      <?php
      foreach ( $payu_array as $key => $value){
      ?>
      <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>" />
          
     
       <?php } ?>
           <input class="btn btn-primary" type="submit" value="Payment options" />
         
       
    </form>
  </body>
  </html>
<?php
$this->load->view('layout/footer');
?> 